<?php
// db_connect.php file

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Student";

// Enable error reporting for mysqli
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
$conn->query($sql);

// Select the database
$conn->select_db($dbname);

// SQL query to create the users table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Name_ VARCHAR(100) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    Contact_number VARCHAR(20) NOT NULL,
    SchoolName VARCHAR(100) NOT NULL,
    Location_ VARCHAR(100) NOT NULL,
    Classes VARCHAR(255) NOT NULL,
    Students INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Execute the query
$conn->query($sql);

$message = "";

// Handling form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $college = $_POST['college'];
    $city = $_POST['city'];
    $courses = $_POST['courses'];
    $students = $_POST['students'];

    // Validate input
    if (!empty($name) && !empty($email) && !empty($contact_number) && !empty($college) && !empty($city) && !empty($courses) && !empty($students)) {
        try {
            // Prepare and bind
            $stmt = $conn->prepare("INSERT INTO users (Name_, Email, Contact_number, SchoolName, Location_, Classes, Students) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssi", $name, $email, $contact_number, $college, $city, $courses, $students);

            // Execute the statement
            $stmt->execute();
            $message = "<p class='text-success'>Registration successful!</p>";

            // Close statement
            $stmt->close();
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) { // Error code for duplicate entry
                $message = "<p class='text-danger'>Error: This email is already registered.</p>";
            } else {
                $message = "<p class='text-danger'>Error: " . $e->getMessage() . "</p>";
            }
        }
    } else {
        $message = "<p class='text-danger'>Please fill all fields.</p>";
    }
}

// Close connection
$conn->close();
?>