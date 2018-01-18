<?php
/**
* 
*/
class bubbleSort extends Sort
{

	public function getSortedList()
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
		return $tabList;
	}

}
?>