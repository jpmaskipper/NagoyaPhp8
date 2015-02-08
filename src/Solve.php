<?php

namespace Skipper\Nagoya8;

class Solve
{
	public function run($path)
	{
		$route = $this->getRoute($path);

		return count($route);
	}

	public function getRoute($path)
	{
		$parser = new Parser();
		$map = $parser->parse($path);
		$route = $this->calculateMaxRoute($map);

		return $route;
	}

	public function calculateMaxRoute(Map $map)
	{
		$router = new Router($map);
		$result = [];

		foreach ($map->getCells() as $cell) {
			$route = $router->calculateMaxRoute($cell);

			if (count($result) < count($route)) {
				$result = $route;
			}
		}
		
		return $result;
	}	
}

