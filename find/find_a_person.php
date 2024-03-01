<!DOCTYPE html>
<html lang="en">

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
        <a href="../store/store.php" class="w3-bar-item w3-button"><i class="fa fa-shopping-basket"></i> Store</a>
        <a href="find_a_person.php" class="w3-bar-item w3-button"><i class="fa fa-search"></i> Find a person</a>
        <a href="../home/index.php?logout = '1' " class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i> Logout</a>
    </nav>

    <!-- Header -->
    <header class="w3-container w3-black">
        <div class="w3-text-white w3-center" style="padding:48px">
            <br><span class="w3-jumbo w3-hide-small">Find a person</span><br>
            <span class="w3-xxlarge w3-hide-large w3-hide-medium">Find a person</span><br>
            <span class="w3-large">Browsing people to find the right one for you.</span><br>
        </div>
    </header>

    <!--Search code PHP-->
    <?php
    include '../login/server.php';
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        unset($_SESSION['ID']);
        header('location: ../login/login.php');
    }
    $search = $_GET['search'] ?? null;
    $sql = "SELECT * FROM register WHERE wage LIKE '%" . $search . "%' ";
    $query = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($query);

    ?>

    <!--Form Search-->
    <div class="w3-container w3-light-gray">
        <div class="container">
            <form id="searchfrom">
                <label for="found" class="w3-center w3-large w3-left w3-cell-middle"><?php echo $num ?> People found</label>
                <input class="w3-input w3-border-0 w3-right-align w3-right" type="text" placeholder="Search for wage.." style="width: 40%; height:20px" name="search" id="search">
                <button class="w3-button w3-black w3-round-large" type="submit" id="submit">Search</button>
            </form>
            <br>
            <hr>
            <!--Number Result-->
            <div class="container w3-center">
                <?php
                if (!empty($search)) {
                    echo "Search Wage: $search";
                } else {
                    echo "No input to search";
                }
                ?>
            </div>
        </div>

        <?php
        $search = $_GET['search'] ?? null;
        $perpageview = 5;
        if (isset($_GET['pageno'])) {
            $page = $_GET['pageno'];
        } else {
            $page = 1;
        }

        $frompage = $page * $perpageview - $perpageview;
        $sql = "SELECT * FROM register WHERE wage LIKE '%" . $search . "%' LIMIT {$frompage}, {$perpageview}";
        $query = mysqli_query($conn, $sql);
        ?>

        <!--Search Result-->
        <?php
        while ($result = mysqli_fetch_array($query)) { ?>
            <div class="container">
                <div class="w3-card-4 w3-round-large" id="list-data">
                    <header class="w3-container w3-light-grey w3-round-large">
                        <br>
                        <p><?php echo "<img src='../img/" . $result["image"] . " ' width='150px' height='150px'>" ?></p>
                        <h3><?php echo $result['reg_name']; ?> <?php echo $result['reg_lastname']; ?> <?php echo $result['age'];
                                                                                                        echo " years old"; ?></h3>
                    </header>
                    <div class="w3-container">
                        <p>Wage: <?php echo number_format($result['wage']);
                                    echo (" ฿"); ?></p>
                        <p>Email: <?php echo ($result['email']); ?></p>
                        <p>Tel: <?php echo ($result['phone']); ?></p>
                        <p>Experience: <?php echo $result['experience']; ?></p>
                        <p>Educational: <?php echo $result['educational']; ?></p>
                        <hr>
                    </div>
                    <button onclick="window.location.href='date.php?regID=<?php echo $result['regID']; ?>' " class="w3-button w3-block w3-dark-grey w3-round-large">Contact</button>
                </div>
            </div>

        <?php
        } ?>

        <?php
        $search = $_GET['search'] ?? null;
        $sql = "SELECT * FROM register WHERE wage LIKE '%" . $search . "%' ";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_num_rows($query);
        $pagecount = ceil($result / $perpageview);
        ?>

        <div class="container">
            <div class="w3-center w3-large">
                <ul class="pagination">
                    <?php for ($i = 1; $i <= $pagecount; $i++) { ?>
                        <a href="find_a_person.php?pageno=<?php echo $i; ?>&search=<?php echo $search ?>"><?php echo $i; ?></a>
                    <?php } ?>
                </ul>
            </div>
        </div>

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