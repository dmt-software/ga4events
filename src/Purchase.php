<?php

namespace DMT\GA4Events;

class Purchase extends GA4Event
{
    use HasItems;

    public const EVENT = 'purchase';

    public string $currency;
    public string $transactionId;
    public float $value;
    public ?string $affiliation = null;
    public ?string $coupon = null;
    public ?float $shipping = null;
    public ?float $tax = null;
}
