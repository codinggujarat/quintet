<?php
session_start();
error_reporting(0);
include('includes/config.php');
// Code user Registration
if (isset($_POST['submit'])) {
    $name = $_POST['fullname'];
    $email = $_POST['emailid'];
    $contactno = $_POST['contactno'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "insert into users(name,email,contactno,password) values('$name','$email','$contactno','$password')");
    if ($query) {
        echo "<script>alert('You are successfully register');</script>";
    } else {
        echo "<script>alert('Not register something went worng');</script>";
    }
}
// Code for User login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' and password='$password'");
    $num = mysqli_fetch_array($query);
    if ($num > 0) {
        $extra = "index.php";
        $_SESSION['login'] = $_POST['email'];
        $_SESSION['id'] = $num['id'];
        $_SESSION['username'] = $num['name'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 1;
        $log = mysqli_query($con, "insert into userlog(userEmail,userip,status) values('" . $_SESSION['login'] . "','$uip','$status')");
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    } else {
        $extra = "login.php";
        $email = $_POST['email'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 0;
        $log = mysqli_query($con, "insert into userlog(userEmail,userip,status) values('$email','$uip','$status')");
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        $_SESSION['errmsg'] = "Invalid email id or Password";
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

    <title>LOG IN / CREATE ACCOUNT - QUINTET</title>

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
    <!-- box-icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
    <link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
    <link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
    <link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
    <link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
    <!-- Demo Purpose Only. Should be removed in production : END -->


    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
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
    <script>
    function userAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'email=' + $("#email").val(),
            type: "POST",
            success: function(data) {
                $("#user-availability-status1").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
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
    <?php include('includes/search.php'); ?>

    <!-- ============================================== HEADER : END ============================================== -->

    <style>
    a {
        color: #000;
        text-decoration: none;
    }

    .form-group label {
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        color: #000;
        font-weight: 400;
        text-transform: uppercase;
    }

    .form-group input {
        border: 0;
        border: 1px solid black;
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        color: #000;
        font-weight: 400;
        padding: 10px 20px;
        width: 100%;
        height: 50px;
        box-shadow: 0;
        border-radius: 0px;
    }




    .form-group input::placeholder {
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        color: #000;
        font-weight: 400;
        text-transform: capitalize;
    }

    .form-group input:focus {
        border: 1px solid black;
        box-shadow: none;
    }

    .checkout-page-button {
        background: #fff;
        width: 100%;
        color: #000;
        height: 50px;
        font-size: 14px;
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
        outline: 0;
        border: 1px solid black;
        text-transform: uppercase;
    }

    .checkout-page-button:hover {
        color: #000;
        border: 1px solid black;
    }
    </style>
    <div class="body-content outer-top-bd">
        <style>
        .main-formbody {
            height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            position: relative;
            max-width: 600px;
            width: 100%;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            margin: 0 20px;
        }

        .container .forms {
            display: flex;
            align-items: baseline;
            height: 100%;
            width: 200%;
            transition: height 0.2s ease;
        }

        .container .form {
            width: 50%;
            padding: 30px;
            background-color: #fff;
            transition: margin-left 0.18s ease;
        }

        .container.active .login {
            margin-left: -50%;
            opacity: 0;
            transition: margin-left 0.18s ease, opacity 0.15s ease;
        }

        .container .signup {
            opacity: 0;
            transition: opacity 0.09s ease;
        }

        .container.active .signup {
            opacity: 1;
            transition: opacity 0.2s ease;
        }

        .container.active .forms {
            height: 100%;
        }

        .container .form .title {
            position: relative;
            font-size: 27px;
            font-weight: 600;
        }

        .form .title::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 30px;
            background-color: #4070f4;
            border-radius: 25px;
        }

        .form .input-field {
            position: relative;
            height: 50px;
            width: 100%;
            margin-top: 30px;
        }

        .input-field input {
            position: absolute;
            height: 100%;
            width: 100%;
            padding: 0 35px;
            border: none;
            outline: none;
            font-size: 16px;
            border-bottom: 2px solid #ccc;
            border-top: 2px solid transparent;
            transition: all 0.2s ease;
        }

        .input-field input:is(:focus, :valid) {
            border-bottom-color: #4070f4;
        }

        .input-field i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 23px;
            transition: all 0.2s ease;
        }

        .input-field input:is(:focus, :valid)~i {
            color: #4070f4;
        }

        .input-field i.icon {
            left: 0;
        }

        .input-field i.showHidePw {
            right: 0;
            cursor: pointer;
            padding: 10px;
        }


        .form .text {
            color: #333;
            font-weight: 400;
            font-family: 'Poppins', sans-serif;

            font-size: 14px;
        }

        .form a.text {
            font-weight: 300;
            text-transform: uppercase;
            color: #000;
            text-decoration: underline;
            font-family: 'Poppins', sans-serif;
        }

        .form a:hover {
            text-decoration: underline;
        }



        .form .login-signup {
            margin-top: 30px;
            text-align: center;
        }


        .checkbox {
            display: flex;
            align-items: center;
            justify-content: start;
            margin-left: 20px;
        }

        .checkbox input {
            height: 16px;
            width: 16px;
            accent-color: #000;

        }

        .checkbox label {
            font-size: 15px;
            padding-left: 5px;
            color: #000;
            margin-top: 5px;
            font-weight: 400;
            text-transform: uppercase;
            font-family: 'Poppins', sans-serif;

        }

        .radio {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: end;
        }



        .invalid-feedback span {
            font-size: 13px;
            font-family: 'Poppins', sans-serif;
        }

        .input-field-login {
            position: relative;
        }



        .input-field-login label {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #000;
            font-size: 12px;
            pointer-events: none;
            transition: 0.3s;
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
        }

        input:focus,
        textarea:focus {
            border: 2px solid #000;
        }

        input:focus~label,
        textarea:focus~label,
        input:valid~label,
        textarea:valid~label {
            top: 0;
            left: 15px;
            font-size: 12px;
            padding: 0 2px;
            background: #fff;
            color: #000;
        }

        .noallowtochage input {
            cursor: no-drop;
            background: #f2f3f8;
        }
        </style>
        <div class="main-formbody">
            <div class="container">
                <div class="forms">
                    <div class="form login">
                        <h4 class=""
                            style="  font-family: 'Poppins' , sans-serif ;font-size:20px;color: #000; font-weight: 300 ;text-transform:uppercase;  ">
                            sign
                            in
                        </h4>
                        <p class=""
                            style="font-family: 'Poppins' , sans-serif ;font-size: 10px;color: #000; font-weight: 300 ;text-transform:uppercase; ">
                            Hello, Welcome to
                            your
                            account.</p>
                        <form class=" register-form outer-top-xs needs-validation" novalidate method="post"
                            autocomplete="off">
                            <span style="color:red;">
                                <?php
                                echo htmlentities($_SESSION['errmsg']);
                                ?>
                                <?php
                                echo htmlentities($_SESSION['errmsg'] = "");
                                ?>
                            </span>
                            <div class="form-group input-field-login">
                                <input type="email" name="email" class="form-control unicase-form-control text-input"
                                    id="loginemail" required>
                                <label>
                                    What's
                                    your e-mail?</label>
                            </div>

                            <div class="form-group input-field-login" style="position:relative;">
                                <input type="password" name="password"
                                    class="form-control unicase-form-control text-input password" id="loginpassword"
                                    required>

                                <label>
                                    Your
                                    password?
                                </label>

                            </div>
                            <span class="checkbox">
                                <input type="checkbox" id="check" class="eye-icon" />
                                <label for="check">Show Password</label>
                            </span>
                            <div class="radio outer-xs ">
                                <a href="forgot-password.php" class="forgot-password pull-right"
                                    style="text-decoration: underline;  font-size: 12px  ;color: #000;font-family: 'Poppins' , sans-serif ;font-weight: 300  ;text-transform:uppercase  ; ">
                                    Forgot
                                    your
                                    Password?</a>
                            </div>
                            <button type=" submit" class=" checkout-page-button" name="login">Login</button>
                        </form>
                        <div class="login-signup">
                            <span class="text">Create Account?
                                <a href="#" class="text signup-link">Signup Now</a>
                            </span>
                        </div>
                    </div>
                    <!-- Registration Form -->
                    <div class="form signup">
                        <h4 class="checkout-subtitle"
                            style="  font-family: 'Poppins' , sans-serif ;font-size:20px;color: #000; font-weight: 300 ;text-transform:uppercase;    ">
                            create a
                            new account</h4>
                        <p class="text title-tag-line"
                            style="font-family: 'Poppins' , sans-serif ;font-size: 10px;color: #000; font-weight: 300 ;text-transform:uppercase; ">
                            Create
                            your own Shopping account.</p>
                        <form class="register-form outer-top-xs needs-validation" novalidate role="form" method="post"
                            autocomplete="off" name="register" onSubmit="return valid();" autocomplete="off">
                            <div class="form-group input-field-login">
                                <input type="text" class="form-control unicase-form-control text-input" id="fullname"
                                    name="fullname" required="required" autocomplete="off" required>
                                <label>What's
                                    your name? </label>

                            </div>


                            <div class="form-group input-field-login">
                                <input type="email" class="form-control unicase-form-control text-input" id="email"
                                    onBlur="userAvailability()" name="emailid" required autocomplete="off">
                                <span id="user-availability-status1" style="font-size:12px;"></span>
                                <label>What's
                                    your e-mail?
                                </label>
                            </div>

                            <div class="form-group input-field-login">
                                <input type="text" class="form-control unicase-form-control text-input" id="contactno"
                                    name="contactno" maxlength="10" required>
                                <label>Phone
                                    Number
                                </label>
                            </div>

                            <div class="form-group input-field-login" style="position:relative;">
                                <input type="password" class="form-control unicase-form-control text-input password"
                                    id="password" name="password" required>
                                <label>
                                    Your password?
                                </label>
                            </div>

                            <div class="form-group input-field-login" style="position:relative;">
                                <input type="password" class="form-control unicase-form-control text-input password"
                                    id="confirmpassword" name="confirmpassword" required>
                                <label>Confirm
                                    Password </label>

                            </div>
                            <span class="checkbox">
                                <input type="checkbox" id="checks" class="eye-icon" />
                                <label for="checks">Show Password</label>
                            </span>



                            <button type="submit" name="submit" class=" checkout-page-button" id="submit">Sign
                                Up</button>
                        </form>
                        <div class="login-signup">
                            <span class="text">Sign in with your account?
                                <a href="#" class="text login-link">Login Now</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
        const container = document.querySelector(".container"),
            pwFields = document.querySelectorAll(".password"),
            signUp = document.querySelector(".signup-link"),
            login = document.querySelector(".login-link");



        // js code to appear signup and login form
        signUp.addEventListener("click", () => {
            container.classList.add("active");
        });
        login.addEventListener("click", () => {
            container.classList.remove("active");
        });



        const forms = document.querySelector(".forms"),
            pwShowHide = document.querySelectorAll(".eye-icon");
        pwShowHide.forEach(eyeIcon => {
            eyeIcon.addEventListener("click", () => {
                let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".password");

                pwFields.forEach(password => {
                    if (password.type === "password") {
                        password.type = "text";
                        eyeIcon.classList.replace("bx-hide", "bx-show");
                        return;
                    }
                    password.type = "password";
                    eyeIcon.classList.replace("bx-show", "bx-hide");
                })

            })
        })
        </script>
        <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
        </script>
        <div>
            <div class="info-boxes wow fadeInUp ">
                <div class="info-boxes-inner">
                    <div class="row">
                        <div class="col-md-6 col-sm-4 col-lg-4 ">
                            <div class="info-box" style="box-shadow: 0 ;border:none ;">
                                <div class=" row  " style="text-align: center; font-family: 'Poppins' , sans-serif ;font-size:25px;color:
                                                    #000; font-weight: 400; ">
                                    <div class="col-lg-12" style="margin-bottom: 10px; ">
                                        <svg width="30px" fill="#000000" viewBox="0 -64 640 640"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M624 352h-16V243.9c0-12.7-5.1-24.9-14.1-33.9L494 110.1c-9-9-21.2-14.1-33.9-14.1H416V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48v320c0 26.5 21.5 48 48 48h16c0 53 43 96 96 96s96-43 96-96h128c0 53 43 96 96 96s96-43 96-96h48c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zM160 464c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm320 0c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm80-208H416V144h44.1l99.9 99.9V256z">
                                                </path>
                                            </g>
                                        </svg>
                                    </div>
                                    <span class="col-lg-12"
                                        style="font-family: 'Poppins' , sans-serif ;text-transform: uppercase;font-size: 14px;margin-bottom: 5px; font-weight: 500;    ">Free
                                        & Fast
                                        Delivery
                                    </span>
                                    <h6 class="col-lg-12"
                                        style="font-family: 'Poppins' , sans-serif ;text-transform: uppercase  ;font-size: 13px;font-weight: 400;   ">
                                        Shipping within 48 hours across India.

                                    </h6>
                                </div>
                            </div>
                        </div><!-- .col -->

                        <div class="hidden-md col-sm-4 col-lg-4">
                            <div class="info-box" style="box-shadow: 0 ;border:none ;">
                                <div class="row" style="text-align: center; font-family: 'Poppins' , sans-serif ;font-size:25px;color:
                                                    #000; font-weight: 400; ">
                                    <div class="col-lg-12 " style="margin-bottom: 10px; ">
                                        <svg width="30px" fill="#000000" viewBox="0 0 56 56"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M 19.2811 49.5156 C 20.5233 49.5156 21.3436 48.6719 21.3436 47.4531 C 21.3436 46.8438 21.1561 46.3984 20.7811 46.0234 L 14.0311 39.4375 L 9.5780 35.6406 L 15.0858 35.8750 L 44.9920 35.8750 C 50.4529 35.8750 52.7267 33.3672 52.7267 28.0703 L 52.7267 14.2188 C 52.7267 8.7578 50.4529 6.4844 44.9920 6.4844 L 31.8671 6.4844 C 30.5780 6.4844 29.7342 7.4219 29.7342 8.5703 C 29.7342 9.7188 30.5780 10.6562 31.8671 10.6562 L 44.9920 10.6562 C 47.4764 10.6562 48.5545 11.7344 48.5545 14.2188 L 48.5545 28.0703 C 48.5545 30.6250 47.4764 31.7031 44.9920 31.7031 L 15.0858 31.7031 L 9.5780 31.9375 L 14.0311 28.1406 L 20.7811 21.5547 C 21.1561 21.1797 21.3436 20.7109 21.3436 20.1016 C 21.3436 18.9062 20.5233 18.0391 19.2811 18.0391 C 18.7655 18.0391 18.1561 18.2969 17.7577 18.6953 L 3.9764 32.2188 C 3.5077 32.6640 3.2733 33.2031 3.2733 33.7891 C 3.2733 34.3516 3.5077 34.9140 3.9764 35.3594 L 17.7577 48.8828 C 18.1561 49.2813 18.7655 49.5156 19.2811 49.5156 Z">
                                                </path>
                                            </g>
                                        </svg>
                                    </div>
                                    <span class="col-lg-12 "
                                        style="font-family: 'Poppins' , sans-serif ;text-transform: uppercase;font-size: 14px;margin-bottom: 5px; font-weight: 500;     ">
                                        Return Policy
                                    </span>
                                    <h6 class="col-lg-12"
                                        style="font-family: 'Poppins' , sans-serif ;text-transform: uppercase  ;font-size: 13px;font-weight: 400;  ">
                                        Returns with 7 days.

                                    </h6>
                                </div>
                            </div>
                        </div><!-- .col -->

                        <div class="col-md-6 col-sm-4 col-lg-4">
                            <div class="info-box" style="box-shadow: 0 ;border:none ;">
                                <div class="row" style="text-align: center; font-family: 'Poppins' , sans-serif ;font-size:25px;color:
                                                    #000; font-weight: 400; ">
                                    <div class=" col-lg-12" style="margin-bottom: 10px; ">
                                        <svg width="30px" viewBox=" 0 -2.5 20 20" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <title>email [#1572]</title>
                                                <desc>Created with Sketch.</desc>
                                                <defs> </defs>
                                                <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <g id="Dribbble-Light-Preview"
                                                        transform="translate(-340.000000, -922.000000)" fill="#000000">
                                                        <g id="icons" transform="translate(56.000000, 160.000000)">
                                                            <path
                                                                d="M294,774.474 L284,765.649 L284,777 L304,777 L304,765.649 L294,774.474 Z M294.001,771.812 L284,762.981 L284,762 L304,762 L304,762.981 L294.001,771.812 Z"
                                                                id="email-[#1572]"> </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <span class="col-lg-12"
                                        style="font-family: 'Poppins' , sans-serif ;text-transform: uppercase;font-size: 14px;margin-bottom: 5px; font-weight: 500;    ">
                                        Contact us
                                    </span>
                                    <h6 class="col-lg-12"
                                        style="font-family: 'Poppins' , sans-serif ;text-transform: uppercase  ;font-size: 13px;font-weight: 400;   ">
                                        Write us at example.com
                                    </h6>
                                </div>
                            </div>
                        </div><!-- .col -->
                    </div><!-- /.row -->
                </div><!-- /.info-boxes-inner -->
                <!-- ============================================== INFO BOXES : END ============================================== -->
                <!-- create a new account -->
            </div><!-- /.row -->
        </div>
    </div>
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