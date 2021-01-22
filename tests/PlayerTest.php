<?php

    class PlayerTest extends TestCase
    {
        private function get_a_new_player()
        {
            return new William\Player();
        }

        /** @test */
        public function player_is_a_player()
        {
            $player = $this->get_a_new_player();
            $this->assertInstanceOf("William\Player", $player);
        }

        /** @test */
        public function player_has_a_deck()
        {
            $player = $this->get_a_new_player();
            $this->assertInstanceOf("William\Deck", $player->deck());
        }

        /** @test */
        public function player_can_play_creature_to_battlefield()
        {
            $player = $this->get_a_new_player();
            $this->assertEquals(0, $player->battlefield()->size());
        }
    }
