<?php

$edad = pg_escape_string($_GET["edad"]);
$sector = pg_escape_string($_GET["sector"]);
$sexo = pg_escape_string($_GET["sexo"]);
$tamano = pg_escape_string($_GET["tamano"]);
$year = pg_escape_string($_GET["year"]);
$pregunta = pg_escape_string($_GET["pregunta"]);

$conn = pg_connect('host='.getenv('POSTGRES_PORT_5432_TCP_ADDR').' dbname=imss user=postgres password=postgres') or die(form_set_error('db', t('La base de datos no pudo ser contactado.')));

$result = pg_query($conn, 'SELECT clave, '.$pregunta.'_obs AS obs, '.$pregunta.'_por AS sal, p0_1_obs AS total FROM maestros LIMIT 5000');


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
