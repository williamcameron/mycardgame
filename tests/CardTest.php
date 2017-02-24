<?php
	class CardTest extends PHPUnit_Framework_TestCase {
		/** @test */
		public function card_is_a_william_card(){
			$card = new William\Card;
			$this->assertInstanceOf("William\Card", $card);
		}
	}
