<?php

namespace DMT\GA4Events;

class SignUp extends GA4Event
{
    public const EVENT = 'sign_up';

    public ?string $method = null;
}
