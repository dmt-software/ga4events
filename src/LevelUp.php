<?php

namespace DmtSoftware\GA4Events;

class LevelUp extends GA4Event
{
    public const EVENT = 'level_up';

    public ?int $level = null;
    public ?string $character = null;
}
