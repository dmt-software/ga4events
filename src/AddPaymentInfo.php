<?php

namespace DMT\GA4Events;

class AddPaymentInfo extends GA4Event
{
    use HasItems;

    public const EVENT = 'add_payment_info';

    public string $currency;
    public float $value;
    public ?string $coupon = null;
    public ?string $paymentType = null;
}
