<?php

namespace William;

class Turn
{
    const PHASE_UNTAP = 1;
    const PHASE_UPKEEP = 2;

    private $currentPhase;

    public function __construct()
    {
        $this->currentPhase = self::PHASE_UNTAP;
    }

    public function phase()
    {
        return $this->currentPhase;
    }

    public function endPhase()
    {
        $this->currentPhase++;
    }
}
