<?php

namespace William;

use Illuminate\Support\Collection;

class Game
{
    private $players;
    private $started;
    private $turn;

    public function __construct()
    {
        $this->players = new Collection();
        $this->started = false;
        $this->turn = 0;
    }

    public function activePlayer()
    {
        return $this->players->all()[($this->turn + 1) % 2];
    }

    public function start()
    {
        if ($this->players->count() == 0) {
            throw new Exceptions\NoPlayersException();
        } elseif ($this->players->count() == 1) {
            throw new Exceptions\NotEnoughPlayersException();
        }

        $this->started = true;
        $this->turn = 1;
    }

    public function drawOpeningHands()
    {
        foreach ($this->players as $player) {
            for ($x = 0; $x < 7; $x++) {
                $player->hand()->add($player->deck()->drawCard());
            }
        }
    }

    public function players()
    {
        return $this->players;
    }

    public function addPlayer(Player $player)
    {
        $this->players->push($player);
    }

    public function started()
    {
        return $this->started;
    }

    public function turn()
    {
        return $this->turn;
    }

    public function endTurn()
    {
        $this->turn++;
    }
}
