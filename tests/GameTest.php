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

    /**
     * @return \William\Game
     */
    private function startTestGame()
    {
        $game = new William\Game();
        $game->addPlayer(new William\Player());
        $game->addPlayer(new William\Player());
        $game->start();
        return $game;
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
    public function player_drawing_opening_hand_has_7_cards_in_hand()
    {
        $game = $this->startTestGame();

        $game->drawOpeningHands();

        $this->assertEquals(7, $game->players()->first()->hand()->size());
    }

    /** @test */
    public function player_drawing_opening_hand_leaves_53_cards_in_deck()
    {
        $game = $this->startTestGame();

        $game->drawOpeningHands();

        $this->assertEquals(53, $game->players()->first()->deck()->size());
    }

    /** @test */
    public function playing_a_card_reduces_hand_size()
    {
        $game = $this->startTestGame();

        $game->drawOpeningHands();
        $game->players()->first()->play("Forest");
        $this->assertEquals(6, $game->players()->first()->hand()->size());
    }

    /** @test */
    public function playing_two_cards_reduces_hand_size()
    {
        $game = $this->startTestGame();

        $game->drawOpeningHands();
        $game->players()->first()->play("Forest");
        $game->players()->first()->play("Forest");
        $this->assertEquals(5, $game->players()->first()->hand()->size());
    }

    /** @test */
    public function playing_three_cards_reduces_hand_size()
    {
        $game = $this->startTestGame();

        $game->drawOpeningHands();
        $game->players()->first()->play("Forest");
        $game->players()->first()->play("Forest");
        $game->players()->first()->play("Forest");

        $this->assertEquals(4, $game->players()->first()->hand()->size());
    }

    /** @test */
    public function player_can_tap_basic_land_for_mana()
    {
        $game = $this->startTestGame();

        $game->drawOpeningHands();

        $game->players()->first()->play('Forest');
        $game->players()->first()->tap('Forest');

        $this->assertEquals(1, $game->players()->first()->manaPool()->size());
    }

    /**
     * @test
     * @expectedException William\Exceptions\NotEnoughManaException
     */
    public function cant_play_creature_with_no_mana()
    {
        $game = $this->startTestGame();

        $game->drawOpeningHands();

        $this->assertEquals(0, $game->players()->first()->manaPool()->size());

        $game->players()->first()->play($this->basicCreatureCard()->name());

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
