<template>
  <div class="ml-8 mt-8 text-xl text-gray-600 leading-7 font-semibold">
    Productores por departamento
  </div>
  <div class="chart-bar" ref="chartdiv" />
</template>

<script>
import * as am4core from "@amcharts/amcharts4/core";
import * as am4maps from "@amcharts/amcharts4/maps";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";

am4core.useTheme(am4themes_animated);

//  AR: {
//     country: "Argentina",
//     continent_code: "SA",
//     continent: "South America",
//     maps: ["argentinaLow", "argentinaHigh"]
// }

export default {
  props: {
    dataChart: {
      required: true,
    },
  },
  async mounted() {
    let chart = am4core.create(this.$refs.chartdiv, am4maps.MapChart);

    const geoDataJson = await import(
      `../../../../helpers/geoJson/${this.dataChart.province.label}.json`
    );
    // const geoDataJson = await import(
    //   `../../../../helpers/geoJson/Río Negro.json`
    // );

    chart.geodata = geoDataJson.default

    // var data = [];
    var aux
    for (var i = 0; i < chart.geodata.features.length; i++) {
      console.log("por mostrar data chart");
      console.log(this.$props.dataChart.data[0].label);
      aux = this.$props.dataChart.data.find( array =>  array.label === chart.geodata.features[i].properties.name);
      if (aux ===  undefined)
        chart.geodata.features[i].properties.value = 0
      else 
        chart.geodata.features[i].properties.value = aux.value
    }

    // Set projection
    chart.projection = new am4maps.projections.Mercator();

    // Create map polygon series
    var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());

    //Set min/max fill color for each area
    polygonSeries.heatRules.push({
      property: "fill",
      target: polygonSeries.mapPolygons.template,
      min: chart.colors.getIndex(1).brighten(1),
      max: chart.colors.getIndex(1).brighten(-0.3),
    });

    // Make map load polygon data (state shapes and names) from GeoJSON
    polygonSeries.useGeodata = true;

    // polygonSeries.data = data;


    // Set up heat legend
    let heatLegend = chart.createChild(am4maps.HeatLegend);
    heatLegend.series = polygonSeries;
    heatLegend.align = "right";
    heatLegend.width = am4core.percent(25);
    heatLegend.marginRight = am4core.percent(4);
    heatLegend.minValue = 0;
    heatLegend.maxValue = 40000000;
    heatLegend.valign = "bottom";

    // Set up custom heat map legend labels using axis ranges
    var minRange = heatLegend.valueAxis.axisRanges.create();
    minRange.value = heatLegend.minValue;
    minRange.label.text = "Menor";
    var maxRange = heatLegend.valueAxis.axisRanges.create();
    maxRange.value = heatLegend.maxValue;
    maxRange.label.text = "Mayor";

    // Blank out internal heat legend value axis labels
    heatLegend.valueAxis.renderer.labels.template.adapter.add(
      "text",
      function (labelText) {
        return "";
      }
    );

    // Configure series tooltip
    var polygonTemplate = polygonSeries.mapPolygons.template;
    polygonTemplate.tooltipText = "{name}: {value}";
    polygonTemplate.nonScalingStroke = true;
    polygonTemplate.strokeWidth = 0.5;

    // Create hover state and set alternative fill color
    var hs = polygonTemplate.states.create("hover");
    hs.properties.fill = chart.colors.getIndex(1).brighten(-0.5);


  },
  beforeDestroy() {
    if (this.chart) {
      this.chart.dispose();
    }
  },
};
</script>
<style>
.chart-bar {
  width: 100%;
  height: 400px;
}
</style>