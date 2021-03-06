<?php

namespace DMT\GA4Events;

class AddShippingInfo extends GA4Event
{
    use HasItems;

    public const EVENT = 'add_shipping_info';

    public string $currency;
    public float $value;
    public ?string $coupon = null;
    public ?string $shippingTier = null;
}
