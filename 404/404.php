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

    <title>Page Not Found | QUINTET </title>



    <!-- box-icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

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
        <div class="logo" style="position: fixed  ;padding: 20px;margin-left:10px; ">
            <a href="index" style="border:0;text-decoration: none; margin:0;padding:0;">
                <svg width="500" height="" viewBox="0 0 486 92" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M29.6 72.5C24 71.4333 19.0333 69.2333 14.7 65.9C10.3667 62.5667 6.96667 58.4 4.5 53.4C2.1 48.4 0.9 42.9333 0.9 37C0.9 30.1333 2.46667 23.9333 5.6 18.4C8.8 12.8 13.2 8.43333 18.8 5.29999C24.4 2.1 30.6667 0.499997 37.6 0.499997C44.5333 0.499997 50.8 2.1 56.4 5.29999C62 8.43333 66.3667 12.8 69.5 18.4C72.7 23.9333 74.3 30.1333 74.3 37C74.3 42.9333 73.0667 48.4 70.6 53.4C68.2 58.4 64.8333 62.5667 60.5 65.9C56.1667 69.2333 51.2 71.4333 45.6 72.5V92H29.6V72.5ZM37.6 57.8C41.4667 57.8 44.9333 56.9 48 55.1C51.1333 53.3 53.5667 50.8333 55.3 47.7C57.1 44.5 58 40.9333 58 37C58 33.0667 57.1 29.5333 55.3 26.4C53.5667 23.2 51.1333 20.7 48 18.9C44.9333 17.0333 41.4667 16.1 37.6 16.1C33.7333 16.1 30.2667 17.0333 27.2 18.9C24.1333 20.7 21.7 23.2 19.9 26.4C18.1667 29.5333 17.3 33.0667 17.3 37C17.3 40.9333 18.1667 44.5 19.9 47.7C21.7 50.8333 24.1333 53.3 27.2 55.1C30.2667 56.9 33.7333 57.8 37.6 57.8ZM120.103 73.5C113.636 73.5 107.936 72.1667 103.003 69.5C98.1365 66.8333 94.3698 63.1 91.7031 58.3C89.0365 53.4333 87.7031 47.7667 87.7031 41.3V2H103.703V40.5C103.703 44.1667 104.336 47.3333 105.603 50C106.936 52.6 108.803 54.6 111.203 56C113.67 57.4 116.636 58.1 120.103 58.1C123.57 58.1 126.503 57.4 128.903 56C131.37 54.6 133.236 52.6 134.503 50C135.77 47.3333 136.403 44.1667 136.403 40.5V2H152.403V41.3C152.403 47.7667 151.07 53.4333 148.403 58.3C145.803 63.1 142.036 66.8333 137.103 69.5C132.236 72.1667 126.57 73.5 120.103 73.5ZM170.741 72V2H186.741V72H170.741ZM206.386 72V2H222.486L254.786 67.1V2H270.786V72H254.686L222.386 6.9V72H206.386ZM308.47 72V17.4H283.27V2H349.57V17.4H324.47V72H308.47ZM362.05 72V2H410.35V15.9H377.75V36H399.95V38H377.75V58.1H413.25V72H362.05ZM444.017 72V17.4H418.817V2H485.117V17.4H460.017V72H444.017Z"
                        fill="black" />
                </svg>
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
        background-image: url(img/download1.jpeg);
        background-position: center;
        box-sizing: border-box;
        background-size: cover;
        object-fit: cover;
    }

    .body-content {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
        padding: 0;
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
                    text-transform: uppercase;

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

                @media only screen and (max-width: 500px) {
                    .container {
                        width: 90%;
                    }

                    .logo a svg {

                        width: 300px;
                    }
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