<?php

namespace DMT\GA4Events;

class AddToCart extends GA4Event
{
    use HasItems;

    public const EVENT = 'add_to_cart';

    public string $currency;
    public float $value;
}
