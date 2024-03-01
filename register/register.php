<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('../login/server.php');
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['ID']);
    header('location: ../login/login.php');
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register</title>
    <!--Favicons-->
    <link rel="shortcut icon" href="img/favicon.png">

    <!-- Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- CSS Files For Plugin -->
    <link rel="stylesheet" href="../home/home.css">
    <link rel="stylesheet" href="../login/login_.css">
</head>

<body>
    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-white w3-card" id="myNavbar">
            <a href="../home/employee_index.php" class="w3-bar-item w3-button w3-wide">SA</a>

            <!-- Right-sided navbar links -->
            <div class="w3-right w3-hide-small">
                <!-- logout -->
                <a href="../home/index.php?logout = '1' " class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i> Logout</a>
            </div>

            <!-- Hide right-floated links on small screens and replace them with a menu icon -->
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>

    <!-- Sidebar on small screens when clicking the menu icon -->
    <nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close <i class="fa fa-times"></i></a>
        <a href="../home/index.php?logout = '1' " class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i> Logout</a>
    </nav>

    <!-- Header -->
    <header class="w3-container w3-black">
        <div class="w3-text-white w3-center" style="padding:48px">
            <br><span class="w3-jumbo w3-hide-small">Security Agency</span><br>
            <span class="w3-xxlarge w3-hide-large w3-hide-medium">Security Agency</span><br>
            <span class="w3-large">Get matched to jobs from Security Agency, the most comfortable recruitment agency.</span><br>
        </div>
    </header>

    <!--Form register-->
    <div class="w3-container w3-light-gray">
        <form action="register_db.php" method="POST">
            <div class="container">
                <h1>Register form</h1>
                <hr>

                <label for="reg_name"><b>Name</b></label>
                <input type="text" placeholder="Enter Name" name="reg_name" id="reg_name" required>

                <label for="reg_lastname"><b>Last Name</b></label>
                <input type="text" placeholder="Enter Last Name" name="reg_lastname" id="reg_lastname" required>

                <label for="reg_email"><b>Email</b></label>
                <input type="text" placeholder="Enter email" name="email" id="email" required>

                <label for="phone"><b>Phone Number</b></label>
                <input type="text" placeholder="Enter your phone number" name="phone" id="phone" required><br>

                <label for="age"><b>Age (Number)</b></label><br>
                <input type="text" placeholder="Enter your age number" name="age" id="age" required><br>

                <label for="wage"><b>Wage (Number : XXXX)</b></label><br>
                <input type="text" placeholder="Enter your wage" name="wage" id="wage" required>

                <label for="experience"><b>Experience</b></label><br>
                <input type="text" placeholder="Enter your experience" name="experience" id="experience" required>

                <label for="educational"><b>Educational</b></label><br>
                <input type="text" placeholder="Enter your educational" name="educational" id="eduactional" required>

                <label for="image"><b>Upload Image</b></label><br>
                <form enctype="multipart/form-data" method="POST" action="form-action.php">
                    <input type="file" accept="image/x-png;image/gif;image/jpeg" name="image" required>
                </form>
                <hr>

                <button type="submit" class="registerbtn w3-black" name="register">Register</button>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <footer class="w3-container w3-center w3-black w3-padding-24">
        <p></p>
        <p>&copy Design by w3schools</a></p>
    </footer>

    <!-----------------------JavaScript------------------------>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JS Plugin -->
    <script src="../home/home.js"></script>
</body>

</html>