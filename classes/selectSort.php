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
		$this->stats = array('nb_it' => "N/A", 'time' => "N/A");
		return $this->stats;
	}
}
?>