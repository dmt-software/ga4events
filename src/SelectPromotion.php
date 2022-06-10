<?php

namespace DmtSoftware\GA4Events;

class SelectPromotion extends GA4Event
{
    public const EVENT = 'select_promotion';

    public ?string $creative_name = null;
    public ?string $creative_slot = null;
    public ?string $location_id = null;
    public ?string $promotion_id = null;
    public ?string $promotion_name = null;

    use HasItems;
}
