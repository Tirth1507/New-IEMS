<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_info"])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit;
}

// Extract the username from the email
$email = $_SESSION["user_info"];
$username = explode('@', $email)[0];

// Remove numbers from the username
$usernameWithoutNumbers = preg_replace('/\d/', '', $username);

// Display the username without numbers
echo "Hello, " . htmlspecialchars($usernameWithoutNumbers);
?>
