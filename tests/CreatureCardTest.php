<?php

class CreatureCardTest extends TestCase
{
  
        /** @test */
        public function creature_card_has_a_toughness()
        {
            $card = $this->basicCreatureCard();
            $this->assertEquals(2, $card->toughness());
        }
  
  /** @test */
    public function creature_has_a_power()
    {
        $card = $this->basicCreatureCard("Norwood Ranger");
        $this->assertEquals(1, $card->power());
    }
}
