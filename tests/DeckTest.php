<?php
	class DeckTest extends PHPUnit_Framework_TestCase {
		/** @test */
		public function deck_is_a_deck(){
			$deck = new William\Deck;
			$this->assertInstanceOf("William\Deck", $deck);
		}
		
		/** @test */
		public function deck_has_60_cards_by_default(){
			$deck = new William\Deck;
			$this->assertCount(60, $deck->cards());
		}
		
		/** @test */
		public function drawing_from_deck_gives_a_card(){
			$deck = new William\Deck;
			$card = $deck->draw();
			$this->assertInstanceOf("William\Card", $card);
		}
	}
