<?php

class GameTest extends TestCase
{
    /** @test */
    public function php_unit_works()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function game_is_a_game_object()
    {
        $game = new William\Game();
        $this->assertInstanceOf("William\Game", $game);
    }

    /** @test
     * @expectedException William\Exceptions\NoPlayersException
     */
    public function game_with_no_players_wont_start()
    {
        $game = new William\Game();
        $this->assertFalse($game->started());
        $game->start();
        $this->fail('Game with no players started.  Should have failed.');
    }

    /** @test */
    public function game_with_two_players_starts()
    {
        $game = $this->startTestGame();
        $this->assertTrue($game->started());
    }

    /** @test
     * @expectedException William\Exceptions\NotEnoughPlayersException
     */
    public function game_with_one_player_wont_start()
    {
        $game = new William\Game();
        $game->addPlayer(new William\Player());
        $game->start();
        $this->fail('Game with one player started. Should have failed.');
    }

    /** @test */
    public function active_player_method_returns_player_one_correctly()
    {
        $game = $this->startTestGame();
        $this->assertSame($game->activePlayer(), $game->players()->first());
    }

    /** @test */
    public function start_of_game_it_is_turn_1()
    {
        $game = $this->startTestGame();
        $this->assertEquals(1, $game->turn());
    }

    /** @test */
    public function active_player_returns_player_two_on_turn_two()
    {
        $game = $this->startTestGame();
        $game->endTurn();
        $this->assertNotSame($game->activePlayer(), $game->players()->first());
        $this->assertSame($game->activePlayer(), $game->players()[1]);

    }


    /** @test */
    public function player_drawing_opening_hand_has_7_cards_in_hand()
    {
        $game = $this->startTestGame();

        $game->drawOpeningHands();

        $this->assertEquals(7, $game->activePlayer()->hand()->size());
    }

    /** @test */
    public function player_drawing_opening_hand_leaves_53_cards_in_deck()
    {
        $game = $this->startTestGame();

        $game->drawOpeningHands();

        $this->assertEquals(53, $game->activePlayer()->deck()->size());
    }

    /** @test */
    public function playing_a_card_reduces_hand_size()
    {
        $game = $this->startTestGame();

        $game->drawOpeningHands();
        $game->activePlayer()->play("Forest");
        $this->assertEquals(6, $game->activePlayer()->hand()->size());
    }

    /** @test */
    public function playing_two_cards_reduces_hand_size()
    {
        $game = $this->startTestGame();

        $game->drawOpeningHands();
        $game->activePlayer()->play("Forest");
        $game->activePlayer()->play("Forest");
        $this->assertEquals(5, $game->activePlayer()->hand()->size());
    }

    /** @test */
    public function playing_three_cards_reduces_hand_size()
    {
        $game = $this->startTestGame();

        $game->drawOpeningHands();
        $game->activePlayer()->play("Forest");
        $game->activePlayer()->play("Forest");
        $game->activePlayer()->play("Forest");

        $this->assertEquals(4, $game->activePlayer()->hand()->size());
    }

    /** @test */
    public function player_can_tap_basic_land_for_mana()
    {
        $game = $this->startTestGame();

        $game->drawOpeningHands();

        $game->activePlayer()->play('Forest');
        $game->activePlayer()->tap('Forest');

        $this->assertEquals(1, $game->activePlayer()->manaPool()->size());
    }
/** @test */
    public function tapping_two_land_adds_2_mana_to_pool()
    {
        $game = $this->startTestGame();

        $game->drawOpeningHands();

        $game->activePlayer()->play('Forest');
        $game->activePlayer()->play('Mountain');
        $game->activePlayer()->tap('Forest');
        $game->activePlayer()->tap('Mountain');

        $this->assertEquals(2, $game->activePlayer()->manaPool()->size());
    }

    /**
     * @test
     * @expectedException William\Exceptions\NotEnoughManaException
     */
    public function cant_play_creature_with_no_mana()
    {
        $game = $this->startTestGame();

        $game->drawOpeningHands();

        $this->assertEquals(0, $game->activePlayer()->manaPool()->size());

        $game->activePlayer()->play($this->basicCreatureCard()->name());

//        $this->fail("Possible to play creature with not enough mana.");
    }

    /** @test */
    public function players_start_game_with_20_health()
    {
        $game = $this->startTestGame();

        foreach ($game->players() as $player) {
            $this->assertEquals(20, $player->health());
        }
    }
}
