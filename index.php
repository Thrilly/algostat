<?php
include("classes/selectSort.php");
include("classes/insertSort.php");
include("classes/bubbleSort.php");
if (isset($_POST["chooseSort"])){
    $method = $_POST["chooseSort"];
    $str = $_POST["list"];
}else{
    $method = NULL;
    $str = NULL;    
}
$showChart = false;
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>AlgoStat - ETNA</title>
    <!-- <link rel="shortcut icon" href="img/logo_pma.png"> -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/algostat.css">
    <link rel="stylesheet" type="text/css" href="aets/fa/font-awesome.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center"><br>
            <h1><a href="index.php">ALGO STAT I</a></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 text-center"><br>
            <form action="?results=show" method="POST">
                <div class="form-group">
                    <label for="chooseSort">Méthode de Tri</label>
                    <select class="form-control" id="chooseSort" name="chooseSort">
                        <option value="all" <?php if ($method == "all") echo "selected" ?>>Comparer les tris</option>
                        <option value="select" <?php if ($method == "select") echo "selected" ?>>Tri par Sélection</option>
                        <option value="insert" <?php if ($method == "insert") echo "selected" ?>>Tri par Insertion</option>
                        <option value="bubble" <?php if ($method == "bubble") echo "selected" ?>>Tri à Bulle</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="list">Liste à trier</label>
                    <input class="form-control" id="lsit" type="text" name="list" value="<?php 
	                    if ($str != NULL){
	                    	echo $str;	
	                    } else {
	                    	echo "4,7,9,0,67,5,34,87,28,029,893,234,974,392828,485,484";
	                    }
                    ?>">
                </div>
                <a href="docs/rapport.pdf" target="_blank" class="btn btn-light">En savoir plus</a>&nbsp;&nbsp;<button type="submit" class="btn btn-primary" id="sortProcess">Proceder</button>
            </form>
        </div>
    </div>
    <?php if ($method != "all" && $method != NULL){ ?>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 text-center"><br><br><br>
                <code>
                    <?php
	    				$class = $method."Sort";
                        $sort = new $class($str);
                        $sort->toString();
                        $stats = $sort->getStatsPerf();
                    ?>
                </code>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8"><br><br>
                <table>
                    <tr>
                        <th>Nb itération</th>
                        <th>Temps d'éxécution</th>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $stats["nb_it"]; ?>
                        </td>
                        <td>
                            <?php echo $stats["time"]; ?> ms
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    	<?php 
		} elseif ($method == "all") { 
		    $str = ($_POST["list"]);
	    	$select = new selectSort($str);
	    	$insert = new insertSort($str);
	    	$bubble = new bubbleSort($str);
            $select->getSortedList();
            $insert->getSortedList();
		    $bubble->getSortedList();
		    $showChart = "";
    	?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 text-center"><br>
                <code><?php $select->toString()?></code><br>
                <code><?php $insert->toString()?></code><br>
                <code><?php $bubble->toString()?></code><br>
            </div>
        </div>
    	<div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5"><br>
            	<canvas id="myChart" width="100%" height="70%"></canvas>
            </div>
            <div class="col-md-5"><br>
            	<canvas id="myChart2" width="100%" height="70%"></canvas>
            </div>
    </div>
    <?php } ?>
</div>
</body>
<script src="assets/js/chart.js"></script>
<script type="text/javascript">
	var ctx = document.getElementById("myChart").getContext('2d');
	var myChart = new Chart(ctx, {
	    type: 'line',
	    data: {
	        labels: ["Tri par selection", "Tri par insertion", "Tri à bulle"],
	        datasets: [{
	            label: 'Temps d\'éxécution (ms)',
	            data: [<?php echo ($select->getStatsPerf()["time"]).",".($insert->getStatsPerf()["time"]).",".($bubble->getStatsPerf()["time"]);?>],
	            backgroundColor: [
	                'rgba(255, 99, 132, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(255, 206, 86, 0.2)'
	            ],
	            borderColor: [
	                'rgba(255,99,132,1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(255, 206, 86, 1)'
	            ],
	            borderWidth: 1
	        }]
	    },
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        }
	    }
	});

	var ctx2 = document.getElementById("myChart2").getContext('2d');
	var myChart2 = new Chart(ctx2, {
	    type: 'bar',
	    data: {
	        labels: ["Tri par selection", "Tri par insertion", "Tri à bulle"],
	        datasets: [{
	            label: 'Nombre d\'itérations',
	            data: [<?php echo ($select->getStatsPerf()["nb_it"]/2).",".($insert->getStatsPerf()["nb_it"]/2).",".($bubble->getStatsPerf()["nb_it"]/2)?>],
	            backgroundColor: [
	                'rgba(255, 99, 132, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(255, 206, 86, 0.2)'
	            ],
	            borderColor: [
	                'rgba(255,99,132,1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(255, 206, 86, 1)'
	            ],
	            borderWidth: 1
	        }]
	    },
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        }
	    }
	});
</script>
</html>
