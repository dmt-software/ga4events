<?php

namespace DMT\GA4Events;

use Jawira\CaseConverter\CaseConverterException;
use Jawira\CaseConverter\Convert;
use JsonSerializable;

class GA4Object implements JsonSerializable
{
    /**
     * @param array $values
     * @return GA4Object|static
     * @throws CaseConverterException
     */
    public static function create(array $values): GA4Object
    {
        $class = get_called_class();
        $instance = new $class();

        foreach ($values as $property => $value) {
            $convert = new Convert($property);

            $camelProperty = $convert->toCamel();

            if (property_exists($instance, $property)) {
                $instance->{$property} = $value;
            } elseif (property_exists($instance, $camelProperty)) {
                $instance->{$camelProperty} = $value;
            }
        }

        return $instance;
    }

    /**
     * @return array
     * @throws CaseConverterException
     */
    public function serialize(): array
    {
        return GA4Helper::serialize($this);
    }

    /**
     * @return array
     * @throws CaseConverterException
     */
    public function jsonSerialize(): array
    {
        return $this->serialize();
    }

    /**
     * @param string $name
     * @return mixed
     * @throws CaseConverterException
     */
    public function __get(string $name)
    {
        $convert = new Convert($name);

        return $this->{$convert->toCamel()};
    }

    /**
     * @param string $name
     * @return bool
     * @throws CaseConverterException
     */
    public function __isset(string $name): bool
    {
        $convert = new Convert($name);

        return isset($this->{$convert->toCamel()});
    }

    /**
     * @param string $name
     * @param $value
     * @return void
     * @throws CaseConverterException
     */
    public function __set(string $name, $value)
    {
        $convert = new Convert($name);

        $this->{$convert->toCamel()} = $value;
    }

    /**
     * @param string $name
     * @return void
     * @throws CaseConverterException
     */
    public function __unset(string $name)
    {
        $convert = new Convert($name);

        unset($this->{$convert->toCamel()});
    }
}
