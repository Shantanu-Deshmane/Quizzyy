<?php
session_start();

// Check if the user is logged in
if(isset($_SESSION['user_id'])) {
    // Retrieve user ID and score from session
    $userId = $_SESSION['user_id'];
    $score = $_POST['score']; // Assuming you're sending the score via POST request

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "quizzyy";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert user ID and score into database
    $sql = "INSERT INTO quiz_scores (user_id, score) VALUES ('$userId', '$score')";

    if ($conn->query($sql) === TRUE) {
        echo "Score stored successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
} else {
    echo "User is not logged in";
}
?>
