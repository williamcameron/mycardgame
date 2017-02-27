<?php
	namespace William;

	use Illuminate\Support\Collection;

	class Deck {
		private $cards;
		private $drawn;
		
		public function __construct(){
			$cards = array();
			for($x=0;$x<60;$x++){
				$cards[] = new Card("Forest");
			}
			$this->cards = new Collection($cards);
			$this->drawn = new Collection();
		}
		public function cards(){
			return $this->cards;
		}

		public function draw($number=1) {
			if($number>1){
				$cards = array();
				while($number>0){
					$number--;
					$card = $this->cards->pop();
					$this->drawn->push($card);
					$cards[] = $card;
				}
			return $cards;	
			}else{
			$card = $this->cards->pop();
			$this->drawn->push($card);
			return $card;
			}
		}
		
		public function size(){
			return count($this->cards);
		}
	}
