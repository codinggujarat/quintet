<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:login.php');
} else {
    if (isset($_POST['submit'])) {

        mysqli_query($con, "update orders set 	paymentMethod='" . $_POST['paymethod'] . "' where userId='" . $_SESSION['id'] . "' and paymentMethod is null ");
        unset($_SESSION['cart']);
        header('location:order-history.php');
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

    <title> PAYMENT - QUINTET </title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/green.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
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
    <!-- box-icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- box-icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="cnt-home">


    <header class="header-style-1">
        <?php include('includes/top-header.php'); ?>
        <?php include('includes/main-header.php'); ?>
        <?php include('includes/menu-bar.php'); ?>
        <?php include('includes/search.php'); ?>

    </header>


    <div class="body-content outer-top-bd m-t-20 ">
        <div class="" style="  padding: 0;margin-left:50px;margin-right:50px;  ">
            <div class="checkout-box faq-page inner-bottom-sm">
                <div class="row">
                    <div class="col-md-12">
                        <h2
                            style="text-align: left; font-family: 'Raleway',sans-serif;font-size: 15px;color: #000;text-transform: uppercase ;font-weight: 600 !important ;    ">
                            Choose Payment Method</h2>
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01" style="border:none;">

                                <!-- panel-heading -->

                                <!-- panel-heading -->
                                <style>
                                </style>
                                <div id="collapseOne" class="panel-collapse collapse in"
                                    style="display: flex;align-items: center;justify-content: center;   ">
                                    <!-- panel-body  -->
                                    <div class="panel-body">
                                        <form name="payment" method="post" class="col-lg-12 col-md-12 col-sm-12"
                                            style="width:500px; padding: 50px;   ">
                                            <div class="card">
                                                <div class="content">
                                                    <input type="radio" name="paymethod" id="one" checked="checked"
                                                        value="COD">
                                                    <input type="radio" name="paymethod" id="two"
                                                        value="Internet Banking">
                                                    <!-- <input type="radio" name="paymethod" id="three"
                                                        value="Debit / Credit card"> -->
                                                    <label for="one" class="box first">
                                                        <div class="plan">
                                                            <span class="circle"></span>
                                                            <span class="yearly"
                                                                style="text-transform: uppercase;font-family: 'Raleway',sans-serif; ">cash
                                                                on delivery</span>
                                                        </div>
                                                    </label>
                                                    <label for="two" class="box second">
                                                        <div class="plan">
                                                            <span class="circle"></span>
                                                            <span class="yearly"
                                                                style="text-transform: uppercase; font-family: 'Raleway',sans-serif;">Internet
                                                                Banking</span>
                                                        </div>
                                                    </label>
                                                    <!-- <label for="three" class="box third">
                                                        <div class="plan">
                                                            <span class="circle"></span>
                                                            <span class="yearly"
                                                                style="text-transform: uppercase; font-family: 'Raleway',sans-serif;">Debit
                                                                / Credit card
                                                            </span>
                                                        </div>
                                                    </label> -->
                                                </div>
                                            </div>
                                            <input type="submit" value="submit" name="submit" class="btn btn-primary">
                                            <style>
                                            .btn-primary {
                                                background: #F2F3F8 !important;
                                                width: 100% !important;
                                                color: #000 !important;
                                                height: 50px !important;
                                                font-size: 20px !important;
                                                border-radius: 0 !important;
                                                font-family: 'Raleway', sans-serif !important;
                                                font-weight: 400 !important;
                                            }

                                            .btn-primary:hover {
                                                color: #000 !important;
                                                border: 1px solid black !important;
                                            }
                                            </style>
                                        </form>

                                        <style>
                                        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');





                                        .card label.box {
                                            background: white;
                                            margin-top: 12px;
                                            padding: 18px 12px;
                                            display: flex;
                                            border-radius: 5px;
                                            border: 2px solid lightgray;
                                            cursor: pointer;
                                            transition: all 0.25s ease;
                                        }

                                        #one:checked~label.first,
                                        #two:checked~label.second,
                                        #three:checked~label.third {
                                            border-color: black;
                                            background: whitesmoke;
                                        }

                                        .card label.box:hover {
                                            background: whitesmoke;
                                        }

                                        .card label.box .circle {
                                            height: 22px;
                                            width: 22px;
                                            background: #ccc;
                                            border: 5px solid transparent;
                                            display: inline-block;
                                            margin-right: 15px;
                                            border-radius: 50%;
                                            transition: all 0.25s ease;
                                            box-shadow: inset -4px -4px 10px rgba(0, 0, 0, 0.2);
                                        }

                                        #one:checked~label.first .circle,
                                        #two:checked~label.second .circle,
                                        #three:checked~label.third .circle {
                                            border-color: black;
                                            background: #fff;

                                        }

                                        .card label.box .plan {
                                            display: flex;
                                            width: 100%;
                                            align-items: center;
                                        }

                                        .card input[type="radio"] {
                                            display: none;
                                        }
                                        </style>
                                    </div>
                                    <!-- panel-body  -->

                                </div><!-- row -->
                            </div>
                            <!-- checkout-step-01  -->


                        </div><!-- /.checkout-steps -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
    <?php echo include('includes/brands-slider.php'); ?>
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
<?php } ?>