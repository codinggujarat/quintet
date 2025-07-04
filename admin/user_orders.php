<?php
session_start();
include('include/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Purchases Orders</title>
    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="assets2.0/css/core/libs.min.css" />

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="assets2.0/css/hope-ui.min.css?v=2.0.0" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="assets2.0/css/custom.min.css?v=2.0.0" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="assets2.0/css/dark.min.css" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="assets2.0/css/customizer.min.css" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="assets2.0/css/rtl.min.css" />
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>


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

    .productimg1 {
        width: 100px;
        height: 100px;
        object-fit: contain;
    }
    </style>
</head>

<body>
    <?php include('include/sidebar.php'); ?>
    <main class="main-content">
        <div ss="position-relative iq-banner">
            <?php include('include/header.php'); ?>
            <?php include_once('include/topstorebar.php'); ?>
            <div class="coner-fc content-inner mt-5 py-0 ">
                <div class="row" style=" margin-top: 100px !important;">
                    <div class="col-sm-12">

                        <div class="card ">

                            <div class="card-body">
                                <h3 style=" font-size: 17px !important;
                                font-family: 'Poppins',sans-serif ;font-weight: 400 !important ; "
                                    class="text-uppercase">
                                    User Purchases Orders
                                </h3>

                                <div class="module-body " style=" overflow-x:auto !important ;">

                                    <style>
                                    table thead tr th,
                                    table tbody tr td {
                                        font-size: 13px !important;
                                        font-weight: 500 !important;
                                        text-transform: capitalize !important;
                                        color: #000 !important;
                                    }
                                    </style>
                                    <div class="card p-0">
                                        <div class="table-responsive">
                                            <table id="datatable" class="table   " data-toggle="data-table">
                                                <thead>
                                                    <tr>
                                                        <th>Order ID</th>
                                                        <th>Order Date</th>
                                                        <th>order Status</th>
                                                        <th>Product ID</th>
                                                        <th>Product Name</th>
                                                        <th>Product Company</th>
                                                        <th>Price</th>
                                                        <th>product Image</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    if (isset($_GET['user_id'])) {
                                                        $user_id = intval($_GET['user_id']);

                                                        $query = "SELECT 
                users.id AS user_id, 
                users.name AS user_name, 
                orders.id AS order_id, 
                orders.orderDate, 
                orders.orderStatus, 
                products.id AS product_id, 
                products.productName, 
                products.productCompany, 
                products.productPrice,
products.productImage1

              FROM orders
              JOIN users ON orders.userId = users.id
              JOIN products ON orders.productId = products.id
              WHERE users.id = '$user_id'
              ORDER BY orders.orderDate DESC";

                                                        $result = mysqli_query($con, $query);

                                                        if (mysqli_num_rows($result) > 0) {
                                                            ">
                <tr>
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th >order Status</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Company</th>
                    <th>Price</th>
                    <th>Price</th>
                </tr>";

                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                echo "
                                                                <tr>
                    <td>{$row['order_id']}</td>
                    <td>{$row['orderDate']}</td>
                    <td  >{$row['orderStatus']}</td>
                    <td>{$row['product_id']}</td>
                    <td>{$row['productName']}</td>
                    <td>{$row['productCompany']}</td>
                    <td>{$row['productPrice']}</td>
                    <td><img class='productimg1' src='productimages/{$row['product_id']}/{$row['productImage1']}'>
                                                    </td>


                                                    </tr>";
                                                            }
                                                        } else {
                                                            echo "No purchases found for this user.";
                                                        }
                                                    } else {
                                                        echo "User ID not provided.";
                                                    }

                                                    mysqli_close($con);
                                                    ?>

                                            </table>
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


    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript">
    </script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="scripts/datatables/jquery.dataTables.js"></script>
    <script>
    $(document).ready(function() {
        $('.datatable-1').dataTable();
        $('.dataTables_paginate').addClass("btn-group datatable-pagination");
        $('.dataTables_paginate > a').wrapInner('<span />');
        $('.dataTables_paginate > a:first-child').append(
            '<i class="icon-chevron-left shaded"></i>');
        $('.dataTables_paginate > a:last-child').append(
            '<i class="icon-chevron-right shaded"></i>');
    });
    </script>
    <!-- Library Bundle Script -->
    <script src="assets2.0/js/core/libs.min.js"></script>

    <!-- External Library Bundle Script -->
    <script src="assets2.0/js/core/external.min.js"></script>

    <!-- Widgetchart Script -->
    <script src="assets2.0/js/charts/widgetcharts.js"></script>

    <!-- mapchart Script -->
    <script src="assets2.0/js/charts/vectore-chart.js"></script>
    <script src="assets2.0/js/charts/dashboard.js"></script>

    <!-- fslightbox Script -->
    <script src="assets2.0/js/plugins/fslightbox.js"></script>

    <!-- Settings Script -->
    <script src="assets2.0/js/plugins/setting.js"></script>

    <!-- Slider-tab Script -->
    <script src="assets2.0/js/plugins/slider-tabs.js"></script>

    <!-- Form Wizard Script -->
    <script src="assets2.0/js/plugins/form-wizard.js"></script>

    <!-- AOS Animation Plugin-->

    <!-- App Script -->
    <script src="assets2.0/js/hope-ui.js" defer></script>

</body>

</html>