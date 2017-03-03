<?php

namespace William\Cards;

class Creature extends Card
{
  protected $toughness;
  protected $power;
  
  public function toughness()
  {
    return $this->toughness;
  }
  
  public function power()
  {
    return $this->power;
  }
  
}
