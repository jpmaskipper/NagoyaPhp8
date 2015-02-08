<?php

namespace Skipper\Nagoya8;

class ParserTest extends \PHPUnit_Framework_TestCase
{
	/**
  * @test
  */
	public function parse()
	{
		$parser = new Parser();
		$map = $parser->parse('123/456/789');

		$this->assertEquals($map->getCell(0, 0)->getValue(), 1);
		$this->assertEquals($map->getCell(0, 1)->getValue(), 2);
		$this->assertEquals($map->getCell(0, 2)->getValue(), 3);
		$this->assertEquals($map->getCell(1, 0)->getValue(), 4);
		$this->assertEquals($map->getCell(1, 1)->getValue(), 5);
		$this->assertEquals($map->getCell(1, 2)->getValue(), 6);
		$this->assertEquals($map->getCell(2, 0)->getValue(), 7);
		$this->assertEquals($map->getCell(2, 1)->getValue(), 8);
		$this->assertEquals($map->getCell(2, 2)->getValue(), 9);
	}	
}
