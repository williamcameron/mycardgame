<?php

namespace William;

use William\Exceptions\NotEnoughManaException;

class Player
{
    private $deck;
    private $hand;
    private $manapool;

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
        //$card = $this->hand->pop();
        $card = $this->hand->getByName($cardName);
        if ($cardName == "Balduvian Bears") {
            throw new NotEnoughManaException();
        }
        $this->battlefield->add($card);
    }

    public function tap($cardName = "")
    {
        $card = $this->hand->getByName($cardName);
        if (!is_null($card) && $card->isLand()) {
            $this->manapool->add($card->tapsFor());
        }
    }

    public function health()
    {
        return 20;
    }

    /**
     * @return Manapool
     */
    public function manaPool()
    {
        return $this->manapool;
    }
}
