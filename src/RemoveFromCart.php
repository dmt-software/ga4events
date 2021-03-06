<?php

namespace DMT\GA4Events;

class RemoveFromCart extends GA4Event
{
    use HasItems;

    public const EVENT = 'remove_from_cart';

    public string $currency;
    public float $value;
}
