<?php

namespace Skipper\Nagoya8;

class CellTest extends \PHPUnit_Framework_TestCase
{
	/**
  * @test
  */
	public function 値の保存()
	{
		$cell = new Cell(1, 1, 1);

		$this->assertEquals($cell->getRow(), 1);
		$this->assertEquals($cell->getColumn(), 1);
		$this->assertEquals($cell->getValue(), 1);
	}	
}
