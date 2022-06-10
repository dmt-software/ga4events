<?php

namespace DmtSoftware\GA4Events;

class GA4Event extends GA4Object
{
    public const EVENT = 'event';

    /**
     * @return array
     */
    public function toDataLayer(): array
    {
        return [
            static::EVENT,
            parent::toDataLayer()
        ];
    }
}
