<?php
require_once("connection.php");

$name = $email = $password = $phone = $gender = $course = $roll = $date = "";
$nameErr = $emailErr = $passErr = $phoneErr = $courseErr = $rollErr = $genderErr = $dateErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Name validation
    if (empty($_POST['name'])) {
        $nameErr = "Name is required.";
    } else {
        $name = $_POST['name'];
        if (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
            $nameErr = "Only letters and spaces allowed.";
        }
    }

    // Email validation
    if (empty($_POST['email'])) {
        $emailErr = "Email is required.";
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Enter a valid email.";
        }
    }

    // Password validation
    if (empty($_POST['password'])) {
        $passErr = "Password is required.";
    } else {
        $password = $_POST['password'];
        if (strlen($password) < 6 || !preg_match("/^[0-9]*$/", $password)) {
            $passErr = "Password must be a number and at least 6 digits long.";
        }
    }

    // Phone validation
    if (empty($_POST['phone'])) {
        $phoneErr = "Phone number is required.";
    } else {
        $phone = $_POST['phone'];
        if (strlen($phone) != 10 || !preg_match("/^[0-9]*$/", $phone)) {
            $phoneErr = "Phone number must be 10 digits.";
        }
    }

    // Roll Number validation
    if (empty($_POST['roll'])) {
        $rollErr = "Roll number is required.";
    } else {
        $roll = $_POST['roll'];
        if (!preg_match("/^[0-9]*$/", $roll)) {
            $rollErr = "Roll number must be numeric.";
        }
    }

    // Course validation
    if (empty($_POST['course'])) {
        $courseErr = "Course selection is required.";
    } else {
        $course = $_POST['course'];
    }

    // Date of Birth validation
    if (empty($_POST['date'])) {
        $dateErr = "Date of Birth is required.";
    } else {
        $date = $_POST['date'];
    }

    // Gender validation
    if (empty($_POST['gender'])) {
        $genderErr = "Gender is required.";
    } else {
        $gender = $_POST['gender'];
    }

    // Insert into database if no errors
    if (empty($nameErr) && empty($emailErr) && empty($passErr) && empty($phoneErr) && empty($rollErr) && empty($courseErr) && empty($genderErr) && empty($dateErr)) {
        $query = "INSERT INTO registration (name, email, password, date, gender, phone, roll, course) 
                  VALUES ('$name', '$email', '$password', '$date', '$gender', '$phone', '$roll', '$course')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "Registration successful!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
 body {
    font-family: Arial, sans-serif;
    background-color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    border: 1px solid #ccc; /* Add a border */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 500px;
    transition: box-shadow 0.3s ease, border-color 0.3s ease; /* Add transition effect */
}

.container:hover {
    border-color: #1f2b5b; /* Change border color on hover */
    box-shadow: 0 0 20px rgba(31, 43, 91, 0.7); /* Increased glowing effect */
}

h2 {
    text-align: center;
    margin-bottom: 15px;
    /* font-size: 3rem; */
}

.error {
    color: red;
    font-size: 0.9em;
}

.form-group {
    margin-bottom: 6px;
    margin-top: 3px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-group input, 
.form-group select {
    width: calc(100% - 10px);
    padding: 8px;
    font-size: 1em;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
}

.form-group input[type="radio"] {
    width: auto;
    margin-right: 10px;
}

.form-group input:focus,
.form-group select:focus {
    border-color: #007bff;
}

.submit-btn {
    width: 100%;
    background-color: #4B006E;
    color: #fff;
    border: none;
    padding: 10px;
    font-size: 1em;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.submit-btn:hover {
    background-color: #ff8700;
}

.custom-link {
    color: #4B006E; 
    text-decoration: none; 
    font-weight: bold;
}

.custom-link:hover {
    color: #ff8700;
}


    </style>
</head>
<body>

<div class="container">
    <h2>Register</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="<?php echo $name; ?>">
            <span class="error"><?php echo $nameErr; ?></span>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
            <span class="error"><?php echo $emailErr; ?></span>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" name="password" value="<?php echo $password; ?>">
            <span class="error"><?php echo $passErr; ?></span>
        </div>

        <div class="form-group">
            <label for="date">Date of Birth</label>
            <input type="date" name="date" value="<?php echo $date; ?>">
            <span class="error"><?php echo $dateErr; ?></span>
        </div>

        <div class="form-group">
            <label>Gender</label>
            <input type="radio" name="gender" value="Male" <?php if (isset($gender) && $gender=="Male") echo "checked";?>> Male
            <input type="radio" name="gender" value="Female" <?php if (isset($gender) && $gender=="Female") echo "checked";?>> Female
            <span class="error"><?php echo $genderErr; ?></span>
        </div>

        <div class="form-group">
            <label for="course">Course</label>
            <select name="course">
                <option value="">Select a course</option>
                <option value="MSc CS" <?php if (isset($course) && $course=="MSc CS") echo "selected";?>>Msc CS</option>
                <option value="MCA" <?php if (isset($course) && $course=="MCA") echo "selected";?>>MCA</option>
                <option value="PGDCA" <?php if (isset($course) && $course=="PGDCA") echo "selected";?>>PGDCA</option>
                <option value="AIML" <?php if (isset($course) && $course=="AIML") echo "selected";?>>AIML</option>
            </select>
            <span class="error"><?php echo $courseErr; ?></span>
        </div>


        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" value="<?php echo $phone; ?>">
            <span class="error"><?php echo $phoneErr; ?></span>
        </div>

        <div class="form-group">
            <label for="roll">Roll Number</label>
            <input type="text" name="roll" value="<?php echo $roll; ?>">
            <span class="error"><?php echo $rollErr; ?></span>
        </div>

        
        <input type="submit" name="submit" value="Register" class="submit-btn">
    </form>

    <div style="text-align: center; margin-top: 10px;">
    <p>Already signed in? <a href="login.php" class="custom-link">Login</a></p>
   </div>

   <div style="text-align: left; margin-bottom: 10px;">
        <a href="../indexx.php" class="custom-link" style="font-size: 1em; font-weight: bold;">Back</a>
    </div>


</div>

</body>
</html>