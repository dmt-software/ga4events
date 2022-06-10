<?php

namespace DMT\GA4Events;

class ViewItemList extends GA4Event
{
    public const EVENT = 'view_item_list';

    public ?string $item_list_id = null;
    public ?string $item_list_name = null;

    use HasItems;
}
