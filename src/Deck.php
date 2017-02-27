<?php
	namespace William;

	use Illuminate\Support\Collection;

	class Deck {
		private $cards;
		
		public function __construct(){
			$cards = array();
			for($x=0;$x<60;$x++){
				$cards[] = new Card("Forest");
			}
			$this->cards = new Collection($cards);
		}
		public function cards(){
			return $this->cards;
		}

		public function draw(){
			return $this->cards->pop();
		}
	}
