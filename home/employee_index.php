<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Security Agency for employee</title>
    <!--Favicons-->
    <link rel="shortcut icon" href="img/favicon.png">

    <!-- Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- CSS Files For Plugin -->
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="../login/login.css">
    <link rel="stylesheet" href="../find/pagination.css">
</head>

<body>
    <!--Log out php-->
    <?
    session_start();
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        unset($_SESSION['ID']);
        header('location: ../login/login.php');
    }

    ?>

    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-white w3-card" id="myNavbar">
            <a href="employee_index.php" class="w3-bar-item w3-button w3-wide">SA</a>


            <!-- Right-sided navbar links -->
            <div class="w3-right w3-hide-small">
                <a href="../register/register.php" class="w3-bar-item w3-button"><i class="fa fa-pencil-square-o"></i> Register</a>
                <a href="../store/store_b.php" class="w3-bar-item w3-button"><i class="fa fa-shopping-basket"></i> Store</a>
                <a href="../find/edit.php" class="w3-bar-item w3-button"><i class="fa fa fa-user-o"></i> Profile</a>
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
        <a href="../register/register.php" class="w3-bar-item w3-button"><i class="fa fa-pencil-square-o"></i> Register</a>
        <a href="../store/store_b.php" class="w3-bar-item w3-button"><i class="fa fa-shopping-basket"></i> Store</a>
        <a href="../find/edit.php" class="w3-bar-item w3-button"><i class="fa fa-user-o"></i> Profile</a>
        <a href="../home/index.php?logout = '1' " class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i> Logout</a>
    </nav>

    <!-- Header -->
    <header class="bgimg-1 w3-display-container w3-black" id="home">
        <div class="w3-display-left w3-text-white" style="padding:48px">
            <span class="w3-jumbo w3-hide-small">Security Agency for employee</span><br>
            <span class="w3-xxlarge w3-hide-large w3-hide-medium">Security Agency for employee</span><br>
            <div class="w3-container ">
                <h3 class="w3-center" style="height: 50px;">Get started with your security today</h3>
                <div class="w3-col w3-center w3-white"><a href="../register/register.php" class="w3-button w3-xlarge w3-round w3-white" style="width:100%"> Reigster </a>
                </div>
            </div>
    </header>


    <!-- Team Section -->
    <div class="w3-container " style="padding:128px 16px" id="team">
        <h3 class="w3-center">THE TEAM</h3>
        <p class="w3-center w3-large">The ones who runs this project</p>
        <div class="w3-row-padding w3-grayscale" style="margin-top:64px">

            <div class="w3-col l4 m6 w3-margin-bottom">
                <div class="w3-card">
                    <div class="w3-container">

                        <h3>Thanaphat Netpiyachat</h3>
                        <p class="w3-opacity">Front End Developer </p>
                        <p>Tel : 0921812246<br>

                            Email : thanaphat.netpiyachat@g.swu.ac.th</p>

                    </div>
                </div>
            </div>

            <div class="w3-col l4 m6 w3-margin-bottom">
                <div class="w3-card">
                    <div class="w3-container">
                        <h3>Sahaphab Makchlerm</h3>
                        <p class="w3-opacity">Back End Devolper</p>
                        <p>Tel : 0836054221<br>

                            Email : sahaphab.makchalerm@g.swu.ac.th</p>

                    </div>
                </div>
            </div>

            <div class="w3-col l4 m6 w3-margin-bottom">
                <div class="w3-card">

                    <div class="w3-container">
                        <h3>Nattapong Janma</h3>
                        <p class="w3-opacity">UX UI</p>
                        <p>Tel : 0988538551<br>

                            Email : nattapong.janma@g.swu.ac.th</p>

                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Footer -->
    <footer class="w3-center w3-black w3-padding-24">
        <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
        <p></p>
        <p>&copy Design by w3schools</a></p>
    </footer>

    <!-----------------------JavaScript------------------------>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JS Plugin -->
    <script src="home.js"></script>
</body>

</html>