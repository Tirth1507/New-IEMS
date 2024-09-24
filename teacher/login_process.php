<?php
session_start();
include_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $email = $_POST["email"];
        $pass = $_POST["password"];

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid Email Format!");
        }

        // Validate password length
        if (strlen($pass) < 6) {
            throw new Exception("Password Must Be 6 Digits Only!");
        }

        // SQL query to fetch user record based on email
        $query = "SELECT * FROM teacher WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $record = mysqli_fetch_assoc($result);

            // Check if the password matches
            if ($pass === $record["password"]) {
                // Store email in session
                $_SESSION["user_info"] = $email;
                header("Location: show.php");
                exit;
            } else {
                throw new Exception("Invalid Password!");
            }
        } else {
            throw new Exception("User Not Found!");
        }
    } catch (Exception $e) {
        echo "<p class='error'>" . $e->getMessage() . "</p>";
    }
}
?>
