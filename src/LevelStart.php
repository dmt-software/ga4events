<?php

namespace DMT\GA4Events;

class LevelStart extends GA4Event
{
    public const EVENT = 'level_start';

    public ?string $level_name = null;
}
