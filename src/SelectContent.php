<?php

namespace DMT\GA4Events;

class SelectContent extends GA4Event
{
    public const EVENT = 'select_content';

    public ?string $contentType = null;
    public ?string $itemId = null;
}
