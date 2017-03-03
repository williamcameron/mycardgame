<?php
	namespace William;
	
	use William\Cards\BasicLand;
	use Illuminate\Support\Collection;

	class Deck {
		private $cards;
		private $drawn;
		
		public function __construct(){
			$cards = array();
			for($x=0;$x<60;$x++){
				$cards[] = BasicLand::make("Forest");
			}
			$this->cards = new Collection($cards);
			$this->drawn = new Collection();
		}
		
		public function cards(){
			return $this->cards;
		}
		
		public function drawCard(){
			return $this->draw(1)->first();
		}
		
		public function draw($number=1) {
				$cards = new Collection;
				while($number>0) {
					if($this->cards->count() <= 0){
						throw new Exceptions\NoCardsLeftException;
					}
					$number--;
					$card = $this->cards->pop();
					$this->drawn->push($card);
					$cards->push($card);
				}
			  return $cards;
		}
		
		public function size(){
			return count($this->cards);
		}
	}
