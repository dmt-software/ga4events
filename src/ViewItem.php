<?php

namespace DmtSoftware\GA4Events;

class ViewItem extends GA4Event
{
    public const EVENT = 'view_item';

    public string $currency;
    public float $value;

    use HasItems;
}
