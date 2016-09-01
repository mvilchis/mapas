<?php

$year = pg_escape_string($_GET["year"]);
$month = pg_escape_string($_GET["month"]);
$modalidad = pg_escape_string($_GET["modalidad"]);
$submodalidad = pg_escape_string($_GET["submodalidad"]);
$tipo = pg_escape_string($_GET["tipo"]);
$subtipo = pg_escape_string($_GET["subtipo"]);

if ($month == "t") $month = "%";
if ($modalidad == "t") $modalidad = "%";
if ($submodalidad == "t") $submodalidad = "%";
if ($tipo == "t") $tipo = "%";
if ($subtipo == "t") $subtipo = "%";

$conn = pg_connect('host=localhost dbname=incidencia_delictiva user=postgres password=postgres') or die(form_set_error('db', t('La base de datos no pudo ser contactado.')));

$query = "SELECT \"column\" FROM variables WHERE \"column\" LIKE '".$year."_".$month."_".$modalidad."_".$submodalidad."_".$tipo."_".$subtipo."'";


$result = pg_query($conn, $query);
$results = pg_fetch_all($result);

$fill = array( array(), array(), array(), array(), array(), array() );

foreach ($results as $row) {
	$split = explode("_", $row["column"]);
	for ($i = 1; $i < 6; $i++) {
		if (!in_array($split[$i], $fill[$i])) array_push($fill[$i], $split[$i]);
	}
}

echo json_encode($fill);

?>
