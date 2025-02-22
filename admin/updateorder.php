<?php
session_start();

include_once 'include/config.php';
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    $oid = intval($_GET['oid']);
    if (isset($_POST['submit2'])) {
        $status = $_POST['status'];
        $remark = $_POST['remark']; //space char

        $query = mysqli_query($con, "insert into ordertrackhistory(orderId,status,remark) values('$oid','$status','$remark')");
        $sql = mysqli_query($con, "update orders set orderStatus='$status' where id='$oid'");
        echo "<script>alert('Order updated sucessfully...');</script>";
        //}
    }

?>
<script language="javascript" type="text/javascript">
function f2() {
    window.close();
}
ser

function f3() {
    window.print();
}
</script>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| Update Order </title>
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
        <div class="position-relative iq-banner ">
            <!--Nav Start-->
            <?php include('include/header.php'); ?>
            <?php include_once('include/topstorebar.php'); ?>
            <style>
            .fontkink1,
            .fontkink {
                text-transform: uppercase;
            }
            </style>
            <div class="wrapper" style="margin-top: 90px;">
                <div class="container mt-5">
                    <form name="updateticket" id="updateticket" method="post" class="mt-5">
                        <style>
                        table {
                            border-radius: 20px !important;
                        }
                        </style>
                        <div class="row">
                            <div class="col-lg-6">
                                <table cellpadding="0" cellspacing="0"
                                    class="bg-white  table table-bordered 	  table-responsive">
                                    <tr>
                                        <td colspan="2" class="text-uppercase">
                                            Update Order ! </td>
                                    </tr>
                                    <tr>
                                        <td class="fontkink1">order Id:</td>
                                        <td class="fontkink"><?php echo $oid; ?></td>
                                    </tr>
                                    <?php
                                        $st = 'Delivered';
                                        $rt = mysqli_query($con, "SELECT * FROM orders WHERE id='$oid'");
                                        while ($num = mysqli_fetch_array($rt)) {
                                            $currrentSt = $num['orderStatus'];
                                        }
                                        if ($st == $currrentSt) { ?>
                                    <tr>
                                        <style>
                                        .bx-calendar-check {
                                            font-size: 15px !important;
                                        }
                                        </style>
                                        <td colspan="2">
                                            <button
                                                class="btn btn-outline-dark bg-white text-black rounded text-uppercase">
                                                Product Delivered
                                                <i class='bx bx-check-square'></i> </button>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <?php } else {
                                            ?>
                                    </tr>
                                    <tr height="50">
                                        <td class="fontkink1">Status: </td>
                                        <td class="fontkink"><span class="fontkink1">
                                                <select name="status" class="fontkink" required="required">
                                                    <option value="">Select Status</option>
                                                    <option value="in Process">In Process</option>
                                                    <option value="Packed">Packed</option>
                                                    <option value="Dispatched">Dispatched</option>
                                                    <option value="In Transit">In Transit</option>
                                                    <option value="Out For Delivery">Out For Delivery</option>
                                                    <option value="Delivered">Delivered</option>
                                                    <option value="cancelled">cancelled</option>
                                                </select>
                                            </span></td>
                                    </tr>

                                    <tr>
                                        <td class="fontkink1">Remark:</td>
                                        <td class="fontkink"><span class="fontkink">
                                                <textarea cols="50" rows="7" name="remark"
                                                    required="required"></textarea>
                                            </span></td>
                                    </tr>

                                    <tr>
                                        <td class="fontkink"> </td>
                                        <td class="fontkink">
                                            <input type="submit" name="submit2" value="update" size="40"
                                                style="cursor: pointer;" />
                                            &nbsp;&nbsp;
                                            <input name="Submit2" type="submit" class="txtbox4"
                                                value="Close this Window " onClick="return f2();"
                                                style="cursor: pointer;" />
                                        </td>
                                    </tr>
                                    <?php } ?>

                                </table>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="header-title">
                                            <h4 class="card-title">Update Order !</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div
                                            class="iq-timeline0 m-0 d-flex align-items-center justify-content-between position-relative">
                                            <ul class="list-inline p-0 m-0">
                                                <?php
                                                    $ret = mysqli_query($con, "SELECT * FROM ordertrackhistory WHERE orderId='$oid'");
                                                    while ($row = mysqli_fetch_array($ret)) {
                                                    ?>
                                                <li>
                                                    <div
                                                        class="timeline-dots timeline-dot1 border-primary text-primary">
                                                    </div>
                                                    <h6 class="float-left mb-1"><?php echo $row['status']; ?></h6>
                                                    <small
                                                        class="float-right mt-1"><?php echo $row['postingDate']; ?></small>
                                                    <div class="d-inline-block w-100">
                                                        <p><?php echo $row['remark']; ?>
                                                        </p>
                                                    </div>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
<?php } ?>