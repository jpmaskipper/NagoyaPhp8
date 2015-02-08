<?php

namespace Skipper\Nagoya8;

class RouterTest extends \PHPUnit_Framework_TestCase
{
	/**
	* @test
  */
	public function 移動先が0個()
	{
		$mockCell = $this->getMockBuilder('Skipper\Nagoya8\Cell')->disableOriginalConstructor()->getMock();

		$mockMap = $this->getMock('Skipper\Nagoya8\Map');
		$mockMap->expects($this->at(0))->method('getGraterCells')->will($this->returnValue([]));

		$router = new Router($mockMap);
		$route = $router->calculateRoute([$mockCell]);
		$this->assertCount(1, $route);
		$this->assertCount(1, $route[0]);
	}	

	/**
  * @test
  */
	public function 移動先の取得_1つ進める()
	{
		$mockCell = $this->getMockBuilder('Skipper\Nagoya8\Cell')->disableOriginalConstructor()->getMock();

		$mockMap = $this->getMock('Skipper\Nagoya8\Map');
		$mockMap->expects($this->at(0))->method('getGraterCells')->will($this->returnValue([$mockCell]));
		$mockMap->expects($this->at(1))->method('getGraterCells')->will($this->returnValue([]));

		$router = new Router($mockMap);
		$route = $router->calculateRoute([$mockCell]);
		$this->assertCount(1, $route);
		$this->assertCount(2, $route[0]);
	}	

	/**
  * @test
  */
	public function 移動先の取得_2つ進める()
	{
		$mockCell = $this->getMockBuilder('Skipper\Nagoya8\Cell')->disableOriginalConstructor()->getMock();

		$mockMap = $this->getMock('Skipper\Nagoya8\Map');
		$mockMap->expects($this->at(0))->method('getGraterCells')->will($this->returnValue([$mockCell]));
		$mockMap->expects($this->at(1))->method('getGraterCells')->will($this->returnValue([$mockCell]));
		$mockMap->expects($this->at(2))->method('getGraterCells')->will($this->returnValue([]));

		$router = new Router($mockMap);
		$route = $router->calculateRoute([$mockCell]);
		$this->assertCount(1, $route);
		$this->assertCount(3, $route[0]);
	}	

	/**
  * @test
  */
	public function 移動先の取得_分岐して2通り進める()
	{
		$mockCell = $this->getMockBuilder('Skipper\Nagoya8\Cell')->disableOriginalConstructor()->getMock();

		$mockMap = $this->getMock('Skipper\Nagoya8\Map');
		$mockMap->expects($this->at(0))->method('getGraterCells')->will($this->returnValue([$mockCell, $mockCell]));
		$mockMap->expects($this->at(1))->method('getGraterCells')->will($this->returnValue([]));
		$mockMap->expects($this->at(2))->method('getGraterCells')->will($this->returnValue([]));

		$router = new Router($mockMap);
		$route = $router->calculateRoute([$mockCell]);
		$this->assertCount(2, $route);
		$this->assertCount(2, $route[0]);
		$this->assertCount(2, $route[1]);
	}

	/**
  * @test
  */
	public function 移動先の取得_分岐して3通り進める()
	{
		$mockCell = $this->getMockBuilder('Skipper\Nagoya8\Cell')->disableOriginalConstructor()->getMock();

		$mockMap = $this->getMock('Skipper\Nagoya8\Map');
		$mockMap->expects($this->at(0))->method('getGraterCells')->will($this->returnValue([$mockCell, $mockCell]));
		$mockMap->expects($this->at(1))->method('getGraterCells')->will($this->returnValue([$mockCell, $mockCell]));
		$mockMap->expects($this->at(2))->method('getGraterCells')->will($this->returnValue([]));
		$mockMap->expects($this->at(3))->method('getGraterCells')->will($this->returnValue([]));
		$mockMap->expects($this->at(4))->method('getGraterCells')->will($this->returnValue([]));

		$router = new Router($mockMap);
		$route = $router->calculateRoute([$mockCell]);
		$this->assertCount(3, $route);
		$this->assertCount(3, $route[0]);
		$this->assertCount(3, $route[1]);
		$this->assertCount(2, $route[2]);
	}

	/**
	* @test
	*/
	public function 最大のルート数()
	{
		$mockCell = $this->getMockBuilder('Skipper\Nagoya8\Cell')->disableOriginalConstructor()->getMock();

		$mockMap = $this->getMock('Skipper\Nagoya8\Map');
		$mockMap->expects($this->at(0))->method('getGraterCells')->will($this->returnValue([$mockCell, $mockCell]));
		$mockMap->expects($this->at(1))->method('getGraterCells')->will($this->returnValue([$mockCell, $mockCell]));
		$mockMap->expects($this->at(2))->method('getGraterCells')->will($this->returnValue([]));
		$mockMap->expects($this->at(3))->method('getGraterCells')->will($this->returnValue([]));
		$mockMap->expects($this->at(4))->method('getGraterCells')->will($this->returnValue([]));

		$router = new Router($mockMap);
		$route = $router->calculateMaxRoute($mockCell);
		
		$this->assertCount(3, $route);
	}
}

