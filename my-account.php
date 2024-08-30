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

    <title>My Account</title>

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

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="assets/images/favicon.ico">
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
    <!-- ============================================== HEADER : END ============================================== -->

    <style>
    .form-group input,
    .form-group textarea {
        border: 2px solid gray !important;
        border-radius: 0 !important;
        border: 2px solid gray;
        font-family: 'Raleway', sans-serif !important;
        font-size: 15px;
        color: #000;
        font-weight: 600;
        text-transform: capitalize;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border: 2px solid black !important;
    }


    .form-group input::placeholder,
    .form-group textarea::placeholder {
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
            <div class="checkout-box inner-bottom-sm">
                <div class="row">
                    <?php include('includes/myaccount-sidebar.php'); ?>
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps">
                            <!-- checkout-step-01  -->
                            <div class="panel  ">

                                <!-- panel-heading -->
                                <div class=""
                                    style="background: transparent !important ; border-bottom:none !important  ; ">
                                    <h4 class="unicase-checkout-title">
                                        <a
                                            style="text-align: left;background: transparent !important ;  font-family: 'Raleway',sans-serif;font-size: 20px !important  ;color: #000;text-transform: capitalize      !important  ;font-weight: 500 !important ;display: flex;align-items: center;justify-content: space-between;border-bottom : 1px solid black; padding-bottom: 20px;">
                                            My Profile - Personal info

                                        </a>
                                    </h4>
                                </div>
                                <!-- panel-heading -->

                                <div>
                                    <!-- panel-body  -->
                                    <div class="row">
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
                                                        <label class="info-title" for="name"
                                                            style="font-family: 'Raleway' , sans-serif !important;font-size: 17px;color: #000; font-weight: 500;text-transform: capitalize; ">Your
                                                            Name</label>
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            value="<?php echo $row['name']; ?>" id="name" name="name"
                                                            required="required">
                                                    </div>



                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1"
                                                            style="font-family: 'Raleway' , sans-serif !important;font-size: 17px;color: #000; font-weight: 500;text-transform: capitalize; ">Your
                                                            Email
                                                            Address
                                                        </label>
                                                        <input type="email"
                                                            class="form-control unicase-form-control text-input"
                                                            id="exampleInputEmail1" value="<?php echo $row['email']; ?>"
                                                            readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="Contact No."
                                                            style="font-family: 'Raleway' , sans-serif !important;font-size: 17px;color: #000; font-weight: 500;text-transform: capitalize; ">
                                                            Your Phone
                                                            Number
                                                        </label>
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            id="contactno" name="contactno" required="required"
                                                            value="<?php echo $row['contactno']; ?>" maxlength="10">
                                                    </div>
                                                    <button type="submit" name="update"
                                                        class="btn-upper btn btn-primary checkout-page-button">Update</button>
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
                                    style="background: transparent !important ;; border-bottom:none !important  ;  ">
                                    <h4 class="unicase-checkout-title">
                                        <a
                                            style="text-align: left;background: transparent !important ;  font-family: 'Raleway',sans-serif;font-size: 20px !important  ;color: #000;text-transform: capitalize      !important  ;font-weight: 500 !important ;display: flex;align-items: center;justify-content: space-between;border-bottom : 1px solid black;padding-bottom: 20px; ">
                                            Change Password


                                        </a>
                                    </h4>
                                </div>
                                <div>
                                    <div class="panel-body"
                                        style="margin: 0 !important ;padding: 20px !important ;display: flex;align-items: center;justify-content: center;  height: 100%;    ">

                                        <form class="register-form" role="form" method="post" name="chngpwd"
                                            onSubmit="return valid();" style="width:100%;  ">
                                            <div class="form-group">
                                                <label class="info-title" for="Current Password"
                                                    style="font-family: 'Raleway' , sans-serif !important;font-size: 17px;color: #000; font-weight: 500;text-transform: capitalize; ">Current
                                                    Password</label>
                                                <input type="password"
                                                    class="form-control unicase-form-control text-input" id="cpass"
                                                    name="cpass" required="required">
                                            </div>



                                            <div class="form-group">
                                                <label class="info-title" for="New Password"
                                                    style="font-family: 'Raleway' , sans-serif !important;font-size: 17px;color: #000; font-weight: 500;text-transform: capitalize; ">New
                                                    Password
                                                </label>
                                                <input type="password"
                                                    class="form-control unicase-form-control text-input" id="newpass"
                                                    name="newpass">
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title" for="Confirm Password"
                                                    style="font-family: 'Raleway' , sans-serif !important;font-size: 17px;color: #000; font-weight: 500;text-transform: capitalize; ">Confirm
                                                    Password
                                                </label>
                                                <input type="password"
                                                    class="form-control unicase-form-control text-input" id="cnfpass"
                                                    name="cnfpass" required="required">
                                            </div>
                                            <button type="submit" name="submit"
                                                class="btn-upper btn btn-primary checkout-page-button">Change </button>
                                        </form>




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