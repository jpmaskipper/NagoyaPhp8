<?php

namespace Skipper\Nagoya8;

class Parser
{
	const DELIMITER = '/';

	public function parse($path)
	{
		$map = new Map();

		$lists = explode(self::DELIMITER, $path);
		
		foreach ($lists as $i => $list) {
			foreach (str_split($list) as $j => $value) {
				$map->addCell($i, $j, $value);
			}
		}

		return $map;
	}
}

