<?php

namespace William\Cards;

class BasicLand extends Card
{
    protected $taps_for;
  
    public function tapsFor()
    {
        return $this->taps_for;
    }
}
