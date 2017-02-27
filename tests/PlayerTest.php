<?php
	class PlayerTest extends PHPUnit_Framework_TestCase {

		/** @test */
		public function player_is_a_player(){
			$player = new William\Player;
			$this->assertInstanceOf("William\Player", $player);
		}
		
		/** @test */
		public function player_has_a_deck(){
			//
		}
	}
