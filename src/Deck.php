<?php
	namespace William;

	use Illuminate\Support\Collection;

	class Deck {
		private $cards;
		
		public function __construct(){
			$cards = array();
			for($x=0;$x<60;$x++){
				$cards[] = new Card;
			}
			$this->cards = new Collection($cards);
		}
		public function cards(){
			return $this->cards;
		}

		public function draw($num=1) {
			if($num == 1){
			return $this->cards->pop();
			} else {
				$cards = [];
				for($x = 0;$x<$num;$x++){
					$cards[] = $this->cards->pop();
				}
				return $cards;
			}
		}
	}
