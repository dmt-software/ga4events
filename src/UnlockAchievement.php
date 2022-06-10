<?php

namespace DMT\GA4Events;

class UnlockAchievement extends GA4Event
{
    public const EVENT = 'unlock_achievement';

    public string $achievementId;
}
