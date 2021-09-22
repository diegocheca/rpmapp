<template>
    <div class="ml-8 mt-8 text-xl text-gray-600 leading-7 font-semibold">Título</div>
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
    // data() {
    //     return {
    //         pie: [{
    //             "province": "provincia 1",
    //             "productors": 2025
    //             }, {
    //             "province": "provincia 2",
    //             "productors": 1882
    //             }, {
    //             "province": "provincia 3",
    //             "productors": 1809
    //             }, {
    //             "province": "provincia 4",
    //             "productors": 1322
    //             }, {
    //             "province": "provincia 5",
    //             "productors": 1122
    //             }, {
    //             "province": "provincia 6",
    //             "productors": 1114
    //             }, {
    //             "province": "provincia 7",
    //             "productors": 984
    //             }, {
    //             "province": "provincia 8",
    //             "productors": 711
    //             }, {
    //             "province": "provincia 9",
    //             "productors": 665
    //             }, {
    //             "province": "provincia 10",
    //             "productors": 580
    //             }, {
    //             "province": "provincia 11",
    //             "productors": 443
    //             }, {
    //             "province": "provincia 12",
    //             "productors": 441
    //             }, {
    //             "province": "provincia 13",
    //             "productors": 395
    //             }, {
    //             "province": "provincia 14",
    //             "productors": 395
    //         }]
    //     }
    // },
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
            item[`${this.dataChart.axis.y}`] = Math.floor(Math.random() * (100 - 3)) + 3
            element[this.dataChart.axis.x]
            return item
        });

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