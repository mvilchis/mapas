<?php
$tipo = pg_escape_string($_GET["tipo"]);
$causa = pg_escape_string($_GET["causa"]);
$lugar = pg_escape_string($_GET["lugar"]);
$ecivil = pg_escape_string($_GET["ecivil"]);
$escol = pg_escape_string($_GET["escol"]);
$ocup = pg_escape_string($_GET["ocup"]);
$derecho = pg_escape_string($_GET["derecho"]);
$derecho = pg_escape_string($_GET["derecho"]);
$year = pg_escape_string($_GET["year"]);
$razon = pg_escape_string(1);


$where = "WHERE ";
if ($causa != "") {
	if ($where != "WHERE ") $where = $where . "AND ";
	$where = $where . "causa = '".$causa."' ";
}
if ($lugar != "") {
	if ($where != "WHERE ") $where = $where . "AND ";
	$where = $where . "lugar = '".$lugar."' ";
}
if ($ecivil != "") {
	if ($where != "WHERE ") $where = $where . "AND ";
	$where = $where . "ecivil = '".$ecivil."' ";
}
if ($escol != "") {
	if ($where != "WHERE ") $where = $where . "AND ";
	$where = $where . "escol = '".$escol."' ";
}
if ($ocup != "") {
	if ($where != "WHERE ") $where = $where . "AND ";
	$where = $where . "ocup = '".$ocup."' ";
}
if ($derecho != "") {
	if ($where != "WHERE ") $where = $where . "AND ";
	$where = $where . "derecho = '".$derecho."' ";
}
if ($razon != "") {
	if ($where != "WHERE ") $where = $where . "AND ";
	$where = $where . "razon = '".$razon."' ";
}
if ($year != "") {
	if ($where != "WHERE ") $where = $where . "AND ";
	$where = $where . "yearocur = '".$year."' ";
}
if ($where == "WHERE ") $where = '';

$conn = pg_connect('host=localhost dbname=mortalidad_materna user=postgres password=postgres') or die(form_set_error('db', t('La base de datos no pudo ser contactado.')));
$result = pg_query($conn, 'SELECT clave_'.$tipo.' AS clave, COUNT(*) FROM mortalidadmaterna4 '.$where.' GROUP BY clave_'.$tipo);

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
