<?php

namespace App\ItemTypes;

use App\Item;

class BackstagelItemType
{
    public function nextDay(Item $item)
    {
        $qualityDelata = 1;
        $sellInDelata = -1;

        $item->quality = $item->quality + $qualityDelata;
        $item->sellIn = $item->sellIn + $sellInDelata;
    }
}