<?php

namespace DMT\GA4Events;

class ViewItem extends GA4Event
{
    use HasItems;

    public const EVENT = 'view_item';

    public string $currency;
    public float $value;
}
