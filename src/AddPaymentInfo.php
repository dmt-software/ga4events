<?php

namespace DmtSoftware\GA4Events;

class AddPaymentInfo extends GA4Event
{
    public const EVENT = 'add_payment_info';

    public string $currency;
    public float $value;
    public ?string $coupon = null;
    public ?string $payment_type = null;

    use HasItems;
}
