<?php

namespace DMT\GA4Events;

class GenerateLead extends GA4Event
{
    public const EVENT = 'generate_lead';

    public string $currency;
    public float $value;
}
