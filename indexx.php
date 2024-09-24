<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internal Assignment Management System</title>

    <!-- Bootstrap CSS (not JS) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="style.css">

    <!-- Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
</head>
<body>

    <!-- header section start -->
    <header class="header fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="#home" class="logo">
                <img src="image/logo11.png" alt="Logo" class="logo-image">
            </a>
            <nav class="nav">
                <a href="#home" class="nav-link">Home</a>
                <a href="#logins" class="nav-link">Logins</a>
                <a href="#about" class="nav-link">About Us</a>
                <a href="#notice" class="nav-link">Notice</a>
                <a href="#footer" class="nav-link">Contact Us</a>
            </nav>
            <a href="student/register.php" class="link-btn">Register</a>
            <div id="menu-btn" class="fas fa-bars"></div>
        </div>
    </header>
    <!-- header section end -->

    <!-- home section start -->
    <section class="home" id="home">
        <div class="container">
            <div class="row min-vh-100 align-items-center justify-content-center">
                <div class="content text-center">
                    <h2>Internal</h2>
                    <h3>Evaluation</h3>
                    <h2>Management System</h2>
                    <p>Successful Career Starts With Good Training.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- home section end -->

    <!-- login section start -->
    <section class="login" id="logins">
        <h1>Logins</h1>
        <div class="container">
            <!-- Teacher login -->
            <div class="login-module teacher">
                <img src="image/teacher.avif" alt="Teacher Image">
                <div class="login-box">
                    <h2>Teacher Login</h2>
                    <a href="teacher/login.php"><button>Login</button></a>
                </div>
            </div>

            <!-- Student login -->
            <div class="login-module student">
                <img src="image/s1.avif" alt="Student Image">
                <div class="login-box">
                    <h2>Student Login</h2>
                    <a href="student/login.php"><button>Login</button></a>
                </div>
            </div>

            <!-- Admin login -->
            <div class="login-module admin">
                <img src="image/admin.avif" alt="Admin Image">
                <div class="login-box">
                    <h2>Admin Login</h2>
                    <a href="admin/login.php"><button>Login</button></a>
                </div>
            </div>
        </div>
    </section>
    <!-- login section end -->

    <!-- about section start -->
    <section class="about" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 image">
                    <img src="image/f2.webp" class="w-100 mb-5 mb-md-0" alt="">
                </div>
                <div class="col-md-6 content">
                    <span>about us</span>
                    <h2>Empowering Your Academic Journey with Seamless Assignment Management.</h2>
                    <p>
                        The Internal Evaluation Management System – a dedicated platform designed to streamline and enhance the management of assignments within our department. Our goal is to provide an efficient, user-friendly interface that simplifies the process of assignment submission, tracking, and evaluation.
                        At the core of our system is a commitment to improving academic success by ensuring that both students and educators have the tools they need to manage assignments effectively. With features that support clear communication, timely feedback, and organized record-keeping, we aim to make the assignment process as smooth as possible.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- about section end -->

    <!-- notice section start -->
    <section class="notice" id="notice">
        <div class="container">
            <div class="notice-box text-center">
                <h1>Notice by College</h1>
                <p>
                    This is an important notice for all students and staff. Please ensure you check regularly for updates regarding assignments, deadlines, and other important information. Your attention to these notices is crucial for maintaining smooth operations within the department.
                </p>
            </div>
        </div>
    </section>
    <!-- notice section end -->

    <!-- footer section start -->
    <section class="footer" id="footer">
        <div class="box-container container">
            <div class="box">
                <i class="fas fa-phone"></i>
                <h3>phone number</h3>
                <p>9924849484</p>
            </div>

            <div class="box">
                <i class="fas fa-map-marker-alt"></i>
                <h3>Our address</h3>
                <p>Ahmedabad, India</p>
            </div>

            <div class="box">
                <i class="fas fa-envelope"></i>
                <h3>email address</h3>
                <p>iems@gmail.com</p>
            </div>
        </div>
    </section>
    <!-- footer section end -->

    <script src="script.js"></script>
</body>
</html>
