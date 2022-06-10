<?php

namespace DmtSoftware\GA4Events;

class Refund extends GA4Event
{
    public const EVENT = 'refund';

    public string $currency;
    public string $transaction_id;
    public float $value;
    public ?string $affiliation = null;
    public ?string $coupon = null;
    public ?float $shipping = null;
    public ?float $tax = null;

    use HasItems;
}
