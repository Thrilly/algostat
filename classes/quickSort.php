<?php
require_once ('Sort.php');
/**
 *
 */
class quickSort extends Sort
{
    public function getSortedList($array = null)
    {
        if ($array == null){
            $array = explode(",", $this->listStr);
        }
        $time_start = microtime(true);
        // find array size
        $length = count($array);

        // base case test, if array of length 0 then just return array to caller
        if($length <= 1){
            return $array;
        } else{
            // select an item to act as our pivot point, since list is unsorted first position is easiest
            $pivot = $array[0];

            // declare our two arrays to act as partitions
            $left = $right = array();

            // loop and compare each item in the array to the pivot value, place item in appropriate partition
            for ($i = 1; $i < count($array); $i++) {
                if ($array[$i] < $pivot) {
                    $left[] = $array[$i];
                } else {
                    $right[] = $array[$i];
                }

            }
            $time_end = microtime(true);
            $this->stats["time"] = round(($time_end - $time_start), 8);
            return array_merge($this->getSortedList($left), array($pivot), $this->getSortedList($right));
//            var_dump($array);
        }
    }
}
?>
