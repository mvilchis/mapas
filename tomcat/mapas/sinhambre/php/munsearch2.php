<?php
// Gets location of municipios from PostGIS query
// Color schemes: ColorBrewer 2.0 (http://colorbrewer2.org)
// © 2014 Cartográfica

$table = "certificaciones";
$clave = "cve_inegi";
$unidad = "municipios";
$search = pg_escape_string($_GET["s"]);


$conn = pg_connect('host=localhost dbname=sinhambreclone user=postgres password=postgres') or die(form_set_error('db', t('La base de datos no pudo ser contactado.')));
$result = pg_query($conn, 'SELECT ST_AsGeoJSON(ST_Transform(ST_Simplify(geom,50),4326)) FROM '.$table.' INNER JOIN '.$unidad.' on ('.$table.'."'.$clave.'"::varchar LIKE '.$unidad.'.cve_inegi::varchar) WHERE municipios.nom_mun % \''.$search.'\' AND similarity(municipios.nom_mun, \''.$search.'\') > 0.35 ORDER BY similarity(municipios.nom_mun, \''.$search.'\') LIMIT 1');
$tables = pg_fetch_array($result);

$conn = pg_connect('host=localhost dbname=sinhambreclone user=postgres password=postgres') or die(form_set_error('db', t('La base de datos no pudo ser contactado.')));
$result = pg_query($conn, 'SELECT * FROM '.$table.' INNER JOIN '.$unidad.' on ('.$table.'."'.$clave.'"::varchar LIKE '.$unidad.'.cve_inegi::varchar) WHERE municipios.nom_mun % \''.$search.'\' AND similarity(municipios.nom_mun, \''.$search.'\') > 0.35 ORDER BY similarity(municipios.nom_mun, \''.$search.'\') LIMIT 1');
$tables_all = pg_fetch_assoc($result);
array_pop($tables_all);
echo "[" . $tables[0] . "," . json_encode($tables_all)."]";

?>
