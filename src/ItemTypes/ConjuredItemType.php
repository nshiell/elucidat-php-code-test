<?php

namespace App\ItemTypes;

use App\Item;

class ConjuredItemType
{
    public function itemIsThisType(Item $item): bool
    {
        return ($item->name == 'Conjured Mana Cake');
    }

    public function nextDay(Item $item)
    {
        $qualityDelata = -2;
        $sellInDelata = -1;

        if ($item->sellIn < 1) {
            $qualityDelata = -4;
        }

        // The Quality of an item is never negative
        if ($item->quality + $qualityDelata < 0) {
            $qualityDelata = 0;
        }

        $item->quality = $item->quality + $qualityDelata;
        $item->sellIn = $item->sellIn + $sellInDelata;
    }
}