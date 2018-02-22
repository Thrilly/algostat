<?php
require_once ('Sort.php');

class combSort extends Sort
{

    function getSortedList()
    {
        $time_start = microtime(true);
        $tableau = explode(",", $this->listStr);

        $gap = 20;
        $permutation = true;
        $current;
       
        while (($permutation) || ($gap>1)) {
        	$this->stats["nb_it"]++;
            $permutation = false;
            $gap /= 1.3;
            if ($gap<1){
            	$gap=1;	
            } 
            for ($current=0;$current<count($tableau)-$gap;$current++) {
        		$this->stats["nb_it"]++;
                if ($tableau[$current]>$tableau[$current+$gap]){
                    $permutation = true;
                    // on echange les deux elements
                    $temp = $tableau[$current];
                    $tableau[$current] = $tableau[$current+$gap];
                    $tableau[$current+$gap] = $temp;
                }
            }
        }

        $time_end = microtime(true);
        $this->stats["time"] = round($time_end - $time_start, 8);
        return $tableau;
    }
}

?>