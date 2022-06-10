<?php

namespace DmtSoftware\GA4Events;

class AddToWishlist extends GA4Event
{
    public const EVENT = 'add_to_wishlist';

    public string $currency;
    public float $value;

    use HasItems;
}
