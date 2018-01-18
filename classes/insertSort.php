<?php
require_once ('Sort.php');

class insertSort extends Sort
{

    function getSortedList()
    {
        $time_start = microtime();
        $liste = explode(",", $this->listStr);
        $taille = count($liste);
        for($i = 0; $i < $taille; $i++)
        {
            $element_a_inserer = $liste[$i];
            for($j = 0; $j < $i; $j++)
            {
                $element_courant = $liste[$j];
                if ($element_a_inserer < $element_courant)
                {
                    $liste[$j] = $element_a_inserer;
                    $element_a_inserer = $element_courant;
                }
                $this->stats["nb_it"]++;
            }
            $liste[$i] = $element_a_inserer;
            $this->stats["nb_it"]++;
        }
        $time_end = microtime();
        $this->stats["time"] = round(($time_end - $time_start)/1000, 8);
        return $liste;
    }
}

?>