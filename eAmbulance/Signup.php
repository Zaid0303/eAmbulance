<?php
include('config.php');

if (isset($_POST['SignUp'])) {
    $user_name = $_POST['u_name'];
    $user_email = $_POST['u_email'];
    $user_pass = $_POST['u_pass'];
    $user_RPpass = $_POST['u_RPpass'];

    if ($user_pass == $user_RPpass) {
        $hashPass = md5($user_pass);

        $check_email = "SELECT * from `tbllogin_users` where `email` = '$user_email' ";
        $run_email = mysqli_query($con, $check_email);
        if (mysqli_num_rows($run_email) > 0) {
            echo "<script> 
                alert('Email already exist');
                window.location.href='Signup.php'
                </script>";
        } else {
            $user_insert = "INSERT INTO `tbllogin_users` (`ID`, `username`, `email`, `password`) 
                VALUES (NULL, '$user_name', '$user_email', '$hashPass')";
            $user_result = mysqli_query($con, $user_insert);
            if ($user_result) {
                echo "<script> 
                alert('Registration successful');
                window.location.href='login.php'
                </script>";
            } else {
                echo "<script> 
                alert('Registration failed');
                // window.location.href='Signup.php'
                </script>";
            }

        }
    } else {
        echo "<script> 
            alert('Password not matched');
            window.location.href='form.php'
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp - Lifelink</title>

    <!-- Favicon Link -->
    <link rel="shortcut icon" href="Images/logo-ambulance1.png" type="image/x-icon">

    <!-- Linking Font Awesome for eye icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./css/login_signup.css">
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
        <form action="Signup.php" method="POST">
            <h2>Sign Up</h2>
            <div class="input-field">
                <input type="text" name="u_name" required>
                <label>Enter your name</label>
            </div>
            <div class="input-field">
                <input type="email" name="u_email" required>
                <label>Enter your email</label>
            </div>

            <div class="input-field">
                <input type="password" id="password" name="u_pass" required>
                <label>Enter your password</label>
                <i class="fa-regular fa-eye icon" onclick="togglePassword('password', 'toggleIcon1')"
                    id="toggleIcon1"></i>
            </div>

            <div class="input-field">
                <input type="password" id="confirmPassword" name="u_RPpass" required>
                <label>Repeat your password</label>
                <i class="fa-regular fa-eye icon" onclick="togglePassword('confirmPassword', 'toggleIcon2')"
                    id="toggleIcon2"></i>
            </div>

            <input type="submit" class="button" name="SignUp" value="Sign Up">
            <div class="register">
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
        </form>
    </div>

    <script src="js/main.js"></script>
</body>

</html>