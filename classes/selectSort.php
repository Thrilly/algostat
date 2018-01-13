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
	}

	public function toString()
	{
		echo "Tri par selection : ".$this->listStr;
	}

	public function getStatsPerf()
	{
		return $this->stats;
	}
}
?>