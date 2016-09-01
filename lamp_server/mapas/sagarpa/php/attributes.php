<?php

$producto = pg_escape_string($_GET["producto"]);
$year = pg_escape_string($_GET["year"]);

$conn = pg_connect('host=localhost dbname=sagarpa user=postgres password=postgres') or die(form_set_error('db', t('La base de datos no pudo ser contactado.')));

$result = pg_query($conn, "SELECT * FROM s201412 WHERE producto = '".$producto."' AND year = '".$year."'");
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
