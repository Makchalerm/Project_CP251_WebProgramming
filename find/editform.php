<?php session_start();
include('../login/server.php');
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['ID']);
    header('location: ../login/login.php');
}

$regID = $_GET['regID'];
$update = "UPDATE register SET reg_name = NULL WHERE regID = '$regID'";
mysqli_query($conn, $update);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Security Agency</title>
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

<!--Form register-->
<div class="w3-container w3-light-gray">
    <form action="change.php" method="POST">
        <div class="container">
            <h1>Update form</h1>
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

            <button type="submit" class="registerbtn w3-black" name="edit">Edit</button>
        </div>
    </form>
</div>

</body>

</html>