<?php

use William\Mana;

class ManaTest extends TestCase
{
    public function testOne()
    {
        $this->assertTrue(true);
    }

  /** @test */
  public function tapping_forest_produces_green_mana()
  {
      $game = $this->startTestGame();
      $game->drawOpeningHands();
      $game->activePlayer()->play('Forest');
      $game->activePlayer()->tap('Forest');

      $this->assertEquals(MANA::GREEN, $game->activePlayer()->manaPool()->first()->type());
  }

  /** @test */
  public function tapping_mountain_produces_red_mana()
  {
      $game = $this->startTestGame();
      $game->drawOpeningHands();
      $game->activePlayer()->play('Mountain');
      $game->activePlayer()->tap('Mountain');

      $this->assertEquals(MANA::RED, $game->activePlayer()->manaPool()->first()->type());
  }

  /**
   * @test
   * @expectedException William\Exceptions\ManaTypeNotFoundException
   */
  public function trying_to_find_invalid_mana_type_throws_exception()
  {
      Mana::findByName('invalid_name');
  }
}
