<?php
session_start();
error_reporting(0);
include('includes/config.php');
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

    <title> ORDER TRACK | QUINTET</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/green.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <link href="assets/css/lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/rateit.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/css/config.css">
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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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

    <div class="body-content outer-top-bd">
        <div class="" style="  padding: 0;margin-left:50px;margin-right:50px;  "><?php include('includes/myaccount-sidebar.php');
                                                                                    ?><div class="track-order-page ">
                <div class="row">
                    <div class="col-md-8 myprofile">
                        <form class=" register-form  " style=" width: 600px; padding:20px;" role=" form" method="post"
                            action="order-details.php">
                            <h2
                                style="margin-bottom: 20px; text-align: left ;text-transform:uppercase; font-family: 'Poppins', sans-serif !important;font-size:15px !important ;color: #000; font-weight: 400 ;    ">
                                Track your Order</h2>
                            <span class="title-tag    "
                                style="text-align: left;   font-family: 'Poppins',sans-serif; font-size: 11px;color: #000; text-transform: uppercase  ;font-weight: 400;  ">Please
                                enter your Order ID in the box below and press Enter. This was given to you on your
                                receipt and in the confirmation email you should have received. </span><span
                                class="title-tag inner-top-vs inner-bottom-20   "
                                style="text-align: left;   font-family: 'Poppins',sans-serif; font-size: 11px;color: #000; text-transform: uppercase  ;font-weight: 400;  ">Please
                                Enter your order number and Email to find your order</span>
                            <div class="form-group input-field"><input type="text"
                                    class="form-control unicase-form-control text-input " name="orderid"
                                    id="exampleOrderId1" required><label>What's your order number
                                </label></div>
                            <div class=" form-group input-field"><input type="email"
                                    class="form-control unicase-form-control text-input" name="email"
                                    id="exampleBillingEmail1" required><label>What's your Registered e-mail?
                                </label></div><button type="submit" name="submit"
                                class="btn-upper btn btn-primary checkout-page-button col-sm-12 ">Find your order
                            </button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.sigin-in-->
        </div>
    </div>
    <!--==============================================BRANDS CAROUSEL==============================================--><?php echo include('includes/brands-slider.php');
                                                                                                                        ?><?php include('includes/footer.php');

                                                                                                                            ?>
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
    < !-- For demo purposes – can be removed on production -->
        <script src="switchstylesheet/switchstylesheet.js"></script>
        <script>
        $(document).ready(function() {
                $(".changecolor").switchstylesheet({
                        seperator: "color"
                    }

                );

                $('.show-theme-options').click(function() {
                        $(this).parent().toggleClass('open');
                        return false;
                    }

                );
            }

        );

        $(window).bind("load", function() {
                $('.show-theme-options').delay(2000).trigger('click');
            }

        );
        </script>
        < !-- For demo purposes – can be removed on production : End -->
</body>

</html>