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
    <link rel="stylesheet" href="home.css">
</head>

<body>

    <div class="card">
        <div class="w3-container w3-center">
            <br>
            <p>Are you sure to edit this ID.</p>
        </div>
    </div>

    <div class="w3-container w3-center" style="padding:128px 16px">
        <h3 class="w3-center" style="height: 50px;">Edit Already</h3>
        <button onclick="window.location.href='edit.php' " class="w3-button w3-block w3-dark-grey w3-round-large">OK</button>
    </div>

    <?php
    session_start();
    include('../login/server.php');

    $errors = array();

    if (isset($_POST['edit'])) {
        $name = mysqli_real_escape_string($conn, $_POST['reg_name']);
        $lastname = mysqli_real_escape_string($conn, $_POST['reg_lastname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $age = mysqli_real_escape_string($conn, $_POST['age']);
        $wage = mysqli_real_escape_string($conn, $_POST['wage']);
        $experience = mysqli_real_escape_string($conn, $_POST['experience']);
        $educational = mysqli_real_escape_string($conn, $_POST['educational']);
        $pic = mysqli_real_escape_string($conn, $_POST['image']);

        $phone_check_query = "SELECT * FROM register WHERE phone = '$phone' LIMIT 1";
        $query = mysqli_query($conn, $phone_check_query);
        $result = mysqli_fetch_assoc($query);

        if (count($errors) == 0) {
            $ID1 = $_SESSION['ID'];
            //$ID3 = $_SESSION['regID'];

            $sql = "UPDATE register SET reg_name = '$name' , reg_lastname = '$lastname', email = '$email', phone = '$phone', age = '$age', wage = '$wage', experience = '$experience', educational = '$educational', image = '$pic',ID = '$ID1' 
            WHERE reg_name is null ";
            mysqli_query($conn, $sql);
        } else {
            echo "<script>
                alert('Update unsuccess!');
                window.location = 'change.php';
                </script>";
            exit();
        }
        $conn->close();
    }
    ?>
</body>

</html>