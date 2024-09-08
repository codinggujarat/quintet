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

    <title>QUINTET | New Collection Online</title>

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
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- animated  -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <!--Model Viewer  -->
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

</head>

<body class="cnt-home">



    <!-- ============================================== HEADER ============================================== -->
    <header class="header-style-1">
        <?php include('includes/top-header.php'); ?>
        <?php include('includes/main-header.php'); ?>
        <?php include('includes/menu-bar.php'); ?>

    </header>
    <style>
    .col-lg-12 {
        width: 100%;
    }
    </style>
    <!-- ============================================== HEADER : END ============================================== -->

    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                <!-- ========================================== SECTION – HERO ========================================= -->
                <style>
                @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');

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


                .swiper {
                    width: 100%;
                    height: 100%;
                    margin-bottom: 10% !important;
                }

                .swiper-slide {
                    position: sticky;
                    top: 0;
                    text-align: center;
                    font-size: 18px;
                    width: 100%;
                    height: 100%;
                    margin: 0 !important;

                    padding: 0 !important;
                    background: #fff;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .swiper-slide img {
                    display: block;
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }

                .swiper-slide a {
                    background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)) !important;
                }

                .swiper-button-next,
                .swiper-button-prev {
                    height: 100%;
                    color: #fff !important;
                    top: 0;
                    width: 30px;
                }
                </style>


                <!-- Swiper -->

                <div class="swiper mySwiper ">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="category.php?cid=10">
                                <img src="assets/images/sliders/slider-4.jpg" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="category.php?cid=11">
                                <img src="assets/images/sliders/slider1.png" alt="">
                            </a>
                        </div>

                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <!-- ========================================= SECTION – HERO : END ========================================= -->
                <!-- ============================================== INFO BOXES ============================================== -->


            </div><!-- /.row -->
            <!-- <div class="container">

            </div> -->
            <style>
            .bg-video-wrap {
                position: relative;
                overflow: hidden;
                width: 100%;
                height: 100%;
            }

            video {
                width: 100%;
                height: 100%;
                z-index: 1;

            }

            .overlay {
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0;
                left: 0;
                background-size: 3px 3px;
                z-index: 2;
                background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.10));
            }

            .bg-video-wrap a h1 {
                text-align: center;
                color: #fff;
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                z-index: 3;
                font-size: 30px;
                max-width: 400px;
                width: 100%;
                height: 50px;
                font-weight: 700;
            }
            </style>
            <div class="col-lg-12 ">
                <div class="bg-video-wrap">
                    <video src="assets/video/large_2x.mp4" loop muted autoplay>
                    </video>
                    <a href="product-details.php?pid=22">
                        <div class="overlay">
                        </div>
                        <h1>
                            Big, bigger &and; faster
                        </h1>
                    </a>
                </div>
            </div>
            <style>
            model-viewer::-webkit-scrollbar {
                display: none !important;
            }

            model-viewer {
                width: 600px !important;
                height: 600px !important;
                overflow: hidden !important;
            }

            .model-viewer {
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
            }
            </style>

            <div class="col-lg-12 model-viewerbox" style="background-color:#f2f3f8;">
                <h1
                    style="text-transform: uppercase;text-align: center;font-weight: 400;color: #000;  font-family: 'Raleway',sans-serif ;  ">
                    Take a closer
                    <span class="swipe" style="font-family: 'Raleway', sans-serif;-webkit-text-stroke: 3px white;
                        color: transparent;
                            font-weight: 900;  -webkit-text-stroke: 2px #000;">
                        Look..
                    </span>
                </h1>
                <div class="model-viewer wow zoomIn" data-wow-delay="0.5s">
                    <model-viewer camera-controls alt="Model" src="assets/360model/iphone_15_pro_max_-__glgt.glb">
                    </model-viewer>
                </div>
            </div>


            <div class="col-lg-12 col-md-12 col-sm-12  m-t-20 ">
                <h1 style="text-align: center;font-weight: 400;color: #000;  font-family: 'Raleway',sans-serif ;  ">
                    NEW IN - MAN</h1>
                <style>
                .productman {
                    width: 250px !important;
                    margin-top: 10px;
                }
                </style>

                <div class="swiper mySwiper2 ">
                    <div class="swiper-wrapper">
                        <?php
                        $ret = mysqli_query($con, "SELECT * FROM products WHERE category=10 and subcategory=23  ORDER BY RAND() LIMIT 10 ");
                        while ($row = mysqli_fetch_array($ret)) {
                            # code...
                        ?>

                        <div class="swiper-slide">
                            <div class="productman">
                                <div class="product-image"
                                    style="background:#f2f3f8;  border-radius: 10px !important ;">
                                    <div class="image wow fadeInUpBig" data-wow-delay="0.1s"
                                        style="background:#f2f3f8 !important;width: 270px; height: 100%; ">
                                        <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                            <img src=" admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                width=" 100%" height="100%" alt=""
                                                style="border-radius: 10px !important ;"></a>
                                    </div><!-- /.image -->


                                </div><!-- /.product-image -->


                                <div class="product-info text-left"
                                    style="width:300px !important; margin-top:5px !important;padding: 0 !important;">
                                    <h3 class="name" style="text-align: center;"><a
                                            style="text-align: center; background: transparent !important ; font-family:'Raleway',sans-serif
                                                !important;font-size:11px;font-weight:700 !important ; text-transform: uppercase; color: #000; "
                                            href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                    </h3>

                                    <div class=" product-price" style="margin-top: -10px; text-align: center;">
                                        <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:500;font-size: 13px; ">
                                            &#8377;&nbsp;<?php echo htmlentities($row['productPrice']); ?>.00
                                        </span>
                                    </div><!-- /.product-price -->
                                </div><!-- /.product-info -->

                            </div><!-- /.product -->
                        </div>
                        <?php } ?>
                    </div>
                    <!-- <div class="swiper-pagination"></div> -->
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12  ">
                <h1 style="text-align: center;font-weight: 400;color: #000;  font-family: 'Raleway',sans-serif ;  ">
                    NEW IN - WOMAN</h1>
                <style>
                .productWOMAN {
                    width: 250px !important;
                    margin-top: 10px;
                }
                </style>

                <div class="swiper mySwiper2 ">
                    <div class="swiper-wrapper ">
                        <?php
                        $ret = mysqli_query($con, "SELECT * FROM products WHERE category=8 and subcategory=24  ORDER BY RAND() LIMIT 10 ");
                        while ($row = mysqli_fetch_array($ret)) {
                            # code...
                        ?>

                        <div class="swiper-slide">
                            <div class="productWOMAN ">
                                <div class="product-image"
                                    style="background:#f2f3f8 !important;border-radius: 10px !important ;">
                                    <div class="image wow fadeInUpBig" data-wow-delay="0.1s"
                                        style="background:#f2f3f8 !important;width: 270px; height: 100%; ">
                                        <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                            <img src=" admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                width=" 100%" height="100%" alt=""
                                                style="border-radius: 10px !important ;"></a>
                                    </div><!-- /.image -->


                                </div><!-- /.product-image -->


                                <div class="product-info text-left"
                                    style="width:250px !important; margin-top:5px !important;padding: 0 !important;">
                                    <h3 class="name" style="text-align: center;"><a
                                            style="text-align: center; background: transparent !important ; font-family:'Raleway',sans-serif
                                                !important;font-size:11px;font-weight:700 !important ; text-transform: uppercase; color: #000; "
                                            href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                    </h3>

                                    <div class=" product-price" style="margin-top: -10px; text-align: center;">
                                        <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:500;font-size: 13px; ">
                                            &#8377;&nbsp;<?php echo htmlentities($row['productPrice']); ?>.00
                                        </span>
                                    </div><!-- /.product-price -->
                                </div><!-- /.product-info -->

                            </div><!-- /.product -->
                        </div>
                        <?php } ?>
                    </div>
                    <!-- <div class="swiper-pagination"></div> -->
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12  ">
                <h1 style="text-align: center;font-weight: 400;color: #000;  font-family: 'Raleway',sans-serif ;  ">
                    NEW IN - SHOES</h1>
                <style>
                .productSHOES {
                    width: 500px !important;
                    margin-top: 10px;
                }
                </style>

                <div class="swiper mySwiper3 ">
                    <div class="swiper-wrapper ">
                        <?php
                        $ret = mysqli_query($con, "SELECT * FROM products WHERE category=10 and subcategory=21  ORDER BY RAND() LIMIT 10 ");
                        while ($row = mysqli_fetch_array($ret)) {
                            # code...
                        ?>

                        <div class="swiper-slide">
                            <div class="productSHOES ">
                                <div class="background:#f2f3f8 !important;border-radius: 10px !important ;">
                                    <div class="image wow fadeInUpBig" data-wow-delay="0.1s"
                                        style="background:#f2f3f8 !important;width: 480px; height: 100%; ">
                                        <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                            <img src=" admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                width=" 100%" height="100%" alt=""
                                                style="border-radius: 10px !important ;"></a>
                                    </div><!-- /.image -->


                                </div><!-- /.product-image -->


                                <div class="product-info text-left"
                                    style="width:480px !important; margin-top:5px !important;padding: 0 !important;">
                                    <h3 class="name" style="text-align: center;"><a
                                            style="text-align: center; background: transparent !important ; font-family:'Raleway',sans-serif
                                                        !important;font-size:11px;font-weight:700 !important ; text-transform: uppercase; color: #000; "
                                            href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                    </h3>

                                    <div class=" product-price" style="margin-top: -10px; text-align: center;">
                                        <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                        !important;font-weight:500;font-size: 13px; ">
                                            &#8377;&nbsp;<?php echo htmlentities($row['productPrice']); ?>.00
                                        </span>
                                    </div><!-- /.product-price -->
                                </div><!-- /.product-info -->

                            </div><!-- /.product -->
                        </div>
                        <?php } ?>
                    </div>
                    <!-- <div class="swiper-pagination"></div> -->
                </div>
            </div>




            <style>
            .section {
                padding-top: 4rem;
                padding-bottom: 4rem;
            }

            .section .heading {
                font-size: 30px;
                font-weight: 700;
            }

            #overlayer {
                width: 100%;
                height: 100%;
                position: fixed;
                z-index: 7100;
                background: #fff;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
            }

            .loader {
                z-index: 7700;
                position: fixed;
                top: 50%;
                left: 50%;
                -webkit-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
            }

            .retro-layout .v-height {
                height: 240px;
            }

            @media (max-width: 767.98px) {
                .retro-layout .img {
                    height: 240px;
                }
            }

            .retro-layout .h-entry {
                display: block;
                position: relative;
                border-radius: 10px;
                overflow: hidden;
            }

            .retro-layout .h-entry .post-category {
                color: #fff;
            }

            .retro-layout .h-entry .featured-img {
                position: absolute;
                height: 100%;
                width: 100%;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center center;
                -webkit-transform: scale(1.05);
                -ms-transform: scale(1.05);
                transform: scale(1.05);
                -webkit-transition: .3s all ease;
                -o-transition: .3s all ease;
                transition: .3s all ease;
            }

            .retro-layout .h-entry:hover .featured-img {
                -webkit-transform: scale(1);
                -ms-transform: scale(1);
                transform: scale(1);
            }

            .retro-layout .h-entry.mb-30 {
                margin-bottom: 30px;
            }

            .retro-layout .h-entry .date {
                font-size: 15px;
            }

            .retro-layout .h-entry.gradient {
                position: relative;
            }

            .retro-layout .h-entry.gradient:before {
                z-index: 1;
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                background: -moz-linear-gradient(top, transparent 0%, transparent 18%, rgba(0, 0, 0, 0.8) 99%, rgba(0,
                            0, 0, 0.8) 100%);
                background: -webkit-linear-gradient(top, transparent 0%, transparent 18%, rgba(0, 0, 0, 0.8) 99%,
                        rgba(0, 0, 0, 0.8) 100%);
                background: -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(18%,
                            transparent), color-stop(99%, rgba(0, 0, 0, 0.8)), to(rgba(0, 0, 0, 0.8)));
                background: -o-linear-gradient(top, transparent 0%, transparent 18%, rgba(0, 0, 0, 0.8) 99%, rgba(0, 0,
                            0, 0.8) 100%);
                background: linear-gradient(to bottom, transparent 0%, transparent 18%, rgba(0, 0, 0, 0.8) 99%, rgba(0,
                            0, 0, 0.8) 100%);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#cc000000',
                        GradientType=0);
            }

            .retro-layout .text {
                position: absolute;
                bottom: 0;
                z-index: 10;
                padding: 20px;
                max-width: 350px;
            }

            .retro-layout .text h2 a,
            .retro-layout .text .h2 {
                color: #fff;
                font-size: 18px;
                line-height: 1.2;
                margin-bottom: 0;
            }

            .retro-layout .text span {
                color: rgba(255, 255, 255, 0.7);
                font-size: 12px;
                display: block;
                margin-bottom: 5px;
            }

            .retro-layout .text.text-sm h2 a,
            .retro-layout .text.text-sm .h2 {
                font-size: 18px;
                line-height: 1.5;
            }

            .retro-layout .gradient {
                position: relative;
            }

            .retro-layout .gradient:before {
                z-index: 1;
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                background: -moz-linear-gradient(top, transparent 0%, transparent 18%, rgba(0, 0, 0, 0.8) 99%, rgba(0,
                            0, 0, 0.8) 100%);
                background: -webkit-linear-gradient(top, transparent 0%, transparent 18%, rgba(0, 0, 0, 0.8) 99%,
                        rgba(0, 0, 0, 0.8) 100%);
                background: -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(18%,
                            transparent), color-stop(99%, rgba(0, 0, 0, 0.8)), to(rgba(0, 0, 0, 0.8)));
                background: -o-linear-gradient(top, transparent 0%, transparent 18%, rgba(0, 0, 0, 0.8) 99%, rgba(0, 0,
                            0, 0.8) 100%);
                background: linear-gradient(to bottom, transparent 0%, transparent 18%, rgba(0, 0, 0, 0.8) 99%, rgba(0,
                            0, 0, 0.8) 100%);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#cc000000',
                        GradientType=0);
            }

            @media (max-width: 767.98px) {
                .retro-layout .img-5 {
                    height: 240px !important;
                    margin-bottom: 30px;
                    margin-top: 30px;
                }
            }

            .retro-layout-alt .img-1 {
                background-size: cover;
                background-position: center center;
                background-repeat: no-repeat;
            }

            @media (max-width: 767.98px) {
                .retro-layout-alt .img-1 {
                    height: 240px !important;
                    position: relative;
                    margin-bottom: 30px;
                }
            }

            .retro-layout-alt .img-2 {
                background-size: cover;
                background-position: center center;
                background-repeat: no-repeat;
            }

            @media (max-width: 767.98px) {
                .retro-layout-alt .img-2 {
                    height: 240px !important;
                }
            }

            .retro-layout-alt .mb30 {
                margin-bottom: 30px;
            }

            .retro-layout-alt .hentry {
                display: block;
                position: relative;
                overflow: hidden;
                border-radius: 10px;
            }

            .retro-layout-alt .hentry .featured-img {
                position: absolute;
                height: 100%;
                width: 100%;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center center;
                -webkit-transform: scale(1.05);
                -ms-transform: scale(1.05);
                transform: scale(1.05);
                -webkit-transition: .3s all ease;
                -o-transition: .3s all ease;
                transition: .3s all ease;
            }

            .retro-layout-alt .hentry:hover .featured-img {
                -webkit-transform: scale(1);
                -ms-transform: scale(1);
                transform: scale(1);
            }

            .retro-layout-alt .gradient {
                position: relative;
            }

            .retro-layout-alt .gradient:before {
                z-index: 1;
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                background: -moz-linear-gradient(top, transparent 0%, transparent 18%, rgba(0, 0, 0, 0.8) 99%, rgba(0,
                            0, 0, 0.8) 100%);
                background: -webkit-linear-gradient(top, transparent 0%, transparent 18%, rgba(0, 0, 0, 0.8) 99%,
                        rgba(0, 0, 0, 0.8) 100%);
                background: -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(18%,
                            transparent), color-stop(99%, rgba(0, 0, 0, 0.8)), to(rgba(0, 0, 0, 0.8)));
                background: -o-linear-gradient(top, transparent 0%, transparent 18%, rgba(0, 0, 0, 0.8) 99%, rgba(0, 0,
                            0, 0.8) 100%);
                background: linear-gradient(to bottom, transparent 0%, transparent 18%, rgba(0, 0, 0, 0.8) 99%, rgba(0,
                            0, 0, 0.8) 100%);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#cc000000',
                        GradientType=0);
            }

            .retro-layout-alt .post-category {
                margin-left: 20px;
                margin-top: 10px;
            }

            .retro-layout-alt .v-height {
                height: 300px;
            }

            .retro-layout-alt .text {
                position: absolute;
                bottom: 0;
                z-index: 10;
                padding: 20px;
                max-width: 350px;
            }

            .retro-layout-alt .text h2 a,
            .retro-layout-alt .text .h2 {
                color: #fff;
                font-size: 26px;
            }

            .retro-layout-alt .text span {
                color: rgba(255, 255, 255, 0.7);
            }

            .retro-layout-alt .text.text-sm h2 a,
            .retro-layout-alt .text.text-sm .h2 {
                font-size: 18px;
                line-height: 1.5;
            }

            .retro-layout-alt .two-col>a {
                width: calc(50% - 15px);
                float: left;
            }

            @media (max-width: 575.98px) {
                .retro-layout-alt .two-col>a {
                    width: 100% !important;
                    float: none !important;
                    margin-bottom: 30px;
                }
            }

            .posts-entry-title {
                text-transform: uppercase;
                font-size: 20px;
                color: #000;
                letter-spacing: .05rem;
            }

            .posts-entry .blog-entry .img-link {
                position: relative;
                overflow: hidden;
                display: inline-block;
                border-radius: 10px;
                margin-bottom: 10px;
            }

            .posts-entry .blog-entry h2 a,
            .posts-entry .blog-entry .h2 {
                line-height: 1.3;
                font-size: 26px;
            }

            .posts-entry .blog-entry h2 a,
            .posts-entry .blog-entry .h2 a {
                color: #4D4C7D;
            }

            .posts-entry .btn-sm,
            .posts-entry .btn-group-sm>.btn {
                padding-top: 10px;
                padding-bottom: 10px;
                padding-left: 15px;
                padding-right: 15px;
            }

            .posts-entry .blog-entry-sm li {
                margin-bottom: 20px;
            }

            .posts-entry .blog-entry-sm h3,
            .posts-entry .blog-entry-sm .h3 {
                font-size: 20px;
            }

            .posts-entry .blog-entry-sm h3 a,
            .posts-entry .blog-entry-sm .h3 a {
                color: #4D4C7D;
            }

            .posts-entry.posts-entry-sm .blog-entry h2 a,
            .posts-entry.posts-entry-sm .blog-entry .h2 {
                font-size: 18px;
            }

            .posts-entry .blog-entry-search-item {
                margin-bottom: 30px;
            }

            .posts-entry .blog-entry-search-item .img-link {
                width: 280px;
                border-radius: 0;
            }

            .posts-entry .blog-entry-search-item .img-link img {
                margin-bottom: 0;
                border-radius: 10px;
            }

            .read-more {
                border-bottom: 2px solid #214252;
            }

            .post-entry-alt h2 a,
            .post-entry-alt .h2 {
                font-size: 18px;
                margin-bottom: 20px;
            }

            .post-entry-alt h2 a,
            .post-entry-alt .h2 a {
                color: #4D4C7D;
            }

            .post-entry-alt .excerpt {
                padding-left: 20px;
                padding-right: 20px;
            }

            .post-entry-alt .img-link {
                position: relative;
                display: inline-block;
                overflow: hidden;
                border-radius: 10px;
                margin-bottom: 10px;
            }

            .post-entry-alt .img-link img {
                margin-bottom: 0;
            }

            .post-meta {
                color: gray;
                font-size: 13px;
                width: 100%;
                display: block;
                margin-bottom: 20px;
            }

            .post-meta a {
                color: #000;
            }

            .post-meta .author-figure img {
                width: 30px;
                border-radius: 50%;
            }

            .blog-entries .blog-entry {
                display: block;
                -webkit-transition: .3s all ease;
                -o-transition: .3s all ease;
                transition: .3s all ease;
                margin-bottom: 30px;
                position: relative;
            }

            .blog-entries .blog-entry:hover,
            .blog-entries .blog-entry:focus {
                opacity: .7;
                top: -1px;
                -webkit-box-shadow: 0 3px 50px -2px rgba(0, 0, 0, 0.2) !important;
                box-shadow: 0 3px 50px -2px rgba(0, 0, 0, 0.2) !important;
            }

            .blog-entries .blog-entry .blog-content-body {
                padding: 20px;
                border: 1px solid #efefef;
                border-top: none;
            }

            .blog-entries .blog-entry img {
                max-width: 100%;
            }

            .blog-entries .blog-entry h2 a,
            .blog-entries .blog-entry .h2 {
                font-size: 18px;
                line-height: 1.5;
            }

            .blog-entries .blog-entry p {
                font-size: 13px;
                color: gray;
            }

            .blog-entries .post-meta {
                font-size: 14px;
                color: #b3b3b3;
            }

            .blog-entries .post-meta .author img {
                width: 30px;
                border-radius: 50%;
                display: inline-block;
            }

            .custom-pagination span,
            .custom-pagination a {
                text-align: center;
                display: inline-block;
                height: 40px;
                width: 40px;
                line-height: 40px;
                border-radius: 50%;
            }

            .custom-pagination a {
                background: #214252;
                color: #fff;
            }

            .custom-pagination a:hover {
                background: #214252;
            }

            .sidebar {
                padding-left: 5em;
            }

            @media (max-width: 767.98px) {
                .sidebar {
                    padding-left: 15px;
                }
            }

            .sidebar-box {
                margin-bottom: 4em;
                font-size: 15px;
                width: 100%;
                float: left;
                background: #fff;
            }

            .sidebar-box *:last-child {
                margin-bottom: 0;
            }

            .sidebar-box .heading {
                font-size: 18px;
                color: #000;
                font-weight: 400;
                margin-bottom: 30px;
                padding-bottom: 20px;
                border-bottom: 1px solid #e6e6e6;
            }

            .comment-wrap .heading,
            .search-result-wrap .heading {
                font-size: 18px;
                color: #000;
                font-weight: 400;
                margin-bottom: 30px;
                padding-bottom: 20px;
                border-bottom: 1px solid #e6e6e6;
            }

            .tags {
                padding: 0;
                margin: 0;
                font-weight: 400;
            }



            .tags li a {
                float: left;
                display: block;
                border-radius: 4px;
                padding: 2px 6px;
                color: gray;
                background: #f2f2f2;
            }

            .tags li a:hover {
                color: #fff;
                background: #214252;
            }



            .categories,
            .sidelink {
                padding: 0;
                margin: 0;
                font-weight: 400;
            }

            .categories li,
            .sidelink li {
                padding: 0;
                margin: 0;
                position: relative;
                margin-bottom: 10px;
                padding-bottom: 10px;
                border-bottom: 1px dotted gray("300");
                list-style: none;
            }

            .categories li:last-child,
            .sidelink li:last-child {
                margin-bottom: 0;
                border-bottom: none;
                padding-bottom: 0;
            }

            .categories li a,
            .sidelink li a {
                display: block;
                font-size: 16px;
            }

            .categories li a span,
            .sidelink li a span {
                position: absolute;
                right: 0;
                top: 0;
                color: #ccc;
                -webkit-transition: .3s all ease;
                -o-transition: .3s all ease;
                transition: .3s all ease;
            }

            .categories li a:hover span,
            .sidelink li a:hover span {
                color: #000;
            }

            .categories li.active a,
            .sidelink li.active a {
                color: #000;
                font-style: italic;
            }

            .comment-form-wrap {
                clear: both;
            }

            .comment-list {
                padding: 0;
                margin: 0;
            }

            .comment-list .children {
                padding: 50px 0 0 40px;
                margin: 0;
                float: left;
                width: 100%;
            }

            .comment-list li {
                padding: 0;
                margin: 0 0 30px 0;
                float: left;
                width: 100%;
                clear: both;
                list-style: none;
            }

            .comment-list li .vcard {
                width: 80px;
                float: left;
            }

            .comment-list li .vcard img {
                width: 50px;
                border-radius: 50%;
            }

            .comment-list li .comment-body {
                float: right;
                width: calc(100% - 80px);
            }

            .comment-list li .comment-body h3,
            .comment-list li .comment-body .h3 {
                font-size: 20px;
                color: #000;
            }

            .comment-list li .comment-body .meta {
                text-transform: none;
                color: #ccc;
            }

            .comment-list li .comment-body .reply {
                padding: 3px 10px;
                background: #f2f2f2;
                color: #000;
                font-size: 13px;
            }

            .comment-list li .comment-body .reply:hover {
                color: #000;
                background: #e3e3e3;
            }

            .post-entry-sidebar .post-meta,
            .post-entry-footer .post-meta {
                font-size: 14px;
                color: #b3b3b3;
            }

            .post-entry-sidebar ul,
            .post-entry-footer ul {
                padding: 0;
                margin: 0;
            }

            .post-entry-sidebar ul li,
            .post-entry-footer ul li {
                list-style: none;
                padding: 0 0 20px 0;
                margin: 0 0 20px 0;
            }

            .post-entry-sidebar ul li a,
            .post-entry-footer ul li a {
                display: table;
                color: #4D4C7D;
            }

            .post-entry-sidebar ul li a img,
            .post-entry-footer ul li a img {
                width: 90px;
            }

            .post-entry-sidebar ul li a img,
            .post-entry-sidebar ul li a .text,
            .post-entry-footer ul li a img,
            .post-entry-footer ul li a .text {
                display: table-cell;
                vertical-align: middle;
            }

            .post-entry-sidebar ul li a .text h4,
            .post-entry-sidebar ul li a .text .h4,
            .post-entry-footer ul li a .text h4,
            .post-entry-footer ul li a .text .h4 {
                font-size: 18px;
            }

            .post-entry-footer ul li {
                margin-bottom: 0;
            }

            .post-entry-footer ul li a {
                color: #fff;
            }

            .search-form-wrap {
                margin-bottom: 5em;
                display: block;
            }

            .search-form-wrap .sidebar-search-form .form-group {
                position: relative;
            }

            .search-form-wrap .sidebar-search-form .form-group #s {
                background: #f7f7f7;
                padding: 15px 15px;
                padding-left: 50px;
            }

            .search-form-wrap .sidebar-search-form [class^="bi-"] {
                position: absolute;
                color: #000;
                top: 50%;
                right: 20px;
                -webkit-transform: translateY(-50%);
                -ms-transform: translateY(-50%);
                transform: translateY(-50%);
            }

            .bio img {
                max-width: 150px;
                border-radius: 50%;
            }

            .bio .bio-body h2 a,
            .bio .bio-body .h2 {
                color: #000;
                font-size: 20px;
            }

            .site-cover {
                background-size: cover;
                background-position: top center;
                position: relative;
            }

            .site-cover>.container {
                position: relative;
                z-index: 2;
            }

            .site-cover.overlay:before {
                background: rgba(0, 0, 0, 0.6);
                position: absolute;
                content: "";
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                z-index: 1;
            }

            .site-cover .post-meta {
                color: #fff;
            }

            .site-cover,
            .site-cover .same-height {
                padding: 3em 0;
            }

            .site-cover.single-page h1,
            .site-cover.single-page .h1 {
                color: #fff;
                font-size: clamp(2rem, 3vw, 5rem);
            }

            .contact-info i {
                font-size: 20px;
                float: left;
                width: 44px;
                height: 44px;
                background: #214252;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                border-radius: 50px;
                -webkit-transition: all 0.3s;
                -o-transition: all 0.3s;
                transition: all 0.3s;
                color: #fff;
            }

            .contact-info h4,
            .contact-info .h4 {
                font-size: 16px;
                padding: 0 0 0 60px;
                color: #214252;
            }

            .contact-info p {
                padding: 0 0 0 60px;
                margin-bottom: 0;
                font-size: 14px;
            }

            .sec-features {
                background-color: #214252;
            }

            .sec-features .feature [class^="bi-"] {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 60px;
                flex: 0 0 60px;
                font-size: 50px;
                position: relative;
                margin-right: 10px;
            }

            .sec-features .feature [class^="bi-"]:before {
                color: #fff;
                z-index: 2;
                position: relative;
            }

            .sec-features .feature [class^="bi-"]:after {
                content: "";
                position: absolute;
                z-index: 1;
                left: -10px;
                width: 50px;
                height: 50px;
                border-radius: 50%;
                background: rgba(77, 76, 125, 0.1);
            }

            .sec-features .feature h3,
            .sec-features .feature .h3 {
                font-size: 18px;
                font-weight: 400;
                color: #fff;
            }

            .sec-features .feature p {
                color: rgba(255, 255, 255, 0.7);
            }

            .sec-features .feature p:last-child {
                margin-bottom: 0;
            }

            .service-alt [class^="bi-"] {
                color: #214252;
                width: 50px;
                height: 50px;
                line-height: 50px;
                font-size: 22px;
                margin-bottom: 0;
                background: #fff;
                display: inline-block;
                text-align: center;
                border-radius: 4px;
                -webkit-box-shadow: 0 5px 30px -5px rgba(0, 0, 0, 0.1);
                box-shadow: 0 5px 30px -5px rgba(0, 0, 0, 0.1);
            }

            .service-alt h3,
            .service-alt .h3 {
                font-size: 20px;
                color: #000;
            }

            .sec-halfs .half-content>div {
                width: 50%;
            }

            @media (max-width: 991.98px) {
                .sec-halfs .half-content>div {
                    width: 100%;
                }
            }

            .sec-halfs .half-content .img {
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }

            @media (max-width: 991.98px) {
                .sec-halfs .half-content .img {
                    height: 450px;
                }
            }

            .sec-halfs .half-content .text {
                padding: 90px;
            }

            @media (max-width: 991.98px) {
                .sec-halfs .half-content .text {
                    padding: 30px;
                }
            }

            .sec-halfs .half-content .heading {
                font-weight: 600;
            }

            .testimonial-half>div {
                width: 50%;
            }

            @media (max-width: 991.98px) {
                .testimonial-half>div {
                    width: 100%;
                }
            }

            .testimonial-half .img {
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }

            @media (max-width: 991.98px) {
                .testimonial-half .img {
                    height: 250px;
                }
            }

            .testimonial-half .text {
                padding: 90px;
            }

            @media (max-width: 991.98px) {
                .testimonial-half .text {
                    padding: 30px;
                }
            }

            .testimonial-half .text blockquote p {
                color: #000;
                font-size: 18px;
                font-family: 'Georgia', serif;
                font-style: italic;
            }

            .testimonial-half .text .author {
                margin-top: 50px;
            }

            .testimonial-half .text .author strong {
                color: #000;
            }

            .site-footer {
                background: #214252;
                font-size: 14px;
                padding: 70px 0;
                color: white;
            }

            .site-footer a {
                color: rgba(255, 255, 255, 0.5);
                position: relative;
                display: inline-block;
            }

            .site-footer a:hover {
                color: #fff;
            }

            .site-footer .footer-cta h2,
            .site-footer .footer-cta .h2 {
                font-size: 30px;
                color: #fff;
            }

            .site-footer .btn:before {
                display: none;
            }

            .site-footer .widget {
                margin-bottom: 40px;
                display: block;
            }

            .site-footer .widget h3,
            .site-footer .widget .h3 {
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-transform: uppercase;
                margin-bottom: 15px;
                color: #fff;
            }

            .site-footer .widget .links {
                width: 150px;
            }

            .site-footer .widget .links li {
                margin-bottom: 10px;
            }

            .site-footer .social li {
                display: inline-block;
            }

            .site-footer .social li a {
                display: inline-block;
                width: 40px;
                height: 40px;
                position: relative;
                background: #fff;
                border-radius: 4px;
                color: #214252;
            }

            .site-footer .social li a:before {
                display: none;
            }

            .site-footer .social li a>span {
                position: absolute;
                top: 50%;
                left: 50%;
                -webkit-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
            }

            .site-footer .social li a:hover {
                background: #fff;
                color: #214252;
            }
            </style>

            </style>
            <div class="" style="margin-top:100px;  ">
                <h1 style="text-align: center;font-weight: 400;color: #000;  font-family: 'Raleway',sans-serif ;  ">
                    MAN'S</h1>
                <div class="section  mt-5" style="z-index: 0;">
                    <div class="row align-items-stretch retro-layout">
                        <div class="col-md-6 rounded-0">
                            <?php
                            $ret = mysqli_query($con, "SELECT * FROM products WHERE category = 10 and subcategory = 23 ORDER BY RAND() LIMIT 1");
                            while ($row = mysqli_fetch_array($ret)) {
                                # code...
                            ?>
                            <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"
                                class="h-entry mb-30 v-height gradient rounded-0"
                                style="height: 1000px;border-radius: 0;"
                                data-title=" <?php echo htmlentities($row['productName']); ?>">
                                <div class="featured-img wow fadeInUpBig"
                                    style="background-image: url('admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>');">
                                </div>

                                <div class="text w-100">
                                    <h2 style="color: #fff;font-size: 18px !important ; ">
                                        <?php echo htmlentities($row['productName']); ?>
                                    </h2>
                                </div>

                            </a>
                            <?php } ?>
                        </div>
                        <div class="col-md-6 rounded-0">
                            <?php
                            $ret = mysqli_query($con, "SELECT * FROM products WHERE category = 10 and subcategory = 17 ORDER BY RAND() LIMIT 1");
                            while ($row = mysqli_fetch_array($ret)) {
                                # code...
                            ?>
                            <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"
                                class="h-entry mb-30 v-height gradient rounded-0"
                                data-title="<?php echo htmlentities($row['productName']); ?>"
                                style="border-radius: 0;height: 670px;">

                                <div class="featured-img wow fadeInUpBig"
                                    style="background-image: url('admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>');">
                                </div>

                                <div class="text w-100">
                                    <h2 style="color: #fff;font-size: 18px ;">
                                        <?php echo htmlentities($row['productName']); ?>
                                    </h2>
                                </div>
                            </a>
                            <?php } ?>
                            <div class="row align-items-stretch retro-layout ">
                                <div class="col-md-6 blog-main">
                                    <?php
                                    $ret = mysqli_query($con, "SELECT * FROM products WHERE category = 10 and subcategory = 18 ORDER BY RAND() LIMIT 1");
                                    while ($row = mysqli_fetch_array($ret)) {
                                        # code...
                                    ?>
                                    <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"
                                        class="h-entry v-height gradient rounded-0"
                                        data-title="<?php echo htmlentities($row['productName']); ?>"
                                        style="border-radius: 0;height: 300px;">
                                        <div class="featured-img wow fadeInUpBig"
                                            style="background-image: url('admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>');">
                                        </div>
                                        <div class="text w-100">
                                            <h2 style="color: #fff;font-size: 18px ;">
                                                <?php echo htmlentities($row['productName']); ?>
                                            </h2>
                                        </div>
                                    </a>
                                    <?php } ?>
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    $ret = mysqli_query($con, "SELECT * FROM products WHERE category = 10 and subcategory = 21 ORDER BY RAND() LIMIT 1");
                                    while ($row = mysqli_fetch_array($ret)) {
                                        # code...
                                    ?>
                                    <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"
                                        class="h-entry v-height gradient rounded-0"
                                        data-title="<?php echo htmlentities($row['productName']); ?>"
                                        style="border-radius: 0;height: 300px;">

                                        <div class="featured-img wow fadeInUpBig"
                                            style="background-image: url('admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>');">
                                        </div>

                                        <div class="text w-100">
                                            <h2 style="color: #fff;font-size: 18px ;">
                                                <?php echo htmlentities($row['productName']); ?>
                                            </h2>
                                        </div>
                                    </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="" style="margin-top:100px;  ">
                <h1 style="text-align: center;font-weight: 400;color: #000;  font-family: 'Raleway',sans-serif ;  ">
                    WOMAN'S
                </h1>
                <div class="section  mt-5" style="z-index: 0;">
                    <div class="row align-items-stretch retro-layout">
                        <div class="col-md-6 rounded-0">
                            <?php
                            $ret = mysqli_query($con, "SELECT * FROM products WHERE category = 8 and subcategory = 24 ORDER BY RAND() LIMIT 1");
                            while ($row = mysqli_fetch_array($ret)) {
                                # code...
                            ?>
                            <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"
                                class="h-entry mb-30 v-height gradient rounded-0"
                                style="height: 1000px;border-radius: 0;"
                                data-title=" <?php echo htmlentities($row['productName']); ?>">
                                <div class="featured-img wow fadeInUpBig"
                                    style="background-image: url('admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>');">
                                </div>

                                <div class="text w-100">
                                    <h2 style="color: #fff;font-size: 18px !important ; ">
                                        <?php echo htmlentities($row['productName']); ?>
                                    </h2>
                                </div>

                            </a>
                            <?php } ?>
                        </div>
                        <div class="col-md-6 rounded-0">
                            <?php
                            $ret = mysqli_query($con, "SELECT * FROM products WHERE category = 8 and subcategory = 15 ORDER BY RAND() LIMIT 1");
                            while ($row = mysqli_fetch_array($ret)) {
                                # code...
                            ?>
                            <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"
                                class="h-entry mb-30 v-height gradient rounded-0"
                                data-title="<?php echo htmlentities($row['productName']); ?>"
                                style="border-radius: 0;height: 485px;">

                                <div class="featured-img wow fadeInUpBig"
                                    style="background-image: url('admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>');">
                                </div>

                                <div class="text w-100">
                                    <h2 style="color: #fff;font-size: 18px ;">
                                        <?php echo htmlentities($row['productName']); ?>
                                    </h2>
                                </div>
                            </a>
                            <?php } ?>
                            <div class="row align-items-stretch retro-layout ">
                                <div class="col-md-12 blog-main">
                                    <?php
                                    $ret = mysqli_query($con, "SELECT * FROM products WHERE category = 8 and subcategory = 16 ORDER BY RAND() LIMIT 1");
                                    while ($row = mysqli_fetch_array($ret)) {
                                        # code...
                                    ?>
                                    <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"
                                        class="h-entry v-height gradient rounded-0"
                                        data-title="<?php echo htmlentities($row['productName']); ?>"
                                        style="border-radius: 0;height: 485px;">
                                        <div class="featured-img wow fadeInUpBig"
                                            style="background-image: url('admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>');">
                                        </div>
                                        <div class="text w-100">
                                            <h2 style="color: #fff;font-size: 18px ;">
                                                <?php echo htmlentities($row['productName']); ?>
                                            </h2>
                                        </div>
                                    </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 btn-card-box">
                <div class="btn-card">
                    <i id="MYGRID6" class='bx bx-square'></i>
                    <i id="MYGRID2" class='bx bx-grid-alt icon'></i>
                    <i id="MYGRID12" class='bx bx-grid'></i>
                </div>
            </div>

            <style>
            .btn-card-box {
                padding: 20px;
                position: sticky;
                top: 20%;
                background: white;
                z-index: 999;
            }

            .btn-card {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .btn-card i {
                font-size: 23px;
                margin-left: 10px;
            }

            .card .image {
                background: #f2f3f8 !important;
                width: 100%;
                height: 100%;
            }

            .box-card {
                display: flex;
                align-items: center;
                justify-content: start;
                width: 100%;
                flex-wrap: wrap;
            }
            </style>
            <div class="box-card">
                <?php
                $ret = mysqli_query($con, "SELECT * FROM products  where category ORDER BY RAND() ");
                while ($row = mysqli_fetch_array($ret)) {
                    # code...
                ?>
                <div class="card wow fadeInUpBig">
                    <div class="image  responsiveCard" data-wow-delay="0.1s">
                        <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                            <img src=" admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                width=" 100%" height="100%" alt=""></a>
                    </div><!-- /.image -->
                </div>
                <?php } ?>
            </div>
            <script>
            document.getElementById('MYGRID6').addEventListener('click', function() {
                var boxes = document.querySelectorAll(
                    '.responsiveCard'); // Select all elements with the class 'myBox'
                boxes.forEach(function(box) {
                    box.style.width = "765px"; // Toggle 'active' class for each box
                });
            });
            document.getElementById('MYGRID2').addEventListener('click', function() {
                var boxes = document.querySelectorAll(
                    '.responsiveCard'); // Select all elements with the class 'myBox'
                boxes.forEach(function(box) {
                    box.style.width = "220px"; // Toggle 'active' class for each box
                });
            });
            document.getElementById('MYGRID12').addEventListener('click', function() {
                var boxes = document.querySelectorAll(
                    '.responsiveCard'); // Select all elements with the class 'myBox'
                boxes.forEach(function(box) {
                    box.style.width = "100px"; // Toggle 'active' class for each box
                });
            });
            </script>
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
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            type: "fraction",
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    </script>

    <script>
    var swiper = new Swiper(".mySwiper2", {
        slidesPerView: 5,
        spaceBetween: 110,
        loop: true,
        fade: "true",
        grabCursor: "true",
        freeMode: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },

        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            700: {
                slidesPerView: 2,
            },
            868: {
                slidesPerView: 2,
            },
            1400: {
                slidesPerView: 4,
            },
        },
    });
    </script>
    <script>
    var swiper = new Swiper(".mySwiper3", {
        spaceBetween: 10,
        loop: true,
        centerSlide: true,
        centeredSlides: true,
        fade: "true",
        grabCursor: "true",
        freeMode: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },

        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            700: {
                slidesPerView: 1,
            },
            868: {
                slidesPerView: 2,
            },
            1400: {
                slidesPerView: 3,
            },
        },
    });
    </script>
    <script src="https://unpkg.com/scrollreveal"></script>

    <script>
    const scrollRevealOption = {
        distance: "50px",
        origin: "bottom",
        duration: 500,
    };

    ScrollReveal().reveal(" .mySwiper ", {
        ...scrollRevealOption,
        origin: "right",
        delay: 800,
    });
    ScrollReveal().reveal(" .bg-video-wrap video", {
        ...scrollRevealOption,
        origin: "bottom",
        delay: 500,
    });

    ScrollReveal().reveal(" .section .retro-layout .featured-img", {
        ...scrollRevealOption,
        origin: "bottom",
        delay: 500,
    });
    </script>

</body>

</html>