<?php
include_once "templates/header.php";
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Student";

// Enable error reporting for mysqli
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select all data from the users table
$query = "SELECT * FROM users";
$result = $conn->query($query);

// Display the data in an HTML table
if ($result->num_rows > 0) {
    echo "<table class='table table-hover' border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Contact_number</th><th>SchoolName</th><th>Location_</th><th>Classes</th><th>Students</th><th>Created At</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['Name_']}</td>
                <td>{$row['Email']}</td>
                <td>{$row['Contact_number']}</td>
                <td>{$row['SchoolName']}</td>
                <td>{$row['Location_']}</td>
                <td>{$row['Classes']}</td>
                <td>{$row['Students']}</td>
                <td>{$row['created_at']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No data found.</p>";
}

// Close the database connection
$conn->close();
?>
