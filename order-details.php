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

    <title>ORDER DETAILS - QUINTET</title>
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

    <!-- Demo Purpose Only. Should be removed in production -->
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

    <script language="javascript" type="text/javascript">
    var popUpWin = 0;

    function popUpWindow(URLStr, left, top, width, height) {
        if (popUpWin) {
            if (!popUpWin.closed) popUpWin.close();
        }
        popUpWin = open(URLStr, 'popUpWin',
            'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' +
            600 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
    }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="cnt-home">



    <!-- ============================================== HEADER ============================================== -->
    <header class="header-style-1">
        <?php include('includes/top-header.php'); ?>
        <?php include('includes/main-header.php'); ?>
        <?php include('includes/menu-bar.php'); ?>
        <?php include('includes/search.php'); ?>
    </header>

    <!-- ============================================== HEADER : END ============================================== -->


    <div class="body-content outer-top-xs">
        <div class="">
            <div class="row inner-bottom-sm">
                <div class="shopping-cart">
                    <div class="col-md-12 col-sm-12 shopping-cart-table ">
                        <div class="table-responsive">
                            <form name="cart" method="post">
                                <style>
                                @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');
                                </style>
                                <div>
                                    <?php
                                    $orderid = $_POST['orderid'];
                                    $email = $_POST['email'];
                                    $ret = mysqli_query($con, "select t.email,t.id from (select usr.email,odrs.id from users as usr join orders as odrs on usr.id=odrs.userId) as t where  t.email='$email' and (t.id='$orderid')");
                                    $num = mysqli_num_rows($ret);
                                    if ($num > 0) {
                                        $query = mysqli_query($con, "select products.productImage1 as pimg1,products.productName as pname,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid from orders join products on orders.productId=products.id where orders.id='$orderid' and orders.paymentMethod is not null");
                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <div class=" mywishlistcard">

                                        <style>
                                        .mywishlistcards {
                                            display: flex;
                                            align-items: center;
                                            justify-content: start;
                                            flex-wrap: wrap;
                                        }

                                        .mywishlistcard {
                                            border-top: 1px solid black;

                                        }

                                        @media only screen and (max-width: 800px) {
                                            .mywishlistcards {
                                                justify-content: center !important;
                                            }
                                        }

                                        .cart-product-sub-total {
                                            display: flex;
                                            align-items: center;
                                            justify-content: space-between;
                                            padding-left: 10px;
                                            padding-right: 10px;
                                        }

                                        .cart-product-sub-total span {
                                            font-size: 12px;
                                            text-transform: uppercase;
                                            font-family: 'Poppins', sans-serif !important;
                                            font-weight: 400 !important;
                                            color: #000 !important;
                                        }

                                        .mywishlistcardimage {
                                            width: 100% !important;
                                            height: 100% !important;
                                            background: white !important;
                                            object-fit: cover;
                                        }

                                        .mywishlistcardimage .entry-thumbnail img {
                                            border-bottom: 1px solid black;
                                        }

                                        .trackorder {
                                            display: flex;
                                            align-items: center;
                                            justify-content: center;
                                            text-transform: uppercase;
                                            border: 0 !important;
                                            border-top: 1px solid black !important;
                                        }

                                        .col-card {
                                            border: 1px solid black;
                                            width: 300px;
                                        }

                                        .name {
                                            width: 80% !important;
                                            overflow: hidden !important;
                                            text-overflow: ellipsis !important;
                                            white-space: nowrap !important;
                                        }

                                        @media only screen and (max-width: 800px) {
                                            .col-card {
                                                border: 1px solid black;
                                                width: 200px;
                                            }

                                        }

                                        @media only screen and (max-width: 500px) {
                                            .col-card {
                                                border: 1px solid black;
                                                width: 100%;
                                            }

                                            .mywishlistcards {
                                                margin: 0;
                                                padding: 20px;
                                                width: 100%;
                                                justify-content: center;
                                            }

                                            .mywishlistcard {
                                                margin: 0;
                                                padding: 0;
                                            }
                                        }
                                        </style>
                                        <div class="col-card">
                                            <div class="mywishlistcardimage">
                                                <a class="entry-thumbnail"
                                                    href="product-details.php?pid=<?php echo $row['opid']; ?>">
                                                    <img src="admin/productimages/<?php echo $row['opid']; ?>/<?php echo $row['pimg1']; ?>"
                                                        alt="" width="100%" height="100%">
                                                </a>
                                            </div>
                                            <div class="mywishlistcardimage">
                                                <h4 class='cart-product-description' style="width: 120px; "><a
                                                        style=" font-family: sans-serif, ' Poppins' !important;font-size: 12px;"
                                                        href="product-details.php?pid=<?php echo $row['opid']; ?>">
                                                        <?php echo $row['pname']; ?></a></h4>
                                            </div>
                                            <div class="mywishlistcardimage">

                                            </div>
                                            <div class="mywishlistcardimage">
                                                <h4 class="cart-product-sub-total">
                                                    <span>Quantity</span>
                                                    <span
                                                        style=" font-family: sans-serif, ' Poppins' !important; font-size: 12px;">
                                                        <?php echo $qty = $row['qty']; ?></span>
                                                </h4>
                                                <h4 class="cart-product-sub-total">
                                                    <span>Price Per unit
                                                    </span>
                                                    <span
                                                        style=" font-family: sans-serif, ' Poppins' !important; font-size: 12px;">
                                                        <?php echo $price = $row['pprice']; ?></span>
                                                </h4>
                                                <h4 class="cart-product-sub-total">
                                                    <span>Total
                                                    </span>
                                                    <span
                                                        style=" font-family: sans-serif, ' Poppins' !important; font-size: 12px;">
                                                        <?php echo $qty * $price; ?></span>
                                                </h4>
                                                <h4 class="cart-product-sub-total">
                                                    <span>Payment Method
                                                    </span>
                                                    <span
                                                        style=" font-family: sans-serif, ' Poppins' !important; font-size: 12px;">
                                                        <?php echo $row['paym']; ?></span>
                                                </h4>
                                                <h4 class="cart-product-sub-total">
                                                    <span>Order Date
                                                    </span>
                                                    <span
                                                        style=" font-family: sans-serif, ' Poppins' !important; font-size: 12px;">
                                                        <?php echo $row['odate']; ?></span>
                                                </h4>
                                            </div>

                                            <div class="mywishlistcardimage">
                                                <a href="javascript:void(0);"
                                                    onClick="popUpWindow('track-order.php?oid=<?php echo htmlentities($row['orderid']); ?>');"
                                                    title="Track order" class="trackorder"
                                                    style="border: 1px solid black;  background:#fff ;width: 100%;border-radius: 0 !important ;padding: 10px 20px; font-size: 12px !important ;display: flex;align-items: center;justify-content: center; height: 30px !important ;">
                                                    <span>Track order</span>
                                                    <i class='bx bx-right-top-arrow-circle'
                                                        style="font-size: 15px; margin-left: 10px;"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $cnt = $cnt + 1;
                                        }
                                    } else { ?>
                                    <div class="noFound" style="
                                        display: flex !important;
                                        align-items: center !important;
                                        justify-content: center !important;
                                        height: 50vh !important;
                                        width: 100% !important;
                                        font-family: 'Raleway', sans-serif !important;
                                        color: #000 !important;
                                  ">
                                        <h4>
                                            Either order id or Registered email id is invalid
                                        </h4>
                                    </div>

                                    <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.container -->
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