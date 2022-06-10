<?php

namespace DMT\GA4Events;

class ViewItemList extends GA4Event
{
    public const EVENT = 'view_item_list';

    public ?string $itemListId = null;
    public ?string $itemListName = null;

    use HasItems;
}
