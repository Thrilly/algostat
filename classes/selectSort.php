<?php
/**
* 
*/
class selectSort
{
	private $listStr;
	private $stats;

	function __construct($listStr)
	{
		$this->listStr = $listStr;
		$this->stats["nb_it"] = 0;
		$this->stats["time"] = 0;
	}

	public function toString()
	{
		$time_start = microtime();
		$tabList = explode(",", $this->listStr);
		$tabSize = count($tabList);
		for ($i=0; $i < $tabSize; $i++) { 
			$min = $i;
			for ($j=$i+1; $j < $tabSize; $j++) { 
				if ($tabList[$j] < $tabList[$min]) {
					$min = $j;
				}
				$this->stats["nb_it"]++;
			}
			if ($min != $i) {
				$tmp = $tabList[$i];
				$tabList[$i] = $tabList[$min];
				$tabList[$min] = $tmp;
			}
			$this->stats["nb_it"]++;
		}
		$time_end = microtime();
		$this->stats["time"] = $time_end - $time_start;
		echo "Tri par selection : ".implode(",", $tabList);
	}

	public function getStatsPerf()
	{
		return $this->stats;
	}
}
?>