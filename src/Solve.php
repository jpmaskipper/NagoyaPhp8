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
		$map = $this->parser->parse($path);
		$route = $this->router->calculate($map);

		return count($route);
	}

	public function getRoute($path)
	{
		$map = $this->parser->parse($path);
		$route = $this->router->calculate($map);

		return $route;
	}
}

