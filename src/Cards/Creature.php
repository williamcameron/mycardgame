<?php

namespace William\Cards;

class Creature extends Card
{
  protected $toughness;
  
  public function toughness()
  {
    return $this->toughness;
  }
  protected $power;
  
  public function power()
  {
    return $this->power;
  }
  
  public function isCreature(){
    return true;
  }
  
}
