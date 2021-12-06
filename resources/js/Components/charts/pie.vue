<template>
    <div class="ml-8 mt-8 text-xl text-gray-600 leading-7 font-semibold">{{dataChart.title}}</div>
    <div class="chart-pie" ref="chartdiv" />
</template>

<script>

import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";

am4core.useTheme(am4themes_animated);

export default {
    props: {
        dataChart: {
            required: true
        }
    },

    mounted() {
        let chart = am4core.create(this.$refs.chartdiv, am4charts.PieChart);

        // Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = this.dataChart.axis.y;
        pieSeries.dataFields.category = this.dataChart.axis.x;

        // chart.data = this.pie;
        chart.data = this.dataChart.data.map( (element) => {
            let item = {}
            item[`${this.dataChart.axis.x}`] = element.label
            //item[`${this.dataChart.axis.y}`] = Math.floor(Math.random() * (100 - 3)) + 3
            item[`${this.dataChart.axis.y}`] = element.value
            element[this.dataChart.axis.x]
            return item
        });

        // This creates initial animation
        pieSeries.hiddenState.properties.opacity = 1;
        pieSeries.hiddenState.properties.endAngle = -90;
        pieSeries.hiddenState.properties.startAngle = -90;

        // Let's cut a hole in our Pie chart the size of 40% the radius
        chart.innerRadius = am4core.percent(40);

        // Set up fills
        pieSeries.slices.template.fillOpacity = 1;

        var hs = pieSeries.slices.template.states.getKey("hover");
        hs.properties.scale = 1;
        hs.properties.fillOpacity = 0.5;

                // Enable export
        chart.exporting.menu = new am4core.ExportMenu();
        chart.exporting.menu.align = "right";
        chart.exporting.menu.verticalAlign = "bottom";
        chart.exporting.menu.items = [{
            "label": "...",
            "menu": [
                {
                    "label": "Imagenes",
                    "menu": [
                        { "type": "png", "label": "PNG" },
                        { "type": "jpg", "label": "JPG" },
                        { "type": "svg", "label": "SVG" },
                        { "type": "pdf", "label": "PDF" }
                    ]
                },
                {
                    "label": "Exportar",
                    "menu": [
                        { "type": "json", "label": "JSON" },
                        { "type": "csv", "label": "CSV" },
                        { "type": "xlsx", "label": "XLSX" },
                        { "type": "html", "label": "HTML" },
                        { "type": "pdfdata", "label": "PDF" }
                    ]
                },
                {
                    "label": "Imprimir", "type": "print"
                }
            ]
        }];

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