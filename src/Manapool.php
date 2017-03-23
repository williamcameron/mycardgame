<?php
namespace William;

use Illuminate\Support\Collection;

class Manapool extends CardCollection
{
    public function add($color_name = "green")
    {
        $this->push(new Mana(Mana::findByName($color_name)));
    }

    
}
