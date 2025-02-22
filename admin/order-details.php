<?php
session_start();
include('include/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    date_default_timezone_set('Asia/Kolkata'); // change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| In Transit Orders</title>
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
    </style>
    <script language="javascript" type="text/javascript">
    var popUpWin = 0;

    function popUpWindow(URLStr, left, top, width, height) {
        if (popUpWin) {
            if (!popUpWin.closed) popUpWin.close();
        }
        popUpWin = open(URLStr, 'popUpWin',
            'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' +
            600 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
    }
    </script>
</head>

<body>
    <?php include('include/sidebar.php'); ?>
    <main class="main-content">
        <div ss="position-relative iq-banner">
            <!--Nav Start-->
            <?php include('include/header.php'); ?>
            <?php include_once('include/topstorebar.php'); ?>
            <div class="wrapper">
                <div class="container mt-5">
                    <div class="row">
                        <div class="span9">
                            <div class="content">
                                <div class="module">
                                    <div class="module-head">
                                        <h3>Order Details #<?php echo intval($_GET['oid']); ?></h3>
                                    </div>
                                    <div class="module-body table">


                                        <style>
                                        table {
                                            border-radius: 20px !important;
                                        }
                                        </style>
                                        <div class="table-responsive mt-5">
                                            <table cellpadding="0" cellspacing="0"
                                                class="datatable-1 table table-bordered bg-white	 display table-responsive">

                                                <tbody>
                                                    <?php
                                                        $orderid = intval($_GET['oid']);
                                                        $query = mysqli_query($con, "select orders.id as oid,users.name as username,users.email as useremail,users.contactno as usercontact,users.shippingAddress as shippingaddress,users.shippingCity as shippingcity,users.shippingState as shippingstate,users.shippingPincode as shippingpincode,products.productName as productname,products.shippingCharge as shippingcharge,orders.quantity as quantity,orders.orderDate as orderdate,products.productPrice as productprice,billingAddress,billingState,billingCity,billingPincode,products.id as pid,productImage1,shippingcharge from orders join users on  orders.userId=users.id join products on products.id=orders.productId where orders.id='$orderid'");
                                                        $cnt = 1;
                                                        while ($row = mysqli_fetch_array($query)) {
                                                        ?>
                                                    <tr>
                                                        <th>Order Id</th>
                                                        <td><?php echo htmlentities($row['oid']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Order Date</th>
                                                        <td><?php echo htmlentities($row['orderdate']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Username</th>
                                                        <td><?php echo htmlentities($row['username']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>User Contact Details</th>
                                                        <td><?php echo htmlentities($row['useremail']); ?>/<?php echo htmlentities($row['usercontact']); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>User Shipping Details</th>

                                                        <td><?php echo htmlentities($row['billingAddress'] . "," . $row['billingCity'] . "," . $row['billingState'] . "-" . $row['shippingpincode']); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>User Billing Details</th>

                                                        <td><?php echo htmlentities($row['shippingaddress'] . "," . $row['shippingcity'] . "," . $row['shippingstate'] . "-" . $row['billingPincode']); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <td><?php echo htmlentities($row['productname']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Product Image</th>
                                                        <td><img src="productimages/<?php echo htmlentities($row['pid'] . "/" . $row['productImage1']); ?>"
                                                                width="100"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Product Quantity</th>
                                                        <td><?php echo htmlentities($row['quantity']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Product Price</th>
                                                        <td><?php echo htmlentities($row['productprice']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Shipping Charge</th>
                                                        <td> <?php echo htmlentities($row['shippingcharge']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Grand Total</th>
                                                        <td><?php echo htmlentities($row['quantity'] * $row['productprice'] + $row['shippingcharge']); ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <?php $cnt = $cnt + 1;
                                                        } ?>

                                            <?php
                                            $ret = mysqli_query($con, "SELECT * FROM ordertrackhistory WHERE orderId='$orderid'");
                                            $count = mysqli_num_rows($ret);

                                            ?>

                                            <table cellpadding="0" cellspacing="0"
                                                class="table table-bordered bg-white table-striped"
                                                style="margin-top:1%;">
                                                <?php if ($count > 0) { ?>
                                                <tr>
                                                    <th colspan="4"
                                                        style="text-transform: uppercase; color:black; font-size:16px;">
                                                        Order
                                                        History</th>
                                                </tr>
                                                <tr>
                                                    <th>Remark</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                </tr>
                                                <?php while ($row = mysqli_fetch_array($ret)) { ?>


                                                <tr>
                                                    <td><?php echo $row['remark']; ?></td>
                                                    <td><?php echo $row['status']; ?></td>
                                                    <td><?php echo $row['postingDate']; ?></td>
                                                </tr>

                                                <?php }
                                                } ?>



                                                <tr>
                                                    <td colspan="4"> <a
                                                            href="updateorder.php?oid=<?php echo htmlentities($orderid); ?>"
                                                            title="Update order" target="_blank"
                                                            class="btn btn-dark text-uppercase">Take
                                                            Action</a>
                                                    </td>
                                                </tr>
                                            </table>


                                        </div>
                                    </div>
                                </div>



                            </div>
                            <!--/.content-->
                        </div>
                        <!--/.span9-->
                    </div>
                </div>
                <!--/.container-->
            </div>
            <!--/.wrapper-->
        </div>
    </main>
    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="scripts/datatables/jquery.dataTables.js"></script>
    <script>
    $(document).ready(function() {
        $('.datatable-1').dataTable();
        $('.dataTables_paginate').addClass("btn-group datatable-pagination");
        $('.dataTables_paginate > a').wrapInner('<span />');
        $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
        $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
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
<?php } ?>