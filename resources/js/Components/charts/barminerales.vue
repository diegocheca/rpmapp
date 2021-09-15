<template>
    <div class="ml-8 mt-8 text-xl text-gray-600 leading-7 font-semibold">Produccion de Minerales 2021</div>
    <div class="chart-bar" ref="chartdiv" />
</template>

<script>

import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";

am4core.useTheme(am4themes_animated);

export default {
    data() {
        return {
            bars: [{
                "province": "Cobre",
                "productors": 1700
                }, {
                "province": "Cuarzo",
                "productors": 1905
                }, {
                "province": "Plata",
                "productors": 1500
                }, {
                "province": "Estanioo",
                "productors": 1862
                }, {
                "province": "Mica",
                "productors": 782
                }, {
                "province": "Oro",
                "productors": 3421
                }, {
                "province": "Litio",
                "productors": 2895
                }, {
                "province": "Niquel",
                "productors": 1254
                }, {
                "province": "Azufre",
                "productors": 678
                }, {
                "province": "Berilio",
                "productors": 908
                }, {
                "province": "Tantalio",
                "productors": 443
                }, {
                "province": "Uranio",
                "productors": 678
                }, {
                "province": "Platino",
                "productors": 998
                },
                {
                "province": "Granitos",
                "productors": 3215
                }, 
                {
                "province": "Yeso",
                "productors": 3257
                },
                {
                "province": "Dolomita",
                "productors": 2458
                },{
                "province": "Perlita",
                "productors": 1671
                }
                ,{
                "province": "Piedra Laja",
                "productors": 2014
                },
                {
                "province": "Arenisca",
                "productors": 3552
                }
                ,{
                "province": "Basalto",
                "productors": 157
                }
                ,{
                "province": "Calcáreas",
                "productors": 267
                }
                ,{
                "province": "Serpentinas",
                "productors": 457
                }
                ,{
                "province": "Puzzolonas",
                "productors": 326
                }
                ,{
                "province": "Margas",
                "productors": 249
                },{
                "province": "Cuarcitas",
                "productors": 1144
                },
                {
                "province": "Pizzaras",
                "productors": 1007
            }]
        }
    },
    mounted() {
        let chart = am4core.create(this.$refs.chartdiv, am4charts.XYChart);

        chart.scrollbarX = new am4core.Scrollbar();
        chart.data = this.bars;

        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "province";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.minGridDistance = 30;
        categoryAxis.renderer.labels.template.horizontalCenter = "right";
        categoryAxis.renderer.labels.template.verticalCenter = "middle";
        categoryAxis.renderer.labels.template.rotation = 270;
        categoryAxis.tooltip.disabled = true;
        categoryAxis.renderer.minHeight = 110;

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.renderer.minWidth = 50;

        // Create series
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.sequencedInterpolation = true;
        series.dataFields.valueY = "productors";
        series.dataFields.categoryX = "province";
        series.tooltipText = "[{categoryX}: bold]{valueY}[/]";
        series.columns.template.strokeWidth = 0;

        series.tooltip.pointerOrientation = "vertical";

        series.columns.template.column.cornerRadiusTopLeft = 10;
        series.columns.template.column.cornerRadiusTopRight = 10;
        series.columns.template.column.fillOpacity = 0.8;

        // on hover, make corner radiuses bigger
        var hoverState = series.columns.template.column.states.create("hover");
        hoverState.properties.cornerRadiusTopLeft = 0;
        hoverState.properties.cornerRadiusTopRight = 0;
        hoverState.properties.fillOpacity = 1;

        series.columns.template.adapter.add("fill", function(fill, target) {
        return chart.colors.getIndex(target.dataItem.index);
        });

        // Cursor
        chart.cursor = new am4charts.XYCursor();

        this.chart = chart;
    },
    beforeDestroy() {
        if (this.chart) {
        this.chart.dispose();
        }
    }
};
</script>
<style>
    .chart-bar {
      width: 100%;
      height: 400px;
    }
</style>
