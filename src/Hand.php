<?php

namespace William;

use Illuminate\Support\Collection;

class Hand
{
  private $cards;
  public function cards(){
    return $this->cards;
  }
    public function __construct()
    {
        $this->cards = new Collection;
    }
  
    public function add($card)
    {
        $this->cards->push($card);
    }
  
    public function size()
    {
        return $this->cards->count();
    }
    
}
