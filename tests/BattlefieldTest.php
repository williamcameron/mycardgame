<?php

use William\Battlefield;
use William\CardCollection;

class BattlefieldTest extends TestCase
{
    /** @test */
    public function php_unit_works()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function battlefield_is_a_card_collection()
    {
        $battlefield = new Battlefield();
        $this->assertInstanceOf(CardCollection::class, $battlefield);
    }
}