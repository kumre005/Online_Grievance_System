<?php
 session_start();
include('../include/config.php');

// Calculate the timestamp for 2 days ago
$twoDaysAgo = date("Y-m-d H:i:s", strtotime("-2 days"));

// Query to fetch rows older than 2 days with specific conditions
$query = "
    SELECT *
    FROM tblcomplaints
    WHERE
        RegDate < '$twoDaysAgo' AND
        state != 'closed' AND
        priority = 'P1'
";

$result = $con->query($query);

if ($result->num_rows > 0) {
    // Loop through the result set and do something with the rows
    while ($row = $result->fetch_assoc()) {
        // Process each row
        echo "Complaint ID: " . $row["complaintNumber"] . "<br>";
        // ... display other fields or perform operations as needed
    }
} else {
    echo "No results found.";
}

// Close the database connection
$con->close();
?>
