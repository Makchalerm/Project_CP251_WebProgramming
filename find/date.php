<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Select Date</title>
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
    <link rel="stylesheet" href="pagination.css">

</head>

<body>
    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-white w3-card" id="myNavbar">
            <a href="../home/employer_index.php" class="w3-bar-item w3-button w3-wide">SA</a>

            <!-- Right-sided navbar links -->
            <div class="w3-right w3-hide-small">
                <a href="../store/store.php" class="w3-bar-item w3-button"><i class="fa fa-shopping-basket"></i> Store</a>
                <a href="find_a_person.php" class="w3-bar-item w3-button"><i class="fa fa-search"></i> Find a person</a>
                <!--<a href="register.php" class="w3-bar-item w3-button"><i class="fa fa-pencil-square-o"></i> Register</a>-->
                <!-- logout -->
                <a href=" ../home/index.php?logout = '1' " class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i> Logout</a>
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
        <a href="../store/store.php" class="w3-bar-item w3-button"><i class="fa fa-shopping-basket"></i> Store</a>
        <a href="find_a_person.php" class="w3-bar-item w3-button"><i class="fa fa-search"></i> Find a person</a>
        <!--<a href="register.php" class="w3-bar-item w3-button"><i class="fa fa-pencil-square-o"></i> Register</a>-->
        <a href="../home/index.php?logout = '1' " class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i> Logout</a>
    </nav>

    <!-- Header -->
    <header class="w3-container w3-black">
        <div class="w3-text-white w3-center" style="padding:48px">
            <span class="w3-jumbo w3-hide-small">Select date a person for job</span><br>
            <span class="w3-xxlarge w3-hide-large w3-hide-medium">Select date a person for job</span><br>
            <span class="w3-large">Detail people to find for you.</span><br>
        </div>
    </header>

    <?php
    session_start();
    include('../login/server.php');
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        unset($_SESSION['ID']);
        header('location: ../login/login.php');
    }

    $regID = $_GET['regID'];

    $insert_id = "INSERT INTO store_detail (regID) VALUES ('$regID')";
    mysqli_query($conn, $insert_id);
    $errors = array();

    if (isset($_POST['select'])) {
        $start_date = date('Y-m-d', strtotime($_POST['startDate']));
        $end_date = date('Y-m-d', strtotime($_POST['endDate']));

        $ID1 = $_SESSION['ID'];

        if (count($errors) == 0) {
            $sql = "UPDATE store_detail SET startDate = '$start_date' , endDate = '$end_date', ID = '$ID1' WHERE startDate is null";
            mysqli_query($conn, $sql);

            echo "<script>
                alert('Select Date success!');
                window.location = '../store/store.php';
                </script>";
        } else {
            echo "<script>
                alert('Select Date Unsuccess!');
                window.location = 'date.php';
                </script>";
            exit();
        }
    }
    ?>

    <div class="cotainer w3-black">
        <form action="date.php" method="POST" class="w3-container">

            <label for="startDate" class="w3-large">Start Date</label>
            <input type="date" name="startDate" class="w3-input w3-border w3-light-grey" required><br>

            <label for="endDate" class="w3-large">End Date</label>
            <input type="date" name="endDate" class="w3-input w3-border w3-light-grey" required><br>

            <button type="submit" name="select" class="w3-button w3-black">Select</button>
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
    <script src="js/home.js"></script>

</body>

</html>