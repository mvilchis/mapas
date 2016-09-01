<!DOCTYPE html lang="en-UK">
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>CONEVAL | Pobreza y rezago social</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
		<script src="//d3js.org/d3.v3.min.js" charset="utf-8"></script>
		
		<link rel="stylesheet" href="src/tipsy.css" />
		<link rel="stylesheet" href="src/themes/default.css" />
		<link rel="stylesheet" href="src/themes/default.date.css" />
		<link rel="stylesheet" href="//cdn.leafletjs.com/leaflet-0.7/leaflet.css" />
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
		<!--[if lte IE 8]>
		    <link rel="stylesheet" href="//cdn.leafletjs.com/leaflet-0.7/leaflet.ie.css" />
		<![endif]-->
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
		<style type="text/css" media="screen">

body {
    margin: 0;
    padding: 0;
    font: 14px/20px 'Roboto', 'Helvetica Neue', 'Helvetica', 'Arial', sans-serif;
    overflow: hidden;
}

img#img_header {
	position: absolute;
    left: 50px;
    top: 10px;
    z-index: 20;
    background-color: #fff;
    border: 1px solid #ccc;
}

#map {
    position: absolute;
    width: 100%;
    top: 0;
    overflow: hidden;
    height: 100%;
}

.tipsy {
    font-family: 'Rockwell', serif;
    font-size: 14px;
    margin-left: 10px;
}

#agency-select-wrapper {
    position: absolute;
    left: 10px;
    bottom: -390px;
    z-index: 3000;
    background-color: #fff;
}
#legend {
  background-color: #fff;
  position: absolute;
  width: 220px;
  padding: 5px 5px;
  color: #000;
  text-align: center;
  top: 90px;
}

.legend-title {
  font-size: 12px;
  text-transform: uppercase;
  color: #222;
  padding: 3px;
  background-color: #eee;
  margin-bottom: 3px;
  font-weight: 700;
}

.legend-box {
	float: left;
	margin-left: 5px;
	height: 20px;
	width: 38px;
	font-size: 8px;
	color: #999;
}

#datos_mun {
    background-color: #fff;
    font-family: "Roboto", "Arial", sans-serif;
    position: absolute;
    top: 100px;
    right: 20px;
    width: 230px;
}
#nom_var {
	padding: 5px;
	background-color: #fff;
}
.mundata-box {
	background-color: #fff;
    border-bottom: 1px solid #eee;
    position: relative;
    height: 110px;
}

#datos_mun .state_box {
    height: 66px;
    position: relative;
    color: #fff;
}

.state_box .state_name {
    position: absolute;
    left: 90px;
    top: 15px;
    font-size: 11px;
    text-transform: uppercase;
    font-weight: 700;
    width: 200px;
}

.state_box .num_mun {
    position: absolute;
    left: 90px;
    top: 30px;
    font-size: 11px;
}

#datos_mun .nom_mun {
    font-size: 14px;
    padding: 5px 10px;
    font-weight: 700;
    color: #fff;
}

#datos_mun .box-title {
    padding: 5px 10px;
    font-size: 12px;
    text-transform: uppercase;
}

.inversion_caption {
    font-size: 10px;
    line-height: 12px;
    padding: 10px 10px;
}


#inversion_pie {
	position: absolute;
	position: absolute;
    top: 0;
    left: 140px;
}
#porcentaje {
	margin-left: 10px;
	font-weight: 700;
    font-size: 32px;
    margin-top: 5px;
}


.personas_box {
    margin-left: 10px;
    margin-top: 15px;
    margin-bottom: 15px;
    font-size: 16px;
    font-weight: 700;
}

.tiendas_image {
    padding: 5px 10px;
}

.tiendas {
    position: absolute;
    left: 55px;
    top: 32px;
}
.state_image {
	padding-top: 3px;
	margin-left: 15px;
}

#selector {
	left: 10px;
    top: 160px;
    position: absolute;
}
.selector {
	float: left;
	text-align: center;
	width: 100px;
	padding: 5px;
	font-size: 18px;
	color: #fff;
	font-weight: bold;
	height: 50px;
	cursor: pointer;
}
#selector-pobreza {
	background-color: #183D95;
	line-height: 40px;
}
#selector-rezago {
	background-color: #16b348;
}
#selector-pobreza:hover {
	background-color: #9bb4ef;
}
#selector-rezago:hover {
	background-color: rgb(189,234,203);
}
.varlist {
    width: 220px;
    background-color: #fff;
    z-index: 2000;
    position: absolute;
    left: 10px;
    top: 210px;
    font-family: "Roboto", serif;
}

