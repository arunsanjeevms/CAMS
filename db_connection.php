<?php
// Database configuration
$servername = "sql302.infinityfree.com";
$username = "if0_37086688"; // Updated username
$password = "SenSan1308"; // Updated password
$dbname = "if0_37086688_cams";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve and sanitize user inputs
$user = $_POST['Username'];
$pass = $_POST['Password'];

// Example of SQL query (ensure to use prepared statements to prevent SQL injection)
$sql = "SELECT * FROM cams WHERE username = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $user, $pass);
$stmt->execute();
$result = $stmt->get_result();

// Check if login is successful
if ($result->num_rows > 0) {
    // Login successful, redirect to the specified URL
    header("Location: https://camsmkce.in/");
    exit(); // Ensure no further code is executed
} else {
    // Login failed, redirect to the same login page or a different page
    header("Location: login_failed.php"); // Optional: Redirect to a failure page
    exit(); // Ensure no further code is executed
}

// Close connection
$stmt->close();
$conn->close();
?>
