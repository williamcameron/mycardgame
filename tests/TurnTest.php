<?php

use PHPUnit\Framework\TestCase;
use William\Turn;

class TurnTest extends TestCase {

	public function testPhpUnitWorks(){
		$this->assertTrue(true);
	}
	
	/** @test */
	public function turn_starts_with_untap_phase(){
		$turn = new Turn;
		$this->assertEquals(Turn::PHASE_UNTAP, $turn->phase());
	}
	
	/** @test */
	public function end_untap_moves_to_upkeep_phase(){
		$turn = new Turn;
		$turn->end_phase();
		$this->assertEquals(Turn::PHASE_UPKEEP, $turn->phase());
	}
}
