<?php
	namespace William;

	class Player {
		
		private $deck;
		private $hand;
		
		public function __construct(){
			$this->deck = new Deck;
			$this->hand = new Hand;
		}
		
		public function deck() {
			return $this->deck;
		}
		
		public function hand(){
			return $this->hand;
		}
	}
