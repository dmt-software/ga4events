<?php

namespace DMT\GA4Events;

class ViewPromotion extends GA4Event
{
    public const EVENT = 'view_promotion';

    public ?string $creativeName = null;
    public ?string $creativeSlot = null;
    public ?string $locationId = null;
    public ?string $promotionId = null;
    public ?string $promotionName = null;

    use HasItems;
}
