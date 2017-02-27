<?php
	namespace William;
	
	use Illuminate\Support\Collection;
	
	class Game {
		private $players;
		private $started;
		
		public function __construct(){
			$this->players = new Collection;
			$this->started = false;
		}
		
		public function start(){
			if($this->players->count() == 0) {
				throw new Exceptions\NoPlayersException;
			}elseif($this->players->count() == 1){
				throw new Exceptions\NotEnoughPlayersException;
			}
			
			$this->started = true;
		}
		
		public function drawHands(){
			foreach($this->players as $player){
				$player->deck()->draw(7);
			}
		}
		
		public function players(){
			return $this->players;
		}
		
		public function addPlayer(Player $player){
			$this->players->push($player);
		}

		public function started(){
			return $this->started;
		}
	}
