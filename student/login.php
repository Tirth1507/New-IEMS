<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    border: 2px solid #ccc;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 400px;
    text-align: center;
    transition: box-shadow 0.3s ease, border-color 0.3s ease; 
}

.container:hover {
    border-color: #1f2b5b; 
    box-shadow: 0 0 20px #1f2b5b;
}

h2 {
    margin-bottom: 20px;
}

.error {
    color: red;
    font-size: 0.9em;
}

.form-group {
    margin-bottom: 15px;
    text-align: left;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-group input {
    width: calc(100% - 10px);
    padding: 8px;
    font-size: 1em;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
}

.form-group input:focus {
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

.logo {
    max-width: 100px; 
    margin-bottom: 20px;
}

.register-link {
    color: #4B006E; 
    text-decoration: none; 
    font-weight: bold;
}

.register-link:hover {
    color: #ff8700;
}

.custom-link {
    color: #4B006E; 
    text-decoration: none; 
    font-weight: bold;
}

.custom-link:hover {
    color: #ff8700;
}

/* Media Query for Mobile Devices */
@media (max-width: 480px) {
    .container {
        width: 90%;
        padding: 15px;
    }

    .form-group label, .form-group input {
        font-size: 0.9em;
    }

    .submit-btn {
        font-size: 0.9em;
        padding: 8px;
    }

    .logo {
        max-width: 80px;
    }
}

/* Media Query for Tablets */
@media (min-width: 481px) and (max-width: 768px) {
    .container {
        width: 80%;
        padding: 20px;
    }

    .form-group label, .form-group input {
        font-size: 1em;
    }

    .submit-btn {
        font-size: 1em;
        padding: 10px;
    }

    .logo {
        max-width: 90px;
    }
}

/* Media Query for PCs (default styles) */
@media (min-width: 769px) {
    .container {
        width: 400px;
        padding: 20px;
    }

    .form-group label, .form-group input {
        font-size: 1em;
    }

    .submit-btn {
        font-size: 1em;
        padding: 10px;
    }

    .logo {
        max-width: 100px;
    }
}
</style>
</head>
<body>
<img src="../image/logoo1.png" alt="IEMS Logo" class="logo">
<div class="container">
    <!-- <img src="../image/logo11.png" alt="IEMS Logo" class="logo"> -->

    <h2>Login</h2>
    <form method="post" action="login_process.php">
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>

        <input type="submit" name="submit" value="Login" class="submit-btn">
    </form>
    <div style="text-align: center; margin-top: 10px;">
    <p>Don't have an account? <a href="register.php" class="register-link">Register</a></p>
   </div>

   <div style="text-align: left; margin-bottom: 10px;">
            <a href="../indexx.php" class="custom-link" style="font-size: 1em; font-weight: bold;">Back</a>
        </div>

</div>

</body>
</html>
