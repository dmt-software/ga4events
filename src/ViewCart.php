<?php

namespace DMT\GA4Events;

class ViewCart extends GA4Event
{
    public const EVENT = 'view_cart';

    public string $currency;
    public float $value;

    use HasItems;
}
