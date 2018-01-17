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
    <link rel="stylesheet" type="text/css" href="assets/css/algostat.css">
    <link rel="stylesheet" type="text/css" href="aets/fa/font-awesome.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center"><br>
            <h1><b>Algo Stat 1</b></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 text-center"><br><br><br>
            <form action="?results=show" method="POST">
                <div class="form-group">
                    <label for="chooseSort">Méthode de Tri</label>
                    <select class="form-control" id="chooseSort" name="chooseSort">
                        <option value="select" <?php if ($method == "select") echo "selected" ?>>Tri par Sélection</option>
                        <option value="insert" <?php if ($method == "insert") echo "selected" ?>>Tri par Insertion</option>
                        <option value="bubble" <?php if ($method == "bubble") echo "selected" ?>>Tri à Bulle</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="list">Liste à trier</label>
                    <input class="form-control" id="lsit" type="text" name="list" value="4,8,7,90,54,34,1,0,6,45">
                </div>
                <button type="submit" class="btn btn-primary" id="sortProcess">Proceder</button>
            </form>
        </div>
    </div>
    <?php if (isset($_GET["results"])): ?>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 text-center"><br><br><br>
                <code>
                    <?php
                    $stats = array('nb_it' => "N/A", 'time' => "N/A");
                    if (isset($_GET["results"]) && $_GET["results"] == "show") {
                        $str = ($_POST["list"]);
                        switch ($method) {
                            case 'select':
                                include("classes/selectSort.php");
                                $sort = new selectSort($str);
                                $sort->toString();
                                $stats = $sort->getStatsPerf();
                                break;
                            case 'insert':
                                include("classes/insertSort.php");
                                $sort = new insertSort($str);
                                $sort->Tri_insrt();
                                $stats = $sort->getStatsPerf();
                                break;
                            default:
                                include("classes/bubbleSort.php");
                                $sort = new bubbleSort($str);
                                $sort->toString();
                                $stats = $sort->getStatsPerf();
                                break;
                        }
                    }
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
    <?php endif ?>
</div>
</body>
</html>
