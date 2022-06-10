<?php

namespace DmtSoftware\GA4Events;

class SelectContent extends GA4Event
{
    public const EVENT = 'select_content';

    public ?string $content_type = null;
    public ?string $item_id = null;
}
