<?php

namespace App\ItemTypes;

use App\Item;

abstract class AbstractItemType
{
    /**
     * Return trye if thes class can handle the $item
     */
    abstract public function itemIsThisType(Item $item): bool;

    /**
     * Some Types don't actually increase or decrease quality or sellIn
     * Otherwise replace extend this method as needed
     */
    public function nextDay(Item $item) {}
}