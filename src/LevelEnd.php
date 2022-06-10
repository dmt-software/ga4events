<?php

namespace DMT\GA4Events;

class LevelEnd extends GA4Event
{
    public const EVENT = 'level_end';

    public ?string $levelName = null;
    public ?bool $success = null;
}
