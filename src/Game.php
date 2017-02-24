<?php
	namespace William;
	
	use Illuminate\Support\Collection;
	
	class Game {
		private $players;
		
		public function __construct(){
			$this->players = new Collection;
		}
		
		public function start(){
			if($this->players->count() == 0) {
				throw new Exceptions\NoPlayersException;
			}
		}

		public function addPlayer(Player $player){
			$this->players->push($player);
		}

		public function started(){
			return true;
		}
	}
