<?php
require_once("connection.php");

// Initialize variables and error messages
$firstName = $lastName = $mobileNumber = $email = $gender = $dob = $empId = $course = $religion = $address = $password = $teacherPhoto = "";
$firstNameErr = $lastNameErr = $mobileNumberErr = $emailErr = $genderErr = $dobErr = $empIdErr = $courseErr = $religionErr = $addressErr = $passwordErr = $teacherPhotoErr = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // First Name validation
    if (empty($_POST['first_name'])) {
        $firstNameErr = "First name is required.";
    } else {
        $firstName = $_POST['first_name'];
        if (!preg_match("/^[a-zA-Z\s]*$/", $firstName)) {
            $firstNameErr = "Only letters and spaces allowed.";
        }
    }

    // Last Name validation
    if (empty($_POST['last_name'])) {
        $lastNameErr = "Last name is required.";
    } else {
        $lastName = $_POST['last_name'];
        if (!preg_match("/^[a-zA-Z\s]*$/", $lastName)) {
            $lastNameErr = "Only letters and spaces allowed.";
        }
    }

    // Mobile Number validation
    if (empty($_POST['mobile_number'])) {
        $mobileNumberErr = "Mobile number is required.";
    } else {
        $mobileNumber = $_POST['mobile_number'];
        if (!preg_match("/^[0-9]{10}$/", $mobileNumber)) {
            $mobileNumberErr = "Mobile number must be 10 digits.";
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

    // Gender validation
    if (empty($_POST['gender'])) {
        $genderErr = "Gender is required.";
    } else {
        $gender = $_POST['gender'];
    }

    // Date of Birth validation
    if (empty($_POST['dob'])) {
        $dobErr = "Date of Birth is required.";
    } else {
        $dob = $_POST['dob'];
    }

    // Employee ID validation
    if (empty($_POST['emp_id'])) {
        $empIdErr = "Employee ID is required.";
    } else {
        $empId = $_POST['emp_id'];
        if (!preg_match("/^[0-9a-zA-Z]*$/", $empId)) {
            $empIdErr = "Employee ID must be alphanumeric.";
        }
    }

    // Course validation
    if (empty($_POST['course'])) {
        $courseErr = "Course selection is required.";
    } else {
        $course = $_POST['course'];
    }

    // Religion validation
    if (empty($_POST['religion'])) {
        $religionErr = "Religion is required.";
    } else {
        $religion = $_POST['religion'];
        if (!preg_match("/^[a-zA-Z\s]*$/", $religion)) {
            $religionErr = "Only letters and spaces allowed.";
        }
    }

    // Address validation
    if (empty($_POST['address'])) {
        $addressErr = "Address is required.";
    } else {
        $address = $_POST['address'];
        if (strlen($address) < 10) {
            $addressErr = "Address must be at least 10 characters long.";
        }
    }

    // Upload Photo validation
    if (empty($_FILES['teacher_photo']['name'])) {
        $teacherPhotoErr = "Photo upload is required.";
    } else {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $fileType = $_FILES['teacher_photo']['type'];

        if (!in_array($fileType, $allowedTypes)) {
            $teacherPhotoErr = "Only JPG, PNG, and GIF files are allowed.";
        } else {
            $teacherPhoto = $_FILES['teacher_photo']['name'];
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($teacherPhoto);

            if (!move_uploaded_file($_FILES['teacher_photo']['tmp_name'], $targetFile)) {
                $teacherPhotoErr = "There was an error uploading the file.";
            }
        }
    }

    // Password validation
    if (empty($_POST['password'])) {
        $passwordErr = "Password is required.";
    } else {
        $password = $_POST['password'];
        if (strlen($password) < 6) {
            $passwordErr = "Password must be at least 6 characters long.";
        }
    }

    // Insert into database if no errors
    if (empty($firstNameErr) && empty($lastNameErr) && empty($mobileNumberErr) && empty($emailErr) && 
        empty($genderErr) && empty($dobErr) && empty($empIdErr) && empty($courseErr) &&
        empty($religionErr) && empty($addressErr) && empty($passwordErr) && empty($teacherPhotoErr)) {

        $query = "INSERT INTO teacher (first_name, last_name, mobile_number, email, gender, dob, emp_id, course, religion, address, password, photo) 
                  VALUES ('$firstName', '$lastName', '$mobileNumber', '$email', '$gender', '$dob', '$empId', '$course', '$religion', '$address', '$password', '$teacherPhoto')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "Teacher added successfully!";
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
    <title>Add Teacher Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #ffffff;
            padding: 20px 30px;
            border-radius: 10px;
            border: 2px solid #ccc;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            margin: auto;
            transition: box-shadow 0.3s ease, border-color 0.3s ease;
        }

        .form-container:hover {
            border-color: #1f2b5b;
            box-shadow: 0 0 20px rgba(31, 43, 91, 0.5);
        }

        .form-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.5);
            outline: none;
        }

        .form-group input[type="file"] {
            padding: 5px;
        }

        .form-group textarea {
            resize: vertical;
        }

        .form-group button {
            background-color: #4B006E;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #ff8700;
        }

        .form-group .half-width {
            flex: 0 0 48%;
            margin-right: 4%;
            box-sizing: border-box;
        }

        .form-group .half-width:last-child {
            margin-right: 0;
        }

        .form-group .quarter-width {
            flex: 0 0 23%;
            margin-right: 2%;
            box-sizing: border-box;
        }

        .form-group .quarter-width:last-child {
            margin-right: 0;
        }

        .form-group .full-width {
            flex: 0 0 100%;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        .error {
            border-color: red;
        }

        @media screen and (max-width: 768px) {
            .form-group .half-width,
            .form-group .quarter-width {
                flex: 0 0 100%;
                margin-right: 0;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add Teacher Form</h2>
        <form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

            <div class="form-group">
                <div class="half-width">
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($firstName); ?>" class="<?php echo (!empty($firstNameErr)) ? 'error' : ''; ?>">
                    <span class="error-message"><?php echo $firstNameErr; ?></span>
                </div>
                <div class="half-width">
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($lastName); ?>" class="<?php echo (!empty($lastNameErr)) ? 'error' : ''; ?>">
                    <span class="error-message"><?php echo $lastNameErr; ?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="half-width">
                    <label for="mobile_number">Mobile Number:</label>
                    <input type="text" id="mobile_number" name="mobile_number" value="<?php echo htmlspecialchars($mobileNumber); ?>" class="<?php echo (!empty($mobileNumberErr)) ? 'error' : ''; ?>">
                    <span class="error-message"><?php echo $mobileNumberErr; ?></span>
                </div>
                <div class="half-width">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" class="<?php echo (!empty($emailErr)) ? 'error' : ''; ?>">
                    <span class="error-message"><?php echo $emailErr; ?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="quarter-width">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" class="<?php echo (!empty($genderErr)) ? 'error' : ''; ?>">
                        <option value="">Select</option>
                        <option value="Male" <?php echo ($gender == 'Male') ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?php echo ($gender == 'Female') ? 'selected' : ''; ?>>Female</option>
                    </select>
                    <span class="error-message"><?php echo $genderErr; ?></span>
                </div>
                <div class="quarter-width">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" value="<?php echo htmlspecialchars($dob); ?>" class="<?php echo (!empty($dobErr)) ? 'error' : ''; ?>">
                    <span class="error-message"><?php echo $dobErr; ?></span>
                </div>
                <div class="quarter-width">
                    <label for="emp_id">Employee ID:</label>
                    <input type="text" id="emp_id" name="emp_id" value="<?php echo htmlspecialchars($empId); ?>" class="<?php echo (!empty($empIdErr)) ? 'error' : ''; ?>">
                    <span class="error-message"><?php echo $empIdErr; ?></span>
                </div>
                <div class="quarter-width">
                    <label for="course">Course:</label>
                    <select id="course" name="course" class="<?php echo (!empty($courseErr)) ? 'error' : ''; ?>">
                        <option value="">Select</option>
                        <option value="MSc CS" <?php echo ($course == 'MSc CS') ? 'selected' : ''; ?>>MSc CS</option>
                        <option value="AIML" <?php echo ($course == 'AIML') ? 'selected' : ''; ?>>AIML</option>
                        <option value="PGDCA" <?php echo ($course == 'PGDCA') ? 'selected' : ''; ?>>PGDCA</option>
                        <option value="MCA" <?php echo ($course == 'MCA') ? 'selected' : ''; ?>>MCA</option>
                    </select>
                    <span class="error-message"><?php echo $courseErr; ?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="half-width">
                    <label for="religion">Religion:</label>
                    <input type="text" id="religion" name="religion" value="<?php echo htmlspecialchars($religion); ?>" class="<?php echo (!empty($religionErr)) ? 'error' : ''; ?>">
                    <span class="error-message"><?php echo $religionErr; ?></span>
                </div>
                <div class="half-width">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address" rows="4" class="<?php echo (!empty($addressErr)) ? 'error' : ''; ?>"><?php echo htmlspecialchars($address); ?></textarea>
                    <span class="error-message"><?php echo $addressErr; ?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="half-width">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="<?php echo (!empty($passwordErr)) ? 'error' : ''; ?>">
                    <span class="error-message"><?php echo $passwordErr; ?></span>
                </div>
                <div class="half-width">
                    <label for="teacher_photo">Upload Teacher Photo:</label>
                    <input type="file" id="teacher_photo" name="teacher_photo" accept="image/*" class="<?php echo (!empty($teacherPhotoErr)) ? 'error' : ''; ?>">
                    <span class="error-message"><?php echo $teacherPhotoErr; ?></span>
                </div>
            </div>

            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
