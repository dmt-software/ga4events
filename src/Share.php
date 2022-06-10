<?php

namespace DMT\GA4Events;

class Share extends GA4Event
{
    public const EVENT = 'share';

    public ?string $method = null;
    public ?string $contentType = null;
    public ?string $itemId = null;
}
