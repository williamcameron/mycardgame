<?php
	class GameTest extends PHPUnit_Framework_TestCase {
		/** @test */
		public function php_unit_works(){
			$this->assertTrue(true);
		}
		
		/** @test */
		public function game_is_a_game_object(){
			$game = new William\Game;
			$this->assertInstanceOf("William\Game", $game);
		}
	}
