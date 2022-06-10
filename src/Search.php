<?php

namespace DmtSoftware\GA4Events;

class Search extends GA4Event
{
    public const EVENT = 'search';

    public string $search_term;
}
