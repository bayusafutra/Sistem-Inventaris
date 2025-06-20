/*
    ==================================
        Sales By Category | Options
    ==================================
*/
var options = {
    chart: {
        type: "donut",
        width: 397,
    },
    colors: ["#2196f3", "#e2a03f", "#8738a7", "#f7dc6f", "#CB0404"],
    dataLabels: {
        enabled: false,
    },
    legend: {
        position: "bottom",
        horizontalAlign: "center",
        fontSize: "14px",
        markers: {
            width: 10,
            height: 10,
        },
        itemMargin: {
            horizontal: 0,
            vertical: 8,
        },
    },
    plotOptions: {
        pie: {
            donut: {
                size: "50%",
                background: "transparent",
                labels: {
                    show: true,
                    name: {
                        show: true,
                        fontSize: "17px",
                        fontFamily: "Nunito, sans-serif",
                        color: undefined,
                        offsetY: -10,
                    },
                    value: {
                        show: true,
                        fontSize: "26px",
                        fontFamily: "Nunito, sans-serif",
                        color: "20",
                        offsetY: 16,
                        formatter: function (val) {
                            return val;
                        },
                    },
                    total: {
                        show: true,
                        showAlways: true,
                        label: "Total",
                        color: "#888ea8",
                        formatter: function (w) {
                            return w.globals.seriesTotals.reduce(function (
                                a,
                                b
                            ) {
                                return a + b;
                            },
                            0);
                        },
                    },
                },
            },
        },
    },
    stroke: {
        show: true,
        width: 2,
    },
    series: [20, 17, 33, 99, 128],
    labels: ["Beras", "Kecap", "Gula", "Garam", "Lainnya"],
    responsive: [
        {
            breakpoint: 1599,
            options: {
                chart: {
                    width: "350px",
                    height: "400px",
                },
                legend: {
                    position: "bottom",
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: "85%",
                        },
                    },
                },
            },
        },
        {
            breakpoint: 1439,
            options: {
                chart: {
                    width: "350px",
                    height: "390px",
                },
                legend: {
                    position: "bottom",
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: "65%",
                        },
                    },
                },
            },
        },
    ],
};

/*
    =================================
        Revenue Monthly | Options
    =================================
*/

var options1 = {
    chart: {
        fontFamily: "Nunito, sans-serif",
        height: 365,
        type: "area",
        zoom: {
            enabled: false,
        },
        dropShadow: {
            enabled: true,
            opacity: 0.2,
            blur: 10,
            left: -7,
            top: 22,
        },
        toolbar: {
            show: false,
        },
        events: {
            mounted: function (ctx, config) {
                const highest1 = ctx.getHighestValueInSeries(0);
                ctx.addPointAnnotation({
                    x: new Date(
                        ctx.w.globals.seriesX[0][
                            ctx.w.globals.series[0].indexOf(highest1)
                        ]
                    ).getTime(),
                    y: highest1,
                    label: {
                        style: {
                            cssClass: "d-none",
                        },
                    },
                    customSVG: {
                        SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#2196f3" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
                        cssClass: undefined,
                        offsetX: -8,
                        offsetY: 5,
                    },
                });
            },
        },
    },
    colors: ["#2196f3"],
    dataLabels: {
        enabled: false,
    },
    markers: {
        discrete: [
            {
                seriesIndex: 0,
                dataPointIndex: 7,
                fillColor: "#000",
                strokeColor: "#000",
                size: 5,
            },
        ],
    },
    stroke: {
        show: true,
        curve: "smooth",
        width: 2,
        lineCap: "square",
    },
    series: [
        {
            name: "Produk Masuk",
            data: [29, 43, 72, 28, 41, 92, 155, 112, 17, 97, 35, 197],
        },
    ],
    labels: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
    ],
    xaxis: {
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false,
        },
        crosshairs: {
            show: true,
        },
        labels: {
            offsetX: 0,
            offsetY: 5,
            style: {
                fontSize: "12px",
                fontFamily: "Nunito, sans-serif",
                cssClass: "apexcharts-xaxis-title",
            },
        },
    },
    yaxis: {
        labels: {
            formatter: function (value, index) {
                return value;
            },
            offsetX: -22,
            offsetY: 0,
            style: {
                fontSize: "12px",
                fontFamily: "Nunito, sans-serif",
                cssClass: "apexcharts-yaxis-title",
            },
        },
    },
    grid: {
        borderColor: "#e0e6ed",
        strokeDashArray: 5,
        xaxis: {
            lines: {
                show: true,
            },
        },
        yaxis: {
            lines: {
                show: false,
            },
        },
        padding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: -10,
        },
    },
    legend: {
        position: "top",
        horizontalAlign: "right",
        offsetY: 0,
        fontSize: "16px",
        fontFamily: "Nunito, sans-serif",
        markers: {
            width: 10,
            height: 10,
            strokeWidth: 0,
            strokeColor: "#fff",
            fillColors: undefined,
            radius: 12,
            onClick: undefined,
            offsetX: 0,
            offsetY: 0,
        },
        itemMargin: {
            horizontal: 0,
            vertical: 20,
        },
    },
    tooltip: {
        theme: "dark",
        marker: {
            show: true,
        },
        x: {
            show: false,
        },
    },
    fill: {
        type: "gradient",
        gradient: {
            type: "vertical",
            shadeIntensity: 1,
            inverseColors: !1,
            opacityFrom: 0.28,
            opacityTo: 0.05,
            stops: [45, 100],
        },
    },
    responsive: [
        {
            breakpoint: 575,
            options: {
                legend: {
                    offsetY: 10,
                },
            },
        },
    ],
};

