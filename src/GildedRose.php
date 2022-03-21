<?php

namespace App;
use App\ItemTypes;

class GildedRose
{
    private $items;
    private $itemTypes = [];

    public function __construct(array $items, array $itemTypes = null)
    {
        $this->items = $items;

        if ($itemTypes === null) {
            $itemTypes = [
                new ItemTypes\NormalItemType,
                new ItemTypes\AgedBrieItemType,
                new ItemTypes\BackstageItemType,
                new ItemTypes\ConjuredItemType,
                new ItemTypes\NormalItemType,
                new ItemTypes\SulfurasItemType,
            ];
        }

        $this->itemTypes = $itemTypes;
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
            $notFound = true;
            foreach ($this->itemTypes as $type) {
                if ($type->itemIsThisType($item)) {
                    $type->nextDay($item);
                    $notFound = false;
                    break;
                }
            }

            if ($notFound) {
                throw new \UnexpectedValueException(
                    sprintf('ItemType for %s was not found', $item));
            }
        }
    }
}
