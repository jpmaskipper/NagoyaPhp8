<?php

namespace Skipper\Nagoya8;

class Router
{
	public function calculateMaxRoute(Map $map, Cell $cell)
	{
		$routes = $this->calculateRoute($map, [$cell]);
		
		$result = [];
		foreach ($routes as $route) {
			if (count($result) < count($route)) {
				$result = $route;
			}
		}

		return $result;
	}

	public function calculateRoute(Map $map, array $cells)
	{
		$results = [];

		foreach ($map->getGraterCells(end($cells)) as $graterCell) {
			$current = array_merge($cells, [$graterCell]);
			$next = $this->calculateRoute($map, $current);
			$results = array_merge($results, $next);
		}

		return empty($results) ? [$cells] : $results;
	}
}


