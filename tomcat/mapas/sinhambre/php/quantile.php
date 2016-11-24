<?php
// Generates SLD file with custom number quantile breaks
// Color schemes: ColorBrewer 2.0 (http://colorbrewer2.org)
// © 2014 Cartográfica

$table = "s201411";
$var = pg_escape_string($_GET["var"]);
$num_classes = 4;
$color_in = "purples";

$color["oranges"] = array(
    3 => array("#fee6ce", "#fdae6b", "#e6550d"),
    4 => array("#feedde", "#fdbe85", "#fd8d3c", "#d94701"),
    5 => array("#feedde", "#fdbe85", "#fd8d3c", "#e6550d", "#a63603"),
    6 => array("#feedde", "#fdd0a2", "#fdae6b", "#fd8d3c", "#e6550d", "#a63603"),
    7 => array("#feedde", "#fdd0a2", "#fdae6b", "#fd8d3c", "#f16913", "#d94801", "#8c2d04"),
    8 => array("#fff5eb", "#fee6ce", "#fdd0a2", "#fdae6b", "#fd8d3c", "#f16913", "#d94801", "#8c2d04"),
    9 => array("#fff5eb", "#fee6ce", "#fdd0a2", "#fdae6b", "#fd8d3c", "#f16913", "#d94801", "#a63603", "#7f2704"),
);

$color["blues"] = array(
    3 => array("#deebf7", "#9ecae1", "#3182bd"),
    4 => array("#eff3ff", "#bdd7e7", "#6baed6", "#2171b5"),
    5 => array("#eff3ff", "#bdd7e7", "#6baed6", "#3182bd", "#08519c"),
    6 => array("#eff3ff", "#c6dbef", "#9ecae1", "#6baed6", "#3182bd", "#08519c"),
    7 => array("#eff3ff", "#c6dbef", "#9ecae1", "#6baed6", "#4292c6", "#2171b5", "#084594"),
    8 => array("#f7fbff", "#deebf7", "#c6dbef", "#9ecae1", "#6baed6", "#4292c6", "#2171b5", "#084594"),
    9 => array("#f7fbff", "#deebf7", "#c6dbef", "#9ecae1", "#6baed6", "#4292c6", "#2171b5", "#08519c", "#08306b"),
);

$color["greens"] = array(
    3 => array("#e5f5e0", "#a1d99b", "#31a354"),
    4 => array("#edf8e9", "#bae4b3", "#74c476", "#238b45"),
    5 => array("#edf8e9", "#bae4b3", "#74c476", "#31a354", "#006d2c"),
    6 => array("#edf8e9", "#c7e9c0", "#a1d99b", "#74c476", "#31a354", "#006d2c"),
    7 => array("#edf8e9", "#c7e9c0", "#a1d99b", "#74c476", "#41ab5d", "#238b45", "#005a32"),
    8 => array("#f7fcf5", "#e5f5e0", "#c7e9c0", "#a1d99b", "#74c476", "#41ab5d", "#238b45", "#005a32"),
    9 => array("#f7fcf5", "#e5f5e0", "#c7e9c0", "#a1d99b", "#74c476", "#41ab5d", "#238b45", "#006d2c", "#00441b"),
);

$color["purples"] = array(
    3 => array("#efedf5", "#bcbddc", "#756bb1"),
    4 => array("#f2f0f7", "#cbc9e2", "#9e9ac8", "#6a51a3"),
    5 => array("#f2f0f7", "#cbc9e2", "#9e9ac8", "#756bb1", "#54278f"),
    6 => array("#f2f0f7", "#dadaeb", "#bcbddc", "#9e9ac8", "#756bb1", "#54278f"),
    7 => array("#f2f0f7", "#dadaeb", "#bcbddc", "#9e9ac8", "#807dba", "#6a51a3", "#4a1486"),
    8 => array("#fcfbfd", "#efedf5", "#dadaeb", "#bcbddc", "#9e9ac8", "#807dba", "#6a51a3", "#4a1486"),
    9 => array("#fcfbfd", "#efedf5", "#dadaeb", "#bcbddc", "#9e9ac8", "#807dba", "#6a51a3", "#54278f", "#3f007d"),
);

