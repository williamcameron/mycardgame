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
			$this->assertFalse($game->started());
			$game->start();
			$this->fail("Game with no players started.  Should have failed.");
		}
		
		/** @test */
		public function game_with_two_players_starts(){
			$game = new William\Game;
			$game->addPlayer(new William\Player);
			$game->addPlayer(new William\Player);
			$game->start();
			$this->assertTrue($game->started());
		}
		
		/** @test 
		  * @expectedException William\Exceptions\NotEnoughPlayersException
			*/
		public function game_with_one_player_wont_start(){
			$game = new William\Game;
			$game->addPlayer(new William\Player);
			$game->start();
			$this->fail("Game with one player started. Should have failed.");
		}
		
		/** @test */
		public function player_drawing_opening_hand_has_7_cards_in_hand(){
			$game = new William\Game;
			$game->addPlayer(new William\Player);
			$game->addPlayer(new William\Player);
			$game->start();
			
			$game->drawHands();
			
			$this->assertEquals(7, $game->players()->first()->hand()->size());
		}
		
		/** @test */
		public function player_drawing_opening_hand_leaves_53_cards_in_deck(){
			$game = new William\Game;
			$game->addPlayer(new William\Player);
			$game->addPlayer(new William\Player);
			$game->start();
			
			$game->drawHands();
			
			$this->assertEquals(53, $game->players()->first()->deck()->size());
		}
		
		/** @test */
		public function player_can_tap_basic_land_for_mana(){
			$game = new William\Game;
			$game->addPlayer(new William\Player);
			$game->addPlayer(new William\Player);
			$game->start();
			
			$game->drawHands();
			
			$game->players()->first()->play("Forest");
			$game->players()->first()->tap("Forest");
			
			$this->assertCount(1, $game->players()->first()->manaPool());
			
		}
		
		/** @test */
		public function players_start_game_with_20_health(){
			$game = new William\Game;
			$game->addPlayer(new William\Player);
			$game->addPlayer(new William\Player);
			$game->start();
			
			foreach($game->players() as $player){
				$this->assertEquals(20, $player->health());
			}
			
		}
		
	}
