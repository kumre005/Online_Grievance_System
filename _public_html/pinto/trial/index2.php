<!DOCTYPE HTML>
<html>
<head>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <script>
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Average Amount Spent on Real and Artificial X-Mas Trees in U.S."
                },
                axisY: {
                    includeZero: true
                },
                legend: {
                    cursor: "pointer",
                    verticalAlign: "center",
                    horizontalAlign: "right",
                    itemclick: toggleDataSeries
                },
                data: [
                    {
                        type: "column",
                        name: "Real Trees",
                        indexLabel: "{y}",
                        yValueFormatString: "$#0.##",
                        showInLegend: true,
                        dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
                    },
                    {
                        type: "column",
                        name: "Artificial Trees 1",
                        indexLabel: "{y}",
                        yValueFormatString: "$#0.##",
                        showInLegend: true,
                        dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
                    },
                    {
                        type: "column",
                        name: "Artificial Trees 2",
                        indexLabel: "{y}",
                        yValueFormatString: "$#0.##",
                        showInLegend: true,
                        dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
                    },
                    {
                        type: "column",
                        name: "Artificial Trees 3",
                        indexLabel: "{y}",
                        yValueFormatString: "$#0.##",
                        showInLegend: true,
                        dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
                    }
                ]
            });
            chart.render();

            function toggleDataSeries(e) {
                if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }
        }
    </script>
</head>
<body>
<div>
    <input type="checkbox" class="checkbox" id="checkbox1"> Real Trees
    <input type="checkbox" class="checkbox" id="checkbox2"> Artificial Trees 1
    <input type="checkbox" class="checkbox" id="checkbox3"> Artificial Trees 2
    <input type="checkbox" class="checkbox" id="checkbox4"> Artificial Trees 3
</div>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
</body>
</html>
