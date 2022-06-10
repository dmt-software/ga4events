<?php

namespace DMT\GA4Events;

class Refund extends GA4Event
{
    public const EVENT = 'refund';

    public string $currency;
    public string $transactionId;
    public float $value;
    public ?string $affiliation = null;
    public ?string $coupon = null;
    public ?float $shipping = null;
    public ?float $tax = null;

    use HasItems;
}
