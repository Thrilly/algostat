<?php
require_once ('Sort.php');
/**
* 
*/
class SORTNAMESort extends Sort
{

	public function getSortedList()
	{
		$time_start = microtime(true);
		$NAMEOFTAB = explode(",", $this->listStr);

		// PUT CODE HERE

		$time_end = microtime(true);
		$this->stats["time"] = round(($time_end - $time_start), 8);
		return $Tableau;
	}
}
