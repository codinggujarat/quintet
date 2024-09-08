<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_GET['action']) && $_GET['action'] == "add") {
    $id = intval($_GET['id']);
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $sql_p = "SELECT * FROM products WHERE id={$id}";
        $query_p = mysqli_query($con, $sql_p);
        if (mysqli_num_rows($query_p) != 0) {
            $row_p = mysqli_fetch_array($query_p);
            $_SESSION['cart'][$row_p['id']] = array("quantity" => 1, "price" => $row_p['productPrice']);
            echo "<script>alert('Product has been added to the cart')</script>";
            echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
        } else {
            $message = "Product ID is invalid";
        }
    }
}
$pid = intval($_GET['pid']);
if (isset($_GET['pid']) && $_GET['action'] == "wishlist") {
    if (strlen($_SESSION['login']) == 0) {
        header('location:login.php');
    } else {
        mysqli_query($con, "insert into wishlist(userId,productId) values('" . $_SESSION['id'] . "','$pid')");
        echo "<script>alert('Product aaded in wishlist');</script>";
        header('location:my-wishlist.php');
    }
}
if (isset($_POST['submit'])) {
    $qty = $_POST['quality'];
    $price = $_POST['price'];
    $value = $_POST['value'];
    $name = $_POST['name'];
    $summary = $_POST['summary'];
    $review = $_POST['review'];
    mysqli_query($con, "insert into productreviews(productId,quality,price,value,name,summary,review) values('$pid','$qty','$price','$value','$name','$summary','$review')");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>
        <?php
        $ret = mysqli_query($con, "select * from products where id='$pid'");
        while ($row = mysqli_fetch_array($ret)) {

        ?>
        <?php echo htmlentities($row['productName']); ?> | EXPLORE OUR NEW ARRIVALS | QUINTET
        <?php $cid = $row['category'];
            $subcid = $row['subCategory'];
        } ?>
    </title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/green.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
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

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">
    <!-- Favicon -->
    <!-- box-icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="cnt-home">

    <header class="header-style-1">

        <!-- ============================================== TOP MENU ============================================== -->
        <?php include('includes/top-header.php'); ?>
        <!-- ============================================== TOP MENU : END ============================================== -->
        <?php include('includes/main-header.php'); ?>
        <!-- ============================================== NAVBAR ============================================== -->
        <?php include('includes/menu-bar.php'); ?>
        <!-- ============================================== NAVBAR : END ============================================== -->

    </header>

    <!-- ============================================== HEADER : END ============================================== -->
    <div class=" ">
        <div class="" style="  padding: 0;margin-left:50px;margin-right:50px;  ">
            <div class="">
                <?php
                $ret = mysqli_query($con, "select category.categoryName as catname,subCategory.subcategory as subcatname,products.productName as pname from products join category on category.id=products.category join subcategory on subcategory.id=products.subCategory where products.id='$pid'");
                while ($rw = mysqli_fetch_array($ret)) {
                ?>
                <ul class="list-inline list-unstyled"
                    style="display: flex;align-items: center;justify-content: end;   ">
                    <li style="padding: 0 !important ;margin: 0 !important  ; border: 0 !important  ; "><a
                            href="index.php"
                            style="  border: 0 !important  ; font-size: 10px !important ; color: #000 !important ; ">Home
                            /</a>
                    </li>
                    <li style="padding: 0 !important ;margin: 0 !important  ; border: 0 !important  ; "><a href=""
                            style="  border: 0 !important  ; font-size: 10px !important ; color: #000 !important ; "><?php echo htmlentities($rw['catname']); ?>
                            /</a>
                    </li>
                    <li style="padding: 0 !important ;margin: 0 !important  ; border: 0 !important  ; "><a href=""
                            style="  border: 0 !important  ; font-size: 10px !important ; color: #000 !important ; "><?php echo htmlentities($rw['subcatname']); ?>
                            /</a>
                    </li>
                    <li class='active' style="padding: 0 !important ;margin: 0 !important  ; border: 0 !important  ; ">
                        <a href=""
                            style="  border: 0 !important  ; font-size: 10px !important ; color: #000 !important ; "><?php echo htmlentities($rw['pname']); ?>
                            /</a>
                    </li>
                    </li>
                </ul>
                <?php } ?>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div>
            <div class='row single-product outer-bottom-sm '>
                <?php
                $ret = mysqli_query($con, "select * from products where id='$pid'");
                while ($row = mysqli_fetch_array($ret)) {

                ?>

                <div class='col-md-12'>
                    <style>
                    .productDescription2 {
                        width: 300px;
                        border: 1px solid black !important;
                        padding: 10px;
                    }

                    .more {
                        border: 0;
                        outline: 0;
                        background: transparent;
                        text-decoration: underline;
                        color: #000;
                    }
                    </style>
                    <div class="row  ">
                        <div class="col-xs-12 col-sm-12 col-md-1 gallery-holder"></div>
                        <div class="col-xs-12 col-sm-12 col-md-2 gallery-holder productDescription2">
                            <div class="product-tab productDescription" id="more"
                                style="background:#fff;border: 0 !important ; ">
                                <p class="text "
                                    style="font-family: 'Raleway', sans-serif !important;text-transform:uppercase;font-size: 12px  !important ; font-weight: 400 !important ;padding:10px;font-family: 'Raleway' , sans-serif ; color:black;">
                                    <?php echo $row['productDescription']; ?>
                                    <hr>
                                </p>
                            </div>
                            <button class="more" onclick="more()">view more...</button>
                        </div>
                        <script>
                        function more() {
                            isvisible = document.getElementById("more").style.height = "492px";

                            if (isvisible) {
                                document.querySelector(".more").innerHTML = "view less...";
                            } else {
                                document.getElementById("more").style.height = "300px";
                            }
                        }
                        </script>
                        <div class="col-xs-12 col-sm-12 col-md-1 gallery-holder"></div>
                        <div class="col-xs-12 col-sm-12 col-md-3 gallery-holder">
                            <div class="product-item-holder size-big single-product-gallery small-gallery">
                                <div id="owl-single-product" style="border:0 !important ;">
                                    <div class="single-product-gallery-item" id="slide1"
                                        style="background:#F2F3F8 !important;">
                                        <a data-lightbox="image-1"
                                            data-title=" <?php echo htmlentities($row['productName']); ?>"
                                            href="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>">
                                            <img class="img-responsive" alt="" src="assets/images/blank.gif"
                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" />
                                        </a>
                                    </div>
                                    <div class="single-product-gallery-item" id="slide1"
                                        style="background:#F2F3F8 !important; ">
                                        <a data-lightbox="image-1"
                                            data-title="<?php echo htmlentities($row['productName']); ?>"
                                            href="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>">
                                            <img class="img-responsive" alt="" src="assets/images/blank.gif"
                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" />
                                        </a>
                                    </div>
                                    <div class="single-product-gallery-item" id="slide2"
                                        style="background:#F2F3F8 !important;">
                                        <a data-lightbox="image-1"
                                            data-title="<?php echo htmlentities($row['productName']); ?>"
                                            href="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage2']); ?>">
                                            <img class="img-responsive" alt="" src="assets/images/blank.gif"
                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage2']); ?>" />
                                        </a>
                                    </div><!-- /.single-product-gallery-item -->

                                    <div class="single-product-gallery-item" id="slide3"
                                        style="background:#F2F3F8 !important;">
                                        <a data-lightbox="image-1" data-title="Gallery"
                                            href="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage3']); ?>">
                                            <img class="img-responsive" alt="" src="assets/images/blank.gif"
                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage3']); ?>" />
                                        </a>
                                    </div><!-- /.single-product-gallery-item -->

                                    <div class="single-product-gallery-item" id="slide4"
                                        style="background:#F2F3F8 !important;">
                                        <a data-lightbox="image-1" data-title="Gallery"
                                            href="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageFour']); ?>">
                                            <img class="img-responsive" alt="" src="assets/images/blank.gif"
                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageFour']); ?>" />
                                        </a>
                                    </div>
                                    <div class="single-product-gallery-item" id="slide5"
                                        style="background:#F2F3F8 !important;">
                                        <a data-lightbox="image-1" data-title="Gallery"
                                            href="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageFive']); ?>">
                                            <img class="img-responsive" alt="" src="assets/images/blank.gif"
                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageFive']); ?>" />
                                        </a>
                                    </div>
                                    <div class="single-product-gallery-item" id="slide6"
                                        style="background:#F2F3F8 !important;">
                                        <a data-lightbox="image-1" data-title="Gallery"
                                            href="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageSix']); ?>">
                                            <img class="img-responsive" alt="" src="assets/images/blank.gif"
                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageSix']); ?>" />
                                        </a>
                                    </div>

                                </div><!-- /.single-product-slider -->



                            </div>
                        </div>
                        <div class="col-md-1">
                            <style>
                            .scrollbar {
                                width: 100%;
                                display: block;
                            }

                            .scrollbar-img {
                                width: 40px;
                                height: 100%;
                            }

                            @media only screen and (max-width: 1000px) {
                                .scrollbar {
                                    width: 100%;
                                    display: flex;

                                }

                                .scrollbar-img {
                                    width: 100px;
                                    height: 100%;
                                }
                            }
                            </style>
                            <div class=" scrollbar">
                                <div class="scrollbar-img">
                                    <a class=" horizontal-thumb active" data-target="#owl-single-product" data-slide="1"
                                        href="#slide1">
                                        <img class="img-responsive" alt="" src="assets/images/blank.gif" width="100%"
                                            height="100%"
                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" />
                                    </a>
                                </div>

                                <div class="scrollbar-img"> <a class="horizontal-thumb active"
                                        data-target="#owl-single-product" data-slide="1" href="#slide1">
                                        <img class="img-responsive" alt="" src="assets/images/blank.gif" width="100%"
                                            height="100%"
                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" />
                                    </a>
                                </div>

                                <div class="scrollbar-img"> <a class="horizontal-thumb"
                                        data-target="#owl-single-product" data-slide="2" href="#slide2">
                                        <img class="img-responsive" alt="" src="assets/images/blank.gif" width="100%"
                                            height="100%"
                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage2']); ?>" />
                                    </a>
                                </div>




                                <div class="scrollbar-img"> <a class="horizontal-thumb"
                                        data-target="#owl-single-product" data-slide="3" href="#slide3">
                                        <img class="img-responsive" width="100%" height="100%" alt=""
                                            src="assets/images/blank.gif"
                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage3']); ?>" />
                                    </a>
                                </div>


                                <div class="scrollbar-img"> <a class="horizontal-thumb"
                                        data-target="#owl-single-product" data-slide="4" href="#slide4">
                                        <img class="img-responsive" width="100%" height="100%" alt=""
                                            src="assets/images/blank.gif"
                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageFour']); ?>" />
                                    </a>
                                </div>


                                <div class="scrollbar-img"> <a class="horizontal-thumb"
                                        data-target="#owl-single-product" data-slide="5" href="#slide5">
                                        <img class="img-responsive" width="100%" height="100%" alt=""
                                            src="assets/images/blank.gif"
                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageFive']); ?>" />
                                    </a>
                                </div>


                                <div class="scrollbar-img"> <a class="horizontal-thumb"
                                        data-target="#owl-single-product" data-slide="6" href="#slide6">
                                        <img class="img-responsive" width="100%" height="100%" alt=""
                                            src="assets/images/blank.gif"
                                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageSix']); ?>" />
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-2 gallery-holder"></div>

                        <div class='col-xs-12 col-sm-12 col-md-3 product-info-block'>
                            <div class="product-info "
                                style="border: 1px solid black !important;height:100% !important;">
                                <h1 class="name col-sm-12" style="margin-top: 20px !important;font-family:
                                    sans-serif, ' Poppins' !important;text-transform:uppercase;font-size: 12px;
                                    font-weight: 400;color: #000; ">
                                    <?php echo htmlentities($row['productName']); ?>
                                </h1>
                                <div class="col-sm-12">


                                    <div class="">
                                        <div class="price-box"
                                            style="display: flex;align-items: center;justify-content: start ;   ">
                                            <span class="price"
                                                style="font-family: sans-serif, ' Poppins'!important;color: #000; font-size: 12px;font-weight: normal; ">MRP.
                                                &#8377;&nbsp;
                                                <?php echo htmlentities($row['productPrice']); ?></span>
                                            <span
                                                style="font-family: sans-serif, ' Poppins'!important;color: #000; font-size: 12px;font-weight: normal; margin-left: 20px; "
                                                class="price-strike">
                                                <del>

                                                    MRP.
                                                    &#8377;&nbsp;<?php echo htmlentities($row['productPriceBeforeDiscount']); ?>
                                                </del>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                                <div class=" stock-container info-container col-sm-12">
                                    <p
                                        style="margin-top:10px;font-family: sans-serif, ' Poppins'!important;color: #000; font-size: 10px;font-weight: normal;font-weight: 300">
                                        MRP incl. of all taxes</p>
                                    <hr style="border-top: 1px solid black;">

                                </div>
                                <?php $rt = mysqli_query($con, "select * from productreviews where productId='$pid'");
                                    $num = mysqli_num_rows($rt); {
                                    ?>
                                <!-- /.rating-reviews -->
                                <style>
                                @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');
                                </style>
                                <?php } ?>

                                <div class=" stock-container info-container"
                                    style="border: 0 !important;margin-top: 20px !important;">
                                    <div class="col-sm-12"
                                        style="display: flex;align-items: center;justify-content:space-between;   width: 100%; ">
                                        <div class="">
                                            <div class="stock-box">
                                                <span class="label"
                                                    style="  font-weight: 400; font-family: 'Raleway', sans-serif; font-size: 11px; color: #000;text-transform:capitalize ;  ">Availability
                                                    : </span>
                                            </div>
                                        </div>
                                        <div class=" ">
                                            <div class="stock-box">
                                                <span class="value"
                                                    style="  font-weight: 400; font-family: 'Raleway', sans-serif; font-size: 12px; color: #000;text-transform:capitalize ;"><?php echo htmlentities($row['productAvailability']); ?></span>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div>



                                <div class="stock-container info-container  " style="border: 0 !important;">
                                    <div class="col-sm-12"
                                        style="display: flex;align-items: center;justify-content: space-between;   width: 100%;margin-top: 10px !important; ">
                                        <div class="" style="border: 0 !important;">
                                            <div class="stock-box">
                                                <span class="label"
                                                    style="  font-weight: 400; font-family: 'Raleway', sans-serif; font-size: 12px; color: #000;text-transform:capitalize; ">
                                                    Brand
                                                    :</span>
                                            </div>
                                        </div>
                                        <div class="" style="border: 0 !important;">
                                            <div class="stock-box" style="border: 0 !important;">
                                                <span class="value"
                                                    style="  font-weight:500; font-family: 'Raleway', sans-serif; font-size: 12px; color: #000;"><?php echo htmlentities($row['productCompany']); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="rating-reviews m-t-10 ">
                                    <div class="col-sm-12"
                                        style="display: flex;align-items: center;justify-content: space-between;   width: 100%;margin-top: 10px;  ">
                                        <div class="">
                                            <div class="rating rateit-small"
                                                style="font-family: sans-serif, ' Poppins'!important;"></div>
                                        </div>
                                        <div class="">
                                            <div class="reviews">
                                                <a href="#" class="lnk"
                                                    style="font-weight: 400 !important ;  font-family: sans-serif,'Poppins';color: #000; font-size: 12px;text-transform: uppercase; ">(<?php echo htmlentities($num); ?>
                                                    Reviews)</a>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div>
                                <div class="price-container info-container"
                                    style="margin: 0px !important;padding:0 !important; border:0; ">

                                    <div class="stock-container info-container " :
                                        style="box-shadow:none; border: none !important;outline:0;">
                                        <div class="col-sm-12"
                                            style="display: block;align-items: center;border:none;justify-content:space-between;   width: 100%;margin-top: 10px !important;margin-bottom: 100px !important; ">
                                            <div class="" style="border: 0 !important;">
                                                <div class="stock-box" style="border: 0 !important;">
                                                    <span class="label"
                                                        style=" font-weight: 400;  font-family: 'Raleway', sans-serif; font-size: 12px; color: #000;text-transform:capitalize; ">
                                                        Colour
                                                        :<?php echo htmlentities($row['productColor']); ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="" style="border: 0 !important;">
                                                <div class="stock-box"
                                                    style=" font-family: 'Raleway', sans-serif;display: flex;align-items: center;  ">
                                                    <div class="color-box"
                                                        style="border: 1px solid black; width: 25px;height: 25px; background: <?php echo htmlentities($row['productColor']); ?>;  ">

                                                    </div>

                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div>
                                    <div class="">
                                        <div class="favorite-button m-t-10">
                                            <a class="btn" title="favourites"
                                                style="border-top:1px solid black; background:#fff ;  border-radius: 0 !important ;padding: 10px 10px; font-size: 12px !important ;display: flex;align-items: center;justify-content: center;width: 100% !important ;  height: 40px !important ; "
                                                href="product-details.php?pid=<?php echo htmlentities($row['id']) ?>&&action=wishlist">
                                                <i class="fa-regular fa-bookmark"
                                                    style=" color:#000 ;font-weight: 400;"></i>
                                                <span style=" margin-left: 5px;
                                                        font-family: 'Raleway' , sans-serif; font-size: 12px; color:
                                                        #000 ;text-transform: uppercase ;font-weight: 400; ">
                                                    favourites
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div>
                                        <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                        <a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                            class="btn "
                                            style="text-transform: uppercase;font-weight: 500;   border-radius: 0 !important ;padding: 10px 20px; font-size: 12 !important ;display: flex;align-items: center;justify-content: center;  background: #000 !important ;   font-family: 'Raleway' , sans-serif; font-size: 12px !important ; color:#fff !important;   width: 100% !important ;  height: 40px !important ;border-top:1px solid black; ">
                                            ADD </a>
                                        <?php } else { ?>

                                        <a href="#" class="btn "
                                            style="cursor  :no-drop !important; text-transform: uppercase;font-weight: 500 !important;   border-radius: 0 !important ;padding: 10px 20px; font-size: 12px !important ;font-family: 'Raleway' , sans-serif !important; font-size: 18px; display: flex;align-items: center;justify-content: center;  background: #fff !important ;   font-family: 'Raleway' , sans-serif; font-size: 12px !important ; color:#000 !important;border-top:1px solid black;   width: 100% !important ;  height: 40px !important ;   ">
                                            Out of Stock</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>


                        </div><!-- /.row -->
                    </div><!-- /.price-container -->
                </div><!-- /.product-info -->
            </div><!-- /.col-sm-7 -->
        </div><!-- /.row -->
    </div><!-- /.col -->


    <?php $cid = $row['category'];
                    $subcid = $row['subCategory'];
                } ?>
    <!-- ============================================== UPSELL PRODUCTS ============================================== -->
    <div class="section featured-product wow fadeInUp col-lg-12">
        <h3 class="section-title"
            style="text-align: center; font-weight:400; text-transform:capitalize;font-family: 'Raleway' , sans-serif;font-size:30px;color: #000;  ">
            You may also like

        </h3>
        <style>
        .productimagetab {
            display: flex;
            align-items: center;
            justify-content: start;
            flex-wrap: wrap;
        }

        @media only screen and (max-width: 800px) {
            .productimagetab {
                display: flex;
                align-items: center;
                justify-content: center !important;
                flex-wrap: wrap;
            }
        }
        </style>
        <div class="productimagetab" data-item="4" style="border-top:1px solid #000; ">
            <?php
        $qry = mysqli_query($con, "select * from products where subCategory='$subcid' and category='$cid'");
        while ($rw = mysqli_fetch_array($qry)) {
        ?>
            <style>
            .products,
            .product {
                width: 240px !important;
                margin-left: 2px;
            }

            @media only screen and (max-width: 800px) {

                .products,
                .product {
                    width: 100% !important;
                }

                .image {
                    width: 100% !important;
                    height: 100% !important;
                }
            }
            </style>
            <div class="item item-carousel m-t-20">
                <div class="products">
                    <div class="product">
                        <div class="product-image" style="background:#F2F3F8 !important;">
                            <div class="image" style="background:transparent !important; ">
                                <a href="product-details.php?pid=<?php echo htmlentities($rw['id']); ?>"><img
                                        src="assets/images/blank.gif"
                                        data-echo="admin/productimages/<?php echo htmlentities($rw['id']); ?>/<?php echo htmlentities($rw['productImage1']); ?>"
                                        width="100%" height="100%" alt=""></a>
                            </div><!-- /.image -->


                        </div><!-- /.product-image -->


                        <div class="product-info text-left"
                            style="width:250px !important; margin-top: -8px !important;padding: 0 !important;">
                            <h3 class="name" style="padding:10px 0px;"><a style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:12px;font-weight:300 ;"
                                    href="product-details.php?pid=<?php echo htmlentities($rw['id']); ?>"><?php echo htmlentities($rw['productName']); ?></a>

                                <br>
                                <span class="price" style="font-size: 11px;   color:#333;font-family: sans-serif, ' Poppins'
                                                        !important;font-weight:300">
                                    MRP.<?php echo htmlentities($rw['productPrice']); ?>
                                </span>
                            </h3>
                        </div><!-- /.product-info -->
                    </div><!-- /.product -->
                </div><!-- /.products -->
            </div><!-- /.item -->
            <?php } ?>

            <style>
            .centerReview {
                display: flex;
                align-items: center;
                justify-content: center;
            }
            </style>
        </div><!-- /.home-owl-carousel -->


        <style>
        .reviewContainer {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 200px;
        }

        .reviewbefore {
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            padding: 20px;
            flex-wrap: wrap;

            width: 800px;
        }

        .reviewbeforeText h4 {
            text-transform: capitalize;
            font-family: 'Raleway', sans-serif;
            text-transform: capitalize;
            color: #000;
        }

        .reviewbefore button {
            background: black;
            padding: 10px 60px;
            width: 100%;
            outline: 0;
            font-size: 15px;
            text-transform: capitalize;
            border: 0;
            color: #fff;
        }

        .review-container {
            display: none;
            transition: all 1s linear;
        }
        </style>
        <div class="reviewContainer">

            <div class="reviewbefore">
                <div class="col-lg-12">
                    <h4 class=" title"
                        style="text-align: center ; font-family: 'Raleway' , sans-serif;font-size: 25px;text-transform:capitalize      ; font-weight: 600;color: #000; ">
                        Customer Reviews
                    </h4>
                </div>
                <div class="" style="margin-top: 20px; display: flex;
            align-items: center;
            justify-content:space-around;width:100%;flex-wrap: wrap; border: 1px solid black;padding:20px;">
                    <div class="reviewbeforeText">
                        <div class="">
                            <img src="assets/images/star-outline-svgrepo-com.svg" alt="">
                            <img src="assets/images/star-outline-svgrepo-com.svg" alt="">
                            <img src="assets/images/star-outline-svgrepo-com.svg" alt="">
                            <img src="assets/images/star-outline-svgrepo-com.svg" alt="">
                            <img src="assets/images/star-outline-svgrepo-com.svg" alt="">
                        </div>
                        <h4>
                            Be the first to write a review
                        </h4>
                    </div>
                    <div class="reviewbeforeText">
                        <button data-toggle-form="MyOwnReviewForm">
                            Write a review
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="review-container    " id="MyOwnReviewForm">

            <div class="col-lg-12 centerReview ">

                <div style="width:600px;padding: 20px;">

                    <style>
                    .productDescription {
                        height: 250px;
                        overflow-y: auto !important;
                        overflow-x: hidden !important;
                        border: 1px solid black !important;
                    }

                    .productDescription::-webkit-scrollbar-track {
                        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3) !important;
                        background-color: #fff !important;
                    }

                    .productDescription:hover.productDescription::-webkit-scrollbar {
                        display: block !important;
                    }

                    .productDescription::-webkit-scrollbar {
                        display: none !important;
                        width: 2px !important;
                        height: 2px !important;
                    }

                    .productDescription::-webkit-scrollbar-thumb {
                        border: 10px solid #000 !important;
                    }
                    </style>

                    <div id="review" class="tab-pane in active">

                        <div class="product-tab">

                            <!-- /.product-reviews -->
                            <form role="form" class="cnt-form reviewForm" name="review" method="post"
                                style=" padding:20px;">

                                <div class="product-add-review"
                                    style="background: transparent;     border: 0 !important ;">
                                    <style>
                                    .rating1,
                                    .rating2,
                                    .rating3 {
                                        display: flex;
                                        justify-content: center;
                                        overflow: hidden;
                                        flex-direction: row-reverse;
                                        position: relative;
                                    }

                                    .rating1-0 {
                                        filter: grayscale(100%);
                                    }

                                    .rating2-0 {
                                        filter: grayscale(100%);
                                    }


                                    .rating3-0 {
                                        filter: grayscale(100%);
                                    }

                                    .rating1>input,
                                    .rating2>input,
                                    .rating3>input {
                                        display: none;
                                    }

                                    .rating1>label {
                                        cursor: pointer;
                                        width: 20px;
                                        height: 20px;
                                        margin-top: auto;
                                        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
                                        background-repeat: no-repeat;
                                        background-position: center;
                                        background-size: 76%;
                                        transition: .3s;
                                    }

                                    .rating2>label {
                                        cursor: pointer;
                                        width: 20px;
                                        height: 20px;
                                        margin-top: auto;
                                        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
                                        background-repeat: no-repeat;
                                        background-position: center;
                                        background-size: 76%;
                                        transition: .3s;
                                    }

                                    .rating3>label {
                                        cursor: pointer;
                                        width: 20px;
                                        height: 20px;
                                        margin-top: auto;
                                        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
                                        background-repeat: no-repeat;
                                        background-position: center;
                                        background-size: 76%;
                                        transition: .3s;
                                    }

                                    .rating1>input:checked~label,
                                    .rating1>input:checked~label~label {
                                        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23fcd93a' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
                                    }

                                    .rating2>input:checked~label,
                                    .rating2>input:checked~label~label {
                                        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23fcd93a' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
                                    }

                                    .rating3>input:checked~label,
                                    .rating3>input:checked~label~label {
                                        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23fcd93a' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
                                    }


                                    .rating1>input:not(:checked)~label:hover,
                                    .rating1>input:not(:checked)~label:hover~label {
                                        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23d8b11e' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
                                    }

                                    .rating2>input:not(:checked)~label:hover,
                                    .rating2>input:not(:checked)~label:hover~label {
                                        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23d8b11e' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
                                    }

                                    .rating3>input:not(:checked)~label:hover,
                                    .rating3>input:not(:checked)~label:hover~label {
                                        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23d8b11e' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
                                    }

                                    .reviewstar {
                                        width: 100%;
                                        text-align: center;
                                        font-family: 'Raleway', sans-serif;
                                        text-transform: capitalize;
                                        font-weight: 500;
                                        color: #000;
                                    }

                                    .reviewstar h4 {
                                        font-size: 15px !important;

                                    }
                                    </style>
                                    <div class="table-responsive" style="background:transparent;">
                                        <h4 class=" title "
                                            style="text-align: center ; font-family: 'Raleway' , sans-serif;font-size: 25px;text-transform:capitalize      ; font-weight: 600;color: #000; ">
                                            Write
                                            your
                                            own
                                            review
                                        </h4>
                                        <div class="reviewstar m-t-20">
                                            <h4 class="">
                                                Quality rating
                                            </h4>
                                            <div class=" rating1">
                                                <input type="radio" name="quality" id="rating-5" value="5">
                                                <label for="rating-5"></label>
                                                <input type="radio" name="quality" id="rating-4" value="4">
                                                <label for="rating-4"></label>
                                                <input type="radio" name="quality" id="rating-3" value="3">
                                                <label for="rating-3"></label>
                                                <input type="radio" name="quality" id="rating-2" value="2">
                                                <label for="rating-2"></label>
                                                <input type="radio" name="quality" id="rating-1" value="1">
                                                <label for="rating-1"></label>
                                            </div>
                                        </div>
                                        <div class="reviewstar">
                                            <h4>
                                                Price rating
                                            </h4>
                                            <div class=" rating2">
                                                <input type="radio" name="price" id="rating2-5" value="5">
                                                <label for="rating2-5"></label>
                                                <input type="radio" name="price" id="rating2-4" value="4">
                                                <label for="rating2-4"></label>
                                                <input type="radio" name="price" id="rating2-3" value="3">
                                                <label for="rating2-3"></label>
                                                <input type="radio" name="price" id="rating2-2" value="2">
                                                <label for="rating2-2"></label>
                                                <input type="radio" name="price" id="rating2-1" value="1">
                                                <label for="rating2-1"></label>
                                            </div>
                                        </div>

                                        <div class="reviewstar">
                                            <h4>
                                                Value rating
                                            </h4>
                                            <div class="rating3">
                                                <input type="radio" name="value" id="rating3-5" value="5">
                                                <label for="rating3-5"></label>
                                                <input type="radio" name="value" id="rating3-4" value="4">
                                                <label for="rating3-4"></label>
                                                <input type="radio" name="value" id="rating3-3" value="3">
                                                <label for="rating3-3"></label>
                                                <input type="radio" name="value" id="rating3-2" value="2">
                                                <label for="rating3-2"></label>
                                                <input type="radio" name="value" id="rating3-1" value="1">
                                                <label for="rating3-3"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.review-table -->

                                <div class="review-form">
                                    <div class="form-container">

                                        <style>
                                        .form-group input,
                                        .form-group textarea {
                                            border: 1px solid gray !important;
                                            font-family: 'Raleway', sans-serif !important;
                                            font-size: 15px !important;
                                            color: #000 !important;
                                            font-weight: 600 !important;
                                            text-transform: capitalize !important;
                                            padding: 20px !important;
                                            width: 100%;
                                            box-shadow: 0 !important;
                                        }




                                        .form-group input::placeholder,
                                        .form-group textarea::placeholder {
                                            font-family: 'Raleway', sans-serif !important;
                                            font-size: 15px !important;
                                            color: #000 !important;
                                            font-weight: 600 !important;
                                            text-transform: capitalize !important;


                                        }

                                        .form-group input:focus,
                                        .form-group textarea:focus {
                                            border: 2px solid black !important;
                                            box-shadow: none !important;
                                        }

                                        .form-group label {
                                            font-family: 'Raleway', sans-serif !important;
                                            font-size: 15px !important;
                                            color: #000 !important;
                                            font-weight: 600 !important;
                                            text-transform: capitalize !important;
                                        }

                                        .checkout-page-button {
                                            background: black !important;
                                            width: 50% !important;
                                            height: 50px !important;
                                            font-size: 20px !important;
                                            border-radius: 0 !important;
                                        }
                                        </style>
                                        <div class="row m-t-20">
                                            <div class="col-sm-12">
                                                <div class="form-group col-lg-6">
                                                    <label for="exampleInputName">
                                                        Your Name
                                                    </label>
                                                    <input type="text" class="form-control txt" id="exampleInputName"
                                                        placeholder=" Name" name="name" required="required"
                                                        style="background: transparent ;text-transform: uppercase; border-radius:0;  ">
                                                </div>
                                                <!-- /.form-group -->
                                                <div class="form-group col-lg-6">
                                                    <label for="exampleInputSummary">
                                                        Summary (100)
                                                    </label>
                                                    <input type="text" class="form-control txt" id="exampleInputSummary"
                                                        placeholder="Summary" name="summary" required="required"
                                                        style="background: transparent ;text-transform: uppercase;border-radius:0;   "
                                                        maxlength="100">
                                                </div>
                                                <!-- /.form-group -->
                                            </div>

                                            <div class="col-md-6 col-lg-12">
                                                <div class="form-group col-lg-12">
                                                    <label for="exampleInputReview">
                                                        Review (5000)
                                                    </label>

                                                    <textarea class="form-control txt txt-review"
                                                        id="exampleInputReview"
                                                        style="height: 143px;border-radius:0;background: transparent  ;text-transform: uppercase;  "
                                                        placeholder="Write your comments here" name="review"
                                                        required="required" maxlength="5000"></textarea>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                        </div><!-- /.row -->

                                        <div class="action ">
                                            <style>
                                            .action {
                                                display: flex;
                                                align-items: center;
                                                justify-content: space-evenly;
                                            }

                                            .action button {
                                                text-transform: capitalize !important;
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;
                                            }
                                            </style>
                                            <button class="btn " data-toggle-form="MyOwnReviewForm"
                                                style="background:transparent;padding:20px 50px;  border:2px solid #000 !important; color: #000 !important ;font-weight: 500;height: 40px !important;font-size: 15px !important;border-radius: 0 !important; ">
                                                Cancel review</button>
                                            <button name="submit" class="btn "
                                                style="padding:20px 50px;  background: #000 !important; color: #fff !important ;font-weight: 500;height: 40px !important;font-size: 15px !important;border-radius: 0 !important; border: 1px solid #000 !important;">
                                                submit review</button>
                                        </div>
                                        <!-- /.action -->

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-lg-12 "
                style=" overflow-y: auto; display: flex;align-items: center;justify-content: center    ;flex-wrap: wrap;  ">


                <?php $qry = mysqli_query($con, "select * from productreviews where productId='$pid'");
            if ($num > 0) {
                while ($rvw = mysqli_fetch_array($qry)) { ?>

                <div class="reviews m-t-10 col-lg-4 col-md-4 col-sm-12 col-xs-12"
                    style="border: solid 1px #000; margin-left:10px; padding: 20px;border-radius: 0;background:#fff ;   ">
                    <div class="review ">
                        <div class="review-title"
                            style="display: flex;align-items: center;justify-content: space-between;  ">
                            <span class="summary"
                                style="font-family: 'Raleway' , sans-serif;font-size: 15px ;font-weight: 600 !important ;color: #000 ;  text-transform:uppercase; ">
                                <?php echo htmlentities($rvw['summary']); ?>
                            </span>
                            <span class="date">
                                <i class='bx bx-time-five'
                                    style="font-family: 'Raleway' , sans-serif;font-size: 13px ;font-weight: 600 !important ;color: #000 ;   "></i>
                                <span
                                    style="margin-left: 5px;font-family: 'Poppins' , sans-serif;font-size: 13px ;font-weight: 600 !important ;color: #000 ;   "><?php echo substr(htmlentities($rvw['reviewDate']), 0, 10); ?>
                                </span>
                            </span>
                        </div>

                        <div class="text"
                            style="    font-family: 'Raleway' , sans-serif;font-size: 13px ;font-weight: 600 !important ;color: #000 ;text-transform:capitalize;    ">
                            <?php echo htmlentities($rvw['review']); ?>
                        </div>
                        <div class="text"
                            style=" margin-top: 10px; font-family:  sans-serif,'Poppins';font-size: 13px ;font-weight: 600 !important ;color: #000 ;text-transform:capitalize;     ">
                            <span style="    font-family: 'Raleway' , sans-serif">
                                Quality
                                :</span>
                            ( <?php echo htmlentities($rvw['quality']); ?>
                            <div class="rating rateit-small"
                                style="position:absolute;bottom:49%;left:20%; font-family: sans-serif, ' Poppins' !important;">
                            </div>)
                        </div>
                        <div class="text"
                            style="font-family:  sans-serif,'Poppins';font-size: 13px ;font-weight: 600 !important ;color: #000 ;text-transform:capitalize;     ">
                            <span style="    font-family: 'Raleway' , sans-serif">
                                Price
                                :</span>
                            (<?php echo htmlentities($rvw['price']); ?>
                            <div class="rating rateit-small"
                                style="position:absolute;bottom:39%;left:18%;font-family: sans-serif, ' Poppins'!important;">
                            </div>)
                        </div>
                        <div class=" text"
                            style="font-family:  sans-serif,'Poppins';font-size: 13px ;font-weight: 600 !important ;color: #000 ;text-transform: capitalize;     ">
                            <span style="    font-family: 'Raleway' , sans-serif">
                                value
                                :</span>

                            ( <?php echo htmlentities($rvw['value']); ?>
                            <div class="rating rateit-small"
                                style="position:absolute;bottom:28%;left:18%;font-family: sans-serif, ' Poppins'!important;">
                            </div>)
                        </div>
                        <div class="author m-t-15">
                            <i class='bx bx-edit-alt'></i>
                            <span class="name"
                                style="font-family: 'Raleway' , sans-serif;font-size: 13px ;font-weight: 600 !important ;color: #000 ;text-transform: capitalize;     "><?php echo htmlentities($rvw['name']); ?></span>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php } else { ?>
                <h4
                    style="font-family: 'Raleway' , sans-serif;font-size: 15px ;font-weight: 600 !important ;color: #000 ;text-transform: uppercase;">
                    No Reviews
                </h4>
                <?php } ?>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const buttons = document.querySelectorAll("[data-toggle-form]");
        let activeForm = null;

        buttons.forEach(function(button) {
            button.addEventListener("click", function(event) {
                event
                    .stopPropagation(); // Prevents the click from propagating to the document
                const formId = button.getAttribute(
                    "data-toggle-form");
                const form = document.getElementById(formId);

                if (form.style.display === "block") {
                    form.style.display = "none";
                    activeForm = null;
                } else {
                    if (activeForm) {
                        activeForm.style.display = "none";
                    }
                    form.style.display = "block";
                    activeForm = form;
                }
            });
        });

        document.addEventListener("click", function(event) {
            if (activeForm && !activeForm.contains(event.target)) {
                activeForm.style.display = "none";
                activeForm = null;
            }
        });
    });
    </script>
    <!--==============================================UPSELL PRODUCTS :
        END==============================================-->


    <div class="clearfix"></div>
    <?php include('includes/brands-slider.php'); ?>
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

</html> });
});

$(window).bind("load", function() {
$('.show-theme-options').delay(2000).trigger('click');
});
</script>
<!-- For demo purposes – can be removed on production : End -->



</body>

</html>