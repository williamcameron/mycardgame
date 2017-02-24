<?php
	namespace William;

	class Card {
		
		private $tapped;
		private $name;
		
		public function __construct($name=""){
			$this->name = $name;
			$this->tapped = false;
		}
		
		public function isLand(){
			return true;
		}
		
		public function isCreature(){
			return false;
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
