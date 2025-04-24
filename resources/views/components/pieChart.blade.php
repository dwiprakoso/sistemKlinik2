
<script>
        
    const getChartOptions = () => {
    return {
        series: [52.8, 26.8, 20.4],
        colors: ["#fd7d06", "#f9bfc9", "#fd1d02"],
        chart: {
        height: 360,
        width: "100%",
        type: "pie",
        },
        stroke: {
        colors: ["white"],
        lineCap: "",
        },
        plotOptions: {
        pie: {
            labels: {
            show: true,
            },
            size: "100%",
            dataLabels: {
            offset: -25
            }
        },
        },
        labels: ["Pendaftar", "Diterima", "Ditolak"],
        dataLabels: {
        enabled: true,
        style: {
            fontFamily: "Inter, sans-serif",
        },
        },
        legend: {
        position: "bottom",
        fontFamily: "Inter, sans-serif",
        },
        yaxis: {
        labels: {
            formatter: function (value) {
            return value + "%"
            },
        },
        },
        xaxis: {
        labels: {
            formatter: function (value) {
            return value  + "%"
            },
        },
        axisTicks: {
            show: false,
        },
        axisBorder: {
            show: false,
        },
        },
    }
    }

    if (document.getElementById("pie-chart") && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions());
    chart.render();
    }

</script>