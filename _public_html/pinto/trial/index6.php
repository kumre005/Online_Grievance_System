<?php
session_start();
include('../include/config.php');

$priorityDays = array(
    "P1" => 2,
    "P2" => 4,
    "P3" => 7,
    "P4" => 15
);

// Initialize variables to store counts for each priority
$P1 = $P2 = $P3 = $P4 = 0;

// Prepare and execute the query for each priority
foreach ($priorityDays as $priority => $days) {
    $timeAgo = date("Y-m-d H:i:s", strtotime("-$days days"));
    $query = "
        SELECT COUNT(*) AS count
        FROM tblcomplaints
        WHERE
            RegDate < '$timeAgo' AND
            state != 'closed' AND
            priority = '$priority';
    ";

    $stmt = $con->prepare($query);

    if ($stmt) {
        // Execute the query
        $stmt->execute();

        $result = $stmt->get_result();

        $row = $result->fetch_assoc();
        ${$priority} = $row['count']; // Assign the count to the corresponding variable
        $stmt->close();
    } else {
        echo "Statement preparation error for $priority: " . $con->error;
    }
}

$con->close();

// Display counts for each priority
echo "P11 - Count: $P1<br>";
echo "P2 - Count: $P2<br>";
echo "P3 - Count: $P3<br>";
echo "P4 - Count: $P4<br>";
?>
