<?php

namespace William;

class Turn
{
    const PHASE_UNTAP = 1;
    const PHASE_UPKEEP = 2;

    private $current_phase;

    public function __construct()
    {
        $this->current_phase = self::PHASE_UNTAP;
    }

    public function phase()
    {
        return $this->current_phase;
    }

    public function end_phase()
    {
        $this->current_phase++;
    }
}
