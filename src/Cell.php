<?php

namespace Skipper\Nagoya8;

class Cell
{
	private $row;
	private $column;
	private $value;

	public function __construct($row, $column, $value)
	{
		$this->row = $row;
		$this->column = $column;
		$this->value = $value;
	}

	public function getRow()
	{
		return $this->row;
	}

	public function getColumn()
	{
		return $this->column;
	}

	public function getValue()
	{
		return $this->value;
	}
}


