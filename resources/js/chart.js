import helper from "./helper";
import colors from "./colors";
import Chart from "chart.js/auto";

(function () {
    "use strict";

    // Chart
    if ($("#report-line-chart").length) {
        let ctx = $("#report-line-chart")[0].getContext("2d");
        let days = document.getElementById('days');
        let i = 1;
        let labels = [];
        while (i <= days.value) {
            labels.push(i);
            i++;
        }
        let rowsByDay = document.getElementById('rowsByDay');
        let rowsByDayValue = rowsByDay.value;
        const profilesArray = rowsByDayValue.split(', ');
        const profiles = profilesArray.map(Number);
        let myChart = new Chart(ctx, {
            type: "line",
            data: {
                labels: labels,
                datasets: [
                    {
                        label: "# of Client Profiles",
                        data: profiles,
                        borderWidth: 2,
                        borderColor: colors.primary(0.8),
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    x: {
                        ticks: {
                            font: {
                                size: 12,
                            },
                            color: colors.slate["500"](0.8),
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                    },
                    y: {
                        ticks: {
                            font: {
                                size: 12,
                            },
                            color: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                return value;
                            },
                        },
                        grid: {
                            color: $("html").hasClass("dark")
                                ? colors.slate["500"](0.3)
                                : colors.slate["300"](),
                            borderDash: [2, 2],
                            drawBorder: false,
                        },
                    },
                },
            },
        });
    }



    if ($("#report-pie-chart").length) {
        let ctx = $("#report-pie-chart")[0].getContext("2d");
        let data1 = document.getElementById('data1')
        let data2 = document.getElementById('data2')
        let data3 = document.getElementById('data3')
        let data4 = document.getElementById('data4')
        let data = [data1.value, data2.value, data3.value, data4.value]
        let myPieChart = new Chart(ctx, {
            type: "pie",
            data: {
                labels: [
                    "Under 13 Year Old",
                    "13 - 18 Years Old",
                    "19 - 60 Years Old",
                    "Older 60 Years Old",
                ],
                datasets: [
                    {
                        data: data,
                        backgroundColor: [                         
                            colors.danger(0.9),
                            colors.pending(0.9),
                            colors.primary(0.9),
                            colors.warning(0.9),
                        ],
                        hoverBackgroundColor: [
                            colors.danger(0.9),
                            colors.pending(0.9),
                            colors.primary(0.9),
                            colors.warning(0.9),
                        ],
                        borderWidth: 5,
                        borderColor: $("html").hasClass("dark")
                            ? colors.darkmode[700]()
                            : colors.white,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
            },
        });
    }
    
    if ($("#report-pie-chart-gender1").length) {
        let ctx = $("#report-pie-chart-gender1")[0].getContext("2d");
        let dataM1 = document.getElementById('dataM1')
        let dataF1 = document.getElementById('dataF1')
        let data = [dataF1.value, dataM1.value]
        let myPieChart = new Chart(ctx, {
            type: "pie",
            data: {
                labels: [
                    "Female",
                    "Male",
                ],
                datasets: [
                    {
                        data: data,
                        backgroundColor: [                         
                            colors.danger(0.9),
                            colors.primary(0.9),
                        ],
                        hoverBackgroundColor: [
                            colors.danger(0.9),
                            colors.primary(0.9),
                        ],
                        borderWidth: 5,
                        borderColor: $("html").hasClass("dark")
                            ? colors.darkmode[700]()
                            : colors.white,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
            },
        });
    }

    if ($("#report-pie-chart-gender2").length) {
        let ctx = $("#report-pie-chart-gender2")[0].getContext("2d");
        let dataM2 = document.getElementById('dataM2')
        let dataF2 = document.getElementById('dataF2')
        let data = [dataF2.value, dataM2.value]
        let myPieChart = new Chart(ctx, {
            type: "pie",
            data: {
                labels: [
                    "Female",
                    "Male",
                ],
                datasets: [
                    {
                        data: data,
                        backgroundColor: [                         
                            colors.danger(0.9),
                            colors.primary(0.9),
                        ],
                        hoverBackgroundColor: [
                            colors.danger(0.9),
                            colors.primary(0.9),
                        ],
                        borderWidth: 5,
                        borderColor: $("html").hasClass("dark")
                            ? colors.darkmode[700]()
                            : colors.white,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
            },
        });
    }

    if ($("#report-pie-chart-gender3").length) {
        let ctx = $("#report-pie-chart-gender3")[0].getContext("2d");
        let dataM3 = document.getElementById('dataM3')
        let dataF3 = document.getElementById('dataF3')
        let data = [dataF3.value, dataM3.value]
        let myPieChart = new Chart(ctx, {
            type: "pie",
            data: {
                labels: [
                    "Female",
                    "Male",
                ],
                datasets: [
                    {
                        data: data,
                        backgroundColor: [                         
                            colors.danger(0.9),
                            colors.primary(0.9),
                        ],
                        hoverBackgroundColor: [
                            colors.danger(0.9),
                            colors.primary(0.9),
                        ],
                        borderWidth: 5,
                        borderColor: $("html").hasClass("dark")
                            ? colors.darkmode[700]()
                            : colors.white,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
            },
        });
    }
    
    if ($("#report-pie-chart-gender4").length) {
        let ctx = $("#report-pie-chart-gender4")[0].getContext("2d");
        let dataM4 = document.getElementById('dataM4')
        let dataF4 = document.getElementById('dataF4')
        let data = [dataF4.value, dataM4.value]
        let myPieChart = new Chart(ctx, {
            type: "pie",
            data: {
                labels: [
                    "Female",
                    "Male",
                ],
                datasets: [
                    {
                        data: data,
                        backgroundColor: [                         
                            colors.danger(0.9),
                            colors.primary(0.9),
                        ],
                        hoverBackgroundColor: [
                            colors.danger(0.9),
                            colors.primary(0.9),
                        ],
                        borderWidth: 5,
                        borderColor: $("html").hasClass("dark")
                            ? colors.darkmode[700]()
                            : colors.white,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
            },
        });
    }

    if ($("#report-donut-chart").length) {
        let ctx = $("#report-donut-chart")[0].getContext("2d");
        let data5 = document.getElementById('data5')
        let data6 = document.getElementById('data6')
        let data7 = document.getElementById('data7')
        let data8 = document.getElementById('data8')
        let data = [data5.value, data6.value, data7.value, data8.value]
        let myDoughnutChart = new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: [
                    "Terminal",
                    "Surgical",
                    "Chronic",
                    "With Illness",
                ],
                datasets: [
                    {
                        data: data,
                        backgroundColor: [    
                            colors.danger(0.9),
                            colors.primary(0.9),
                            colors.pending(0.9),
                            colors.warning(0.9),
                        ],
                        hoverBackgroundColor: [
                            colors.danger(0.9),
                            colors.primary(0.9),
                            colors.pending(0.9),
                            colors.warning(0.9),
                        ],
                        borderWidth: 5,
                        borderColor: $("html").hasClass("dark")
                            ? colors.darkmode[700]()
                            : colors.white,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                cutout: "75%",
            },
        });
    }
})();
// Chart widget page
if ($("#vertical-bar-chart-widget").length) {
    let ctx = $("#vertical-bar-chart-widget")[0].getContext("2d");
    let myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
            ],
            datasets: [
                {
                    label: "Html Template",
                    barPercentage: 0.5,
                    barThickness: 6,
                    maxBarThickness: 8,
                    minBarLength: 2,
                    data: [0, 200, 250, 200, 500, 450, 850, 1050],
                    backgroundColor: colors.primary(),
                },
                {
                    label: "VueJs Template",
                    barPercentage: 0.5,
                    barThickness: 6,
                    maxBarThickness: 8,
                    minBarLength: 2,
                    data: [0, 300, 400, 560, 320, 600, 720, 850],
                    backgroundColor: $("html").hasClass("dark")
                        ? colors.darkmode["200"]()
                        : colors.slate["300"](),
                },
            ],
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: {
                        color: colors.slate["500"](0.8),
                    },
                },
            },
            scales: {
                x: {
                    ticks: {
                        font: {
                            size: 12,
                        },
                        color: colors.slate["500"](0.8),
                    },
                    grid: {
                        display: false,
                        drawBorder: false,
                    },
                },
                y: {
                    ticks: {
                        font: {
                            size: "12",
                        },
                        color: colors.slate["500"](0.8),
                        callback: function (value, index, values) {
                            return "$" + value;
                        },
                    },
                    grid: {
                        color: $("html").hasClass("dark")
                            ? colors.slate["500"](0.3)
                            : colors.slate["300"](),
                        borderDash: [2, 2],
                        drawBorder: false,
                    },
                },
            },
        },
    });
}