<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Agency Security-Login Page</title>

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

    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $password = md5($password);
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
        $result = mysqli_query($conn, $query);

        // $query2 = "SELECT ID FROM users WHERE  username = '$username'";
        // $result2 = mysqli_query($conn, $query2);
        // echo $result2['ID'];

        
        if (mysqli_num_rows($result) == 1) {
            $rowresult = mysqli_fetch_array($result);
            $_SESSION['ID'] = $rowresult['ID'];
            
            
            
            $_SESSION['username'] = $username;
            

            echo "<script>
            alert('Please choose your role to open my webpage!');
            window.location = 'waiting.php';
            </script>";
            exit();
        } else {
            echo "<script>
            alert('Wrong Username or Password!');
            window.location = 'login.php';
            </script>";
            exit();
        }
    }
    ?>

    <div class="container ">

        <div class="container w3-center">
            <h1>Sign in</h1>
            <hr>
        </div>

        <div class="cotainer">
            <form action="login.php" method="post" class="w3-container">

                <label for="username" class="w3-large">Username</label>
                <input type="text" placeholder="Enter Username" name="username" class="w3-input w3-border w3-light-grey" required><br>

                <label for="psw" class="w3-large">Password</label>
                <input type="password" placeholder="Enter Password" name="password" class="w3-input w3-border w3-light-grey" required><br>

                <button type="submit" name="login_user" class="w3-button w3-black">Login</button>
                <span class="w3-right">Not yet a account? <a href="signup.php">Sign Up</a></span>

            </form>
        </div>

    </div>
</body>

</html>