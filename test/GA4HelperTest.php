<?php

namespace DMT\GA4Events\Tests;

use DMT\GA4Events\GA4Event;
use DMT\GA4Events\GA4Helper;
use Exception;
use HaydenPierce\ClassFinder\ClassFinder;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionException;

class GA4HelperTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function provideEventClasses(): array
    {
        $classes = ClassFinder::getClassesInNamespace('DMT\GA4Events');

        $classes = array_filter($classes, function($c) {
            return is_subclass_of($c, GA4Event::class);
        });

        return array_map(function($c) { return [$c]; }, $classes);
    }

    /**
     * @dataProvider provideEventClasses
     * @throws ReflectionException
     */
    public function testEventHelperMethod(string $eventClass)
    {
        $helperReflectionClass = new ReflectionClass(GA4Helper::class);
        $eventReflectionClass = new ReflectionClass($eventClass);
        $eventName = $eventReflectionClass->getConstant('EVENT');

        $this->assertTrue(
            $helperReflectionClass->hasMethod($eventName),
            "GA4Helper is missing $eventName method"
        );

        $this->assertSame(
            $eventClass,
            $helperReflectionClass->getMethod($eventName)->getReturnType()->getName(),
            "GA4Helper::$eventName should return a $eventClass"
        );

        // defaults are used here to prevent TypeErrors for required properties
        $defaults = [
            'currency' => 'EUR',
            'value' => 0.00,
            'achievement_id' => '',
            'search_term' => '',
            'transaction_id' => '',
            'virtual_currency_name' => '',
        ];

        $eventInstance = call_user_func([GA4Helper::class, $eventName], $defaults);

        $this->assertInstanceOf($eventClass, $eventInstance);
    }
}
