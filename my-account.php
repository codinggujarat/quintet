<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:login.php');
} else {
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $contactno = $_POST['contactno'];
        $query = mysqli_query($con, "update users set name='$name',contactno='$contactno' where id='" . $_SESSION['id'] . "'");
        if ($query) {
            echo "<script>alert('Your info has been updated');</script>";
        }
    }


    date_default_timezone_set('Asia/Kolkata'); // change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());


    if (isset($_POST['submit'])) {
        $sql = mysqli_query($con, "SELECT password FROM  users where password='" . md5($_POST['cpass']) . "' && id='" . $_SESSION['id'] . "'");
        $num = mysqli_fetch_array($sql);
        if ($num > 0) {
            $con = mysqli_query($con, "update students set password='" . md5($_POST['newpass']) . "', updationDate='$currentTime' where id='" . $_SESSION['id'] . "'");
            echo "<script>alert('Password Changed Successfully !!');</script>";
        } else {
            echo "<script>alert('Current Password not match !!');</script>";
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

    <title>MY PROFILE - QUINTET</title>

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
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- box-icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">
    <!-- Favicon -->
    <script type="text/javascript">
    function valid() {
        if (document.chngpwd.cpass.value == "") {
            alert("Current Password Filed is Empty !!");
            document.chngpwd.cpass.focus();
            return false;
        } else if (document.chngpwd.newpass.value == "") {
            alert("New Password Filed is Empty !!");
            document.chngpwd.newpass.focus();
            return false;
        } else if (document.chngpwd.cnfpass.value == "") {
            alert("Confirm Password Filed is Empty !!");
            document.chngpwd.cnfpass.focus();
            return false;
        } else if (document.chngpwd.newpass.value != document.chngpwd.cnfpass.value) {
            alert("Password and Confirm Password Field do not match  !!");
            document.chngpwd.cnfpass.focus();
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
        <div>
            <div class="checkout-box inner-bottom-sm">
                <div class="row">
                    <?php include('includes/myaccount-sidebar.php'); ?>
                    <div class="col-md-8 col-sm-12 col-xs-12 myprofile">

                        <div class="panel-group checkout-steps myprofilecard">
                            <!-- checkout-step-01  -->
                            <div class="panel">
                                <!-- panel-heading -->
                                <div class=""
                                    style="background: transparent !important ; border-bottom:0 !important  ; ">
                                    <h4 class="unicase-checkout-title">
                                        <a
                                            style="text-align: left;background: transparent !important ;  font-family: 'Poppins',sans-serif !important;font-size: 15px !important  ;color: #000;text-transform:uppercase !important  ;font-weight: 400 !important;display: flex;align-items: center;justify-content: space-between;">
                                            Account Details
                                        </a>
                                    </h4>
                                </div>
                                <!-- panel-heading -->

                                <div>

                                    <!-- panel-body  -->
                                    <div class=" row">
                                        <div class="col-md-12 col-sm-12 already-registered-login">
                                            <div class="panel-body"
                                                style="margin: 0 !important ;padding: 20px !important ;  display: flex;align-items: center;justify-content: center;  height: 100%;  ">


                                                <?php
                                                    $query = mysqli_query($con, "select * from users where id='" . $_SESSION['id'] . "'");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                    ?>

                                                <form class="register-form" role="form" method="post"
                                                    style="width:100%;  ">
                                                    <div class="form-group">
                                                        <div class="input-field form-group">
                                                            <input type="text"
                                                                class="form-control unicase-form-control text-input"
                                                                required value="<?php echo $row['name']; ?>" id="name"
                                                                name="name" required="required">
                                                            <label>Your
                                                                Name</label>
                                                        </div>
                                                    </div>



                                                    <div class="form-group">
                                                        <div class="input-field form-group noallowtochage">
                                                            <input type="text"
                                                                class="form-control unicase-form-control text-input"
                                                                id="exampleInputEmail1"
                                                                value="<?php echo $row['email']; ?>">
                                                            <label>E-mail</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-field form-group ">
                                                            <input type="text"
                                                                class="form-control unicase-form-control text-input "
                                                                id=" contactno" name="contactno" required="required"
                                                                value="<?php echo $row['contactno']; ?>" maxlength="10">
                                                            <label>Phone
                                                                Number</label>
                                                        </div>
                                                    </div>
                                                    <button type="submit" name="update"
                                                        class="btn-upper btn btn-primary checkout-page-button">Save</button>
                                                </form>
                                                <?php } ?>
                                            </div>
                                            <!-- already-registered-login -->

                                        </div>
                                    </div>
                                    <!-- panel-body  -->

                                </div><!-- row -->
                            </div>
                            <!-- checkout-step-01  -->
                            <!-- checkout-step-02  -->
                            <div class="panel  checkout-step-02">
                                <div class=""
                                    style="background: transparent !important ; border-bottom:none !important  ;  ">
                                    <h4 class="unicase-checkout-title">
                                        <a
                                            style="text-align: left;background: transparent !important ;  font-family: 'Poppins',sans-serif !important;font-size: 15px !important  ;color: #000;text-transform:uppercase !important  ;font-weight: 400 !important;display: flex;align-items: center;justify-content: space-between;">
                                            Change Password </a>
                                    </h4>
                                </div>
                                <div>
                                    <div class="panel-body"
                                        style="margin: 0 !important ;padding: 20px !important ;display: flex;align-items: center;justify-content: center;  height: 100%;    ">

                                        <form class="register-form" role="form" method="post" name="chngpwd"
                                            onSubmit="return valid();" style="width:100%;  ">

                                            <div class="form-group">
                                                <div class="input-field form-group">
                                                    <input type="password"
                                                        class="form-control unicase-form-control text-input password"
                                                        required id="cpass" name="cpass" required="required">
                                                    <label>
                                                        Current Password
                                                    </label>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <div class="input-field form-group">
                                                    <input type="password"
                                                        class="form-control unicase-form-control text-input password"
                                                        required id="newpass" name="newpass" required="required">
                                                    <label>
                                                        New Password
                                                    </label>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <div class="input-field form-group">
                                                    <input type="password"
                                                        class="form-control unicase-form-control text-input password"
                                                        required id="cnfpass" name="cnfpass" required="required">
                                                    <label>
                                                        Confirm Password
                                                    </label>
                                                </div>
                                            </div>
                                            <span class="checkbox">
                                                <input type="checkbox" id="checks" class="eye-icon" />
                                                <label for="checks">Show Password</label>
                                            </span>
                                            <button type="submit" name="submit"
                                                class="btn-upper btn btn-primary checkout-page-button">
                                                save
                                            </button>
                                        </form>
                                        <style>
                                        .checkbox {
                                            display: flex;
                                            align-items: center;
                                            justify-content: space-between;
                                        }

                                        .checkbox input {
                                            height: 16px;
                                            width: 16px;
                                            accent-color: #000;

                                        }

                                        .checkbox label {
                                            font-size: 15px;
                                            color: #000;
                                            margin-left: 20px;
                                            margin-top: 5px;
                                            font-weight: 400;
                                            font-family: 'Poppins', sans-serif !important;

                                        }

                                        .radio {
                                            width: 100%;
                                            display: flex;
                                            align-items: center;
                                            justify-content: end;
                                        }
                                        </style>
                                        <script>
                                        const container = document.querySelector(".container"),
                                            pwFields = document.querySelectorAll(".password"),
                                            signUp = document.querySelector(".signup-link"),
                                            login = document.querySelector(".login-link");





                                        const forms = document.querySelector(".forms"),
                                            pwShowHide = document.querySelectorAll(".eye-icon");
                                        pwShowHide.forEach(eyeIcon => {
                                            eyeIcon.addEventListener("click", () => {
                                                let pwFields = eyeIcon.parentElement.parentElement
                                                    .querySelectorAll(".password");

                                                pwFields.forEach(password => {
                                                    if (password.type === "password") {
                                                        password.type = "text";
                                                        eyeIcon.classList.replace("bx-hide",
                                                            "bx-show");
                                                        return;
                                                    }
                                                    password.type = "password";
                                                    eyeIcon.classList.replace("bx-show",
                                                        "bx-hide");
                                                })

                                            })
                                        })
                                        </script>



                                    </div>
                                </div>
                            </div>
                            <!-- checkout-step-02  -->

                        </div><!-- /.checkout-steps -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->

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
</body>

</html>
<?php } ?>