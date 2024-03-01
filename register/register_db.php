<?php
session_start();
include('../login/server.php');
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['ID']);
    header('location: ../login/login.php');
}
$errors = array();

if (!$_POST['register']) {
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
        $sql = "INSERT INTO register (reg_name, reg_lastname, email, phone, age, wage, experience, educational, image,ID) 
        VALUES ('$name', '$lastname', '$email', '$phone', '$age', '$wage', '$experience', '$educational','$pic',$ID1)";
        mysqli_query($conn, $sql);

        echo "<script>
            alert('Register success!');
            window.location = '../find/edit.php';
            </script>";
        exit();
    } else {
        echo "<script>
            alert('Register unsuccess!');
            window.location = 'register.php';
            </script>";
        exit();
    }

    $conn->close();
}
