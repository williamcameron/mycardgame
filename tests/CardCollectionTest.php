<?php

use William\CardCollection;

class CardCollectionTest extends TestCase
{
    /** @test */
    public function php_unit_works()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function adding_to_card_collection_increases_size(){
        $cardCollection = new CardCollection();
        $this->assertEquals(0, $cardCollection->size());

        $cardCollection->add("Something");

        $this->assertEquals(1, $cardCollection->size());
    }
}