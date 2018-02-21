<?php
require_once ('Sort.php');
/**
* 
*/
class shellSort extends Sort
{

	public function getSortedList()
	{
		$time_start = microtime(true);
		$Tableau = explode(",", $this->listStr);

		$Inversion = 0;
		$ecart = count($Tableau);
		do {
			$ecart /= 2;
			$this->stats["nb_it"]++;
			do {
				$Inversion = 0;
				$this->stats["nb_it"]++;
				for($I = 0; $I <= count($Tableau) - $ecart - 1; $I++) {
					$this->stats["nb_it"]++;
					$J = $I + $ecart;
					if($Tableau[$J] < $Tableau[$I]) {
						$Temporaire = $Tableau[$I];
						$Tableau[$I] = $Tableau[$J];
						$Tableau[$J] = $Temporaire;
						$Inversion = 1;
					}
				}
			} while (1 == $Inversion);
		} while (1 != $ecart);

		$time_end = microtime(true);
		$this->stats["time"] = round(($time_end - $time_start), 8);
		return $Tableau;
	}
}
?>