.datos-entidad {
    font-size: 11px;
}
#pobtot {
    padding: 5px 10px;
    border-bottom: 1px solid #eee;
    line-height: 12px;
    font-size: 12px;
    background-color: #fff;
    font-weight: 700;
    color: #555;
}
.varname {
    padding: 5px 10px;
    border-bottom: 1px solid #eee;
    line-height: 12px;
    font-size: 12px;
    background-color: #fff;
    color: #555;
}
.nombre-variable-selected, .nombre-agency-selected {
	background-color: #bbb;
}
#footer {
	bottom: 0;
	position: absolute;
	background-color: #444;
	color: #fff;
	padding: 5px;
	text-align: center;
	font-size: 12px;
}
.green-light.varname, .blue-light.varname {
	background-color: #fff;
}

.green-light.varname:hover {
    background-color: rgb(189,234,203);
}

.blue-light.varname:hover {
    background-color: #9bb4ef;
}

.agency {
    padding: 1px 10px;
}

#datos .values {
    float: right;
    font-weight: 700;
    font-size: 13px;
}

.blue-dark {
	background-color: #183D95;
}
.green-dark {
	background-color: #16b348;
}
.blue-text {
	color: #183D95;
}
.green-text {
	color: #16b348;
}
.blue-light {
	background-color: #9bb4ef;
}
.green-light {
	background-color: rgb(189,234,203);
}
.year.blue-dark:hover {
	background-color: #9bb4ef;
}
.year.green-dark:hover {
	background-color: rgb(189,234,203);
}

