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
    <link rel="shortcut icon" href="assets/images/favicon.ico">
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
                <div class="row ">
                    <?php include('includes/myaccount-sidebar.php'); ?>

                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            <div class="panel  checkout-step-01">

                                <!-- panel-heading -->
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a
                                            style="text-align: left;background: transparent !important ;  font-family: 'Raleway',sans-serif;font-size: 20px !important  ;color: #000;text-transform: uppercase        !important  ;font-weight: 500 !important ;display: flex;align-items: center;justify-content: space-between;border-bottom : 1px solid black; padding-bottom: 20px;  ">
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
                                                    <div class="form-group">
                                                        <label class="info-title" for="Billing Address"
                                                            style="font-family: sans-serif, ' Poppins'!important;font-size: 17px;color: #000;">Billing
                                                            Address</label>
                                                        <textarea class="form-control unicase-form-control text-input"
                                                            name="billingaddress"
                                                            required="required"><?php echo $row['billingAddress']; ?></textarea>
                                                    </div>



                                                    <div class="form-group">
                                                        <label class="info-title" for="Billing State "
                                                            style="font-family: sans-serif, ' Poppins'!important;font-size: 17px;color: #000;">Billing
                                                            State
                                                        </label>
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            id="bilingstate" name="bilingstate"
                                                            value="<?php echo $row['billingState']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="Billing City"
                                                            style="font-family: sans-serif, ' Poppins'!important;font-size: 17px;color: #000;">Billing
                                                            City
                                                        </label>
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            id="billingcity" name="billingcity" required="required"
                                                            value="<?php echo $row['billingCity']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="Billing Pincode"
                                                            style="font-family: sans-serif, ' Poppins'!important;font-size: 17px;color: #000;">Billing
                                                            Pincode
                                                        </label>
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            id="billingpincode" name="billingpincode"
                                                            required="required"
                                                            value="<?php echo $row['billingPincode']; ?>">
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
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a
                                            style="text-align: left;background: transparent !important ;  font-family: 'Raleway',sans-serif;font-size: 20px !important  ;color: #000;text-transform: uppercase       !important  ;font-weight: 500 !important ;display: flex;align-items: center;justify-content: space-between;border-bottom : 1px solid black; padding-bottom: 20px;  ">
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
                                            <div class="form-group">
                                                <label class="info-title" for="Shipping Address"
                                                    style="font-family: sans-serif, ' Poppins'!important;font-size: 17px;color: #000;font-weight: normal !important ; ">Shipping
                                                    Address</label>
                                                <textarea class="form-control unicase-form-control text-input" " name="
                                                    shippingaddress"
                                                    required="required"><?php echo $row['shippingAddress']; ?></textarea>
                                            </div>



                                            <div class="form-group">
                                                <label class="info-title" for="Billing State "
                                                    style="font-family: sans-serif, ' Poppins'!important;font-size: 17px;color: #000;font-weight: normal  !important; ">Shipping
                                                    State
                                                </label>
                                                <input type="text" class="form-control unicase-form-control text-input"
                                                    id="shippingstate" name="shippingstate"
                                                    value="<?php echo $row['shippingState']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title" for="Billing City"
                                                    style="font-family: sans-serif, ' Poppins'!important;font-size: 17px;color: #000;font-weight: normal  !important; ">Shipping
                                                    City
                                                </label>
                                                <input type="text" class="form-control unicase-form-control text-input"
                                                    id="shippingcity" name="shippingcity" required="required"
                                                    value="<?php echo $row['shippingCity']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title" for="Billing Pincode"
                                                    style="font-family: sans-serif, ' Poppins'!important;font-size: 17px;color: #000;font-weight: normal  !important; ">Shipping
                                                    Pincode
                                                </label>
                                                <input type="text" class="form-control unicase-form-control text-input"
                                                    id="shippingpincode" name="shippingpincode" required="required"
                                                    value="<?php echo $row['shippingPincode']; ?>">
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