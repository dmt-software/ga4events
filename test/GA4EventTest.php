<?php

namespace DMT\GA4Events\Tests;

use DMT\GA4Events\GA4Event;
use DMT\GA4Events\GA4Helper;
use Exception;
use HaydenPierce\ClassFinder\ClassFinder;
use Jawira\CaseConverter\CaseConverterException;
use Jawira\CaseConverter\Convert;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionException;

class GA4EventTest extends TestCase
{
    /**
     * @throws Exception
     */
    public static function provideEventClasses(): array
    {
        $classes = ClassFinder::getClassesInNamespace('DMT\GA4Events');

        $classes = array_filter(
            $classes,
            function ($c) {
                return is_subclass_of($c, GA4Event::class);
            }
        );

        return array_map(
            function ($c) {
                return [$c];
            },
            $classes
        );
    }

    /**
     * @dataProvider provideEventClasses
     * @param string $eventClass
     * @return void
     * @throws ReflectionException
     * @throws CaseConverterException
     */
    public function testEvent(string $eventClass)
    {
        $eventReflectionClass = new ReflectionClass($eventClass);
        $shortName = $eventReflectionClass->getShortName();
        $convert = new Convert($shortName);
        $snakeName = $convert->toSnake();
        $eventName = $eventReflectionClass->getConstant('EVENT');

        $this->assertEquals(
            $snakeName,
            $eventName,
            "EVENT shoud be $snakeName for a class named $shortName"
        );

        if (!$eventReflectionClass->hasProperty('items')) {
            return;
        }

        // events with items

        $this->assertTrue(
            $eventReflectionClass->hasMethod('addItem'),
            "$shortName shoud have addItem (use HasItems)"
        );
    }

    public function testSerialize()
    {
        $addToCartEvent = GA4Helper::add_to_cart([
            'currency' => 'EUR',
            'value' => 20.0,
            'items' => [
                GA4Helper::item([
                    'item_id' => 'itemA',
                    'price' => 5.0,
                    'quantity' => 2,
                ])
            ]
        ]);

        $addToCartEvent->addItem(GA4Helper::item([
            'item_id' => 'itemB',
            'price' => 10.0,
            'quantity' => 1,
        ]));

        $expected = [
            'currency' => 'EUR',
            'value' => 20.0,
            'items' => [
                [
                    'item_id' => 'itemA',
                    'price' => 5.0,
                    'quantity' => 2,
                ],
                [
                    'item_id' => 'itemB',
                    'price' => 10.0,
                    'quantity' => 1,
                ],
            ]
        ];

        $jsonExpected = json_encode($expected);

        $this->assertEquals($expected, $addToCartEvent->serialize());

        $this->assertEquals($jsonExpected, json_encode($addToCartEvent));
    }

    public function testToScript()
    {
        $searchEvent = GA4Helper::search(['search_term' => 'mret_hcraes']);

        // datalayer
        $expectedDataLayer = 'dataLayer.push({"event":"search","ecommerce":{"search_term":"mret_hcraes"}});';

        $this->assertEquals($expectedDataLayer, GA4Helper::toDataLayerScript($searchEvent));

        $expectedDataLayerWithScript = '<script type="text/javascript">dataLayer.push({"event":"search","ecommerce":{"search_term":"mret_hcraes"}});</script>';

        $this->assertEquals($expectedDataLayerWithScript, GA4Helper::toDataLayerScript($searchEvent, true));

        // gtag
        $expectedGtag = 'gtag("event","search",{"search_term":"mret_hcraes"});';

        $this->assertEquals($expectedGtag, GA4Helper::toGtagScript($searchEvent));

        $expectedGtagWithScript = '<script type="text/javascript">gtag("event","search",{"search_term":"mret_hcraes"});</script>';

        $this->assertEquals($expectedGtagWithScript, GA4Helper::toGtagScript($searchEvent, true));
    }

    public function testCaseConversion()
    {
        $search_event = GA4Helper::search(['search_term' => 'mret_hcraes']);

        $this->assertTrue(isset($search_event->searchTerm));

        $searchEvent = GA4Helper::search(['searchTerm' => 'mret_hcraes']);

        $this->assertTrue(isset($searchEvent->search_term));

        $this->assertEquals($search_event, $searchEvent);

        $searchEvent->search_term = 'mreThcraes';

        $this->assertEquals($searchEvent->searchTerm, $searchEvent->search_term);

        unset($searchEvent->search_term);

        $this->assertFalse(isset($searchEvent->searchTerm));
    }
}
