<?php
session_start();
include('include/config.php');

// SQL query to count rows for each state and total count
$query = "
    SELECT
        SUM(CASE WHEN state = 'new' THEN 1 ELSE 0 END) AS count_new,
        SUM(CASE WHEN state = 'in process' THEN 1 ELSE 0 END) AS count_in_process,
        SUM(CASE WHEN state = 'closed' THEN 1 ELSE 0 END) AS count_closed,
        COUNT(*) AS total_count
    FROM tblcomplaints;
";

// Prepare the statement
$stmt = $con->prepare($query);

if ($stmt) {
    // Execute the query
    $stmt->execute();

    $result = $stmt->get_result();

    $row = $result->fetch_assoc();
    $count_new = $row['count_new'];
    $count_in_process = $row['count_in_process'];
    $count_closed = $row['count_closed'];
    $total_count = $row['total_count'];
    
    $stmt->close();
} else {
    echo "Statement preparation error: " . $con->error;
}

$con->close();
?>

<div class="counter-up">
    <div class="content">
        <div class="box">
            <div class="icon"><i class="fas fa-history"></i></div>
            <div class="count-digit"><?php echo $count_new; ?></div>
            <div class="text">New Complaints</div>
        </div>
        <div class="box">
            <div class="icon"><i class="fas fa-gift"></i></div>
            <div class="count-digit"><?php echo $count_in_process; ?></div>
            
