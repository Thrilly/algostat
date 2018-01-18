<?php 

/**
* 
*/
class Sort
{
	protected $listStr;
	protected $stats;

	function __construct($listStr)
	{
		$this->listStr = $listStr;
		$this->stats["nb_it"] = 0;
		$this->stats["time"] = 0;
	}

	public function getStatsPerf()
	{
		return $this->stats;
	}

	public function toString()
	{
		echo "Tri ". get_class($this) ." : ".implode(",", $this->getSortedList());
	}
}
?>