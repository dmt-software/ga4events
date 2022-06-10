<?php

namespace DMT\GA4Events;

class SelectItem extends GA4Event
{
    public const EVENT = 'select_item';

    public ?string $item_list_id;
    public ?string $item_list_name;

    use HasItems;
}
