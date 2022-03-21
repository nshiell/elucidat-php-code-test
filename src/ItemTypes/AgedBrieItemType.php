<?php

namespace App\ItemTypes;

use App\Item;

class AgedBrielItemType
{
    public function nextDay(Item $item)
    {
        $qualityDelata = 1;
        $sellInDelata = -1;

        // updates Brie items on the sell date
        if ($item->sellIn < 1) {
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