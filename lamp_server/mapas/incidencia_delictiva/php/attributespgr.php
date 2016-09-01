<?php

$year = pg_escape_string($_GET["year"]);
$month = pg_escape_string($_GET["month"]);
$modalidad = pg_escape_string($_GET["modalidad"]);
$submodalidad = "t";
$tipo = "t";
$subtipo = "t";

if ($month == "t") $ratepgr_add = "a";
else if ($month >= 10 || $month <= 4) $ratepgr_add = "a";
else $ratepgr_add = "a";

$conn = pg_connect('host=localhost dbname=pgr user=postgres password=postgres') or die(form_set_error('db', t('La base de datos no pudo ser contactado.')));

$query = 'SELECT "countpgr_'.$year.'".cve AS clave, "countpgr_'.$year.'"."'.$month.'_'.$modalidad.'_'.$submodalidad.'_'.$tipo.'_'.$subtipo.'" AS count, "ratepgr_'.$year.$ratepgr_add.'"."'.$month.'_'.$modalidad.'_'.$submodalidad.'_'.$tipo.'_'.$subtipo.'" AS rate FROM "countpgr_'.$year.'" INNER JOIN "ratepgr_'.$year.$ratepgr_add.'" ON "countpgr_'.$year.'".cve = "ratepgr_'.$year.$ratepgr_add.'".cve';

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
