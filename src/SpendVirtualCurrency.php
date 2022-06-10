<?php

namespace DMT\GA4Events;

class SpendVirtualCurrency extends GA4Event
{
    public const EVENT = 'spend_virtual_currency';

    public float $value;
    public string $virtual_currency_name;
    public ?string $item_name = null;
}
