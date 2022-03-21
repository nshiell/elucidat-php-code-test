<?php

namespace App\ItemTypes;

use App\Item;

class SulfurasItemType
{
    public function itemIsThisType(Item $item): bool
    {
        return ($item->name == 'Sulfuras, Hand of Ragnaros');
    }

    /**
     * "Sulfuras", being a legendary item, never has to be sold or decreases in Quality
     */
    public function nextDay(Item $item) {}
}