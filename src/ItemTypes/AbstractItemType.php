<?php

namespace App\ItemTypes;

use App\Item;

abstract class AbstractItemType
{
    abstract public function itemIsThisType(Item $item): bool;

    public function nextDay(Item $item) {}
}