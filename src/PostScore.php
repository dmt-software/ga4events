<?php

namespace DmtSoftware\GA4Events;

class PostScore extends GA4Event
{
    public const EVENT = 'post_score';

    public ?int $score = null;
    public ?int $level = null;
    public ?string $character = null;
}
