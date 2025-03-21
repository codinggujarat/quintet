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
        padding: 20px;
        color: #000 !important;
    }

    .card {
        width: 600px;
        background-color: white !important;
    }

    .card-head h5 {
        width: 100%;
        text-align: center;
        padding: 20px;
        color: #000;
        font-weight: bold !important;
        font-size: 20px;
        text-transform: capitalize;
    }

    .field-title {
        color: #000;
        font-weight: bold !important;
        font-size: 13px;
        margin-bottom: 10px;
    }

    @media (max-width: 600px) {
        .center_Div {
            position: relative;
        }
    }
    </style>
</head>

<body class="bg-black">

    <div class="center_Div ">
        <div class="wrapper ">
            <div class="container mt-5 ">
                <form name="updateticket" id="updateticket" method="post" class="mt-5">
                    <div class="row ">
                        <div class="col-lg-12 card">
                            <div class="card-head">
                                <h5>Cancel Order ! </h5>
                            </div>
                            <div class="card-body">
                                <h3 class="field-title"> order ID:
                                    <?php echo $oid; ?>
                                </h3>
                                <?php
                                    $st = 'In Transit';
                                    $rt = mysqli_query($con, "SELECT * FROM orders WHERE id='$oid'");
                                    while ($num = mysqli_fetch_array($rt)) {
                                        $currrentSt = $num['orderStatus'];
                                    }
                                    if ($st == $currrentSt) { ?>
                                <div class="form-field">
                                    <h3 class="field-title">
                                        Your order is in transit and cannot be canceled at this stage.
                                    </h3>
                                </div>
                                <?php } else {
                                    ?>

                                <div class="form-field">
                                    <h3 class="field-title">order status:</h3>
                                    <input type="text" class="black-bg" value="cancelled" name="status" readonly>

                                </div>

                                <div class="form-field">
                                    <h3 class="field-title">Select a reason for cancellation:</h3>
                                    <input type="radio" id="one" name="remark" required value="Changed my mind">
                                    <label for="one" class="box first">
                                        <div class="plan">
                                            <span class="circle"></span>
                                            <span class="yearly"
                                                style="text-transform: uppercase;font-family: 'Raleway',sans-serif;color:black; font-weight: bold !important;">Changed
                                                my mind</span>
                                        </div>
                                    </label>
                                    <input type="radio" id="two" name="remark" required value="Ordered by mistake">
                                    <label for="two" class="box second ">
                                        <div class="plan">
                                            <span class="circle"></span>
                                            <span class="yearly"
                                                style="text-transform: uppercase; font-family: 'Raleway',sans-serif; font-weight: bold !important;">Ordered
                                                by mistake</span>
                                        </div>
                                    </label>


                                    <input type="radio" name="remark" required id="three"
                                        value="Found a better price elsewhere">
                                    <label for="three" class="box  third">
                                        <div class="plan">
                                            <span class="circle"></span>
                                            <span class="yearly"
                                                style="text-transform: uppercase;font-family: 'Raleway',sans-serif;color:black; font-weight: bold !important;">Found
                                                a better price elsewhere</span>
                                        </div>
                                    </label>

                                    <input type="radio" id="forths" name="remark" required
                                        value="Delivery is taking too long">
                                    <label for="forths" class="box  forth">
                                        <div class="plan">
                                            <span class="circle"></span>
                                            <span class="yearly"
                                                style="text-transform: uppercase;font-family: 'Raleway',sans-serif;color:black; font-weight: bold !important;">Delivery
                                                is taking too long</span>
                                        </div>
                                    </label>
                                    <input type="radio" id="fifths" name="remark" required
                                        value="Incorrect item ordered">
                                    <label for="fifths" class="box  fifth">
                                        <div class="plan">
                                            <span class="circle"></span>
                                            <span class="yearly" style="text-transform: uppercase;font-family: 'Raleway',sans-serif;color:black; 
        font-weight: bold !important;
                                                ">Incorrect
                                                item ordered</span>
                                        </div>
                                    </label>
                                    <input type="radio" id="sixs" name="remark" required value="Item no longer needed">
                                    <label for="sixs" class="box  six">
                                        <div class="plan">
                                            <span class="circle"></span>
                                            <span class="yearly" style="text-transform: uppercase;font-family: 'Raleway',sans-serif;color:black; 
        font-weight: bold !important;
                                                ">Item
                                                no longer needed</span>
                                        </div>
                                    </label>
                                    <input type="radio" id="sevens" name="remark" required value="Payment issue">
                                    <label for="sevens" class="box  seven">
                                        <div class="plan">
                                            <span class="circle"></span>
                                            <span class="yearly" style="text-transform: uppercase;font-family: 'Raleway',sans-serif;color:black; 
        font-weight: bold !important;
                                                ">Payment
                                                issue</span>
                                        </div>
                                    </label>
                                    <input type="radio" id="eights" name="remark" required
                                        value="Found a different product">
                                    <label for="eights" class="box  eight">
                                        <div class="plan">
                                            <span class="circle"></span>
                                            <span class="yearly" style="text-transform: uppercase;font-family: 'Raleway',sans-serif;color:black; 
        font-weight: bold !important;
                                                ">Found
                                                a different product</span>
                                        </div>
                                    </label>
                                    <input type="radio" id="nines" name="remark" required
                                        value="Customer service issue">
                                    <label for="nines" class="box  nine">
                                        <div class="plan">
                                            <span class="circle"></span>
                                            <span class="yearly" style="text-transform: uppercase;font-family: 'Raleway',sans-serif;color:black; 
        font-weight: bold !important;
                                                ">Customer
                                                service issue</span>
                                        </div>
                                    </label>
                                    <input type="radio" id="tens" name="remark" required value="Other">
                                    <label for="tens" class="box ten">
                                        <div class="plan">
                                            <span class="circle"></span>
                                            <span class="yearly"
                                                style="text-transform: uppercase;font-family: 'Raleway',sans-serif;color:black; font-weight: bold !important;">other</span>
                                        </div>
                                    </label>

                                </div>

                                <div class="form-field">
                                    <input type="submit" name="submit2" value="cancel" class="txtbox4" size="40"
                                        style="cursor: pointer;" />
                                </div>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');





    .card label.box {
        background: white;
        margin-top: 12px;
        padding: 4px 6px;
        display: flex;
        border-radius: 5px;
        border: 2px solid lightgray;
        color: #000;
        font-weight: bold !important;
        font-size: 13px;
        cursor: pointer;
        transition: all 0.25s ease;
    }

    #one:checked~label.first,
    #two:checked~label.second,
    #three:checked~label.third,
    #forths:checked~label.forth,
    #fifths:checked~label.fifth,
    #sixs:checked~label.six,
    #sevens:checked~label.seven,
    #eights:checked~label.eight,
    #nines:checked~label.nine,
    #tens:checked~label.ten {
        border-color: black;

        background: whitesmoke;
    }

    .card label.box:hover {
        background: whitesmoke;
    }

    .card label.box .circle {
        height: 10px;
        width: 10px;
        background: #ccc;
        border: 5px solid transparent;
        display: inline-block;
        margin-right: 15px;
        border-radius: 50%;
        transition: all 0.25s ease;
        box-shadow: inset -4px -4px 10px rgba(0, 0, 0, 0.2);
    }

    #one:checked~label.first .circle,
    #two:checked~label.second .circle,
    #three:checked~label.third .circle,
    #forths:checked~label.forth .circle,
    #fifths:checked~label.fifth .circle,
    #sixs:checked~label.six .circle,
    #sevens:checked~label.seven .circle,
    #eights:checked~label.eight .circle,
    #nines:checked~label.nine .circle,
    #tens:checked~label.ten .circle {
        border-color: black;
        background: #fff;
    }



    .card label.box .plan {
        color: #000;
        display: flex;
        width: 100%;
        align-items: center;
        font-family: 'Chillax', sans-serif;
        font-weight: bold !important;

    }

    .card input[type="radio"] {
        display: none;
    }
    </style>

    <style>
    .form-field .black-bg {
        background: #000;
        width: 100%;
        color: #fff;
        text-transform: uppercase !important;
    }

    .form-field {
        width: 100%;
        margin-top: 10px;
    }

    .txtbox4 {
        background-color: #000;
        color: #fff;
        text-transform: uppercase !important;
        padding: 10px;
        width: 100%;
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
        font-size: 13px;
        font-weight: bold !important;
        font-family: 'Chillax', sans-serif;

    }

    label {
        width: 100%;
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