<?php

namespace William;

class Manapool extends CardCollection
{
    public function add($colorName = 'green')
    {
        $this->push(new Mana(Mana::findByName($colorName)));
    }
}
