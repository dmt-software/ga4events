<?php

namespace DmtSoftware\GA4Events;

use phpDocumentor\Reflection\Types\Self_;

trait HasItems
{
    public array $items = [];

    /**
     * @param GA4Object $item
     * @return static
     */
    public function addItem(GA4Object $item): self
    {
        $this->items[] = $item;

        return $this;
    }
}
