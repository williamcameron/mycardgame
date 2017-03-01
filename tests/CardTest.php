<?php
	class CardTest extends PHPUnit_Framework_TestCase {
		/** @test */
		public function card_is_a_william_card(){
			$card = new William\Card("Forest");
			$this->assertInstanceOf("William\Card", $card);
		}
		
		/** @test */
		public function basic_land_card_is_type_land(){
			$card = new William\Card("Forest");
			$this->assertTrue($card->isLand());
		}
		
		/** @test */
		public function basic_land_card_is_not_a_creature(){
			$card = new William\Card("Forest");
			$this->assertFalse($card->isCreature());
		}
		
		/** @test */
		public function creature_card_is_not_a_land_card(){
			$card = new William\Card("Balduvian Bears");
			$this->assertFalse($card->isLand());
		}
		
		/** @test */
		public function creature_card_is_type_creature(){
			$card = new William\Card("Balduvian Bears");
			$this->assertTrue($card->isCreature());
		}
		
		/** @test */
		public function not_tapped_by_default(){
			$card = new William\Card("Forest");
			$this->assertFalse($card->tapped());
		}
	
		/** @test */
		public function tapping_taps_card(){
			$card = new William\Card("Forest");
			$card->tap();
			$this->assertTrue($card->tapped());
		}
		
		/** @test */
		public function tapped_card_can_be_untapped(){
			$card = new William\Card("Forest");
			$card->tap();
			$card->unTap();
			$this->assertFalse($card->tapped());
		}
		
		/** @test */
		public function card_untaps_if_double_tapped(){
			$card = new William\Card("Forest");
			$this->assertFalse($card->tapped());
			$card->tap();
			$this->assertTrue($card->tapped());
			$card->tap();
			$this->assertFalse($card->tapped(), "Tapping a tapped Card should untap but has not.");
		}
		
	}
