<?php
	class CardTest extends PHPUnit_Framework_TestCase {
		/** @test */
		public function card_is_a_william_card(){
			$card = new William\Card;
			$this->assertInstanceOf("William\Card", $card);
		}
		
		/** @test */
		public function basic_land_card_is_type_land(){
			$card = new William\Card("Island");
			$this->assertTrue($card->isLand());
		}
	}
