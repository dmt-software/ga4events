<?php

namespace DMT\GA4Events;

class Login extends GA4Event
{
    public const EVENT = 'login';

    public ?string $method = null;
}
