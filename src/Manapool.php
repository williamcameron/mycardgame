<?php

namespace William;

class Manapool extends CardCollection
{
    public function add($color_name = 'green')
    {
        $this->push(new Mana(Mana::findByName($color_name)));
    }
	
}
