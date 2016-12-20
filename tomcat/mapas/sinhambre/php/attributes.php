<?php
// Gets attributes at location from PostGIS query
// Color schemes: ColorBrewer 2.0 (http://colorbrewer2.org)
// © 2014 Cartográfica

$table = "s201411";
$clave = "cve_inegi";
$unidad = "municipios";
$lat = pg_escape_string($_GET["lat"]);
$lon = pg_escape_string($_GET["lon"]);


$conn = pg_connect('host='.getenv('POSTGRES_PORT_5432_TCP_ADDR').' dbname=sinhambreclone user=postgres password=postgres') or die(form_set_error('db', t('La base de datos no pudo ser contactado.')));
$result = pg_query($conn, 'SELECT ST_AsGeoJSON(ST_Transform(ST_Simplify(geom,50),4326)) FROM '.$table.' INNER JOIN '.$unidad.' on ('.$table.'."'.$clave.'"::varchar LIKE '.$unidad.'.cve_inegi::varchar) WHERE ST_Contains(geom, ST_Transform(ST_PointFromText(\'POINT('.$lon.' '.$lat.')\', 4326),900913))');
$tables = pg_fetch_array($result);

$conn = pg_connect('host='.getenv('POSTGRES_PORT_5432_TCP_ADDR').' dbname=sinhambreclone user=postgres password=postgres') or die(form_set_error('db', t('La base de datos no pudo ser contactado.')));
$result = pg_query($conn, 'SELECT * FROM '.$table.' INNER JOIN '.$unidad.' on ('.$table.'."'.$clave.'"::varchar LIKE '.$unidad.'.cve_inegi::varchar) WHERE ST_Contains(geom, ST_Transform(ST_PointFromText(\'POINT('.$lon.' '.$lat.')\', 4326),900913))');
$tables_all = pg_fetch_assoc($result);
array_pop($tables_all);
echo "[" . $tables[0] . "," . json_encode($tables_all)."]";

?>
