<?php

namespace DMT\GA4Events;

class BeginCheckout extends GA4Event
{
    use HasItems;

    public const EVENT = 'begin_checkout';

    public string $currency;
    public float $value;
    public ?string $coupon = null;
}
