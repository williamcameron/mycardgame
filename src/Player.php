<?php

namespace William;

use William\Exceptions\NotEnoughManaException;

class Player
{
    private $deck;
    private $hand;

    public function __construct()
    {
        $this->deck = new Deck();
        $this->manapool = new Manapool();
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
        $card = $this->hand->pop();
        //$card = $this->hand->cards()->getByName($cardName);
        if ($cardName == "Balduvian Bears") {
            throw new NotEnoughManaException();
        }
        $this->battlefield->add($card);
    }

    public function tap()
    {
        $this->manapool->add();
    }

    public function health()
    {
        return 20;
    }

    /**
     * @return Collection
     */
    public function manaPool()
    {
        return $this->manapool;
    }
}