$color["reds"] = array(
    3 => array("#fee0d2", "#fc9272", "#de2d26"),
    4 => array("#fee5d9", "#fcae91", "#fb6a4a", "#cb181d"),
    5 => array("#fee5d9", "#fcae91", "#fb6a4a", "#de2d26", "#a50f15"),
    6 => array("#fee5d9", "#fcbba1", "#fc9272", "#fb6a4a", "#de2d26", "#a50f15"),
    7 => array("#fee5d9", "#fcbba1", "#fc9272", "#fb6a4a", "#ef3b2c", "#cb181d", "#99000d"),
    8 => array("#fff5f0", "#fee0d2", "#fcbba1", "#fc9272", "#fb6a4a", "#ef3b2c", "#cb181d", "#99000d"),
    9 => array("#fff5f0", "#fee0d2", "#fcbba1", "#fc9272", "#fb6a4a", "#ef3b2c", "#cb181d", "#a50f15", "#67000d"),
);

$color["ylgn"] = array(
    3 => array("#f7fcb9", "#addd8e", "#31a354"),
    4 => array("#ffffcc", "#c2e699", "#78c679", "#238443"),
    5 => array("#ffffcc", "#c2e699", "#78c679", "#31a354", "#006837"),
    6 => array("#ffffcc", "#d9f0a3", "#addd8e", "#78c679", "#31a354", "#006837"),
    7 => array("#ffffcc", "#d9f0a3", "#addd8e", "#78c679", "#41ab5d", "#238443", "#005a32"),
    8 => array("#ffffe5", "#f7fcb9", "#d9f0a3", "#addd8e", "#78c679", "#41ab5d", "#238443", "#005a32"),
    9 => array("#ffffe5", "#f7fcb9", "#d9f0a3", "#addd8e", "#78c679", "#41ab5d", "#238443", "#006837", "#004529"),
);

$color["bugn"] = array(
    3 => array("#e5f5f9", "#99d8c9", "#2ca25f"),
    4 => array("#edf8fb", "#b2e2e2", "#66c2a4", "#238b45"),
    5 => array("#edf8fb", "#b2e2e2", "#66c2a4", "#2ca25f", "#006d2c"),
    6 => array("#edf8fb", "#ccece6", "#99d8c9", "#66c2a4", "#2ca25f", "#006d2c"),
    7 => array("#edf8fb", "#ccece6", "#99d8c9", "#66c2a4", "#41ae76", "#238b45", "#005824"),
    8 => array("#f7fcfd", "#e5f5f9", "#ccece6", "#99d8c9", "#66c2a4", "#41ae76", "#238b45", "#005824"),
    9 => array("#f7fcfd", "#e5f5f9", "#ccece6", "#99d8c9", "#66c2a4", "#41ae76", "#238b45", "#006d2c", "#00441b"),
);

$conn = pg_connect('host=localhost dbname=sinhambreclone user=postgres password=posgres') or die(form_set_error('db', t('La base de datos no pudo ser contactado.')));
$result = pg_query($conn, 'select carto_quantilebins2(array_agg('.$table.'."'.$var.'"::numeric), '.$num_classes.') from '.$table.' ');
$search = array( "{", "}" );
$replace = str_replace($search, "", pg_fetch_array($result));
$classes = explode(",", $replace[0]);

