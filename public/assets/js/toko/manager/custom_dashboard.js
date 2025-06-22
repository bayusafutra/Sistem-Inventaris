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
    Total Penjualan | Render
============================
*/
var d_2C_3 = new ApexCharts(
    document.querySelector("#total-penjualan"),
    d_2options3
);
d_2C_3.render();
