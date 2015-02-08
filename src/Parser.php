<?php

namespace Skipper\Nagoya8;

class Parser
{
	const DELIMITER = '/';

	public function parse($path)
	{
		return $this->arrayToMap($this->toArray($path));
	}

	private function arrayToMap(array $array)
	{
		$map = new Map();

		foreach ($array as $row => $rowValues) {
			foreach ($rowValues as $column => $columnValue) {
				$map->addCell($row, $column, $columnValue);
			}
		}

		return $map;
	}

	private function toArray($path)
	{
		$result = [];

		$rows = explode(self::DELIMITER, $path);
		$columnCount = $this->getMaxColumnCount($rows);
		
		foreach ($rows as $i => $row) {
			for ($column = 0; $column < $columnCount; $column++) {
				$result[$i][$column] = substr($row, $column, 1) ?: 0;
			}
		}

		return $result;
	}
	
	private function getMaxColumnCount($rows)
	{
		$result = 0;

		foreach ($rows as $row) {
			$length = strlen($row);
			$result = $length > $result ? $length : $result;
		}

		return $result;
	}
}


