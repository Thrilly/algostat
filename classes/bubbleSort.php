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
	}

	public function toString()
	{
		echo "Tri à bulles : ".$this->listStr;
	}

	public function getStatsPerf()
	{
		return $this->stats;
	}
}
?>