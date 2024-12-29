<?php
 session_start();
include('../include/config.php');
$sql = "SELECT priority FROM tblcomplaints";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $priority = $row["priority"];
        $days = getDaysForPriority($priority);
        echo "$priority = $days<br>";
    }
} else {
    echo "No records found.";
}

// Close the database connection
$con->close();

// Function to get days based on priority
function getDaysForPriority($priority) {
    switch ($priority) {
        case "P1":
            return "2 days";
        case "P2":
            return "4 days";
        case "p3":
            return "7 days";
        case "p4":
            return "15 days";
        default:
            return "Unknown priority";
    }
}
?>
