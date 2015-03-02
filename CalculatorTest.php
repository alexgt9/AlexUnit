<?php

require "Calculator.php";

/**
* Test for calculator
*/
class CalculatorTest{
	public function testAdd2And2ShouldBe4(){
		$calculator = new Calculator;

		if($calculator->add(2, 2) !== 4){
			throw new TestFailException("Should add the values");
		}
	}

	public function testMultiply3And2ShouldBe6(){
		$calculator = new Calculator;

		if($calculator->multiply(3, 2) !== 6){
			throw new TestFailException("Should multiply the values");
		}
	}
}