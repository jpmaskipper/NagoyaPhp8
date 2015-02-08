<?php

namespace Skipper\Nagoya8;

class Solve
{
	private $parser;
	private $route;

	public function __construct(Parser $parser, Router $router)
	{
		$this->parser = $parser;
		$this->router = $router;
	}

	public function run($path)
	{
		$route = $this->getRoute($path);

		return count($route);
	}

	public function getRoute($path)
	{
		$map = $this->parser->parse($path);
		$route = $this->calculateMaxRoute($map);

		return $route;
	}

	public function calculateMaxRoute(Map $map)
	{
		$result = [];

		foreach ($map->getCells() as $cell) {
			$route = $this->router->calculateMaxRoute($map, $cell);

			if (count($result) < count($route)) {
				$result = $route;
			}
		}
		
		return $result;
	}	
}

