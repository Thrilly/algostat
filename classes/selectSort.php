<?php
require_once ('Sort.php');
/**
* 
*/
class selectSort extends Sort
{

	public function getSortedList()
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
		$this->stats["time"] = round(($time_end - $time_start)/1000, 8);
		return $tabList;
	}

	
}
?>