<?php
session_start();
error_reporting(0);
include('includes/config.php');
$cid = intval($_GET['cid']);
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
// COde for Wishlist
if (isset($_GET['pid']) && $_GET['action'] == "wishlist") {
    if (strlen($_SESSION['login']) == 0) {
        header('location:login.php');
    } else {
        mysqli_query($con, "insert into wishlist(userId,productId) values('" . $_SESSION['id'] . "','" . $_GET['pid'] . "')");
        echo "<script>alert('Product aaded in wishlist');</script>";
        header('location:my-wishlist.php');
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

    <title>Product Category</title>

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
    <!-- Demo Purpose Only. Should be removed in production : END -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- box-icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
    <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.js"></script>
            <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- animated  -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />

</head>

<body class="cnt-home" style="background: white !important;">

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
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='row outer-bottom-sm'>
            <div class="col-lg-12 col-md-12 col-sm-12">

                <div class="image">
                    <?php $sql = mysqli_query($con, "select categoryName  from category where id='$cid'");
                    while ($row = mysqli_fetch_array($sql)) {
                    ?>

                    <div class="excerpt ">
                        <h1
                            style="text-align: center; font-family:  'Raleway', sans-serif  !important;  text-transform: uppercase   ; color: lightgray; font-size: 50px ; text-align: center important; font-weight: 400 !important;margin-left: 5px; color: #000;">
                            <?php echo htmlentities($row['categoryName']); ?>
                        </h1>
                    </div>
                    <?php } ?>
                </div>
                <style>
                .megamenu-horizontal ul li a {
                    border: 2px solid black;
                    margin-left: 10px;
                    padding: 4px 10px;
                    font-size: 14px;
                    font-weight: 700 !important;
                }

                .megamenu-horizontal ul li {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
                </style>
                <nav class=" yamm megamenu-horizontal" role="navigation">
                    <ul class="nav">
                        <li class="dropdown menu-item">
                            <?php $sql = mysqli_query($con, "select id,subcategory  from subcategory where categoryid='$cid'");

                            while ($row = mysqli_fetch_array($sql)) {
                            ?>
                            <a href="sub-category.php?scid=<?php echo $row['id']; ?>" class=" dropdown-toggle">
                                <?php echo $row['subcategory']; ?>
                            </a>
                            <?php } ?>

                        </li>
                    </ul>
                </nav>

            </div>
            <div class='col-md-2 sidebar'>
                <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const menuButton = document.querySelector('.bx-slider-alt, .bx-slider-alt');
                    const card = document.getElementById('MYFILTER');

                    if (menuButton && card) {
                        menuButton.addEventListener('click', () => {
                            const isCardVisible = card.style.display === 'block';

                            // Toggle visibility of the card
                            if (isCardVisible) {
                                card.style.display = 'none';
                                menuButton.classList.remove('bx-slider-alt');
                                menuButton.classList.add('bx-slider-alt');
                            } else {
                                card.style.display = 'block';
                                menuButton.classList.remove('bx-slider-alt');
                                menuButton.classList.add('bx-slider-alt');
                            }
                        });

                        // Optional: Close the card if clicked outside
                        document.addEventListener('click', (event) => {
                            if (!card.contains(event.target) && !menuButton
                                .contains(event
                                    .target)) {
                                card.style.display = 'none';
                                menuButton.classList.remove('bx-slider-alt');
                                menuButton.classList.add('bx-slider-alt');
                            }
                        });
                    }
                });
                </script>
                <style>
                .sidebar {
                    position: sticky !important;
                    top: 20px !important;
                }

                @media only screen and (max-width: 800px) {
                    .sidebar {
                        position: relative !important;
                    }
                }
                </style>
                <style>
                .OPENFILTER {
                    background: transparent !important;
                    outline: 0;
                    border: 0 solid black;

                    width: 100%;
                    padding: 10px 20px;
                    font-size: 18px;
                    color: #000;
                    display: flex;
                    align-items: center;
                }

                .filter-menu {
                    position: sticky;
                    z-index: 999999;
                    width: 230px !important;
                    height: 100% !important;
                    /* display: none; */
                }

                .filter-menu li {
                    margin-bottom: 20px;
                }

                .filter-menu li a {
                    display: flex;
                    align-items: center;
                    text-align: left;
                    justify-content: start;
                    font-size: 15px !important;
                    color: #000 !important;
                    text-transform: capitalize !important;
                    font-weight: 600 !important;
                    font-family: 'Raleway', sans-serif !important;
                }

                .filter-menu h4 {
                    font-size: 17px;
                    color: #000 !important;
                    font-weight: 600;
                    font-family: 'Raleway', sans-serif !important;
                    text-transform: capitalize !important;
                    border-bottom: 1px solid black;
                    padding-bottom: 10px;
                }

                @media screen and (max-width: 768px) {


                    .filter-menu {
                        padding: 15px 20px;
                    }

                    .filter-menu {
                        position: fixed;
                        top: 0;
                        left: -100%;
                        height: 100%;
                        max-width: 300px;
                        width: 100%;
                        padding-top: 100px;
                        row-gap: 30px;
                        flex-direction: column;
                        transition: all 0.4s ease;
                        z-index: 100;
                    }

                    .filter-menu {
                        left: 0;
                    }

                    .filter-menu {
                        display: none;
                    }



                }
                </style>

                <button onclick="openForm()" class="OPENFILTER filterALL">
                    Filter & Refine
                    <i class='bx bx-slider-alt' style="margin-left: 10px;font-size: 20px; "></i>
                </button>
                <!-- ================================== TOP NAVIGATION ================================== -->
                <div class="side-menu animate-dropdown outer-bottom-xs">
                    <div class=" side-menu animate-dropdown outer-bottom-xs">
                        <div class="filter-menu" id="MYFILTER"
                            style="border: 1px solid black !important;margin:10px ;box-shadow: none !important ; outline:none !important;background:#f2f3f8    !important;   ">
                            <div class=""
                                style=" display: flex; align-items: baseline ;justify-content: start;  flex-wrap: wrap; ">
                                <div class=" " style="padding: 18px; ">
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

                                .colors span {
                                    text-transform: capitalize;
                                    font-size: 15px;
                                }
                                </style>
                                <div class=" colors" style="padding: 18px; ">
                                    <h4>Colour's</h4>
                                    <ul>
                                        <li>

                                            <a href="#all" data-toggle="tab">
                                                <div class="box"
                                                    style="background: linear-gradient(to right, red, orange, yellow, green, blue, indigo, violet);">
                                                </div>
                                                <span>All</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#blackandwhiteandGray" data-toggle="tab">
                                                <div class='box black '></div>
                                                <div class='box white'></div>
                                                <span>Black & White</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#Blue" data-toggle="tab">
                                                <div class='box blue '></div>
                                                <span>Blue</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#Pink" data-toggle="tab">
                                                <div class='box pink '></div>
                                                <span>Pink</span>

                                            </a>
                                        </li>
                                        <li>
                                            <a href="#Red" data-toggle="tab">
                                                <div class='box red '></div>
                                                <span>Red & Rose</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#Green" data-toggle="tab">
                                                <div class='box green '></div>
                                                <span>Green</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#Yellow" data-toggle="tab">
                                                <div class='box yellow '></div>
                                                <span>Yellow</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>

                    </div>
                </div><!-- /.side-menu -->
                <style>
                @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');

                .sidebar .side-menu nav .nav>li>a,
                .sidebar .side-menu nav .nav>li>a.dropdown-toggle::after {
                    color: #000 !important;
                    font-size: 13px !important;
                    font-weight: 400 !important;
                    text-transform: uppercase !important;
                    font-family: 'Raleway', sans-serif !important;
                    padding: 8px 13px;
                }

                .sidebar .side-menu nav .nav>li>a.dropdown-toggle::after {
                    display: none !important;
                }

                .menu-item {
                    background: transparent !important;
                }

                .sidebar .side-menu nav .nav>li>a:hover,
                .sidebar .side-menu nav .nav>li>a:focus {
                    background: transparent !important;
                    border: 0px solid #555 !important;
                    color: #000 !important;
                }
                </style>
            </div>
            <!-- ================================== TOP NAVIGATION : END ================================== -->
            <div class='col-md-10' style="background-color: white !important ;">
                <!-- ========================================== SECTION – HERO ========================================= -->


                <div class="tab-content outer-top-xs" style="background: white !important   ; ">
                    <div class="tab-pane in active" id="all">
                        <div class="product-slider">
                            <div class="" data-item="4"
                                style="display: flex;align-items: center;justify-content: space-around      ; flex-wrap: wrap;   ">
                                <?php
                                $ret = mysqli_query($con, "select * from products where category='$cid ' ORDER BY RAND()");
                                while ($row = mysqli_fetch_array($ret)) {

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
                                $ret = mysqli_query($con, "select * from products where category='$cid ' ORDER BY productPrice ASC");
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
                                $ret = mysqli_query($con, "select * from products where category='$cid ' ORDER BY productPrice ASC");
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
                                $ret = mysqli_query($con, "select * from products where category='$cid '  ORDER BY productPrice DESC");
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
                                $ret = mysqli_query($con, "select * from products where category='$cid '  ORDER BY productName ASC");
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
                                $ret = mysqli_query($con, "select * from products where category='$cid '  ORDER BY productName DESC");
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
                                $ret = mysqli_query($con, "select * from products where category='$cid '  ORDER BY productName DESC");
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
                                $ret = mysqli_query($con, "SELECT * FROM products WHERE category = '$cid ' AND productColor IN ('Black', 'Black & White', 'Black & Gray', 'White & Teal') ");
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
                                $ret = mysqli_query($con, "SELECT * FROM products WHERE category = '$cid ' AND productColor IN ('Blue', 'Skyblue')");
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
                                $ret = mysqli_query($con, "SELECT * FROM products WHERE category = '$cid ' AND productColor IN ('Pink','Bright Pink')");
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
                                $ret = mysqli_query($con, "SELECT * FROM products WHERE category = '$cid ' AND productColor IN ('Red','Dusty Rose','Copper Red')");
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
                                $ret = mysqli_query($con, "SELECT * FROM products WHERE category = '$cid ' AND productColor = 'Green'");
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
                                $ret = mysqli_query($con, "SELECT * FROM products WHERE category = '$cid ' AND productColor IN ('Silver','Silver Shadow')");
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
                                $ret = mysqli_query($con, "SELECT * FROM products WHERE category = '$cid ' AND productColor IN ('Yellow','Sunshine Yellow')");
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

                                            </div><!-- /.product-info -->

                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item --> <?php } ?>


                            </div><!-- /.home-owl-carousel -->
                        </div><!-- /.product-slider -->
                    </div>


                </div><!-- /.search-result-container -->

            </div><!-- /.col -->
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