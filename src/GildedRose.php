<?php

namespace App;
use App\ItemTypes;

class GildedRose
{
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function getItem($which = null)
    {
        return ($which === null
            ? $this->items
            : $this->items[$which]
        );
    }

    public function nextDay()
    {
        foreach ($this->items as $item) {
            /** @todo refactor */
            if ($item->name == 'normal') {
                $type = new ItemTypes\NormalItemType();
                $type->nextDay($item);
                break;
            }

            if ($item->name == 'Aged Brie') {
                $type = new ItemTypes\AgedBrielItemType();
                $type->nextDay($item);
                break;
            }

            if ($item->name == 'Sulfuras, Hand of Ragnaros') {
                $type = new ItemTypes\SulfuraslItemType();
                $type->nextDay($item);
                break;
            }

            if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                $type = new ItemTypes\BackstagelItemType();
                $type->nextDay($item);
                break;
            }

            if ($item->name == 'Conjured Mana Cake') {
                $type = new ItemTypes\ConjuredItemType();
                $type->nextDay($item);
                break;
            }

            if ($item->name == 'Conjured Mana Cake') {
                $qualityDayDelata = 2;
                if ($item->quality - $qualityDayDelata < 0) {
                    $qualityDayDelata = 0;
                } elseif ($item->sellIn < 1) {
                    $qualityDayDelata = 4;
                }

                $item->quality = $item->quality - $qualityDayDelata;
                $item->sellIn--;

                if ($item->quality < 0) {
                    $item->quality = 0;
                }

                continue;
            }

            if ($item->name != 'Aged Brie' and $item->name != 'Backstage passes to a TAFKAL80ETC concert') {
                if ($item->quality > 0) {
                    if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                        $item->quality = $item->quality - 1;
                    }
                }
            } else {
                if ($item->quality < 50) {
                    $item->quality = $item->quality + 1;
                    if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->sellIn < 11) {
                            if ($item->quality < 50) {
                                $item->quality = $item->quality + 1;
                            }
                        }
                        if ($item->sellIn < 6) {
                            if ($item->quality < 50) {
                                $item->quality = $item->quality + 1;
                            }
                        }
                    }
                }
            }
            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                $item->sellIn = $item->sellIn - 1;
            }
            if ($item->sellIn < 0) {
                if ($item->name != 'Aged Brie') {
                    if ($item->name != 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->quality > 0) {
                            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                                $item->quality = $item->quality - 1;
                            }
                        }
                    } else {
                        $item->quality = $item->quality - $item->quality;
                    }
                } else {
                    if ($item->quality < 50) {
                        $item->quality = $item->quality + 1;
                    }
                }
            }
        }
    }
}
