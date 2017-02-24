<?php
	class DeckTest extends PHPUnit_Framework_TestCase {
		/** @test */
		public function deck_is_a_deck(){
			$deck = new William\Deck;
			$this->assertInstanceOf("William\Deck", $deck);
		}
	}
