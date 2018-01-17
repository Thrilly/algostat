<?php
/**
* 
*/
class bubbleSort
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
		for($i = 0; $i < $tabSize; $i++)
		{
			$this->stats["nb_it"]++;
			for($j = 0; $j < ($tabSize -1); $j++)
			{
				$this->stats["nb_it"]++;
				if($tabList[$j+1] < $tabList[$j])
				{
					$t = $tabList[$j+1];
					$tabList[$j+1] = $tabList[$j];
					$tabList[$j] = $t;
				}
			}
		}
		$time_end = microtime();
		$this->stats["time"] = round(($time_end - $time_start)/1000, 8);
		echo "Tri à bulles : ".implode(",", $tabList);
	}

	public function getStatsPerf()
	{
		return $this->stats;
	}
}
?>