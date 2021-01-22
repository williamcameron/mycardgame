<?php

class CardTest extends TestCase
{
    /** @test */
    public function card_is_a_william_card()
    {
        $card = $this->basicLandCard();
        $this->assertInstanceOf("William\Cards\Card", $card);
    }

    /** @test */
    public function basic_land_card_is_type_land()
    {
        $card = $this->basicLandCard();
        $this->assertTrue($card->isLand());
    }

    /** @test */
    public function basic_land_card_is_not_a_creature()
    {
        $card = $this->basicLandCard();
        $this->assertFalse($card->isCreature());
    }

    /** @test */
    public function creature_card_is_not_a_land_card()
    {
        $card = $this->basicCreatureCard();
        $this->assertFalse($card->isLand());
    }

    /** @test */
    public function creature_card_is_type_creature()
    {
        $card = $this->basicCreatureCard();
        $this->assertTrue($card->isCreature());
    }

    /** @test */
    public function not_tapped_by_default()
    {
        $card = $this->basicLandCard();
        $this->assertFalse($card->tapped());
    }

    /** @test */
    public function tapping_taps_card()
    {
        $card = $this->basicLandCard();
        $card->tap();
        $this->assertTrue($card->tapped());
    }

    /** @test */
    public function tapped_card_can_be_untapped()
    {
        $card = $this->basicLandCard();
        $card->tap();
        $card->unTap();
        $this->assertFalse($card->tapped());
    }

    /** @test */
    public function card_untaps_if_double_tapped()
    {
        $card = $this->basicLandCard();
        $this->assertFalse($card->tapped());
        $card->tap();
        $this->assertTrue($card->tapped());
        $card->tap();
        $this->assertFalse($card->tapped(), 'Tapping a tapped Card should untap but has not.');
    }

    /** @test */
    public function converted_mana_cost_is_calculated_correctly()
    {
        $card = $this->basicCreatureCard('Norwood Ranger');
        $this->assertEquals(1, $card->convertedManaCost());
    }

    /** @test */
    public function casting_cost_is_returned_correctly()
    {
        $card = $this->basicCreatureCard('Norwood Ranger');
        $this->assertEquals('G', $card->castingCost());
    }
}
