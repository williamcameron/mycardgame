<?php
  namespace William;

use William\Exceptions\ManaTypeNotFoundException;

class Mana
{
    const GREEN = 1;
    const RED = 2;
  
  
    public function __construct($type)
    {
        $this->type = $type; //$this->findByName($type);
    }
  
    public static function findByName($name)
    {
        switch ($name) {
      case "red":
        return self::RED;
        break;
      case "green":
        return self::GREEN;
        break;
    }
    
        throw new ManaTypeNotFoundException;
    }
  
    public function type()
    {
        return $this->type;
    }
}
