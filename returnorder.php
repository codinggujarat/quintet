<?php
session_start();

include_once 'includes/config.php';
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    $oid = intval($_GET['oid']);
    if (isset($_POST['submit2'])) {
        $status = $_POST['status'];
        $remark = $_POST['remark']; //space char

        $query = mysqli_query($con, "insert into ordertrackhistory(orderId,status,remark) values('$oid','$status','$remark')");
        $sql = mysqli_query($con, "update orders set orderStatus='$status' where id='$oid'");
        echo "<script>alert('Order updated sucessfully...');</script>";
        header('location:order-history.php');
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
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>cancel order</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="anuj.css" rel="stylesheet" type="text/css">
    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="admin/assets2.0/css/core/libs.min.css" />


    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="admin/assets2.0/css/hope-ui.min.css?v=2.0.0" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="admin/assets2.0/css/custom.min.css?v=2.0.0" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="admin/assets2.0/css/dark.min.css" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="admin/assets2.0/css/customizer.min.css" />

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- FONTSHARE.COM -->
    <link
        href="https://api.fontshare.com/v2/css?f[]=panchang@300,500&f[]=cabinet-grotesk@300&f[]=roundo@500,600,700,1&f[]=red-hat-display@300,400&f[]=chillax@200,300,400&display=swap"
        rel="stylesheet">

    <style>
    .center_Div {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        height: 100% !important;
        text-transform: uppercase;
        font-family: 'Chillax', sans-serif;
        font-weight: lighter;
        color: #000 !important;
    }

    .fontkink1 {
        font-weight: bold;
    }

    .statusT {
        font-weight: light;
        padding: 2px;
        background-color: #000;
        color: #fff !important;
    }

    .fontpink2 {
        text-align: center;
        font-weight: bold;
        border-bottom: 1px solid black;
        padding-bottom: 10px;
    }

    .fontpink3 {
        text-align: center;
        font-weight: bold;
        padding-bottom: 10px;
    }


    .card {
        background-color: white !important;
    }

    @media (max-width: 600px) {
        .center_Div {
            position: relative;
        }
    }
    </style>
</head>

<body class="bg-white">
    <!--Nav Start-->
    <style>
    .fontkink1,
    .fontkink {
        text-transform: uppercase;
    }
    </style>
    <div class="center_Div ">
        <div class="col-lg-12 col-sm-12 col-md-12 h-100 ">
            <div class="wrapper " style="margin-top: 90px;">
                <div class="container mt-5 ">
                    <form name="updateticket" id="updateticket" method="post" class="mt-5">
                        <div class="row ">

                            <style>
                            .row {
                                padding: 10px;
                                border: 2px solid black;
                            }
                            </style>
                            <div class="col-lg-6 card">
                                <table cellpadding="0" cellspacing="0"
                                    class="bg-white  table table-bordered 	  table-responsive">
                                    <tr class="bg-black text-white">
                                        <td colspan="2" class="text-center text-white text-uppercase fs-4">
                                            return Order ! </td>
                                    </tr>
                                    <tr>
                                        <td class="fontkink1">order Id:</td>
                                        <td class="fontkink"><?php echo $oid; ?></td>
                                    </tr>
                                    <?php
                                        $st = 'In Transit';
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
                                                Your order is in transit and cannot be canceled at this stage.
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

                                                <input type="text" value="return order" name="status" readonly>
                                            </span></td>
                                    </tr>

                                    <tr>
                                        <td class="fontkink1">Remark:</td>
                                        <td class="fontkink"><span class="fontkink">
                                                <textarea cols="50" rows="7"
                                                    placeholder="Write a Reason for canceling an order " name="remark"
                                                    required="required"></textarea>
                                            </span></td>
                                    </tr>

                                    <tr>
                                        <td class="fontkink"> </td>
                                        <td class="fontkink">
                                            <input type="submit" name="submit2" value="update" class="txtbox4" size="40"
                                                style="cursor: pointer;" />
                                            &nbsp;&nbsp;
                                            <!-- <input name="Submit2" type="submit" class="txtbox4"
                                                value="Close this Window " onClick="return f2();"
                                                style="cursor: pointer;" /> -->
                                        </td>
                                    </tr>
                                    <?php } ?>

                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
    .txtbox4 {
        background-color: #000;
        color: #fff;
        text-transform: uppercase !important;
        padding: 10px;
        font-size: 15px;
    }

    * {
        font-family: 'Poppins', sans-serif !important;
        font-weight: lighter !important;
    }

    input::placeholder,
    textarea::placeholder {
        text-transform: capitalize !important;
        font-weight: light !important;
        color: #000;
    }

    input {
        text-transform: capitalize !important;
        color: #000;
        padding: 10px;
    }
    </style>
    <!-- Library Bundle Script -->
    <script src="admin/assets2.0/js/core/libs.min.js"></script>

    <!-- External Library Bundle Script -->
    <script src="admin/assets2.0/js/core/external.min.js"></script>

    <!-- Widgetchart Script -->
    <script src="admin/assets2.0/js/charts/widgetcharts.js"></script>

    <!-- mapchart Script -->
    <script src="admin/assets2.0/js/charts/vectore-chart.js"></script>
    <script src="admin/assets2.0/js/charts/dashboard.js"></script>

    <!-- fslightbox Script -->
    <script src="admin/assets2.0/js/plugins/fslightbox.js"></script>

    <!-- Settings Script -->
    <script src="admin/assets2.0/js/plugins/setting.js"></script>

    <!-- Slider-tab Script -->
    <script src="admin/assets2.0/js/plugins/slider-tabs.js"></script>

    <!-- Form Wizard Script -->
    <script src="admin/assets2.0/js/plugins/form-wizard.js"></script>

    <!-- AOS Animation Plugin-->

    <!-- App Script -->
    <script src="admin/assets2.0/js/hope-ui.js" defer></script>
</body>

</html>
<?php } ?>