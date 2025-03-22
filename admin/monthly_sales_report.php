<?php
session_start();
include('include/config.php');
if (strlen($_SESSION['alogin']) == 01) {
    header('location:index.php');
} else {
    function formatNumber($num)
    {
        // Convert string to a float if it's numeric
        if (!is_numeric($num)) {
            return $num; // Return as-is if it's already a formatted string
        }

        if ($num >= 1000000) {
            return number_format($num / 1000000, 2) . 'M';
        } elseif ($num >= 1000) {
            return number_format($num / 1000, 2) . 'K';
        }
        return number_format($num, 2);
    }

    // Process form submission
    if (isset($_POST['submit'])) {
        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];

        // Fetch sales data between selected dates
        $query = "SELECT 
                DATE_FORMAT(o.orderDate, '%Y-%m') AS month,
                SUM(p.productPrice * o.quantity) AS totalSales, 
                
                -- Calculate Total Loss
                CASE  
                    WHEN SUM(GREATEST((p.shippingCharge + (p.productPrice * o.quantity * 0.18) + (p.productPrice * 0.7 * o.quantity)) - (p.productPrice * o.quantity), 0)) >= 1000000  
                        THEN CONCAT(ROUND(SUM(GREATEST((p.shippingCharge + (p.productPrice * o.quantity * 0.18) + (p.productPrice * 0.7 * o.quantity)) - (p.productPrice * o.quantity), 0)) / 1000000, 1), 'M')  
                    WHEN SUM(GREATEST((p.shippingCharge + (p.productPrice * o.quantity * 0.18) + (p.productPrice * 0.7 * o.quantity)) - (p.productPrice * o.quantity), 0)) >= 1000  
                        THEN CONCAT(ROUND(SUM(GREATEST((p.shippingCharge + (p.productPrice * o.quantity * 0.18) + (p.productPrice * 0.7 * o.quantity)) - (p.productPrice * o.quantity), 0)) / 1000, 1), 'K')  
                    ELSE SUM(GREATEST((p.shippingCharge + (p.productPrice * o.quantity * 0.18) + (p.productPrice * 0.7 * o.quantity)) - (p.productPrice * o.quantity), 0))  
                END AS totalLoss, 

                -- Calculate Gross Profit (GST)
                CASE 
                    WHEN SUM(p.productPrice * 0.18 * o.quantity) >= 1000000 
                        THEN CONCAT(ROUND(SUM(p.productPrice * 0.18 * o.quantity) / 1000000, 1), 'M')
                    WHEN SUM(p.productPrice * 0.18 * o.quantity) >= 1000 
                        THEN CONCAT(ROUND(SUM(p.productPrice * 0.18 * o.quantity) / 1000, 1), 'K')
                    ELSE SUM(p.productPrice * 0.18 * o.quantity)
                END AS grossProfit,

                -- Calculate Total Profit
                CASE  
                    WHEN SUM((p.productPrice * o.quantity) - (p.shippingCharge + (p.productPrice * o.quantity * 0.18) + (p.productPrice * 0.7 * o.quantity))) >= 1000000  
                        THEN CONCAT(ROUND(SUM((p.productPrice * o.quantity) - (p.shippingCharge + (p.productPrice * o.quantity * 0.18) + (p.productPrice * 0.7 * o.quantity))) / 1000000, 1), 'M') 
                    WHEN SUM((p.productPrice * o.quantity) - (p.shippingCharge + (p.productPrice * o.quantity * 0.18) + (p.productPrice * 0.7 * o.quantity))) >= 1000  
                        THEN CONCAT(ROUND(SUM((p.productPrice * o.quantity) - (p.shippingCharge + (p.productPrice * o.quantity * 0.18) + (p.productPrice * 0.7 * o.quantity))) / 1000, 1), 'K')  
                    ELSE SUM((p.productPrice * o.quantity) - (p.shippingCharge + (p.productPrice * o.quantity * 0.18) + (p.productPrice * 0.7 * o.quantity))) 
                END AS totalProfit

            FROM orders o
            JOIN products p ON o.productid = p.id
            WHERE o.orderDate BETWEEN '$date1' AND '$date2' 
            GROUP BY month 
            ORDER BY month DESC";



        $result = mysqli_query($con, $query);
        $salesData = mysqli_fetch_assoc($result);

        // Fetch products sold in the given period
        $productQuery = "SELECT 
                        productName, 
                        id, 
                        productPrice, 
                        productImage1, 
                        shippingCharge, 
                        COUNT(id) as totalSold 
                     FROM products 
                     WHERE postingDate BETWEEN '$date1' AND '$date2' 
                     GROUP BY id,productName, productPrice, productImage1, shippingCharge";

        $productResult = mysqli_query($con, $productQuery);
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Chatbot</title>
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

    .delete-btn {
        border: 0;
        outline: 0;
        box-shadow: 0;
        background-color: transparent;
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
                    <div class="col-md-12">

                        <div class="card " style="background: transparent !important;">

                            <div class="card-body">

                                <style>
                                .card-body {
                                    width: 100%;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                }

                                table thead tr th,
                                table tbody tr td {
                                    font-size: 13px !important;
                                    font-weight: 500 !important;
                                    text-transform: capitalize !important;
                                    color: #000 !important;
                                }

                                form {
                                    padding: 20px;
                                    width: 100%;
                                }

                                label {
                                    width: 100%;
                                    text-transform: uppercase;
                                    color: #000;
                                    font-family: 'Poppins', sans-serif;
                                    font-weight: bold;
                                }

                                input {
                                    width: 100%;
                                    padding: 10px;
                                }

                                .input-field {
                                    margin-top: 20px;
                                }
                                </style>
                                <div class="card " style="padding: 20px !important;">
                                    <h3 style=" font-size: 17px !important;
                                font-family: 'Poppins',sans-serif ;font-weight: bold !important ; "
                                        class="text-uppercase mb-3 text-center fw-bold">
                                        Select Date R ange to View Report </h3>

                                    <form method="POST">
                                        <div class="input-field">
                                            <label for="date1">Start Date:</label>
                                            <input type="date" name="date1" required>

                                        </div>

                                        <div class="input-field">
                                            <label for="date2">End Date:</label>
                                            <input type="date" name="date2" required>
                                        </div>
                                        <div class="input-field">
                                            <button type="submit" class="bg-dark text-white p-2 w-100"
                                                name="submit">Generate
                                                Report</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php if (isset($salesData)) { ?>
                            <div class="col-lg-12 ">
                                <div class="row mt-3 mb-4 wow animated fadeIn">
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-3">
                                        <div class="card bg-white">
                                            <div class="card-body" style="display: block !important;">
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
                                                            <h3 class="counter">
                                                                <?php echo formatNumber($salesData['totalSales']); ?>
                                                            </h3>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6  col-xs-3 mb-4">
                                        <div class="card bg-white">
                                            <div class="card-body" style="display: block !important;">
                                                <div class="d-flex flex-column align-items-between">
                                                    <div>
                                                        <div class="d-flex">
                                                            <div class="bg-soft-info text-white p-3 rounded">

                                                                <svg class="icon-25 text-info"
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
                                                                <h3 class="counter">
                                                                    <?php echo formatNumber($salesData['totalProfit']); ?>
                                                                </h3>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-3">
                                        <div class="card bg-white">
                                            <div class="card-body" style="display: block !important;">
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
                                                            <h3 class="counter">
                                                                <?php echo formatNumber($salesData['totalLoss']); ?>
                                                            </h3>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-3 mb-4">
                                        <div class="card bg-white">
                                            <div class="card-body" style="display: block !important;">
                                                <div class="d-flex flex-column align-items-between">
                                                    <div>
                                                        <div class="d-flex">
                                                            <div class="bg-soft-secondary text-white p-3 rounded">
                                                                <svg class="icon-25 text-secondary"
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
                                                                <h3 class="counter">
                                                                    <?php echo formatNumber($salesData['grossProfit']); ?>
                                                                </h3>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <style>
                            table thead tr th,
                            table tbody tr td {
                                font-size: 13px !important;
                                font-weight: 500 !important;
                                text-transform: capitalize !important;
                                color: #000 !important;
                            }
                            </style>
                            <div class="col-lg-12">
                                <div class="card " style="padding: 20px !important;">
                                    <h3 style=" font-size: 15px !important;
                                font-family: 'Poppins',sans-serif ;font-weight: 400 !important ; "
                                        class="text-uppercase mb-3 text-left fw-400 p-2">
                                        Sales Report <span class="bg-black text-white p-1"><?php echo $date1; ?></span>
                                        to
                                        <span class="bg-black text-white p-1"> <?php echo $date2; ?></span>

                                    </h3>
                                    <h3 style=" font-size: 15px !important;
                                font-family: 'Poppins',sans-serif ;font-weight: 400 !important ; "
                                        class="text-uppercase mb-3 text-left fw-400 p-2">Products Sold</h3>
                                    <table id="datatable" class="table   " data-toggle="data-table">
                                        <thead>
                                            <tr>
                                                <th>Product Image</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Shipping Charge</th>
                                                <th>Quantity Sold</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_assoc($productResult)) { ?>
                                            <tr>
                                                <td><img class='productimg1'
                                                        src="productimages/<?php echo $row['id']; ?>/<?php echo $row['productImage1']; ?>">
                                                </td>
                                                <td><?php echo $row['productName']; ?></td>
                                                <td>₹<?php echo formatNumber($row['productPrice']); ?></td>
                                                <td>₹<?php echo formatNumber($row['shippingCharge']); ?></td>
                                                <td><?php echo formatNumber($row['totalSold']); ?></td>

                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <style>
    .productimg1 {
        width: 100px;
        height: 100px;
        object-fit: contain;
    }
    </style>

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