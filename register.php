<!-- register.php -->
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "quizzyy";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Insert data into database
    $sql = "INSERT INTO user_detail (first_name,last_name,phone_number, email, password) VALUES (' $first_name','$last_name','$phone_number', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        // echo "New record created successfully";
        header("Location: student_login.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


mysqli_close($conn);
?>
