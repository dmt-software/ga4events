<?php

namespace DmtSoftware\GA4Events;

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
    public function provideEventClasses(): array
    {
        $classes = ClassFinder::getClassesInNamespace('DmtSoftware\GA4Events');

        $classes = array_filter($classes, function($c) {
            return is_subclass_of($c, GA4Event::class);
        });

        return array_map(function($c) { return [$c]; }, $classes);
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

    public function testToDataLayer()
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
            'add_to_cart', [
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
            ]
        ];

        $dataLayer = $addToCartEvent->toDataLayer();

        $this->assertEquals($expected, $dataLayer);

        $json = json_encode($addToCartEvent);

        $this->assertEquals(json_encode($expected), $json);
    }
}
