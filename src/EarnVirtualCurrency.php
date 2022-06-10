<?php

namespace DmtSoftware\GA4Events;

class EarnVirtualCurrency extends GA4Event
{
    public const EVENT = 'earn_virtual_currency';

    public ?string $virtual_currency_name = null;
    public ?float $value = null;
}
