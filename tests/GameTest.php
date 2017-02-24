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
		
		/** @test 
		  * @expectedException William\Exceptions\NoPlayersException
		  */
		public function game_with_no_players_wont_start(){
			$game = new William\Game;
			$game->start();
		}
		
		/** @test */
		public function game_with_two_players_starts(){
			$game = new William\Game;
			$game->addPlayer(new William\Player);
			$game->addPlayer(new William\Player);
			$game->start();
			$this->assertTrue($game->started());
		}
		
	}
