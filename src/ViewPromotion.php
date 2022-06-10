<?php

namespace DMT\GA4Events;

class ViewPromotion extends GA4Event
{
    public const EVENT = 'view_promotion';

    public ?string $creative_name = null;
    public ?string $creative_slot = null;
    public ?string $location_id = null;
    public ?string $promotion_id = null;
    public ?string $promotion_name = null;

    use HasItems;
}
