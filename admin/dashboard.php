<?php session_start();
include_once('include/config.php');
if (strlen($_SESSION["id"]) == 0) {
    header('location:logout.php');
} else {
    //Dashboard COunt
    $ret = mysqli_query($con, "select 
count(if(orderStatus='Packed', 0,null)) as packedorders,
count(if(orderStatus='Dispatched',  0,null)) as dispatchedorders,
count(if(orderStatus='In Transit',  0,null)) as intransitorders,
count(if(orderStatus='Out For Delivery', 0,null)) as outfdorders,
count(if(orderStatus='Delivered', 0,null)) as deliveredorders,
count(if(orderStatus='Cancelled', 0,null)) as cancelledorders 
from orders;");
    $results = mysqli_fetch_array($ret);
    $porders = $results['packedorders'];
    $dtorders = $results['dispatchedorders'];
    $intorders = $results['intransitorders'];
    $otforders = $results['outfdorders'];
    $deliveredorders = $results['deliveredorders'];
    $cancelledorders = $results['cancelledorders'];
    //COde for Registered users
    $ret1 = mysqli_query($con, "select count(id) as totalusers from users;");
    $results1 = mysqli_fetch_array($ret1);
    $tregusers = $results1['totalusers'];

    $ret2 = mysqli_query($con, "select count(id) as totalcategory from category");
    $results2 = mysqli_fetch_array($ret2);
    $tcategory = $results2['totalcategory'];

    $ret3 = mysqli_query($con, "select count(id) as totalsubcategory from subcategory");
    $results3 = mysqli_fetch_array($ret3);
    $tsubcategory = $results3['totalsubcategory'];

    $ret4 = mysqli_query($con, "select count(id) as totalproducts from products");
    $results4 = mysqli_fetch_array($ret4);
    $tproducts = $results4['totalproducts'];

    $ret5 = mysqli_query($con, "select count(id) as totalorder from orders");
    $results5 = mysqli_fetch_array($ret5);
    $torder = $results5['totalorder'];

    $ret6 = mysqli_query($con, "select count(id) as totalproductreviews from productreviews");
    $results6 = mysqli_fetch_array($ret6);
    $tproductreviews = $results6['totalproductreviews'];


    $ret7 = mysqli_query($con, "SELECT CASE  WHEN SUM(p.productPrice * o.quantity) >= 1000000 THEN CONCAT(ROUND(SUM(p.productPrice * o.quantity) / 1000000, 1), 'M') WHEN SUM(p.productPrice * o.quantity) >= 1000 THEN CONCAT(ROUND(SUM(p.productPrice * o.quantity) / 1000, 1), 'K')        ELSE SUM(p.productPrice * o.quantity) END AS formatted_profit FROM orders o JOIN products p ON o.productid = p.id;");
    $results7 = mysqli_fetch_array($ret7);
    $tEarn = $results7['formatted_profit'];

    $ret12 = mysqli_query($con, "SELECT CASE  WHEN SUM(p.productPrice * o.quantity) >= 1000000  THEN CONCAT(ROUND(SUM(p.productPrice * o.quantity) / 1000000, 1), 'M') WHEN SUM(p.productPrice * o.quantity) >= 1000  THEN CONCAT(ROUND(SUM(p.productPrice * o.quantity) / 1000, 1), 'K') ELSE SUM(p.productPrice * o.quantity) END AS formatted_total_sales FROM orders o JOIN products p ON o.productid = p.id");
    $results12 = mysqli_fetch_array($ret12);
    $tTotalSale = $results12['formatted_total_sales'];

    $ret8 = mysqli_query($con, "SELECT CASE WHEN SUM((p.productPrice * o.quantity) - p.shippingCharge - (p.productPrice * o.quantity * 0.18)) >= 1000000  THEN CONCAT(ROUND(SUM((p.productPrice * o.quantity) - p.shippingCharge - (p.productPrice * o.quantity * 0.18)) / 1000000, 1), 'M') WHEN SUM((p.productPrice * o.quantity) - p.shippingCharge - (p.productPrice * o.quantity * 0.18)) >= 1000  THEN CONCAT(ROUND(SUM((p.productPrice * o.quantity) - p.shippingCharge - (p.productPrice * o.quantity * 0.18)) / 1000, 1), 'K')  ELSE SUM((p.productPrice * o.quantity) - p.shippingCharge - (p.productPrice * o.quantity * 0.18)) END AS formatted_profitTWO FROM orders o JOIN products p ON o.productid = p.id; ");
    $results8 = mysqli_fetch_array($ret8);
    $tProfit = $results8['formatted_profitTWO'];

    $ret9 = mysqli_query($con, "SELECT CASE  WHEN SUM(GREATEST((p.shippingCharge + (p.productPrice * o.quantity * 0.18) + (p.productPrice * 0.7 * o.quantity)) - (p.productPrice * o.quantity), 0)) >= 1000000  THEN CONCAT(ROUND(SUM(GREATEST((p.shippingCharge + (p.productPrice * o.quantity * 0.18) + (p.productPrice * 0.7 * o.quantity)) - (p.productPrice * o.quantity), 0)) / 1000000, 1), 'M') WHEN SUM(GREATEST((p.shippingCharge + (p.productPrice * o.quantity * 0.18) + (p.productPrice * 0.7 * o.quantity)) - (p.productPrice * o.quantity), 0)) >= 1000  THEN CONCAT(ROUND(SUM(GREATEST((p.shippingCharge + (p.productPrice * o.quantity * 0.18) + (p.productPrice * 0.7 * o.quantity)) - (p.productPrice * o.quantity), 0)) / 1000, 1), 'K') ELSE SUM(GREATEST((p.shippingCharge + (p.productPrice * o.quantity * 0.18) + (p.productPrice * 0.7 * o.quantity)) - (p.productPrice * o.quantity), 0)) END AS formatted_loss FROM orders o JOIN products p ON o.productid = p.id");
    $results9 = mysqli_fetch_array($ret9);
    $tloss = $results9['formatted_loss'];

    $ret10 = mysqli_query($con, "SELECT 
    CASE 
        WHEN SUM(p.productPrice * 0.18 * o.quantity) >= 1000000 
        THEN CONCAT(ROUND(SUM(p.productPrice * 0.18 * o.quantity) / 1000000, 1), 'M')
        WHEN SUM(p.productPrice * 0.18 * o.quantity) >= 1000 
        THEN CONCAT(ROUND(SUM(p.productPrice * 0.18 * o.quantity) / 1000, 1), 'K')
        ELSE SUM(p.productPrice * 0.18 * o.quantity)
    END AS formatted_total_gst
FROM orders o
JOIN products p ON o.productid = p.id");
    $results10 = mysqli_fetch_array($ret10);
    $tGrossProfit = $results10['formatted_total_gst'];

    $ret11 = mysqli_query($con, "SELECT  CASE  WHEN SUM((p.productPrice * o.quantity) - (p.shippingCharge + (p.productPrice * o.quantity * 0.18) + (p.productPrice * 0.7 * o.quantity))) >= 1000000  THEN CONCAT(ROUND(SUM((p.productPrice * o.quantity) - (p.shippingCharge + (p.productPrice * o.quantity * 0.18) + (p.productPrice * 0.7 * o.quantity))) / 1000000, 1), 'M') WHEN SUM((p.productPrice * o.quantity) - (p.shippingCharge + (p.productPrice * o.quantity * 0.18) + (p.productPrice * 0.7 * o.quantity))) >= 1000  THEN CONCAT(ROUND(SUM((p.productPrice * o.quantity) - (p.shippingCharge + (p.productPrice * o.quantity * 0.18) + (p.productPrice * 0.7 * o.quantity))) / 1000, 1), 'K')  ELSE SUM((p.productPrice * o.quantity) - (p.shippingCharge + (p.productPrice * o.quantity * 0.18) + (p.productPrice * 0.7 * o.quantity))) END AS formatted_net_profit FROM orders o JOIN products p ON o.productid = p.id");
    $results11 = mysqli_fetch_array($ret11);
    $tNetProfit = $results11['formatted_net_profit'];

    $ret13 = mysqli_query($con, "SELECT 
    CASE 
        WHEN SUM(p.productPrice * 0.7 * o.quantity) >= 1000000 
        THEN CONCAT(ROUND(SUM(p.productPrice * 0.7 * o.quantity) / 1000000, 1), 'M')
        WHEN SUM(p.productPrice * 0.7 * o.quantity) >= 1000 
        THEN CONCAT(ROUND(SUM(p.productPrice * 0.7 * o.quantity) / 1000, 1), 'K')
        ELSE SUM(p.productPrice * 0.7 * o.quantity)
    END AS formatted_product_cost
FROM orders o
JOIN products p ON o.productid = p.id");
    $results13 = mysqli_fetch_array($ret13);
    $tProductCost = $results13['formatted_product_cost'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| Category</title>

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="assets2.0/css/core/libs.min.css" />

    <link rel="stylesheet" href="assets2.0/vendor/aos/dist/aos.css" />

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="assets2.0/css/hope-ui.min.css?v=2.0.0" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="assets2.0/css/custom.min.css?v=2.0.0" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="assets2.0/css/dark.min.css" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="assets2.0/css/customizer.min.css" />

    <link rel="stylesheet" href="lib/animate/animate.css" />
    <link rel="stylesheet" href="lib/animate/animate.min.css" />
    <link rel="stylesheet" href="lib/wow/wow.js" />
    <link rel="stylesheet" href="lib/wow/wow.min.js" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="assets2.0/css/rtl.min.css" />
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>
    <!-- fontshare -->
    <link
        href="https://api.fontshare.com/v2/css?f[]=panchang@300,500&f[]=cabinet-grotesk@300&f[]=roundo@500,600,700,1&display=swap"
        rel="stylesheet">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');
    @import url('https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css');
    @import url('https: //cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css');

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: 'Raleway ', sans-serif;
    }

    :root {
        --bs-blue: #3a57e8;
        --bs-indigo: #6610f2;
        --bs-purple: #6f42c1;
        --bs-pink: #d63384;
        --bs-red: #c03221;
        --bs-orange: #FAA938;
        --bs-yellow: #f16a1b;
        --bs-green: #1aa053;
        --bs-teal: #001F4D;
        --bs-cyan: #079aa2;
        --bs-white: #ffffff;
        --bs-gray: #6c757d;
        --bs-gray-dark: #343a40;
        --bs-gray-100: #f8f9fa;
        --bs-gray-200: #e9ecef;
        --bs-gray-300: #dee2e6;
        --bs-gray-400: #ced4da;
        --bs-gray-500: #adb5bd;
        --bs-gray-600: #6c757d;
        --bs-gray-700: #495057;
        --bs-gray-800: #343a40;
        --bs-gray-900: #212529;
        --bs-primary: #3a57e8;
        --bs-secondary: #001F4D;
        --bs-success: #1aa053;
        --bs-info: #079aa2;
        --bs-warning: #f16a1b;
        --bs-danger: #c03221;
        --bs-light: #dee2e6;
        --bs-dark: #212529;
        --bs-gray: #6c757d;
        --bs-gray-dark: #343a40;
        --bs-primary-rgb: 58, 87, 232;
        --bs-secondary-rgb: 0, 31, 77;
        --bs-success-rgb: 26, 160, 83;
        --bs-info-rgb: 7, 154, 162;
        --bs-warning-rgb: 241, 106, 27;
        --bs-danger-rgb: 192, 50, 33;
        --bs-light-rgb: 222, 226, 230;
        --bs-dark-rgb: 33, 37, 41;
        --bs-gray-rgb: 108, 117, 125;
        --bs-gray-dark-rgb: 52, 58, 64;
        --bs-white-rgb: 255, 255, 255;
        --bs-black-rgb: 0, 0, 0;
        --bs-body-color-rgb: 138, 146, 166;
        --bs-body-bg-rgb: 245, 246, 250;
        --bs-font-sans-serif: "Inter", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
        --bs-body-font-family: var(--bs-font-sans-serif);
        --bs-body-font-size: 1rem;
        --bs-body-font-weight: 400;
        --bs-body-line-height: 1.5;
        --bs-body-color: #8A92A6;
        --bs-body-bg: #F5F6FA;
        --bs-border-width: 1px;
        --bs-border-style: solid;
        --bs-border-color: #eee;
        --bs-border-color-translucent: rgba(0, 0, 0, 0.175);
        --bs-border-radius: 0.5rem;
        --bs-border-radius-sm: 0.25rem;
        --bs-border-radius-lg: 1rem;
        --bs-border-radius-xl: 1rem;
        --bs-border-radius-2xl: 2rem;
        --bs-border-radius-pill: 50rem;
        --bs-link-color: #3a57e8;
        --bs-link-hover-color: #2e46ba;
        --bs-code-color: #d63384;
        --bs-highlight-bg: #fcf8e3
    }

    .bx-right-top-arrow-circle {
        font-size: 20px;
        position: absolute;
        right: 9px;
        bottom: 0;
        color: #000;
        font-size: 20px;
    }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php include_once('include/sidebar.php'); ?>
    <main class="main-content">
        <div ss="position-relative iq-banner">

            <?php include_once('include/header.php'); ?>
            <div class="iq-navbar-header mt-5" style="margin-top:50px !important; height: 100px;">
                <div class="container-fluid iq-container rounded-5 "
                    style="background-position: center; background-size: 100% 100vh; background-image:url(images/dashboard/hero.jpg);height:200px;">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="flex-wrap d-flex justify-content-between align-items-center">
                                <div>
                                    <h1 class="text-uppercase text-black"
                                        style="font-weight:550; font-family: 'Roundo', sans-serif;">QUINTET E-commerce
                                        store</h1>
                                    <p class="text-uppercase text-black"
                                        style="font-weight:550; font-family: 'Roundo', sans-serif;">Where five pillars
                                        of excellence converge to
                                        create your
                                        ultimate shopping
                                        destination</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class=" px-4">
                    <style>
                    .card {
                        margin-right: 3% !important;
                        box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px !important;
                    }
                    </style>
                    <div class="col-md-12 col-lg-12 mt-5">
                        <div class="row ">
                            <div class="col-lg-3 col-md-6 mt-3 mb-4 wow animated fadeIn">
                                <div class="card bg-white">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="bg-info rounded p-3">
                                                <svg class="icon-20 text-white" width="20px" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M3 6.5C3 3.87479 3.02811 3 6.5 3C9.97189 3 10 3.87479 10 6.5C10 9.12521 10.0111 10 6.5 10C2.98893 10 3 9.12521 3 6.5Z"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M14 6.5C14 3.87479 14.0281 3 17.5 3C20.9719 3 21 3.87479 21 6.5C21 9.12521 21.0111 10 17.5 10C13.9889 10 14 9.12521 14 6.5Z"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M3 17.5C3 14.8748 3.02811 14 6.5 14C9.97189 14 10 14.8748 10 17.5C10 20.1252 10.0111 21 6.5 21C2.98893 21 3 20.1252 3 17.5Z"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M14 17.5C14 14.8748 14.0281 14 17.5 14C20.9719 14 21 14.8748 21 17.5C21 20.1252 21.0111 21 17.5 21C13.9889 21 14 20.1252 14 17.5Z"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </div>
                                            <div class="text-end text-uppercase">
                                                Total Category
                                                <h2 class="counter"><?php echo $tcategory; ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mt-3 mb-4 wow animated fadeIn">
                                <div class="card bg-white">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="bg-warning rounded p-3">

                                                <svg class="icon-20 text-white" width="20px" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M14.7379 2.76175H8.08493C6.00493 2.75375 4.29993 4.41175 4.25093 6.49075V17.2037C4.20493 19.3167 5.87993 21.0677 7.99293 21.1147C8.02393 21.1147 8.05393 21.1157 8.08493 21.1147H16.0739C18.1679 21.0297 19.8179 19.2997 19.8029 17.2037V8.03775L14.7379 2.76175Z"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M14.4751 2.75V5.659C14.4751 7.079 15.6231 8.23 17.0431 8.234H19.7981"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M14.2882 15.3584H8.88818" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                    </path>
                                                    <path d="M12.2432 11.606H8.88721" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="text-end text-uppercase">
                                                Total subcategory
                                                <h2 class="counter"><?php echo $tsubcategory; ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mt-3 mb-4 wow animated fadeIn">
                                <div class="card bg-white">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="bg-danger rounded p-3">

                                                <svg class="icon-20 text-white" width="20px" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M21.4 11.6L12.4 2.6C12 2.2 11.5 2 11 2H4C2.9 2 2 2.9 2 4V11C2 11.5 2.2 12 2.6 12.4L11.6 21.4C12 21.8 12.5 22 13 22C13.5 22 14 21.8 14.4 21.4L21.4 14.4C21.8 14 22 13.5 22 13C22 12.5 21.8 12 21.4 11.6M13 20L4 11V4H11L20 13M6.5 5C7.3 5 8 5.7 8 6.5S7.3 8 6.5 8 5 7.3 5 6.5 5.7 5 6.5 5M10.1 8.9L11.5 7.5L17 13L15.6 14.4L10.1 8.9M7.6 11.4L9 10L13 14L11.6 15.4L7.6 11.4Z" />
                                                </svg>
                                            </div>
                                            <div class="text-end text-uppercase">
                                                Total Products
                                                <h2 class="counter"><?php echo $tproducts; ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mt-3 mb-4 wow animated fadeIn">
                                <div class="card bg-white">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="bg-primary rounded p-3">

                                                <svg class="icon-20 text-white" xmlns="http://www.w3.org/2000/svg"
                                                    width="20px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                                </svg>
                                            </div>
                                            <div class="text-end text-uppercase">
                                                Total User
                                                <h2 class="counter"><?php echo $tregusers; ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 mt-3 mb-4 wow animated fadeIn">
                                <div class="card bg-white">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-itmes-center">
                                            <div>
                                                <div class="p-3 rounded bg-soft-primary">
                                                    <svg class="icon-30" xmlns="http://www.w3.org/2000/svg" width="30px"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="mb-0 text-uppercase">Order Served</p>
                                                <h1 class="counter"><?php echo $deliveredorders; ?></h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 mt-3 mb-4 wow animated fadeIn">
                                <div class="card bg-white">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class=" bg-soft-success rounded p-3">
                                                <svg class="icon-35" xmlns="http://www.w3.org/2000/svg" width="35px"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 8h6m-5 0a3 3 0 110 6H9l3 3m-3-6h6m6 1a9 9 0 11-18 0 9 9 0 0118 0z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-success mb-0 text-uppercase">Total Earning</p>
                                                <h1 class="text-success counter"> <?php echo $tEarn; ?></h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 mt-3 mb-4 wow animated fadeIn ">
                                <div class="card bg-white">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class=" bg-soft-warning rounded p-3">
                                                <svg class="icon-40" xmlns="http://www.w3.org/2000/svg" width="40px"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="ms-5">
                                                <h5 class="mb-1 text-uppercase">Positive Reviews</h5>
                                                <div>
                                                    <svg class="icon-15" xmlns="http://www.w3.org/2000/svg" width="15px"
                                                        color="orange" fill="orange" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                                        </path>
                                                    </svg>
                                                    <svg class="icon-15" xmlns="http://www.w3.org/2000/svg" width="15px"
                                                        color="orange" fill="orange" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                                        </path>
                                                    </svg>
                                                    <svg class="icon-15" xmlns="http://www.w3.org/2000/svg" width="15px"
                                                        color="orange" fill="orange" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                                        </path>
                                                    </svg>
                                                    <svg class="icon-15" xmlns="http://www.w3.org/2000/svg" width="15px"
                                                        color="orange" fill="orange" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                                        </path>
                                                    </svg>
                                                    <svg class="icon-15" xmlns="http://www.w3.org/2000/svg" width="15px"
                                                        color="orange" fill="orange" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <h6 class="text-info counter">
                                                    <?php echo $tproductreviews; ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-3 mb-4 wow animated fadeIn">

                                <div class="card ">
                                    <div class="card-body ">
                                        <h2 class="counter mb-3"><?php echo $torder; ?></h2>
                                        <h4 class="mb-2 text-uppercase"
                                            style="font-weight:550; font-family: 'Roundo', sans-serif;">order's
                                            management</h4>
                                        <p class="mb-2 text-uppercase">Total Order</p>
                                        <div class="mt-3">
                                            <div class="pb-3">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <p class="mb-0 text-uppercase">Padding Orders</p>
                                                    <?php
                                                        $status = 'Delivered';
                                                        $ret = mysqli_query($con, "SELECT * FROM Orders where orderStatus!='$status' || orderStatus is null ");
                                                        $num = mysqli_num_rows($ret); { ?>
                                                    <h4><?php echo htmlentities($num); ?></h4>
                                                </div>
                                                <div class="progress bg-soft-info shadow-none w-100"
                                                    style="height: 10px">
                                                    <div class="progress-bar bg-info" data-toggle="progress-bar"
                                                        role="progressbar"
                                                        aria-valuenow="<?php echo htmlentities($num); ?>"
                                                        aria-valuemin="0" aria-valuemax="<?php echo $torder; ?>"></div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <div class="pb-3">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <p class="mb-0 text-uppercase">Packed Orders</p>
                                                    <h4><?php echo $porders; ?></h4>
                                                </div>
                                                <div class="progress bg-soft-info shadow-none w-100"
                                                    style="height: 10px">
                                                    <div class="progress-bar bg-info" data-toggle="progress-bar"
                                                        role="progressbar" aria-valuenow="<?php echo $porders; ?>"
                                                        aria-valuemin="0" aria-valuemax="<?php echo $torder; ?>"></div>
                                                </div>
                                            </div>
                                            <div class="pb-3">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <p class="mb-0 text-uppercase">Dispatched</p>
                                                    <h4><?php echo $dtorders; ?></h4>
                                                </div>
                                                <div class="progress bg-soft-success shadow-none w-100"
                                                    style="height: 10px">
                                                    <div class="progress-bar bg-success" data-toggle="progress-bar"
                                                        role="progressbar" aria-valuenow="<?php echo $dtorders; ?>"
                                                        aria-valuemin="0" aria-valuemax="<?php echo $torder; ?>"></div>
                                                </div>
                                            </div>
                                            <div class="pb-3">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <p class="mb-0 text-uppercase">In Transit Orders</p>
                                                    <h4><?php echo $intorders; ?></h4>
                                                </div>
                                                <div class="progress bg-soft-primary shadow-none w-100"
                                                    style="height: 10px">
                                                    <div class="progress-bar bg-primary" data-toggle="progress-bar"
                                                        role="progressbar" aria-valuenow="<?php echo $intorders; ?>"
                                                        aria-valuemin="0" aria-valuemax="<?php echo $torder; ?>"></div>
                                                </div>
                                            </div>

                                            <div class="pb-3">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <p class="mb-0 text-uppercase">Out for Delivery Orders</p>
                                                    <h4><?php echo $otforders; ?></h4>
                                                </div>
                                                <div class="progress bg-soft-success shadow-none w-100"
                                                    style="height: 10px">
                                                    <div class="progress-bar bg-success" data-toggle="progress-bar"
                                                        role="progressbar" aria-valuenow="<?php echo $otforders; ?>"
                                                        aria-valuemin="0" aria-valuemax="<?php echo $torder; ?>"></div>
                                                </div>
                                            </div>
                                            <div class="pb-3">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <p class="mb-0 text-uppercase">Delivered Orders</p>
                                                    <h4><?php echo $deliveredorders; ?></h4>
                                                </div>
                                                <div class="progress bg-soft-success shadow-none w-100"
                                                    style="height: 10px">
                                                    <div class="progress-bar bg-success" data-toggle="progress-bar"
                                                        role="progressbar"
                                                        aria-valuenow="<?php echo $deliveredorders; ?>"
                                                        aria-valuemin="0" aria-valuemax="30"></div>
                                                </div>
                                            </div>
                                            <div class="pb-3">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <p class="mb-0 text-uppercase">Cancelled Orders</p>
                                                    <h4><?php echo $cancelledorders; ?></h4>
                                                </div>
                                                <div class="progress bg-soft-success shadow-none w-100"
                                                    style="height: 10px">
                                                    <div class="progress-bar bg-success" data-toggle="progress-bar"
                                                        role="progressbar"
                                                        aria-valuenow="<?php echo $cancelledorders; ?>"
                                                        aria-valuemin="0" aria-valuemax="<?php echo $torder; ?>"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 mt-3 mb-4 wow animated fadeIn">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card bg-white">
                                            <div class="card-body">
                                                <div class="d-flex flex-column align-items-between">
                                                    <div>
                                                        <div class="d-flex">
                                                            <div class="bg-soft-primary  p-3 rounded">
                                                                <svg class="icon-25 " xmlns="http://www.w3.org/2000/svg"
                                                                    width="25px" fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3">
                                                        <span>CUSTOMER</span>
                                                        <div>
                                                            <h3 class="counter"><?php echo $tregusers; ?></h3>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card bg-white">
                                            <div class="card-body">
                                                <div class="d-flex flex-column align-items-between">
                                                    <div>
                                                        <div class="d-flex">
                                                            <div class="bg-soft-warning text-white p-3 rounded">
                                                                <svg class="icon-25 text-warning" width="25px"
                                                                    viewBox="0 0 24 24">
                                                                    <path fill="currentColor"
                                                                        d="M13,2.05C18.05,2.55 22,6.82 22,12C22,13.45 21.68,14.83 21.12,16.07L18.5,14.54C18.82,13.75 19,12.9 19,12C19,8.47 16.39,5.57 13,5.08V2.05M12,19C14.21,19 16.17,18 17.45,16.38L20.05,17.91C18.23,20.39 15.3,22 12,22C6.47,22 2,17.5 2,12C2,6.81 5.94,2.55 11,2.05V5.08C7.61,5.57 5,8.47 5,12A7,7 0 0,0 12,19M12,6A6,6 0 0,1 18,12C18,14.97 15.84,17.44 13,17.92V14.83C14.17,14.42 15,13.31 15,12A3,3 0 0,0 12,9L11.45,9.05L9.91,6.38C10.56,6.13 11.26,6 12,6M6,12C6,10.14 6.85,8.5 8.18,7.38L9.72,10.05C9.27,10.57 9,11.26 9,12C9,13.31 9.83,14.42 11,14.83V17.92C8.16,17.44 6,14.97 6,12Z" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3">
                                                        <span>SALES</span>
                                                        <div>
                                                            <h3 class="counter"><?php echo $tTotalSale; ?></h3>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3 mb-4 wow animated fadeIn">
                                    <div class="col-md-6 ">
                                        <div class="card bg-white">
                                            <div class="card-body">
                                                <div class="d-flex flex-column align-items-between">
                                                    <div>
                                                        <div class="d-flex">
                                                            <div class="bg-soft-success text-white p-3 rounded">

                                                                <svg class="icon-25 text-success"
                                                                    xmlns="http://www.w3.org/2000/svg" width="25px"
                                                                    fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3">
                                                        <span>PROFIT</span>
                                                        <div>
                                                            <h3 class="counter">
                                                                <!-- Profit= (productPrice×quantity) − shippingCharge − GST -->
                                                                <h3 class="counter"><?php echo $tNetProfit; ?>
                                                                </h3>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card bg-white">
                                            <div class="card-body">
                                                <div class="d-flex flex-column align-items-between">
                                                    <div>
                                                        <div class="d-flex">
                                                            <div class="bg-soft-danger text-white p-3 rounded">
                                                                <svg class="icon-25 text-danger"
                                                                    xmlns="http://www.w3.org/2000/svg" width="25px"
                                                                    fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3">
                                                        <span>LOSS</span>
                                                        <div>
                                                            <h3 class="counter"><?php echo $tloss; ?></h3>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3 mb-4 wow animated fadeIn">
                                    <div class="col-md-6 ">
                                        <div class="card bg-white">
                                            <div class="card-body">
                                                <div class="d-flex flex-column align-items-between">
                                                    <div>
                                                        <div class="d-flex">
                                                            <div class="bg-soft-success text-white p-3 rounded">
                                                                <svg class="icon-25 text-success"
                                                                    xmlns="http://www.w3.org/2000/svg" width="25px"
                                                                    fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3">
                                                        <span>GROSS PROFIT</span>
                                                        <div>
                                                            <h3 class="counter">
                                                                <!-- Profit= (productPrice×quantity) − shippingCharge − GST -->
                                                                <h3 class="counter"><?php echo $tGrossProfit; ?></h3>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card bg-white">
                                            <div class="card-body">
                                                <div class="d-flex flex-column align-items-between">
                                                    <div>
                                                        <div class="d-flex">
                                                            <div class="bg-soft-success text-white p-3 rounded">
                                                                <svg class="icon-25 text-success"
                                                                    xmlns="http://www.w3.org/2000/svg" width="25px"
                                                                    fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3">
                                                        <span>PRODUCTS COST</span>
                                                        <div>
                                                            <h3 class="counter">
                                                                <h3 class="counter"><?php echo $tProductCost; ?></h3>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 mt-3 mb-4 wow animated fadeIn">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <?php
                                                            $f1 = "00:00:00";
                                                            $from = date('Y-m-d') . " " . $f1;
                                                            $t1 = "23:59:59";
                                                            $to = date('Y-m-d') . " " . $t1;
                                                            $result = mysqli_query($con, "SELECT * FROM Orders where orderDate Between '$from' and '$to'");
                                                            $num_rows1 = mysqli_num_rows($result); {
                                                            ?>
                                                        <span class="text-uppercase">Orders</span>
                                                        <div class="mt-2">
                                                            <h2 class="counter"><?php echo htmlentities($num_rows1); ?>
                                                            </h2>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <span class="badge bg-warning p-2 text-uppercase">Today</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between mt-2">
                                                    <div>
                                                        <span class="text-uppercase">New Orders</span>
                                                    </div>
                                                    <div>
                                                        <span><?php echo htmlentities($num_rows1); ?></span>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <div class="progress bg-soft-warning shadow-none w-100"
                                                        style="height: 6px">
                                                        <div class="progress-bar bg-warning" data-toggle="progress-bar"
                                                            role="progressbar"
                                                            aria-valuenow="<?php echo htmlentities($num_rows1); ?>"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Library Bundle Script -->
    <script src="assets2.0/js/core/libs.min.js"></script>

    <!-- External Library Bundle Script -->
    <script src="assets2.0/js/core/external.min.js"></script>

    <!-- Widgetchart Script -->
    <script src="assets2.0/js/charts/widgetcharts.js"></script>

    <!-- mapchart Script -->
    <script src="assets2.0/js/charts/vectore-chart.js"></script>

    <!-- fslightbox Script -->
    <script src="assets2.0/js/plugins/fslightbox.js"></script>

    <!-- Settings Script -->
    <script src="assets2.0/js/plugins/setting.js"></script>

    <!-- Slider-tab Script -->
    <script src="assets2.0/js/plugins/slider-tabs.js"></script>

    <!-- Form Wizard Script -->
    <script src="assets2.0/js/plugins/form-wizard.js"></script>

    <!-- AOS Animation Plugin-->
    <link rel="stylesheet" href="assets2.0/vendor/aos/dist/aos.js" />

    <!-- App Script -->
    <script src="assets2.0/js/hope-ui.js" defer></script>

</body>

</html>
<?php } ?>