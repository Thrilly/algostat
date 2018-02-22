<?php
require_once ('Sort.php');
/**
 *
 */
class shellSort extends Sort
{
    function getSortedList()
    {
        $time_start = microtime(true);
        $liste = explode(",", $this->listStr);


        $liste = $this->shell_Sort($liste);


        $time_end = microtime(true);
        $this->stats["time"] = round($time_end - $time_start, 8);
        return $liste;
    }
    function shell_Sort($my_array)
    {
        $x = round(count($my_array)/2);
        while($x > 0)
        {
            $this->stats["nb_it"]++;
            for($i = $x; $i < count($my_array);$i++){
                $temp = $my_array[$i];
                $j = $i;
                $this->stats["nb_it"]++;
                while($j >= $x && $my_array[$j-$x] > $temp)
                {
                    $my_array[$j] = $my_array[$j - $x];
                    $j -= $x;
                    $this->stats["nb_it"]++;
                }
                $my_array[$j] = $temp;
            }
            $x = round($x/2.2);
        }
        return $my_array;
    }

}
?>