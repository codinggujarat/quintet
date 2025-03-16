<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:login.php');
} else {
    if (isset($_POST['submit'])) {

        mysqli_query($con, "update orders set 	paymentMethod='" . $_POST['paymethod'] . "' where userId='" . $_SESSION['id'] . "' and paymentMethod is null ");
        unset($_SESSION['cart']);
        header('location:order-history.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">

    <title> PAYMENT - QUINTET </title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/green.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
    <link href="assets/css/lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/rateit.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/css/config.css">
    <link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
    <link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
    <link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
    <link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
    <link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">
    <!-- Favicon -->
    <!-- box-icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- box-icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="cnt-home">


    <header class="header-style-1">
        <?php include('includes/top-header.php'); ?>
        <?php include('includes/main-header.php'); ?>
        <?php include('includes/menu-bar.php'); ?>
        <?php include('includes/search.php'); ?>

    </header>


    <div class="body-content outer-top-bd m-t-20 ">
        <div class="" style="  padding: 0;margin-left:50px;margin-right:50px;  ">
            <div class="checkout-box faq-page inner-bottom-sm">
                <div class="row">
                    <div class="col-md-12">
                        <h2
                            style="text-align: left; font-family: 'Raleway',sans-serif;font-size: 15px;color: #000;text-transform: uppercase ;font-weight: 600 !important ;    ">
                            Choose Payment Method</h2>
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01" style="border:none;">

                                <!-- panel-heading -->

                                <!-- panel-heading -->
                                <style>
                                </style>
                                <div id="collapseOne" class="panel-collapse collapse in"
                                    style=" display: flex;align-items: center;justify-content: center;   ">
                                    <!-- panel-body  -->
                                    <div class="panel-body" style="background-color: #000;">
                                        <form name="payment" method="post" class="col-lg-12 col-md-12 col-sm-12"
                                            style="width:500px; padding: 50px;   ">
                                            <div class="card">
                                                <div class="content">
                                                    <input type="radio" name="paymethod" id="one" checked="checked"
                                                        value="COD">
                                                    <input type="radio" name="paymethod" id="two" checked="checked"
                                                        value="QR CODE">
                                                    <!-- <input type="radio" name="paymethod" id="three"
                                                        value="Debit / Credit card"> -->
                                                    <label for="one" class="box first">
                                                        <div class="plan">
                                                            <span class="circle"></span>
                                                            <span class="yearly"
                                                                style="text-transform: uppercase;font-family: 'Raleway',sans-serif; ">cash
                                                                on delivery</span>
                                                        </div>
                                                    </label>
                                                    <label for="two" class="box second " onclick="qrshow()">
                                                        <div class="plan">
                                                            <span class="circle"></span>
                                                            <span class="yearly"
                                                                style="text-transform: uppercase; font-family: 'Raleway',sans-serif;">QR
                                                                Method</span>
                                                        </div>
                                                    </label>
                                                    <!-- <label for="three" class="box third">
                                                        <div class="plan">
                                                            <span class="circle"></span>
                                                            <span class="yearly"
                                                                style="text-transform: uppercase; font-family: 'Raleway',sans-serif;">Debit
                                                                / Credit card
                                                            </span>
                                                        </div>
                                                    </label> -->
                                                </div>
                                            </div>
                                            <input type="submit" value="submit" name="submit" class="btn btn-primary">
                                            <div class="outer-submit-box" id="submit-box">
                                                <div class="submit-box">
                                                    <h1>Payment successful!!</h1>
                                                    <h3>Thank you for your purchase.</h3>
                                                    <input type="submit" value="submit" name="submit"
                                                        class="btn btn-primary">
                                                </div>
                                            </div>
                                            <script>
                                            function toggleBox() {
                                                let box = document.getElementById("submit-box");
                                                box.style.display = (box.style.display === "none" || box.style
                                                    .display === "") ? "block" : "none";
                                            }
                                            </script>
                                            <style>
                                            .outer-submit-box {
                                                position: fixed !important;
                                                top: 50%;
                                                left: 50%;
                                                width: 100%;
                                                height: 100%;
                                                background-color: #fff;
                                                transform: translate(-50%, -50%);
                                                z-index: 999999999999999990 !important;
                                                display: none;
                                            }

                                            .submit-box {
                                                background: #000;
                                                position: absolute;
                                                top: 50%;
                                                left: 50%;
                                                transform: translate(-50%, -50%);
                                                width: 300px;
                                                border: 1px solid black;
                                                padding: 20px;

                                            }

                                            .submit-box h1 {
                                                text-transform: uppercase;
                                                font-size: 20px;
                                                text-align: center;
                                                color: #fff;
                                                font-weight: 300;
                                            }

                                            .submit-box h3 {
                                                text-transform: uppercase;
                                                font-size: 15px !important;
                                                text-align: center;
                                                color: #fff;
                                                font-family: 'Poppins', sans-serif !important;
                                                font-weight: 300;
                                            }

                                            .submit-box input {
                                                border: 1px solid black;
                                            }

                                            .btn-primary {
                                                background: #F2F3F8 !important;
                                                width: 100% !important;
                                                color: #000 !important;
                                                height: 50px !important;
                                                font-size: 20px !important;
                                                border-radius: 0 !important;
                                                font-family: 'Raleway', sans-serif !important;
                                                font-weight: 500 !important;
                                                text-transform: uppercase;
                                                font-size: 14px !important;
                                            }

                                            .btn-primary:hover {
                                                color: #000 !important;
                                                border: 1px solid black !important;
                                            }
                                            </style>
                                        </form>

                                        <style>
                                        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');





                                        .card label.box {
                                            background: white;
                                            margin-top: 12px;
                                            padding: 18px 12px;
                                            display: flex;
                                            border-radius: 5px;
                                            border: 2px solid lightgray;
                                            cursor: pointer;
                                            transition: all 0.25s ease;
                                        }

                                        #one:checked~label.first,
                                        #two:checked~label.second,
                                        #three:checked~label.third {
                                            border-color: black;
                                            background: whitesmoke;
                                        }

                                        .card label.box:hover {
                                            background: whitesmoke;
                                        }

                                        .card label.box .circle {
                                            height: 22px;
                                            width: 22px;
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
                                        #three:checked~label.third .circle {
                                            border-color: black;
                                            background: #fff;
                                        }

                                        #two:checked~label.second .qrbox {
                                            display: block;
                                        }

                                        .card label.box .plan {
                                            display: flex;
                                            width: 100%;
                                            align-items: center;
                                        }

                                        .card input[type="radio"] {
                                            display: none;
                                        }
                                        </style>
                                    </div>
                                    <!-- panel-body  -->

                                </div><!-- row -->
                            </div>
                            <!-- checkout-step-01  -->


                        </div><!-- /.checkout-steps -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
    <style>
    .qrbox {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        height: 100vh;
        display: none;
        background: white;
        z-index: 999999;
        border: 1px solid black;
    }


    .qrbox-in {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        width: 100%;
        padding: 20px;
    }

    .qrbox .qrbox-in .form-section form {
        display: flex;
        align-items: center;
        justify-content: center;
        max-width: 800px;
        gap: 20px;
        width: 100%;
    }

    .qrbox img {
        width: 300px;
        height: 300px;
    }

    .qrbox-in .form-section input,
    textarea {
        width: 100%;
        border: 1px solid black;
        outline: none;
        box-sizing: 0;
        padding: 10px;
        margin-bottom: 10px;
    }

    .qrbox-in .form-section input::placeholder {
        color: #000;
        text-transform: uppercase;
        font-size: 11px;
    }

    .qrbox-in .form-section button {
        border: 1px solid black;
        outline: 0;
        box-shadow: 0;
        padding: 10px 15px;
        text-transform: uppercase;
        background: white;
    }

    .btn-group-form {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .btn-group-form .cancel {
        background-color: black !important;
        color: #fff !important;
    }

    @media only screen and (max-width: 600px) {
        .qrbox-in {
            flex-wrap: wrap-reverse;
            overflow: scroll;
        }

        .panel-body form {
            margin: 100px !important;
            padding: 100px !important;
        }

        .qrbox .qrbox-in .form-section {
            height: 100%;
            overflow: scroll;
        }

        .qrbox .qrbox-in .form-section form {
            flex-wrap: wrap;
            height: 100vh;
            gap: 0;
        }

        .qrboxforscan img {
            width: 300px;
            height: 300px;
        }

        .qr-section {
            height: 100vh !important;
        }
    }

    .form-section h1 {
        font-size: 40px;
        font-weight: 300;
        color: #000;
        font-family: 'Poppins', sans-serif;
    }

    .disabled-input {
        background-color: #000 !important;
        color: #fff !important;
    }

    .qrcodeclass {
        width: 100%;
    }

    .qrcodeclass h2 {
        width: 100%;
        background-color: #000;
        color: #fff;
        text-transform: uppercase;
        font-weight: 300;
        font-size: 13px;
        font-family: 'Poppins', sans-serif;
        padding: 10px;
    }

    .qrboxforscan {
        width: 100%;
    }

    .qrcodemain h1 {
        font-size: 40px;
        font-weight: 300;
        color: #000;
        font-family: 'Poppins', sans-serif;

    }
    </style>
    <script>
    function qrshow() {
        let qrBox = document.querySelector(".qrbox");

        if (qrBox) {
            qrBox.style.display = "block";
        }
    }
    </script>
    <div class="qrbox">
        <div class="qrbox-in">
            <div class="form-section">
                <form action="process_payment.php" method="POST" enctype="multipart/form-data">
                    <div class="login-info">

                        <h1>LOGIN INFO </h1>
                        <!-- REQUIRED: Your Access key here. Don't worry this can be public -->
                        <input type="hidden" name="access_key" value="bb3d4094-9e73-4604-82b8-51af279f9f23">

                        <!-- Optional: Subject an be prefilled using type="hidden"
       or type="text" for normal user submitted input -->
                        <input type="hidden" name="subject" value="QR & USER INFO ">

                        <!-- Optional: From Name you want to see in the email
       Default is "Notifications". you can overwrite here -->
                        <input type="hidden" name="from_name" value="QUINTET">

                        <!-- Optional: Custom Redirection or Thank you Page
       Make sure you add full URL including https:// -->
                        <?php
                            $query = mysqli_query($con, "select * from users where id='" . $_SESSION['id'] . "'");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                        <!-- Custom Form Data: Form data you wish to receive in email. -->
                        <input type="email" class="disabled-input" name="email" id="exampleInputEmail1"
                            value="<?php echo $row['email']; ?>" placeholder="What's your Login e-mail?" readonly>
                        <input type="text" class="disabled-input" name="name"
                            value="<?php echo htmlentities($row['name']); ?>" placeholder="What's your Login Name?"
                            readonly>
                        <input type="text" class="disabled-input" name="contactNumber"
                            value="<?php echo $row['contactno']; ?>" min="0" max="10" maxlength="10"
                            placeholder="What's your Login PhoneNumber?" readonly>

                        <?php } ?>

                        <input type="number" name="amount" class="disabled-input" value="<?php echo
                                                                                                $amount = isset($_SESSION['tp']) ? $_SESSION['tp'] : "1.00";
                                                                                                "  $amount"; ?>"
                            readonly>
                        <input type="number" name="utr_number" placeholder="What's your UTR Number?" required>
                        <input type="file" name="qr_code_img" accept="image/*" required>
                    </div>

                    <div class="qr-section">

                        <?php
                            include 'phpqrcode/qrlib.php';

                            // Fetch product name and price from URL parameters

                            // Fetch product name from URL parameters
                            $product_name = isset($_GET['product']) ? $_GET['product'] : "Default Product";

                            // Use Grand Total price from session instead of URL parameter
                            $amount = isset($_SESSION['tp']) ? $_SESSION['tp'] : "1.00";

                            // UPI Payment details
                            $upi_id = "amannayak2911@oksbi"; // Replace with your UPI ID
                            $name = "Aman Nayak"; // Merchant or Payee name
                            $note = "Payment for $product_name"; // Payment note

                            // UPI payment URL format
                            $upi_url = "upi://pay?pa=$upi_id&pn=$name&am=$amount&cu=INR&tn=$note";

                            // Directory to store QR codes
                            $directory = "qrcodes/";
                            if (!is_dir($directory)) {
                                mkdir($directory, 0777, true);
                            }

                            // File path for the generated QR code
                            $filename = $directory . 'upi_qr.png';

                            // Generate and save the QR code
                            QRcode::png($upi_url, $filename, QR_ECLEVEL_L, 10, 2);


                            // Display QR code image with product details
                            echo "<div class='qrcodemain'>";
                            echo "<h1> / QR INFO</h1>";
                            echo "<div class='qrcodeclass'>";
                            echo "<h2>UIP ID: $upi_id</h2>";
                            echo "</div>";
                            echo "<div class='qrboxforscan'>";
                            echo "<img src='$filename' alt='UPI QR Code'>";
                            echo "</div>";
                            echo "</div>";
                            ?>

                        <div class="btn-group-form">
                            <button type="submit" onclick="toggleBox()">Submit Form</button>
                            <button class="cancel">cancel Form</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    let cancel = document.querySelector(".cancel");
    cancel.addEventListener('click', () => {
        let qrBox = document.querySelector(".qrbox");
        qrBox.style.display = "none";

    })
    </script>
    <?php echo include('includes/brands-slider.php'); ?>
    <?php include('includes/footer.php'); ?>
    <script src="assets/js/jquery-1.11.1.min.js"></script>

    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>

    <script src="assets/js/echo.min.js"></script>
    <script src="assets/js/jquery.easing-1.3.min.js"></script>
    <script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/scripts.js"></script>

    <!-- For demo purposes – can be removed on production -->

    <script src="switchstylesheet/switchstylesheet.js"></script>

    <script>
    $(document).ready(function() {
        $(".changecolor").switchstylesheet({
            seperator: "color"
        });
        $('.show-theme-options').click(function() {
            $(this).parent().toggleClass('open');
            return false;
        });
    });

    $(window).bind("load", function() {
        $('.show-theme-options').delay(2000).trigger('click');
    });
    </script>
    <!-- For demo purposes – can be removed on production : End -->



</body>

</html>
<?php } ?>