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
        $extra = "my-cart.php";
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

    <!-- ============================================== HEADER : END ============================================== -->

    <style>
    .form-group label {
        font-family: 'Raleway', sans-serif !important;
        font-size: 17px;
        color: #000;
        font-weight: 500;
        text-transform: capitalize;
    }

    .form-group input {
        border: 2px solid gray !important;
        font-family: 'Raleway', sans-serif !important;
        font-size: 15px !important;
        color: #000 !important;
        font-weight: 600 !important;
        padding: 10px 20px !important;
        width: 100%;
        height: 60px;
        box-shadow: 0 !important;
        border-radius: 10px;
    }




    .form-group input::placeholder {
        font-family: 'Raleway', sans-serif !important;
        font-size: 15px !important;
        color: #000 !important;
        font-weight: 600 !important;
        text-transform: capitalize !important;
    }

    .form-group input:focus {
        border: 2px solid black !important;
        box-shadow: none !important;
    }

    .checkout-page-button {
        background: #000 !important;
        width: 100% !important;
        color: #fff !important;
        height: 50px !important;
        font-size: 18px !important;
        border-radius: 10px !important;
        font-family: 'Raleway', sans-serif !important;
        font-weight: 400 !important;
    }

    .checkout-page-button:hover {
        color: #fff !important;
        border: 1px solid black !important;
    }
    </style>
    <div class="body-content outer-top-bd">
        <style>
        .main-formbody {
            height: 90vh !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        .container {
            position: relative !important;
            max-width: 600px !important;
            width: 100% !important;
            background: #fff !important;
            border-radius: 10px !important;
            overflow: hidden !important;
            margin: 0 20px !important;
        }

        .container .forms {
            display: flex !important;
            align-items: center !important;
            height: 100% !important;
            width: 200% !important;
            transition: height 0.2s ease !important;
        }

        .container .form {
            width: 50% !important;
            padding: 30px !important;
            background-color: #fff !important;
            transition: margin-left 0.18s ease !important;
        }

        .container.active .login {
            margin-left: -50% !important;
            opacity: 0 !important;
            transition: margin-left 0.18s ease, opacity 0.15s ease !important;
        }

        .container .signup {
            opacity: 0 !important;
            transition: opacity 0.09s ease !important;
        }

        .container.active .signup {
            opacity: 1 !important;
            transition: opacity 0.2s ease !important;
        }

        .container.active .forms {
            height: 100% !important;
        }

        .container .form .title {
            position: relative !important;
            font-size: 27px !important;
            font-weight: 600 !important;
        }

        .form .title::before {
            content: '' !important;
            position: absolute !important;
            left: 0 !important;
            bottom: 0 !important;
            height: 3px !important;
            width: 30px !important;
            background-color: #4070f4 !important;
            border-radius: 25px !important;
        }

        .form .input-field {
            position: relative !important;
            height: 50px !important;
            width: 100% !important;
            margin-top: 30px !important;
        }

        .input-field input {
            position: absolute !important;
            height: 100% !important;
            width: 100% !important;
            padding: 0 35px !important;
            border: none !important;
            outline: none !important;
            font-size: 16px !important;
            border-bottom: 2px solid #ccc !important;
            border-top: 2px solid transparent !important;
            transition: all 0.2s ease !important;
        }

        .input-field input:is(:focus, :valid) {
            border-bottom-color: #4070f4 !important;
        }

        .input-field i {
            position: absolute !important;
            top: 50% !important;
            transform: translateY(-50%) !important;
            color: #999 !important;
            font-size: 23px !important;
            transition: all 0.2s ease !important;
        }

        .input-field input:is(:focus, :valid)~i {
            color: #4070f4 !important;
        }

        .input-field i.icon {
            left: 0 !important;
        }

        .input-field i.showHidePw {
            right: 0 !important;
            cursor: pointer !important;
            padding: 10px !important;
        }


        .form .text {
            color: #333 !important;
            font-size: 14px !important;
        }

        .form a.text {
            color: #4070f4 !important;
            text-decoration: none !important;
        }

        .form a:hover {
            text-decoration: underline !important;
        }

        .form .button {
            margin-top: 35px !important;
        }

        .form .button input {
            border: none !important;
            color: #fff !important;
            font-size: 17px !important;
            font-weight: 500 !important;
            letter-spacing: 1px !important;
            border-radius: 6px !important;
            background-color: #4070f4 !important;
            cursor: pointer !important;
            transition: all 0.3s ease !important;
        }

        .button input:hover {
            background-color: #265df2 !important;
        }

        .form .login-signup {
            margin-top: 30px !important;
            text-align: center !important;
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
            font-weight: 600;
            font-family: 'Raleway', sans-serif !important;

        }

        .radio {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: end;
        }



        .invalid-feedback span {
            font-size: 13px;
            font-family: 'Raleway', sans-serif !important;
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
            font-size: 15px;
            pointer-events: none;
            transition: 0.3s;
            font-family: 'Raleway', sans-serif !important;
            font-weight: 500;
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
            font-size: 16px;
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
                            style="  font-family: 'Raleway' , sans-serif !important;font-size:40px;color: #000; font-weight: 500;text-transform: capitalize;  ">
                            sign
                            in
                        </h4>
                        <p class=""
                            style="font-family: 'Raleway' , sans-serif !important;font-size: 20px;color: #000; font-weight: 500;text-transform: capitalize; ">
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
                                    style="text-decoration: underline;  font-size: 15px !important ;color: #000;font-family: 'Raleway' , sans-serif !important;font-weight: 600 !important ;text-transform: capitalize !important ; ">
                                    Forgot
                                    your
                                    Password?</a>
                            </div>
                            <button type=" submit" class="btn-upper btn btn-primary checkout-page-button"
                                name="login">Login</button>
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
                            style=" font-family: 'Raleway' , sans-serif !important;font-size:40px;color: #000; font-weight: 500; text-transform: capitalize;  ">
                            create a
                            new account</h4>
                        <p class="text title-tag-line"
                            style="font-family: 'Raleway' , sans-serif !important;font-size: 20px;color: #000; font-weight: 500;text-transform: capitalize; ">
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



                            <button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button"
                                id="submit">Sign Up</button>
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
        <div class="" style="  padding: 0;margin-left:50px;margin-right:50px;  ">
            <div class="info-boxes wow fadeInUp ">
                <div class="info-boxes-inner">
                    <div class="row">
                        <div class="col-md-6 col-sm-4 col-lg-4 ">
                            <div class="info-box" style="box-shadow: 0 !important;border:none !important;">
                                <div class=" row  " style="text-align: center; font-family: 'Raleway' , sans-serif !important;font-size:25px;color:
                                                    #000; font-weight: 500; ">
                                    <div class="col-lg-12" style="margin-bottom: 10px; ">
                                        <i class="bx bxs-truck" style="color: #000;font-size: 50px; "></i>
                                    </div>
                                    <span class="col-lg-12"
                                        style="text-transform: uppercase;font-size: 14px;font-weight: 600;margin-bottom: 5px; font-weight: 700;    ">Free
                                        & Fast
                                        Delivery
                                    </span>
                                    <h6 class="col-lg-12"
                                        style="text-transform: capitalize  ;font-size: 13px;font-weight: 700;   ">
                                        Shipping within 48 hours across India.

                                    </h6>
                                </div>
                            </div>
                        </div><!-- .col -->

                        <div class="hidden-md col-sm-4 col-lg-4">
                            <div class="info-box" style="box-shadow: 0 !important;border:none !important;">
                                <div class="row" style="text-align: center; font-family: 'Raleway' , sans-serif !important;font-size:25px;color:
                                                    #000; font-weight: 500; ">
                                    <div class="col-lg-12 " style="margin-bottom: 10px; ">
                                        <i class="bx bx-revision" style="color: #000;font-size: 50px; "></i>

                                    </div>
                                    <span class="col-lg-12 "
                                        style="margin-bottom: 5px;text-transform: uppercase;font-size: 14px;font-weight: 700;  ">
                                        Return Policy
                                    </span>
                                    <h6 class="col-lg-12"
                                        style="text-transform: capitalize  ;font-size: 13px;font-weight: 700;   ">
                                        Returns with 7 days.

                                    </h6>
                                </div>
                            </div>
                        </div><!-- .col -->

                        <div class="col-md-6 col-sm-4 col-lg-4">
                            <div class="info-box" style="box-shadow: 0 !important;border:none !important;">
                                <div class="row" style="text-align: center; font-family: 'Raleway' , sans-serif !important;font-size:25px;color:
                                                    #000; font-weight: 500; ">
                                    <div class=" col-lg-12" style="margin-bottom: 10px; ">
                                        <i class=" bx bxs-envelope" style="color: #000;font-size: 50px; "></i>
                                    </div>
                                    <span class="col-lg-12"
                                        style="text-transform: uppercase;font-size: 14px;font-weight: 600; margin-bottom: 5px;font-weight: 700;   ">
                                        Contact us
                                    </span>
                                    <h6 class="col-lg-12"
                                        style="text-transform: capitalize  ;font-size: 13px;font-weight: 700;   ">
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