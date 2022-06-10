<?php

namespace DMT\GA4Events;

class SelectItem extends GA4Event
{
    public const EVENT = 'select_item';

    public ?string $itemListId;
    public ?string $itemListName;

    use HasItems;
}
