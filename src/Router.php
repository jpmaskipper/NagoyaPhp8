<?php

namespace Skipper\Nagoya8;

class Router
{
	public function calculate(Map $map)
	{
		$routes = [];
		foreach ($map->getCells() as $cell) {
			$routes[] = $this->calculateMaxRoute($map, $cell);
		}

		return max($routes);
	}

	public function calculateMaxRoute(Map $map, Cell $cell)
	{
		return max($this->findRoute($map, [$cell]));
	}

	public function findRoute(Map $map, array $cells)
	{
		$results = [];

		foreach ($map->getGraterCells(end($cells)) as $graterCell) {
			$current = array_merge($cells, [$graterCell]);
			$next = $this->findRoute($map, $current);
			$results = array_merge($results, $next);
		}

		return empty($results) ? [$cells] : $results;
	}
}

