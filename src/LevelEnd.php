<?php

namespace DMT\GA4Events;

class LevelEnd extends GA4Event
{
    public const EVENT = 'level_end';

    public ?string $level_name = null;
    public ?bool $success = null;
}
