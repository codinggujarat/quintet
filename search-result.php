<?php
session_start();
error_reporting(0);
include('includes/config.php');
$find = "%{$_POST['product']}%";
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

    <title>Search engine | QUINTET</title>

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
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div>
            <div class='row outer-bottom-sm'>
                <div class='col-md-12'>
                    <!-- ========================================== SECTION – HERO ========================================= -->

                    <div id="category" class="category-carousel ">
                        <div class="image">
                            <div class="" style="text-align: left; background-color: transparent ; padding-left:10px;">
                                <h1
                                    style="font-family: 'Raleway' sans-serif !important; text-transform:uppercase    ; color: #fff; font-size: 14px;font-weight: 300 !important;color: #000; ">
                                    If you're not happy with the results, please do another search.
                                </h1>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="caption vertical-top text-left">
                                <div class="big-text">
                                    <br />
                                </div>



                            </div><!-- /.caption -->
                        </div><!-- /.container-fluid -->
                    </div>
                </div>

                <div class="search-result-container">
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active " id="grid-container">
                            <div class="category-product  inner-top-vs">
                                <style>
                                @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');

                                .productimagetab {
                                    display: flex;
                                    align-items: center;
                                    justify-content: start !important;
                                    flex-wrap: wrap;
                                    width: 100%;
                                }

                                @media only screen and (max-width: 800px) {
                                    .productimagetab {
                                        display: flex;
                                        align-items: center;
                                        justify-content: center !important;
                                        flex-wrap: wrap;
                                    }
                                }

                                .btn-card-box {
                                    padding: 20px;
                                    position: sticky;
                                    top: 5%;
                                    background: transparent;
                                    z-index: 999;
                                }

                                .btn-card {
                                    display: flex;
                                    align-items: center;
                                    justify-content: end;
                                    padding: 0px 20px;
                                }

                                .card .image {
                                    background: #f2f3f8 !important;
                                    width: 100%;
                                    height: 100%;
                                    border: 1px solid black;
                                }

                                @media (max-width: 767.98px) {
                                    .card .image {
                                        width: 220px;
                                    }
                                }

                                @media (max-width: 500px) {
                                    .card .image {
                                        width: 150px;
                                    }
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
                                }

                                .responsiveCard {
                                    height: 100vh;
                                    width: 100%;
                                }
                                </style>

                                <div class=""
                                    style="width: 100%;padding-top: 50px;padding-left:10px; border-bottom:1px solid black;">
                                    <span class="    "
                                        style="margin-left:20px;padding-bottom:20px; text-align: left;   font-family: 'Raleway',sans-serif !important; font-size: 15px;color: #000; text-transform: capitalize  ;font-weight: 500;  ">
                                        WOMAN </span>
                                    <div class="col-lg-12 col-md-12 col-sm-12 btn-card-box">
                                        <div class="btn-card">
                                            <svg id="MYGRID6" width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="4" y="4" width="16" height="16" stroke="black" stroke-width="1"
                                                    stroke-linecap="none" stroke-linejoin="round" />
                                            </svg>
                                            <svg id="MYGRID2" width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                                style="margin-left: 10px;" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.5 3.5H10.5V20.5H3.5V3.5Z" stroke="#000000" stroke-width="1"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M13.5 3.5H20.5V20.5H13.5V3.5Z" stroke="#000000"
                                                    stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <svg id="MYGRID12" width="20px" height="20px" viewBox="0 0 24 24"
                                                fill="none" style="margin-left: 10px;"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.5 3.5H10.5V10.5H3.5V3.5Z" stroke="#000000" stroke-width="1"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M3.5 13.5H10.5V20.5H3.5V13.5Z" stroke="#000000"
                                                    stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M13.5 3.5H20.5V10.5H13.5V3.5Z" stroke="#000000"
                                                    stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M13.5 13.5H20.5V20.5H13.5V13.5Z" stroke="#000000"
                                                    stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="productimagetab">
                                    <?php
                                    $ret = mysqli_query($con, "select * from products where productName like '%$find%' AND category=8");
                                    $num = mysqli_num_rows($ret);
                                    if ($num > 0) {
                                        while ($row = mysqli_fetch_array($ret)) { ?>
                                    <style>
                                    @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');



                                    .product {
                                        height: 100%;
                                        margin: 0;
                                        width: 300px;
                                        padding: 0;
                                        flex-wrap: wrap;
                                    }

                                    .item {
                                        border: 1px solid black !important;
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


                                    @media only screen and (max-width: 550px) {


                                        .product {
                                            width: 210px;
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

                                        .product-info .favorites {
                                            display: none;
                                        }
                                    }

                                    @media only screen and (max-width: 350px) {

                                        .products,
                                        .product {
                                            width: 100px !important;
                                        }

                                        .name {
                                            width: 100% !important;
                                        }

                                    }


                                    .product-info .favorites {
                                        position: absolute;
                                        right: 5px;
                                        top: 10px;
                                        width: 20px;
                                        height: 20px;
                                        background: white;
                                    }

                                    .product-info .favorites a {
                                        text-decoration: none;
                                    }
                                    </style>


                                    <div class=" item item-carousel ">
                                        <div class="products">
                                            <div class="product responsiveCard">
                                                <div class="product-image" style=" background:#F2F3F8 !important; ">
                                                    <div class=" image " data-wow-delay="0.1s"
                                                        style="background:transparent !important;">
                                                        <a
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                            <img src=" admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageSix']); ?>"
                                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageSix']); ?>"
                                                                width=" 100%" height="100%" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class=" product-info text-left productName"
                                                    style="position:relative; padding-left:10px; ">
                                                    <h3 class="name" style="margin-top:10px;">
                                                        <a style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                    </h3>
                                                    <div class=" product-price" style="margin-top: -15px; ">
                                                        <span class="price" style=" color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 10px; ">
                                                            ₹
                                                            <span style="margin-left: 1px;">
                                                                <?php echo htmlentities($row['productPrice']); ?>
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <div class="favorites">
                                                        <a title="favourites"
                                                            style="   border-radius: 0 !important ; font-size: 12px !important ; "
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']) ?>&&action=wishlist">
                                                            <svg fill="#000000" height="10px" width="10px" version="1.1"
                                                                id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
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
                                        </div>
                                    </div>
                                    <?php }
                                    } else { ?>

                                    <div class="col-lg-12 col-sm-6 col-md-4 wow fadeInUp"
                                        style="display: flex;align-items: center;justify-content: center;  height: 50vh !important   ;   ">
                                        <h1
                                            style="font-family: 'Raleway' sans-serif !important; text-transform:uppercase    ; color: #fff; font-size: 30px;font-weight: 500 !important;color: #000; ">
                                            No Product Found
                                        </h1>
                                    </div>

                                    <?php } ?>










                                </div><!-- /.row -->
                                <div class=""
                                    style="width: 100%;padding-top: 50px;padding-left:10px; border-bottom:1px solid black;">
                                    <span class="    "
                                        style="margin-left:20px;padding-bottom:20px; text-align: left;   font-family: 'Raleway',sans-serif !important; font-size: 15px;color: #000; text-transform: capitalize  ;font-weight: 500;  ">
                                        MAN </span>
                                </div>
                                <div class="productimagetab">


                                    <?php
                                    $ret = mysqli_query($con, "select * from products where productName like '$find' AND category=10");
                                    $num = mysqli_num_rows($ret);
                                    if ($num > 0) {
                                        while ($row = mysqli_fetch_array($ret)) { ?>
                                    <div class=" item item-carousel ">
                                        <div class="products">
                                            <div class="product responsiveCard">
                                                <div class="product-image" style=" background:#F2F3F8 !important; ">
                                                    <div class=" image " data-wow-delay="0.1s"
                                                        style="background:transparent !important;">
                                                        <a
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                            <img src=" admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageSix']); ?>"
                                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageSix']); ?>"
                                                                width=" 100%" height="100%" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class=" product-info text-left productName"
                                                    style="position:relative; padding-left:10px; ">
                                                    <h3 class="name" style="margin-top:10px;">
                                                        <a style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                    </h3>
                                                    <div class=" product-price" style="margin-top: -15px; ">
                                                        <span class="price" style=" color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 10px; ">
                                                            ₹
                                                            <span style="margin-left: 1px;">
                                                                <?php echo htmlentities($row['productPrice']); ?>
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <div class="favorites">
                                                        <a title="favourites"
                                                            style="   border-radius: 0 !important ; font-size: 12px !important ; "
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']) ?>&&action=wishlist">
                                                            <svg fill="#000000" height="10px" width="10px" version="1.1"
                                                                id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
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
                                        </div>
                                    </div>
                                    <?php }
                                    } else { ?>

                                    <div class="col-lg-12 col-sm-6 col-md-4 wow fadeInUp"
                                        style="display: flex;align-items: center;justify-content: center;  height: 50vh !important   ;   ">
                                        <h1
                                            style="font-family: 'Raleway' sans-serif !important; text-transform:uppercase    ; color: #fff; font-size: 30px;font-weight: 500 !important;color: #000; ">
                                            No Product Found
                                        </h1>
                                    </div>

                                    <?php } ?>










                                </div><!-- /.row -->
                            </div><!-- /.category-product -->

                        </div><!-- /.tab-pane -->



                    </div><!-- /.search-result-container -->

                </div><!-- /.col -->
            </div>
        </div>

    </div>
    </div>
    <?php include('includes/brands-slider.php'); ?>
    <?php include('includes/footer.php'); ?>
    <script src=" assets/js/jquery-1.11.1.min.js">
    </script>

    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>

    <script src="assets/js/echo.min.js"></script>
    <script src="assets/js/jquery.easing-1.3.min.js"></script>
    <script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js">
    </script>
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
    document.getElementById('MYGRID6').addEventListener('click', function() {
            var boxes = document.querySelectorAll(
                '.responsiveCard'); // Select all elements with the class 'myBox'

            boxes.forEach(function(box) {
                    box.style.width = "100%"; // Toggle 'active' class for each box
                }

            );
            var productName = document.querySelectorAll('.productName');
            productName.forEach(function(productName) {
                productName.style.display = "none"; // Toggle 'active' class for each box
            });
        }

    );

    document.getElementById('MYGRID2').addEventListener('click', function() {
            var boxes = document.querySelectorAll(
                '.responsiveCard'); // Select all elements with the class 'myBox'

            boxes.forEach(function(box) {
                    box.style.width = "210px"; // Toggle 'active' class for each box
                }

            );
            var productName = document.querySelectorAll('.productName');
            productName.forEach(function(productName) {
                productName.style.display = "block"; // Toggle 'active' class for each box
            });
        }

    );

    document.getElementById('MYGRID12').addEventListener('click', function() {
            var boxes = document.querySelectorAll(
                '.responsiveCard'); // Select all elements with the class 'myBox'

            boxes.forEach(function(box) {
                    box.style.width = "130px"; // Toggle 'active' class for each box
                }

            );
            var productName = document.querySelectorAll('.productName');
            productName.forEach(function(productName) {
                productName.style.display = "none"; // Toggle 'active' class for each box
            });
        }

    );
    </script>

</body>

</html>