<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['submit'])) {
    if (!empty($_SESSION['cart'])) {
        foreach ($_POST['quantity'] as $key => $val) {
            if ($val == 0) {
                unset($_SESSION['cart'][$key]);
            } else {
                $_SESSION['cart'][$key]['quantity'] = $val;
            }
        }
        echo "<script>alert('Your Cart hasbeen Updated');</script>";
    }
}
// Code for Remove a Product from Cart
if (isset($_POST['remove_code'])) {

    if (!empty($_SESSION['cart'])) {
        foreach ($_POST['remove_code'] as $key) {

            unset($_SESSION['cart'][$key]);
        }
    }
}
// code for insert product in order table


if (isset($_POST['ordersubmit'])) {

    if (strlen($_SESSION['login']) == 0) {
        header('location:login.php');
    } else {

        $quantity = $_POST['quantity'];
        $pdd = $_SESSION['pid'];
        $value = array_combine($pdd, $quantity);


        foreach ($value as $qty => $val34) {



            mysqli_query($con, "insert into orders(userId,productId,quantity) values('" . $_SESSION['id'] . "','$qty','$val34')");
            header('location:payment-method.php');
        }
    }
}

// code for billing address updation
if (isset($_POST['update'])) {
    $baddress = $_POST['billingaddress'];
    $bstate = $_POST['bilingstate'];
    $bcity = $_POST['billingcity'];
    $bpincode = $_POST['billingpincode'];
    $query = mysqli_query($con, "update users set billingAddress='$baddress',billingState='$bstate',billingCity='$bcity',billingPincode='$bpincode' where id='" . $_SESSION['id'] . "'");
    if ($query) {
        echo "<script>alert('Billing Address has been updated');</script>";
    }
}


