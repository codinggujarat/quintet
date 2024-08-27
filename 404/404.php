<?php
session_start();
error_reporting(0);
include('../includes/config.php');

if (isset($_POST['change'])) {
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' and contactno='$contact'");
    $num = mysqli_fetch_array($query);
    if ($num > 0) {
        $extra = "forgot-password.php";
        mysqli_query($con, "update users set password='$password' WHERE email='$email' and contactno='$contact' ");
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        $_SESSION['errmsg'] = "Password Changed Successfully";
        exit();
    } else {
        $extra = "forgot-password.php";
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        $_SESSION['errmsg'] = "Invalid email id or Contact no";
        exit();
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">

    <title>Shopping Portal | Forgot Password</title>



    <!-- box-icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <script type="text/javascript">
    function valid() {
        if (document.register.password.value != document.register.confirmpassword.value) {
            alert("Password and Confirm Password Field do not match  !!");
            document.register.confirmpassword.focus();
            return false;
        }
        return true;
    }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body class="cnt-home">
    <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
        <!-- ============================================================= LOGO ============================================================= -->
        <div class="logo" style="position: fixed  ;padding: 50px; ">
            <a href="index.php" style="display: flex;align-items: center;justify-content: start;height: 80px;    ">
                <div
                    style="background-image: url(img/quintet.png);background-size: 100% 100%;background-position: center;width:400px;height: 210px;">
                </div>
            </a>
        </div>
    </div>

    <!-- ============================================== HEADER ============================================== -->


    <!-- ============================================== HEADER : END ============================================== -->
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');

    * {
        padding: 0;
        margin: 0;
    }

    body {
        background-color: black !important;
    }

    .body-content {
        background-image: url(img/hero.jpg);
        background-position: center;
        box-sizing: border-box;
        background-size: cover;
    }

    .body-content {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .container {
        width: 70%;
    }
    </style>
    <div class="body-content">
        <div class="container">
            <div class="row"
                style="background: linear-gradient(rgba(255, 255, 255, 0.5),rgba(255, 255, 255, 0.5));padding: 20px;   ">
                <div class="col">
                    <p style="text-transform: uppercase  ;margin-bottom: 10px;">
                        Page not found
                    </p>
                </div>
                <p style="font-size: 13px;margin-bottom:60px; ">We are sorry but this page is no longer available on
                    our web site.</p>
                <a href="index.php">Go to home page</a>
                <style>
                p {
                    text-transform: capitalize;
                }

                a,
                p {
                    font-family: 'Raleway', sans-serif;
                }

                a {
                    padding: 10px 20px;
                    background: transparent;
                    border: 1px solid black;
                    text-decoration: none;
                    font-size: 13px;
                    text-transform: uppercase;
                    color: black;
                }
                </style>
            </div>
        </div>
    </div>



    <script>
    $(document).ready(function() {
        $(".changecolor").switchstylesheet({
            seperator: "color"
        });
        $('.show-theme-options').click(function() {
            $(this).parent().toggleClass('open');
            return false;
        });
    });

    $(window).bind("load", function() {
        $('.show-theme-options').delay(2000).trigger('click');
    });
    </script>
    <!-- For demo purposes – can be removed on production : End -->



</body>

</html>