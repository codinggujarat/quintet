<?php
session_start();
error_reporting(0);
include('includes/config.php');

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

    <title> FORGOT PASSWORD - QUINTET</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/green.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
    <link href="assets/css/lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/rateit.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

    <!-- Demo Purpose Only. Should be removed in production -->
    <link rel="stylesheet" href="assets/css/config.css">

    <link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
    <link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
    <link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
    <link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
    <link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
    <!-- Demo Purpose Only. Should be removed in production : END -->

    <!-- box-icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">
    <!-- Favicon -->
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
</head>

<body class="cnt-home">



    <!-- ============================================== HEADER ============================================== -->
    <header class="header-style-1">

        <!-- ============================================== TOP MENU ============================================== -->
        <?php include('includes/top-header.php'); ?>
        <!-- ============================================== TOP MENU : END ============================================== -->
        <?php include('includes/main-header.php'); ?>
        <!-- ============================================== NAVBAR ============================================== -->
        <?php include('includes/menu-bar.php'); ?>
        <!-- ============================================== NAVBAR : END ============================================== -->

    </header>

    <!-- ============================================== HEADER : END ============================================== -->

    <style>
    .form-group input {
        border: 2px solid gray;
        font-family: 'Raleway', sans-serif !important;
        font-size: 15px;
        color: #000;
        font-weight: 600;
        text-transform: capitalize;
    }


    .form-group input::placeholder {
        font-family: 'Raleway', sans-serif !important;
        font-size: 15px;
        color: #000;
        font-weight: 600;
        text-transform: capitalize;
    }

    .form-group input:focus {
        border: 2px solid black !important;
    }

    .checkout-page-button {
        background: #000 !important;
        width: 100% !important;
        color: #fff !important;
        height: 50px !important;
        font-size: 20px !important;
        border-radius: 0 !important;
        font-family: 'Raleway', sans-serif !important;
        font-weight: 400 !important;
    }

    .checkout-page-button:hover {
        color: #000;
        border: 1px solid black;
    }
    </style>
    <div class="body-content outer-top-bd">
        <div class="" style="  padding: 0;margin-left:50px;margin-right:50px;  ">
            <div class="sign-in-page inner-bottom-sm">
                <div class="row">
                    <!-- Sign-in -->
                    <style>
                    .sign-in {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }
                    </style>
                    <div class="col-md-6 col-sm-6 col-lg-12 sign-in">
                        <form class="register-form outer-top-xs" style="width: 500px;" name="register" method="post">
                            <h4 class=""
                                style="  font-family: 'Raleway' , sans-serif !important;font-size:40px;color: #000; font-weight: 500;text-transform: capitalize;  ">
                                Forgot password
                            </h4>
                            <span style="color:red;">
                                <?php
                                echo htmlentities($_SESSION['errmsg']);
                                ?>
                                <?php
                                echo htmlentities($_SESSION['errmsg'] = "");
                                ?>
                            </span>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1"
                                    style="font-family: 'Raleway' , sans-serif !important;font-size: 17px;color: #000; font-weight: 500;text-transform: capitalize;">
                                    What's
                                    your e-mail?</label>
                                <input type="email" name="email" placeholder="E-mail"
                                    class="form-control unicase-form-control text-input" id="exampleInputEmail1"
                                    required>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1"
                                    style="font-family: 'Raleway' , sans-serif !important;font-size: 17px;color: #000; font-weight: 500;text-transform: capitalize;">

                                    Phone
                                    Number </label>
                                <input type="text" placeholder="98xxxxxxxxx" name="contact"
                                    class="form-control unicase-form-control text-input" id="contact" required>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password"
                                    style=" font-family: 'Raleway' , sans-serif !important;font-size: 17px;color: #000; font-weight: 500;text-transform: capitalize;">
                                    Your
                                    password?
                                </label>
                                <input type="password" class="form-control unicase-form-control text-input"
                                    id="password" placeholder="Password" name="password" required>
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="confirmpassword"
                                    style=" font-family: 'Raleway' , sans-serif !important;font-size: 17px;color: #000; font-weight: 500;text-transform: capitalize;">
                                    Confirm
                                    Password
                                </label>
                                <input type="password" class="form-control unicase-form-control text-input"
                                    id="confirmpassword" placeholder="Password" name="confirmpassword" required>
                            </div>



                            <button type="submit" class=" checkout-page-button" name="change">Change</button>
                        </form>
                    </div>
                    <!-- Sign-in -->


                    <!-- create a new account -->
                </div><!-- /.row -->
            </div>
        </div>
    </div>
    <?php include('includes/brands-slider.php'); ?>
    <?php include('includes/footer.php'); ?>
    <script src="assets/js/jquery-1.11.1.min.js"></script>

    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>

    <script src="assets/js/echo.min.js"></script>
    <script src="assets/js/jquery.easing-1.3.min.js"></script>
    <script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/scripts.js"></script>

    <!-- For demo purposes – can be removed on production -->

    <script src="switchstylesheet/switchstylesheet.js"></script>

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