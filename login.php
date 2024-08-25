<?php
session_start(); // Start session if not already started

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are correct
    $admin_username = "Admin"; // Change this to the actual admin username
    $admin_password = "password"; // Change this to the actual admin password

    // Get username and password from the form
    $input_username = $_POST["username"];
    $input_password = $_POST["password"];

    // Compare input username and password with the correct admin credentials
    if ($input_username === $admin_username && $input_password === $admin_password) {
        // Admin login successful, redirect to admin dashboard
        $_SESSION["admin_username"] = $admin_username; // Store admin username in session
        header("Location: Admin/index.html");
        exit();
    } else {
        // Admin login failed, redirect back to login page with error message
        $_SESSION["error_message"] = "Incorrect username or password.";
        header("Location: Admin login.html");
        exit();
    }
}
?>
