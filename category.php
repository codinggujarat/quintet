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

    <title>

        <?php $sql = mysqli_query($con, "select categoryName  from category where id='$cid'");
        while ($row = mysqli_fetch_array($sql)) {
        ?>

        <?php echo htmlentities($row['categoryName']); ?>
        <?php } ?> | QUINTET

    </title>

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

    <?php include('includes/search.php'); ?>
    <!-- ============================================== HEADER : END ============================================== -->

    <div class="body-content outer-top-xs">
        <style>
        .body-content {
            margin-top: 50px;
        }

        .categoryMenu {
            margin-left: 27px;
        }


        @media only screen and (max-width: 800px) {

            .body-content {
                margin-top: 0px !important;
            }

            .categoryMenu {
                margin-left: 0;
            }


        }
        </style>
        <div class='row '>
            <div class=" categoryMenu">

                <style>
                .megamenu-horizontal {
                    margin-left: 5px;
                    display: block;
                    margin-top: 20px;
                    width: 100%;
                    transition: all 0.3s linear;

                }

                .megamenu-horizontal::-webkit-scrollbar-track {
                    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3) !important;
                    background-color: #fff !important;
                }

                .megamenu-horizontal:hover.megamenu-horizontal::-webkit-scrollbar {
                    display: block !important;

                }

                .megamenu-horizontal::-webkit-scrollbar {
                    display: none !important;
                    width: 2px !important;
                    height: 2px !important;
                }

                .megamenu-horizontal::-webkit-scrollbar-thumb {
                    border: 10px solid #000 !important;
                }

                .megamenu-horizontal ul li a:hover {
                    background: transparent;
                }

                .megamenu-horizontal ul li:first-child {
                    margin-left: 0;
                }

                .megamenu-horizontal ul li {
                    margin-left: 20px;
                }

                .megamenu-horizontal ul li a {
                    padding: 5px 10px;
                    border-radius: 0;
                    margin: 5px;
                    font-size: 12px;
                    text-transform: uppercase;
                    font-weight: 500;
                    font-family: 'Raleway', sans-serif;
                    font-weight: 600 !important;
                    color: #000 !important;
                    border-color: #000;
                    border: 1px solid black;
                }

                .megamenu-horizontal ul li {
                    display: flex;
                    width: 200%;
                    align-items: start;
                }

                @media only screen and (max-width: 800px) {
                    .megamenu-horizontal {
                        overflow: scroll;
                    }
                }
                </style>
                <nav class="  megamenu-horizontal">
                    <ul class="">
                        <li class=" menu-item">
                            <?php $sql = mysqli_query($con, "select id,subcategory  from subcategory where categoryid='$cid'");

                            while ($row = mysqli_fetch_array($sql)) {
                            ?>
                            <a href="sub-category.php?scid=<?php echo $row['id']; ?>">
                                <?php echo $row['subcategory']; ?>
                            </a>
                            <?php } ?>
                        </li>

                    </ul>
                </nav>


            </div>

            <style>
            .filterMENU {
                margin-left: 7px;
                position: relative !important;
            }

            .filterMENU ul li button {
                background: transparent;
                padding: 5px 10px !important;
                border-radius: 0 !important;
                margin: 5px !important;
                text-transform: uppercase !important;
                font-size: 12px !important;
                font-weight: 500;
                font-family: 'Raleway', sans-serif !important;
                font-weight: 600;
                color: #000 !important;
                border-color: #000 !important;
                border: 1px solid black;
            }

            .filterMENU ul li button:focus {
                font-weight: 800 !important;
            }

            .filterMENU ul li {
                display: flex;
                align-items: center;
                justify-content: start;
                flex-wrap: wrap;
            }



            #myfiltercard1 {
                position: absolute;
                left: 0%;
                width: 500px;
                top: 100%;
                background: white;
                border: 1px solid black;
                display: none;
                z-index: 9999999 !important;
            }


            #myfiltercard2 {
                top: 100%;

                position: absolute;
                left: 0%;
                width: 500px;
                background: white;
                display: none;
                z-index: 9999999 !important;
            }

            #myfiltercard3 {
                top: 100%;

                position: absolute;
                left: 0%;
                width: 500px;

                background: white;
                border: 1px solid black;
                display: none;
                z-index: 9999999 !important;
            }

            #myfiltercard4 {
                position: absolute;
                left: 0%;
                width: 300px;

                background: white;
                border: 1px solid black;
                display: none;
                z-index: 9999999 !important;
            }

            #myfiltercard5 {
                position: absolute;
                left: 0%;
                width: 300px;

                background: white;
                border: 1px solid black;
                display: none;
                z-index: 9999999 !important;
            }

            #myfiltercard6 {
                position: absolute;
                left: 0%;
                width: 300px;

                background: white;
                border: 1px solid black;
                display: none;
                z-index: 9999999 !important;
            }

            .filtermenubar {
                padding: 20px;
            }

            .filtermenubar li {
                margin-top: 10px;
            }

            .filtermenubar .menulink {
                font-size: 12px !important;
                color: #000 !important;
                text-transform: uppercase !important;
                font-weight: 500 !important;
                font-family: 'Raleway', sans-serif !important;
            }

            .filtermenubar h4 {
                font-size: 14px;
                color: #000 !important;
                font-weight: 500;
                text-transform: uppercase;
                font-family: 'Raleway', sans-serif !important;
                text-transform: uppercase !important;
                border-bottom: 1px solid black;
                padding-bottom: 10px;
                margin-left: 10px;
            }

            .colors ul {
                display: flex;
                align-items: center;
                justify-content: start;
                flex-wrap: wrap !important;
                width: 100%;
            }



            .colors ul li {
                width: 100px;
                display: flex;
                align-items: center;
                height: 80px;
                justify-content: center;
                flex-wrap: wrap;
                border: 1px solid black;
                text-align: center;
            }

            .colors ul li .box {

                display: flex;
                align-items: center;
                justify-content: center;

            }
            </style>
            <style>
            .box.box {
                font-weight: 800 !important;
            }

            .box {
                height: 20px;
                width: 20px;
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
                text-transform: uppercase;
                font-size: 11px;
                text-align: center;
                font-weight: 400;
            }
            </style>

            <style>
            .sortbybox ul li {
                width: 100%;
                border: 1px solid black;
                text-align: left;
                padding: 10px;
                margin: 0 !important;
                border-bottom: 0 !important;
            }
            </style>




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
                left: -100%;
            }

            .filter-menu li {
                margin-bottom: 20px;
            }

            .filter-menu li a {
                display: flex;
                align-items: center;
                text-align: center;
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
                font-weight: 500;
                text-transform: uppercase;
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

                .filtermenubar {
                    background: #ffffff;
                    position: fixed;
                    bottom: 0;
                    left: 0;
                    width: 100%;
                    height: 30%;
                }
            }
            </style>


            <!-- ================================== TOP NAVIGATION ================================== -->

            <style>
            .box {
                height: 20px;
                width: 20px;
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
                text-transform: uppercase;
                font-size: 11px;
                text-align: center;
                font-weight: 600;
            }
            </style>
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

            .noFound {
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                height: 60vh !important;
                width: 100% !important;
                font-family: 'Raleway', sans-serif !important;
                color: #000 !important;
            }

            .noFound h4 {
                text-transform: uppercase;
            }
            </style>
            <!-- ================================== TOP NAVIGATION : END ================================== -->
            <div class='col-md-12' style="background-color: white !important ;">
                <!-- ========================================== SECTION – HERO ========================================= -->

                <div class="col-lg-12 col-md-12 col-sm-12 btn-card-box">
                    <div class="filterMENU">
                        <ul class="nav">
                            <li class="dropdown menu-item">
                                <button class="active" data-toggle-form="myfiltercard1">
                                    Sort by
                                </button>
                                <button data-toggle-form="myfiltercard2">
                                    Colour
                                </button>
                                <button data-toggle-form="myfiltercard3">
                                    Price
                                </button>

                            </li>
                        </ul>
                    </div>
                    <div id="myfiltercard1" style="border:0 !important;">
                        <div class="filtermenubar sortbybox"
                            style="padding: 0;border:0 !important; margin:0 !important;">
                            <ul>
                                <li><a class="menulink" href="#lowtohigh" data-toggle="tab">Price (Lowest
                                        First)</a>
                                </li>
                                <li><a class="menulink" href="#hightolow" data-toggle="tab">Price (Highest
                                        First)</a>
                                </li>
                                <li><a class="menulink" href="#AtoZ" data-toggle="tab">A to Z</a>
                                </li>
                                <li style="border-bottom: 1px solid black !important;"><a class="menulink" href="#ZtoA"
                                        data-toggle="tab">Z to A</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="myfiltercard2">
                        <div class="filtermenubar colors" style=" padding: 0 !important;margin: 0 !important;">
                            <ul style="padding: 0 !important;margin: 0 !important;">
                                <li style="padding: 0 !important;margin: 0 !important;border-right: 0 !important;">
                                    <a href="#all" data-toggle="tab">

                                        <div class="" style="
                                    display: flex;
                    align-items: center;
                    justify-content: center;">
                                            <div class="box"
                                                style="background: linear-gradient(to right, red, orange, yellow, green, blue, indigo, violet);">
                                            </div>
                                        </div>
                                        <span>All</span>
                                    </a>
                                </li>

                                <li style="padding: 0 !important;margin: 0 !important;border-right: 0 !important;">
                                    <a href="#blackandwhiteandGray" data-toggle="tab">
                                        <div class="" style="
                                    display: flex;
                    align-items: center;
                    justify-content: center;">
                                            <div class='box black '
                                                style="background: linear-gradient(to right, black, white);">
                                            </div>
                                        </div>
                                        <span>Black & White</span>
                                    </a>
                                </li>
                                <li style="padding: 0 !important;margin: 0 !important;border-right: 0 !important;">
                                    <a href=" #Blue" data-toggle="tab">
                                        <div cla style="
                                    display: flex;
                    align-items: center;
                    justify-content: center;" ss="">

                                            <div class='box blue '></div>
                                        </div>
                                        <span>Blue</span>
                                    </a>
                                </li>
                                <li style="padding: 0 !important;margin: 0 !important;border-right: 0 !important;">
                                    <a href="#Pink" data-toggle="tab">
                                        <div class="" style="
                                    display: flex;
                    align-items: center;
                    justify-content: center;">

                                            <div class='box pink '></div>
                                        </div>
                                        <span>Pink</span>

                                    </a>
                                </li>
                                <li style="padding: 0 !important;margin: 0 !important;">
                                    <a href="#Red" data-toggle="tab">
                                        <div class="" style="
                                    display: flex;
                    align-items: center;
                    justify-content: center;">

                                            <div class='box red '></div>
                                        </div>
                                        <span>Red & Rose</span>
                                    </a>
                                </li>
                                <li
                                    style="padding: 0 !important;margin: 0 !important;border-top: 0 !important;border-right: 0 !important;">
                                    <a href="#Green" data-toggle="tab">
                                        <div class="" style="
                                    display: flex;
                    align-items: center;
                    justify-content: center;">

                                            <div class='box green '></div>
                                        </div>
                                        <span>Green</span>
                                    </a>
                                </li>
                                <li style="padding: 0 !important;margin: 0 !important;border-top: 0 !important;">
                                    <a href="#Yellow" data-toggle="tab">
                                        <div class="" style="
                                    display: flex;
                    align-items: center;
                    justify-content: center;">

                                            <div class='box yellow '></div>
                                        </div>
                                        <span>Yellow</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="myfiltercard3" style="border: 0 !important;">
                        <div class="filtermenubar sortbybox"
                            style="padding: 0;border:0 !important; margin:0 !important;">
                            <ul>
                                <li><a class="menulink" href="#price3000to4000" data-toggle="tab">Price (2000 to
                                        5000)</a>
                                </li>
                                <li><a class="menulink" href="#price5000to10000" data-toggle="tab">Price (5000
                                        to 10000)</a>
                                </li>
                                <li><a class="menulink" href="#price10000to20000" data-toggle="tab">Price (10000
                                        to
                                        20000)</a>
                                </li>
                                <li style="border-bottom: 1px solid black !important;"><a class=" menulink"
                                        href="#priceover10000" data-toggle="tab">Price
                                        10000)</a>
                                </li>
                            </ul>
                        </div>
                    </div>
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
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    background: transparent;
                    position: sticky;
                    top: 5%;
                    z-index: 9999;
                    width: 100%;
                }


                .btn-card {
                    margin-top: 10px;
                }

                .card .image {
                    background: #f2f3f8 !important;
                    width: 100%;
                    height: 100%;
                    border: 1px solid black;
                }

                @media (max-width: 1200px) {
                    .filterMENU ul li button {
                        border: 0 solid black;
                        font-weight: 400;
                    }

                    .filterMENU ul li button:focus {
                        font-weight: 600 !important;
                    }

                    .filterMENU {
                        margin-left: 0;
                    }

                    .btn-card-box {
                        width: 100%;
                        margin-left: -10px;
                        margin-right: 0;
                    }
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


                .responsiveCard {
                    height: 100vh;
                    width: 100%;
                }
                </style>

                <div class="tab-content " style="background: white !important   ; ">
                    <div class="tab-pane in active" id="all">
                        <div class="product-slider wow fadeInUpBig">
                            <style>
                            .productimagetab {
                                display: grid;
                                grid-template-columns: repeat(2, 1fr);
                                grid-auto-rows: auto;
                                width: 100%;
                            }
                            </style>
                            <div class="productimagetab">
                                <?php
                                $ret = mysqli_query($con, "select * from products where category='$cid ' ORDER BY RAND()");
                                while ($row = mysqli_fetch_array($ret)) {

                                ?>

                                <style>
                                @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');



                                .product {
                                    height: 100%;
                                    margin: 0;
                                    width: auto !important;
                                    padding: 0;
                                    border: 1px solid black !important;

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
                                </style>

                                <div class="products">
                                    <div class="product ">
                                        <div class="product-image" style=" background:#F2F3F8 !important; ">
                                            <div class=" image " data-wow-delay="0.1s"
                                                style="background:transparent !important;">
                                                <a
                                                    href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                    <img src=" admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                        data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
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
                                <?php } ?>
                            </div>
                        </div>
                    </div>




                    <div class="tab-pane" id="lowtohigh">
                        <div class="product-slider">
                            <style>

                            </style>
                            <div class="productimagetab"> <?php
                                                            $ret = mysqli_query($con, "select * from products where category='$cid ' ORDER BY productPrice ASC");
                                                            $cnt = 1;
                                                            $num = mysqli_num_rows($ret);
                                                            if ($num > 0) {
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
                                                                    <path d="M96.877,0v507.447l156.846-168.091L410.57,507.447V0H96.877z M390.877,457.476L253.724,310.49L116.57,457.476V19.692
			h274.308V457.476z" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div><!-- /.product-info -->

                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item --> <?php $cnt = $cnt + 1;
                                                                } ?>
                                <?php } else { ?>
                                <div class="noFound">
                                    <h4>No Result Found</h4>
                                </div>

                                <?php } ?>


                            </div><!-- /.home-owl-carousel -->
                        </div><!-- /.product-slider -->
                    </div>
                    <div class="tab-pane" id="hightolow">
                        <div class="product-slider">
                            <style>

                            </style>
                            <div class="productimagetab"> <?php
                                                            $ret = mysqli_query($con, "select * from products where category='$cid '  ORDER BY productPrice DESC");
                                                            $cnt = 1;
                                                            $num = mysqli_num_rows($ret);
                                                            if ($num > 0) {

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
                                                                    <path d="M96.877,0v507.447l156.846-168.091L410.57,507.447V0H96.877z M390.877,457.476L253.724,310.49L116.57,457.476V19.692
			h274.308V457.476z" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div><!-- /.product-info -->

                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item --> <?php $cnt = $cnt + 1;
                                                                } ?>
                                <?php } else { ?>
                                <div class="noFound">
                                    <h4>No Result Found</h4>
                                </div>
                                <?php } ?>


                            </div><!-- /.home-owl-carousel -->
                        </div><!-- /.product-slider -->
                    </div>
                    <div class="tab-pane" id="AtoZ">
                        <div class="product-slider">
                            <style>

                            </style>
                            <div class="productimagetab"> <?php
                                                            $ret = mysqli_query($con, "select * from products where category='$cid '  ORDER BY productName ASC");
                                                            $cnt = 1;
                                                            $num = mysqli_num_rows($ret);
                                                            if ($num > 0) {

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
                                                                    <path d="M96.877,0v507.447l156.846-168.091L410.57,507.447V0H96.877z M390.877,457.476L253.724,310.49L116.57,457.476V19.692
			h274.308V457.476z" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div><!-- /.product-info -->

                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item --> <?php $cnt = $cnt + 1;
                                                                } ?>
                                <?php } else { ?>
                                <div class="noFound">
                                    <h4>No Result Found</h4>
                                </div>
                                <?php } ?>


                            </div><!-- /.home-owl-carousel -->
                        </div><!-- /.product-slider -->
                    </div>
                    <div class="tab-pane" id="ZtoA">
                        <div class="product-slider">
                            <style>

                            </style>
                            <div class="productimagetab"> <?php
                                                            $ret = mysqli_query($con, "select * from products where category='$cid '  ORDER BY productName DESC");
                                                            $cnt = 1;
                                                            $num = mysqli_num_rows($ret);
                                                            if ($num > 0) {

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
                                                                    <path d="M96.877,0v507.447l156.846-168.091L410.57,507.447V0H96.877z M390.877,457.476L253.724,310.49L116.57,457.476V19.692
			h274.308V457.476z" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div><!-- /.product-info -->

                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item --> <?php $cnt = $cnt + 1;
                                                                } ?>
                                <?php } else { ?>
                                <div class="noFound">
                                    <h4>No Result Found</h4>
                                </div>
                                <?php } ?>


                            </div><!-- /.home-owl-carousel -->
                        </div><!-- /.product-slider -->
                    </div>
                    <div class="tab-pane" id="ZtoA">
                        <div class="product-slider">
                            <style>

                            </style>
                            <div class="productimagetab"> <?php
                                                            $ret = mysqli_query($con, "select * from products where category='$cid '  ORDER BY productName DESC");
                                                            $cnt = 1;
                                                            $num = mysqli_num_rows($ret);
                                                            if ($num > 0) {

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
                                                                    <path d="M96.877,0v507.447l156.846-168.091L410.57,507.447V0H96.877z M390.877,457.476L253.724,310.49L116.57,457.476V19.692
			h274.308V457.476z" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div><!-- /.product-info -->

                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item --> <?php $cnt = $cnt + 1;
                                                                } ?>
                                <?php } else { ?>
                                <div class="noFound">
                                    <h4>No Result Found</h4>
                                </div>
                                <?php } ?>


                            </div><!-- /.home-owl-carousel -->
                        </div><!-- /.product-slider -->
                    </div>

                    <div class="tab-pane" id="blackandwhiteandGray">
                        <div class="product-slider">
                            <style>

                            </style>
                            <div class="productimagetab"> <?php
                                                            $ret = mysqli_query($con, "SELECT * FROM products WHERE category = '$cid ' AND productColor IN ('Black', 'Black & White', 'Black & Gray', 'White & Teal') ");
                                                            $cnt = 1;
                                                            $num = mysqli_num_rows($ret);
                                                            if ($num > 0) {

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
                                                                    <path d="M96.877,0v507.447l156.846-168.091L410.57,507.447V0H96.877z M390.877,457.476L253.724,310.49L116.57,457.476V19.692
			h274.308V457.476z" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div><!-- /.product-info -->

                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item --> <?php $cnt = $cnt + 1;
                                                                } ?>
                                <?php } else { ?>
                                <div class="noFound">
                                    <h4>No Result Found</h4>
                                </div>
                                <?php } ?>



                            </div><!-- /.home-owl-carousel -->
                        </div><!-- /.product-slider -->
                    </div>
                    <div class="tab-pane" id="Blue">
                        <div class="product-slider">
                            <style>

                            </style>
                            <div class="productimagetab"> <?php
                                                            $ret = mysqli_query($con, "SELECT * FROM products WHERE category = '$cid ' AND productColor IN ('Blue', 'Skyblue')");
                                                            $cnt = 1;
                                                            $num = mysqli_num_rows($ret);
                                                            if ($num > 0) {

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
                                                                    <path d="M96.877,0v507.447l156.846-168.091L410.57,507.447V0H96.877z M390.877,457.476L253.724,310.49L116.57,457.476V19.692
			h274.308V457.476z" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div><!-- /.product-info -->

                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item --> <?php $cnt = $cnt + 1;
                                                                } ?>
                                <?php } else { ?>
                                <div class="noFound">
                                    <h4>No Result Found</h4>
                                </div>
                                <?php } ?>


                            </div><!-- /.home-owl-carousel -->
                        </div><!-- /.product-slider -->
                    </div>
                    <div class="tab-pane" id="Pink">
                        <div class="product-slider">
                            <style>

                            </style>
                            <div class="productimagetab"> <?php
                                                            $ret = mysqli_query($con, "SELECT * FROM products WHERE category = '$cid ' AND productColor IN ('Pink','Bright Pink')");
                                                            $cnt = 1;
                                                            $num = mysqli_num_rows($ret);
                                                            if ($num > 0) {

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
                                                                    <path d="M96.877,0v507.447l156.846-168.091L410.57,507.447V0H96.877z M390.877,457.476L253.724,310.49L116.57,457.476V19.692
			h274.308V457.476z" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div><!-- /.product-info -->

                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item --> <?php $cnt = $cnt + 1;
                                                                } ?>
                                <?php } else { ?>
                                <div class="noFound">
                                    <h4>No Result Found</h4>
                                </div>
                                <?php } ?>


                            </div><!-- /.home-owl-carousel -->
                        </div><!-- /.product-slider -->
                    </div>
                    <div class="tab-pane" id="Red">
                        <div class="product-slider">
                            <style>

                            </style>
                            <div class="productimagetab"> <?php
                                                            $ret = mysqli_query($con, "SELECT * FROM products WHERE category = '$cid ' AND productColor IN ('Red','Dusty Rose','Copper Red')");
                                                            $cnt = 1;
                                                            $num = mysqli_num_rows($ret);
                                                            if ($num > 0) {

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
                                                                    <path d="M96.877,0v507.447l156.846-168.091L410.57,507.447V0H96.877z M390.877,457.476L253.724,310.49L116.57,457.476V19.692
			h274.308V457.476z" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div><!-- /.product-info -->

                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item --> <?php $cnt = $cnt + 1;
                                                                } ?>
                                <?php } else { ?>
                                <div class="noFound">
                                    <h4>No Result Found</h4>
                                </div>
                                <?php } ?>


                            </div><!-- /.home-owl-carousel -->
                        </div><!-- /.product-slider -->
                    </div>
                    <div class="tab-pane" id="Green">
                        <div class="product-slider">
                            <style>

                            </style>
                            <div class="productimagetab"> <?php
                                                            $ret = mysqli_query($con, "SELECT * FROM products WHERE category = '$cid ' AND productColor = 'Green'");
                                                            $cnt = 1;
                                                            $num = mysqli_num_rows($ret);
                                                            if ($num > 0) {

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
                                                                    <path d="M96.877,0v507.447l156.846-168.091L410.57,507.447V0H96.877z M390.877,457.476L253.724,310.49L116.57,457.476V19.692
			h274.308V457.476z" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div><!-- /.product-info -->

                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item --> <?php $cnt = $cnt + 1;
                                                                } ?>
                                <?php } else { ?>
                                <div class="noFound">
                                    <h4>No Result Found</h4>
                                </div>
                                <?php } ?>


                            </div><!-- /.home-owl-carousel -->
                        </div><!-- /.product-slider -->
                    </div>
                    <div class="tab-pane" id="Silver">
                        <div class="product-slider">
                            <style>

                            </style>
                            <div class="productimagetab"> <?php
                                                            $ret = mysqli_query($con, "SELECT * FROM products WHERE category = '$cid ' AND productColor IN ('Silver','Silver Shadow')");
                                                            $cnt = 1;
                                                            $num = mysqli_num_rows($ret);
                                                            if ($num > 0) {

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
                                                                    <path d="M96.877,0v507.447l156.846-168.091L410.57,507.447V0H96.877z M390.877,457.476L253.724,310.49L116.57,457.476V19.692
			h274.308V457.476z" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div><!-- /.product-info -->

                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->
                                <?php $cnt = $cnt + 1;
                                                                } ?>
                                <?php } else { ?>
                                <div class="noFound">
                                    <h4>No Result Found</h4>
                                </div>
                                <?php } ?>


                            </div><!-- /.home-owl-carousel -->
                        </div><!-- /.product-slider -->
                    </div>
                    <div class="tab-pane" id="Yellow">
                        <div class="product-slider">
                            <style>

                            </style>
                            <div class="productimagetab">
                                <?php
                                $ret = mysqli_query($con, "SELECT * FROM products WHERE category = '$cid ' AND productColor IN ('Yellow','Sunshine Yellow')");
                                $cnt = 1;
                                $num = mysqli_num_rows($ret);
                                if ($num > 0) {
                                    while ($row = mysqli_fetch_array($ret)) {
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
                                                                    <path d="M96.877,0v507.447l156.846-168.091L410.57,507.447V0H96.877z M390.877,457.476L253.724,310.49L116.57,457.476V19.692
			h274.308V457.476z" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div><!-- /.product-info -->

                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->

                                <?php $cnt = $cnt + 1;
                                    } ?>
                                <?php } else { ?>
                                <div class="noFound">
                                    <h4>No Result Found</h4>
                                </div>
                                <?php } ?>



                            </div><!-- /.home-owl-carousel -->
                        </div><!-- /.product-slider -->
                    </div>
                    <div class="tab-pane" id="price3000to4000">
                        <div class="product-slider">
                            <style>

                            </style>
                            <div class="productimagetab">
                                <?php
                                $ret = mysqli_query($con, "SELECT * FROM products WHERE category = '$cid' AND productPrice BETWEEN 2000 AND 5000");
                                $cnt = 1;
                                $num = mysqli_num_rows($ret);
                                if ($num > 0) {
                                    while ($row = mysqli_fetch_array($ret)) {

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
                                                                    <path d="M96.877,0v507.447l156.846-168.091L410.57,507.447V0H96.877z M390.877,457.476L253.724,310.49L116.57,457.476V19.692
			h274.308V457.476z" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div><!-- /.product-info -->

                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->

                                <?php $cnt = $cnt + 1;
                                    } ?>
                                <?php } else { ?>
                                <div class="noFound">
                                    <h4>No Result Found</h4>
                                </div>
                                <?php } ?>


                            </div><!-- /.home-owl-carousel -->
                        </div><!-- /.product-slider -->
                    </div>
                    <div class="tab-pane" id="price5000to10000">
                        <div class="product-slider">
                            <style>

                            </style>
                            <div class="productimagetab"> <?php
                                                            $ret = mysqli_query($con, "SELECT * FROM products WHERE category = '$cid' AND productPrice BETWEEN 5000 AND 10000");
                                                            $cnt = 1;
                                                            $num = mysqli_num_rows($ret);
                                                            if ($num > 0) {

                                                                while ($row = mysqli_fetch_array($ret)) {
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
                                                                    <path d="M96.877,0v507.447l156.846-168.091L410.57,507.447V0H96.877z M390.877,457.476L253.724,310.49L116.57,457.476V19.692
			h274.308V457.476z" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div><!-- /.product-info -->

                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->

                                <?php $cnt = $cnt + 1;
                                                                } ?>
                                <?php } else { ?>
                                <div class="noFound">
                                    <h4>No Result Found</h4>
                                </div>
                                <?php } ?>


                            </div><!-- /.home-owl-carousel -->
                        </div><!-- /.product-slider -->
                    </div>
                    <div class="tab-pane" id="price10000to20000">
                        <div class="product-slider">
                            <style>

                            </style>
                            <div class="productimagetab"> <?php
                                                            $ret = mysqli_query($con, "SELECT * FROM products WHERE category = '$cid' AND productPrice BETWEEN 10000 AND 20000");
                                                            $cnt = 1;
                                                            $num = mysqli_num_rows($ret);
                                                            if ($num > 0) {

                                                                while ($row = mysqli_fetch_array($ret)) {

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
                                                                    <path d="M96.877,0v507.447l156.846-168.091L410.57,507.447V0H96.877z M390.877,457.476L253.724,310.49L116.57,457.476V19.692
			h274.308V457.476z" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div><!-- /.product-info -->

                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->

                                <?php $cnt = $cnt + 1;
                                                                } ?>
                                <?php } else { ?>
                                <div class="noFound">
                                    <h4>No Result Found</h4>
                                </div>
                                <?php } ?>


                            </div><!-- /.home-owl-carousel -->
                        </div><!-- /.product-slider -->
                    </div>
                    <div class="tab-pane" id="priceover10000">
                        <div class="product-slider">
                            <style>

                            </style>
                            <div class="productimagetab"> <?php
                                                            $ret = mysqli_query($con, "SELECT * FROM products WHERE category = '$cid' AND productPrice > 20000");
                                                            $cnt = 1;
                                                            $num = mysqli_num_rows($ret);
                                                            if ($num > 0) {

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
                                                                    <path d="M96.877,0v507.447l156.846-168.091L410.57,507.447V0H96.877z M390.877,457.476L253.724,310.49L116.57,457.476V19.692
			h274.308V457.476z" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div><!-- /.product-info -->

                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->

                                <?php $cnt = $cnt + 1;
                                                                } ?>
                                <?php } else { ?>
                                <div class="noFound">
                                    <h4>No Result Found</h4>
                                </div>
                                <?php } ?>


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