.selected-year.blue-dark {
	color: #000;
	background-color: #9bb4ef;
}
.selected-year.green-dark {
	color: #000;
	background-color: rgb(189,234,203);
}
.year {
	padding: 10px 10px;
	font-size: 20px;
	font-weight: bold;
	text-align: center;
	width: 54px;
	float: left;
	color: #fff;
}
#slider-box {
	position: absolute;
	width: 225px;
	top: 595px;
	left: 10px;
	height: 30px;

}

		</style>
		<script src="//cdn.leafletjs.com/leaflet-0.7/leaflet-src.js"></script>
		<script src="js/leaflet.utfgrid.js"></script>
	</head>
	<body>
	
		
		<script type="text/javascript">
		
			var pobreza_vars = {
				"pobreza": {
					"desc": "Pobreza",
					"nom_por": "pobreza",
					"nom_per": "n_pobreza",
					"nom_cp": "cppobreza"
				},
				"pobreza_e": {
					"desc": "Pobreza extrema",
					"nom_por": "pobreza_e",
					"nom_per": "n_pobreza_e",
					"nom_cp": "cppobreza_e"
				},
				"pobreza_m": {
					"desc": "Pobreza moderada",
					"nom_por": "pobreza_m",
					"nom_per": "n_pobreza_m",
					"nom_cp": "cppobreza_m"
				},
				"vul_car": {
					"desc": "Vulnerables por carencia social",
					"nom_por": "vul_car",
					"nom_per": "n_vul_car",
					"nom_cp": "cpvul_car"
				},
				"vul_ing": {
					"desc": "Vulnerables por ingreso",
					"nom_por": "vul_ing",
					"nom_per": "n_vul_ing"
				},
				"npnv": {
					"desc": "No pobres y no vulnerables",
					"nom_por": "npnv",
					"nom_per": "n_npnv"
				},
				"ic_rezedu": {
					"desc": "Rezago educativo",
					"nom_por": "ic_rezedu",
					"nom_per": "n_ic_rezedu",
					"nom_cp": "cpic_rezedu"
				},
				"ic_asalud": {
					"desc": "Carencia por acceso a los servicios de salud",
					"nom_por": "ic_asalud",
					"nom_per": "n_ic_asalud",
					"nom_cp": "cpic_asalud"
				},
				"ic_segsoc": {
					"desc": "Carencia por acceso a la seguridad social",
					"nom_por": "ic_segsoc",
					"nom_per": "n_ic_segsoc",
					"nom_cp": "cpic_segsoc"
				},
				"ic_cv": {
					"desc": "Carencia por calidad y espacios de la vivienda",
					"nom_por": "ic_cv",
					"nom_per": "n_ic_cv",
					"nom_cp": "cpic_cv"
				},
				"ic_sbv": {
					"desc": "Carencia por acceso a los servicios básicos en la vivienda",
					"nom_por": "ic_sbv",
					"nom_per": "n_ic_sbv",
					"nom_cp": "cpic_sbv"
				},
				"ic_ali": {
					"desc": "Carencia por acceso a la alimentación",
					"nom_por": "ic_ali",
					"nom_per": "n_ic_ali",
					"nom_cp": "cpic_ali"
				},
				"carencias": {
					"desc": "Al menos una carencia social",
					"nom_por": "carencias",
					"nom_per": "n_carencias",
					"nom_cp": "cpcarencias"
				},
				"carencias3": {
					"desc": "Tres o más carencias sociales",
					"nom_por": "carencias3",
					"nom_per": "n_carencias3",
					"nom_cp": "cpcarencias3"
				},
				"plb": {
					"desc": "Ingreso inferior a la línea de bienestar",
					"nom_por": "plb",
					"nom_per": "n_plb",
					"nom_cp": "cpplb"
				},
				"plb_m": {
					"desc": "Ingreso inferior a la línea de bienestar mínimo",
					"nom_por": "plb_m",
					"nom_per": "n_plb_m",
					"nom_cp": "cpplb_m"
				}
			};
			var rezago_social_000510_vars = {
				"porc_pob_15_analfa": {
					"desc": "15 años o más analfabeta",
					"nom": "porc_pob_15_analfa"
				},
				"porc_pob614_noasiste": {
					"desc": "6 a 14 años que no asiste a la escuela",
					"nom": "porc_pob614_noasiste"
				},
				"porc_pob15_basicainc": {
					"desc": "Educación básica incompleta",
					"nom": "porc_pob15_basicainc"
				},
				"porc_pob_snservsal": {
					"desc": "Sin derecho-habiencia a los servicios de salud",
					"nom": "porc_pob_snservsal"
				},
				"porc_vivpisotierra": {
					"desc": "Viviendas con piso de tierra",
					"nom": "porc_vivpisotierra"
				},
				"porc_vivsnsan": {
					"desc": "Viviendas que no disponen de excusado o sanitario",
					"nom": "porc_vivsnsan"
				},
				"porc_snaguaent": {
					"desc": "Viviendas que no disponen de agua entubada de la red pública",
					"nom": "porc_snaguaent"
				},
				"porc_vivsndren": {
					"desc": "Viviendas que no disponen de drenaje",
					"nom": "porc_vivsndren"
				},
				"porc_vivsnenergia": {
					"desc": "Viviendas que no disponen de energía eléctrica",
					"nom": "porc_vivsnenergia"
				},
				"porc_vivsnlavadora": {
					"desc": "Viviendas que no disponen de lavadora",
					"nom": "porc_vivsnlavadora"
				},
				"porc_vivsnrefri": {
					"desc": "Viviendas que no disponen de refrigerador",
					"nom": "porc_vivsnrefri"
				}
			};
			var rezago_social_900010_vars = {
				"p_rez_edu_": {
					"desc": "Rezago educativo",
					"nom": "p_rez_edu_"
				},
				"p_ser_sal_": {
					"desc": "Carencia por acceso a los servicios de salud",
					"nom": "p_ser_sal_"
				},
				"p_viv_pisos_": {
					"desc": "Viviendas con carencia por material de pisos",
					"nom": "p_viv_pisos_"
				},
				"p_viv_muros_": {
					"desc": "Viviendas con carencia por material de muros",
					"nom": "p_viv_muros_"
				},
				"p_viv_techos_": {
					"desc": "Viviendas con carencia por material de techos",
					"nom": "p_viv_techos_"
				},
				"p_viv_hacin_": {
					"desc": "Viviendas con carencia por hacinamiento",
					"nom": "p_viv_hacin_"
				},
				"p_viv_agu_entub_": {
					"desc": "Viviendas con carencia por acceso al agua entubada",
					"nom": "p_viv_agu_entub_"
				},
				"p_viv_dren_": {
					"desc": "Viviendas con carencia por servicio de drenaje",
					"nom": "p_viv_dren_"
				},
				"p_viv_elect_": {
					"desc": "Viviendas con carencia por servicio de electricidad",
					"nom": "p_viv_elect_"
				},
				"pobreza_alim_": {
					"desc": "Pobreza por ingresos alimentaria",
					"nom": "pobreza_alim_"
				},
				"pobreza_cap_": {
					"desc": "Pobreza por ingresos de capacidades",
					"nom": "pobreza_cap_"
				},
				"pobreza_patrim_": {
					"desc": "Pobreza por ingresos patrimonial",
					"nom": "pobreza_patrim_"
				},
				"gini_": {
					"desc": "Coeficiente de Gini",
					"nom": "gini_"
				}
			};
		
		</script>
		
		<a href="http://www.coneval.gob.mx"><img id="img_header" width="400" height="92" src="img/coneval-new.png"/></a>

		<div id="map"></div>
		
		<div class="varlist" id="varlist_pobreza" style="display: none;"></div>
		
		<div class="varlist" id="varlist_rezago_social"></div>
		
		<div id="datos_mun" style="display: none;">
			<div class="dark nom_mun">Elija un municipio</div>
			<div class="mundata-box light state_box">
				<div class="state_image"></div>
				<div class="state_name"></div>
				<div class="num_mun"></div>
			</div>
			<div id="pobtot"></div>
			<div id="nom_var" class="box-title">  </div>
			<div class="mundata-box beneficiarios_box">
				<div id="porcentaje" class="text beneficiarios">--</div>
				<div class="personas_box">
					<img src="img/h.png"/>
					<span style="margin-left: 3px;" id="personas" class="text">--</span>
				</div>
				<svg id="inversion_pie" width="80" height="80"></svg>
				<div id="legend">
					Rangos
					<div id="legend-pobreza">
						<div style="background-color: #c7d5f6;" class="legend-box"></div>
						<div style="background-color: #8ca9ed;" class="legend-box"></div>
						<div style="background-color: #527de3;" class="legend-box"></div>
						<div style="background-color: #1f4fc1;" class="legend-box"></div>
						<div style="background-color: #183d95;" class="legend-box"></div>
						<div class="legend-box">&lt; 20%</div>
						<div class="legend-box">20% - 40%</div>
						<div class="legend-box">40% - 60%</div>
						<div class="legend-box">60% - 80%</div>
						<div class="legend-box">&gt; 80%</div>
						<div style="clear:both;"></div>
					</div>
					<div id="legend-rezago000510">
						<div style="background-color: #edf8e9;" class="legend-box"></div>
						<div style="background-color: #bae4b3;" class="legend-box"></div>
						<div style="background-color: #74c476;" class="legend-box"></div>
						<div style="background-color: #31a354;" class="legend-box"></div>
						<div style="background-color: #006d2c;" class="legend-box"></div>
						<div class="legend-box">&lt; 20%</div>
						<div class="legend-box">20% - 40%</div>
						<div class="legend-box">40% - 60%</div>
						<div class="legend-box">60% - 80%</div>
						<div class="legend-box">&gt; 80%</div>
						<div style="clear:both;"></div>
					</div>
				</div>
			</div>

		</div>
		
		<div id="slider-box">
			<div class="dark year" onmousedown="change_year(2000)" id="2000">2000</div>
			<div class="dark year" onmousedown="change_year(2005)" id="2005">2005</div>
			<div class="dark year selected-year" onmousedown="change_year(2010)" id="2010">2010</div>
		</div>
		
		<div id="footer">Fuente: CONEVAL | Boulevard Adolfo López Mateos #160, Colonia San Angel Inn, C.P. 01060, México D.F. Delegación Álvaro Obregón</div>
		
		<script type="text/javascript" charset="utf-8">
		
		
			$.each(pobreza_vars, function(i, item) {
				$("#varlist_pobreza").append("<div class='nombre-variable varname " + item.nom_por + "' onmousedown=\"add_municipios_layer('" + item.nom_por + "','pobreza');\">" + item.desc + "</div>");
			});
			$.each(rezago_social_000510_vars, function(i, item) {
				$("#varlist_rezago_social").append("<div class='nombre-variable varname " + item.nom + "' onmousedown=\"add_municipios_layer('" + item.nom + "','rezago000510');\">" + item.desc + "</div>");
			});

		
			function commaSeparateNumber(val){
			    while (/(\d+)(\d{3})/.test(val.toString())){
			      val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
			    }
			    return val;
			  }
			  
			function change_year(y) {
				$(".selected-year").removeClass("selected-year");
				$("#"+y).addClass("selected-year")
				if (y == 2000) c_year = "00";
		      	else if (y == 2005) c_year = "05";
		      	else if (y == 2000) c_year = "10";
		      	add_municipios_layer(c_var,c_type);
			}
			  
			function change_mode(m) {
				if (m == "pobreza") {
					current_color = '#183D95';
					$( ".dark" ).addClass( "blue-dark" );
					$( ".light" ).addClass( "blue-light" );
					$( ".text" ).addClass( "blue-text" );
					$( ".dark" ).removeClass( "green-dark" );
					$( ".light" ).removeClass( "green-light" );
					$( ".text" ).removeClass( "green-text" );
					$( "#legend-rezago000510" ).hide();
					$( "#legend-pobreza" ).show();
					$( "#varlist_rezago_social" ).hide();
					$( "#varlist_pobreza" ).show();
					$( "#slider-box" ).hide();
					$( "#year" ).hide();
					$( ".personas_box" ).show();
					add_municipios_layer("pobreza","pobreza");
				}
				else if (m == "rezago000510") {
					current_color = '#16b348';
					$( ".dark" ).addClass( "green-dark" );
					$( ".light" ).addClass( "green-light" );
					$( ".text" ).addClass( "green-text" );
					$( ".dark" ).removeClass( "blue-dark" );
					$( ".light" ).removeClass( "blue-light" );
					$( ".text" ).removeClass( "blue-text" );
					$( "#legend-pobreza" ).hide();
					$( "#legend-rezago000510" ).show();
					$( "#varlist_pobreza" ).hide();
					$( "#varlist_rezago_social" ).show();
					$( ".personas_box" ).hide();
					$( "#slider-box" ).show();
					$( "#year" ).show();
					add_municipios_layer("porc_pob_15_analfa","rezago000510");
				}
			}
			   
			var municipios = null;
			var current_clavegeo = null;
			var highlight = null;
			var c_var, c_type;
			var c_year = '10';
			var current_color = '#183D95';
					
			var entidades_list = ["", "Aguascalientes", "Baja California", "Baja California Sur", "Campeche", "Coahuila", "Colima", "Chiapas", "Chihuahua", "Distrito Federal", "Durango", "Guanajuato", "Guerrero", "Hidalgo", "Jalisco", "México", "Michoacán", "Morelos", "Nayarit", "Nuevo León", "Oaxaca", "Puebla", "Querétaro", "Quintana Roo", "San Luis Potosí", "Sinaloa", "Sonora", "Tabasco", "Tamaulipas", "Tlaxcala", "Veracruz", "Yucatán", "Zacatecas"];
			var entidades_count_mun = [0,11,5,5,11,38,10,118,67,16,39,46,81,84,125,125,113,33,20,51,570,217,18,9,58,18,72,17,43,60,212,106,58];
			
			var map = new L.Map('map', {
				maxZoom: 10,
				minZoom: 5
			}).setView(new L.LatLng(21.25,-101.5),5);
			map.scrollWheelZoom.disable();

			var baseLayer = new L.TileLayer("http://{s}.google.com/vt/?hl=en&x={x}&y={y}&z={z}&s={s}&apistyle=p.s%3A-100%2Cs.t%3A1314%7Cp.v%3Aoff%2Cs.t%3A6%7Cp.l%3A31%2Cs.t%3A3%7Cp.v%3Aoff%2Cs.t%3A18%7Cp.v%3Aoff%2Cs.t%3A2%7Cp.v%3Aoff%2Cs.t%3A5%7Cp.l%3A47%2Cs.t%3A20%7Cp.v%3Aoff%2Cs.t%3A4%7Cp.v%3Aoff%2Cs.t%3A5%7Cs.e%3Al%7Cp.v%3Aoff&style=47,37%7Csmartmaps", {
				subdomains: ['mt0','mt1','mt2','mt3'],
				zIndex: -1,
				detectRetina: true
			});
			map.addLayer(baseLayer);
			
			var entidades = new L.TileLayer.WMS("/geoserver/geom/wms", {
				layers: 'geom:entidades',
				transparent: 'true',
				format: 'image/png',
				opacity: '0.5',
				tiled: 'true',
				detectRetina: true,
				zIndex: 200
			});
	        map.addLayer(entidades);
		    
		    
		    function add_municipios_layer(v1,type) {
				if (c_var != null)
					$("."+c_var).removeClass("nombre-variable-selected");
				c_var = v1;
					$("."+c_var).addClass("nombre-variable-selected");
				c_type = type;
				if (municipios != null) map.removeLayer(municipios);
				if (type == "pobreza") {
					municipios = new L.TileLayer.WMS("/geoserver/coneval/wms", {
						viewparams: 'value:' + v1,
						layers: 'coneval:coneval_por',
						transparent: 'true',
						styles: 'coneval_por1',
						format: 'image/png',
						opacity: '0.5',
						tiled: 'true',
						detectRetina: true
					});
				}
				else if (type == "rezago000510") {
					municipios = new L.TileLayer.WMS("/geoserver/coneval/wms", {
						viewparams: 'value:' + v1 + c_year,
						layers: 'coneval:coneval_por',
						transparent: 'true',
						styles: 'coneval_por100',
						format: 'image/png',
						opacity: '0.5',
						tiled: 'true',
						detectRetina: true
					});
				}
				map.addLayer(municipios);
				
				map.on('click', function(e) {
				    (function ($) {
					    if (c_type == "pobreza") {
						    v = c_var;
						    vn = pobreza_vars[c_var].nom_per;
						}
						else {
							v = c_var + c_year;
							vn = c_var + c_year;
						}
				    	$.getJSON( "/coneval/php/attributes.php", { lat: parseFloat(e.latlng.lat), lon: parseFloat(e.latlng.lng), v: v, vn: vn } )
						.done(function( data ) {
							if (highlight != null) map.removeLayer(highlight);
							highlight = L.geoJson(data[0]);
							map.addLayer(highlight);
							attrs = data[1];
							$("#datos_mun").show();
							$(".nom_mun").html("Municipio de " + attrs.nom_mun);
							$(".state_name").html(entidades_list[parseInt(attrs.ent)]);
							$("#pobtot").html("Población total: "+commaSeparateNumber(attrs.pobtot_ajustada));
							$(".num_mun").html(entidades_count_mun[parseInt(attrs.ent)] + " municipios");
							$(".state_image").html("<img src='img/estados_"+current_color.replace("#","")+"/"+parseInt(attrs.ent)+".png' />");
							
							if (c_type == "pobreza") {
								$("#nom_var").html(pobreza_vars[c_var].desc);
								$("#porcentaje").html(Math.round(attrs[c_var]*100*100)/100 + "%");
								$("#personas").html(commaSeparateNumber(attrs[pobreza_vars[c_var].nom_per]));
								// Chart
								var cScale = d3.scale.linear().domain([0, 100]).range([0, 2 * Math.PI]);
								
								var pie_data = [[0,(Math.round(attrs[c_var]*100*100)/100),current_color], [(Math.round(attrs[c_var]*100*100)/100), 100, "#eee"]];
								$("#inversion_pie").empty();
								var vis = d3.select("#inversion_pie");
								var arc = d3.svg.arc()
								.innerRadius(20)
								.outerRadius(40)
								.startAngle(function(d){return cScale(d[0]);})
								.endAngle(function(d){return cScale(d[1]);});
								vis.selectAll("path")
								.data(pie_data)
								.enter()
								.append("path")
								.attr("d", arc)
								.style("fill", function(d){return d[2];})
								.attr("transform", "translate(40,40)");
								$("#inversion_pie").show();
							}
							else if (c_type == "rezago000510") {
								$("#nom_var").html(rezago_social_000510_vars[c_var].desc);
								$("#porcentaje").html(Math.round(attrs[c_var + c_year]*100)/100 + "%");
								// Chart
								var cScale = d3.scale.linear().domain([0, 100]).range([0, 2 * Math.PI]);
		
								var pie_data = [[0,(Math.round(attrs[c_var + c_year]*100)/100),current_color], [(Math.round(attrs[c_var + c_year]*100)/100), 100, "#eee"]];
								$("#inversion_pie").empty();
								var vis = d3.select("#inversion_pie");
								var arc = d3.svg.arc()
								.innerRadius(20)
								.outerRadius(40)
								.startAngle(function(d){return cScale(d[0]);})
								.endAngle(function(d){return cScale(d[1]);});
								vis.selectAll("path")
								.data(pie_data)
								.enter()
								.append("path")
								.attr("d", arc)
								.style("fill", function(d){return d[2];})
								.attr("transform", "translate(40,40)");
								$("#inversion_pie").show();
							}
						});
					}(jQuery));
				});
		    }
	        
	        
			change_mode("rezago000510");
			

		</script>

	</body>

</html>