<?php

namespace App\ItemTypes;

use App\Item;

class NormalItemType
{
    public function nextDay(Item $item)
    {
        $qualityDelata = -1;
        $sellInDelata = -1;

        if ($item->sellIn < 1) {
            $qualityDelata = -2;
        }

        $item->quality = $item->quality + $qualityDelata;
        $item->sellIn = $item->sellIn + $sellInDelata;
    }
}