/*
    =============================
        Daily Sales | Options
    =============================
*/
var d_2options1 = {
    chart: {
        height: 160,
        type: "bar",
        stacked: true,
        toolbar: {
            show: false,
        },
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        show: true,
        width: 1,
    },
    colors: ["#70B2D9", "#e7f7ff"],
    responsive: [
        {
            breakpoint: 480,
            options: {
                legend: {
                    position: "bottom",
                    offsetX: -10,
                    offsetY: 0,
                },
            },
        },
    ],
    series: [
        {
            name: "Sales",
            data: [44, 55, 41, 67, 22, 43, 21],
        },
        {
            name: "Last Week",
            data: [13, 23, 20, 8, 13, 27, 33],
        },
    ],
    xaxis: {
        labels: {
            show: false,
        },
        categories: ["Sun", "Mon", "Tue", "Wed", "Thur", "Fri", "Sat"],
    },
    yaxis: {
        show: false,
    },
    fill: {
        opacity: 1,
    },
    plotOptions: {
        bar: {
            horizontal: false,
            startingShape: "rounded",
            endingShape: "rounded",
            columnWidth: "25%",
        },
    },
    legend: {
        show: false,
    },
    grid: {
        show: false,
        xaxis: {
            lines: {
                show: false,
            },
        },
        padding: {
            top: 10,
            right: 0,
            bottom: -40,
            left: 0,
        },
    },
};

/*
    =============================
        Total Pengadaan | Options
    =============================
*/
var d_2options2 = {
    chart: {
        id: "pengadaan",
        type: "area",
        height: 315,
        sparkline: {
            enabled: true,
        },
    },
    stroke: {
        curve: "smooth",
        width: 2,
    },
    fill: {
        opacity: 1,
    },
    series: [
        {
            name: "Restock",
            data: [28, 40, 36, 52, 38, 60, 38, 52, 36, 40],
        },
    ],
    labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10"],
    yaxis: {
        min: 0,
    },
    grid: {
        padding: {
            top: 125,
            right: 0,
            bottom: 0,
            left: 0,
        },
    },
    tooltip: {
        x: {
            show: false,
        },
        theme: "dark",
    },
    colors: ["#27548A"],
};

/*
    =============================
        Total Penjualan | Options
    =============================
*/
var d_2options3 = {
    chart: {
        id: "penjualan",
        type: "area",
        height: 315,
        sparkline: {
            enabled: true,
        },
    },
    stroke: {
        curve: "smooth",
        width: 2,
    },
    fill: {
        opacity: 1,
    },
    series: [
        {
            name: "Penjualan",
            data: [28, 40, 36, 52, 38, 60, 38, 52, 36, 40],
        },
    ],
    labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10"],
    yaxis: {
        min: 0,
    },
    grid: {
        padding: {
            top: 125,
            right: 0,
            bottom: 0,
            left: 0,
        },
    },
    tooltip: {
        x: {
            show: false,
        },
        theme: "dark",
    },
    colors: ["#e7515a"],
};

/*
    =================================
        Sales By Category | Render
    =================================
*/
var chart = new ApexCharts(document.querySelector("#chart-2"), options);
chart.render();

/*
    ================================
        Revenue Monthly | Render
    ================================
*/

var chart1 = new ApexCharts(
    document.querySelector("#revenueMonthly"),
    options1
);

chart1.render();

/*
    ============================
        Daily Sales | Render
    ============================
*/
var d_2C_1 = new ApexCharts(
    document.querySelector("#daily-sales"),
    d_2options1
);
d_2C_1.render();

/*
============================
    Total Pengadaan | Render
============================
*/
var d_2C_2 = new ApexCharts(
    document.querySelector("#total-pengadaan"),
    d_2options2
);
d_2C_2.render();

/*
============================
    Total Penjualan | Render
============================
*/
var d_2C_3 = new ApexCharts(
    document.querySelector("#total-penjualan"),
    d_2options3
);
d_2C_3.render();
