<?php
session_start();
include_once 'includes/config.php';
$oid = intval($_GET['oid']);
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
    <title>Order Tracking Details</title>
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
        margin: 20px;
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

<body class="bg-black">
    <div class="center_Div bg-white">
        <div class="card ">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h3 class="card-title fw-normal">Update Order !
                        <?php echo $oid; ?>
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <div class="iq-timeline0 m-0 d-flex align-items-center justify-content-between position-relative">
                    <ul class="list-inline p-0 m-0">
                        <?php
                        $ret = mysqli_query($con, "SELECT * FROM ordertrackhistory WHERE orderId='$oid'");
                        while ($row = mysqli_fetch_array($ret)) {
                        ?>
                        <li>

                            <div class="timeline-dots timeline-dot1 border-dark text-dark">
                            </div>
                            <h6 class="float-left mb-1 fw-bold bg-black text-white p-2">
                                <?php echo $row['status']; ?>
                            </h6>
                            <small class="float-right mt-1 fw-bold"><?php echo $row['postingDate']; ?></small>
                            <div class="d-inline-block w-100 fw-bold">
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
</body>

</html>