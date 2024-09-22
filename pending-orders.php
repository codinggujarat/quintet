<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:login.php');
} else {
    if (isset($_GET['id'])) {

        mysqli_query($con, "delete from orders  where userId='" . $_SESSION['id'] . "' and paymentMethod is null and id='" . $_GET['id'] . "' ");;
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

    <title> PENDING ORDER HISTORY - QUINTET</title>
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
    <!-- Demo Purpose Only. Should be removed in production : END -->


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

    <!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
    <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.js"></script>
            <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    <!-- box-icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
        <div>
            <div class="row inner-bottom-sm">
                <?php include('includes/myaccount-sidebar.php'); ?>

                <div class="shopping-cart">
                    <div class="col-md-9 col-sm-12 shopping-cart-table " style="margin-top:10px;">
                        <div class="table-responsive">
                            <form name="cart" method="post" style="padding:20px;">
                                <div class=""
                                    style="background: transparent !important ; border-bottom:none !important  ; ">
                                    <h4 class="unicase-checkout-title">
                                        <a
                                            style="text-align: left;background: transparent !important ;  font-family: 'Poppins',sans-serif !important;font-size: 15px !important  ;color: #000;text-transform:uppercase !important  ;font-weight: 300 !important;display: flex;align-items: center;justify-content: space-between;">
                                            Payment Pending Order
                                        </a>
                                    </h4>
                                </div>
                                <style>
                                .order-tabel {
                                    font-family: 'Raleway', sans-serif !important;
                                    font-size: 12px !important;
                                    color: #000;
                                    text-transform: uppercase;
                                    font-weight: 600;
                                    border: 0 !important;
                                }

                                .shopping-cart-btn {
                                    width: 100% !important;
                                    display: flex !important;
                                    align-items: center !important;
                                    justify-content: space-between !important;
                                    position: fixed !important;
                                    z-index: 99999999 !important;
                                    right: 0 !important;
                                    bottom: 0 !important;
                                }

                                .cart-btns {
                                    position: absolute;
                                    bottom: 0;
                                    width: 100%;
                                    background-color: #F2F3F8 !important;
                                    padding: 0 20px;

                                }
                                </style>


                                <td><?php echo $cnt; ?></td>


                                <div class="shopping-cart-btn">

                                    <div class="cart-btns">
                                        <span class=""
                                            style="font-family: 'Raleway', sans-serif !important;display: flex;align-items: center;justify-content: space-between;   ">
                                            <a href="index.php" class="btn  border-0"
                                                style="border-radius: 0  !important;font-weight: 500 !important;color:white !important ;padding: 10px 20px !important; font-size:15px !important; background: #000 !important;">Continue
                                                Shopping</a>
                                            <button type="submit" name="ordersubmit" class="btn "
                                                style=" border-radius: 0  !important;font-weight: 500 !important;color:white !important ;padding: 10px 20px !important; font-size:15px !important; background: #000 !important;" ">
                                                <a href=" payment-method.php"
                                                style="border-radius: 0  !important;font-weight: 500 !important;color:white !important ;padding: 10px 20px !important; font-size:15px !important; background: #000 !important; ">
                                                Procced To
                                                Payment</a></button>
                                        </span>
                                    </div>
                                </div><!-- /.shopping-cart-btn -->
                                <div class=" mywishlistcards">
                                    <?php $query = mysqli_query($con, "select products.productImageSix as pimg6,products.productName as pname,products.id as c,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,products.shippingCharge as shippingcharge,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as oid from orders join products on orders.productId=products.id where orders.userId='" . $_SESSION['id'] . "' and orders.paymentMethod is null");
                                        $cnt = 1;
                                        $num = mysqli_num_rows($query);
                                        if ($num > 0) {
                                            while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                    <div class=" mywishlistcard">
                                        <style>
                                        .mywishlistcards {
                                            display: grid;
                                            grid-template-columns: repeat(4, 1fr);
                                            grid-auto-rows: auto;
                                            width: 100%;
                                            margin: 0 !important;
                                            padding: 0 !important;
                                        }

                                        @media only screen and (max-width: 1200px) {
                                            .mywishlistcards {
                                                grid-template-columns: repeat(5, 1fr);
                                            }
                                        }

                                        @media only screen and (max-width: 1000px) {
                                            .mywishlistcards {
                                                grid-template-columns: repeat(4, 1fr);
                                            }
                                        }

                                        @media only screen and (max-width: 550px) {

                                            .mywishlistcards {
                                                grid-template-columns: repeat(2, 1fr);
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

                                        .trackorder {
                                            display: flex;
                                            align-items: center;
                                            justify-content: center;
                                            border: 0 !important;
                                            border-top: 1px solid black !important;
                                        }

                                        .col-card {
                                            border: 1px solid black;
                                            width: auto;
                                        }
                                        </style>
                                        <div class="col-card">
                                            <div class="mywishlistcardimage">
                                                <a class="entry-thumbnail"
                                                    href="product-details.php?pid=<?php echo htmlentities($pd = $row['opid']); ?>">
                                                    <img src="admin/productimages/<?php echo $row['opid']; ?>/<?php echo $row['pimg6']; ?>"
                                                        alt="" width="100%" height="100%">
                                                </a>
                                            </div>
                                            <div class="mywishlistcardimage">
                                                <h4 class='cart-product-description'
                                                    style="width: 100%; padding-left:10px;padding-right:10px;">
                                                    <a style=" font-family:'Poppins', sans-serif!important;font-weight: 400 !important;font-size: 15px;"
                                                        href="product-details.php?pid=<?php echo $row['opid']; ?>">
                                                        <?php echo $row['pname']; ?></a>
                                                </h4>
                                            </div>
                                            <div class="mywishlistcardimage">
                                                <h4 class="cart-product-sub-total">
                                                    <span>
                                                        Quantity
                                                    </span>
                                                    <span class="cart-sub-total-price"
                                                        style=" font-weight: 400 !important;font-family: sans-serif, ' Poppins' !important; font-size: 12px;">
                                                        <?php echo $qty = $row['qty']; ?>
                                                    </span>
                                                </h4>
                                                <h4 class="cart-product-sub-total">
                                                    <span>
                                                        Price Per unit
                                                    </span>
                                                    <span class="cart-sub-total-price"
                                                        style=" font-family: sans-serif, ' Poppins' !important; font-size: 12px;">
                                                        <?php echo $price = $row['pprice']; ?>.00</span>
                                                </h4>
                                                <h4 class="cart-product-sub-total">
                                                    <span>
                                                        Shiping Cost
                                                    </span>
                                                    <span class="cart-sub-total-price"
                                                        style=" font-family: sans-serif, ' Poppins' !important; font-size: 12px;">
                                                        <?php echo $shippcharge = $row['shippingcharge']; ?>.00</span>
                                                </h4>
                                                <h4 class="cart-product-sub-total">
                                                    <span>
                                                        total
                                                    </span>
                                                    <span class="cart-sub-total-price"
                                                        style=" font-family: sans-serif, ' Poppins' !important; font-size: 12px;">
                                                        <?php echo (($qty * $price) + $shippcharge); ?>.00</span>

                                                </h4>
                                                <h4 class="cart-product-sub-total">
                                                    <span>
                                                        Payment Method
                                                    </span>
                                                    <span class="cart-sub-total-price"
                                                        style=" font-family: sans-serif, ' Poppins' !important; font-size: 12px;">
                                                        <?php echo $row['paym']; ?></span>

                                                </h4>
                                                <h4 class="cart-product-sub-total">
                                                    <span>
                                                        Order Date
                                                    </span>
                                                    <span class="cart-sub-total-price"
                                                        style=" font-family: sans-serif, ' Poppins' !important; font-size: 12px;">
                                                        <!-- <?php echo $row['odate']; ?> -->
                                                        <?php echo substr(htmlentities($row['odate']), 0, 10); ?>
                                                    </span>
                                                </h4>
                                            </div>
                                            <div class="mywishlistcardimage">
                                                <a href="pending-orders.php?id=<?php echo $row['oid']; ?> "
                                                    class="trackorder"
                                                    style=" border: 1px solid black;  background:#fff ;width: 100%;border-radius: 0 !important ;padding: 10px 20px; font-size: 12px !important ;display: flex;align-items: center;justify-content: center; height: 30px !important ;">
                                                    <i class='bx bx-x'
                                                        style="font-size: 15px; margin-right: 10px;text-align:center; "></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $cnt = $cnt + 1;
                                            } ?>
                                </div>
                                <?php } else { ?>
                                <div class="noFound">
                                    <h4>No Result Found</h4>
                                </div>
                                <style>
                                .noFound {
                                    display: flex !important;
                                    align-items: center !important;
                                    justify-content: center !important;
                                    height: 50vh !important;
                                    width: 100% !important;

                                }

                                .noFound h4 {
                                    font-size: 20px;
                                    color: #000;
                                    font-weight: 300;
                                    font-family: 'Poppins', sans-serif !important;
                                    color: #000 !important;
                                    text-transform: uppercase;
                                }
                                </style>
                                <?php } ?>


                                </tbody><!-- /tbody -->
                                </table><!-- /table -->

                        </div>
                    </div>

                </div><!-- /.shopping-cart -->
            </div> <!-- /.row -->
            </form>
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