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
            <?php include_once('include/topstorebar.php'); ?>
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
                                <div class="card bg-soft-info">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="bg-soft-info rounded p-3">
                                                <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20px"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <div class="text-end text-uppercase">
                                                Category
                                                <h2 class="counter"><?php echo $tcategory; ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mt-3 mb-4 wow animated fadeIn">
                                <div class="card bg-soft-warning">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="bg-soft-warning rounded p-3">
                                                <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20px"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <div class="text-end text-uppercase">
                                                subcategory
                                                <h2 class="counter"><?php echo $tsubcategory; ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mt-3 mb-4 wow animated fadeIn">
                                <div class="card bg-soft-danger">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="bg-soft-danger rounded p-3">
                                                <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20px"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                                </svg>
                                            </div>
                                            <div class="text-end text-uppercase">
                                                Products
                                                <h2 class="counter"><?php echo $tproducts; ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mt-3 mb-4 wow animated fadeIn">
                                <div class="card bg-soft-primary">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="bg-soft-primary rounded p-3">
                                                <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20px"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <div class="text-end text-uppercase">
                                                User
                                                <h2 class="counter"><?php echo $tregusers; ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-4 mt-3 mb-4 wow animated fadeIn">

                                <div class="card ">
                                    <div class="card-body ">
                                        <h2 class="counter mb-3"><?php echo $torder; ?></h2>
                                        <h2 class="mb-2 text-uppercase">order's management</h2>
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
                            <div class="col-lg-4 mt-3 mb-4 wow animated fadeIn ">
                                <div class="card bg-soft-primary">
                                    <div class="text-center card-body d-flex justify-content-around">
                                        <div>
                                            <h2 class="mb-2">
                                                <?php echo $tregusers; ?>
                                            </h2>
                                            <p class="mb-0 text-uppercase text-gray">Website Visitors</p>
                                        </div>
                                        <hr class="hr-vertial">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 mt-3 mb-4 wow animated fadeIn ">
                                <div class="card bg-soft-warning">
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
                                                <h5 class="mb-1">Positive Reviews</h5>
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
                                                <h6 class="text-info">
                                                    <?php echo $tproductreviews; ?>
                                                </h6>
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