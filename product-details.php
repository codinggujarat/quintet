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
                echo "<script>alert('Product has been added to the cart')</script>";
                echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
            } else {
                $message = "Product ID is invalid";
            }
        }
    }
    $pid = intval($_GET['pid']);
    if (isset($_GET['pid']) && $_GET['action'] == "wishlist") {
        if (strlen($_SESSION['login']) == 0) {
            header('location:login.php');
        } else {
            mysqli_query($con, "insert into wishlist(userId,productId) values('" . $_SESSION['id'] . "','$pid')");
            echo "<script>alert('Product aaded in wishlist');</script>";
            header('location:my-wishlist.php');
        }
    }
    if (isset($_POST['submit'])) {
        $qty = $_POST['quality'];
        $price = $_POST['price'];
        $value = $_POST['value'];
        $name = $_POST['name'];
        $summary = $_POST['summary'];
        $review = $_POST['review'];
        mysqli_query($con, "insert into productreviews(productId,quality,price,value,name,summary,review) values('$pid','$qty','$price','$value','$name','$summary','$review')");
    }


    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keywords" content="MediaCenter, Template, eCommerce">
        <meta name="robots" content="all">
        <title>
            <?php
            $ret = mysqli_query($con, "select * from products where id='$pid'");
            while ($row = mysqli_fetch_array($ret)) {

            ?>
            <?php echo htmlentities($row['productName']); ?> | EXPLORE OUR NEW ARRIVALS | QUINTET
            <?php $cid = $row['category'];
                $subcid = $row['subCategory'];
            } ?>
        </title>
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

        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
        <link rel="manifest" href="assets/favicon/site.webmanifest">
        <!-- Favicon -->
        <!-- box-icon -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;1,300&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
            integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <link href="https://api.fontshare.com/v2/css?f[]=panchang@300,500&f[]=cabinet-grotesk@300&display=swap"
            rel="stylesheet">
        <style>
        .buttonsize {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 5px;
            padding: 0;
        }

        .buttonsize label.btn {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .buttonsize label {
            width: 100px;
            height: 30px;
            font-size: 12px;
        }

        .buttonsize label,
        .buttonsize input {
            display: block;
            font-weight: 100;
            border-radius: 0 !important;
            background: transparent;
            color: #000;
            border: 1px solid black;
        }

        .buttonsize input[type="radio"] {
            opacity: 0.011;
        }

        .buttonsize input[type="radio"]:checked+label {
            background: #000;
            color: #fff;
        }

        .buttonsize label {
            cursor: pointer;
        }

        .sizebtns {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            height: 80px;
            width: 100%;
            margin: 0;
            margin-bottom: 10px;
            padding: 0;
        }

        .buttonsize .btn.noselect {
            cursor: no-drop;
            background: #f2f3f8 !important;
            color: #000 !important;
        }
        </style>
    </head>

    <body class="cnt-home" style="background:#ffffff;">

        <header class="header-style-1">

            <!-- ============================================== TOP MENU ============================================== -->
            <?php include('includes/top-header.php'); ?>
            <!-- ============================================== TOP MENU : END ============================================== -->
            <?php include('includes/main-header.php'); ?>
            <!-- ============================================== NAVBAR ============================================== -->
            <?php include('includes/menu-bar.php'); ?>
            <?php include('includes/search.php'); ?>

            <!-- ============================================== NAVBAR : END ============================================== -->

        </header>

        <!-- ============================================== HEADER : END ============================================== -->
        <div class="body-content " style="background:#ffffff;">
            <div>
                <div class='row single-product outer-bottom-sm '>
                    <?php
                    $ret = mysqli_query($con, "select * from products where id='$pid'");
                    while ($row = mysqli_fetch_array($ret)) {

                    ?>

                    <div class='col-md-12'>
                        <style>
                        .productDescription2 {
                            width: 100%;
                            height: 100%;
                            border: 1px solid black !important;
                            margin: 0 !important;
                            font-family: 'Poppins', sans-serif !important;
                            font-weight: 400 !important;
                        }

                        .productDescription2 img {
                            width: 100%;
                            height: 100%;
                        }

                        .more {
                            border: 0;
                            outline: 0;
                            background: transparent;
                            text-decoration: underline;
                            color: #000;
                        }

                        .mobliediscription {
                            display: none !important;
                        }

                        @media only screen and (max-width: 1200px) {
                            .desktopDiscription {
                                display: none !important;
                            }



                            .breadcrumbs {
                                display: none;
                            }

                            .singlepro {
                                width: 100%;
                            }

                            .mySwiper2 {
                                width: 100% !important;
                                height: 90vh !important;
                                margin: 0;
                                padding: 0;
                            }

                        }

                        @media only screen and (max-width: 750px) {

                            .main-product-img,
                            .mySwiper2 {
                                position: fixed;
                                top: 0%;
                                left: 0;
                                width: 100% !important;
                                height: 100vh !important;
                                z-index: -9999;
                            }

                            .body-content {
                                padding: 0;
                                margin-top: 145% !important;
                            }

                            .main-header {
                                background: linear-gradient(rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8));
                            }
                        }

                        .mainrowpro {
                            display: flex !important;
                            align-items: start !important;
                            justify-content: start !important;
                        }

                        @media only screen and (max-width: 500px) {
                            .mobliediscription {
                                display: block !important;
                            }

                            .mainrowpro {
                                width: 100%;
                                display: block !important;
                            }

                            .product-info-block {
                                width: 100% !important;
                            }
                        }
                        </style>
                        <div class=" row mainrowpro">
                            <div class=" col-xs-0 col-sm-0 col-md-3 desktopDiscription"
                                style="position: relative !important;display:flex;justify-content: center !important;padding-left:5%; align-items: center !important; ">
                                <div class="col-xs-12 col-sm-12 col-md-3 gallery-holder productDescription2">
                                    <div class="product-tab productDescription" id="more"
                                        style="background:#fff;border: 0 !important ; ">
                                        <p class="text "
                                            style="font-family: 'Poppins', sans-serif !important;font-weight: 400 !important;text-transform:uppercase;font-size: 12px  !important ; font-weight: 400 !important ;padding:10px;font-family: 'Raleway' , sans-serif ; color:black;">
                                            <?php echo $row['productDescription']; ?>
                                            <hr>
                                        </p>
                                    </div>
                                    <button class="more" onclick="more()">view more...</button>
                                </div>
                            </div>
                            <script>
                            function more() {
                                isvisible = document.getElementById("more").style.height = "492px";

                                if (isvisible) {
                                    document.querySelector(".more").innerHTML = "view less...";
                                } else {
                                    document.getElementById("more").style.height = "300px";
                                }
                            }
                            </script>

                            <style>
                            .main-header:hover {
                                background: transparent !important;
                            }

                            .mySwiper2 {
                                width: 350px;
                                height: 500px;
                                margin: 0;
                                padding: 0;
                            }

                            .mySwiper2 .swiper-wrapper {
                                width: 100%;
                                margin: 0;
                                padding: 0;
                                height: 100%;
                            }

                            .mySwiper {
                                margin: 0;
                                padding: 0;
                                width: 200px;
                            }

                            .mySwiper .swiper-wrapper {
                                display: block;
                                margin: 0;
                                padding: 0;
                            }

                            .mySwiper .swiper-slide {
                                width: 100%;
                                height: 100%;
                                opacity: 0.4;
                            }

                            .mySwiper .swiper-slide-thumb-active {
                                opacity: 1;


                                border: 1px solid black;
                            }

                            .swiper-slide img {
                                display: block;
                                width: 100%;
                                height: 100%;
                                object-fit: cover;
                            }

                            .singlepro {
                                display: flex;
                                align-items: start;
                                justify-content: start;
                                margin: 0;
                                padding: 0;
                            }

                            .product-info {
                                border: 1px solid black;
                                margin: 0;
                                padding: 0;

                            }

                            .product-info-block {
                                margin: 0;
                                padding: 0;
                            }

                            .mobilecartbtn {
                                display: none !important;
                            }

                            @media only screen and (max-width: 750px) {
                                .mobilecartbtn {
                                    display: flex !important;
                                }

                                .desktopcart {
                                    display: none !important;
                                }

                                .singlepro {
                                    flex-wrap: wrap;
                                }

                                .mySwiper {
                                    margin: 0;
                                    padding: 10px 0px;
                                    width: 100%;
                                    /* overflow: auto; */
                                }

                                .mySwiper .swiper-wrapper {
                                    display: flex;
                                    justify-content: start;
                                    padding: 0;

                                    margin-left: 20px;
                                }

                                .mySwiper .swiper-wrapper .swiper-slide {
                                    width: 60px !important;
                                    padding: 0 !important;
                                    margin: 0 !important;

                                }


                                .mySwiper .swiper-wrapper .swiper-slide img {
                                    object-fit: cover;
                                    padding: 0 !important;
                                    margin: 0 !important;

                                }

                                .mySwiper .swiper-wrapper .swiper-slide:first-child {
                                    margin-left: 0;
                                }

                                .product-info-block {
                                    width: 97%;
                                }

                                .product-info {

                                    margin-left: 10px;
                                    margin-right: 10px;
                                }
                            }

                            .product-info-block {
                                width: 350px;
                            }
                            </style>
                            <div class="singlepro col-xs-12 col-sm-8 col-md-5  ">
                                <div class="swiper mySwiper2  main-product-img ">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <a data-lightbox="image-1"
                                                data-title=" <?php echo htmlentities($row['productName']); ?>"
                                                href="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>">
                                                <img class="img-responsive" alt=""
                                                    src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" />
                                            </a>
                                        </div>
                                        <div class="swiper-slide">
                                            <a data-lightbox="image-1"
                                                data-title=" <?php echo htmlentities($row['productName']); ?>"
                                                href="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage2']); ?>">
                                                <img class="img-responsive" alt=""
                                                    src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage2']); ?>"
                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage2']); ?>" />
                                            </a>
                                        </div>
                                        <div class="swiper-slide">
                                            <a data-lightbox="image-1"
                                                data-title=" <?php echo htmlentities($row['productName']); ?>"
                                                href="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage3']); ?>">
                                                <img class="img-responsive" alt=""
                                                    src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage3']); ?>"
                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage3']); ?>" />
                                            </a>
                                        </div>
                                        <div class="swiper-slide">
                                            <a data-lightbox="image-1"
                                                data-title=" <?php echo htmlentities($row['productName']); ?>"
                                                href="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageFour']); ?>">
                                                <img class="img-responsive" alt=""
                                                    src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageFour']); ?>"
                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageFour']); ?>" />
                                            </a>
                                        </div>
                                        <div class="swiper-slide">
                                            <a data-lightbox="image-1" `
                                                data-title=" <?php echo htmlentities($row['productName']); ?>"
                                                href="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageFive']); ?>">
                                                <img class="img-responsive" alt=""
                                                    src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageFive']); ?>"
                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageFive']); ?>" />
                                            </a>
                                        </div>
                                        <div class="swiper-slide">
                                            <a data-lightbox="image-1"
                                                data-title=" <?php echo htmlentities($row['productName']); ?>"
                                                href="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageSix']); ?>">
                                                <img class="img-responsive" alt=""
                                                    src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageSix']); ?>"
                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageSix']); ?>" />
                                            </a>
                                        </div>
                                    </div>
                                    <style>
                                    .swiper-scrollbar {
                                        background: white !important;
                                    }
                                    </style>
                                    <div class="swiper-scrollbar"></div>
                                </div>
                                <div thumbsSlider="" class="swiper mySwiper    ">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img class="img-responsive" alt="" src="img/firstani1 (1).gif"
                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img class="img-responsive" alt="" src="img/firstani1 (1).gif"
                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage2']); ?>" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img class="img-responsive" alt="" src="img/firstani1 (1).gif"
                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage3']); ?>" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img class="img-responsive" alt="" src="img/firstani1 (1).gif"
                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageFour']); ?>" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img class="img-responsive" alt="" src="img/firstani1 (1).gif"
                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageFive']); ?>" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img class="img-responsive" alt="" src="img/firstani1 (1).gif"
                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageSix']); ?>" />
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <!-- Swiper JS -->
                            <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

                            <!-- Initialize Swiper -->
                            <script>
                            var swiper = new Swiper(".mySwiper", {

                                slidesPerView: 6,
                                freeMode: true,
                                watchSlidesProgress: true,
                            });
                            var swiper2 = new Swiper(".mySwiper2", {
                                direction: "vertical",
                                scrollbar: {
                                    el: ".swiper-scrollbar",
                                    hide: true,
                                },

                                navigation: {
                                    nextEl: ".swiper-button-next",
                                    prevEl: ".swiper-button-prev",
                                },
                                thumbs: {
                                    swiper: swiper,
                                },
                            });
                            </script>
                            <div class='col-xs-12 col-sm-4 col-md-2 product-info-block'
                                style="padding: 0 !important; margin: 0 !important; background:#ffffff;">
                                <div class="product-info " style="height:100% !important;">
                                    <h1 class="name col-sm-12" style="margin-top: 20px !important;font-family:
                                    sans-serif, 'Poppins' !important;text-transform:uppercase;font-size: 12px;
                                    font-weight: 400;color: #000; ">
                                        <?php echo htmlentities($row['productName']); ?>
                                    </h1>
                                    <div class="col-sm-12">
                                        <div class="">
                                            <div class="price-box"
                                                style="display: flex;align-items: center;justify-content: start ;   ">
                                                <span class="price"
                                                    style="font-family: 'Poppins',sans-serif !important;color: #000; font-size: 12px;font-weight: 300; ">MRP.
                                                    &#8377;&nbsp;
                                                    <?php echo htmlentities($row['productPrice']); ?></span>
                                                <span
                                                    style="font-family: 'Poppins',sans-serif !important;color: #000; font-size: 12px;font-weight: 300; margin-left: 20px; "
                                                    class="price-strike">
                                                    <del>
                                                        MRP.
                                                        &#8377;&nbsp;<?php echo htmlentities($row['productPriceBeforeDiscount']); ?>
                                                    </del>
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class=" stock-container info-container col-sm-12">
                                        <p
                                            style="margin-top:5px;font-family: 'Poppins',sans-serif !important;color: #000; font-size: 10px;font-weight: normal;font-weight: 200">
                                            MRP incl. of all taxes</p>
                                        <hr style="border-top: 1px solid black;">

                                    </div>

                                    <?php $rt = mysqli_query($con, "select * from productreviews where productId='$pid'");
                                        $num = mysqli_num_rows($rt); {
                                        ?>
                                    <div class="mobilecartbtn  stock-container info-container col-sm-12"
                                        style="margin-bottom: 30px; justify-content:space-around; width: 100%; display: flex;">
                                        <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                        <a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                            class="btn "
                                            style="text-transform: uppercase;font-weight: 500;   border-radius: 0 !important ;padding: 10px 20px; font-size: 12 !important ;display: flex;align-items: center;justify-content: center;  background: transprant !important ;   font-family: 'Poppins', sans-serif !important;font-weight: 400 !important; font-size: 12px !important ; color:#000 !important;   width: 80% !important ;  height: 40px !important ;border:1px solid black;  ">
                                            ADD </a>
                                        <?php } else { ?>

                                        <a href="#" class="btn "
                                            style="cursor  :no-drop !important; text-transform: uppercase;font-weight: 500 !important;   border-radius: 0 !important ;padding: 10px 20px; font-size: 12px !important ;font-family: 'Raleway' , sans-serif !important; font-size: 18px; display: flex;align-items: center;justify-content: center;  background: #fff !important ;   font-family: 'Poppins', sans-serif !important;font-weight: 400 !important; font-size: 12px !important ; color:#000 !important;border:0;border-top:1px solid black;  width: 80% !important ;  height: 40px !important ;   ">
                                            Out of Stock</a>
                                        <?php } ?>
                                        <a class="btn" title="favourites"
                                            style="border: 1px solid black; text-transform: uppercase;font-weight: 500;   border-radius: 0 !important ;padding: 10px 20px; font-size: 12 !important ;display: flex;align-items: center;justify-content: center;  background:transparent !important ;   font-family: 'Poppins', sans-serif !important;font-weight: 400 !important; font-size: 12px !important ; color:#fff !important;   width: 10% !important ;  height: 40px !important ; "
                                            href="
                                                product-details.php?pid=<?php echo htmlentities($row['id']) ?>&&action=wishlist">
                                            <i class="fa-regular fa-bookmark"
                                                style=" color:#000 ;font-weight: 400;"></i>

                                        </a>
                                    </div>
                                    <div class=" stock-container info-container col-sm-12">
                                        <p
                                            style="margin:0;padding:0;  font-family: 'Poppins', sans-serif !important;font-weight: 300 !important; font-size: 10px; color: #000;text-transform:capitalize ;">
                                            <?php echo $row['ProductCare']; ?>
                                        </p>
                                        <p
                                            style="margin:0;padding:0;  font-family: 'Poppins', sans-serif !important;font-weight: 300 !important; font-size: 10px; color: #000;text-transform:capitalize ;">
                                            Check in-store availability
                                        </p>
                                        <p
                                            style="margin:0;padding:0;  font-family: 'Poppins', sans-serif !important;font-weight: 300 !important; font-size: 10px; color: #000;text-transform:capitalize ;">
                                            SHIPPING, EXCHANGES AND RETURNS
                                        </p>
                                        <hr style="border-top: 1px solid black;">
                                    </div>
                                    <!-- /.rating-reviews -->
                                    <style>
                                    @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');
                                    </style>
                                    <?php } ?>

                                    <div class=" stock-container info-container"
                                        style="border: 0 !important;margin-top: 20px !important;">
                                        <div class="col-sm-12"
                                            style="display: flex;align-items: center;justify-content:space-between;   width: 100%; ">
                                            <div class="">
                                                <div class="stock-box">
                                                    <span class="label"
                                                        style="  font-family: 'Poppins', sans-serif !important;font-weight: 400 !important; font-size: 11px; color: #000;text-transform:capitalize ;  ">Availability
                                                        : </span>
                                                </div>
                                            </div>
                                            <div class=" ">
                                                <div class="stock-box">
                                                    <span class="value"
                                                        style="  font-family: 'Poppins', sans-serif !important;font-weight: 400 !important; font-size: 12px; color: #000;text-transform:capitalize ;"><?php echo htmlentities($row['productAvailability']); ?></span>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div>



                                    <div class="stock-container info-container  " style="border: 0 !important;">
                                        <div class="col-sm-12"
                                            style="display: flex;align-items: center;justify-content: space-between;   width: 100%;margin-top: 10px !important; ">
                                            <div class="" style="border: 0 !important;">
                                                <div class="stock-box">
                                                    <span class="label"
                                                        style="  font-family: 'Poppins', sans-serif !important;font-weight: 400 !important; font-size: 12px; color: #000;text-transform:capitalize; ">
                                                        Brand
                                                        :</span>
                                                </div>
                                            </div>
                                            <div class="" style="border: 0 !important;">
                                                <div class="stock-box" style="border: 0 !important;">
                                                    <span class="value"
                                                        style="font-family: 'Poppins', sans-serif !important;font-weight: 400 !important; font-size: 12px; color: #000;"><?php echo htmlentities($row['productCompany']); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="rating-reviews m-t-10 ">
                                        <div class="col-sm-12"
                                            style="display: flex;align-items: center;justify-content: space-between;   width: 100%;margin-top: 10px;  ">
                                            <div class="">
                                                <div class="rating rateit-small"
                                                    style="font-family: sans-serif, ' Poppins'!important;">
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="reviews">
                                                    <a href="#" class="lnk"
                                                        style="font-weight: 400 !important ;  font-family: sans-serif,'Poppins';color: #000; font-size: 12px;text-transform: uppercase; ">(<?php echo htmlentities($num); ?>
                                                        Reviews)</a>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div>

                                    <div class="price-container info-container"
                                        style="margin: 0px !important;padding:0 !important; border:0; ">

                                        <div class="stock-container info-container " :
                                            style="box-shadow:none; border: none !important;outline:0;">
                                            <div class="col-sm-12"
                                                style="display: block;align-items: center;border:none;justify-content:space-between;   width: 100%;margin-top: 10px !important;margin-bottom: 10px !important; ">
                                                <div class="" style="border: 0 !important;">
                                                    <div class="stock-box" style="border: 0 !important;">
                                                        <span class="label"
                                                            style=" font-weight: 400;  font-family: 'Raleway', sans-serif; font-size: 12px; color: #000;text-transform:capitalize; ">
                                                            Colour
                                                            :<?php echo htmlentities($row['productColor']); ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="" style="border: 0 !important;">
                                                    <div class="stock-box"
                                                        style=" font-family: 'Raleway', sans-serif;display: flex;align-items: center;  ">
                                                        <div class="color-box"
                                                            style="border: 1px solid black; width: 25px;height: 25px; background: <?php echo htmlentities($row['productColor']); ?>;  ">

                                                        </div>

                                                    </div>
                                                </div>
                                            </div><!-- /.row -->
                                        </div>
                                        <div class="sizebtns">
                                            <div class="buttonsize">
                                                <?php if ($row['productSizes'] == 'S') { ?>
                                                <input type="radio" name="productSizes" value="S" id="sizeS" />
                                                <label class="btn " for="sizeS">
                                                    S
                                                </label>
                                                <?php } else { ?>
                                                <input type="radio" name="productSizes" value="S" id="sizeS" />
                                                <label class="btn noselect" for="sizeS">
                                                    <del>
                                                        S
                                                    </del>
                                                </label>
                                                <?php } ?>
                                            </div>
                                            <div class="buttonsize">
                                                <?php if ($row['productSizes'] == 'M') { ?>
                                                <input type="radio" name="productSizes" value="M" id="sizeM" required />
                                                <label class="btn " for="sizeM">M</label>
                                                <?php } else { ?>
                                                <input type="radio" name="productSizes" value="M" id="sizeM" />
                                                <label class="btn noselect" for="sizeM">
                                                    <del>
                                                        M
                                                    </del>
                                                </label>
                                                <?php } ?>
                                            </div>

                                            <div class="buttonsize">
                                                <?php if ($row['productSizes'] == 'L') { ?>
                                                <input type="radio" name="productSizes" value="L" id="sizeL" />
                                                <label class="btn " for="sizeL">L</label>
                                                <?php } else { ?>
                                                <input type="radio" name="productSizes" value="L" id="sizeL" />
                                                <label class="btn noselect" for="sizeL">
                                                    <del>
                                                        L
                                                    </del>
                                                </label>
                                                <?php } ?>
                                            </div>
                                            <div class="buttonsize">
                                                <?php if ($row['productSizes'] == 'XL') { ?>
                                                <input type="radio" name="productSizes" value="XL" id="sizeXL" />
                                                <label class="btn " for="sizeXL">XL</label>
                                                <?php } else { ?>
                                                <input type="radio" name="productSizes" value="XL" id="sizeXL" />
                                                <label class="btn  noselect" for="sizeXL">
                                                    <del>
                                                        XL
                                                    </del>
                                                </label>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <style>
                                        .favorite-button {
                                            position: absolute;
                                            right: 0;
                                            top: 0;
                                        }
                                        </style>
                                        <div class="desktopcart">
                                            <div class="favorite-button m-t-10">
                                                <a class="btn" title="favourites"
                                                    style="text-transform: uppercase;font-weight: 500;   border-radius: 0 !important ;padding: 10px 20px; font-size: 12 !important ;display: flex;align-items: center;justify-content: center;  background:transparent !important ;   font-family: 'Poppins', sans-serif !important;font-weight: 400 !important; font-size: 12px !important ; color:#fff !important;   width: 20% !important ;  height: 40px !important ; "
                                                    href="
                                                product-details.php?pid=<?php echo htmlentities($row['id']) ?>&&action=wishlist">
                                                    <i class="fa-regular fa-bookmark"
                                                        style=" color:#000 ;font-weight: 400;"></i>

                                                </a>
                                            </div>
                                        </div>
                                        <div class="desktopcart" style="width: 100%; display: flex;">
                                            <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                            <a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                class="btn "
                                                style="text-transform: uppercase;font-weight: 500;   border-radius: 0 !important ;padding: 10px 20px; font-size: 12 !important ;display: flex;align-items: center;justify-content: center;  background: #000 !important ;   font-family: 'Poppins', sans-serif !important;font-weight: 400 !important; font-size: 12px !important ; color:#fff !important;   width: 100% !important ;  height: 40px !important ;border:0;border-top:1px solid black;  ">
                                                ADD </a>
                                            <?php } else { ?>

                                            <a href="#" class="btn "
                                                style="cursor  :no-drop !important; text-transform: uppercase;font-weight: 500 !important;   border-radius: 0 !important ;padding: 10px 20px; font-size: 12px !important ;font-family: 'Raleway' , sans-serif !important; font-size: 18px; display: flex;align-items: center;justify-content: center;  background: #fff !important ;   font-family: 'Poppins', sans-serif !important;font-weight: 400 !important; font-size: 12px !important ; color:#000 !important;border:0;border-top:1px solid black;  width: 100% !important ;  height: 40px !important ;   ">
                                                Out of Stock</a>
                                            <?php } ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="  col-md-12 desktopDiscription mobliediscription"
                                    style="background:#ffffff;">
                                    <div class="accordion">
                                        <div class="accordion-content">
                                            <header>
                                                <span class="title">COMPOSITION, CARE & ORIGIN COMPOSITION</span>
                                                <i class="fa-solid fa-plus"></i>
                                            </header>
                                            <pre class="description">
                                        <?php echo $row['productDescription']; ?>
                                    </pre>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.price-container -->
                    </div><!-- /.product-info -->
                </div><!-- /.col-sm-7 -->
            </div><!-- /.row -->
        </div><!-- /.col -->
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');



        .accordion {
            width: 100%;
            background: #FFF;
            padding: 7px;
            margin-top: 20px;
            margin-bottom: 20px;
            border: 1px solid black;
        }

        .accordion .accordion-content {
            background: transparent;
            overflow: hidden;
            margin-top: 10px;
        }


        .accordion-content.open {
            padding-bottom: 10px;
        }

        .accordion-content header {
            display: flex;
            cursor: pointer;
            height: 10px;
            align-items: center;
            justify-content: space-between;
            transition: all 0.5s linear;
        }

        .accordion-content.open header {
            margin-bottom: 20px;
        }

        .accordion-content header .title {
            font-size: 11px;
            font-weight: 400;
            color: black;
            font-family: 'Poppins', sans-serif;
        }

        .accordion-content header i {
            font-size: 9px;
            color: black;
        }

        .accordion-content .description {
            height: 0;
            font-size: 12px;
            color: black;
            font-weight: 400;
            padding: 0 15px;
            transition: all 0.2s linear;
            /* overflow: hidden !important; */
            text-overflow: ellipsis !important;
            white-space: wrap !important;
            width: 100%;
            border: 0 !important;
            background: transparent;
            font-family: 'poppins', sans-serif;
        }

        .description img {
            width: 100%;
            height: 100%;
        }

        .accordion-content .description::-webkit-scrollbar {
            display: none !important;
        }
        </style>

        <?php $cid = $row['category'];
                        $subcid = $row['subCategory'];
                    } ?>
        <!-- ============================================== UPSELL PRODUCTS ============================================== -->
        <div class="section featured-product  col-lg-12" style="background:#ffffff;">

            <style>
            .productimagetab {
                display: grid;
                grid-template-columns: repeat(6, 1fr);
                grid-auto-rows: auto;
                width: 100%;
            }
            </style>
            <div class=" btn-card-box">
                <div class="btn-card">
                    <div class="">
                        <h3 class="section-title" style="text-align: left; font-weight:400; text-transform:uppercase;font-family: 'Poppins', sans-serif !important;
                        font-weight: 400 !important;font-size:12px;color: #000;  ">
                            You may be interested in
                        </h3>
                    </div>
                    <div class="">
                        <svg id="MYGRID6" width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="4" y="4" width="16" height="16" stroke="black" stroke-width="1"
                                stroke-linecap="none" stroke-linejoin="round" />
                        </svg>
                        <svg id="MYGRID2" width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                            style="margin-left: 10px;" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.5 3.5H10.5V20.5H3.5V3.5Z" stroke="#000000" stroke-width="1"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M13.5 3.5H20.5V20.5H13.5V3.5Z" stroke="#000000" stroke-width="1"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg id="MYGRID12" width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                            style="margin-left: 10px;" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.5 3.5H10.5V10.5H3.5V3.5Z" stroke="#000000" stroke-width="1"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M3.5 13.5H10.5V20.5H3.5V13.5Z" stroke="#000000" stroke-width="1"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M13.5 3.5H20.5V10.5H13.5V3.5Z" stroke="#000000" stroke-width="1"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M13.5 13.5H20.5V20.5H13.5V13.5Z" stroke="#000000" stroke-width="1"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
            </div>
            <script>
            // Click handler for MYGRID6 button
            document.getElementById('MYGRID6').addEventListener('click', function() {
                var gridContainer = document.querySelector(
                    '.productimagetab'); // Assuming your grid container has this class

                // Change the grid layout to 6 columns
                gridContainer.style.gridTemplateColumns = "repeat(2, 1fr)";

                var boxes = document.querySelectorAll(
                    '.productimagetab'); // Select all elements with the class 'productimagetab'
                boxes.forEach(function(box) {
                    box.style.width = "100%"; // Adjust width of each box
                });

                var productName = document.querySelectorAll('.productName');
                productName.forEach(function(productName) {
                    productName.style.display = "none"; // Hide product name
                });
            });

            // Click handler for MYGRID2 button
            document.getElementById('MYGRID2').addEventListener('click', function() {
                var gridContainer = document.querySelector(
                    '.productimagetab'); // Assuming your grid container has this class

                // Change the grid layout to 2 columns
                gridContainer.style.gridTemplateColumns = "repeat(6, 1fr)";

                var boxes = document.querySelectorAll('.productimagetab');
                boxes.forEach(function(box) {
                    box.style.width = "100%"; // Adjust width of each box
                });

                var productName = document.querySelectorAll('.productName');
                productName.forEach(function(productName) {
                    productName.style.display = "block"; // Show product name
                });
            });

            // Click handler for MYGRID12 button
            document.getElementById('MYGRID12').addEventListener('click', function() {
                var gridContainer = document.querySelector(
                    '.productimagetab'); // Assuming your grid container has this class

                // Change the grid layout to 12 columns
                gridContainer.style.gridTemplateColumns = "repeat(7, 1fr)";

                var boxes = document.querySelectorAll('.productimagetab');
                boxes.forEach(function(box) {
                    box.style.width = "100%"; // Adjust width of each box
                });

                var productName = document.querySelectorAll('.productName');
                productName.forEach(function(productName) {
                    productName.style.display = "none"; // Hide product name
                });
            });
            </script>
            <style>
            .btn-card-box {
                margin-top: -100px;
                padding: 20px;
                position: sticky;
                top: 12%;
                background: transparent;
                z-index: 9999999 !important;
            }

            .btn-card {
                display: flex;
                align-items: center;
                justify-content: space-between;
                width: 100%;
                margin: 0;
                padding: 0;
                border-bottom: 1px solid black;
            }


            .card .image {
                width: auto;
                height: 100%;
                border: 1px solid black;
            }


            .box-card {
                display: flex;
                align-items: start;
                justify-content: center;
                width: 100%;
                height: 100%;
                margin: 0;
                padding: 0;
                flex-wrap: wrap;
                margin: 10px;
                height: 100%;

            }

            .responsiveCard {
                height: 100vh;
                width: 100%;
            }
            </style>
            <div class="productimagetab">
                <?php
            $qry = mysqli_query($con, "select * from products where subCategory='$subcid' and category='$cid' ORDER BY RAND()");
            while ($rw = mysqli_fetch_array($qry)) {
            ?>
                <style>
                @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');

                .product {
                    height: 100%;
                    margin: 0;
                    width: auto;
                    padding: 0;
                    flex-wrap: wrap;
                    height: 100%;
                    border: 1px solid black !important;

                }

                @media only screen and (max-width: 1200px) {
                    .productimagetab {
                        grid-template-columns: repeat(5, 1fr);
                    }
                }

                @media only screen and (max-width: 1000px) {
                    .productimagetab {
                        grid-template-columns: repeat(4, 1fr);
                    }
                }

                @media only screen and (max-width: 550px) {

                    .productimagetab {
                        grid-template-columns: repeat(2, 1fr);
                    }
                }


                .name a {
                    font-size: 0.999999999rem !important;
                }

                .product-info {
                    width: 100%;
                    border-top: 1px solid black;

                }

                .name {
                    width: 80% !important;
                    overflow: hidden !important;
                    text-overflow: ellipsis !important;
                    white-space: nowrap !important;
                }


                @media only screen and (max-width: 800px) {


                    .addtocart {
                        display: none !important;
                    }

                    .name {
                        width: 140px !important;
                        overflow: hidden !important;
                        text-overflow: ellipsis !important;
                        white-space: nowrap !important;
                    }


                    .name a {
                        font-size: 10px !important;
                    }

                    .product-info .favorites {
                        display: none;
                    }
                }

                @media only screen and (max-width: 500px) {

                    .name {
                        width: 140px !important;
                        overflow: hidden !important;
                        text-overflow: ellipsis !important;
                        white-space: nowrap !important;
                    }


                    .name a {
                        font-size: 10px !important;
                    }

                    .name {
                        width: 100% !important;
                    }

                }


                .product-info .favorites {
                    position: absolute;
                    right: 0;
                    top: 10px;
                    width: 20px;
                    height: 20px;
                    background: white;
                }

                .product-info .favorites a {
                    text-decoration: none;
                }

                .product-image:hover .moreBtnview {
                    display: block;
                }


                .moreBtnview {
                    position: absolute;
                    bottom: 10px;
                    left: 50%;
                    display: none;
                    transform: translate(-50%);
                    cursor: pointer;
                }

                .moreBtnview a {
                    border-radius: 50px;
                    background: linear-gradient(rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8)) !important;
                    display: flex;
                    height: 30px;
                    width: 30px;
                    align-items: center;
                    justify-content: center;
                }

                .product-image {
                    position: relative;
                }
                </style>

                <div class="product responsiveCard">
                    <div class="product-image" style=" background:#F2F3F8 !important; ">
                        <div class=" image " data-wow-delay="0.1s" style="background:transparent !important;">
                            <a href="product-details.php?pid=<?php echo htmlentities($rw['id']); ?>">
                                <img src="img/firstani1 (1).gif"
                                    data-echo="admin/productimages/<?php echo htmlentities($rw['id']); ?>/<?php echo htmlentities($rw['productImage1']); ?>"
                                    width="100%" height="100%" alt="">
                            </a>
                        </div>
                        <div class="moreBtnview">
                            <a href="product-details.php?pid=<?php echo htmlentities($rw['id']); ?>">
                                <svg fill="#000000" width="10px" version="1.1" id="Layer_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 455 455" xml:space="preserve">
                                    <g id="SVGRepo_iconCarrier">
                                        <polygon
                                            points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 455,242.5 ">
                                        </polygon>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="product-info text-left productName"
                        style="position:relative; padding-left:10px;border:0;border-top:1px solid black; ">
                        <h3 class="name" style="margin-top:10px;">
                            <a style="font-family: sans-serif, ' Poppins' !important;font-size:12px;font-weight:300 ;"
                                href="product-details.php?pid=<?php echo htmlentities($rw['id']); ?>"><?php echo htmlentities($rw['productName']); ?></a>
                        </h3>
                        <div class=" product-price" style="margin-top: -15px; ">
                            <span class="price" style=" color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 10px; ">
                                ₹
                                <span style="margin-left: 1px;">
                                    <?php echo htmlentities($rw['productPrice']); ?>
                                </span>
                            </span>
                        </div>
                        <div class="favorites">
                            <a title="favourites" style="   border-radius: 0 !important ; font-size: 12px !important ; "
                                href="product-details.php?pid=<?php echo htmlentities($row['id']) ?>&&action=wishlist">
                                <svg fill="#000000" height="10px" width="10px" version="1.1" id="Layer_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 507.447 507.447" xml:space="preserve">
                                    <g>
                                        <g>
                                            <path
                                                d="M96.877,0v507.447l156.846-168.091L410.57,507.447V0H96.877z M390.877,457.476L253.724,310.49L116.57,457.476V19.692h274.308V457.476z" />
                                        </g>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <style>
                .centerReview {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
                </style>
            </div><!-- /.home-owl-carousel -->


            <style>
            .reviewContainer {
                display: flex;
                align-items: center;
                justify-content: center;
                margin-top: 200px;
            }

            .reviewbefore {
                display: flex;
                align-items: center;
                justify-content: space-evenly;
                padding: 20px;
                flex-wrap: wrap;

                width: 800px;
            }

            .reviewbeforeText {
                width: 50%;
            }

            .reviewbeforeText h4 {
                text-transform: capitalize;
                font-family: 'Raleway', sans-serif;
                text-transform: capitalize;
                color: #000;
            }

            .reviewformbox {
                display: flex;
                align-items: center;
                justify-content: space-around;
                width: 100%;
                flex-wrap: wrap;
            }

            @media only screen and (max-width: 500px) {
                .reviewformbox {
                    display: block !important;
                }

                .reviewbeforeText {
                    width: 100%;
                }
            }
            </style>
            <div class="reviewContainer">

                <div class="reviewbefore">
                    <div class="col-lg-12">
                        <h4 class=" title"
                            style=" text-align:center; font-weight:400; text-transform:uppercase;font-family: 'Panchang', sans-serif;font-weight: 400 !important;font-size:20px;color: #000;  ">
                            Customer Reviews
                        </h4>
                    </div>
                    <div class="reviewformbox" style="margin-top: 20px;border: 1px solid black;padding:20px;">
                        <div class="reviewbeforeText">
                            <div class="">
                                <img src="assets/images/star.svg" alt="">
                                <img src="assets/images/star.svg" alt="">
                                <img src="assets/images/star.svg" alt="">
                                <img src="assets/images/star.svg" alt="">
                                <img src="assets/images/star.svg" alt="">
                            </div>
                            <h4
                                style="text-align: left; font-weight:400; text-transform:uppercase;font-family: 'Poppins', sans-serif !important;font-weight: 400 !important;font-size:15px;color: #000;  ">
                                Be the first to write a review
                            </h4>
                        </div>
                        <div class="reviewbeforeText">
                            <button data-toggle-form="MyOwnReviewForm" class="reviewBtn">
                                Write a review
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <style>
            .reviewBtn {
                background: #000 !important;
                width: 100% !important;
                color: #fff !important;
                height: 50px !important;
                border: 1px solid black !important;
                outline: 0 !important;
                font-size: 14px !important;
                text-transform: uppercase;
                /* border-radius: 10px !important; */
                font-family: 'Poppins', sans-serif !important;
                font-weight: 400 !important;
                font-weight: 400 !important;
            }

            .reviewBoxing {
                position: fixed !important;
                top: 50% !important;
                left: 50% !important;
                transform: translate(-50%, -50%) !important;
                z-index: 9999999999999 !important;
                width: 700px !important;
                border: 1px solid black !important;
                background: white !important;
            }

            @media only screen and (max-width: 1000px) {
                .reviewBoxing {
                    width: 500px !important;
                }
            }

            @media only screen and (max-width: 500px) {
                .reviewBoxing {
                    width: 100% !important;
                    overflow: scroll !important;
                    border-radius: 0 !important;
                    height: 100vh;
                }
            }

            .review-container {
                position: fixed !important;
                top: 0 !important;
                left: 0 !important;
                width: 100% !important;
                height: 100vh !important;
                background: linear-gradient(rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0.6)) !important;
                /* display: none; */
                transition: all 1s linear !important;
                z-index: 9999999 !important;
                display: none;
            }
            </style>

            <div class=" col-lg-12 "
                style="margin-bottom: -20px; overflow-y: auto; display: flex;align-items: center;justify-content: center    ;flex-wrap: wrap;  ">
                <?php $qry = mysqli_query($con, "select * from productreviews where productId='$pid'");
            if ($num > 0) {
                while ($rvw = mysqli_fetch_array($qry)) { ?>

                <div class="reviews m-t-10 col-lg-4 col-md-4 col-sm-12 col-xs-12"
                    style="height:100%;border: solid 1px #000; margin-left:10px; padding: 20px;border-radius: 0px;background:#fff ;   ">
                    <div class="review " style="  white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                        <div class=" review-title"
                            style="display: flex;align-items: center;justify-content: space-between;  ">
                            <span class="name"
                                style="font-family: 'Poppins', sans-serif !important;font-weight: 400 !important;font-size: 12px ;font-weight: 500 !important;color: #000 ; text-transform:capitalize;">
                                <span style="text-transform: uppercase;">
                                    Create By
                                </span>
                                <i class='bx bx-edit-alt'></i>
                                <?php echo htmlentities($rvw['name']); ?>
                            </span>

                            <span class="date">
                                <i class='bx bx-time-five'
                                    style="font-family: 'Poppins', sans-serif !important;font-weight: 400 !important;font-size: 13px ;font-weight: 500 !important ;color: #000 ;   "></i>
                                <span
                                    style="margin-left: 5px;font-family: 'Poppins' , sans-serif;font-size: 13px ;font-weight: 500 !important ;color: #000 ;   "><?php echo substr(htmlentities($rvw['reviewDate']), 0, 10); ?>
                                </span>
                            </span>
                        </div>
                        <div class="author m-t-15"
                            style="font-family: 'Poppins', sans-serif !important;font-weight: 400 !important;font-size: 12px ;font-weight: 500 !important;color: #000 ; text-transform:capitalize;">
                            <span style="text-transform: uppercase;">
                                summary :
                            </span>
                            <span class="summary"
                                style="font-family: 'Poppins', sans-serif !important;font-weight: 400 !important;font-size: 12px ;font-weight: 500 !important;color: #000 ; text-transform:capitalize; ">
                                <?php echo htmlentities($rvw['summary']); ?>
                            </span>
                        </div>
                        <div class="text reviewBox"
                            style="    font-family: 'Poppins', sans-serif !important;font-weight: 400 !important;font-size: 12px ;font-weight: 500 !important ;color: #000 ;text-transform:capitalize;    ">
                            <span style="text-transform: uppercase;">
                                review :
                            </span>
                            <span class="reviewBox">
                                <?php echo htmlentities($rvw['review']); ?>
                            </span>
                        </div>
                        <style>
                        .reviewBox {
                            height: 100%;
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;

                        }
                        </style>
                        <div class="text"
                            style=" margin-top: 10px; font-family:  sans-serif,'Poppins';font-size: 12px ;font-weight: 500 !important ;color: #000 ;text-transform:capitalize;     ">
                            <span
                                style="text-transform: uppercase; font-family: 'Poppins', sans-serif !important;font-weight: 400 !important;">
                                Quality :
                            </span>

                            ( <?php echo htmlentities($rvw['quality']); ?>

                            <img src="assets/images/smallStar.svg" alt="">
                            <img src="assets/images/smallStar.svg" alt="">
                            <img src="assets/images/smallStar.svg" alt="">
                            <img src="assets/images/smallStar.svg" alt="">
                            <img src="assets/images/smallStar.svg" alt="">
                            )
                        </div>
                        <div class="text"
                            style="font-family: 'Poppins', sans-serif !important;font-weight: 400 !important;font-size: 12px ;font-weight: 500 !important;color: #000 ; text-transform:capitalize;  ">
                            <span
                                style="text-transform: uppercase;font-family: 'Poppins', sans-serif !important;font-weight: 400 !important;">
                                Price :</span>

                            (<?php echo htmlentities($rvw['price']); ?>

                            <img src="assets/images/smallStar.svg" alt="">
                            <img src="assets/images/smallStar.svg" alt="">
                            <img src="assets/images/smallStar.svg" alt="">
                            <img src="assets/images/smallStar.svg" alt="">
                            <img src="assets/images/smallStar.svg" alt="">
                            )
                        </div>
                        <div class=" text"
                            style="font-family: 'Poppins', sans-serif !important;font-weight: 400 !important;font-size: 12px ;font-weight: 500 !important;color: #000 ; text-transform:capitalize;    ">
                            <span style="text-transform: uppercase;font-family: 'Raleway' , sans-serif">
                                value :</span>


                            ( <?php echo htmlentities($rvw['value']); ?>

                            <img src="assets/images/smallStar.svg" alt="">
                            <img src="assets/images/smallStar.svg" alt="">
                            <img src="assets/images/smallStar.svg" alt="">
                            <img src="assets/images/smallStar.svg" alt="">
                            <img src="assets/images/smallStar.svg" alt="">
                            )
                        </div>


                    </div>
                </div>
                <?php } ?>
                <?php } else { ?>
                <div class="col-lg-6">
                    <h4
                        style="text-align:center; font-weight:400; text-transform:uppercase;font-family: 'Panchang', sans-serif;font-weight: 400 !important;font-size:15px;color: #000; ">
                        No Reviews
                    </h4>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="review-container     col-lg-12" id="MyOwnReviewForm">

            <div class="col-lg-12 centerReview ">

                <div class="reviewBoxing ">

                    <style>
                    .productDescription {
                        height: 250px;
                        overflow-y: auto !important;
                        overflow-x: hidden !important;
                        border: 1px solid black !important;
                    }

                    .productDescription::-webkit-scrollbar-track {
                        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3) !important;
                        background-color: #fff !important;
                    }

                    .productDescription:hover.productDescription::-webkit-scrollbar {
                        display: block !important;
                    }

                    .productDescription::-webkit-scrollbar {
                        display: none !important;
                        width: 2px !important;
                        height: 2px !important;
                    }

                    .productDescription::-webkit-scrollbar-thumb {
                        border: 10px solid #000 !important;
                    }
                    </style>

                    <div id="review" class="tab-pane in active">

                        <div class="product-tab">

                            <!-- /.product-reviews -->
                            <form role="form" class="cnt-form reviewForm" name="review" method="post"
                                style=" padding:20px;">

                                <div class="product-add-review"
                                    style="background: transparent;     border: 0 !important ;">
                                    <style>
                                    .rating1,
                                    .rating2,
                                    .rating3 {
                                        border: 1px solid black;
                                        display: flex;
                                        align-items: center;
                                        justify-content: start;
                                        overflow: hidden;
                                        flex-direction: row-reverse;
                                        position: relative;
                                        padding: 15px;
                                        width: 96%;
                                        margin-left: 15px;
                                        border-radius: 10px;
                                    }

                                    .rating1-0 {
                                        filter: grayscale(100%);
                                    }

                                    .rating2-0 {
                                        filter: grayscale(100%);
                                    }


                                    .rating3-0 {
                                        filter: grayscale(100%);
                                    }

                                    .rating1>input,
                                    .rating2>input,
                                    .rating3>input {
                                        display: none;
                                    }

                                    .rating1>label {
                                        cursor: pointer;
                                        width: 20px;
                                        height: 20px;
                                        margin-top: auto;
                                        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
                                        background-repeat: no-repeat;
                                        background-position: center;
                                        background-size: 76%;
                                        transition: .3s;

                                    }

                                    .rating2>label {
                                        cursor: pointer;
                                        width: 20px;
                                        height: 20px;
                                        margin-top: auto;
                                        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
                                        background-repeat: no-repeat;
                                        background-position: center;
                                        background-size: 76%;
                                        transition: .3s;
                                    }

                                    .rating3>label {
                                        cursor: pointer;
                                        width: 20px;
                                        height: 20px;
                                        margin-top: auto;
                                        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
                                        background-repeat: no-repeat;
                                        background-position: center;
                                        background-size: 76%;
                                        transition: .3s;
                                    }

                                    .rating1>input:checked~label,
                                    .rating1>input:checked~label~label {
                                        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23fcd93a' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
                                    }

                                    .rating2>input:checked~label,
                                    .rating2>input:checked~label~label {
                                        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23fcd93a' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
                                    }

                                    .rating3>input:checked~label,
                                    .rating3>input:checked~label~label {
                                        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23fcd93a' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
                                    }


                                    .rating1>input:not(:checked)~label:hover,
                                    .rating1>input:not(:checked)~label:hover~label {
                                        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23d8b11e' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
                                    }

                                    .rating2>input:not(:checked)~label:hover,
                                    .rating2>input:not(:checked)~label:hover~label {
                                        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23d8b11e' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
                                    }

                                    .rating3>input:not(:checked)~label:hover,
                                    .rating3>input:not(:checked)~label:hover~label {
                                        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23d8b11e' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
                                    }

                                    .reviewstar {
                                        width: 100%;
                                        text-align: left;
                                        font-family: 'Poppins', sans-serif !important;
                                        font-weight: 400 !important;
                                        text-transform: uppercase;
                                        font-weight: 400;
                                        display: inline-block;
                                        justify-content: start;
                                        align-items: start;
                                        color: #000;
                                    }

                                    .reviewstar h4 {
                                        font-size: 15px !important;
                                        font-family: 'Poppins', sans-serif !important;
                                        font-weight: 400 !important;
                                        text-transform: uppercase !important;
                                    }

                                    .form-group label {
                                        font-family: 'Poppins', sans-serif !important;
                                        font-weight: 400 !important;
                                        font-size: 17px;
                                        color: #000;
                                        font-weight: 500;
                                        text-transform: uppercase !important;
                                    }

                                    .form-group input,
                                    .form-group textarea {
                                        border: 2px solid gray !important;
                                        font-family: 'Poppins', sans-serif !important;
                                        font-weight: 400 !important;
                                        font-size: 15px !important;
                                        color: #000 !important;
                                        font-weight: 600 !important;
                                        padding: 10px 20px !important;
                                        width: 100% !important;
                                        height: 60px;
                                        box-shadow: 0 !important;
                                        border-radius: 10px !important;
                                    }




                                    .form-group input::placeholder {
                                        font-family: 'Poppins', sans-serif !important;
                                        font-weight: 400 !important;
                                        font-size: 15px !important;
                                        color: #000 !important;
                                        font-weight: 600 !important;
                                        text-transform: capitalize !important;
                                    }

                                    .form-group input:focus {
                                        border: 2px solid black !important;
                                        box-shadow: none !important;
                                    }

                                    .checkout-page-button {
                                        background: #000 !important;
                                        width: 100% !important;
                                        color: #fff !important;
                                        height: 50px !important;
                                        font-size: 18px !important;
                                        border-radius: 10px !important;
                                        font-family: 'Poppins', sans-serif !important;
                                        font-weight: 400 !important;
                                        font-weight: 400 !important;
                                    }

                                    .checkout-page-button:hover {
                                        color: #fff !important;
                                        border: 1px solid black !important;
                                    }

                                    .input-field-login,
                                    .reviewstar {
                                        position: relative;
                                    }



                                    .input-field-login label {
                                        position: absolute;
                                        top: 50%;
                                        left: 30px;
                                        transform: translateY(-50%);
                                        color: #000;
                                        font-size: 15px;
                                        pointer-events: none;
                                        transition: 0.3s;
                                        font-family: 'Poppins', sans-serif !important;
                                        font-weight: 400 !important;
                                        font-weight: 500;
                                    }


                                    .input-field-login-input:focus,
                                    .input-field-login-textarea:focus {
                                        border: 2px solid #000;
                                    }

                                    .input-field-login-input:focus~label,
                                    .input-field-login-textarea:focus~label,
                                    .input-field-login-input:valid~label,
                                    .input-field-login-textarea:valid~label {
                                        top: 0;
                                        left: 20px;
                                        font-size: 16px;
                                        padding: 0 2px;
                                        background: #fff;
                                        color: #000;
                                    }
                                    </style>

                                    <div class="table-responsive" style="background:transparent;">
                                        <h4 class=" title "
                                            style="text-align:center; font-weight:400; text-transform:uppercase;font-family: 'Panchang', sans-serif;font-weight: 400 !important;font-size:20px;color: #000; ">

                                            Write your own review
                                        </h4>
                                        <div class="reviewstar m-t-20 ">
                                            <h4 style="text-transform: uppercase;
                                        margin-left: 15px;font-family: 'Poppins', sans-serif !important;font-weight: 400 !important;
                                            ">
                                                Quality rating
                                            </h4>
                                            <div class=" rating1  ">
                                                <input type="radio" name="quality" id="rating-5" value="5">
                                                <label for="rating-5"></label>
                                                <input type="radio" name="quality" id="rating-4" value="4">
                                                <label for="rating-4"></label>
                                                <input type="radio" name="quality" id="rating-3" value="3">
                                                <label for="rating-3"></label>
                                                <input type="radio" name="quality" id="rating-2" value="2">
                                                <label for="rating-2"></label>
                                                <input type="radio" name="quality" id="rating-1" value="1">
                                                <label for="rating-1"></label>
                                            </div>
                                        </div>
                                        <div class="reviewstar">
                                            <h4 style="
                                        margin-left: 15px;
                                            ">
                                                Price rating
                                            </h4>
                                            <div class=" rating2 ">
                                                <input type="radio" name="price" id="rating2-5" value="5">
                                                <label for="rating2-5"></label>
                                                <input type="radio" name="price" id="rating2-4" value="4">
                                                <label for="rating2-4"></label>
                                                <input type="radio" name="price" id="rating2-3" value="3">
                                                <label for="rating2-3"></label>
                                                <input type="radio" name="price" id="rating2-2" value="2">
                                                <label for="rating2-2"></label>
                                                <input type="radio" name="price" id="rating2-1" value="1">
                                                <label for="rating2-1"></label>
                                            </div>
                                        </div>

                                        <div class="reviewstar">
                                            <h4 style="
                                        margin-left: 15px;
                                            ">
                                                Value rating
                                            </h4>
                                            <div class="rating3 ">
                                                <input type="radio" name="value" id="rating3-5" value="5">
                                                <label for="rating3-5"></label>
                                                <input type="radio" name="value" id="rating3-4" value="4">
                                                <label for="rating3-4"></label>
                                                <input type="radio" name="value" id="rating3-3" value="3">
                                                <label for="rating3-3"></label>
                                                <input type="radio" name="value" id="rating3-2" value="2">
                                                <label for="rating3-2"></label>
                                                <input type="radio" name="value" id="rating3-1" value="1">
                                                <label for="rating3-3"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.review-table -->

                                <div class="review-form">
                                    <div class="form-container">

                                        <style>
                                        .form-group input,
                                        .form-group textarea {
                                            border: 1px solid gray !important;
                                            font-family: 'Poppins', sans-serif !important;
                                            font-weight: 400 !important;
                                            font-size: 15px !important;
                                            color: #000 !important;
                                            font-weight: 400 !important;
                                            text-transform: uppercase !important;
                                            padding: 20px !important;
                                            width: 100%;
                                            box-shadow: 0 !important;
                                        }




                                        .form-group input::placeholder,
                                        .form-group textarea::placeholder {
                                            font-family: 'Poppins', sans-serif !important;
                                            font-weight: 400 !important;
                                            font-size: 15px !important;
                                            color: #000 !important;
                                            font-weight: 400 !important;
                                            text-transform: capitalize !important;


                                        }

                                        .form-group input:focus,
                                        .form-group textarea:focus {
                                            border: 2px solid black !important;
                                            box-shadow: none !important;
                                        }

                                        .form-group label {
                                            font-family: 'Poppins', sans-serif !important;
                                            font-weight: 400 !important;
                                            font-size: 15px !important;
                                            color: #000 !important;
                                            font-weight: 400 !important;
                                            text-transform: uppercase !important;
                                        }

                                        .checkout-page-button {
                                            background: black !important;
                                            width: 40% !important;
                                            height: 50px !important;
                                            border: 0 !important;
                                            font-size: 12px !important;
                                            border-radius: 10px !important;
                                            text-transform: uppercase !important;
                                        }

                                        .checkout-page-button:nth-child(3) {
                                            border: 1px solid black !important;
                                            background: transparent !important;
                                            color: #000 !important;
                                        }
                                        </style>
                                        <div class="row m-t-20">
                                            <div class="col-sm-12">
                                                <div class="form-group input-field-login col-lg-6">
                                                    <input type="text" class="form-control txt input-field-login-input"
                                                        id="exampleInputName" name="name" required="required"
                                                        style="background: transparent ;text-transform: uppercase; border-radius:0;  ">
                                                    <label>
                                                        Your Name
                                                    </label>
                                                </div>
                                                <!-- /.form-group -->
                                                <div class="form-group input-field-login col-lg-6">
                                                    <input type="text" class="form-control txt  input-field-login-input"
                                                        id="exampleInputSummary" name="summary" required="required"
                                                        style="background: transparent ;text-transform: uppercase;border-radius:0;   "
                                                        maxlength="100">
                                                    <label>
                                                        Summary (100)
                                                    </label>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>

                                            <div class="col-md-6 col-lg-12">
                                                <div class="form-group input-field-login col-lg-12">

                                                    <textarea
                                                        class="form-control txt txt-review input-field-login-textarea"
                                                        id="exampleInputReview"
                                                        style="height: 143px;border-radius:0;background: transparent  ;text-transform: uppercase;  "
                                                        name="review" required="required" maxlength="5000"></textarea>
                                                    <label>
                                                        Review (Write your comments here 5000)
                                                    </label>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                        </div><!-- /.row -->

                                        <div class="action ">
                                            <style>
                                            .action {
                                                display: flex;
                                                align-items: center;
                                                justify-content: space-evenly;
                                            }
                                            </style>
                                            <button name="submit" class=" checkout-page-button " ">
                                                submit review</button>
                                            <button class=" checkout-page-button" data-toggle-form="MyOwnReviewForm">
                                                Cancel review</button>
                                        </div>
                                        <!-- /.action -->

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--==============================================UPSELL PRODUCTS :
        END==============================================-->


        <div class="clearfix"></div>
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

        <script>
        const accordionContent = document.querySelectorAll(".accordion-content");

        accordionContent.forEach((item, index) => {
            let header = item.querySelector("header");
            header.addEventListener("click", () => {
                item.classList.toggle("open");

                let description = item.querySelector(".description");
                if (item.classList.contains("open")) {
                    description.style.height =
                        `${description.scrollHeight}px`; //scrollHeight property returns the height of an element including padding , but excluding borders, scrollbar or margin
                    item.querySelector("i").classList.replace("fa-plus", "fa-minus");
                } else {
                    description.style.height = "0px";
                    item.querySelector("i").classList.replace("fa-minus", "fa-plus");
                }
                removeOpen(
                    index
                ); //calling the funtion and also passing the index number of the clicked header
            })
        })

        function removeOpen(index1) {
            accordionContent.forEach((item2, index2) => {
                if (index1 != index2) {
                    item2.classList.remove("open");

                    let des = item2.querySelector(".description");
                    des.style.height = "0px";
                    item2.querySelector("i").classList.replace("fa-minus", "fa-plus");
                }
            })
        }
        </script>


    </body>

    </html>