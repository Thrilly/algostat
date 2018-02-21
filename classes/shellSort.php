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
        $gaps = array(701,301,132,57,23,10,4,1);
		$array = explode(",", $this->listStr);

        $length=count($array);

        $lgap=count($gaps);

        for ($z=0;$z<$lgap;$z++) {
            $this->stats["nb_it"]++;
            $gap=$gaps[$z];
            for ($i=$gap;$i<$length;$i++) {
                $this->stats["nb_it"]++;
                $element=$array[$i];
                $j=$i;
                while($j>=$gap && $array[$j-$gap]>$element) {
                    $this->stats["nb_it"]++;
                    //move value to right and key to previous smaller index
                    $array[$j]=$array[$j-$gap];
                    $j=$j-$gap;
                    }
                //put the element at index $j
                $array[$j]=$element;
            }
        }

        $time_end = microtime(true);
		$this->stats["time"] = round(($time_end - $time_start), 8);
		return $array;
    }
}
?>