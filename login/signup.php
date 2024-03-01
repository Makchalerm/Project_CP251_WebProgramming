<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Agency Security-Sign Up Page</title>

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
    <?php
    session_start();
    include('server.php');
    $errors = array();

    if (isset($_POST['reg_signup'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $tel = mysqli_real_escape_string($conn, $_POST['tel']);
        
        //check password and password confirm is not match
        if ($password_1 != $password_2) {
            echo "<script>
            alert('Password and Password confirm is not match!');
            window.location = 'signup.php';
            </script>";
            exit();
        }

        //check username limit 1 user
        $user_check_query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists error something
            if ($result['username'] === $username) {
                array_push($errors, "Username already exists");
            }
        }


        if (count($errors) == 0) {
            $password = md5($password_1);

            $sql = "INSERT INTO users (username, password, fname, lname, tel) VALUES ('$username', '$password', '$fname', '$lname', '$tel')";
            mysqli_query($conn, $sql);

            $_SESSION['username'] = $username;
            echo "<script>
            alert('Please choose your role to open my webpage!');
            window.location = 'waiting.php';
            </script>";
            exit();
        } else {
            echo "<script>
            alert('Error to sign up!');
            window.location = 'signup.php';
            </script>";
            exit();
        }
    }

    ?>

    <div class="container">

        <div class="container w3-center">
            <h1>Sign up</h1>
            <hr>
        </div>

        <div class="container">
            <form action="signup.php" method="post">
                <label for="username" class="w3-large">Username</label>
                <input type="text" name="username" class="w3-input w3-border w3-light-grey" required><br>

                <label for="password_1" class="w3-large">Password</label>
                <input type="password" name="password_1" class="w3-input w3-border w3-light-grey" required><br>

                <label for="password_2" class="w3-large">Confirm Password</label>
                <input type="password" name="password_2" class="w3-input w3-border w3-light-grey" required><br>

                <label for="fname" class="w3-large">First Name</label>
                <input type="text" name="fname" class="w3-input w3-border w3-light-grey" required><br>

                <label for="lname" class="w3-large">Last Name</label>
                <input type="text" name="lname" class="w3-input w3-border w3-light-grey" required><br>

                <label for="tel" class="w3-large">Phone (Number)</label>
                <input type="text" name="tel" class="w3-input w3-border w3-light-grey" required><br>

                <button type="submit" name="reg_signup" class="w3-button w3-black">Register</button>
                <span class="w3-right">Already a account? <a href="login.php">Sign in</a></span>
            </form>
        </div>
    </div>
</body>

</html>