<?php

namespace App\ItemTypes;

use App\Item;

class BackstagelItemType
{
    public function nextDay(Item $item)
    {
        $qualityDelata = 1;
        $sellInDelata = -1;

        // Quality increases by 2 when there are 10 days or less
        if ($item->sellIn <= 10) {
            $qualityDelata = 2;
        }

        $item->quality = $item->quality + $qualityDelata;
        $item->sellIn = $item->sellIn + $sellInDelata;
    }
}