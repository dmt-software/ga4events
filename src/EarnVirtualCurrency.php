<?php

namespace DMT\GA4Events;

class EarnVirtualCurrency extends GA4Event
{
    public const EVENT = 'earn_virtual_currency';

    public ?string $virtualCurrencyName = null;
    public ?float $value = null;
}
