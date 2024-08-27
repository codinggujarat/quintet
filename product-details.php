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
    <title>Product Details</title>
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
    <link rel="shortcut icon" href="assets/images/favicon.ico">
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
        <div class="container">
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
        <div class='container'>
            <div class='row single-product outer-bottom-sm '>
                <div class='col-md-3 sidebar'>
                    <div class="sidebar-module-container">


                        <!-- ==============================================CATEGORY============================================== -->
                        <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                            <div class="head"
                                style="font-family: 'Raleway' , sans-serif;background: transparent  !important;color: #000; ;box-shadow: none !important ; font-size: 15px !important  ; padding: 14px;text-transform: uppercase;  border: 1px solid black;border-bottom : 0;  ">
                                Categories</div>
                            <div class="sidebar-widget-body m-t-10" style="border: 1px solid black;margin: 0;">
                                <div class="accordion">

                                    <?php $sql = mysqli_query($con, "select id,categoryName  from category");
                                    while ($row = mysqli_fetch_array($sql)) {
                                        ?>
                                    <div class="accordion-group">
                                        <div class="accordion-heading"
                                            style="text-transform: uppercase; display: flex;align-items: center;justify-content: space-between;height: 40px;padding: 12px;  ">
                                            <a style="font-family: 'Raleway' , sans-serif;width: 100%; font-size: 17px;color: #000 !important ; font-weight: 400 !important ;font-size: 15px;    "
                                                href="category.php?cid=<?php echo $row['id']; ?>" class="">
                                                <?php echo $row['categoryName']; ?>
                                            </a>
                                            <i class='bx bx-plus' style="color:black;font-size: 17px;"></i>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================== CATEGORY : END ============================================== -->
                        <!-- ============================================== HOT DEALS ============================================== -->
                        <style>
                        #owl-main .owl-pagination {
                            background: transparent !important;
                            bottom: -20px !important;
                            padding: 5px !important;
                        }

                        #owl-main .owl-inner-pagination.owl-ui-md .owl-prev,
                        #owl-main .owl-inner-pagination.owl-ui-md .owl-next {
                            background: black !important;
                        }

                        #owl-main .owl-prev,
                        #owl-main .owl-next {
                            background: transparent !important;
                            font-size: 50px !important;
                        }

                        .owl-carousel .owl-prev::before,
                        .owl-carousel .owl-next::before {
                            background: #F2F3F8 !important;
                            padding: 3px 10px !important;
                            border-radius: 50px !important;
                            position: absolute !important;
                            top: -3px !important;
                            color: #000 !important;
                            border: 1px solid black;
                            z-index: 9999999999999;
                            left: -3px !important;
                        }
                        </style>
                        <div class="sidebar-widget hot-deals wow fadeInUp">
                            <h3 class="section-title"
                                style="font-family: sans-serif, 'Poppins' !important;color: #000;font-weight: normal;border-color: #000;  ">
                                hot deals</h3>
                            <div class=" owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">
                                <?php
                                $ret = mysqli_query($con, "select * from products order by rand() limit 4 ");
                                while ($rws = mysqli_fetch_array($ret)) {

                                    ?>


                                <div class="item">
                                    <div class="products ">
                                        <div class="hot-deal-wrapper" style="background:#F2F3F8 !important;border:1px solid black ;width:
                                            250px; height:250px;">
                                            <div class=" image"
                                                style="background:transparent !important;padding: 20px; ">
                                                <img src="admin/productimages/<?php echo htmlentities($rws['id']); ?>/<?php echo htmlentities($rws['productImage1']); ?>"
                                                    width="100%" height="100%" alt="">
                                            </div>

                                        </div><!-- /.hot-deal-wrapper -->

                                        <div class="product-info text-left m-t-20"
                                            style="width:100% !important; padding: 0 !important;margin-top: -5px !important;">
                                            <h3 class="name"><a style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:500 ;"
                                                    href="product-details.php?pid=<?php echo htmlentities($rws['id']); ?>"><?php echo htmlentities($rws['productName']); ?></a>
                                            </h3>
                                            <div class="product-price" style="margin-top: -10px; ">
                                                <span class="price"
                                                    style="font-size: 11px;font-family: sans-serif, 'Poppins' !important;color: #000;font-weight: normal; ">
                                                    MRP. <?php echo htmlentities($rws['productPrice']); ?>.00
                                                </span>
                                            </div><!-- /.product-price -->

                                        </div><!-- /.product-info -->
                                    </div>
                                </div>
                                <?php } ?>


                            </div><!-- /.sidebar-widget -->
                        </div>

                        <!-- ============================================== COLOR: END ============================================== -->
                    </div>
                </div><!-- /.sidebar -->
                <?php
                $ret = mysqli_query($con, "select * from products where id='$pid'");
                while ($row = mysqli_fetch_array($ret)) {

                    ?>


                <div class='col-md-9'>
                    <div class="row  wow fadeInUp">
                        <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                            <div class="product-item-holder size-big single-product-gallery small-gallery">

                                <div id="owl-single-product" style="border:1px solid black ;">

                                    <div class="single-product-gallery-item" id="slide1"
                                        style="background:#F2F3F8 !important; ">
                                        <a data-lightbox="image-1"
                                            data-title="<?php echo htmlentities($row['productName']); ?>"
                                            href="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>">
                                            <img class="img-responsive" alt="" src="assets/images/blank.gif"
                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                width="370" height="350" />
                                        </a>
                                    </div>
                                    <div class="single-product-gallery-item" id="slide1"
                                        style="background:#F2F3F8 !important;">
                                        <a data-lightbox="image-1"
                                            data-title="<?php echo htmlentities($row['productName']); ?>"
                                            href="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>">
                                            <img class="img-responsive" alt="" src="assets/images/blank.gif"
                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                width="370" height="350" />
                                        </a>
                                    </div><!-- /.single-product-gallery-item -->

                                    <div class="single-product-gallery-item" id="slide2"
                                        style="background:#F2F3F8 !important;">
                                        <a data-lightbox="image-1" data-title="Gallery"
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
                                    </div>

                                </div><!-- /.single-product-slider -->


                                <div class="single-product-gallery-thumbs gallery-thumbs">

                                    <div id="owl-single-product-thumbnails">
                                        <div class="item"
                                            style="background:#F2F3F8 !important;border:1px solid black ;">
                                            <a class="horizontal-thumb active" data-target="#owl-single-product"
                                                data-slide="1" href="#slide1">
                                                <img class="img-responsive" alt="" src="assets/images/blank.gif"
                                                    width="100%" height="100%"
                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" />
                                            </a>
                                        </div>
                                        <div class="item"
                                            style="background:#F2F3F8 !important;border:1px solid black ;">
                                            <a class="horizontal-thumb active" data-target="#owl-single-product"
                                                data-slide="1" href="#slide1">
                                                <img class="img-responsive" alt="" src="assets/images/blank.gif"
                                                    width="100%" height="100%"
                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" />
                                            </a>
                                        </div>

                                        <div class="item"
                                            style="background:#F2F3F8 !important;border:1px solid black ;">
                                            <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2"
                                                href="#slide2">
                                                <img class="img-responsive" width="100%" height="100%" alt=""
                                                    src="assets/images/blank.gif"
                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage2']); ?>" />
                                            </a>
                                        </div>
                                        <div class="item"
                                            style="background:#F2F3F8 !important;border:1px solid black ;">

                                            <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="3"
                                                href="#slide3">
                                                <img class="img-responsive" width="100%" height="100%" alt=""
                                                    src="assets/images/blank.gif"
                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage3']); ?>" />
                                            </a>
                                        </div>

                                    </div><!-- /#owl-single-product-thumbnails -->
                                </div>
                            </div>
                        </div>




                        <div class='col-sm-6 col-md-7 product-info-block'>
                            <div class="product-info">
                                <h1 class="name"
                                    style="font-family: sans-serif, ' Poppins'!important;font-size: 15px; font-weight: 500;color: #000;     ">
                                    <?php echo htmlentities($row['productName']); ?>
                                </h1>
                                <?php $rt = mysqli_query($con, "select * from productreviews where productId='$pid'");
                                    $num = mysqli_num_rows($rt); {
                                        ?>
                                <!-- /.rating-reviews -->
                                <style>
                                @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');
                                </style>
                                <?php } ?>
                                <div class="stock-container info-container m-t-10">
                                    <div class="row"
                                        style="display: flex;align-items: center;justify-content: start;   width: 100%; ">
                                        <div class="col-sm-6">
                                            <div class="stock-box">
                                                <span class="label"
                                                    style="  font-weight: 600; font-family: 'Raleway', sans-serif; font-size: 12px; color: #000;text-transform: uppercase ;  ">Availability
                                                    : </span>
                                            </div>
                                        </div>
                                        <div class=" col-sm-6">
                                            <div class="stock-box">
                                                <span class="value"
                                                    style="  font-weight: 600; font-family: 'Raleway', sans-serif; font-size: 12px; color: #000;text-transform: uppercase ;"><?php echo htmlentities($row['productAvailability']); ?></span>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div>



                                <div class="stock-container info-container m-t-10">
                                    <div class="row"
                                        style="display: flex;align-items: center;justify-content: start;   width: 100%; ">
                                        <div class="col-sm-6">
                                            <div class="stock-box">
                                                <span class="label"
                                                    style="  font-weight: 600; font-family: 'Raleway', sans-serif; font-size: 12px; color: #000;text-transform: uppercase; ">Product
                                                    Brand
                                                    :</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="stock-box">
                                                <span class="value"
                                                    style="  font-weight: 600; font-family: 'Raleway', sans-serif; font-size: 12px; color: #000;"><?php echo htmlentities($row['productCompany']); ?></span>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div>

                                <div class="stock-container info-container m-t-10">
                                    <div class="row"
                                        style="display: flex;align-items: center;justify-content: start;   width: 100%; ">
                                        <div class="col-sm-6">
                                            <div class="stock-box">
                                                <span class="label"
                                                    style=" font-weight: 600;  font-family: 'Raleway', sans-serif; font-size: 12px; color: #000;text-transform: uppercase; ">Product
                                                    Color
                                                    :</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="stock-box"
                                                style=" font-family: 'Raleway', sans-serif;display: flex;align-items: center;  ">
                                                <div class="color-box"
                                                    style="border: 1px solid black; width: 15px;height: 15px; background: <?php echo htmlentities($row['productColor']); ?>;  ">

                                                </div>
                                                <div>
                                                    <span class="value"
                                                        style="text-transform: uppercase;  margin-left: 10px;  font-family: 'Raleway', sans-serif !important ; font-size: 12px;font-weight: 600;  color: #000; "><?php echo htmlentities($row['productColor']); ?></span>

                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div>
                                <div class="stock-container info-container m-t-10 ">
                                    <div class="row"
                                        style="display: flex;align-items: center;justify-content: start;   width: 100%; ">
                                        <div class="col-sm-6 col-sm-12">
                                            <div class="stock-box">
                                                <span class="label"
                                                    style="  font-weight: 600; font-family: 'Raleway', sans-serif; font-size: 12px;color: #000;text-transform: uppercase ;  ">Shipping
                                                    Charge :</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-sm-12">
                                            <div class="stock-box">
                                                <span class="value"
                                                    style="font-weight: 500; font-family: sans-serif, ' Poppins'!important;color: #000; font-size: 12px;"><?php if ($row['shippingCharge'] == 0) {
                                                            echo "Free";
                                                        } else {
                                                            echo htmlentities($row['shippingCharge']);
                                                        }

                                                        ?></span>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div>
                                <div lass="rating-reviews m-t-10 ">
                                    <div class="row"
                                        style="display: flex;align-items: center;justify-content: start;   width: 100%;margin-top: 10px;  ">
                                        <div class="col-sm-6">
                                            <div class="rating rateit-small"
                                                style="font-family: sans-serif, ' Poppins'!important;"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="reviews">
                                                <a href="#" class="lnk"
                                                    style="font-weight: 600 !important ;  font-family: 'Raleway', sans-serif;color: #000; font-size: 12px;text-transform: uppercase; ">(<?php echo htmlentities($num); ?>
                                                    Reviews)</a>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div>
                                <div class="price-container info-container" style="margin-top: -30px; ">
                                    <div class="row">


                                        <div class="col-lg-8 col-sm-12">
                                            <div class="price-box"
                                                style="display: flex;align-items: center;justify-content: start ;   ">
                                                <span class="price"
                                                    style="font-family: sans-serif, ' Poppins'!important;color: #000; font-size: 12px;font-weight: normal; ">MRP.
                                                    <?php echo htmlentities($row['productPrice']); ?></span>
                                                <span
                                                    style="font-family: sans-serif, ' Poppins'!important;color: #000; font-size: 12px;font-weight: normal; margin-left: 20px; "
                                                    class="price-strike">MRP.<?php echo htmlentities($row['productPriceBeforeDiscount']); ?></span>
                                            </div>
                                        </div>



                                        <div class="col-sm-12">
                                            <div class="favorite-button m-t-10">
                                                <a class="btn" title="favourites"
                                                    style="border: 1px solid black;  background:#F2F3F8 ;  border-radius: 0 !important ;padding: 10px 20px; font-size: 12px !important ;display: flex;align-items: center;justify-content: center;width: 200px !important ;  height: 30px !important ; "
                                                    href="product-details.php?pid=<?php echo htmlentities($row['id']) ?>&&action=wishlist">
                                                    <i class="fa-regular fa-bookmark"
                                                        style=" color:#000 ;font-weight: 500;"></i>
                                                    <span style=" margin-left: 5px;
                                                        font-family: 'Raleway' , sans-serif; font-size: 12px; color:
                                                        #000 ;text-transform: uppercase ;font-weight: 500; ">
                                                        favourites
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class=" col-sm-12 m-t-10">
                                            <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                            <a href="product-details.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                class="btn "
                                                style="text-transform: uppercase; font-weight: 500;   border-radius: 0 !important ;padding: 10px 20px; font-size: 12px !important ;display: flex;align-items: center;justify-content: center;  background: #F2F3F8 !important ;   font-family: 'Raleway' , sans-serif; font-size: 12px !important ; color:#000;border: 1px solid black;   width: 200px !important ;  height: 30px !important ; ">
                                                ADD </a>
                                            <?php } else { ?>

                                            <a href="#" class="btn btn-black"
                                                style="text-transform: uppercase; font-weight: 500;   border-radius: 0 !important ;padding: 10px 20px; font-size: 12px !important ;display: flex;align-items: center;justify-content: center;  background: #F2F3F8 !important ;   font-family: 'Raleway' , sans-serif; font-size: 12px !important ; color:#000;border: 1px solid black;   width: 200px !important ;  height: 30px !important ;cursor  :no-drop;    ">
                                                Out of Stock</a>
                                            <?php } ?>
                                        </div>

                                    </div><!-- /.row -->
                                </div><!-- /.price-container -->






                                <div class=" quantity-container info-container">
                                    <div class="row">

                                        <div class="col-sm-2">
                                            <span class="label"
                                                style="font-family: 'Raleway' , sans-serif;color: #000; font-size: 12px;font-weight: 300; text-transform: uppercase ; ">Qty
                                                :</span>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="cart-quantity">
                                                <div class="quant-input">
                                                    <div class="arrows">
                                                        <div class="arrow plus gradient"><span class="ir"><i
                                                                    class="icon fa fa-sort-asc"></i></span>
                                                        </div>
                                                        <div class="arrow minus gradient"><span class="ir"><i
                                                                    class="icon fa fa-sort-desc"></i></span>
                                                        </div>
                                                    </div>
                                                    <input style="border: 1px solid black;" type="text" value="1"
                                                        value="<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>"
                                                        name="quantity[<?php echo $row['id']; ?>]">

                                                </div>
                                            </div>
                                        </div>




                                    </div><!-- /.row -->
                                </div><!-- /.quantity-container -->
                                <style>
                                .list-inline li .bx {
                                    padding: 10px;
                                }

                                .list-inline li .bx {
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    height: 30px;
                                    width: 30px;
                                    border-radius: 50px;
                                }

                                .bxl-facebook:hover {
                                    background: #316FF6 !important;
                                    color: #fff !important;
                                }

                                .bxl-linkedin:hover {
                                    background: #0077B5 !important;
                                    color: #fff !important;
                                }

                                .bxl-instagram:hover {
                                    background: lightcoral !important;
                                    color: #fff !important;
                                }
                                </style>

                                <div class="product-social-link m-t-20 text-right">
                                    <span class="social-label"
                                        style="font-family: 'Raleway' , sans-serif;color: #000; font-size: 20px;font-weight: normal; text-transform: uppercase ;  ">
                                        Share :</span>
                                    <div class="social-icons">
                                        <ul class="list-inline">
                                            <li><a class="bx bxl-facebook" href="#"></a></li>
                                            <li><a class="bx bxl-linkedin" href="#"></a></li>
                                            <li><a class="bx bxl-instagram" href="#"></a></li>
                                        </ul><!-- /.social-icons -->
                                    </div>
                                </div>




                            </div><!-- /.product-info -->
                        </div><!-- /.col-sm-7 -->
                    </div><!-- /.row -->


                    <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                        <div class="row">
                            <div class="col-sm-3">
                                <style>
                                #product-tabs {
                                    display: flex;
                                    align-items: center;
                                    justify-content: space-between;
                                }

                                #product-tabs li {
                                    background: #F2F3F8;
                                    padding: 8px 10px !important;
                                    transition: 1ms;
                                    text-align: center !important;
                                    z-index: 999;
                                }


                                #product-tabs li.active {
                                    border: 2px solid #000;
                                }

                                #product-tabs li a {
                                    text-align: center !important;
                                    color: #000 !important;
                                    width: 100% !important;
                                    font-family: 'Raleway', sans-serif;
                                    font-size: 10px !important;
                                    font-weight: normal;
                                    padding: 8px 10px !important;
                                    color: #000 !important;
                                }
                                </style>
                                <ul id="product-tabs" class="">
                                    <li style="width: 220px !important ; " class="active"><a data-toggle="tab"
                                            href="#description"
                                            style="font-family: 'Raleway' , sans-serif; font-size: 10px;font-weight: 600 !important ;color: #000;  ">DESCRIPTION</a>
                                    </li>
                                    <li style="width: 220px !important ; "><a data-toggle="tab" href="#review"
                                            style="font-family: 'Raleway' , sans-serif; font-size: 10px;font-weight: 600 !important ; color: #000; ">REVIEW</a>
                                    </li>
                                </ul><!-- /.nav-tabs #product-tabs -->
                            </div>
                            <div class="col-sm-12 ">
                                <div class="tab-content" style="background-color: #F2F3F8;  ">

                                    <div id="description" class="tab-pane in active">
                                        <style>
                                        .productDescription {
                                            height: 50vh !important;
                                            overflow-y: auto !important;
                                        }

                                        .productDescription::-webkit-scrollbar-track {
                                            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3) !important;
                                            background-color: #F2F3F8 !important;
                                        }

                                        .productDescription:hover.productDescription::-webkit-scrollbar {
                                            display: block !important;
                                        }

                                        .productDescription::-webkit-scrollbar {
                                            display: none !important;
                                            width: 5px !important;
                                            background-color: #F2F3F8 !important;
                                            height: 5px !important;
                                        }

                                        .productDescription::-webkit-scrollbar-thumb {
                                            background-color: #F2F3F8 !important;
                                            border: 2px solid #F2F3F8 !important;
                                        }
                                        </style>
                                        <div class="product-tab productDescription"
                                            style="background:whitesmoke;padding: 30px 20px;border: 0 !important ; ">
                                            <p class="text "
                                                style="font-size: 20px  !important ; font-weight: 300 !important ;font-family: 'Raleway' , sans-serif ; ">
                                                <?php echo $row['productDescription']; ?>
                                            </p>
                                        </div>
                                    </div><!-- /.tab-pane -->

                                    <div id="review" class="tab-pane ">
                                        <div class="product-tab">
                                            <!-- /.product-reviews -->
                                            <form role="form" class="cnt-form" name="review" method="post">


                                                <div class="product-add-review"
                                                    style="background: transparent;     border: 0 !important ;">
                                                    <div class=" review-table">
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
                                                        </style>
                                                        <div class="table-responsive" style="background:transparent;">
                                                            <table class=" table " style="width: 140px !important ; ">

                                                                <thead>
                                                                    <h4 class=" title"
                                                                        style="text-align: left ; font-family: 'Raleway' , sans-serif;font-size: 30px;text-transform: uppercase      ; font-weight: normal;color: #000; ">
                                                                        Write your own review</h4>
                                                                </thead>
                                                                <tbody>
                                                                    <tr
                                                                        style="margin: 0 !important ; padding: 0 !important ; ">
                                                                        <td class=" cell-label "
                                                                            style="margin: 0 !important ; padding:0 20px !important ;  font-size:12px ;color:
                                                                        #000;font-weight: 700;text-transform:
                                                                        capitalize; font-family: 'Raleway' , sans-serif;text-transform: uppercase;text-align: left;  ">
                                                                            Quality
                                                                        </td>
                                                                        <td
                                                                            style="padding: 0 !important ;  margin: 0 !important ;    ">
                                                                            <div class=" rating1">
                                                                                <input type="radio" name="quality"
                                                                                    id="rating-5" value="5">
                                                                                <label for="rating-5"></label>
                                                                                <input type="radio" name="quality"
                                                                                    id="rating-4" value="4">
                                                                                <label for="rating-4"></label>
                                                                                <input type="radio" name="quality"
                                                                                    id="rating-3" value="3">
                                                                                <label for="rating-3"></label>
                                                                                <input type="radio" name="quality"
                                                                                    id="rating-2" value="2">
                                                                                <label for="rating-2"></label>
                                                                                <input type="radio" name="quality"
                                                                                    id="rating-1" value="1">
                                                                                <label for="rating-1"></label>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr
                                                                        style="margin: 0 !important ; padding: 0 !important ;  ">
                                                                        <td class="cell-label"
                                                                            style="margin: 0 !important ; padding: 0 20px !important ; padding: 0;margin: 0;font-size:12px ;color: #000;font-weight: 700;text-transform: capitalize;font-family: 'Raleway' , sans-serif;text-transform: uppercase; text-align: left;   ">
                                                                            Price</td>
                                                                        <td
                                                                            style="margin: 0 !important ; padding: 0 !important ; ">
                                                                            <div class=" rating2">
                                                                                <input type="radio" name="price"
                                                                                    id="rating2-5" value="5">
                                                                                <label for="rating2-5"></label>
                                                                                <input type="radio" name="price"
                                                                                    id="rating2-4" value="4">
                                                                                <label for="rating2-4"></label>
                                                                                <input type="radio" name="price"
                                                                                    id="rating2-3" value="3">
                                                                                <label for="rating2-3"></label>
                                                                                <input type="radio" name="price"
                                                                                    id="rating2-2" value="2">
                                                                                <label for="rating2-2"></label>
                                                                                <input type="radio" name="price"
                                                                                    id="rating2-1" value="1">
                                                                                <label for="rating2-1"></label>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr
                                                                        style="margin: 0 !important ; padding: 0 !important ; ">
                                                                        <td class="cell-label"
                                                                            style="margin : 0 !important ; padding: 0 20px !important ;   font-size:12px ;color: #000;font-weight: 700;text-transform: capitalize;  font-family: 'Raleway' , sans-serif;text-transform: uppercase;text-align: left;   ">
                                                                            Value</td>
                                                                        <td
                                                                            style="margin: 0 !important ;padding: 0 !important ;   ">
                                                                            <div class="rating3">
                                                                                <input type="radio" name="value"
                                                                                    id="rating3-5" value="5">
                                                                                <label for="rating3-5"></label>
                                                                                <input type="radio" name="value"
                                                                                    id="rating3-4" value="4">
                                                                                <label for="rating3-4"></label>
                                                                                <input type="radio" name="value"
                                                                                    id="rating3-3" value="3">
                                                                                <label for="rating3-3"></label>
                                                                                <input type="radio" name="value"
                                                                                    id="rating3-2" value="2">
                                                                                <label for="rating3-2"></label>
                                                                                <input type="radio" name="value"
                                                                                    id="rating3-1" value="1">
                                                                                <label for="rating3-3"></label>
                                                                            </div>
                                                                    </tr>
                                                                </tbody>
                                                            </table><!-- /.table .table-bordered -->
                                                        </div><!-- /.table-responsive -->
                                                        <!-- /.reviews -->
                                                    </div>
                                                </div><!-- /.review-table -->

                                                <div class="review-form">
                                                    <div class="form-container">

                                                        <style>
                                                        .form-group input {
                                                            height: 50px;
                                                        }

                                                        .form-group input,
                                                        .form-group textarea {
                                                            border: 2px solid gray;

                                                        }

                                                        .form-group input:focus,
                                                        .form-group textarea:focus {
                                                            border: 2px solid black !important;
                                                            outline: none !important;
                                                            box-shadow: none !important;
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
                                                                    <label for="exampleInputName"
                                                                        style="font-family: 'Raleway' , sans-serif;font-size: 13px;color: #000;font-weight: 600;text-transform: uppercase  ">Your
                                                                        Name <span class="astk">*</span></label>
                                                                    <input type="text" class="form-control txt"
                                                                        id="exampleInputName" placeholder="" name="name"
                                                                        required="required"
                                                                        style="background: transparent ;text-transform: uppercase;   ">
                                                                </div><!-- /.form-group -->
                                                                <div class="form-group col-lg-6">
                                                                    <label for="exampleInputSummary"
                                                                        style="font-family: 'Raleway' , sans-serif;font-size: 13px;color: #000;font-weight: 600;text-transform: uppercase">Summary
                                                                        <span class="astk">*</span></label>
                                                                    <input type="text" class="form-control txt"
                                                                        id="exampleInputSummary" placeholder=""
                                                                        name="summary" required="required"
                                                                        style="background: transparent ;text-transform: uppercase;   "
                                                                        maxlength="20">
                                                                </div><!-- /.form-group -->
                                                            </div>

                                                            <div class="col-md-6 col-lg-12">
                                                                <div class="form-group col-lg-12">
                                                                    <label for="exampleInputReview"
                                                                        style="font-family: 'Raleway' , sans-serif;font-size: 13px;color: #000;font-weight: 600;text-transform: uppercase; ">Review
                                                                        <span class="astk">*</span></label>

                                                                    <textarea class="form-control txt txt-review"
                                                                        id="exampleInputReview"
                                                                        style="height: 143px;background: transparent  ;text-transform: uppercase;  "
                                                                        placeholder="" name="review" required="required"
                                                                        maxlength="50"></textarea>
                                                                </div><!-- /.form-group -->
                                                            </div>
                                                        </div><!-- /.row -->

                                                        <div class="action ">
                                                            <button name="submit" class="btn " style="margin-left : 15px;  background: #fff !important;color: #000 !important ; 
        width: 96% !important;
        height: 40px !important;
        font-size: 15px !important;
        border-radius: 0 !important; border: 1px solid #000 !important;">SUBMIT
                                                                REVIEW</button>
                                                        </div><!-- /.action -->
                                                        <div class="product-reviews col-lg-12"
                                                            style="margin-top: 50px;  display: flex;align-items: center;justify-content: space-around    ;flex-wrap: wrap;  ">
                                                            <h4 class=" title col-lg-12"
                                                                style="text-align: left;  font-family: 'Raleway' , sans-serif; font-size: 30px;text-transform: uppercase      ; font-weight: normal;color: #000; ">
                                                                Customer Reviews
                                                            </h4>
                                                            <?php $qry = mysqli_query($con, "select * from productreviews where productId='$pid'");
                                                                while ($rvw = mysqli_fetch_array($qry)) {
                                                                    ?>

                                                            <div class="reviews m-t-10 col-lg-5 "
                                                                style="border: solid 1px #000; margin-left:10px; padding: 10px;border-radius: 5px;background:#F2F3F8 ;   ">
                                                                <div class="review col-lg-12 ">
                                                                    <div class="review-title"
                                                                        style="display: flex;align-items: center;justify-content: space-between;  ">
                                                                        <span class="summary"
                                                                            style="font-family: 'Raleway' , sans-serif;font-size: 13px ;font-weight: 400 !important ;color: #000 ;   "><?php echo htmlentities($rvw['summary']); ?></span><span
                                                                            class="date">
                                                                            <i
                                                                                class='bx bx-time-five'></i><span><?php echo substr(htmlentities($rvw['reviewDate']), 0, 10); ?></span></span>
                                                                    </div>

                                                                    <div class="text"
                                                                        style="    font-family: 'Raleway' , sans-serif;font-size: 13px ;font-weight: 400 !important ;color: #000 ;text-transform: uppercase;    ">
                                                                        <?php echo htmlentities($rvw['review']); ?>
                                                                    </div>
                                                                    <div class="text"
                                                                        style=" margin-top: 10px; display: flex;align-items: center;justify-content: space-between;font-family:  sans-serif,'Poppins';font-size: 13px ;font-weight: 400 !important ;color: #000 ;text-transform: uppercase;     ">
                                                                        <span
                                                                            style="    font-family: 'Raleway' , sans-serif">
                                                                            Quality :</span>
                                                                        <?php echo htmlentities($rvw['quality']); ?>
                                                                        Star
                                                                    </div>
                                                                    <div class="text"
                                                                        style="display: flex;align-items: center;justify-content: space-between;font-family:  sans-serif,'Poppins';font-size: 13px ;font-weight: 400 !important ;color: #000 ;text-transform: uppercase;     ">
                                                                        <span
                                                                            style="    font-family: 'Raleway' , sans-serif">
                                                                            Price :</span>
                                                                        <?php echo htmlentities($rvw['price']); ?>
                                                                        Star
                                                                    </div>
                                                                    <div class=" text"
                                                                        style="display: flex;align-items: center;justify-content: space-between;font-family:  sans-serif,'Poppins';font-size: 13px ;font-weight: 400 !important ;color: #000 ;text-transform: uppercase;     ">
                                                                        <span
                                                                            style="    font-family: 'Raleway' , sans-serif">
                                                                            value :</span>

                                                                        <?php echo htmlentities($rvw['value']); ?>
                                                                        Star
                                                                    </div>
                                                                    <div class="author m-t-15"><i
                                                                            class='bx bx-edit-alt'></i>
                                                                        <span class="name"
                                                                            style="font-family: 'Raleway' , sans-serif;font-size: 13px ;font-weight: 500 !important ;color: #000 ;text-transform: uppercase;     "><?php echo htmlentities($rvw['name']); ?></span>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <?php } ?>

                                            </form><!-- /.cnt-form -->
                                        </div><!-- /.form-container -->
                                    </div><!-- /.review-form -->

                                </div><!-- /.product-add-review -->

                            </div><!-- /.product-tab -->
                        </div><!-- /.tab-pane -->



                    </div><!-- /.tab-content -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.product-tabs -->

        <?php $cid = $row['category'];
            $subcid = $row['subCategory'];
                } ?>
        <!-- ============================================== UPSELL PRODUCTS ============================================== -->
        <div class="section featured-product wow fadeInUp">
            <h3 class="section-title"
                style="font-family: 'Raleway' , sans-serif;font-size:20px;font-weight:400 ;color: #000;border-color: #000;   ">
                Realted
                Products
            </h3>
            <div class="" style="display: flex;align-items: center;justify-content: space-between;flex-wrap: wrap; ">

                <?php
                $qry = mysqli_query($con, "select * from products where subCategory='$subcid' and category='$cid'");
                while ($rw = mysqli_fetch_array($qry)) {
                    ?>
                <style>
                .products,
                .product {
                    width: 250px !important;
                    margin-top: 50px !important;
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
                                <div class="image"
                                    style="background:transparent !important;width: 250px; height: 250px; ">
                                    <a href="product-details.php?pid=<?php echo htmlentities($rw['id']); ?>"><img
                                            src="assets/images/blank.gif"
                                            data-echo="admin/productimages/<?php echo htmlentities($rw['id']); ?>/<?php echo htmlentities($rw['productImage1']); ?>"
                                            width="100%" height="100%" alt=""></a>
                                </div><!-- /.image -->


                            </div><!-- /.product-image -->


                            <div class="product-info text-left"
                                style="width:250px !important; margin-top: -8px !important;padding: 0 !important;">
                                <h3 class="name"><a style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:12px;font-weight:300 ;"
                                        href="product-details.php?pid=<?php echo htmlentities($rw['id']); ?>"><?php echo htmlentities($rw['productName']); ?></a>
                                </h3>
                                <div class="product-price" style="margin-top: -15px; ">
                                    <span class="price" style="font-size: 11px;   color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:300">
                                        MRP.<?php echo htmlentities($rw['productPrice']); ?> </span>


                                </div><!-- /.product-price -->

                            </div><!-- /.product-info -->

                        </div><!-- /.product -->

                    </div><!-- /.products -->
                </div><!-- /.item -->
                <?php } ?>


            </div><!-- /.home-owl-carousel -->
        </div><!-- /.section -->


        <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

    </div><!-- /.col -->
    <div class="clearfix"></div>
    </div>
    <?php include('includes/brands-slider.php'); ?>
    </div>
    </div>
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