<?php
namespace William;

use Illuminate\Support\Collection;

class Manapool extends Collection
{
    public function add($color_name="green")
    {
        $this->push(new Mana(Mana::findByName($color_name)));
    }

    public function size()
    {
        return count($this->items);
    }
}
