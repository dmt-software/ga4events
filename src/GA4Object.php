<?php

namespace DMT\GA4Events;

use JsonSerializable;

class GA4Object implements JsonSerializable
{
    /**
     * @param array $values
     * @return GA4Object|static
     */
    public static function create(array $values): GA4Object
    {
        $class = get_called_class();
        $instance = new $class();

        $class_vars = get_class_vars($class);

        foreach($class_vars as $property => $default_value) {
            $instance->{$property} = array_key_exists($property, $values) ? $values[$property] : $default_value;
        }

        return $instance;
    }

    /**
     * @return array
     */
    public function serialize(): array
    {
        return GA4Helper::serialize($this);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->serialize();
    }
}
