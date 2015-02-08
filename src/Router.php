<?php

namespace Skipper\Nagoya8;

class Router
{
	private $map;

	public function __construct(Map $map)
	{
		$this->map = $map;
	}

	public function calculateMaxRoute(Cell $cell)
	{
		$routes = $this->calculateRoute([$cell]);
		
		$result = [];
		foreach ($routes as $route) {
			if (count($result) < count($route)) {
				$result = $route;
			}
		}

		return $result;
	}

	public function calculateRoute(array $cells)
	{
		$results = [];

		foreach ($this->map->getGraterCells(end($cells)) as $graterCell) {
			$current = array_merge($cells, [$graterCell]);
			$next = $this->calculateRoute($current);
			$results = array_merge($results, $next);
		}

		return empty($results) ? [$cells] : $results;
	}
}


