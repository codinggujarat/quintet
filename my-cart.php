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
        echo "<script>alert('Your Cart has been Updated');</script>";
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

    <title>My Cart</title>
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
    <link rel="shortcut icon" href="assets/images/favicon.ico">

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


    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row inner-bottom-sm">
                <div class="shopping-cart">
                    <div class="col-md-12 col-sm-12 shopping-cart-table ">
                        <h1 style=" font-family: 'Raleway' ,sans-serif;font-size: 14px !important ;color:
                                #000;text-transform: uppercase ;font-weight: 500 !important ;">
                            shopping bag
                            <i class='bx bx-shopping-bag'
                                style="font-size: 15px ;color:black ;   margin-left: 10px; "></i>
                        </h1>
                        <div class=" table-responsive">
                            <form name="cart" method="post">
                                <?php
                                if (!empty($_SESSION['cart'])) {
                                    ?>
                                <table class="table ">
                                    <thead>
                                        <style>
                                        @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');

                                        .item,
                                        .last-item {
                                            font-size: 12px !important;
                                            color: #000;
                                            text-transform: uppercase;
                                            font-weight: normal;
                                            border: 0 !important;
                                            font-family: 'Raleway', sans-serif !important;
                                        }

                                        .form-group input,
                                        .form-group textarea {
                                            border: 2px solid gray;
                                        }

                                        .form-group input:focus,
                                        .form-group textarea:focus {
                                            border: 2px solid black !important;
                                        }
                                        </style>
                                        <tr>
                                            <th class="cart-romove item">Remove</th>
                                            <th class="cart-description item">Image</th>
                                            <th class="cart-product-name item">Product Name</th>

                                            <th class="cart-qty item">Quantity</th>
                                            <th class="cart-sub-total item">Price Per unit</th>
                                            <th class="cart-sub-total item">Shipping Charge</th>
                                            <th class="cart-total last-item">Grandtotal</th>
                                        </tr>
                                    </thead><!-- /thead -->
                                    <tfoot>
                                        <tr>
                                            <td colspan="7">
                                                <div class="shopping-cart-btn">
                                                    <span class=""
                                                        style="display: flex;align-items: center;justify-content: space-between;   ">
                                                        <a href="index.php"
                                                            class="btn btn-upper outer-left-xs border-0 "
                                                            style="border-radius: 0  !important;background: #F2F3F8 !important;border: 1px solid black ;  ">Continue
                                                            Shopping</a>
                                                        <input type="submit" name="submit"
                                                            style="border-radius: 0  !important; border: 1px solid black ; "
                                                            value="Update shopping cart"
                                                            class="btn btn-upper pull-right outer-right-xs">
                                                    </span>
                                                </div><!-- /.shopping-cart-btn -->
                                            </td>
                                        </tr>
                                    </tfoot>
                                    <tbody>
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

                                        <tr style="border-bottom: 20px solid #fff !important; ">
                                            <td class="romove-item"><input type="checkbox" name="remove_code[]"
                                                    value="<?php echo htmlentities($row['id']); ?>" /></td>
                                            <td class="cart-image"
                                                style="width: 100px;height: 100px; background:#f2f3f8 ;  ">
                                                <a class="entry-thumbnail" href="detail.html">
                                                    <img src="admin/productimages/<?php echo $row['id']; ?>/<?php echo $row['productImage1']; ?>"
                                                        alt="" width="50px" height="50px">
                                                </a>
                                            </td>
                                            <td class="cart-product-name-info">
                                                <h4 class='cart-product-description'><a
                                                        style=" font-size: 12px; font-family: sans-serif, ' Poppins' !important;"
                                                        href="product-details.php?pid=<?php echo htmlentities($pd = $row['id']); ?>"><?php echo $row['productName'];

                                                                         $_SESSION['sid'] = $pd;
                                                                         ?></a>
                                                </h4>
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

                                            </td>
                                            <td class="cart-product-quantity">
                                                <div class="quant-input">
                                                    <div class="arrows">
                                                        <div class="arrow plus gradient"><span class="ir"><i
                                                                    class="icon fa fa-sort-asc"></i></span></div>
                                                        <div class="arrow minus gradient"><span class="ir"><i
                                                                    class="icon fa fa-sort-desc"></i></span></div>
                                                    </div>
                                                    <input type="text" style="border: 1px solid black;"
                                                        value="<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>"
                                                        name="quantity[<?php echo $row['id']; ?>]">

                                                </div>
                                            </td>
                                            <td class="cart-product-sub-total"><span class="cart-sub-total-price"
                                                    style=" font-family: sans-serif, ' Poppins' !important; font-size: 12px;"><?php echo "Rs" . " " . $row['productPrice']; ?>.00</span>
                                            </td>
                                            <td class="cart-product-sub-total"><span class="cart-sub-total-price"
                                                    style=" font-family: sans-serif, ' Poppins' !important; font-size: 12px;"><?php echo "Rs" . " " . $row['shippingCharge']; ?>.00</span>
                                            </td>

                                            <td class="cart-product-grand-total"><span class="cart-grand-total-price"
                                                    style=" font-family: sans-serif, ' Poppins' !important; font-size: 12px;"><?php echo ($_SESSION['cart'][$row['id']]['quantity'] * $row['productPrice'] + $row['shippingCharge']); ?>.00</span>
                                            </td>
                                        </tr>

                                        <?php }
                                            }
                                            $_SESSION['pid'] = $pdtid;
                                            ?>

                                    </tbody><!-- /tbody -->
                                </table><!-- /table -->

                        </div>
                    </div><!-- /.shopping-cart-table -->
                    <div class="col-md-4 col-sm-12 estimate-ship-tax">
                        <style>
                        .checkout-page-button {
                            background: #F2F3F8 !important;
                            width: 100% !important;
                            color: #000 !important;
                            height: 50px !important;
                            font-size: 15px !important;
                            border-radius: 0 !important;
                            font-family: 'Raleway', sans-serif !important;
                            font-weight: 400 !important;
                        }

                        .checkout-page-button:hover {
                            color: #000 !important;
                            border: 1px solid black !important;
                        }
                        </style>
                        <table class="table     ">
                            <thead>
                                <tr>
                                    <th>
                                        <span class=""
                                            style=" font-family: 'Raleway' , sans-serif;font-size: 30px;color: #000;  font-weight: 400;text-transform: uppercase   ;  ">Shipping
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
                                                <label class="info-title" for="Billing Address"
                                                    style="font-family: 'Raleway' , sans-serif;font-size: 17px;color: #000;text-transform: uppercase;">Billing
                                                    Address<span>*</span></label>
                                                <textarea class=" form-control unicase-form-control text-input"
                                                    name="billingaddress"
                                                    required="required"><?php echo $row['billingAddress']; ?></textarea>
                                            </div>



                                            <div class="form-group">
                                                <label class="info-title" for="Billing State "
                                                    style="font-family: 'Raleway' , sans-serif;font-size: 17px;color: #000;text-transform: uppercase;">Billing
                                                    State
                                                    <span>*</span></label>
                                                <input type="text" class="form-control unicase-form-control text-input"
                                                    id="bilingstate" name="bilingstate"
                                                    value="<?php echo $row['billingState']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title" for="Billing City"
                                                    style="font-family: 'Raleway' , sans-serif;font-size: 17px;color: #000;text-transform: uppercase;">Billing
                                                    City
                                                    <span>*</span></label>
                                                <input type="text" class="form-control unicase-form-control text-input"
                                                    id="billingcity" name="billingcity" required="required"
                                                    value="<?php echo $row['billingCity']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title" for="Billing Pincode"
                                                    style="font-family: 'Raleway' , sans-serif;font-size: 17px;color: #000;text-transform: uppercase;">Billing
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

                    <div class="col-md-4 col-sm-12 estimate-ship-tax">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="estimate-title"
                                            style=" font-family: 'Raleway' , sans-serif;font-size: 30px;color: #000;  font-weight: 400;text-transform: uppercase   ;  ">Shipping
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
                                                    style=" font-family: 'Raleway' , sans-serif;font-size: 17px;color: #000;text-transform: uppercase; ">Shipping
                                                    Address<span>*</span></label>
                                                <textarea class="form-control unicase-form-control text-input"
                                                    name="shippingaddress"
                                                    required="required"><?php echo $row['shippingAddress']; ?></textarea>
                                            </div>



                                            <div class="form-group">
                                                <label class="info-title" for="Billing State "
                                                    style=" font-family: 'Raleway' , sans-serif;font-size: 17px;color: #000;text-transform: uppercase; ">Shipping
                                                    State
                                                    <span>*</span></label>
                                                <input type="text" class="form-control unicase-form-control text-input"
                                                    id="shippingstate" name="shippingstate"
                                                    value="<?php echo $row['shippingState']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title" for="Billing City"
                                                    style=" font-family: 'Raleway' , sans-serif;font-size: 17px;color: #000;text-transform: uppercase; ">Shipping
                                                    City
                                                    <span>*</span></label>
                                                <input type="text" class="form-control unicase-form-control text-input"
                                                    id="shippingcity" name="shippingcity" required="required"
                                                    value="<?php echo $row['shippingCity']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title" for="Billing Pincode"
                                                    style=" font-family: 'Raleway' , sans-serif;font-size: 17px;color: #000;text-transform: uppercase; ">Shipping
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
                    <div class="col-md-4 col-sm-12 cart-shopping-total">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th style="border: 1px solid black;  ">
                                        <div class="cart-grand-total" style="display: flex; align-items: center; font-family: sans-serif, 'Poppins' !important;font-size: 14px;color:
                                        #000; font-weight: 400;text-transform: uppercase  ; ">
                                            Grand Total
                                            <span class="inner-left-md"
                                                style="font-weight: 400;text-transform: uppercase  ;"><?php echo $_SESSION['tp'] = "$totalprice" . ".00"; ?></span>
                                        </div>
                                    </th>
                                </tr>
                            </thead><!-- /thead -->
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="cart-checkout-btn ">
                                            <button type="submit" name="ordersubmit" class="btn " style="   background: #F2F3F8 !important;;
                            width: 100% !important;
                            height: 40px !important;
                            font-size: 16px !important;
                            font-weight: 400; 
                            border-radius: 0 !important;color: #000;border: 1px solid black ;  ">PROCCED TO
                                                CHEKOUT</button>

                                        </div>
                                    </td>
                                </tr>
                            </tbody><!-- /tbody -->
                        </table>
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