<?php

namespace DMT\GA4Events;

class SelectPromotion extends GA4Event
{
    use HasItems;

    public const EVENT = 'select_promotion';

    public ?string $creativeName = null;
    public ?string $creativeSlot = null;
    public ?string $locationId = null;
    public ?string $promotionId = null;
    public ?string $promotionName = null;
}
