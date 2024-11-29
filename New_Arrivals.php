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

    <title>QUINTET | New Arrivals </title>

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
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">
    <!-- Favicon -->
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

        <?php include('includes/search.php'); ?>
    </header>
    <!-- ============================================== HEADER : END ============================================== -->
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <style>
        .body-content {
            margin-top: 30px;
        }

        .categoryMenu {
            margin-left: 27px;
        }


        @media only screen and (max-width: 800px) {

            .body-content {
                margin-top: 30px !important;
            }

            .categoryMenu {
                margin-left: 0;
            }


        }
        </style>
        <div>
            <div class="furniture-container homepage-container">
                <div class="row outer-bottom-sm">

                    <!-- ============================================== SCROLL TABS ============================================== -->
                    <div id="product-tabs-slider" class="scroll-tabs   wow  " style="
                border: 0 !important ;
                   
                ">

                        <div class="more-info-tab clearfix"
                            style="margin-top: 40px;border : 0 !important ;display: block !important ; ">

                            <style>
                            .more-info-tab {
                                /* position: sticky !important; */
                                top: 0 !important;
                                align-items: center !important;
                                width: 100% !important;
                                justify-content: start !important;
                                width: 100% !important;
                                /* position: sticky !important; */
                                top: 0 !important;
                                z-index: 999 !important;
                                background: white !important;
                            }

                            @media only screen and (max-width:800px) {
                                .more-info-tab {
                                    z-index: 99 !important;
                                }

                                .filtermenubar {
                                    background: #ffffff;
                                    position: fixed;
                                    bottom: 0;
                                    left: 0;
                                    width: 100%;
                                }
                            }

                            .nav-tabs {
                                margin-left: 20px;
                                display: flex;
                                align-items: center;
                                width: 100%;
                                justify-content: start;
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


                            .nav-tabs li a:hover {
                                background-color: transparent !important;
                            }

                            .nav-tabs li a:focus {
                                font-weight: 500 !important;
                                background-color: #000 !important;
                                color: #fff !important;
                            }

                            .nav-tabs li a {
                                padding: 5px 10px !important;
                                border-radius: 0 !important;
                                margin: 10px !important;
                                font-size: 12px !important;
                                text-transform: uppercase !important;
                                font-size: 12px;
                                font-family: 'Poppins', sans-serif !important;
                                font-weight: 400 !important;
                                color: #000 !important;
                                border-color: #000 !important;
                                transition: 0.2s all linear;

                            }
                            </style>
                            <ul class=" nav nav-tabs  "
                                style="width: 100% !important ;overflow-x : scroll !important  ;  text-align: center;border:0 !important; ">
                                <li class="active  "><a href="#all" data-toggle="tab">view ALL</a>
                                </li>
                                <li><a href="#WOMAN" data-toggle="tab">WOMAN</a>
                                </li>
                                <li><a href="#MAN" data-toggle="tab">MAN</a>
                                </li>
                                <li><a href="#KIDS" data-toggle="tab">KIDS
                                    </a></li>
                            </ul><!-- /.n av-tabs -->
                            <style>
                            .filterMENU {
                                margin-top: -20px;
                                position: relative !important;
                                z-index: 99 !important;
                                margin-left: 20px;
                            }

                            .filterMENU ul li button {
                                background: transparent;
                                padding: 5px 10px !important;
                                border-radius: 0 !important;
                                margin: 10px !important;
                                text-transform: uppercase !important;
                                font-size: 12px !important;
                                font-family: 'Poppins', sans-serif !important;
                                font-weight: 400 !important;
                                color: #000 !important;
                                border-color: #000 !important;
                                border: 1px solid black;
                                transition: 0.2s all linear;
                            }

                            .filterMENU ul li button:focus {
                                font-weight: 500 !important;
                                background-color: #000 !important;
                                color: #fff !important;
                            }

                            .filterMENU ul li {
                                display: flex;
                                align-items: center;
                                justify-content: start;
                                overflow-y: auto;
                            }



                            .filterMENU ul li::-webkit-scrollbar-track {
                                -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3) !important;
                                background-color: #fff !important;
                            }

                            .filterMENU ul li:hover.filterMENU ul li::-webkit-scrollbar {
                                display: block !important;
                            }

                            .filterMENU ul li::-webkit-scrollbar {
                                /* display: none !important; */
                                width: 10px !important;
                                height: 2px !important;
                            }

                            .filterMENU ul li::-webkit-scrollbar-thumb {
                                border: 10px solid #000 !important;
                            }


                            #myfiltercard1 {
                                position: absolute;
                                left: 0%;
                                width: 500px;
                                background: white;
                                border: 1px solid black;
                                display: none;
                                z-index: 9999999 !important;
                            }


                            #myfiltercard2 {
                                position: absolute;
                                left: 0%;
                                width: 500px;
                                background: white;
                                display: none;
                                z-index: 9999999 !important;
                            }

                            #myfiltercard3 {
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
                                width: 500px;

                                background: white;
                                border: 1px solid black;
                                display: none;
                                z-index: 9999999 !important;
                            }

                            #myfiltercard5 {
                                position: absolute;
                                left: 0%;
                                width: 500px;

                                background: white;
                                border: 1px solid black;
                                display: none;
                                z-index: 9999999 !important;
                            }

                            #myfiltercard6 {
                                position: absolute;
                                left: 0%;
                                width: 500px;

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
                                font-family: 'Poppins', sans-serif !important;
                            }

                            .filtermenubar h4 {
                                font-size: 14px;
                                color: #000 !important;
                                font-weight: 500;
                                text-transform: uppercase;
                                font-family: 'Poppins', sans-serif !important;
                                text-transform: uppercase !important;
                                border-bottom: 1px solid black;
                                padding-bottom: 10px;
                                margin-left: 10px;
                            }

                            .colors ul {

                                display: flex;
                                align-items: center;
                                justify-content: start;
                                flex-wrap: wrap;
                            }





                            .colors ul li {
                                width: 100px;
                                display: flex;
                                align-items: center;
                                height: 80px;
                                justify-content: center;
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
                        </div>
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
                                    <button data-toggle-form="myfiltercard4">
                                        Collection
                                    </button>
                                    <button data-toggle-form="myfiltercard6">
                                        Gender
                                    </button>
                                </li>
                            </ul>
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
                                        <li style="border-bottom: 1px solid black !important;"><a class="menulink"
                                                href="#ZtoA" data-toggle="tab">Z to A</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="myfiltercard2">
                                <div class="filtermenubar colors" style=" padding: 0 !important;margin: 0 !important;">
                                    <ul style="padding: 0 !important;margin: 0 !important;">
                                        <li
                                            style="padding: 0 !important;margin: 0 !important;border-right: 0 !important;">
                                            <a href="#all" data-toggle="tab">

                                                <div class=""
                                                    style="display: flex;align-items: center;justify-content: center;">
                                                    <div class="box"
                                                        style="background: linear-gradient(to right, red, orange, yellow, green, blue, indigo, violet);">
                                                    </div>
                                                </div>
                                                <span>All</span>
                                            </a>
                                        </li>
                                        <?php $sql = mysqli_query($con, "SELECT MIN(id) as id, productColor FROM products WHERE productColor NOT LIKE '%BLACK%' AND productColor NOT LIKE '%WHITE%' AND productColor NOT LIKE '%lightpink%' AND productColor NOT LIKE '%Skyblue%' AND productColor NOT LIKE '%Rose%' AND productColor NOT LIKE '%productcolor%' AND productColor NOT LIKE '%Navyblue%' AND productColor NOT LIKE '%BLACKISH%' GROUP BY productColor;");
                                        while ($row = mysqli_fetch_array($sql)) {
                                        ?>
                                        <li
                                            style="padding: 0 !important;margin: 0 !important;border-right: 0 !important;">
                                            <a href="#<?php echo $row['productColor']; ?>" data-toggle="tab">
                                                <div class=""
                                                    style="display: flex;align-items: center;justify-content: center;">
                                                    <div class="box"
                                                        style="background: <?php echo $row['productColor']; ?>;">
                                                    </div>
                                                </div>
                                                <span><?php echo $row['productColor']; ?></span>
                                            </a>
                                        </li>
                                        <?php } ?>


                                    </ul>
                                </div>
                            </div>
                            <div id="myfiltercard3" style="border: 0 !important;">
                                <div class="filtermenubar sortbybox"
                                    style="padding: 0;border:0 !important; margin:0 !important;">

                                    <ul>

                                        <li><a class="menulink" href="#price3000to4000" data-toggle="tab">Price
                                                (2000 to
                                                5000)</a>
                                        </li>
                                        <li><a class="menulink" href="#price5000to10000" data-toggle="tab">Price
                                                (5000
                                                to 10000)</a>
                                        </li>
                                        <li><a class="menulink" href="#price10000to20000" data-toggle="tab">Price
                                                (10000
                                                to
                                                20000)</a>
                                        </li>
                                        <li style="border-bottom: 1px solid black !important;"><a class=" menulink"
                                                href="#priceover10000" data-toggle="tab">Price
                                                (over
                                                10000)</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="myfiltercard4"
                                style=" border:0 !important;border-bottom: 1px solid black !important;">
                                <div class="filtermenubar sortbybox"
                                    style="padding: 0;border:0 !important; margin:0 !important;">
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
                            </div>

                            <div id="myfiltercard6"
                                style=" border:0 !important;border-bottom: 1px solid black !important;">

                                <div class="filtermenubar sortbybox"
                                    style="padding: 0;border:0 !important; margin:0 !important;">

                                    <ul>
                                        <li><a class=" menulink" href="#MAN" data-toggle="tab">MAN</a>
                                        </li>
                                        <li style="border-bottom: 1px solid black !important;"><a class=" menulink"
                                                href="#WOMAN" data-toggle="tab">WOMAN</a>
                                        </li>
                                    </ul>
                                </div>
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
                        <style>
                        .btn-card {
                            width: 98%;
                            display: flex;
                            align-items: center;
                            justify-content: end;
                            position: sticky;
                            top: 15%;
                            z-index: 999;
                        }

                        .sortbybox ul li {
                            width: 100%;
                            border: 1px solid black;
                            text-align: left;
                            padding: 10px;
                            margin: 0 !important;
                            border-bottom: 0 !important;
                        }
                        </style>


                        <style>
                        .productimagetab {
                            display: grid;
                            grid-template-columns: repeat(6, 1fr);
                            grid-auto-rows: auto;
                            width: 100%;
                        }
                        </style>
                        <div class="tab-content outer-top-xs" style="background: white !important   ; ">
                            <div class="tab-pane in active" id="all">
                                <div class="product-slider">
                                    <div class="" style="margin-left: 20px;">
                                        <h1
                                            style="font-size: 18px; color: #000; font-weight: 300;font-family: 'Cabinet Grotesk', sans-serif;">
                                            VIEW ALL
                                        </h1>
                                    </div>
                                    <style>
                                    .productimagetab {
                                        display: grid;
                                        grid-template-columns: repeat(6, 1fr);
                                        grid-auto-rows: auto;
                                        width: 100%;
                                    }
                                    </style>
                                    <div class="productimagetab " data-wow-delay="0.1s">
                                        <?php
                                        $ret = mysqli_query($con, "select * from products order by rand()  ");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...


                                        ?>

                                        <style>
                                        @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');

                                        .product {
                                            margin: 0;
                                            padding: 0;
                                            height: 100%;
                                            width: auto !important;
                                            border: 1px solid black !important;
                                        }


                                        .name a {
                                            font-size: 0.999999999rem !important;
                                        }

                                        .product-info {
                                            border-top: 1px solid black;

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

                                        .product {
                                            overflow: hidden !important;
                                            text-overflow: ellipsis !important;
                                            white-space: nowrap !important;
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
                                            position: absolute;
                                            right: 10px;
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

                                        .name a:hover {
                                            text-decoration: underline !important;
                                        }
                                        </style>


                                        <div class="product ">
                                            <div class="product-image " style="background:#F2F3F8 !important; ">
                                                <div class="image " style="background:transparent !important;">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <img src="img/firstani1 (1).gif"
                                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            width=" 100%" height="100%" alt=""></a>
                                                </div><!-- /.image -->
                                                <div class="moreBtnview">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <svg fill="#000000" width="10px" version="1.1" id="Layer_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 455 455" xml:space="preserve">
                                                            <g id="SVGRepo_iconCarrier">
                                                                <polygon
                                                                    points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 455,242.5 ">
                                                                </polygon>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div><!-- /.product-image -->
                                            <div class="product-info text-left productName"
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
                                                                        d="M96.877,0v507.447l156.846-168.091L410.57,507.447V0H96.877z M390.877,457.476L253.724,310.49L116.57,457.476V19.692	h274.308V457.476z" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div><!-- /.product-info -->


                                        </div><!-- /.product -->

                                        <?php } ?>

                                    </div><!-- /.home-owl-carousel -->
                                </div><!-- /.product-slider -->
                            </div>




                            <div class="tab-pane " id="WOMAN">
                                <div class="product-slider">
                                    <div class="" style="margin-left: 20px;">
                                        <h1
                                            style="font-size: 18px; color: #000; font-weight: 300;font-family: 'Cabinet Grotesk', sans-serif;">
                                            WOMAN
                                        </h1>
                                    </div>
                                    <style>

                                    </style>
                                    <div class="productimagetab " data-wow-delay="0.1s">
                                        <?php
                                        $ret = mysqli_query($con, "select * from products where category=8 ORDER BY RAND() ");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...


                                        ?>



                                        <div class="product ">
                                            <div class="product-image" style="background:#F2F3F8 !important;">
                                                <div class="image" style="background:transparent !important; ">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <img src="img/firstani1 (1).gif"
                                                            src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            width="100%" height="100%" alt=""></a>
                                                </div><!-- /.image -->
                                                <div class="moreBtnview">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <svg fill="#000000" width="10px" version="1.1" id="Layer_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 455 455" xml:space="preserve">
                                                            <g id="SVGRepo_iconCarrier">
                                                                <polygon
                                                                    points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 455,242.5 ">
                                                                </polygon>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>

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

                                        </div><!-- /.item -->
                                        <?php } ?>


                                    </div><!-- /.home-owl-carousel -->
                                </div><!-- /.product-slider -->
                            </div>
                            <div class="tab-pane " id="MAN">
                                <div class="product-slider">
                                    <div class="" style="margin-left: 20px;">
                                        <h1
                                            style="font-size: 18px; color: #000; font-weight: 300;font-family: 'Cabinet Grotesk', sans-serif;">
                                            MAN
                                        </h1>
                                    </div>
                                    <style>

                                    </style>
                                    <div class="productimagetab " data-wow-delay="0.1s">
                                        <?php
                                        $ret = mysqli_query($con, "select * from products where category=10 ORDER BY RAND() ");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...


                                        ?>



                                        <div class="product ">
                                            <div class="product-image" style="background:#F2F3F8 !important;">
                                                <div class="image" style="background:transparent !important; ">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <img src="img/firstani1 (1).gif"
                                                            src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            width="100%" height="100%" alt=""></a>
                                                </div><!-- /.image -->
                                                <div class="moreBtnview">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <svg fill="#000000" width="10px" version="1.1" id="Layer_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 455 455" xml:space="preserve">
                                                            <g id="SVGRepo_iconCarrier">
                                                                <polygon
                                                                    points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 455,242.5 ">
                                                                </polygon>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>

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

                                        <?php } ?>


                                    </div><!-- /.home-owl-carousel -->
                                </div><!-- /.product-slider -->
                            </div>
                            <div class="tab-pane " id="KIDS">
                                <div class="product-slider">
                                    <div class="" style="margin-left: 20px;">
                                        <h1
                                            style="font-size: 18px; color: #000; font-weight: 300;font-family: 'Cabinet Grotesk', sans-serif;">
                                            KIDS
                                        </h1>
                                    </div>
                                    <style>

                                    </style>
                                    <div class="productimagetab " data-wow-delay="0.1s">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products WHERE category=29 ORDER BY productPrice ASC");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>



                                        <div class="product ">
                                            <div class="product-image" style="background:#F2F3F8 !important;">
                                                <div class="image" style="background:transparent !important; ">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <img src="img/firstani1 (1).gif"
                                                            src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            width="100%" height="100%" alt=""></a>
                                                </div><!-- /.image -->
                                                <div class="moreBtnview">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <svg fill="#000000" width="10px" version="1.1" id="Layer_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 455 455" xml:space="preserve">
                                                            <g id="SVGRepo_iconCarrier">
                                                                <polygon
                                                                    points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 455,242.5 ">
                                                                </polygon>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>

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

                                        <?php } ?>


                                    </div><!-- /.home-owl-carousel -->
                                </div><!-- /.product-slider -->
                            </div>






                            <div class="tab-pane" id="Shoes">
                                <div class="product-slider">
                                    <style>

                                    </style>
                                    <div class="productimagetab " data-wow-delay="0.1s">
                                        <?php
                                        $ret = mysqli_query($con, "select * from products where category=15");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...


                                        ?>



                                        <div class="product ">
                                            <div class="product-image" style="background:#F2F3F8 !important;">
                                                <div class="image" style="background:transparent !important; ">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <img src="img/firstani1 (1).gif"
                                                            src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            width="100%" height="100%" alt=""></a>
                                                </div><!-- /.image -->
                                                <div class="moreBtnview">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <svg fill="#000000" width="10px" version="1.1" id="Layer_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 455 455" xml:space="preserve">
                                                            <g id="SVGRepo_iconCarrier">
                                                                <polygon
                                                                    points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 455,242.5 ">
                                                                </polygon>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>

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

                                        <?php } ?>


                                    </div><!-- /.home-owl-carousel -->
                                </div><!-- /.product-slider -->
                            </div>

                            <div class="tab-pane" id="lowtohigh">
                                <div class="product-slider">
                                    <style>

                                    </style>
                                    <div class="productimagetab " data-wow-delay="0.1s">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products  ORDER BY productPrice ASC");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>



                                        <div class="product ">
                                            <div class="product-image" style="background:#F2F3F8 !important;">
                                                <div class="image" style="background:transparent !important; ">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <img src="img/firstani1 (1).gif"
                                                            src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            width="100%" height="100%" alt=""></a>
                                                </div><!-- /.image -->
                                                <div class="moreBtnview">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <svg fill="#000000" width="10px" version="1.1" id="Layer_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 455 455" xml:space="preserve">
                                                            <g id="SVGRepo_iconCarrier">
                                                                <polygon
                                                                    points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 455,242.5 ">
                                                                </polygon>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>

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


                                        </div><!-- /.item -->
                                        <?php } ?>


                                    </div><!-- /.home-owl-carousel -->
                                </div><!-- /.product-slider -->
                            </div>
                            <div class="tab-pane" id="hightolow">
                                <div class="product-slider">
                                    <style>

                                    </style>
                                    <div class="productimagetab " data-wow-delay="0.1s">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products  ORDER BY productPrice DESC");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>



                                        <div class="product ">
                                            <div class="product-image" style="background:#F2F3F8 !important;">
                                                <div class="image" style="background:transparent !important; ">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <img src="img/firstani1 (1).gif"
                                                            src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            width="100%" height="100%" alt=""></a>
                                                </div><!-- /.image -->
                                                <div class="moreBtnview">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <svg fill="#000000" width="10px" version="1.1" id="Layer_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 455 455" xml:space="preserve">
                                                            <g id="SVGRepo_iconCarrier">
                                                                <polygon
                                                                    points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 455,242.5 ">
                                                                </polygon>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>

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

                                        <?php } ?>


                                    </div><!-- /.home-owl-carousel -->
                                </div><!-- /.product-slider -->
                            </div>
                            <div class="tab-pane" id="AtoZ">
                                <div class="product-slider">
                                    <style>

                                    </style>
                                    <div class="productimagetab " data-wow-delay="0.1s">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products  ORDER BY productName ASC");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>




                                        <div class="product ">
                                            <div class="product-image" style="background:#F2F3F8 !important;">
                                                <div class="image" style="background:transparent !important; ">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <img src="img/firstani1 (1).gif"
                                                            src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            width="100%" height="100%" alt=""></a>
                                                </div><!-- /.image -->
                                                <div class="moreBtnview">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <svg fill="#000000" width="10px" version="1.1" id="Layer_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 455 455" xml:space="preserve">
                                                            <g id="SVGRepo_iconCarrier">
                                                                <polygon
                                                                    points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 455,242.5 ">
                                                                </polygon>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>

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

                                        <?php } ?>


                                    </div><!-- /.home-owl-carousel -->
                                </div><!-- /.product-slider -->
                            </div>
                            <div class="tab-pane" id="ZtoA">
                                <div class="product-slider">
                                    <style>

                                    </style>
                                    <div class="productimagetab " data-wow-delay="0.1s">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products  ORDER BY productName DESC");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>



                                        <div class="product ">
                                            <div class="product-image" style="background:#F2F3F8 !important;">
                                                <div class="image" style="background:transparent !important; ">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <img src="img/firstani1 (1).gif"
                                                            src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            width="100%" height="100%" alt=""></a>
                                                </div><!-- /.image -->
                                                <div class="moreBtnview">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <svg fill="#000000" width="10px" version="1.1" id="Layer_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 455 455" xml:space="preserve">
                                                            <g id="SVGRepo_iconCarrier">
                                                                <polygon
                                                                    points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 455,242.5 ">
                                                                </polygon>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>

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
                                        <?php } ?>


                                    </div><!-- /.home-owl-carousel -->
                                </div><!-- /.product-slider -->
                            </div>
                            <div class="tab-pane" id="ZtoA">
                                <div class="product-slider">
                                    <style>

                                    </style>
                                    <div class="productimagetab " data-wow-delay="0.1s">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products  ORDER BY productName DESC");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>




                                        <div class="product ">
                                            <div class="product-image" style="background:#F2F3F8 !important;">
                                                <div class="image" style="background:transparent !important; ">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <img src="img/firstani1 (1).gif"
                                                            src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            width="100%" height="100%" alt=""></a>
                                                </div><!-- /.image -->
                                                <div class="moreBtnview">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <svg fill="#000000" width="10px" version="1.1" id="Layer_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 455 455" xml:space="preserve">
                                                            <g id="SVGRepo_iconCarrier">
                                                                <polygon
                                                                    points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 455,242.5 ">
                                                                </polygon>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>

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

                                        <?php } ?>


                                    </div><!-- /.home-owl-carousel -->
                                </div><!-- /.product-slider -->
                            </div>

                            <div class="tab-pane" id="blackandwhiteandGray">
                                <div class="product-slider">
                                    <style>

                                    </style>
                                    <div class="productimagetab " data-wow-delay="0.1s">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products WHERE productColor IN ('Black', 'Black & White', 'Black & Gray','White & Teal')");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>

                                        <div class="product ">
                                            <div class="product-image" style="background:#F2F3F8 !important;">
                                                <div class="image" style="background:transparent !important; ">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <img src="img/firstani1 (1).gif"
                                                            src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            width="100%" height="100%" alt=""></a>
                                                </div><!-- /.image -->
                                                <div class="moreBtnview">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <svg fill="#000000" width="10px" version="1.1" id="Layer_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 455 455" xml:space="preserve">
                                                            <g id="SVGRepo_iconCarrier">
                                                                <polygon
                                                                    points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 455,242.5 ">
                                                                </polygon>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>

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

                                        <?php } ?>


                                    </div><!-- /.home-owl-carousel -->
                                </div><!-- /.product-slider -->
                            </div>
                            <div class="tab-pane" id="Blue">
                                <div class="product-slider">
                                    <style>

                                    </style>
                                    <div class="productimagetab " data-wow-delay="0.1s">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products WHERE productColor IN ('Blue', 'Skyblue','Navyblue')");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>

                                        <div class="product ">
                                            <div class="product-image" style="background:#F2F3F8 !important;">
                                                <div class="image" style="background:transparent !important; ">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <img src="img/firstani1 (1).gif"
                                                            src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            width="100%" height="100%" alt=""></a>
                                                </div><!-- /.image -->
                                                <div class="moreBtnview">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <svg fill="#000000" width="10px" version="1.1" id="Layer_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 455 455" xml:space="preserve">
                                                            <g id="SVGRepo_iconCarrier">
                                                                <polygon
                                                                    points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 455,242.5 ">
                                                                </polygon>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>

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

                                        <?php } ?>


                                    </div><!-- /.home-owl-carousel -->
                                </div><!-- /.product-slider -->
                            </div>
                            <div class="tab-pane" id="Pink">
                                <div class="product-slider">
                                    <style>

                                    </style>
                                    <div class="productimagetab " data-wow-delay="0.1s">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products WHERE productColor IN ('Pink','Bright Pink','lightpink')");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>

                                        <div class="product ">
                                            <div class="product-image" style="background:#F2F3F8 !important;">
                                                <div class="image" style="background:transparent !important; ">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <img src="img/firstani1 (1).gif"
                                                            src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            width="100%" height="100%" alt=""></a>
                                                </div><!-- /.image -->
                                                <div class="moreBtnview">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <svg fill="#000000" width="10px" version="1.1" id="Layer_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 455 455" xml:space="preserve">
                                                            <g id="SVGRepo_iconCarrier">
                                                                <polygon
                                                                    points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 455,242.5 ">
                                                                </polygon>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>

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

                                        <?php } ?>


                                    </div><!-- /.home-owl-carousel -->
                                </div><!-- /.product-slider -->
                            </div>
                            <div class="tab-pane" id="Red">
                                <div class="product-slider">
                                    <style>

                                    </style>
                                    <div class="productimagetab " data-wow-delay="0.1s">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products WHERE productColor IN ('Red','Dusty Rose','Copper Red','Rose')");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>

                                        <div class="product ">
                                            <div class="product-image" style="background:#F2F3F8 !important;">
                                                <div class="image" style="background:transparent !important; ">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <img src="img/firstani1 (1).gif"
                                                            src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            width="100%" height="100%" alt=""></a>
                                                </div><!-- /.image -->
                                                <div class="moreBtnview">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <svg fill="#000000" width="10px" version="1.1" id="Layer_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 455 455" xml:space="preserve">
                                                            <g id="SVGRepo_iconCarrier">
                                                                <polygon
                                                                    points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 455,242.5 ">
                                                                </polygon>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>

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

                                        <?php } ?>


                                    </div><!-- /.home-owl-carousel -->
                                </div><!-- /.product-slider -->
                            </div>
                            <div class="tab-pane" id="Green">
                                <div class="product-slider">
                                    <style>

                                    </style>
                                    <div class="productimagetab " data-wow-delay="0.1s">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products WHERE productColor = 'Green'");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>

                                        <div class="product ">
                                            <div class="product-image" style="background:#F2F3F8 !important;">
                                                <div class="image" style="background:transparent !important; ">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <img src="img/firstani1 (1).gif"
                                                            src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            width="100%" height="100%" alt=""></a>
                                                </div><!-- /.image -->
                                                <div class="moreBtnview">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <svg fill="#000000" width="10px" version="1.1" id="Layer_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 455 455" xml:space="preserve">
                                                            <g id="SVGRepo_iconCarrier">
                                                                <polygon
                                                                    points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 455,242.5 ">
                                                                </polygon>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>

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

                                        <?php } ?>


                                    </div><!-- /.home-owl-carousel -->
                                </div><!-- /.product-slider -->
                            </div>
                            <div class="tab-pane" id="Silver">
                                <div class="product-slider">
                                    <style>

                                    </style>
                                    <div class="productimagetab " data-wow-delay="0.1s">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products WHERE productColor IN ('Silver','Silver Shadow')");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>

                                        <div class="product ">
                                            <div class="product-image" style="background:#F2F3F8 !important;">
                                                <div class="image" style="background:transparent !important; ">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <img src="img/firstani1 (1).gif"
                                                            src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            width="100%" height="100%" alt=""></a>
                                                </div><!-- /.image -->
                                                <div class="moreBtnview">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <svg fill="#000000" width="10px" version="1.1" id="Layer_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 455 455" xml:space="preserve">
                                                            <g id="SVGRepo_iconCarrier">
                                                                <polygon
                                                                    points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 455,242.5 ">
                                                                </polygon>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>

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

                                        <?php } ?>


                                    </div><!-- /.home-owl-carousel -->
                                </div><!-- /.product-slider -->
                            </div>
                            <div class="tab-pane" id="Yellow">
                                <div class="product-slider">
                                    <style>

                                    </style>
                                    <div class="productimagetab " data-wow-delay="0.1s">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products WHERE productColor IN ('Yellow','Sunshine Yellow')");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>

                                        <div class="product ">
                                            <div class="product-image" style="background:#F2F3F8 !important;">
                                                <div class="image" style="background:transparent !important; ">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <img src="img/firstani1 (1).gif"
                                                            src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            width="100%" height="100%" alt=""></a>
                                                </div><!-- /.image -->
                                                <div class="moreBtnview">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <svg fill="#000000" width="10px" version="1.1" id="Layer_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 455 455" xml:space="preserve">
                                                            <g id="SVGRepo_iconCarrier">
                                                                <polygon
                                                                    points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 455,242.5 ">
                                                                </polygon>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>

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

                                        <?php } ?>


                                    </div><!-- /.home-owl-carousel -->
                                </div><!-- /.product-slider -->
                            </div>
                            <div class="tab-pane" id="maroon">
                                <div class="product-slider">
                                    <style>

                                    </style>
                                    <div class="productimagetab " data-wow-delay="0.1s">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products WHERE productColor IN ('Maroon','maroon')");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>

                                        <div class="product ">
                                            <div class="product-image" style="background:#F2F3F8 !important;">
                                                <div class="image" style="background:transparent !important; ">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <img src="img/firstani1 (1).gif"
                                                            src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            width="100%" height="100%" alt=""></a>
                                                </div><!-- /.image -->
                                                <div class="moreBtnview">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <svg fill="#000000" width="10px" version="1.1" id="Layer_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 455 455" xml:space="preserve">
                                                            <g id="SVGRepo_iconCarrier">
                                                                <polygon
                                                                    points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 455,242.5 ">
                                                                </polygon>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>

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

                                        <?php } ?>


                                    </div><!-- /.home-owl-carousel -->
                                </div><!-- /.product-slider -->
                            </div>
                            <div class="tab-pane" id="Darkgreen">
                                <div class="product-slider">
                                    <style>

                                    </style>
                                    <div class="productimagetab " data-wow-delay="0.1s">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products WHERE productColor IN ('DARKGREEN','darkgreen')");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>

                                        <div class="product ">
                                            <div class="product-image" style="background:#F2F3F8 !important;">
                                                <div class="image" style="background:transparent !important; ">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <img src="img/firstani1 (1).gif"
                                                            src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            width="100%" height="100%" alt=""></a>
                                                </div><!-- /.image -->
                                                <div class="moreBtnview">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <svg fill="#000000" width="10px" version="1.1" id="Layer_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 455 455" xml:space="preserve">
                                                            <g id="SVGRepo_iconCarrier">
                                                                <polygon
                                                                    points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 455,242.5 ">
                                                                </polygon>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>

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
                                                                    <path
                                                                        d="M96.877,0v507.447l156.846-168.091L410.57,507.447V0H96.877z M390.877,457.476L253.724,310.49L116.57,457.476V19.692h274.308V457.476z" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div><!-- /.product-info -->


                                        </div><!-- /.product -->

                                        <?php } ?>


                                    </div><!-- /.home-owl-carousel -->
                                </div><!-- /.product-slider -->
                            </div>
                            <div class="tab-pane" id="Khaki">
                                <div class="product-slider">
                                    <style>

                                    </style>
                                    <div class="productimagetab " data-wow-delay="0.1s">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products WHERE productColor IN ('Khaki','KHAKI')");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>

                                        <div class="product ">
                                            <div class="product-image" style="background:#F2F3F8 !important;">
                                                <div class="image" style="background:transparent !important; ">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <img src="img/firstani1 (1).gif"
                                                            src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            width="100%" height="100%" alt=""></a>
                                                </div><!-- /.image -->
                                                <div class="moreBtnview">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <svg fill="#000000" width="10px" version="1.1" id="Layer_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 455 455" xml:space="preserve">
                                                            <g id="SVGRepo_iconCarrier">
                                                                <polygon
                                                                    points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 455,242.5 ">
                                                                </polygon>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>

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
                                                                    <path
                                                                        d="M96.877,0v507.447l156.846-168.091L410.57,507.447V0H96.877z M390.877,457.476L253.724,310.49L116.57,457.476V19.692h274.308V457.476z" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div><!-- /.product-info -->


                                        </div><!-- /.product -->

                                        <?php } ?>


                                    </div><!-- /.home-owl-carousel -->
                                </div><!-- /.product-slider -->
                            </div>
                            <div class="tab-pane" id="Brown">
                                <div class="product-slider">
                                    <style>

                                    </style>
                                    <div class="productimagetab " data-wow-delay="0.1s">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products WHERE productColor IN ('Brown','BROWN')");
                                        while ($row = mysqli_fetch_array($ret)) {
                                            # code...
                                        ?>

                                        <div class="product ">
                                            <div class="product-image" style="background:#F2F3F8 !important;">
                                                <div class="image" style="background:transparent !important; ">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <img src="img/firstani1 (1).gif"
                                                            src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                            width="100%" height="100%" alt=""></a>
                                                </div><!-- /.image -->
                                                <div class="moreBtnview">
                                                    <a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                        <svg fill="#000000" width="10px" version="1.1" id="Layer_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 455 455" xml:space="preserve">
                                                            <g id="SVGRepo_iconCarrier">
                                                                <polygon
                                                                    points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 455,242.5 ">
                                                                </polygon>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>

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
                                                                    <path
                                                                        d="M96.877,0v507.447l156.846-168.091L410.57,507.447V0H96.877z M390.877,457.476L253.724,310.49L116.57,457.476V19.692h274.308V457.476z" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div><!-- /.product-info -->


                                        </div><!-- /.product -->

                                        <?php } ?>


                                    </div><!-- /.home-owl-carousel -->
                                </div><!-- /.product-slider -->
                            </div>
                            <div class="tab-pane" id="price3000to4000">
                                <div class="product-slider">
                                    <style>

                                    </style>
                                    <div class="productimagetab" data-item="4">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM products WHERE  productPrice BETWEEN 2000 AND 5000");
                                        $cnt = 1;
                                        $num = mysqli_num_rows($ret);
                                        if ($num > 0) {
                                            while ($row = mysqli_fetch_array($ret)) {

                                        ?>

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
                                    <div class="productimagetab" data-item="4"> <?php
                                                                                $ret = mysqli_query($con, "SELECT * FROM products WHERE  productPrice BETWEEN 5000 AND 10000");
                                                                                $cnt = 1;
                                                                                $num = mysqli_num_rows($ret);
                                                                                if ($num > 0) {

                                                                                    while ($row = mysqli_fetch_array($ret)) {
                                                                                ?>


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
                                    <div class="productimagetab" data-item="4"> <?php
                                                                                $ret = mysqli_query($con, "SELECT * FROM products WHERE  productPrice BETWEEN 10000 AND 20000");
                                                                                $cnt = 1;
                                                                                $num = mysqli_num_rows($ret);
                                                                                if ($num > 0) {

                                                                                    while ($row = mysqli_fetch_array($ret)) {

                                                                                ?>


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
                                    <div class="productimagetab" data-item="4"> <?php
                                                                                $ret = mysqli_query($con, "SELECT * FROM products WHERE  productPrice > 20000");
                                                                                $cnt = 1;
                                                                                $num = mysqli_num_rows($ret);
                                                                                if ($num > 0) {

                                                                                    while ($row = mysqli_fetch_array($ret)) {
                                                                                        # code...
                                                                                ?>

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
    !

    $(window).bind("load", function() {
        $('.show-theme-options').delay(2000).trigger('click');
    });
    </script>

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
</body>

</html>