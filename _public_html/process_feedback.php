<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("users/includes/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["rate"]) && isset($_POST["feedback"])) {
        $rating = $_POST["rate"];
        $description = $_POST["feedback"];
        
        // Assuming you have a database connection, insert data into the "feedback" table
        $insertQuery = "INSERT INTO feedback (rating, description) VALUES ('$rating', '$description')";
        $insertResult = mysqli_query($con, $insertQuery);

        if ($insertResult) {
            // Feedback data inserted successfully
            echo "Feedback submitted successfully!";
        } else {
            // Error inserting feedback data
            echo "Error submitting feedback. Please try again later.";
        }
    } else {
        // Required data not provided
        echo "Please provide both a rating and feedback description.";
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}
?>
