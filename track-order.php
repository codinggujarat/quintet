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
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border: 1px solid black;
        padding: 20px;
        text-transform: uppercase;
        font-family: 'Chillax', sans-serif;
        font-weight: lighter;
        width: 400px;
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
    </style>
</head>

<body>

    <div class="center_Div">
        <form name="updateticket" id="updateticket" method="post">
            <table width="100%">
                <tr>
                    <td colspan="2" class="fontkink2">
                        <div class="fontpink2"> Order Tracking Details !</div>
                    </td>
                </tr>

                <?php
                $ret = mysqli_query($con, "SELECT * FROM ordertrackhistory WHERE orderId='$oid'");
                $num = mysqli_num_rows($ret);
                if ($num > 0) {
                    while ($row = mysqli_fetch_array($ret)) {
                ?>
                <tr height="50">
                    <td class="fontkink1 ">order Id :</td>
                    <td class="fontkink"><?php echo $oid; ?></td>
                </tr>
                <tr height="20">
                    <td class="fontkink1">At Date :</td>
                    <td class="fontkink"><?php echo $row['postingDate']; ?></td>
                </tr>
                <tr height="20">
                    <td class="fontkink1">Status:</td>
                    <td class="fontkink statusT"><?php echo $row['status']; ?></td>
                </tr>
                <tr height="20">
                    <td class="fontkink1">Remark:</td>
                    <td class="fontkink"><?php echo $row['remark']; ?></td>
                </tr>


                <tr>
                    <td colspan="2">
                        <hr />
                    </td>
                </tr>
                <?php }
                } else {
                    ?>
                <tr>
                    <td colspan="2">Order Not Process Yet</td>
                </tr>
                <?php  }
                $st = 'Delivered';
                $rt = mysqli_query($con, "SELECT * FROM orders WHERE id='$oid'");
                while ($num = mysqli_fetch_array($rt)) {
                    $currrentSt = $num['orderStatus'];
                }
                if ($st == $currrentSt) { ?>
                <tr>
                    <td colspan="2" class="fontkink2" style="padding-left:0px;">
                        <div class="fontpink3"> Product Delivered successfully</div>
                    </td>
                </tr>
                <?php }

                ?>
            </table>
        </form>
    </div>

</body>

</html>