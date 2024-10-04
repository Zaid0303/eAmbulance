<?php
session_start();
error_reporting(0);
include('config.php');

if (isset($_POST['LogIn'])) {
    $useremail = $_POST['useremail'];
    $password = md5($_POST['password']);

    $queryUser = mysqli_query($con, "SELECT ID FROM tbllogin_users WHERE `email` ='$useremail' AND `password` ='$password'");
    $retUser = mysqli_fetch_array($queryUser);

    $queryAdmin = mysqli_query($con, "SELECT ID FROM tbladmin WHERE `Email`='$useremail' OR `UserName` = '$useremail' AND `Password`='$password'");
    $retAdmin = mysqli_fetch_array($queryAdmin);

    $queryDriver = mysqli_query($con, "SELECT ID FROM tblambulance WHERE `Ablemail`='$useremail' AND `Ablpass`='$password'");
    $retDriver = mysqli_fetch_array($queryDriver);

    if ($retUser) {
        $_SESSION['userid'] = $retUser['ID'];
        $_SESSION['userName'] = $retName['username'];
        $_SESSION['userEmail'] = $retName['email'];
        $_SESSION['userImage'] = $retImage['img'];
        $_SESSION['role'] = 'User';
        header('location:index.php');
    } elseif ($retAdmin) {
        $_SESSION['adminid'] = $retAdmin['ID'];
        $_SESSION['adminName'] = $retAdmin['UserName'];
        $_SESSION['adminemail'] = $retAdmin['Email'];
        $_SESSION['role'] = 'admin';
        header('location:admin/dashboard.php');
    } elseif ($retDriver) {
        $_SESSION['driverid'] = $retDriver['ID'];
        $_SESSION['driverreg'] = $retDriver['AmbRegNum'];


        $_SESSION['role'] = 'driver';
        header('location:admin/dashboard.php');
    } else {
        echo "<script>alert('Invalid Details.');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Lifelink</title>

    <!-- Favicon Link -->
    <link rel="shortcut icon" href="Images/logo-ambulance1.png" type="image/x-icon">

    <!-- Linking Font Awesome for eye icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@200;300;400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Open Sans", sans-serif;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            width: 100%;
            padding: 0 10px;
            background: url("Images/dark-theme.jpg"), #000;
            background-position: center;
            background-size: cover;
        }

        .wrapper {
            width: 400px;
            border-radius: 8px;
            padding: 30px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(9px);
            -webkit-backdrop-filter: blur(9px);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #fff;
        }

        .input-field {
            position: relative;
            border-bottom: 2px solid #ccc;
            margin: 15px 0;
        }

        .input-field label {
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            color: #fff;
            font-size: 16px;
            pointer-events: none;
            transition: 0.15s ease;
        }

        .input-field input {
            width: 100%;
            height: 40px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 16px;
            color: #fff;
        }

        .input-field input:focus~label,
        .input-field input:valid~label {
            font-size: 0.8rem;
            top: 10px;
            transform: translateY(-120%);
        }

        .icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #fff;
        }

        .forget {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 25px 0 35px 0;
            color: #fff;
        }

        .forget label {
            display: flex;
            align-items: center;
        }

        .forget label p {
            margin-left: 8px;
        }

        .wrapper a {
            color: #efefef;
            text-decoration: none;
        }

        .wrapper a:hover {
            text-decoration: underline;
        }

        .button {
            background: #007bff;
            color: #fff;
            font-weight: 600;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 3px;
            font-size: 16px;
            border: 2px solid transparent;
            transition: 0.3s ease;
        }

        .button:hover {
            color: #fff;
            border-color: #007bff;
            background: rgba(255, 255, 255, 0.15);
        }

        .register {
            text-align: center;
            margin-top: 30px;
            color: #fff;
        }
    </style>
</head>


<body>
    <div class="wrapper">
        <form action="" method="POST">
            <h2>Login</h2>

            <div class="input-field">
                <input type="text" name="useremail" required>
                <label>Enter email or Username</label>
            </div>

            <div class="input-field">
                <input type="password" id="password" name="password" required>
                <label>Enter your password</label>
                <i class="fa-regular fa-eye icon" onclick="togglePassword('password', 'toggleIcon')"
                    id="toggleIcon"></i>
            </div>

            <input type="submit" class="button" name="LogIn" value="Log In">


            <div class="register">
                <p>Don't have an account? <a href="Signup.php">Sign Up</a></p>
                <p class="mt-3">Back to <a href="index.php">Home?</a></p>
            </div>
        </form>
    </div>

    <script src="js/main.js"></script>

</body>

</html>