header ("Content-Type:text/xml");
?>
<StyledLayerDescriptor version="1.0.1" 
    xsi:schemaLocation="http://www.opengis.net/sld StyledLayerDescriptor.xsd" 
    xmlns="http://www.opengis.net/sld" 
    xmlns:ogc="http://www.opengis.net/ogc" 
    xmlns:xlink="http://www.w3.org/1999/xlink" 
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
  <NamedLayer>
  	<Name>sinhambre:sinhambre</Name>
		 <UserStyle xmlns="http://www.opengis.net/sld" xmlns:sld="http://www.opengis.net/sld" xmlns:ogc="http://www.opengis.net/ogc" xmlns:gml="http://www.opengis.net/gml">
  <FeatureTypeStyle>
    <Rule>
      <ogc:Filter>
        <ogc:PropertyIsLessThan>
          <ogc:PropertyName>var</ogc:PropertyName>
          <ogc:Literal><?php print($classes[0]); ?></ogc:Literal>
        </ogc:PropertyIsLessThan>
      </ogc:Filter>
      <PolygonSymbolizer>
        <Fill>
          <CssParameter name="fill">#ba98c6</CssParameter>
        </Fill>
      </PolygonSymbolizer>
      <LineSymbolizer>
        <Stroke>
          <CssParameter name="stroke">#9a67ab</CssParameter>
          <CssParameter name="stroke-width">0.25</CssParameter>
        </Stroke>
      </LineSymbolizer>
    </Rule>
    <Rule>
      <ogc:Filter>
        <ogc:And>
          <ogc:PropertyIsLessThan>
            <ogc:PropertyName>var</ogc:PropertyName>
            <ogc:Literal><?php print($classes[3]); ?></ogc:Literal>
          </ogc:PropertyIsLessThan>
          <ogc:Not>
            <ogc:PropertyIsLessThan>
              <ogc:PropertyName>var</ogc:PropertyName>
              <ogc:Literal><?php print($classes[2]); ?></ogc:Literal>
            </ogc:PropertyIsLessThan>
          </ogc:Not>
        </ogc:And>
      </ogc:Filter>
      <PolygonSymbolizer>
        <Fill>
          <CssParameter name="fill">#5c2978</CssParameter>
        </Fill>
      </PolygonSymbolizer>
      <LineSymbolizer>
        <Stroke>
          <CssParameter name="stroke">#5c2978</CssParameter>
          <CssParameter name="stroke-width">0.25</CssParameter>
        </Stroke>
      </LineSymbolizer>
    </Rule>
    <Rule>
      <ogc:Filter>
        <ogc:Not>
          <ogc:PropertyIsLessThan>
            <ogc:PropertyName>var</ogc:PropertyName>
            <ogc:Literal><?php print($classes[3]); ?></ogc:Literal>
          </ogc:PropertyIsLessThan>
        </ogc:Not>
      </ogc:Filter>
      <PolygonSymbolizer>
        <Fill>
          <CssParameter name="fill">#eeeeee</CssParameter>
        </Fill>
      </PolygonSymbolizer>
      <LineSymbolizer>
        <Stroke>
          <CssParameter name="stroke">#cccccc</CssParameter>
          <CssParameter name="stroke-width">0.25</CssParameter>
        </Stroke>
      </LineSymbolizer>
    </Rule>
    <Rule>
      <ogc:Filter>
          <ogc:PropertyIsEqualTo>
            <ogc:PropertyName>var</ogc:PropertyName>
            <ogc:Literal>0</ogc:Literal>
          </ogc:PropertyIsEqualTo>
      </ogc:Filter>
      <PolygonSymbolizer>
        <Fill>
          <CssParameter name="fill">#eeeeee</CssParameter>
        </Fill>
      </PolygonSymbolizer>
      <LineSymbolizer>
        <Stroke>
          <CssParameter name="stroke">#cccccc</CssParameter>
          <CssParameter name="stroke-width">0.25</CssParameter>
        </Stroke>
      </LineSymbolizer>
    </Rule>
    <Rule>
      <ogc:Filter>
        <ogc:And>
          <ogc:PropertyIsLessThan>
            <ogc:PropertyName>var</ogc:PropertyName>
            <ogc:Literal><?php print($classes[1]); ?></ogc:Literal>
          </ogc:PropertyIsLessThan>
          <ogc:Not>
            <ogc:PropertyIsLessThan>
              <ogc:PropertyName>var</ogc:PropertyName>
              <ogc:Literal><?php print($classes[0]); ?></ogc:Literal>
            </ogc:PropertyIsLessThan>
          </ogc:Not>
        </ogc:And>
      </ogc:Filter>
      <PolygonSymbolizer>
        <Fill>
          <CssParameter name="fill">#9a67ab</CssParameter>
        </Fill>
      </PolygonSymbolizer>
      <LineSymbolizer>
        <Stroke>
          <CssParameter name="stroke">#5c2978</CssParameter>
          <CssParameter name="stroke-width">0.25</CssParameter>
        </Stroke>
      </LineSymbolizer>
    </Rule>
    <Rule>
      <ogc:Filter>
        <ogc:And>
          <ogc:PropertyIsLessThan>
            <ogc:PropertyName>var</ogc:PropertyName>
            <ogc:Literal><?php print($classes[2]); ?></ogc:Literal>
          </ogc:PropertyIsLessThan>
          <ogc:Not>
            <ogc:PropertyIsLessThan>
              <ogc:PropertyName>var</ogc:PropertyName>
              <ogc:Literal><?php print($classes[1]); ?></ogc:Literal>
            </ogc:PropertyIsLessThan>
          </ogc:Not>
        </ogc:And>
      </ogc:Filter>
      <PolygonSymbolizer>
        <Fill>
          <CssParameter name="fill">#5c2978</CssParameter>
        </Fill>
      </PolygonSymbolizer>
      <LineSymbolizer>
        <Stroke>
          <CssParameter name="stroke">#5c2978</CssParameter>
          <CssParameter name="stroke-width">0.25</CssParameter>
        </Stroke>
      </LineSymbolizer>
    </Rule>
  </FeatureTypeStyle>
</UserStyle>
  </NamedLayer>
</StyledLayerDescriptor>