// code for Shipping address updation
if (isset($_POST['shipupdate'])) {
    $saddress = $_POST['shippingaddress'];
    $sstate = $_POST['shippingstate'];
    $scity = $_POST['shippingcity'];
    $spincode = $_POST['shippingpincode'];
    $query = mysqli_query($con, "update users set shippingAddress='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPincode='$spincode' where id='" . $_SESSION['id'] . "'");
    if ($query) {
        echo "<script>alert('Shipping Address has been updated');</script>";
    }
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

    <title>Cart - QUINTET</title>
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

    <!-- Demo Purpose Only. Should be removed in production -->
    <link rel="stylesheet" href="assets/css/config.css">

    <link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
    <link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
    <link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
    <link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
    <link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
    <!-- Demo Purpose Only. Should be removed in production : END -->

    <!-- box-icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">
    <!-- Favicon -->

    <!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
    <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.js"></script>
            <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="cnt-home">



    <!-- ============================================== HEADER ============================================== -->
    <header class="header-style-1">
        <?php include('includes/top-header.php'); ?>
        <?php include('includes/main-header.php'); ?>
        <?php include('includes/menu-bar.php'); ?>
    </header>

    <?php include('includes/search.php'); ?>

    <div class="body-content outer-top-xs">
        <div class="" style="  padding: 0;margin-left:0px;margin-right:0;  ">
            <div class="">
                <div class="">
                    <div class=" shopping-cart-table " style="width: 100%;">
                        <h1 style=" font-family: 'Poppins' ,sans-serif;font-size: 14px !important ;color:
                                #000;text-transform: uppercase ;font-weight: 400 !important ;">
                            shopping bag
                            <i class='bx bx-shopping-bag'
                                style="font-size: 15px ;color:black ;   margin-left: 10px; "></i>
                        </h1>
                        <div class=" table-responsive">
                            <form name="cart" method="post">
                                <?php
                                if (!empty($_SESSION['cart'])) {
                                ?>

                                <style>
                                @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100..900;1,100..900&display=swap');

                                .item,
                                .last-item {
                                    font-size: 12px !important;
                                    color: #000;
                                    text-transform: uppercase;
                                    font-weight: normal;
                                    border: 0 !important;
                                    font-family: 'Poppins', sans-serif !important;
                                }

                                .form-group input,
                                .form-group textarea {
                                    border: 2px solid gray;
                                }

                                .form-group input:focus,
                                .form-group textarea:focus {
                                    border: 2px solid black !important;
                                }

                                .shopping-cart-btn {
                                    width: 100% !important;
                                    display: flex !important;
                                    align-items: center !important;
                                    justify-content: space-between !important;
                                    position: fixed !important;
                                    z-index: 99999999 !important;
                                    right: 0 !important;
                                    bottom: 0 !important;

                                }

                                .cart-btns {
                                    position: absolute;
                                    bottom: 0;
                                    width: 100%;
                                    background-color: #F2F3F8 !important;
                                    padding: 0 20px;

                                }
                                </style>


                                <div class="shopping-cart-btn">

                                    <div class="cart-btns">
                                        <span class=""
                                            style="font-family: 'Poppins', sans-serif !important;display: flex;align-items: center;justify-content: space-between;   ">
                                            <a href="index.php" class="btn  border-0"
                                                style="border-radius: 0  !important;font-weight: 400 !important;color:white !important ;padding: 10px 20px !important; font-size:15px !important; background: #000 !important;">Continue
                                                Shopping</a>
                                            <input type="submit" name="submit"
                                                style="text-transform: uppercase;font-weight: 400 !important;border-radius: 0  !important;color:white !important ;padding: 10px 20px !important; font-size:15px !important; background: #000 !important;"
                                                value="Update shopping cart" class="btn ">
                                        </span>
                                    </div>
                                </div><!-- /.shopping-cart-btn -->

                                <?php
                                    $pdtid = array();
                                    $sql = "SELECT * FROM products WHERE id IN(";
                                    foreach ($_SESSION['cart'] as $id => $value) {
                                        $sql .= $id . ",";
                                    }
                                    $sql = substr($sql, 0, -1) . ") ORDER BY id ASC";
                                    $query = mysqli_query($con, $sql);
                                    $totalprice = 0;
                                    $totalqunty = 0;
                                    if (!empty($query)) {
                                        while ($row = mysqli_fetch_array($query)) {
                                            $quantity = $_SESSION['cart'][$row['id']]['quantity'];
                                            $subtotal = $_SESSION['cart'][$row['id']]['quantity'] * $row['productPrice'] + $row['shippingCharge'];
                                            $totalprice += $subtotal;
                                            $_SESSION['qnty'] = $totalqunty += $quantity;

                                            array_push($pdtid, $row['id']);
                                            //print_r($_SESSION['pid'])=$pdtid;exit;
                                    ?>


                                <?php }
                                    }
                                    $_SESSION['pid'] = $pdtid;
                                    ?>


                        </div>
                    </div><!-- /.shopping-cart-table -->
                    <div class="mywishlistcards">
                        <?php
                                    $pdtid = array();
                                    $sql = "SELECT * FROM products WHERE id IN(";
                                    foreach ($_SESSION['cart'] as $id => $value) {
                                        $sql .= $id . ",";
                                    }
                                    $sql = substr($sql, 0, -1) . ") ORDER BY id ASC";
                                    $query = mysqli_query($con, $sql);
                                    $totalprice = 0;
                                    $totalqunty = 0;
                                    if (!empty($query)) {
                                        while ($row = mysqli_fetch_array($query)) {
                                            $quantity = $_SESSION['cart'][$row['id']]['quantity'];
                                            $subtotal = $_SESSION['cart'][$row['id']]['quantity'] * $row['productPrice'] + $row['shippingCharge'];
                                            $totalprice += $subtotal;
                                            $_SESSION['qnty'] = $totalqunty += $quantity;

                                            array_push($pdtid, $row['id']);
                                            //print_r($_SESSION['pid'])=$pdtid;exit;
                        ?>
                        <div class=" mywishlistcard">
                            <style>
                            .mywishlistcards {
                                display: grid;
                                grid-template-columns: repeat(6, 1fr);
                                grid-auto-rows: auto;
                                width: 100%;
                            }


                            @media only screen and (max-width: 800px) {
                                .mywishlistcard {
                                    justify-content: center;
                                }
                            }

                            @media only screen and (max-width: 1200px) {
                                .mywishlistcards {
                                    grid-template-columns: repeat(5, 1fr);
                                }
                            }

                            @media only screen and (max-width: 1000px) {
                                .mywishlistcards {
                                    grid-template-columns: repeat(4, 1fr);
                                }
                            }

                            @media only screen and (max-width: 550px) {

                                .mywishlistcards {
                                    grid-template-columns: repeat(2, 1fr);
                                }
                            }

                            @media only screen and (max-width: 800px) {
                                .mywishlistcards {
                                    justify-content: center !important;
                                }
                            }


                            .cart-product-sub-total {
                                display: flex;
                                align-items: center;
                                justify-content: space-between;
                            }

                            .cart-product-sub-total span {
                                font-size: 12px;
                                text-transform: uppercase;
                                font-weight: 600 !important;
                                font-family: 'Poppins', sans-serif !important;
                                color: #000 !important;
                            }

                            .mywishlistcardimage {
                                width: 100% !important;
                                height: 100% !important;
                                background: white !important;
                                object-fit: cover;
                            }

                            .mywishlistcardimage .entry-thumbnail img {
                                border-bottom: 1px solid black;
                            }

                            .col-card {
                                border: 1px solid black;
                                width: auto;
                                margin: 0;
                                padding: 0;

                            }

                            .product-name {
                                width: 80% !important;
                                overflow: hidden !important;
                                text-overflow: ellipsis !important;
                                white-space: nowrap !important;
                            }

                            .cart-product-sub-total {
                                padding-left: 10px;
                                padding-right: 10px;
                            }

                            .arrows {
                                display: flex;
                                align-items: center;
                                justify-content: space-between;
                                width: 150px;
                            }

                            .quantity {
                                position: absolute;
                                top: 0;
                                width: 30px;
                                height: 30px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                margin-left: 60px;

                            }

                            .plus,
                            .minus {
                                border: 1px solid black;
                                padding: 4px;
                                width: 50px;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                height: 30px;
                                cursor: pointer;
                            }

                            .quant-input input {
                                padding-left: 10px !important;
                            }
                            </style>
                            <div class="col-card">
                                <div class="mywishlistcardimage">
                                    <a class="entry-thumbnail"
                                        href="product-details.php?pid=<?php echo htmlentities($pd = $row['id']); ?>">
                                        <img src="admin/productimages/<?php echo $row['id']; ?>/<?php echo $row['productImageSix']; ?>"
                                            alt="" width="100%" height="100%">
                                    </a>
                                </div>
                                <div class="mywishlistcardimage">
                                    <div class="" style="position: relative;">
                                        <h4 class='cart-product-description product-name' style="padding-left: 10px;"><a
                                                style=" font-size: 12px; font-family: sans-serif, ' Poppins' !important;"
                                                href="product-details.php?pid=<?php echo htmlentities($pd = $row['id']); ?>"><?php echo $row['productName'];
                                                                                                                                        $_SESSION['sid'] = $pd;
                                                                                                                                        ?></a>
                                        </h4>

                                        <div class="mywishlistcardimage" style="padding-left: 10px;">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="rating rateit-small"></div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <?php $rt = mysqli_query($con, "select * from productreviews where productId='$pd'");
                                                            $num = mysqli_num_rows($rt); {
                                                            ?>
                                                    <div class="reviews" style="color:black;">
                                                        ( <?php echo htmlentities($num); ?> Reviews )
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div><!-- /.row -->
                                        </div>
                                        <div class="mywishlistcardimage"
                                            style="padding-left: 10px;padding-right: 10px;">
                                            <div class="quant-input" style="position: relative;">
                                                <div class="arrows">
                                                    <div class="arrow plus gradient">
                                                        <span class="ir">
                                                            <i class="icon fa fa-plus"></i>
                                                        </span>
                                                    </div>
                                                    <div class="arrow minus gradient">
                                                        <span class="ir">
                                                            <i class="icon fa fa-minus"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <input type="text" style="border: 1px solid black;" class="quantity"
                                                    value="<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>"
                                                    name="quantity[<?php echo $row['id']; ?>]">
                                            </div>
                                        </div>

                                        <div class="mywishlistcardimage">
                                            <h4 class="cart-product-sub-total">
                                                <span>
                                                    product size
                                                </span>
                                                <span class="cart-sub-total-price"
                                                    style=" font-family: sans-serif, ' Poppins' !important; font-size: 12px;">


                                                    <?php echo htmlentities($row['productSizes']); ?></span>
                                            </h4>
                                            <h4 class="cart-product-sub-total">
                                                <span>
                                                    product color
                                                </span>
                                                <span class="cart-sub-total-price"
                                                    style=" font-family: sans-serif, ' Poppins' !important; font-size: 12px;">
                                                    <?php echo htmlentities($row['productColor']); ?></span>
                                                <span class="color-box"
                                                    style="padding: 0; margin: 0; border: 1px solid black; width: 25px;height: 25px; background: <?php echo htmlentities($row['productColor']); ?>;  ">

                                                </span>
                                            </h4>
                                            <h4 class="cart-product-sub-total">
                                                <span>Price Per unit</span>
                                                <span class="cart-sub-total-price"
                                                    style=" font-family: sans-serif, ' Poppins' !important; font-size: 12px;">

                                                    <?php echo "Rs" . " " . $row['productPrice']; ?>.00</span>
                                            </h4>
                                            <h4 class="cart-product-sub-total">
                                                <span>
                                                    Shipping cost
                                                </span>
                                                <span class="cart-sub-total-price"
                                                    style=" font-family: sans-serif, ' Poppins' !important; font-size: 12px;">


                                                    <?php echo "Rs" . " " . $row['shippingCharge']; ?>.00</span>
                                            </h4>

                                            <h4 class="cart-product-sub-total">
                                                <span>
                                                    Total
                                                </span>
                                                <span class="cart-grand-total-price"
                                                    style=" font-family: sans-serif, ' Poppins' !important; font-size: 12px;">

                                                    <?php echo ($_SESSION['cart'][$row['id']]['quantity'] * $row['productPrice'] + $row['shippingCharge']); ?>.00</span>
                                            </h4>
                                        </div>
                                        <div class="mywishlistcardimage">
                                            <style>
                                            .switch {
                                                position: relative;
                                                display: inline-block;
                                                width: 30px;
                                                height: 18px;
                                            }

                                            .switch input {
                                                display: none;
                                            }

                                            .slider {
                                                position: absolute;
                                                cursor: pointer;
                                                top: 0;
                                                left: 0;
                                                right: 0;
                                                bottom: 0;
                                                background-color: #ccc;
                                                -webkit-transition: .4s;
                                                transition: .4s;
                                            }

                                            .slider:before {
                                                position: absolute;
                                                content: "";
                                                height: 13px;
                                                width: 13px;
                                                left: 4px;
                                                bottom: 3px;
                                                background-color: white;
                                                -webkit-transition: .4s;
                                                transition: .4s;
                                            }

                                            input:checked+.slider {
                                                background-color: #000;
                                            }

                                            input:focus+.slider {
                                                box-shadow: 0 0 1px #2196F3;
                                            }

                                            input:checked+.slider:before {
                                                -webkit-transform: translateX(10px);
                                                -ms-transform: translateX(10px);
                                                transform: translateX(10px);
                                            }

                                            /* Rounded sliders */
                                            .slider.round {
                                                border-radius: 34px;
                                            }

                                            .slider.round:before {
                                                border-radius: 50%;
                                            }

                                            .favourites {
                                                position: absolute;
                                                right: 10px;
                                                top: 0;
                                                background-color: white;
                                            }
                                            </style>
                                            <div class="" style="padding:10px;background:#fff !important;display: flex;
                                align-items: center;
                                justify-content:space-between;">
                                                <div class="">
                                                    <a class="btn favourites" title="favourites"
                                                        style="border: 0px solid black;  background:#fff ;width: 0;border-radius: 0 !important ;padding: 10px 20px; font-size: 12px !important ;display: flex;align-items: center;justify-content: center; height: 30px !important ; "
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']) ?>&&action=wishlist">
                                                        <i class="fa-regular fa-bookmark"
                                                            style=" color:#000 ;font-weight: 400;"></i>
                                                        </span>
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="" style="padding: 0; margin: 0; width: 100%; border-top: 1px solid black; padding:10px;background:#fff !important;display: flex;
                                align-items: center;
                                justify-content:start;">
                                                <label class="switch">
                                                    <input type="checkbox" name="remove_code[]"
                                                        value="<?php echo htmlentities($row['id']); ?>" id="">
                                                    <span class="slider round"></span>
                                                </label>
                                                <label
                                                    style="font-family: 'Poppins', sans-serif !important;font-weight: 700;margin-left: 10px;margin-top: 5px;text-transform: uppercase;">
                                                    remove
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <?php }
                                    }
                                    $_SESSION['pid'] = $pdtid;
                        ?>
                    </div>
                    <div class="col-lg-12 "
                        style="display: flex;
                            justify-content: end;
                            align-items: center;margin-top: 40px;margin-bottom: 40px;border-top: 1px solid black;padding-top:50px;">

                        <div class="col-lg-4 col-sm-12 col-xs-12">
                            <div class="cart-grand-total"
                                style="display: flex; align-items: center;justify-content: space-between;font-family: sans-serif, 'Poppins' !important;font-size: 14px;color:
                                        #000; font-weight: 400;text-transform: uppercase  ;padding:20px;border:1px solid black; ">
                                GST
                                <span class="inner-left-md" style="font-weight: 400;text-transform: uppercase  ;">
                                    +0.18%
                                </span>
                            </div>
                            <div class="cart-grand-total"
                                style="display: flex; align-items: center;justify-content: space-between;font-family: sans-serif, 'Poppins' !important;font-size: 14px;color:
                                        #000; font-weight: 400;text-transform: uppercase  ;padding:20px;border:1px solid black; ">
                                Grand Total
                                <span class="inner-left-md"
                                    style="font-weight: 400;text-transform: uppercase  ;"><?php echo $_SESSION['tp'] = "$totalprice" . ".00"; ?></span>
                            </div>

                            <div class="cart-checkout-btn ">
                                <button type="submit" name="ordersubmit" class="btn " style="   background: #000 !important;;
                            width: 100% !important;
                            height: 50px !important;
                            font-size: 16px !important;
                            font-weight: 400; 
                            padding:10px 20px;
                            border-radius: 0 !important;color: #fff;border: 1px solid black ;  ">PROCCED TO
                                    CHEKOUT</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 col-sm-12 estimate-ship-tax">
                        <style>
                        .estimate-ship-tax {
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            height: 100%;
                            width: 50%;
                        }

                        @media only screen and (max-width: 800px) {
                            .estimate-ship-tax {
                                width: 100%;
                            }
                        }

                        .form-group input {
                            border: 2px solid black;
                            font-family: 'Poppins', sans-serif !important;
                            font-size: 15px;
                            color: #000;
                            font-weight: 400;
                            text-transform: uppercase !important;
                        }


                        .form-group input::placeholder {
                            font-family: 'Poppins', sans-serif !important;
                            font-size: 11px !important;
                            color: #000 !important;
                            font-weight: 600 !important;
                            text-transform: uppercase !important;
                        }

                        .form-group input:focus {
                            border: 2px solid black !important;
                        }

                        .checkout-page-button {
                            background: #000 !important;
                            width: 150px !important;
                            color: #fff !important;
                            height: 50px !important;
                            font-size: 14px !important;
                            border-radius: 0 !important;
                            font-family: 'Poppins', sans-serif !important;
                            font-weight: 400 !important;
                        }

                        /* .checkout-page-button:hover {} */
                        </style>



                        <table class="table    "">
                            <thead>
                                <tr>
                                    <th>
                                        <span class=""
                                            style=" font-family: 'Poppins' , sans-serif;font-size: 25px;color: #000;
                            font-weight: 400;text-transform:uppercase ; ">Billing

                                            Address</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class=" form-group">
                            <?php
                                    $query = mysqli_query($con, "select * from users where id='" . $_SESSION['id'] . "'");
                                    while ($row = mysqli_fetch_array($query)) {
                            ?>

                            <div class="form-group">
                                <label class="info-title" for="Billing Address"
                                    style="font-family: 'Poppins' , sans-serif !important;font-size: 15px;color: #000; font-weight: 400;text-transform: uppercase; ">Billing
                                    Address<span>*</span></label>
                                <textarea class=" form-control unicase-form-control text-input"
                                    style=" font-family: 'Poppins' , sans-serif !important;font-size: 15px;color: #000 ; font-weight: 400;text-transform: uppercase;  "
                                    name="billingaddress"
                                    required="required"><?php echo $row['billingAddress']; ?></textarea>
                            </div>



                            <div class="form-group">
                                <label class="info-title" for="Billing State "
                                    style="font-family: 'Poppins' , sans-serif !important;font-size: 15px;color: #000; font-weight: 400;text-transform: uppercase; ">Billing
                                    State
                                    <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="bilingstate"
                                    name="bilingstate" value="<?php echo $row['billingState']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="Billing City"
                                    style="font-family: 'Poppins' , sans-serif !important;font-size: 15px;color: #000; font-weight: 400;text-transform: uppercase; ">Billing
                                    City
                                    <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="billingcity"
                                    name="billingcity" required="required" value="<?php echo $row['billingCity']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="Billing Pincode"
                                    style="font-family: 'Poppins' , sans-serif !important;font-size: 15px;color: #000; font-weight: 400;text-transform: uppercase; ">Billing
                                    Pincode
                                    <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input"
                                    id="billingpincode" name="billingpincode" required="required"
                                    value="<?php echo $row['billingPincode']; ?>">
                            </div>


                            <button type="submit" name="update"
                                class="btn-upper btn btn-primary checkout-page-button">Update</button>

                            <?php } ?>

                    </div>

                    </td>
                    </tr>
                    </tbody><!-- /tbody -->
                    </table><!-- /table -->
                </div>

                <div class="col-md-5 col-sm-12 estimate-ship-tax">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>
                                    <span class="estimate-title"
                                        style=" font-family: 'Poppins' , sans-serif;font-size: 25px;color: #000;  font-weight: 400;text-transform:uppercase   ;  ">Shipping
                                        Address</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <?php
                                        $query = mysqli_query($con, "select * from users where id='" . $_SESSION['id'] . "'");
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>

                                        <div class="form-group">
                                            <label class="info-title" for="Shipping Address"
                                                style=" font-family: 'Poppins' , sans-serif !important;font-size: 15px;color: #000 ; font-weight: 400;text-transform: uppercase;  ">Shipping
                                                Address<span>*</span></label>
                                            <textarea class="form-control unicase-form-control text-input"
                                                name="shippingaddress"
                                                style=" font-family: 'Poppins' , sans-serif !important;font-size: 15px;color: #000 ; font-weight: 400;text-transform: uppercase;  "
                                                required="required"><?php echo $row['shippingAddress']; ?></textarea>
                                        </div>



                                        <div class="form-group">
                                            <label class="info-title" for="Billing State "
                                                style=" font-family: 'Poppins' , sans-serif !important;font-size: 15px;color: #000; font-weight: 400;text-transform: uppercase;  ">Shipping
                                                State
                                                <span>*</span></label>
                                            <input type="text" class="form-control unicase-form-control text-input"
                                                id="shippingstate" name="shippingstate"
                                                value="<?php echo $row['shippingState']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title" for="Billing City"
                                                style=" font-family: 'Poppins' , sans-serif !important;font-size: 15px;color: #000; font-weight: 400;text-transform: uppercase;  ">Shipping
                                                City
                                                <span>*</span></label>
                                            <input type="text" class="form-control unicase-form-control text-input"
                                                id="shippingcity" name="shippingcity" required="required"
                                                value="<?php echo $row['shippingCity']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title" for="Billing Pincode"
                                                style=" font-family: 'Poppins' , sans-serif !important;font-size: 15px;color: #000; font-weight: 400;text-transform: uppercase;  ">Shipping
                                                Pincode
                                                <span>*</span></label>
                                            <input type="text" class="form-control unicase-form-control text-input"
                                                id="shippingpincode" name="shippingpincode" required="required"
                                                value="<?php echo $row['shippingPincode']; ?>">
                                        </div>


                                        <button type="submit" name="shipupdate"
                                            class="btn-upper btn btn-primary checkout-page-button">Update</button>
                                        <?php } ?>


                                    </div>

                                </td>
                            </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                </div>
                <div class="col-md-12 col-sm-12 cart-shopping-total">

                    <?php } else { ?>
                    <div style="height:50vh !important ; ">
                        <div>


                            <h4 style=" font-size: 15px;font-weight: 300 !important ;color:black; text-transform:
                                        uppercase; ">
                                Your shopping basket is empty
                            </h4>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        </form>
    </div>
    </div>
    <?php include('includes/footer.php'); ?>

    <script src=" assets/js/jquery-1.11.1.min.js"></script>

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