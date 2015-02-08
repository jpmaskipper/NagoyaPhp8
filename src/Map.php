<?php

namespace Skipper\Nagoya8;

class Map
{
	private $cells;
	private $rowCount;
	private $columnCount;

	public function __construct()
	{
		$this->cells = [];
	}

	public function getRowCount()
	{
		return $this->rowCount;
	}

	public function getColumnCount()
	{
		return $this->columnCount;
	}

	private function cellExists($row, $column)
	{
		return $row >= 0 && $column >= 0 && $row < $this->getRowCount() && $column < $this->getColumnCount();
	}

	public function getGraterCells(Cell $cell)
	{
		$cells = [];

		foreach ([[-1, 0], [0, -1], [1, 0], [0, 1]] as $offset) {

			$row = $cell->getRow() + $offset[0];
			$column = $cell->getColumn() + $offset[1];

			if (!$this->cellExists($row, $column)) {
				continue;
			}
	
			$movedCell = $this->getCell($row, $column);

			if ($cell && $movedCell->getValue() > $cell->getValue()) {
				$cells[] = $movedCell;
			}
		}

		return $cells;
	}

	public function addCell($row, $column, $value)
	{
		$this->cells[$row][$column] = new Cell($row, $column, $value);
		$this->rowCount = $this->rowCount < $row + 1 ? $row + 1 : $this->rowCount;
		$this->columnCount = $this->columnCount < $column + 1 ? $column + 1 : $this->columnCount;
	}

	public function getCell($row, $column)
	{
		return $this->cells[$row][$column] ?: null;
	}

	public function getCells()
	{
		$cells = [];

		foreach ($this->cells as $row) {
			foreach ($row as $cell) {
				$cells[] = $cell;
			}
		}

		return $cells;
	}
}


