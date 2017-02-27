<?php
	namespace William;

	class Card {
		
		private $tapped;
		private $name;
		
		private $land;
		private $creature;
		
		public function __construct($name=""){
			$this->name = $name;
			$this->tapped = false;
			
			$this->loadCardByName($name);
			
		}
		
		private function loadCardByName($name){
			// TODO: Extract to Database or external file, cant have this inline
			$cards = array();
			$cards["Forest"] = array("land" => true);
			$cards["Balduvian Bears"] = array("creature" => true, "cost" => "1G", "power" => 2, "toughness" => 2);
			
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
			if($this->name == "Forest"){
			  return false;
			}else{
				return true;
			}
		}
		
		public function tap(){
			$this->tapped = true;
		}
		
		public function tapped(){
			return $this->tapped;
		}
		public function unTap(){
			$this->tapped = false;
		}
	}
