<?php
/**
 * Created by PhpStorm.
 * User: william
 * Date: 3/5/17
 * Time: 11:14 PM
 */

namespace William;


use Illuminate\Support\Collection;

class CardCollection extends Collection
{
    function getByName($name)
    {
        foreach ($this->items as $i) {
            if ($i->name == $name) {
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
}