<?php
	if (isset($_POST["chooseSort"]))
	{
		$method = $_POST["chooseSort"];
	}
	else
	{
		$method = NULL;
	}	
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
		<link rel="stylesheet" type="text/css" href="aets/fa/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="assets/css/algostat.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8 text-center"><br><br><br>
					<form action="?results=show" method="POST">
						<div class="form-group">
							<label for="chooseSort">Methode de Tri</label>
							<select class="form-control" id="chooseSort" name="chooseSort">
								<option value="select" <?php if ($method == "select") echo "selected" ?>>Tri par Sélection</option>
								<option value="insert" <?php if ($method == "insert") echo "selected" ?>>Tri par Insertion</option>
								<option value="bubble" <?php if ($method == "bubble") echo "selected" ?>>Tri à Bulle</option>
							</select>
						</div>
						<div class="form-group">
							<label for="list">Liste à trié</label>
							<input class="form-control" id="lsit" type="text" name="list" value="4,8,7,90,54,34,1,0,6,45">
						</div>
						<button type="submit" class="btn btn-primary" id="sortProcess">Proceder</button>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8 text-center"><br><br><br>
					<code>
					<?php
					if (isset($_GET["results"]) && $_GET["results"] == "show") {
						$str = ($_POST["list"]);
						switch ($method) {
							case 'select':
								include("classes/selectSort.php");
								selectSort::process($str);
								break;
							case 'insert':
								include("classes/insertSort.php");
								insertSort::process($str);
								break;
							default:
								include("classes/bubbleSort.php");
								bubbleSort::process($str);
								break;
						}
					}
					?>
					</code>
				</div>
			</div>
		</div>
	</body>
</html>
