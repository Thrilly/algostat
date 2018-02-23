<?php
require_once ('Sort.php');
/**
 *
 */
class fusionSort extends Sort
{

    public function getSortedList()
    {
        $time_start = microtime(true);
        $array = $this->merge_sort(explode(",", $this->listStr));
        $time_end = microtime(true);
        $this->stats["time"] = round($time_end - $time_start, 8);
        return $array;
    }

    public function merge_sort($my_array){
        if(count($my_array) == 1 ) {
            return $my_array;
        }
        $this->stats["nb_it"]++;
        $mid    = count($my_array) / 2;
        $left   = array_slice($my_array, 0, $mid);
        $right  = array_slice($my_array, $mid);
        $left   = $this->merge_sort($left);
        $right  = $this->merge_sort($right);

        return    $this->merge($left, $right);
    }

    public function merge($left, $right){
        $res = array();
        while (count($left) > 0 && count($right) > 0){
            if($left[0] > $right[0]){
                $res[] = $right[0];
                $right = array_slice($right , 1);
            }else{
                $res[] = $left[0];
                $left = array_slice($left, 1);
            }
        }
        while (count($left) > 0){
            $res[] = $left[0];
            $left = array_slice($left, 1);
        }
        while (count($right) > 0){
            $res[] = $right[0];
            $right = array_slice($right, 1);
        }
        return $res;
    }

}

?>