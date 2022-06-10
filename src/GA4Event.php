<?php

namespace DmtSoftware\GA4Events;

use Discount\Core\Domain\ValueObject\AValueObject;

class GA4Event extends GA4Object
{
    public const EVENT = 'event';

    public function toDataLayer(): array
    {
        return [
            static::EVENT,
            parent::toDataLayer()
        ];
    }
}
