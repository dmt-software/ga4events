<?php

namespace DMT\GA4Events;

trait HasItems
{
    /**
     * @var array|Item[]
     */
    public array $items = [];

    /**
     * @param Item $item
     * @return static
     */
    public function addItem(Item $item): self
    {
        $this->items[] = $item;

        return $this;
    }
}
