<?php

namespace William\Cards;

class BasicLand extends Card
{
    protected $tapsFor;

    public function tapsFor()
    {
        return $this->tapsFor;
    }
}
