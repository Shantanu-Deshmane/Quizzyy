<!DOCTYPE html>
<html>
<head>
    <title>Quiz Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    <script>
        function clearTable() {
            var table = document.querySelector('table');
            table.innerHTML = ''; // Clear table content
        }
    </script>
</head>
<body>

<form method="post" action="report.php">
    <label for="from_date">From Date:</label>
    <input type="date" id="from_date" name="from_date" value="<?php echo $from_date; ?>">
    <label for="to_date">To Date:</label>
    <input type="date" id="to_date" name="to_date" value="<?php echo $to_date; ?>">
    <input type="submit" value="Generate Report">
</form>

<?php
// Database connection
$host = 'localhost';
$dbname = 'quizzyy';
$user = 'root';
$password = '';

// Connect to the database
$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Get the date range from the form
if (isset($_POST['from_date']) && isset($_POST['to_date'])) {
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
} else {
    $from_date = date('Y-m-d', strtotime('-7 days'));
    $to_date = date('Y-m-d');
}
// Prepare the SQL statement to fetch all quiz scores
$stmt = $conn->prepare("SELECT u.email, s.id, s.score, s.date FROM user_detail u JOIN quiz_scores s ON u.id = s.id");

// No need to bind parameters as we are not using date range anymore

// Execute the SQL statement
$stmt->execute();
// Display the quiz report in a table

echo "<table><tr><th>Email</th><th>ID</th><th>Score</th><th>Date</th></tr>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['score'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "</tr>";
}
echo "</table>";

// Close the database connection
$conn = null;
?>
<button onclick="window.print(); clearTable();">Print</button>
</body>
</html>
