<?php

session_start();
include('config.php');

// Fetch data
$query = "SELECT regDate, lastUpdationDate, state, Priority FROM tblcomplaints";
$result = $con->query($query);

$totals = array('P1' => 0, 'P2' => 0, 'P3' => 0, 'P4' => 0);
$counters = array('P1' => 0, 'P2' => 0, 'P3' => 0, 'P4' => 0);

// Calculate resolved time and update counters
foreach ($result as $row) {
    $regDate = new DateTime($row['regDate']);
    $lastUpdationDate = new DateTime($row['lastUpdationDate']);
    
    $interval = $lastUpdationDate->diff($regDate);
    $totalMinutes = $interval->days * 24 * 60 + $interval->h * 60 + $interval->i; // Convert days and hours to minutes
    
    $Priority = $row['Priority'];
    
    if ($row['state'] === 'closed') {
        $totals[$Priority] += $totalMinutes;
        $counters[$Priority]++;
    }
}

// Calculate average resolved time in minutes for each Priority
$averageTimes = array();
foreach ($totals as $Priority => $totalMinutes) {
    if ($counters[$Priority] > 0) {
        $averageMinutes = $totalMinutes / $counters[$Priority];
        $averageTimes[$Priority] = $averageMinutes;
    } else {
        $averageTimes[$Priority] = 0;
    }
}

// Prepare data points for the graph
$dataPoints = array();
foreach ($averageTimes as $Priority => $averageTime) {
    $dataPoints[] = array("y" => $averageTime, "label" => $Priority);
}

// Convert the data points array to JSON format for use in JavaScript
$dataPointsJSON = json_encode($dataPoints);
?>

<!DOCTYPE html>
<html>
<head>
       <style>
        #chartContainer {
            height: 300px;
            width: 100%;
        }
        .averages {
            margin-top: 20px;
            padding: 20px;
            background-color: #f4f4f4;
            border: 1px solid #ccc;
            text-align: center;
        }
        .average-item {
           display: inline-block;
   
    font-size: 18px;
    width: 38%;
    margin: 6px 1em;
    border: 2px solid #1d25c5;
    border-radius: 20px;
    padding: 1em 0;

    box-shadow: rgb(79 152 175 / 40%) 0px 5px, rgb(71 145 180 / 30%) 0px 10px, rgb(82 136 189 / 20%) 0px 15px, rgb(74 113 175 / 10%) 0px 20px, rgb(72 129 165 / 5%) 0px 25px;
        }
    </style>

    <script>
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer", {
              theme: "light2", // "light1", "light2", "dark1", "dark2"
	animationEnabled: true,
	zoomEnabled: true,
	title: {
		text: ""
	},
	data: [{
		type: "area",     
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
            chart.render();
        }
    </script>
 
</head>
<body>
    
    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
     <div class="averages">
        <div class="average-item">
            <span>Average P1:</span>
            <?php echo formatTime($averageTimes['P1']); ?>
        </div>
        <div class="average-item">
            <span>Average P2:</span>
            <?php echo formatTime($averageTimes['P2']); ?>
        </div>
        <div class="average-item">
            <span>Average P3:</span>
            <?php echo formatTime($averageTimes['P3']); ?>
        </div>
        <div class="average-item">
            <span>Average P4:</span>
            <?php echo formatTime($averageTimes['P4']); ?>
        </div>
    </div>
       <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>


<?php
// Helper function to format time
function formatTime($averageTime) {
    $days = floor($averageTime / (24 * 60));
    $remainingMinutes = $averageTime % (24 * 60);
    $hours = floor($remainingMinutes / 60);
    $minutes = $remainingMinutes % 60;
    
    return "$days days, $hours hours, $minutes minutes";
}
session_destroy();




?>

