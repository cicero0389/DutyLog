<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "DutyLog"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully to the DutyLog database.";
}

// You can now use $conn to interact with the database, such as performing queries or inserts

// Example: Closing the connection (if you're done with the database)
$conn->close();
?>
