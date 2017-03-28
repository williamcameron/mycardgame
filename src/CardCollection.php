<?php
/**
 * Created by PhpStorm.
 * User: william
 * Date: 3/5/17
 * Time: 11:14 PM.
 */

namespace William;

use Illuminate\Support\Collection;

class CardCollection extends Collection
{
    public function getByName($name)
    {
        foreach ($this->items as $k => $i) {
            if ($i->name() == $name) {
                $this->pull($k);

                return $i;
            }
        }
    }

    public function add($value)
    {
        $this->push($value);
    }

    public function size()
    {
        return $this->count();
    }
	
	public function remove($cards){
		$this->pop($cards);
	}
}
