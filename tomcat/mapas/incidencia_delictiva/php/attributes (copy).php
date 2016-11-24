<?php

$year = pg_escape_string($_GET["year"]);
$month = pg_escape_string($_GET["month"]);
$modalidad = pg_escape_string($_GET["modalidad"]);
$submodalidad = pg_escape_string($_GET["submodalidad"]);
$tipo = pg_escape_string($_GET["tipo"]);
$subtipo = pg_escape_string($_GET["subtipo"]);

if ($month == "t") $rate_add = "b";
else if ($month >= 10 || $month <= 4) $rate_add = "a";
else $rate_add = "b";

$conn = pg_connect('host=localhost dbname=incidencia_delictiva user=postgres password=postgres') or die(form_set_error('db', t('La base de datos no pudo ser contactado.')));

$query = 'SELECT "count_'.$year.'".cve AS clave, "count_'.$year.'"."'.$month.'_'.$modalidad.'_'.$submodalidad.'_'.$tipo.'_'.$subtipo.'" AS count, "rate_'.$year.$rate_add.'"."'.$month.'_'.$modalidad.'_'.$submodalidad.'_'.$tipo.'_'.$subtipo.'" AS rate FROM "count_'.$year.'" INNER JOIN "rate_'.$year.$rate_add.'" ON "count_'.$year.'".cve = "rate_'.$year.$rate_add.'".cve';

$result = pg_query($conn, $query);

$results = pg_fetch_all($result);

foreach ($results as $row) {
	$clave = $row["clave"];
	if (empty($results_out[$clave])) {
		$results_out[str_pad($clave, 5, "0", STR_PAD_LEFT)] = array();
	}
	foreach ($row as $key => $value) {
		if ($key != "clave") {
			$results_out[str_pad($clave, 5, "0", STR_PAD_LEFT)][$key] = $value;
		}
	}
}

echo json_encode($results_out);



?>
