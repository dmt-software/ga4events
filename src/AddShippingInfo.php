<?php

namespace DmtSoftware\GA4Events;

class AddShippingInfo extends GA4Event
{
    public const EVENT = 'add_shipping_info';

    public string $currency;
    public float $value;
    public ?string $coupon = null;
    public ?string $shipping_tier = null;

    use HasItems;
}
