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

	private function getAdjacentCells(Cell $cell)
	{
		$cells = [];

		foreach ([[-1, 0], [0, -1], [1, 0], [0, 1]] as $offset) {
			$row = $cell->getRow() + $offset[0];
			$column = $cell->getColumn() + $offset[1];

			if ($this->cellExists($row, $column)) {
				$cells[] = $this->getCell($row, $column);
			}
		}

		return $cells;
	}

	public function getGraterCells(Cell $cell)
	{
		$cells = [];

		foreach ($this->getAdjacentCells($cell) as $adjacentCell) {
			if ($cell && $adjacentCell->getValue() > $cell->getValue()) {
				$cells[] = $adjacentCell;
			}
		}

		return $cells;
	}

	public function addCell($row, $column, $value)
	{
		$this->cells[$row][$column] = new Cell($row, $column, $value);

		if ($this->rowCount < $row + 1) {
			$this->rowCount = $row + 1;
		}

		if ($this->columnCount < $column + 1) {
			$this->columnCount = $column + 1;
		}
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


