<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:.php');
} else {
    // code for billing address updation
    if (isset($_POST['update'])) {
        $baddress = $_POST['billingaddress'];
        $bstate = $_POST['bilingstate'];
        $bcity = $_POST['billingcity'];
        $bpincode = $_POST['billingpincode'];
        $query = mysqli_query($con, "update users set billingAddress='$baddress',billingState='$bstate',billingCity='$bcity',billingPincode='$bpincode' where id='" . $_SESSION['id'] . "'");
        if ($query) {
            echo "<script>alert('Billing Address has been updated');</script>";
        }
    }


    // code for Shipping address updation
    if (isset($_POST['shipupdate'])) {
        $saddress = $_POST['shippingaddress'];
        $sstate = $_POST['shippingstate'];
        $scity = $_POST['shippingcity'];
        $spincode = $_POST['shippingpincode'];
        $query = mysqli_query($con, "update users set shippingAddress='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPincode='$spincode' where id='" . $_SESSION['id'] . "'");
        if ($query) {
            echo "<script>alert('Shipping Address has been updated');</script>";
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
    <!-- box-icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
    <link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
    <link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
    <link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
    <link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">
    <!-- Favicon -->
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
                <div class="row ">
                    <?php include('includes/myaccount-sidebar.php'); ?>

                    <div class="col-md-9 myprofile">
                        <style>
                        .myprofile {
                            display: flex;
                            align-items: center;
                            justify-content: start;
                        }


                        .myprofilecard {
                            width: 800px;
                            padding: 20px;
                            margin-top: 1%;
                        }

                        @media only screen and (max-width: 500px) {
                            .myprofilecard {
                                width: 100%;
                                padding: 0;
                                margin-top: 0;
                            }
                        }

                        .input-field {
                            position: relative;
                        }



                        .input-field label {
                            position: absolute;
                            top: 50%;
                            left: 15px;
                            transform: translateY(-50%);
                            color: #000;
                            text-transform: uppercase;
                            font-size: 15px;
                            pointer-events: none;
                            transition: 0.3s;
                            font-family: 'Poppins', sans-serif !important;
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
                        <div class="panel-group checkout-steps myprofilecard">
                            <!-- checkout-step-01  -->
                            <div class="panel  checkout-step-01">

                                <!-- panel-heading -->
                                <div class="" style="margin-bottom: 20px;">
                                    <h4 class="unicase-checkout-title">
                                        <a
                                            style="text-align: left;background: transparent !important ;  font-family: 'Poppins',sans-serif !important;font-size: 15px !important  ;color: #000;text-transform:uppercase      !important  ;font-weight: 400 !important ;display: flex;align-items: center;justify-content: space-between;">
                                            Billing Address
                                        </a>
                                    </h4>
                                </div>

                                <!-- panel-heading -->

                                <div>

                                    <!-- panel-body  -->
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 already-registered-login">
                                            <div class="panel-body"
                                                style="margin: 0 !important ;padding: 0px !important ;  display: flex;align-items: center;justify-content: center;  height: 100%; ">

                                                <?php
                                                    $query = mysqli_query($con, "select * from users where id='" . $_SESSION['id'] . "'");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                    ?>

                                                <form class="register-form" role="form" method="post"
                                                    style="width: 100%; ">

                                                    <div class="input-field form-group">
                                                        <textarea class="form-control unicase-form-control text-input"
                                                            name="billingaddress" required
                                                            value="<?php echo $row['name']; ?>" id="name" name="name"
                                                            required="required"><?php echo $row['billingAddress']; ?></textarea>
                                                        <label>
                                                            Billing Address
                                                        </label>
                                                    </div>


                                                    <div class="form-group input-field">
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            id="bilingstate" name="bilingstate"
                                                            value="<?php echo $row['billingState']; ?>" required>
                                                        <label>
                                                            Billing State
                                                        </label>
                                                    </div>
                                                    <div class="form-group input-field">
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            id="billingcity" name="billingcity" required="required"
                                                            value="<?php echo $row['billingCity']; ?>">
                                                        <label>
                                                            Billing City
                                                        </label>
                                                    </div>
                                                    <div class="form-group input-field">
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            id="billingpincode" name="billingpincode"
                                                            required="required"
                                                            value="<?php echo $row['billingPincode']; ?>">
                                                        <label>
                                                            Billing Pincode
                                                        </label>
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
                            <div class="panel  ">
                                <div class="" style="margin-bottom: 20px;">
                                    <h4 class="unicase-checkout-title">
                                        <a
                                            style="text-align: left;background: transparent !important ;  font-family: 'Poppins',sans-serif !important;font-size: 15px !important  ;color: #000;text-transform:uppercase      !important  ;font-weight: 400 !important ;display: flex;align-items: center;justify-content: space-between;">
                                            Shipping Address

                                        </a>
                                    </h4>
                                </div>
                                <div>
                                    <div class="panel-body"
                                        style="margin: 0 !important ;padding: 0px !important ;  display: flex;align-items: center;justify-content: center;  height: 100%; ">

                                        <?php
                                            $query = mysqli_query($con, "select * from users where id='" . $_SESSION['id'] . "'");
                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>

                                        <form class="register-form" role="form" method="post" style="width: 100%; ">
                                            <div class="form-group input-field">
                                                <textarea class="form-control unicase-form-control text-input"
                                                    name="shippingaddress"
                                                    required="required"><?php echo $row['shippingAddress']; ?></textarea>
                                                <label>
                                                    Shipping
                                                    Address
                                                </label>
                                            </div>
                                            <div class="form-group input-field">
                                                <input type="text" class="form-control unicase-form-control text-input"
                                                    id="shippingstate" name="shippingstate"
                                                    value="<?php echo $row['shippingState']; ?>" required>
                                                <label>Shipping
                                                    State
                                                </label>
                                            </div>
                                            <div class="form-group input-field">
                                                <input type="text" class="form-control unicase-form-control text-input"
                                                    id="shippingcity" name="shippingcity" required="required"
                                                    value="<?php echo $row['shippingCity']; ?>">
                                                <label>Shipping
                                                    City
                                                </label>
                                            </div>
                                            <div class="form-group input-field">
                                                <input type="text" class="form-control unicase-form-control text-input"
                                                    id="shippingpincode" name="shippingpincode" required="required"
                                                    value="<?php echo $row['shippingPincode']; ?>">
                                                <label>Shipping
                                                    Pincode
                                                </label>
                                            </div>


                                            <button type="submit" name="shipupdate"
                                                class="btn-upper btn btn-primary checkout-page-button">Update</button>
                                        </form>
                                        <?php } ?>




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