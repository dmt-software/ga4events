<?php

namespace DmtSoftware\GA4Events;

class Share extends GA4Event
{
    public const EVENT = 'share';

    public ?string $method = null;
    public ?string $content_type = null;
    public ?string $item_id = null;
}
