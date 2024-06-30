<?php
// Database connection
$host = 'localhost';
$dbname = 'quizzyy';
$user = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch the user ID and score from the request
    $userId = $_POST['id'];
    $score = $_POST['score'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO quiz_scores (id, score, date) VALUES (:id, :score, NOW())");
    $stmt->bindParam(':id', $userId);
    $stmt->bindParam(':score', $score);

    // Execute the SQL statement
    $stmt->execute();

    // Return a success message
    echo 'Score submitted successfully.';
} catch (PDOException $e) {
    // Return an error message
    echo 'Error: ' . $e->getMessage();
}
?>