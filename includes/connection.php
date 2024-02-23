<?php
// Database configuration
$db_host = 'localhost'; // Change this to your database host
$db_name = 'campus_marketplace'; // Change this to your database name
$db_user = 'root'; // Change this to your database username
$db_pass = ''; // Change this to your database password

// Create a connection to the database
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set character set to utf8mb4
$conn->set_charset("utf8mb4");

// Close the database connection
function close_db_connection($conn) {
    if ($conn !== null) {
        $conn->close();
    }
}
?>
