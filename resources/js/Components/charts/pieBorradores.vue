<template>
    <div class="ml-8 mt-8 text-xl text-gray-600 leading-7 font-semibold">{{titulo}}</div>
    <div class="chart-pie" ref="chartdiv" />
</template>

<script>

import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";

am4core.useTheme(am4themes_animated);

export default {
    props: {
        titulo: String,
        aprobados: Number,
        reprobados: Number,
        borrador_cant: Number,
        revision: Number,
        observacion: Number,
    },
    
    data() {
        return {
            pie: [ {
                "estado": "En revision",
                "cantidad": this.$props.revision,
                }, {
                "estado": "Borrador",
                "cantidad": this.$props.borrador_cant,
                }, {
                "estado": "Aprobado",
                "cantidad": this.$props.aprobados,
                }, {
                "estado": "Reprobado",
                "cantidad": this.$props.reprobados,
                }, {
                "estado": "Con Observacion",
                "cantidad": this.$props.observacion,
                }
            ],
        }
    },
    mounted() {
        let chart = am4core.create(this.$refs.chartdiv, am4charts.PieChart);

        // Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "cantidad";
        pieSeries.dataFields.category = "estado";

        chart.data = this.pie;

        // Let's cut a hole in our Pie chart the size of 40% the radius
        chart.innerRadius = am4core.percent(40);

        // Set up fills
        pieSeries.slices.template.fillOpacity = 1;

        var hs = pieSeries.slices.template.states.getKey("hover");
        hs.properties.scale = 1;
        hs.properties.fillOpacity = 0.5;
        // Cursor
        // chart.cursor = new am4charts.XYCursor();

        // this.chart = chart;
    },
    beforeDestroy() {
        if (this.chart) {
        this.chart.dispose();
        }
    }
};
</script>
<style>
    .chart-pie {
      width: 100%;
      height: 350px;
    }
</style>