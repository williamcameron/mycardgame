<?php
	namespace William\Cards;

	class Card {
		
		private $tapped;
		private $name;
		
		private $land;
		private $creature;
		
		
		
		public static function make($name){
    	return new self($name);
  	}
		
		
		
		public function __construct($name=""){
			$this->name = $name;
			$this->tapped = false;
			
			if($name) {
				$this->loadCardByName($name);
			}
		}
		
		public static function makeCard($attributes=[]){
			$card = new Card;
			foreach($attributes as $attribute => $value){
				$card->{$attribute} = $value;
			}
			return $card;
		}
		private function loadCardByName($name){
			// TODO: Extract to Database or external file, cant have this inline
			$cards = [];
			$cards["Forest"] = ["land" => true];
			$cards["Balduvian Bears"] = ["creature" => true, "cost" => "1G", "power" => 2, "toughness" => 2];
			$cards["Norwood Ranger"] = ["creature" => true, "cost" => "G", "power" => 1, "toughness" => 2];
			
			$attributes = $cards[$name];
			foreach($attributes as $attribute => $value){
				$this->{$attribute} = $value;
			}
		}
		
		public function isLand() {
			return (bool)$this->land;
		}
		
		public function isCreature() {
			return (bool)$this->creature;
		}
		public function toughness(){
			return $this->toughness;
		}
		public function tap() {
			$this->tapped = !$this->tapped;
		}
		
		public function tapped(){
			return $this->tapped;
		}
		public function unTap(){
			$this->tapped = false;
		}
	}