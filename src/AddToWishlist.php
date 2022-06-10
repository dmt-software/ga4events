<?php

namespace DMT\GA4Events;

class AddToWishlist extends GA4Event
{
    use HasItems;

    public const EVENT = 'add_to_wishlist';

    public string $currency;
    public float $value;
}
