<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_GET['action']) && $_GET['action'] == "add") {
    $id = intval($_GET['id']);
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $sql_p = "SELECT * FROM products WHERE id={$id}";
        $query_p = mysqli_query($con, $sql_p);
        if (mysqli_num_rows($query_p) != 0) {
            $row_p = mysqli_fetch_array($query_p);
            $_SESSION['cart'][$row_p['id']] = array("quantity" => 1, "price" => $row_p['productPrice']);
        } else {
            $message = "Product ID is invalid";
        }
    }
    echo "<script>alert('Product has been added to the cart')</script>";
    echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
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

    <title>Shopping Portal Home Page</title>

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
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body class="cnt-home">



    <!-- ============================================== HEADER ============================================== -->
    <header class="header-style-1">
        <?php include('includes/top-header.php'); ?>
        <?php include('includes/main-header.php'); ?>
        <?php include('includes/menu-bar.php'); ?>
    </header>

    <!-- ============================================== HEADER : END ============================================== -->
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="furniture-container homepage-container">
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
                        <!-- ================================== TOP NAVIGATION ================================== -->
                        <?php include('includes/side-menu.php'); ?>
                        <!-- ================================== TOP NAVIGATION : END ================================== -->
                    </div><!-- /.sidemenu-holder -->

                    <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                        <!-- ========================================== SECTION – HERO ========================================= -->
                        <style>
                        #owl-main .owl-pagination {
                            background: transparent !important;
                            bottom: -20px !important;
                            padding: 5px !important;
                        }

                        #owl-main .owl-inner-pagination.owl-ui-md .owl-prev,
                        #owl-main .owl-inner-pagination.owl-ui-md .owl-next {
                            background: black !important;
                        }

                        #owl-main .owl-prev,
                        #owl-main .owl-next {
                            background: transparent !important;
                            font-size: 50px !important;
                        }

                        .owl-carousel .owl-prev::before,
                        .owl-carousel .owl-next::before {
                            background: #F2F3F8 !important;
                            padding: 3px 10px !important;
                            border-radius: 50px !important;
                            position: absolute !important;
                            top: -3px !important;
                            color: #000 !important;
                            border: 1px solid black;
                            z-index: 9999999999999;
                            left: -3px !important;
                        }
                        </style>
                        <div id="hero" class="homepage-slider3">
                            <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                                <div class="full-width-slider">
                                    <div class="item" style="background-image: url(assets/images/sliders/slider1.png);">
                                        <!-- /.container-fluid -->
                                    </div><!-- /.item -->
                                </div><!-- /.full-width-slider -->

                                <div class="full-width-slider">
                                    <div class="item full-width-slider"
                                        style="background-image: url(assets/images/sliders/slider2.jpg);">
                                    </div><!-- /.item -->
                                </div><!-- /.full-width-slider -->

                                <div class="full-width-slider">
                                    <div class="item full-width-slider"
                                        style="background-image: url(assets/images/sliders/slider3.jpeg);">
                                    </div><!-- /.item -->
                                </div><!-- /.full-width-slider -->

                                <div class="full-width-slider">
                                    <div class="item full-width-slider"
                                        style="background-image: url(assets/images/sliders/slider4.jpeg);">
                                    </div><!-- /.item -->
                                </div><!-- /.full-width-slider -->

                            </div><!-- /.owl-carousel -->
                        </div>

                        <!-- ========================================= SECTION – HERO : END ========================================= -->
                        <!-- ============================================== INFO BOXES ============================================== -->
                        <div class="info-boxes wow fadeInUp">
                            <div class="info-boxes-inner">
                                <div class="row">
                                    <div class="col-md-6 col-sm-4 col-lg-4 ">
                                        <div class="info-box" style="box-shadow: 0 !important;border:none !important;">
                                            <div class=" row" style="text-align: left;">
                                                <div class=" col-xs-12">
                                                    <i class="icon fa fa-dollar" style="color: #000;"></i>
                                                </div>
                                                <div class="col-xs-12">
                                                    <h4 class="info-box-heading green"
                                                        style="font-family: 'Raleway' , sans-serif !important;font-size:25px;color: #000; font-weight: 300; ">
                                                        money
                                                        back</h4>
                                                </div>
                                            </div>
                                            <h6 class="text"
                                                style="font-family: sans-serif, 'Poppins' !important;color: #000; ">30
                                                Day Money Back Guarantee.</h6>
                                        </div>
                                    </div><!-- .col -->

                                    <div class="hidden-md col-sm-4 col-lg-4">
                                        <div class="info-box" style="box-shadow: 0 !important;border:none !important;">
                                            <div class="row" style="text-align: left;">
                                                <div class="col-xs-12">
                                                    <i class="icon fa fa-truck" style="color: #000;"></i>
                                                </div>
                                                <div class="col-xs-12">
                                                    <h4 class="info-box-heading orange"
                                                        style="font-family: 'Raleway' , sans-serif !important;font-size:25px;color: #000; font-weight: 300;">
                                                        free shipping</h4>
                                                </div>
                                            </div>
                                            <h6 class="text" style="font-family: sans-serif, 'Poppins' !important;">
                                                free ship-on oder Rs. 600.00</h6>
                                        </div>
                                    </div><!-- .col -->

                                    <div class="col-md-6 col-sm-4 col-lg-4">
                                        <div class="info-box" style="box-shadow: 0 !important;border:none !important;">
                                            <div class="row" style="text-align: left;">
                                                <div class="col-xs-12">
                                                    <i class="icon fa fa-gift" style="color: #000;"></i>
                                                </div>
                                                <div class="col-xs-12">
                                                    <h4 class="info-box-heading red"
                                                        style="font-family: 'Raleway' , sans-serif !important;font-size:25px;color: #000; font-weight: 300;">
                                                        Special Sale</h4>
                                                </div>
                                            </div>
                                            <h6 class="text" style="font-family: sans-serif, 'Poppins' !important;">
                                                All items-sale up to 20% off </h6>
                                        </div>
                                    </div><!-- .col -->
                                </div><!-- /.row -->
                            </div><!-- /.info-boxes-inner -->

                        </div><!-- /.info-boxes -->
                        <!-- ============================================== INFO BOXES : END ============================================== -->
                    </div><!-- /.homebanner-holder -->

                </div><!-- /.row -->
                <style>
                @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');
                </style>
                <!-- ============================================== SCROLL TABS ============================================== -->
                <div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp "
                    style="border: 0 !important ; ">
                    <div class="more-info-tab clearfix"
                        style="margin-top: 40px;border : 0 !important ;display: block !important ; overflow-x: auto !important ;   ">
                        <h3 class="new-product-title pull-left "
                            style="font-family: 'Raleway' , sans-serif;font-size:30px;font-weight:300 !important ;color: #000;border: 0 !important ;    ">
                            Featured Products
                        </h3>
                        <style>
                        .nav-tabs {
                            display: flex;
                            align-items: center;
                            width: 100%;
                            justify-content: start;
                            overflow-x: scroll !important;
                            overflow-y: hidden !important;
                        }

                        .nav-tabs::-webkit-scrollbar-track {
                            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3) !important;
                            background-color: #F5F5F5 !important;
                        }

                        .nav-tabs::-webkit-scrollbar {
                            width: 10px !important;
                            background-color: #F5F5F5 !important;
                            height: 5px !important;
                        }

                        .nav-tabs::-webkit-scrollbar-thumb {
                            background-color: #F2F3F8 !important;
                            border: 2px solid #F2F3F8 !important;
                        }

                        .nav-tabs li a {
                            border-radius: 0 !important;
                            margin: 10px !important;
                            text-transform: uppercase !important;
                        }
                        </style>
                        <ul class=" nav nav-tabs  col-lg-12 col-sm-12" id="new-products-1"
                            style="width: 100% !important ;overflow-x : scroll !important  ;  text-align: center; ">
                            <li class="active "><a href="#all" data-toggle="tab"
                                    style="font-family: 'Raleway' , sans-serif;font-size:15px;font-weight:400 ;color: #000;border-color: #000;   ">All</a>
                            </li>
                            <li><a href="#SmartPhone" data-toggle="tab"
                                    style="font-family: 'Raleway' , sans-serif;font-size:15px;font-weight:400 ;color: #000;border-color: #000;   ">SmartPhone
                                </a></li>

                            <li><a href="#MAN" data-toggle="tab"
                                    style="font-family: 'Raleway' , sans-serif;font-size:15px;font-weight:400 ;color: #000;border-color: #000;   ">MAN</a>
                            </li>
                            <li><a href="#WOMAN" data-toggle="tab"
                                    style="font-family: 'Raleway' , sans-serif;font-size:15px;font-weight:400 ;color: #000;border-color: #000;   ">WOMAN</a>
                            </li>
                        </ul><!-- /.nav-tabs -->
                    </div>

                    <div class="tab-content outer-top-xs">
                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="" data-item="4"
                                    style="display: flex;align-items: center;justify-content: space-between; flex-wrap: wrap;   ">
                                    <?php
                                    $ret = mysqli_query($con, "select * from products order by rand() limit 16 ");
                                    while ($row = mysqli_fetch_array($ret)) {
                                        # code...


                                    ?>

                                    <style>
                                    @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');


                                    .products,
                                    .product {
                                        width: 250px !important;
                                        margin-top: 50px !important;
                                    }

                                    @media only screen and (max-width: 800px) {

                                        .products,
                                        .product {
                                            width: 100% !important;
                                        }

                                        .image {
                                            width: 100% !important;
                                            height: 100% !important;
                                        }
                                    }
                                    </style>
                                    <div class=" item item-carousel">
                                        <div class="products">

                                            <div class="product">
                                                <div class="product-image" style="background:#F2F3F8 !important;">
                                                    <div class="image"
                                                        style="background:transparent !important;width: 250px; height: 250px;  ">
                                                        <a
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                            <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                width="100%" height="100%" alt=""></a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->


                                                <div class="product-info text-left"
                                                    style="width:250px !important; margin-top: -20px !important;padding: 0 !important;">
                                                    <h3 class="name"><a
                                                            style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                    </h3>

                                                    <div class="product-price" style="margin-top: -10px; ">
                                                        <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                            Rs.<?php echo htmlentities($row['productPrice']); ?> </span>
                                                    </div><!-- /.product-price -->
                                                    <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                    <div class="action " style="width: 100%; "><a
                                                            href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                            class="lnk btn btn-primary col-lg-12"
                                                            style="font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                            Add </a>
                                                    </div>
                                                    <?php } else { ?>
                                                    <div class=" action" style="color:red ;width: 100%; ">
                                                        <button class="lnk btn btn-primary col-lg-12"
                                                            style="font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
                                                            Out of Stock</button>
                                                    </div>
                                                    <?php } ?>
                                                </div><!-- /.product-info -->

                                            </div><!-- /.product -->

                                        </div><!-- /.products -->
                                    </div><!-- /.item -->
                                    <?php } ?>

                                </div><!-- /.home-owl-carousel -->
                            </div><!-- /.product-slider -->
                        </div>




                        <div class="tab-pane" id="SmartPhone">
                            <div class="product-slider">
                                <div class=""
                                    style="display: flex;align-items: center;justify-content: space-between; flex-wrap: wrap;   ">
                                    <?php
                                    $ret = mysqli_query($con, "select * from products where category=7  ORDER BY RAND() ");
                                    while ($row = mysqli_fetch_array($ret)) {
                                        # code...


                                    ?>


                                    <div class=" item item-carousel">
                                        <div class="products">

                                            <div class="product">
                                                <div class="product-image" style="background:#F2F3F8 !important;">
                                                    <div class="image"
                                                        style="background:transparent !important;width: 250px; height: 250px;  ">
                                                        <a
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                            <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                width="100%" height="100%" alt=""></a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->


                                                <div class="product-info text-left"
                                                    style="width:250px !important; margin-top: -20px !important;padding: 0 !important;">
                                                    <h3 class="name"><a
                                                            style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                    </h3>

                                                    <div class="product-price" style="margin-top: -10px; ">
                                                        <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                            Rs.<?php echo htmlentities($row['productPrice']); ?> </span>
                                                    </div><!-- /.product-price -->
                                                    <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                    <div class="action " style="width: 100%; "><a
                                                            href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                            class="lnk btn btn-primary col-lg-12"
                                                            style="font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                            Add </a>
                                                    </div>
                                                    <?php } else { ?>
                                                    <div class=" action" style="color:red ;width: 100%; ">
                                                        <button class="lnk btn btn-primary col-lg-12"
                                                            style="font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
                                                            Out of Stock</button>
                                                    </div>
                                                    <?php } ?>
                                                </div><!-- /.product-info -->

                                            </div><!-- /.product -->

                                        </div><!-- /.products -->
                                    </div><!-- /.item -->
                                    <?php } ?>


                                </div><!-- /.home-owl-carousel -->
                            </div><!-- /.product-slider -->
                        </div>






                        <div class="tab-pane" id="Shoes">
                            <div class="product-slider">
                                <div class=""
                                    style="display: flex;align-items: center;justify-content: space-between; flex-wrap: wrap;   ">
                                    <?php
                                    $ret = mysqli_query($con, "select * from products where category=15");
                                    while ($row = mysqli_fetch_array($ret)) {
                                        # code...


                                    ?>


                                    <div class=" item item-carousel">
                                        <div class="products">

                                            <div class="product">
                                                <div class="product-image" style="background:#F2F3F8 !important;">
                                                    <div class="image"
                                                        style="background:transparent !important;width: 250px; height: 250px;  ">
                                                        <a
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                            <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                width="100%" height="100%" alt=""></a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->


                                                <div class="product-info text-left"
                                                    style="width:250px !important; margin-top: -20px !important;padding: 0 !important;">
                                                    <h3 class="name"><a
                                                            style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                    </h3>

                                                    <div class="product-price" style="margin-top: -10px; ">
                                                        <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                            Rs.<?php echo htmlentities($row['productPrice']); ?> </span>
                                                    </div><!-- /.product-price -->
                                                    <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                    <div class="action " style="width: 100%; "><a
                                                            href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                            class="lnk btn btn-primary col-lg-12"
                                                            style="font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                            Add </a>
                                                    </div>
                                                    <?php } else { ?>
                                                    <div class=" action" style="color:red ;width: 100%; ">
                                                        <button class="lnk btn btn-primary col-lg-12"
                                                            style="font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
                                                            Out of Stock</button>
                                                    </div>
                                                    <?php } ?>
                                                </div><!-- /.product-info -->

                                            </div><!-- /.product -->

                                        </div><!-- /.products -->
                                    </div><!-- /.item -->
                                    <?php } ?>


                                </div><!-- /.home-owl-carousel -->
                            </div><!-- /.product-slider -->
                        </div>
                        <div class="tab-pane" id="MAN">
                            <div class="product-slider">
                                <div class=""
                                    style="display: flex;align-items: center;justify-content: space-between; flex-wrap: wrap;   ">
                                    <?php
                                    $ret = mysqli_query($con, "select * from products where category=18 ORDER BY RAND() ");
                                    while ($row = mysqli_fetch_array($ret)) {
                                        # code...


                                    ?>


                                    <div class=" item item-carousel">
                                        <div class="products">

                                            <div class="product">
                                                <div class="product-image" style="background:#F2F3F8 !important;">
                                                    <div class="image"
                                                        style="background:transparent !important;width: 250px; height: 250px;  ">
                                                        <a
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                            <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                width="100%" height="100%" alt=""></a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->


                                                <div class="product-info text-left"
                                                    style="width:250px !important; margin-top: -20px !important;padding: 0 !important;">
                                                    <h3 class="name"><a
                                                            style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                    </h3>

                                                    <div class="product-price" style="margin-top: -10px; ">
                                                        <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                            Rs.<?php echo htmlentities($row['productPrice']); ?> </span>
                                                    </div><!-- /.product-price -->
                                                    <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                    <div class="action " style="width: 100%; "><a
                                                            href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                            class="lnk btn btn-primary col-lg-12"
                                                            style="font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                            Add </a>
                                                    </div>
                                                    <?php } else { ?>
                                                    <div class=" action" style="color:red ;width: 100%; ">
                                                        <button class="lnk btn btn-primary col-lg-12"
                                                            style="font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
                                                            Out of Stock</button>
                                                    </div>
                                                    <?php } ?>
                                                </div><!-- /.product-info -->

                                            </div><!-- /.product -->

                                        </div><!-- /.products -->
                                    </div><!-- /.item --> <?php } ?>


                                </div><!-- /.home-owl-carousel -->
                            </div><!-- /.product-slider -->
                        </div>
                        <div class="tab-pane" id="WOMAN">
                            <div class="product-slider">
                                <div class=""
                                    style="display: flex;align-items: center;justify-content: space-between; flex-wrap: wrap;   ">
                                    <?php
                                    $ret = mysqli_query($con, "select * from products where category=19 ORDER BY RAND() ");
                                    while ($row = mysqli_fetch_array($ret)) {
                                        # code...


                                    ?>


                                    <div class=" item item-carousel">
                                        <div class="products">

                                            <div class="product">
                                                <div class="product-image" style="background:#F2F3F8 !important;">
                                                    <div class="image"
                                                        style="background:transparent !important;width: 250px; height: 250px;  ">
                                                        <a
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                            <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                width="100%" height="100%" alt=""></a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->


                                                <div class="product-info text-left"
                                                    style="width:250px !important; margin-top: -20px !important;padding: 0 !important;">
                                                    <h3 class="name"><a
                                                            style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                    </h3>

                                                    <div class="product-price" style="margin-top: -10px; ">
                                                        <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                            Rs.<?php echo htmlentities($row['productPrice']); ?> </span>
                                                    </div><!-- /.product-price -->
                                                    <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                    <div class="action " style="width: 100%; "><a
                                                            href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                            class="lnk btn btn-primary col-lg-12"
                                                            style="font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                            Add </a>
                                                    </div>
                                                    <?php } else { ?>
                                                    <div class=" action" style="color:red ;width: 100%; ">
                                                        <button class="lnk btn btn-primary col-lg-12"
                                                            style="font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
                                                            Out of Stock</button>
                                                    </div>
                                                    <?php } ?>
                                                </div><!-- /.product-info -->

                                            </div><!-- /.product -->

                                        </div><!-- /.products -->
                                    </div><!-- /.item --> <?php } ?>


                                </div><!-- /.home-owl-carousel -->
                            </div><!-- /.product-slider -->
                        </div>

                        <!-- ============================================== TABS ============================================== -->
                        <div class="sections prod-slider-small outer-top-small">
                            <div class="row">
                                <div class="col-md-6">
                                    <section class="section">
                                        <h3 class="section-title"
                                            style="font-family: 'Raleway' , sans-serif;font-size:30px;font-weight:300 !important ;color: #000;border-color: #000;    ">
                                            Smart Phones</h3>
                                        <div class="owl-carousel homepage-owl-carousel custom-carousel outer-top-xs owl-theme"
                                            data-item="2">

                                            <?php
                                            $ret = mysqli_query($con, "SELECT * FROM products WHERE category=7  ORDER BY RAND() LIMIT 4");
                                            while ($row = mysqli_fetch_array($ret)) {
                                            ?>



                                            <div class=" item item-carousel">
                                                <div class="products">

                                                    <div class="product">
                                                        <div class="product-image"
                                                            style="background:#F2F3F8 !important;">
                                                            <div class="image"
                                                                style="background:transparent !important;width: 250px; height: 250px;  ">
                                                                <a
                                                                    href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                    <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                        data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                        width="100%" height="100%" alt=""></a>
                                                            </div><!-- /.image -->


                                                        </div><!-- /.product-image -->


                                                        <div class="product-info text-left"
                                                            style="width:250px !important; margin-top: -20px !important;padding: 0 !important;">
                                                            <h3 class="name"><a
                                                                    style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                                    href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                            </h3>

                                                            <div class="product-price" style="margin-top: -10px; ">
                                                                <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                                    Rs.<?php echo htmlentities($row['productPrice']); ?>
                                                                </span>
                                                            </div><!-- /.product-price -->
                                                            <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                            <div class="action " style="width: 100%; "><a
                                                                    href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                    class="lnk btn btn-primary col-lg-12"
                                                                    style="font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                                    Add </a>
                                                            </div>
                                                            <?php } else { ?>
                                                            <div class=" action" style="color:red ;width: 100%; ">
                                                                <button class="lnk btn btn-primary col-lg-12"
                                                                    style="font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
                                                                    Out of Stock</button>
                                                            </div>
                                                            <?php } ?>
                                                        </div><!-- /.product-info -->

                                                    </div><!-- /.product -->

                                                </div><!-- /.products -->
                                            </div><!-- /.item -->

                                            <?php } ?>


                                        </div>
                                    </section>
                                </div>
                                <div class="col-md-6">
                                    <section class="section">
                                        <h3 class="section-title"
                                            style="font-family: 'Raleway' , sans-serif;font-size:30px;font-weight:300 !important ;color: #000;border-color: #000;    ">
                                            Smart Phones
                                        </h3>
                                        <div class="owl-carousel homepage-owl-carousel custom-carousel outer-top-xs owl-theme"
                                            data-item="2">
                                            <?php
                                            $ret = mysqli_query($con, "SELECT * FROM products WHERE category=18  ORDER BY RAND() LIMIT 4");
                                            while ($row = mysqli_fetch_array($ret)) {
                                            ?>



                                            <div class=" item item-carousel">
                                                <div class="products">

                                                    <div class="product">
                                                        <div class="product-image"
                                                            style="background:#F2F3F8 !important;">
                                                            <div class="image"
                                                                style="background:transparent !important;width: 250px; height: 250px;  ">
                                                                <a
                                                                    href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                    <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                        data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                        width="100%" height="100%" alt=""></a>
                                                            </div><!-- /.image -->


                                                        </div><!-- /.product-image -->


                                                        <div class="product-info text-left"
                                                            style="width:250px !important; margin-top: -20px !important;padding: 0 !important;">
                                                            <h3 class="name"><a
                                                                    style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                                    href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                            </h3>

                                                            <div class="product-price" style="margin-top: -10px; ">
                                                                <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                                    Rs.<?php echo htmlentities($row['productPrice']); ?>
                                                                </span>
                                                            </div><!-- /.product-price -->
                                                            <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                            <div class="action " style="width: 100%; "><a
                                                                    href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                    class="lnk btn btn-primary col-lg-12"
                                                                    style="font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                                    Add </a>
                                                            </div>
                                                            <?php } else { ?>
                                                            <div class=" action" style="color:red ;width: 100%; ">
                                                                <button class="lnk btn btn-primary col-lg-12"
                                                                    style="font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
                                                                    Out of Stock</button>
                                                            </div>
                                                            <?php } ?>
                                                        </div><!-- /.product-info -->

                                                    </div><!-- /.product -->

                                                </div><!-- /.products -->
                                            </div><!-- /.item -->

                                            <?php } ?>



                                        </div>
                                    </section>

                                </div>
                            </div>
                        </div>
                        <!-- ============================================== TABS : END ============================================== -->



                        <section class="section featured-product inner-xs wow fadeInUp"
                            style="display: flex;align-items: center;justify-content: space-between;flex-wrap: wrap;     ">
                            <div class="">
                                <h3 class="section-title"
                                    style="font-family: 'Raleway' , sans-serif;font-size:30px;font-weight:300 !important ;color: #000;border-color: #000; margin-bottom: 100px !important ;    ">
                                    MAN
                                </h3>
                                <?php
                                $ret = mysqli_query($con, "SELECT * FROM products WHERE category = 18 ORDER BY RAND() LIMIT 4");
                                while ($row = mysqli_fetch_array($ret)) {
                                    # code...
                                ?>
                                <div class="item">
                                    <div class="products">
                                        <div class="product" style="margin-top: -50px !important ; ">
                                            <div class="product-micro">
                                                <div class="row product-micro-row" style="height: 100px !important ;  ">
                                                    <div class="col col-xs-4 col-lg-4 col-sm-4"
                                                        style="height: 100% !important ;">
                                                        <div class="product-image"
                                                            style="background: #F2F3F8; width: 80px; height:80px">
                                                            <div class="image"
                                                                style="background:transparent !important;width: 80px; height:80px;border:1px solid black ;">
                                                                <a href="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-lightbox="image-1"
                                                                    data-title="<?php echo htmlentities($row['productName']); ?>">
                                                                    <img data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                        width="100%" height="100%" alt="">
                                                                    <div class="zoom-overlay"></div>
                                                                </a>
                                                            </div><!-- /.image -->
                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-xs-8" style="height: 100% !important ;   ">
                                                        <div class="product-info">
                                                            <h3 class="name"><a
                                                                    style="  font-family:sans-serif, ' Poppins'; font-size: 11px !important ; color: #000;text-transform: capitalize;  "
                                                                    href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                            </h3>
                                                            <div class="product-price">
                                                                <span class="price"
                                                                    style="font-family: sans-serif, ' Poppins'!important;font-weight: normal !important ;font-size: 11px ;  ">
                                                                    MRP.
                                                                    <?php echo htmlentities($row['productPrice']); ?>
                                                                </span>
                                                            </div><!-- /.product-price -->
                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->
                                        </div>


                                    </div>
                                </div><?php } ?>
                            </div>
                            <div class="">
                                <h3 class="section-title"
                                    style="font-family: 'Raleway' , sans-serif;font-size:30px;font-weight:300 !important ;color: #000;border-color: #000; margin-bottom: 100px !important ;    ">
                                    WOMAN
                                </h3>
                                <?php
                                $ret = mysqli_query($con, "SELECT * FROM products WHERE category = 19 ORDER BY RAND() LIMIT 4");
                                while ($row = mysqli_fetch_array($ret)) {
                                    # code...
                                ?>
                                <div class="item">
                                    <div class="products">
                                        <div class="product" style="margin-top: -50px !important ; ">
                                            <div class="product-micro">
                                                <div class="row product-micro-row" style="height: 100px !important ;  ">
                                                    <div class="col col-xs-4 col-lg-4 col-sm-4"
                                                        style="height: 100% !important ;">
                                                        <div class="product-image"
                                                            style="background: #F2F3F8; width: 80px; height:80px">
                                                            <div class="image"
                                                                style="background:transparent !important;width: 80px; height:80px;border:1px solid black ;">
                                                                <a href="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-lightbox="image-1"
                                                                    data-title="<?php echo htmlentities($row['productName']); ?>">
                                                                    <img data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                        width="100%" height="100%" alt="">
                                                                    <div class="zoom-overlay"></div>
                                                                </a>
                                                            </div><!-- /.image -->
                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-xs-8" style="height: 100% !important ;   ">
                                                        <div class="product-info">
                                                            <h3 class="name"><a
                                                                    style="  font-family:sans-serif, ' Poppins'; font-size: 11px !important ; color: #000;text-transform: capitalize;  "
                                                                    href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                            </h3>
                                                            <div class="product-price">
                                                                <span class="price"
                                                                    style="font-family: sans-serif, ' Poppins'!important;font-weight: normal !important ;font-size: 11px ;  ">
                                                                    MRP.
                                                                    <?php echo htmlentities($row['productPrice']); ?>
                                                                </span>
                                                            </div><!-- /.product-price -->
                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->
                                        </div>


                                    </div>
                                </div><?php } ?>
                            </div>
                            <div class="">
                                <h3 class="section-title"
                                    style="font-family: 'Raleway' , sans-serif;font-size:30px;font-weight:300 !important ;color: #000;border-color: #000; margin-bottom: 100px !important ;    ">
                                    Smart Phones
                                </h3>
                                <?php
                                $ret = mysqli_query($con, "SELECT * FROM products WHERE category = 7 ORDER BY RAND() LIMIT 4");
                                while ($row = mysqli_fetch_array($ret)) {
                                    # code...
                                ?>
                                <div class="item">
                                    <div class="products">
                                        <div class="product" style="margin-top: -50px !important ; ">
                                            <div class="product-micro">
                                                <div class="row product-micro-row" style="height: 100px !important ;  ">
                                                    <div class="col col-xs-4 col-lg-4 col-sm-4"
                                                        style="height: 100% !important ;">
                                                        <div class="product-image"
                                                            style="background: #F2F3F8; width: 80px; height:80px">
                                                            <div class="image"
                                                                style="background:transparent !important;width: 80px; height:80px;border:1px solid black ;">
                                                                <a href="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-lightbox="image-1"
                                                                    data-title="<?php echo htmlentities($row['productName']); ?>">
                                                                    <img data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                        width="100%" height="100%" alt="">
                                                                    <div class="zoom-overlay"></div>
                                                                </a>
                                                            </div><!-- /.image -->
                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-xs-8" style="height: 100% !important ;   ">
                                                        <div class="product-info">
                                                            <h3 class="name"><a
                                                                    style="  font-family:sans-serif, ' Poppins'; font-size: 11px !important ; color: #000;text-transform: capitalize;  "
                                                                    href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                            </h3>
                                                            <div class="product-price">
                                                                <span class="price"
                                                                    style="font-family: sans-serif, ' Poppins'!important;font-weight: normal !important ;font-size: 11px ;  ">
                                                                    MRP.
                                                                    <?php echo htmlentities($row['productPrice']); ?>
                                                                </span>
                                                            </div><!-- /.product-price -->
                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->
                                        </div>


                                    </div>
                                </div><?php } ?>
                            </div>
                            <div class="">
                                <h3 class="section-title"
                                    style="font-family: 'Raleway' , sans-serif;font-size:30px;font-weight:300 !important ;color: #000;border-color: #000; margin-bottom: 100px !important ;    ">
                                    MAN
                                </h3>
                                <?php
                                $ret = mysqli_query($con, "SELECT * FROM products WHERE category = 19 ORDER BY RAND() LIMIT 4");
                                while ($row = mysqli_fetch_array($ret)) {
                                    # code...
                                ?>
                                <div class="item">
                                    <div class="products">
                                        <div class="product" style="margin-top: -50px !important ; ">
                                            <div class="product-micro">
                                                <div class="row product-micro-row" style="height: 100px !important ;  ">
                                                    <div class="col col-xs-4 col-lg-4 col-sm-4"
                                                        style="height: 100% !important ;">
                                                        <div class="product-image"
                                                            style="background: #F2F3F8; width: 80px; height:80px">
                                                            <div class="image"
                                                                style="background:transparent !important;width: 80px; height:80px;border:1px solid black ;">
                                                                <a href="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-lightbox="image-1"
                                                                    data-title="<?php echo htmlentities($row['productName']); ?>">
                                                                    <img data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                        width="100%" height="100%" alt="">
                                                                    <div class="zoom-overlay"></div>
                                                                </a>
                                                            </div><!-- /.image -->
                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-xs-8" style="height: 100% !important ;   ">
                                                        <div class="product-info">
                                                            <h3 class="name"><a
                                                                    style="  font-family:sans-serif, ' Poppins'; font-size: 11px !important ; color: #000;text-transform: capitalize;  "
                                                                    href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                            </h3>
                                                            <div class="product-price">
                                                                <span class="price"
                                                                    style="font-family: sans-serif, ' Poppins'!important;font-weight: normal !important ;font-size: 11px ;  ">
                                                                    MRP.
                                                                    <?php echo htmlentities($row['productPrice']); ?>
                                                                </span>
                                                            </div><!-- /.product-price -->
                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->
                                        </div>


                                    </div>
                                </div>

                                <?php } ?>
                            </div>
                        </section>

                        <?php include('includes/brands-slider.php'); ?>
                    </div>
                </div>
            </div>
        </div>
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