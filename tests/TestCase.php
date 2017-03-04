<?php
  use William\Cards\BasicLand;
  use William\Cards\Card;
  use William\Cards\Creature;

  /**
    * Base Test Case class for all to extend. Includes config and test helpers
    */
  class TestCase extends PHPUnit_Framework_TestCase
  {
      public function basicLandCard()
      {
          return BasicLand::make('Forest');
      }

      public function basicCreatureCard($specificCardName="Balduvian Bears")
      {
          return Creature::make($specificCardName);
      }
  }
