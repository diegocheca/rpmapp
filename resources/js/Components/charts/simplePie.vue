<template>
    <div class="ml-8 mt-8 text-xl text-gray-600 leading-7 font-semibold">{{data.title}}</div>
    <div class="chart-pie" ref="chartdiv" />
</template>

<script>

import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";
import ChartClass from "../../../../helpers/clases/chartClass"

am4core.useTheme(am4themes_animated);

export default {
    props: {
        dataChart: {
            required: false
        }
    },
    data() {
        return {
            data: new ChartClass(),
            chart: null
        }
    },
    mounted() {
        let chart = am4core.create(this.$refs.chartdiv, am4charts.PieChart);

        if(!this.dataChart) {
            this.dataDefault();
        } else {
            this.data = this.dataChart
        }

        // Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = this.data.axis.y;
        pieSeries.dataFields.category = this.data.axis.x;

        pieSeries.slices.template.stroke = am4core.color("#fff");
        pieSeries.slices.template.strokeWidth = 2;
        pieSeries.slices.template.strokeOpacity = 1;


        // This creates initial animation
        pieSeries.hiddenState.properties.opacity = 1;
        pieSeries.hiddenState.properties.endAngle = -90;
        pieSeries.hiddenState.properties.startAngle = -90;

        // chart.data = this.pie;
        chart.data = this.data.data.map( (element) => {
            let item = {}
            item[`${this.data.axis.x}`] = element.label
            item[`${this.data.axis.y}`] = Math.floor(Math.random() * (100 - 3)) + 3
            element[this.data.axis.x]
            return item
        });

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

    },
    beforeDestroy() {
        if (this.chart) {
        this.chart.dispose();
        }
    },
    methods: {
        dataDefault() {

        this.data.title = 'Título de ejemplo'
        this.data.axis.x = 'country'
        this.data.axis.y = 'litres'
        this.data.data =
            [
                {
                "label": "Lithuania",
                "value": 501.9
                }, {
                "label": "Czechia",
                "value": 301.9
                }, {
                "label": "Ireland",
                "value": 201.1
                }, {
                "label": "Germany",
                "value": 165.8
                }, {
                "label": "Australia",
                "value": 139.9
                }, {
                "label": "Austria",
                "value": 128.3
                }, {
                "label": "UK",
                "value": 99
                }, {
                "label": "Belgium",
                "value": 60
                }, {
                "label": "The Netherlands",
                "value": 50
                }
            ]
        }
    },
};
</script>
<style>
    .chart-pie {
      width: 100%;
      height: 350px;
    }
</style>
