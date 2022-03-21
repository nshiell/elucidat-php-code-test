<?php

namespace App\ItemTypes;

use App\Item;

class BackstagelItemType
{
    public function nextDay(Item $item)
    {
        $qualityDelata = 1;
        $sellInDelata = -1;

        if ($item->sellIn <= 5) {
            // and by 3 when there are 5 days or less
            $qualityDelata = 3;
        } elseif ($item->sellIn <= 10) {
            // Quality increases by 2 when there are 10 days or less
            $qualityDelata = 2;
        }

        // The Quality of an item is never more than 50
        if ($item->quality + $qualityDelata > 50) {
            $qualityDelata = 50 - $item->quality;
        }

        $item->quality = $item->quality + $qualityDelata;
        $item->sellIn = $item->sellIn + $sellInDelata;
    }
}