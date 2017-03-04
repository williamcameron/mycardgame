<?php

namespace William;

class Player
{
    private $deck;
    private $hand;

    public function __construct()
    {
        $this->deck = new Deck();
        $this->hand = new Hand();
        $this->battlefield = new Battlefield();
    }

    public function deck()
    {
        return $this->deck;
    }

    public function hand()
    {
        return $this->hand;
    }

    public function play($cardName)
    {
        $card = $this->hand->cards()->pop();
        $this->battlefield->add($card);
    }

    public function tap()
    {
    }

    public function health()
    {
        return 20;
    }

    public function manaPool()
    {
        return [1];
    }
}
