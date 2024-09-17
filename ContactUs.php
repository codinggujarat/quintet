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
    <?php include('includes/search.php'); ?>

    <!-- ============================================== HEADER : END ============================================== -->

    <div class="body-content outer-top-bd">
        <div class="" style="  padding: 0;margin-left:50px;margin-right:50px;  ">





            <!-- Required only if you are using hCaptcha or Advanced File Upload. -->
            <script src="https://web3forms.com/client/script.js" async defer></script>
            <style>
                .header {
                    display: flex;
                    width: 100%;
                }

                .header span {
                    font-weight: 300;
                    font-family: 'Poppins', sans-serif;
                    color: #000;
                    display: flex;
                }
            </style>
            <div class="header">
                <span>Send us a Message </span>
                <svg style="margin-left: 10px;" width=" 20px" height="20px" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M3 7.2C3 6.07989 3 5.51984 3.21799 5.09202C3.40973 4.71569 3.71569 4.40973 4.09202 4.21799C4.51984 4 5.0799 4 6.2 4H17.8C18.9201 4 19.4802 4 19.908 4.21799C20.2843 4.40973 20.5903 4.71569 20.782 5.09202C21 5.51984 21 6.0799 21 7.2V20L17.6757 18.3378C17.4237 18.2118 17.2977 18.1488 17.1656 18.1044C17.0484 18.065 16.9277 18.0365 16.8052 18.0193C16.6672 18 16.5263 18 16.2446 18H6.2C5.07989 18 4.51984 18 4.09202 17.782C3.71569 17.5903 3.40973 17.2843 3.21799 16.908C3 16.4802 3 15.9201 3 14.8V7.2Z"
                        stroke="#000000" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
            <div class=" wrapper">
                <form action="https://api.web3forms.com/submit" method="POST" autocomplete="off">
                    <input type="hidden" name="access_key" value="d9e6a827-ddef-4b16-9c77-716c9ff9bb64">
                    <div class="dbl-field">
                        <div class="field input-field-login">
                            <input type="text" name="First Name" id="fullname" required>
                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5 21C5 17.134 8.13401 14 12 14C15.866 14 19 17.134 19 21M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"
                                    stroke="#000000" stroke-width="0.7" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <label>What's Your Name?</label>
                        </div>
                        <div class="field input-field-login">
                            <input type="email" name="email" id="email" required>
                            <svg width="20px" height="20px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"
                                fill="none" stroke="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0.7"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="" stroke-linejoin="" stroke="#CCCCCC"
                                    stroke-width="0.7"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <polygon points="56 20 32 12 8 20 8 52 56 52 56 20"></polygon>
                                    <polyline points="48 28 32 36 16 28"></polyline>
                                </g>
                            </svg>
                            <label>What's Your E-mail?</label>
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
                        <div class="field input-field-login">
                            <input type="text" name="Phone Number" id="phone" required>
                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 5.5C3 14.0604 9.93959 21 18.5 21C18.8862 21 19.2691 20.9859 19.6483 20.9581C20.0834 20.9262 20.3009 20.9103 20.499 20.7963C20.663 20.7019 20.8185 20.5345 20.9007 20.364C21 20.1582 21 19.9181 21 19.438V16.6207C21 16.2169 21 16.015 20.9335 15.842C20.8749 15.6891 20.7795 15.553 20.6559 15.4456C20.516 15.324 20.3262 15.255 19.9468 15.117L16.74 13.9509C16.2985 13.7904 16.0777 13.7101 15.8683 13.7237C15.6836 13.7357 15.5059 13.7988 15.3549 13.9058C15.1837 14.0271 15.0629 14.2285 14.8212 14.6314L14 16C11.3501 14.7999 9.2019 12.6489 8 10L9.36863 9.17882C9.77145 8.93713 9.97286 8.81628 10.0942 8.64506C10.2012 8.49408 10.2643 8.31637 10.2763 8.1317C10.2899 7.92227 10.2096 7.70153 10.0491 7.26005L8.88299 4.05321C8.745 3.67376 8.67601 3.48403 8.55442 3.3441C8.44701 3.22049 8.31089 3.12515 8.15802 3.06645C7.98496 3 7.78308 3 7.37932 3H4.56201C4.08188 3 3.84181 3 3.63598 3.09925C3.4655 3.18146 3.29814 3.33701 3.2037 3.50103C3.08968 3.69907 3.07375 3.91662 3.04189 4.35173C3.01413 4.73086 3 5.11378 3 5.5Z"
                                    stroke="#000000" stroke-width="0.5" stroke-linecap="" stroke-linejoin="" />
                            </svg>
                            <label>Phone Number</label>
                        </div>
                        <div class="field input-field-login">
                            <input type="text" name="website" id="website" required>
                            <svg width="20px" height="20px" viewBox="0 0 192 192" xmlns="http://www.w3.org/2000/svg"
                                style="enable-background:new 0 0 192 192" xml:space="preserve">
                                <path
                                    d="M84 128.6H54.6C36.6 128.6 22 114 22 96c0-9 3.7-17.2 9.6-23.1 5.9-5.9 14.1-9.6 23.1-9.6H84m24 65.3h29.4c9 0 17.2-3.7 23.1-9.6 5.9-5.9 9.6-14.1 9.6-23.1 0-18-14.6-32.6-32.6-32.6H108M67.9 96h56.2"
                                    style="fill:none;stroke:#000000;stroke-width:5;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10" />
                            </svg>
                            <label>website Url</label>
                        </div>
                    </div>
                    <div class="message input-field-login">
                        <textarea id="message" name="message" required></textarea>
                        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3 7.2C3 6.07989 3 5.51984 3.21799 5.09202C3.40973 4.71569 3.71569 4.40973 4.09202 4.21799C4.51984 4 5.0799 4 6.2 4H17.8C18.9201 4 19.4802 4 19.908 4.21799C20.2843 4.40973 20.5903 4.71569 20.782 5.09202C21 5.51984 21 6.0799 21 7.2V20L17.6757 18.3378C17.4237 18.2118 17.2977 18.1488 17.1656 18.1044C17.0484 18.065 16.9277 18.0365 16.8052 18.0193C16.6672 18 16.5263 18 16.2446 18H6.2C5.07989 18 4.51984 18 4.09202 17.782C3.71569 17.5903 3.40973 17.2843 3.21799 16.908C3 16.4802 3 15.9201 3 14.8V7.2Z"
                                stroke="#000000" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <label>message</label>
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
            justify-content: safe;
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
            display: block;
            margin-bottom: 25px;
            justify-content: space-between;
        }

        .dbl-field .field {
            margin-bottom: 20px;
            height: 50px;
            display: flex;
            position: relative;
            width: calc(100%);
        }

        .wrapper form i,
        .wrapper form svg {
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
            border: 0 solid #555;
            border-bottom: 1px solid #555;
        }

        .field input::placeholder,
        .message textarea::placeholder {
            color: #555;
        }

        .field input:focus,
        .message textarea:focus {
            padding-left: 47px;
            border-bottom: 2px solid #555;
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
            font-weight: 100;
            font-size: 20px;
        }

        form .message textarea {
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
            border: none;
            outline: none;
            font-size: 13px;
            cursor: pointer;
            color: #000;
            padding: 13px 25px;
            background: #ffffff;
            transition: background 0.3s ease;
            border: 1px solid black;
        }

        .button-area button:hover {
            background: #fff;
        }

        .button-area span {
            font-size: 17px;
            margin-left: 30px;
            display: none;
        }

        .input-field-login {
            position: relative;
        }



        .input-field-login label {
            position: absolute;
            top: 50%;
            left: 50px;
            transform: translateY(-50%);
            color: #000;
            font-size: 12px;
            pointer-events: none;
            transition: 0.3s;
            text-transform: uppercase;
            font-family: 'Poppins', sans-serif !important;
            font-weight: 200;
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