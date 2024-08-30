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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- animated  -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
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
        <div class="" style="  padding: 0;margin:50px; ">
            <div class="furniture-container homepage-container">
                <div class="row">



                    <div class="col-xs-12 col-sm-12 col-md-12 homebanner-holder ">
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


                        .swiper {
                            width: 100%;
                            height: 100%;
                        }

                        .swiper-slide {
                            text-align: center;
                            font-size: 18px;
                            width: 100%;
                            height: 100%;
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

                        .swiper-button-next,
                        .swiper-button-prev {
                            height: 100%;
                            color: #fff !important;
                            top: 0;
                            width: 30px;
                        }
                        </style>




                    </div><!-- /.row -->
                    <style>
                    @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');
                    </style>
                    <!-- ============================================== SCROLL TABS ============================================== -->
                    <div id="product-tabs-slider" class="scroll-tabs   wow fadeInUp " style="
                border: 0 !important ;
                   
                ">
                        <div class="more-info-tab clearfix"
                            style="margin-top: 40px;border : 0 !important ;display: block !important ; overflow-x: auto !important ;   ">

                            <style>
                            .more-info-tab {
                                position: sticky !important;
                                top: 0 !important;
                                align-items: center !important;
                                width: 100% !important;
                                justify-content: start !important;
                                overflow-x: scroll !important;
                                overflow-y: hidden !important;
                                width: 100% !important;
                                position: sticky !important;
                                top: 0 !important;
                                z-index: 999 !important;
                                background: white !important;
                            }

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
                                display: none !important;
                                width: 2px !important;
                                background-color: #F5F5F5 !important;
                                height: 1px !important;
                            }

                            .nav-tabs::-webkit-scrollbar-thumb {
                                background-color: #F2F3F8 !important;
                                border: 2px solid #F2F3F8 !important;
                            }

                            @media only screen and (max-width: 800px) {
                                .nav-tabs::-webkit-scrollbar {
                                    display: block !important;
                                }
                            }


                            .nav-tabs li a {
                                padding: 5px 10px !important;
                                border-radius: 0 !important;
                                margin: 10px !important;
                                font-size: 10px !important;
                                text-transform: uppercase !important;
                                font-size: 12px;
                                font-weight: 500;
                                font-family: 'Raleway', sans-serif !important;
                                font-weight: 600 !important;
                                color: #000 !important;
                                border-color: #000 !important;
                            }
                            </style>
                            <ul class=" nav nav-tabs  col-lg-12 col-sm-12" id=""
                                style="width: 100% !important ;overflow-x : scroll !important  ;  text-align: center; ">
                                <li class="active  "><a href="#all" data-toggle="tab">All</a>
                                </li>
                                <li><a href="#WOMAN" data-toggle="tab">WOMAN</a>
                                </li>
                                <li><a href="#MAN" data-toggle="tab">MAN</a>
                                </li>
                                <li><a href="#SmartPhone" data-toggle="tab">SmartPhone
                                    </a></li>
                                <li style="position: absolute; right: 0;" onclick="openForm()" class="OPENFILTER">
                                    <i class='bx bx-slider-alt' style="font-size: 20px;"></i>
                                </li>
                                <script>
                                document.addEventListener('DOMContentLoaded', () => {
                                    const menuButton = document.querySelector('.bx-slider-alt, .bx-x');
                                    const card = document.getElementById('MYFILTER');

                                    if (menuButton && card) {
                                        menuButton.addEventListener('click', () => {
                                            const isCardVisible = card.style.display === 'block';

                                            // Toggle visibility of the card
                                            if (isCardVisible) {
                                                card.style.display = 'none';
                                                menuButton.classList.remove('bx-x');
                                                menuButton.classList.add('bx-slider-alt');
                                            } else {
                                                card.style.display = 'block';
                                                menuButton.classList.remove('bx-slider-alt');
                                                menuButton.classList.add('bx-x');
                                            }
                                        });

                                        // Optional: Close the card if clicked outside
                                        document.addEventListener('click', (event) => {
                                            if (!card.contains(event.target) && !menuButton
                                                .contains(event
                                                    .target)) {
                                                card.style.display = 'none';
                                                menuButton.classList.remove('bx-x');
                                                menuButton.classList.add('bx-menu');
                                            }
                                        });
                                    }
                                });
                                </script>
                            </ul><!-- /.n av-tabs -->
                            <style>
                            .OPENFILTER {
                                background: transparent !important;
                                border: 0 !important;
                                outline: 0 !important;
                            }

                            .OPENFILTER i {
                                background: transparent !important;
                                font-size: 15px;
                            }

                            .filter-menu {
                                position: sticky;
                                z-index: 999999;
                                background: linear-gradient(rgba(242, 243, 248, 0.5), rgba(242, 243, 248, 0.6));
                                width: 100% !important;
                                height: 100% !important;
                                right: 50px;
                                cursor: pointer;
                                top: 50px;
                                border: 1px solid black;
                                display: none;
                                padding: 10px 20px;
                            }

                            .filter-menu li {
                                margin-bottom: 10px;
                                border: 1px solid black;
                            }

                            .filter-menu li a {
                                display: flex;
                                align-items: center;
                                justify-content: start;
                                padding: 8px 10px;
                                font-size: 10px;
                                font-weight: 500 !important;
                            }

                            .filter-menu h4 {
                                font-size: 10px !important;
                                font-size: 12px;
                                font-weight: 500;
                                font-family: 'Raleway', sans-serif !important;
                                text-transform: uppercase;
                                font-weight: 700;
                                border-bottom: 3px solid black;
                                padding-bottom: 10px;
                            }
                            </style>

                        </div>
                        <div class="filter-menu" id="MYFILTER">
                            <h4>Filter & Refine</h4>
                            <div class=""
                                style=" display: flex; align-items: baseline ;justify-content: start;  flex-wrap: wrap; ">
                                <div class=" " style="padding: 20px; ">
                                    <h4>Sort by </h4>
                                    <ul>
                                        <li><a href="#lowtohigh" data-toggle="tab">Price (Lowest First)</a>
                                        </li>
                                        <li><a href="#hightolow" data-toggle="tab">Price (Highest First)</a>
                                        </li>
                                        <li><a href="#AtoZ" data-toggle="tab">A to Z</a>
                                        </li>
                                        <li><a href="#ZtoA" data-toggle="tab">Z to A</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class=" " style="padding: 20px; ">
                                    <h4>Category by </h4>
                                    <ul>
                                        <?php $sql = mysqli_query($con, "select id,categoryName  from category");
                                        while ($row = mysqli_fetch_array($sql)) {
                                        ?>
                                        <li>
                                            <a href="#<?php echo $row['categoryName']; ?>" data-toggle="tab">
                                                <?php echo $row['categoryName']; ?></a>
                                        </li>
                                        <?php } ?>

                                    </ul>
                                </div>

                                <div class="" style="padding: 20px; ">
                                    <h4>Brand</h4>

                                    <ul>
                                        <li><a href="#Apple" data-toggle="tab">Apple</a>
                                        </li>
                                        <li><a href="#Samsung" data-toggle="tab">Samsung</a>
                                        </li>
                                        <li><a href="#ZARA" data-toggle="tab">ZARA</a>
                                        </li>
                                        <li><a href="#NIKE" data-toggle="tab">NIKE</a>
                                        </li>

                                    </ul>
                                </div>
                                <div class=" " style="padding: 20px; ">
                                    <h4>Gender</h4>

                                    <ul>
                                        <li><a href="#WOMAN" data-toggle="tab">WOMAN</a>
                                        </li>
                                        <li><a href="#MAN" data-toggle="tab">MAN</a>
                                        </li>
                                    </ul>
                                </div>
                                <style>
                                .box {
                                    height: 12px;
                                    width: 12px;
                                    margin-right: 20px;
                                }

                                .black {
                                    margin-right: 6px;
                                    background: #000;
                                }

                                .white {
                                    border: 1px solid black;
                                    background: #fff;
                                }

                                .blue {
                                    background: blue;
                                }

                                .green {
                                    background: green;
                                }

                                .pink {
                                    background: pink;
                                }

                                .red {
                                    background: red;
                                }

                                .silver {
                                    background: #C0C0C0 !important;
                                }

                                .yellow {
                                    background: yellow;
                                }
                                </style>
                                <div class=" " style="padding: 20px; ">
                                    <h4>COLOR</h4>
                                    <ul>
                                        <li>
                                            <a href="#blackandwhiteandGray" data-toggle="tab">
                                                <div class='box black '></div>
                                                <div class='box white'></div>
                                                <span>BLACK & WHITE</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#Blue" data-toggle="tab">
                                                <div class='box blue '></div>
                                                <span>BLUE</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#Pink" data-toggle="tab">
                                                <div class='box pink '></div>
                                                <span>PINK</span>

                                            </a>
                                        </li>
                                        <li>
                                            <a href="#Red" data-toggle="tab">
                                                <div class='box red '></div>
                                                <span>RED</span>

                                            </a>
                                        </li>
                                        <li>
                                            <a href="#Green" data-toggle="tab">
                                                <div class='box green '></div>
                                                <span>GREEN</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#Silver" data-toggle="tab">
                                                <div class='box silver '></div>
                                                <span>SILVER</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#Yellow" data-toggle="tab">
                                                <div class='box yellow '></div>
                                                <span>YELLOW</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="tab-content outer-top-xs" style="background: white !important   ; ">
                            <div class="tab-pane in active" id="all">
                                <div class="product-slider">
                                    <div class="" data-item="4"
                                        style="display: flex;align-items: center;justify-content: space-around      ; flex-wrap: wrap;   ">
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
                                            margin-top: 10px;

                                        }

                                        .name a {
                                            font-size: 12px !important;
                                        }


                                        @media only screen and (max-width: 450px) {

                                            .products,
                                            .product {
                                                width: 140px !important;
                                                overflow: hidden !important;
                                                text-overflow: ellipsis !important;
                                                white-space: nowrap !important;
                                            }

                                            .image {
                                                width: 100% !important;
                                                height: 100% !important;
                                            }

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
                                        }


                                        @media only screen and (max-width: 350px) {

                                            .products,
                                            .product {
                                                width: 100% !important;
                                            }

                                            .name {
                                                width: 100% !important;
                                            }

                                            .image {
                                                width: 100% !important;
                                                height: 100% !important;
                                            }
                                        }
                                        </style>
                                        <div class=" item item-carousel">
                                            <div class="products m-t-0">

                                                <div class="product">
                                                    <div class="product-image" style="background:#F2F3F8 !important; ">
                                                        <div class="image" style="background:transparent !important;">
                                                            <a
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                <img src=" admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    width=" 100%" height="100%" alt=""></a>
                                                        </div><!-- /.image -->


                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left"
                                                        style="width:250px !important; margin-top:5px !important;padding: 0 !important;">
                                                        <h3 class="name"><a
                                                                style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                        </h3>

                                                        <div class=" product-price" style="margin-top: -10px; ">
                                                            <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                                Rs.<?php echo htmlentities($row['productPrice']); ?>
                                                            </span>
                                                        </div><!-- /.product-price -->
                                                        <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                        <div class="action " style="width: 100%; "><a
                                                                href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="lnk btn btn-primary col-lg-12 addtocart addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                                Add </a>
                                                        </div>
                                                        <?php } else { ?>
                                                        <div class=" action" style="color:red ;width: 100%; ">
                                                            <button
                                                                class="lnk btn btn-primary col-lg-12 addtocart addtocart"
                                                                style=" font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
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
                                        $ret = mysqli_query($con, "SELECT * FROM products WHERE category=11 ORDER BY productPrice ASC");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>


                                        <div class=" item item-carousel">
                                            <div class="products">

                                                <div class="product">
                                                    <div class="product-image" style="background:#F2F3F8 !important;">
                                                        <div class="image" style="background:transparent !important; ">
                                                            <a
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    width="100%" height="100%" alt=""></a>
                                                        </div><!-- /.image -->


                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left"
                                                        style="width:250px !important; margin-top: 5px !important;padding: 0 !important;">
                                                        <h3 class="name"><a
                                                                style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                        </h3>

                                                        <div class=" product-price" style="margin-top: -10px; ">
                                                            <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                                Rs.<?php echo htmlentities($row['productPrice']); ?>
                                                            </span>
                                                        </div><!-- /.product-price -->
                                                        <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                        <div class="action " style="width: 100%; "><a
                                                                href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                                Add </a>
                                                        </div>
                                                        <?php } else { ?>
                                                        <div class=" action" style="color:red ;width: 100%; ">
                                                            <button class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
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
                                                        <div class="image" style="background:transparent !important; ">
                                                            <a
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    width="100%" height="100%" alt=""></a>
                                                        </div><!-- /.image -->


                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left"
                                                        style="width:250px !important; margin-top:5px !important;padding: 0 !important;">
                                                        <h3 class="name"><a
                                                                style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                        </h3>

                                                        <div class=" product-price" style="margin-top: -10px; ">
                                                            <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                                Rs.<?php echo htmlentities($row['productPrice']); ?>
                                                            </span>
                                                        </div><!-- /.product-price -->
                                                        <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                        <div class="action " style="width: 100%; "><a
                                                                href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                                Add </a>
                                                        </div>
                                                        <?php } else { ?>
                                                        <div class=" action" style="color:red ;width: 100%; ">
                                                            <button class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
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
                                        $ret = mysqli_query($con, "select * from products where category=10 ORDER BY RAND() ");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...


                                        ?>


                                        <div class=" item item-carousel">
                                            <div class="products">

                                                <div class="product">
                                                    <div class="product-image" style="background:#F2F3F8 !important;">
                                                        <div class="image" style="background:transparent !important; ">
                                                            <a
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    width="100%" height="100%" alt=""></a>
                                                        </div><!-- /.image -->


                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left"
                                                        style="width:250px !important; margin-top:5px !important;padding: 0 !important;">
                                                        <h3 class="name"><a
                                                                style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                        </h3>

                                                        <div class=" product-price" style="margin-top: -10px; ">
                                                            <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                                Rs.<?php echo htmlentities($row['productPrice']); ?>
                                                            </span>
                                                        </div><!-- /.product-price -->
                                                        <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                        <div class="action " style="width: 100%; "><a
                                                                href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                                Add </a>
                                                        </div>
                                                        <?php } else { ?>
                                                        <div class=" action" style="color:red ;width: 100%; ">
                                                            <button class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
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
                                        $ret = mysqli_query($con, "select * from products where category=8 ORDER BY RAND() ");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...


                                        ?>


                                        <div class=" item item-carousel">
                                            <div class="products">

                                                <div class="product">
                                                    <div class="product-image" style="background:#F2F3F8 !important;">
                                                        <div class="image" style="background:transparent !important; ">
                                                            <a
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    width="100%" height="100%" alt=""></a>
                                                        </div><!-- /.image -->


                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left"
                                                        style="width:250px !important; margin-top:5px !important;padding: 0 !important;">
                                                        <h3 class="name"><a
                                                                style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                        </h3>

                                                        <div class=" product-price" style="margin-top: -10px; ">
                                                            <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                                Rs.<?php echo htmlentities($row['productPrice']); ?>
                                                            </span>
                                                        </div><!-- /.product-price -->
                                                        <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                        <div class="action " style="width: 100%; "><a
                                                                href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                                Add </a>
                                                        </div>
                                                        <?php } else { ?>
                                                        <div class=" action" style="color:red ;width: 100%; ">
                                                            <button class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
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
                            <div class="tab-pane" id="lowtohigh">
                                <div class="product-slider">
                                    <div class=""
                                        style="display: flex;align-items: center;justify-content: space-between; flex-wrap: wrap;   ">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products  ORDER BY productPrice ASC");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>


                                        <div class=" item item-carousel">
                                            <div class="products">

                                                <div class="product">
                                                    <div class="product-image" style="background:#F2F3F8 !important;">
                                                        <div class="image" style="background:transparent !important; ">
                                                            <a
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    width="100%" height="100%" alt=""></a>
                                                        </div><!-- /.image -->


                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left"
                                                        style="width:250px !important; margin-top:5px !important;padding: 0 !important;">
                                                        <h3 class="name"><a
                                                                style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                        </h3>

                                                        <div class=" product-price" style="margin-top: -10px; ">
                                                            <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                                Rs.<?php echo htmlentities($row['productPrice']); ?>
                                                            </span>
                                                        </div><!-- /.product-price -->
                                                        <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                        <div class="action " style="width: 100%; "><a
                                                                href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                                Add </a>
                                                        </div>
                                                        <?php } else { ?>
                                                        <div class=" action" style="color:red ;width: 100%; ">
                                                            <button class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
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
                            <div class="tab-pane" id="hightolow">
                                <div class="product-slider">
                                    <div class=""
                                        style="display: flex;align-items: center;justify-content: space-between; flex-wrap: wrap;   ">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products  ORDER BY productPrice DESC");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>


                                        <div class=" item item-carousel">
                                            <div class="products">

                                                <div class="product">
                                                    <div class="product-image" style="background:#F2F3F8 !important;">
                                                        <div class="image" style="background:transparent !important; ">
                                                            <a
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    width="100%" height="100%" alt=""></a>
                                                        </div><!-- /.image -->


                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left"
                                                        style="width:250px !important; margin-top:5px !important;padding: 0 !important;">
                                                        <h3 class="name"><a
                                                                style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                        </h3>

                                                        <div class=" product-price" style="margin-top: -10px; ">
                                                            <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                                Rs.<?php echo htmlentities($row['productPrice']); ?>
                                                            </span>
                                                        </div><!-- /.product-price -->
                                                        <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                        <div class="action " style="width: 100%; "><a
                                                                href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                                Add </a>
                                                        </div>
                                                        <?php } else { ?>
                                                        <div class=" action" style="color:red ;width: 100%; ">
                                                            <button class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
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
                            <div class="tab-pane" id="AtoZ">
                                <div class="product-slider">
                                    <div class=""
                                        style="display: flex;align-items: center;justify-content: space-between; flex-wrap: wrap;   ">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products  ORDER BY productName ASC");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>



                                        <div class=" item item-carousel">
                                            <div class="products">

                                                <div class="product">
                                                    <div class="product-image" style="background:#F2F3F8 !important;">
                                                        <div class="image" style="background:transparent !important; ">
                                                            <a
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    width="100%" height="100%" alt=""></a>
                                                        </div><!-- /.image -->


                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left"
                                                        style="width:250px !important; margin-top:5px !important;padding: 0 !important;">
                                                        <h3 class="name"><a
                                                                style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                        </h3>

                                                        <div class=" product-price" style="margin-top: -10px; ">
                                                            <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                                Rs.<?php echo htmlentities($row['productPrice']); ?>
                                                            </span>
                                                        </div><!-- /.product-price -->
                                                        <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                        <div class="action " style="width: 100%; "><a
                                                                href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                                Add </a>
                                                        </div>
                                                        <?php } else { ?>
                                                        <div class=" action" style="color:red ;width: 100%; ">
                                                            <button class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
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
                            <div class="tab-pane" id="ZtoA">
                                <div class="product-slider">
                                    <div class=""
                                        style="display: flex;align-items: center;justify-content: space-between; flex-wrap: wrap;   ">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products  ORDER BY productName DESC");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>


                                        <div class=" item item-carousel">
                                            <div class="products">

                                                <div class="product">
                                                    <div class="product-image" style="background:#F2F3F8 !important;">
                                                        <div class="image" style="background:transparent !important; ">
                                                            <a
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    width="100%" height="100%" alt=""></a>
                                                        </div><!-- /.image -->


                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left"
                                                        style="width:250px !important; margin-top:5px !important;padding: 0 !important;">
                                                        <h3 class="name"><a
                                                                style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                        </h3>

                                                        <div class=" product-price" style="margin-top: -10px; ">
                                                            <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                                Rs.<?php echo htmlentities($row['productPrice']); ?>
                                                            </span>
                                                        </div><!-- /.product-price -->
                                                        <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                        <div class="action " style="width: 100%; "><a
                                                                href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                                Add </a>
                                                        </div>
                                                        <?php } else { ?>
                                                        <div class=" action" style="color:red ;width: 100%; ">
                                                            <button class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
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
                            <div class="tab-pane" id="ZtoA">
                                <div class="product-slider">
                                    <div class=""
                                        style="display: flex;align-items: center;justify-content: space-between; flex-wrap: wrap;   ">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products  ORDER BY productName DESC");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>


                                        <div class=" item item-carousel">
                                            <div class="products">

                                                <div class="product">
                                                    <div class="product-image" style="background:#F2F3F8 !important;">
                                                        <div class="image" style="background:transparent !important; ">
                                                            <a
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    width="100%" height="100%" alt=""></a>
                                                        </div><!-- /.image -->


                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left"
                                                        style="width:250px !important; margin-top:5px !important;padding: 0 !important;">
                                                        <h3 class="name"><a
                                                                style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                        </h3>

                                                        <div class=" product-price" style="margin-top: -10px; ">
                                                            <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                                Rs.<?php echo htmlentities($row['productPrice']); ?>
                                                            </span>
                                                        </div><!-- /.product-price -->
                                                        <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                        <div class="action " style="width: 100%; "><a
                                                                href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                                Add </a>
                                                        </div>
                                                        <?php } else { ?>
                                                        <div class=" action" style="color:red ;width: 100%; ">
                                                            <button class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
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
                            <div class="tab-pane" id="Apple">
                                <div class="product-slider">
                                    <div class=""
                                        style="display: flex;align-items: center;justify-content: space-between; flex-wrap: wrap;   ">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products WHERE productCompany = 'Apple'");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>


                                        <div class=" item item-carousel">
                                            <div class="products">

                                                <div class="product">
                                                    <div class="product-image" style="background:#F2F3F8 !important;">
                                                        <div class="image" style="background:transparent !important; ">
                                                            <a
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    width="100%" height="100%" alt=""></a>
                                                        </div><!-- /.image -->


                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left"
                                                        style="width:250px !important; margin-top:5px !important;padding: 0 !important;">
                                                        <h3 class="name"><a
                                                                style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                        </h3>

                                                        <div class=" product-price" style="margin-top: -10px; ">
                                                            <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                                Rs.<?php echo htmlentities($row['productPrice']); ?>
                                                            </span>
                                                        </div><!-- /.product-price -->
                                                        <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                        <div class="action " style="width: 100%; "><a
                                                                href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                                Add </a>
                                                        </div>
                                                        <?php } else { ?>
                                                        <div class=" action" style="color:red ;width: 100%; ">
                                                            <button class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
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
                            <div class="tab-pane" id="Samsung">
                                <div class="product-slider">
                                    <div class=""
                                        style="display: flex;align-items: center;justify-content: space-between; flex-wrap: wrap;   ">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products WHERE productCompany = 'Samsung'");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>



                                        <div class=" item item-carousel">
                                            <div class="products">

                                                <div class="product">
                                                    <div class="product-image" style="background:#F2F3F8 !important;">
                                                        <div class="image" style="background:transparent !important; ">
                                                            <a
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    width="100%" height="100%" alt=""></a>
                                                        </div><!-- /.image -->


                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left"
                                                        style="width:250px !important; margin-top:5px !important;padding: 0 !important;">
                                                        <h3 class="name"><a
                                                                style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                        </h3>

                                                        <div class=" product-price" style="margin-top: -10px; ">
                                                            <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                                Rs.<?php echo htmlentities($row['productPrice']); ?>
                                                            </span>
                                                        </div><!-- /.product-price -->
                                                        <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                        <div class="action " style="width: 100%; "><a
                                                                href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                                Add </a>
                                                        </div>
                                                        <?php } else { ?>
                                                        <div class=" action" style="color:red ;width: 100%; ">
                                                            <button class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
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
                            <div class="tab-pane" id="ZARA">
                                <div class="product-slider">
                                    <div class=""
                                        style="display: flex;align-items: center;justify-content: space-between; flex-wrap: wrap;   ">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products WHERE productCompany = 'ZARA'");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>



                                        <div class=" item item-carousel">
                                            <div class="products">

                                                <div class="product">
                                                    <div class="product-image" style="background:#F2F3F8 !important;">
                                                        <div class="image" style="background:transparent !important; ">
                                                            <a
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    width="100%" height="100%" alt=""></a>
                                                        </div><!-- /.image -->


                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left"
                                                        style="width:250px !important; margin-top:5px !important;padding: 0 !important;">
                                                        <h3 class="name"><a
                                                                style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                        </h3>

                                                        <div class=" product-price" style="margin-top: -10px; ">
                                                            <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                                Rs.<?php echo htmlentities($row['productPrice']); ?>
                                                            </span>
                                                        </div><!-- /.product-price -->
                                                        <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                        <div class="action " style="width: 100%; "><a
                                                                href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                                Add </a>
                                                        </div>
                                                        <?php } else { ?>
                                                        <div class=" action" style="color:red ;width: 100%; ">
                                                            <button class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
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
                            <div class="tab-pane" id="NIKE">
                                <div class="product-slider">
                                    <div class=""
                                        style="display: flex;align-items: center;justify-content: space-between; flex-wrap: wrap;   ">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products WHERE productCompany = 'NIKE'");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>



                                        <div class=" item item-carousel">
                                            <div class="products">

                                                <div class="product">
                                                    <div class="product-image" style="background:#F2F3F8 !important;">
                                                        <div class="image" style="background:transparent !important; ">
                                                            <a
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    width="100%" height="100%" alt=""></a>
                                                        </div><!-- /.image -->


                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left"
                                                        style="width:250px !important; margin-top:5px !important;padding: 0 !important;">
                                                        <h3 class="name"><a
                                                                style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                        </h3>

                                                        <div class=" product-price" style="margin-top: -10px; ">
                                                            <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                                Rs.<?php echo htmlentities($row['productPrice']); ?>
                                                            </span>
                                                        </div><!-- /.product-price -->
                                                        <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                        <div class="action " style="width: 100%; "><a
                                                                href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                                Add </a>
                                                        </div>
                                                        <?php } else { ?>
                                                        <div class=" action" style="color:red ;width: 100%; ">
                                                            <button class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
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
                            <div class="tab-pane" id="blackandwhiteandGray">
                                <div class="product-slider">
                                    <div class=""
                                        style="display: flex;align-items: center;justify-content: space-between; flex-wrap: wrap;   ">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products WHERE productColor IN ('Black', 'Black & White', 'Black & Gray','White & Teal')");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>
                                        <div class=" item item-carousel">
                                            <div class="products">

                                                <div class="product">
                                                    <div class="product-image" style="background:#F2F3F8 !important;">
                                                        <div class="image" style="background:transparent !important; ">
                                                            <a
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    width="100%" height="100%" alt=""></a>
                                                        </div><!-- /.image -->


                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left"
                                                        style="width:250px !important; margin-top:5px !important;padding: 0 !important;">
                                                        <h3 class="name"><a
                                                                style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                        </h3>

                                                        <div class=" product-price" style="margin-top: -10px; ">
                                                            <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                                Rs.<?php echo htmlentities($row['productPrice']); ?>
                                                            </span>
                                                        </div><!-- /.product-price -->
                                                        <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                        <div class="action " style="width: 100%; "><a
                                                                href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                                Add </a>
                                                        </div>
                                                        <?php } else { ?>
                                                        <div class=" action" style="color:red ;width: 100%; ">
                                                            <button class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
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
                            <div class="tab-pane" id="Blue">
                                <div class="product-slider">
                                    <div class=""
                                        style="display: flex;align-items: center;justify-content: space-between; flex-wrap: wrap;   ">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products WHERE productColor IN ('Blue', 'Skyblue')");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>
                                        <div class=" item item-carousel">
                                            <div class="products">

                                                <div class="product">
                                                    <div class="product-image" style="background:#F2F3F8 !important;">
                                                        <div class="image" style="background:transparent !important; ">
                                                            <a
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    width="100%" height="100%" alt=""></a>
                                                        </div><!-- /.image -->


                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left"
                                                        style="width:250px !important; margin-top:5px !important;padding: 0 !important;">
                                                        <h3 class="name"><a
                                                                style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                        </h3>

                                                        <div class=" product-price" style="margin-top: -10px; ">
                                                            <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                                Rs.<?php echo htmlentities($row['productPrice']); ?>
                                                            </span>
                                                        </div><!-- /.product-price -->
                                                        <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                        <div class="action " style="width: 100%; "><a
                                                                href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                                Add </a>
                                                        </div>
                                                        <?php } else { ?>
                                                        <div class=" action" style="color:red ;width: 100%; ">
                                                            <button class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
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
                            <div class="tab-pane" id="Pink">
                                <div class="product-slider">
                                    <div class=""
                                        style="display: flex;align-items: center;justify-content: space-between; flex-wrap: wrap;   ">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products WHERE productColor IN ('Pink','Bright Pink')");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>
                                        <div class=" item item-carousel">
                                            <div class="products">

                                                <div class="product">
                                                    <div class="product-image" style="background:#F2F3F8 !important;">
                                                        <div class="image" style="background:transparent !important; ">
                                                            <a
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    width="100%" height="100%" alt=""></a>
                                                        </div><!-- /.image -->


                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left"
                                                        style="width:250px !important; margin-top:5px !important;padding: 0 !important;">
                                                        <h3 class="name"><a
                                                                style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                        </h3>

                                                        <div class=" product-price" style="margin-top: -10px; ">
                                                            <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                                Rs.<?php echo htmlentities($row['productPrice']); ?>
                                                            </span>
                                                        </div><!-- /.product-price -->
                                                        <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                        <div class="action " style="width: 100%; "><a
                                                                href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                                Add </a>
                                                        </div>
                                                        <?php } else { ?>
                                                        <div class=" action" style="color:red ;width: 100%; ">
                                                            <button class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
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
                            <div class="tab-pane" id="Red">
                                <div class="product-slider">
                                    <div class=""
                                        style="display: flex;align-items: center;justify-content: space-between; flex-wrap: wrap;   ">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products WHERE productColor IN ('Red','Dusty Rose','Copper Red')");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>
                                        <div class=" item item-carousel">
                                            <div class="products">

                                                <div class="product">
                                                    <div class="product-image" style="background:#F2F3F8 !important;">
                                                        <div class="image" style="background:transparent !important; ">
                                                            <a
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    width="100%" height="100%" alt=""></a>
                                                        </div><!-- /.image -->


                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left"
                                                        style="width:250px !important; margin-top:5px !important;padding: 0 !important;">
                                                        <h3 class="name"><a
                                                                style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                        </h3>

                                                        <div class=" product-price" style="margin-top: -10px; ">
                                                            <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                                Rs.<?php echo htmlentities($row['productPrice']); ?>
                                                            </span>
                                                        </div><!-- /.product-price -->
                                                        <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                        <div class="action " style="width: 100%; "><a
                                                                href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                                Add </a>
                                                        </div>
                                                        <?php } else { ?>
                                                        <div class=" action" style="color:red ;width: 100%; ">
                                                            <button class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
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
                            <div class="tab-pane" id="Green">
                                <div class="product-slider">
                                    <div class=""
                                        style="display: flex;align-items: center;justify-content: space-between; flex-wrap: wrap;   ">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products WHERE productColor = 'Green'");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>
                                        <div class=" item item-carousel">
                                            <div class="products">

                                                <div class="product">
                                                    <div class="product-image" style="background:#F2F3F8 !important;">
                                                        <div class="image" style="background:transparent !important; ">
                                                            <a
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    width="100%" height="100%" alt=""></a>
                                                        </div><!-- /.image -->


                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left"
                                                        style="width:250px !important; margin-top:5px !important;padding: 0 !important;">
                                                        <h3 class="name"><a
                                                                style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                        </h3>

                                                        <div class=" product-price" style="margin-top: -10px; ">
                                                            <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                                Rs.<?php echo htmlentities($row['productPrice']); ?>
                                                            </span>
                                                        </div><!-- /.product-price -->
                                                        <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                        <div class="action " style="width: 100%; "><a
                                                                href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                                Add </a>
                                                        </div>
                                                        <?php } else { ?>
                                                        <div class=" action" style="color:red ;width: 100%; ">
                                                            <button class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
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
                            <div class="tab-pane" id="Silver">
                                <div class="product-slider">
                                    <div class=""
                                        style="display: flex;align-items: center;justify-content: space-between; flex-wrap: wrap;   ">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products WHERE productColor IN ('Silver','Silver Shadow')");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>
                                        <div class=" item item-carousel">
                                            <div class="products">

                                                <div class="product">
                                                    <div class="product-image" style="background:#F2F3F8 !important;">
                                                        <div class="image" style="background:transparent !important; ">
                                                            <a
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    width="100%" height="100%" alt=""></a>
                                                        </div><!-- /.image -->


                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left"
                                                        style="width:250px !important; margin-top:5px !important;padding: 0 !important;">
                                                        <h3 class="name"><a
                                                                style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                        </h3>

                                                        <div class=" product-price" style="margin-top: -10px; ">
                                                            <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                                Rs.<?php echo htmlentities($row['productPrice']); ?>
                                                            </span>
                                                        </div><!-- /.product-price -->
                                                        <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                        <div class="action " style="width: 100%; "><a
                                                                href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                                Add </a>
                                                        </div>
                                                        <?php } else { ?>
                                                        <div class=" action" style="color:red ;width: 100%; ">
                                                            <button class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
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
                            <div class="tab-pane" id="Yellow">
                                <div class="product-slider">
                                    <div class=""
                                        style="display: flex;align-items: center;justify-content: space-between; flex-wrap: wrap;   ">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products WHERE productColor IN ('Yellow','Sunshine Yellow')");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>
                                        <div class=" item item-carousel">
                                            <div class="products">

                                                <div class="product">
                                                    <div class="product-image" style="background:#F2F3F8 !important;">
                                                        <div class="image" style="background:transparent !important; ">
                                                            <a
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    width="100%" height="100%" alt=""></a>
                                                        </div><!-- /.image -->


                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left"
                                                        style="width:250px !important; margin-top:5px !important;padding: 0 !important;">
                                                        <h3 class="name"><a
                                                                style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                        </h3>

                                                        <div class=" product-price" style="margin-top: -10px; ">
                                                            <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                                Rs.<?php echo htmlentities($row['productPrice']); ?>
                                                            </span>
                                                        </div><!-- /.product-price -->
                                                        <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                        <div class="action " style="width: 100%; "><a
                                                                href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0; ">
                                                                Add </a>
                                                        </div>
                                                        <?php } else { ?>
                                                        <div class=" action" style="color:red ;width: 100%; ">
                                                            <button class="lnk btn btn-primary col-lg-12 addtocart"
                                                                style="font-size: 12px;font-weight: 500;font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ;  ">
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




                            <section class="section featured-product inner-xs wow fadeInUp"
                                style="display: flex;align-items: center;justify-content: space-between;flex-wrap: wrap;     ">
                                <div class="" style="width: 250px  !important ;  ">
                                    <h3 class="section-title"
                                        style="font-family: 'Raleway' , sans-serif;font-size:15px;font-weight:600 !important ;color: #000;border-color: #000; margin-bottom: 100px !important ;    ">
                                        MAN'S SHIRTS
                                    </h3>
                                    <?php
                                    $ret = mysqli_query($con, "SELECT * FROM products WHERE category = 10 and subcategory=18 ORDER BY RAND() LIMIT 4");
                                    while ($row = mysqli_fetch_array($ret)) {
                                        # code...
                                    ?>
                                    <div class="item"
                                        style="display: flex;align-items: center;justify-content: center;">
                                        <div class="products" style="width: 250px !important ;  ">
                                            <div class="product"
                                                style="width: 250px !important ; margin-top: -50px !important ; ">
                                                <div class="product-micro">
                                                    <div class="row product-micro-row"
                                                        style="height: 100% !important ;  ">
                                                        <div class="col col-xs-4 col-lg-4 col-sm-4"
                                                            style="height: 100% !important ;margin-bottom: 20px;">
                                                            <div class="product-image"
                                                                style="background: #F2F3F8; width: 80px; height:100% !important ;">
                                                                <div class="image"
                                                                    style="background:transparent !important;width: 80px; height:100%;border:1px solid black ;">
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
                                                                <h3 class="name" style="display: block !important ;  ">
                                                                    <a style="  font-weight: 600 !important ;font-family:'Raleway',sans-serif ; font-size: 11px !important ; color: #000;text-transform: capitalize;  "
                                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                                </h3>
                                                                <div class=" product-price">
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
                                <div class="" style="width: 250px !important ;  ">

                                    <h3 class="section-title"
                                        style="font-family: 'Raleway' , sans-serif;font-size:15px;font-weight:600 !important ;color: #000;border-color: #000; margin-bottom: 100px !important ;    ">
                                        WOMAN'S SHIRTS
                                    </h3>
                                    <?php
                                    $ret = mysqli_query($con, "SELECT * FROM products WHERE category = 8 and subcategory=15 ORDER BY RAND() LIMIT 4");
                                    while ($row = mysqli_fetch_array($ret)) {
                                        # code...
                                    ?>
                                    <div class="item"
                                        style="display: flex;align-items: center;justify-content: center;">
                                        <div class=" products" style="width: 250px !important ;  ">
                                            <div class="product"
                                                style="width: 250px !important ;  margin-top: -50px !important ; ">
                                                <div class="product-micro">
                                                    <div class="row product-micro-row"
                                                        style="height: 100% !important ;">
                                                        <div class="col col-xs-4 col-lg-4 col-sm-4"
                                                            style="height: 100% !important ;margin-bottom: 20px;  ">
                                                            <div class="product-image"
                                                                style="background: #F2F3F8; width: 80px; height:100%;">
                                                                <div class="image"
                                                                    style="background:transparent !important;width: 80px; height:100%;border:1px solid black ;">
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
                                                                <h3 class="name" style="display: block !important ;  ">
                                                                    <a style="   font-weight: 600 !important ;font-family:'Raleway',sans-serif ; font-size: 11px !important ; color: #000;text-transform: capitalize;   "
                                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                                </h3>
                                                                <div class=" product-price">
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
                                <div class="" style="width: 250px !important  ;  ">
                                    <h3 class="section-title"
                                        style="font-family: 'Raleway' , sans-serif;font-size:15px;font-weight:600 !important ;color: #000;border-color: #000; margin-bottom: 100px !important ;    ">
                                        MAN'S T-SHIRTS
                                    </h3>
                                    <?php
                                    $ret = mysqli_query($con, "SELECT * FROM products WHERE category = 10 and subcategory = 17 ORDER BY RAND() LIMIT 4");
                                    while ($row = mysqli_fetch_array($ret)) {
                                        # code...
                                    ?>
                                    <div class="item"
                                        style="display: flex;align-items: center;justify-content: center;">
                                        <div class="products" style="width: 250px !important  ;  ">
                                            <div class="product"
                                                style="width: 250px !important  ;margin-top: -50px !important ; ">
                                                <div class="product-micro">
                                                    <div class="row product-micro-row"
                                                        style="height: 100% !important ;  ">
                                                        <div class="col col-xs-4 col-lg-4 col-sm-4"
                                                            style="height: 100% !important ;margin-bottom: 20px; ">
                                                            <div class="product-image"
                                                                style="background: #F2F3F8; width: 80px; height:100%;">
                                                                <div class="image"
                                                                    style="background:transparent !important;width: 80px; height:100%;border:1px solid black ;">
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
                                                                <h3 class="name" style="display: block !important ;  ">
                                                                    <a style="   font-weight: 600 !important ;font-family:'Raleway',sans-serif ; font-size: 11px !important ; color: #000;text-transform: capitalize;  "
                                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?>
                                                                    </a>
                                                                </h3>
                                                                <div class=" product-price">
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

                                <div class="" style="width: 250px !important  ;  ">
                                    <h3 class="section-title"
                                        style="font-family: 'Raleway' , sans-serif;font-size:15px;font-weight:600 !important ;color: #000;border-color: #000; margin-bottom: 100px !important ;    ">
                                        WOMAN'S T-SHIRTS
                                    </h3>
                                    <?php
                                    $ret = mysqli_query($con, "SELECT * FROM products WHERE category = 8 and subcategory = 16 ORDER BY RAND() LIMIT 4");
                                    while ($row = mysqli_fetch_array($ret)) {
                                        # code...
                                    ?>
                                    <div class="item"
                                        style="display: flex;align-items: center;justify-content: center;">
                                        <div class="products" style="width: 250px !important  ;  ">
                                            <div class="product"
                                                style="width: 250px !important  ;margin-top: -50px !important ; ">
                                                <div class="product-micro">
                                                    <div class="row product-micro-row"
                                                        style="height: 100% !important ;  ">
                                                        <div class="col col-xs-4 col-lg-4 col-sm-4"
                                                            style="height: 100% !important ;margin-bottom: 20px;">
                                                            <div class="product-image"
                                                                style="background: #F2F3F8; width: 80px; height:100%;">
                                                                <div class="image"
                                                                    style="background:transparent !important;width: 80px; height:100%;border:1px solid black ;">
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
                                                                <h3 class="name" style="display: block !important ;  ">
                                                                    <a style="   font-weight: 600 !important ;font-family:'Raleway',sans-serif ; font-size: 11px !important ; color: #000;text-transform: capitalize;  "
                                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                                </h3>
                                                                <div class=" product-price">
                                                                    <span class="price"
                                                                        style="font-family: sans-serif, ' Poppins'!important;font-weight: normal !important ;font-size: 11px ; ">
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

                        </div>
                    </div>
                </div>
            </div>
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
    <!-- For demo purposes – can be removed on production : End -->
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
    ScrollReveal().reveal(".product-slider .image", {
        ...scrollRevealOption,
        origin: "bottom",
        delay: 500,
    });
    </script>
</body>

</html>