<?php
require_once ('Sort.php');

class quickSort extends Sort
{
    function getSortedList()
    {
        $time_start = microtime(true);
        $liste = explode(",", $this->listStr);


        $liste = $this->quick_sort($liste);


        $time_end = microtime(true);
        $this->stats["time"] = round($time_end - $time_start, 8);
        return $liste;
    }

    function quick_sort($array)
    {
        // find array size
        $length = count($array);

        // base case test, if array of length 0 then just return array to caller
        if($length <= 1){
            return $array;
        }
        else{

            // select an item to act as our pivot point, since list is unsorted first position is easiest
            $pivot = $array[0];

            // declare our two arrays to act as partitions
            $left = $right = array();

            // loop and compare each item in the array to the pivot value, place item in appropriate partition
            for($i = 1; $i < count($array); $i++)
            {
                if((int)$array[$i] < (int)$pivot){
                    $left[] = $array[$i];
                }
                else{
                    $right[] = $array[$i];
                }
                $this->stats["nb_it"]++;
            }

            // use recursion to now sort the left and right lists
            return array_merge($this->quick_sort($left), array($pivot), $this->quick_sort($right));
        }
    }
}
?>