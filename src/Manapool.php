<?php
namespace William;

class Manapool
{
    private $mana;

    public function add()
    {
        $this->mana++;
    }

    public function size()
    {
        return $this->mana;
    }
}
