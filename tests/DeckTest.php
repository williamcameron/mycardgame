<?php
    class DeckTest extends TestCase
    {
        private function defaultDeck()
        {
            return new William\Deck();
        }

        /** @test */
        public function deck_is_a_deck()
        {
            $deck = $this->defaultDeck();
            $this->assertInstanceOf("William\Deck", $deck);
        }
	
	/** @test */
	public function deck_is_a_card_collection(){
		$this->assertInstanceOf("William\CardCollection", $this->defaultDeck());
	}

        /** @test */
        public function deck_has_60_cards_by_default()
        {
            $deck = new William\Deck();
            $this->assertCount(60, $deck->cards());
        }

        /** @test */
        public function drawing_from_deck_gives_a_card()
        {
            $deck = new William\Deck();
            $card = $deck->drawCard();
            $this->assertInstanceOf("William\Cards\Card", $card);
        }

        /** @test */
        public function drawing_more_than_one_adjusts_deck_accordingly()
        {
            $deck = new William\Deck();
            $deck->draw(5);

            $this->assertCount(55, $deck->cards());
        }

        /** @test */
        public function drawing_from_deck_reduces_count()
        {
            $deck = new William\Deck();
            $deck->draw();
            $this->assertCount(59, $deck->cards());
        }

        /** @test
         * @expectedException William\Exceptions\NoCardsLeftException
         */
        public function drawing_more_than_deck_size_throws_no_cards_left_exception()
        {
            $deck = new William\Deck();
            $deck->draw(60);

            $deck->drawCard();
            $this->fail("Drawing cards from empty deck worked when it shouldn't have.");
        }
    }
