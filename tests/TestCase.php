<?php

  use William\Cards\BasicLand;
use William\Cards\Creature;

  /**
   * Base Test Case class for all to extend. Includes config and test helpers.
   */
  class TestCase extends PHPUnit_Framework_TestCase
  {
      protected function basicLandCard()
      {
          return BasicLand::make('Forest');
      }

      protected function basicCreatureCard($specificCardName = 'Balduvian Bears')
      {
          return Creature::make($specificCardName);
      }

      /**
       * @return \William\Game
       */
      protected function startTestGame()
      {
          $game = new William\Game();
          $game->addPlayer(new William\Player());
          $game->addPlayer(new William\Player());
          $game->start();

          return $game;
      }
  }
