<?php
require_once ('Sort.php');
/**
* 
*/
class shellSort extends Sort
{

    public function insertSort($t, $gap, $debut)
    {
        for ($i = $gap + $debut; $i < 20; $i+=$gap) {
            $current = $t[$i];
            for ($j = $i; $j >= $gap && $t[$j - $gap] > $current; $j-=$gap) {
                $t[$j] = $t[$j - $gap];
            }
            $t[$j] = $current;
        }
    }
     
    public function getSortedList() {
    	$time_start = microtime(true);
		$t = explode(",", $this->listStr);
    	$time_start = microtime(true);
        $intervalles = explode(",", $this->listStr);
        for ($ngap=0;$ngap<5;$ngap++) {
            for ($i=0;$i<$intervalles[$ngap];$i++)
                $this->insertSort($t,$intervalles[$ngap],$i);
        }

        $time_end = microtime(true);
		$this->stats["time"] = round(($time_end - $time_start), 8);
		return $t;
    }
}
?>