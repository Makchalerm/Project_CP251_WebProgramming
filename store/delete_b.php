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
    <!-- About Section -->

    <div class="card">
        <div class="w3-container w3-center">
            <br>
            <p>Are you sure to delete this ID.</p>
        </div>
    </div>

    <div class="w3-container w3-center" style="padding:128px 16px">
        <form action="delete_b.php" method="POST" class="w3-container">
            <h3 class="w3-center" style="height: 50px;">Delete Already</h3>
            <button type="submit" name="delete" class="w3-button w3-xlarge w3-round w3-black" style="width:55%">OK</button>
        </form>
    </div>

    <?php
    session_start();
    include('../login/server.php');

    $detail_ID = $_GET['detail_ID'];
    $delete_id = "DELETE FROM store_detail WHERE detail_ID = $detail_ID";
    mysqli_query($conn, $delete_id);
    if (isset($_POST['delete'])) {

        $errors = array();

        if (count($errors) == 0) {
            echo "<script>
                alert('Delete Data success!');
                window.location = 'store_b.php';
                </script>";
        } else {
            echo "<script>
                alert('Delete Date Unsuccess!');
                window.location = 'store_b.php';
                </script>";
            exit();
        }
    }
    ?>
</body>

</html>