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

    <title> CONTACT US - QUINTET</title>

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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
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

    <div class="body-content outer-top-bd">
        <div class="" style="  padding: 0;margin-left:50px;margin-right:50px;  ">





            <!-- Required only if you are using hCaptcha or Advanced File Upload. -->
            <script src="https://web3forms.com/client/script.js" async defer></script>

            <div class="header">
                <span>Send us a Message</span>
                <i class='bx bx-envelope' style="font-size: 15px ;color:black ;   margin-left: 10px; "></i>
            </div>
            <div class="wrapper">
                <form action="https://api.web3forms.com/submit" method="POST">
                    <input type="hidden" name="access_key" value="d9e6a827-ddef-4b16-9c77-716c9ff9bb64">
                    <div class="dbl-field">
                        <div class="field">
                            <input type="text" name="First Name" id="fullname" placeholder="Enter your name" required>
                            <i class='bx bx-user'></i>
                        </div>
                        <div class="field">
                            <input type="email" name="email" id="email" placeholder="Enter your email" required>
                            <i class='bx bx-envelope'></i>
                        </div>
                    </div>
                    <!-- Optional: Subject an be prefilled using type="hidden"
       or type="text" for normal user submitted input -->
                    <input type="hidden" name="subject" value="New Submission from Web3Forms">
                    <!-- Optional: From Name you want to see in the email
       Default is "Notifications". you can overwrite here -->
                    <input type="hidden" name="from_name" value="Quintet">
                    <!-- Optional: Default replyto will be "email" field (if available)
       you may overwrite replyto with different email here -->
                    <input type="hidden" name="replyto" value="customer@example.com">
                    <!-- Optional: But Recommended: To Prevent SPAM Submission.
       Make sure its hidden by default -->
                    <input type="checkbox" name="botcheck" class="hidden" style="display: none;">
                    <div class="dbl-field">
                        <div class="field">
                            <input type="text" name="Phone Number" id="phone" placeholder="Enter your phone" required>
                            <i class='bx bx-phone'></i>
                        </div>
                        <div class="field">
                            <input type="text" name="website" id="website" placeholder="Enter your website" required>
                            <i class='bx bx-globe'></i>
                        </div>
                    </div>
                    <div class="message">
                        <textarea placeholder="Write your message" id="message" name="message" required></textarea>
                        <i class="bx bx-message-dots"></i>
                    </div>
                    <!-- Honeypot Spam Protection -->
                    <input type="checkbox" name="botcheck" class="hidden" style="display: none;">
                    <!-- hCaptcha: Recommended for Advanced Spam Protection. -->
                    <div class="h-captcha" data-captcha="true"></div>
                    <!-- Google reCaptcha & Cloudflare Turnstile:
       This feature is available for paid users only -->
                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                    <div class="cf-turnstile" data-sitekey="<YOUR_SITE_KEY>"></div>
                    <div class="button-area">
                        <button type="submit">Send Message</button>
                        <span></span>
                    </div>
                </form>
            </div>
            <script src="https://web3forms.com/client/script.js" async defer></script>
            <script>
            const form = document.getElementById('form');
            const result = document.getElementById('result');
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(form);
                const object = Object.fromEntries(formData);
                const json = JSON.stringify(object);
                result.innerHTML = "Please wait..."
                result.style.fontSize = "20px";
                result.style.color = "black";

                fetch('https://api.web3forms.com/submit', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: json
                    })
                    .then(async (response) => {
                        let json = await response.json();
                        if (response.status == 200) {
                            result.innerHTML = `Form submitted successfully`;
                            result.style.fontSize = "20px";
                            result.style.color = "black";
                        } else {
                            console.log(response);
                            result.innerHTML = json.message;
                            result.style.fontSize = "20px";
                            result.style.color = "red";
                        }
                    })
                    .catch(error => {
                        console.log(error);
                        result.innerHTML = "Something went wrong!";
                    })
                    .then(function() {
                        form.reset();
                        setTimeout(() => {
                            result.style.display = "none";
                        }, 3000);
                    });
            });
            </script>
            <!-- create a new account -->

        </div><!-- /.row -->
    </div>
    </div>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');

    .wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Raleway', sans-serif !important;
        width: 100%;
        background: #fff;
        border-radius: 5px;
    }

    .header {
        display: flex;
        align-items: center;
        width: 200px;
        margin: 0 !important;
        padding: 5px 10px;
        font-size: 12px;
        font-family: 'Raleway', sans-serif;
        font-size: 14px !important;
        color: #000;
        text-transform: uppercase;
        font-weight: 500;
    }

    .wrapper form {
        margin: 35px 30px;
    }

    .wrapper form.disabled {
        pointer-events: none;
        opacity: 0.7;
    }

    form .dbl-field {
        display: flex;
        margin-bottom: 25px;
        justify-content: space-between;
    }

    .dbl-field .field {
        height: 50px;
        display: flex;
        position: relative;
        width: calc(100% / 2 - 13px);
    }

    .wrapper form i {
        position: absolute;
        top: 50%;
        left: 18px;
        color: #555;
        font-size: 17px;
        pointer-events: none;
        transform: translateY(-50%);
    }

    form .field input,
    form .message textarea {
        width: 100%;
        height: 100%;
        outline: none;
        padding: 0 18px 0 48px;
        font-size: 16px;
        border-radius: 0;
        border: 1px solid #555;
    }

    .field input::placeholder,
    .message textarea::placeholder {
        color: #555;
    }

    .field input:focus,
    .message textarea:focus {
        padding-left: 47px;
        border: 2px solid #000;
    }

    .field input:focus~i,
    .message textarea:focus~i {
        color: #000;
    }

    form .message {
        position: relative;
    }

    form .message i {
        top: 30px;
        font-size: 20px;
    }

    form .message textarea {
        min-height: 130px;
        max-height: 230px;
        max-width: 100%;
        min-width: 100%;
        padding: 15px 20px 0 48px;
    }

    form .message textarea::-webkit-scrollbar {
        width: 0px;
    }

    .message textarea:focus {
        padding-top: 14px;
    }

    form .button-area {
        margin: 25px 0;
        display: flex;
        align-items: center;
    }

    .button-area button {
        color: #fff;
        border: none;
        outline: none;
        font-size: 13px;
        cursor: pointer;
        color: #fff;
        padding: 13px 25px;
        background: #000;
        transition: background 0.3s ease;
        border: 1px solid black;
    }

    .button-area button:hover {
        background: #000;
    }

    .button-area span {
        font-size: 17px;
        margin-left: 30px;
        display: none;
    }

    @media (max-width: 600px) {
        .wrapper header {
            text-align: center;
        }

        .wrapper form {
            margin: 35px 20px;
        }

        form .dbl-field {
            flex-direction: column;
            margin-bottom: 0px;
        }

        form .dbl-field .field {
            width: 100%;
            height: 45px;
            margin-bottom: 20px;
        }

        form .message textarea {
            resize: none;
        }

        form .button-area {
            margin-top: 20px;
            flex-direction: column;
        }

        .button-area button {
            width: 100%;
            padding: 11px 0;
            font-size: 16px;
        }

        .button-area span {
            margin: 20px 0 0;
            text-align: center;
        }
    }
    </style>
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