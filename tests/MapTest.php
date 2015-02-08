<?php

namespace Skipper\Nagoya8;

class MapTest extends \PHPUnit_Framework_TestCase
{
	private $map;

	public function setup()
	{
		$this->map = new Map();
	}
	
	/**
  * @test
  */
	public function セルの保存()
	{
		$this->map->addCell(0, 0, 1);
		$this->assertEquals(1, $this->map->getCell(0, 0)->getValue());
	}	

	/**
  * @test
  */
  public function 全セル取得()
	{
		$this->map->addCell(0, 0, 1);
		$this->map->addCell(0, 1, 1);
		$this->map->addCell(0, 2, 1);

		$this->assertCount(3, $this->map->getCells());
	}

	public function graterCellsProvider()
	{
		return [
			[['top' => 0, 'right' => 0, 'bottom' => 0, 'left' => 0], 0],
			[['top' => 1, 'right' => 0, 'bottom' => 0, 'left' => 0], 1],
			[['top' => 0, 'right' => 1, 'bottom' => 0, 'left' => 0], 1],
			[['top' => 0, 'right' => 0, 'bottom' => 1, 'left' => 0], 1],
			[['top' => 0, 'right' => 0, 'bottom' => 0, 'left' => 1], 1],
			[['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1], 4],
		];
	}

	/**
  * @test
	* @dataProvider graterCellsProvider
  */
	public function 自分より大きいセル($moved, $expectedCount)
	{
		$this->map->addCell(0, 1, $moved['top']);
		$this->map->addCell(1, 2, $moved['right']);
		$this->map->addCell(2, 1, $moved['bottom']);
		$this->map->addCell(1, 0, $moved['left']);

		$this->assertCount($expectedCount, $this->map->getGraterCells(new Cell(1, 1, 0)));
	}

	/**
	* @test
	*/
	public function 行列のカウント()
	{
		$this->map->addCell(1, 2, 0);
		$this->map->addCell(10, 24, 0);
		$this->map->addCell(8, 6, 0);

		$this->assertEquals(11, $this->map->getRowCount());
		$this->assertEquals(25, $this->map->getColumnCount());
	}
}

