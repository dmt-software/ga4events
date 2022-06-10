<?php

namespace DMT\GA4Events;

class JoinGroup extends GA4Event
{
    public const EVENT = 'join_group';

    public ?string $group_id = null;
}
