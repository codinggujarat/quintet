<?php
session_start();
error_reporting(0);
include('includes/config.php');
$cid = intval($_GET['scid']);
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
// COde for Wishlist
if (isset($_GET['pid']) && $_GET['action'] == "wishlist") {
    if (strlen($_SESSION['login']) == 0) {
        header('location:login.php');
    } else {
        mysqli_query($con, "insert into wishlist(userId,productId) values('" . $_SESSION['id'] . "','" . $_GET['pid'] . "')");
        echo "<script>alert('Product aaded in wishlist');</script>";
        header('location:my-wishlist.php');
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

    <title>Product Category</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Customizable CSS -->
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
    <!-- box-icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

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
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row outer-bottom-sm'>
                <div class='col-md-3 sidebar'>
                    <!-- ================================== TOP NAVIGATION ================================== -->
                    <!-- ================================== TOP NAVIGATION : END ================================== -->
                    <div class="sidebar-module-container" style="margin-top: -20px;">
                        <h3 class="section-title"
                            style="font-family: 'Raleway',sans-serif  !important;text-transform: uppercase ;  color: #000;font-weight: 400;    ">
                            shopping by</h3>
                        <div class="sidebar-filter">
                            <style>
                            @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');
                            </style>
                            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                            <div class="sidebar-widget wow fadeInUp outer-bottom-xs ">
                                <div class="widget-header"
                                    style="background:transparent ;border: 1px solid black;border-bottom: 0;  ">
                                    <h4 class="widget-title"
                                        style="font-family: 'Raleway',sans-serif  !important;text-transform: uppercase ; color: #000;font-size: 15px;padding: 5px;  font-weight: 400;  ">
                                        Category</h4>
                                </div>
                                <div class="sidebar-widget-body m-t-10" style="border: 1px solid black;margin: 0;">
                                    <?php $sql = mysqli_query($con, "select id,categoryName  from category");
                                    while ($row = mysqli_fetch_array($sql)) {
                                    ?>
                                    <div class="accordion">
                                        <div class="accordion-group">
                                            <div class="accordion-heading"
                                                style="display: flex;align-items: center;justify-content: space-between;height: 40px;padding: 12px;  ">
                                                <a style="font-family: 'Raleway',sans-serif  !important;width: 100%; font-size: 17px;color: #000 !important ; font-weight: 400 !important ;font-size: 15px;text-transform: uppercase;     "
                                                    href="category.php?cid=<?php echo $row['id']; ?>" class="">
                                                    <?php echo $row['categoryName']; ?>
                                                </a>
                                                <i class='bx bx-plus' style="color:black;font-size: 17px;"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div><!-- /.sidebar-widget-body -->
                            </div><!-- /.sidebar-widget -->




                            <!-- ============================================== COLOR: END ============================================== -->

                        </div><!-- /.sidebar-filter -->
                    </div><!-- /.sidebar-module-container -->
                </div><!-- /.sidebar -->
                <div class='col-md-9'>
                    <!-- ========================================== SECTION – HERO ========================================= -->

                    <div id="category" class="category-carousel hidden-xs">
                        <div class="item" style="height: 20px !important ;margin-top: -20px; ">
                            <div class="image">
                                <div class=""
                                    style=" display: flex; text-align: left; height: 100px; background-color: transparent ; ">
                                    <h1
                                        style="font-family: 'Raleway' sans-serif !important; text-transform:uppercase    ; color: #fff; font-size: 25px;font-weight: 300 !important;color: #000; ">
                                        Sub category :
                                    </h1>
                                    <?php $sql = mysqli_query($con, "select subcategory  from subcategory where id='$cid'");
                                    while ($row = mysqli_fetch_array($sql)) {
                                    ?>

                                    <div class="excerpt hidden-sm hidden-md">
                                        <h1
                                            style="font-family:  'Raleway' sans-serif  !important;  text-transform: uppercase   ; color: lightgray; font-size: 25px; text-align: center important; font-weight: 300 !important;margin-left: 10px; color: #000;">
                                            <?php echo htmlentities($row['subcategory']); ?>
                                        </h1>
                                    </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="search-result-container">
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product  inner-top-vs">
                                    <div class="row">
                                        <?php
                                        $ret = mysqli_query($con, "select * from products where subCategory='$cid' ORDER BY RAND()");
                                        $num = mysqli_num_rows($ret);
                                        if ($num > 0) {
                                            while ($row = mysqli_fetch_array($ret)) { ?>
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
                                        <div class="col-sm-6 col-md-4 wow fadeInUp" style="margin-top: 20px; ">
                                            <div class="products">

                                                <div class="product">
                                                    <div class="product-image" style="background:#F2F3F8 !important;">
                                                        <div class="image"
                                                            style="background:transparent !important;width: 250px; height: 250px;  ">
                                                            <a
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    width="100%" height="100%" alt=""></a>
                                                        </div><!-- /.image -->


                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left"
                                                        style="width:250px !important; margin-top: -20px !important;padding: 0 !important;">
                                                        <h3 class="name"><a
                                                                style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:11px;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                        </h3>

                                                        <div class="product-price" style="margin-top: -10px; ">
                                                            <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                                Rs.<?php echo htmlentities($row['productPrice']); ?>
                                                            </span>
                                                        </div><!-- /.product-price -->
                                                        <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                                        <div class="action " style="width: 100%;  "><a
                                                                href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="lnk btn btn-primary col-lg-12"
                                                                style="font-size: 15px; text-transform: uppercase;font-family: 'Raleway', sans-serif !important;background:transparent ; color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;    height: 40px !important ;">
                                                                Add </a>
                                                        </div>
                                                        <?php } else { ?>
                                                        <div class=" action" style="color:red ;width: 100%; ">
                                                            <button class="lnk btn btn-primary col-lg-12"
                                                                style="font-size: 15px;text-transform: uppercase;font-family: 'Raleway', sans-serif !important;color: #000 !important ;border:1px solid #000 !important;  border-radius:0;display: flex;align-items: center;justify-content: center;cursor: no-drop;background:transparent  !important ; display: flex;align-items: center;justify-content: center;    height: 40px !important ; ">
                                                                Out of Stock</button>
                                                        </div>
                                                        <?php } ?>
                                                    </div><!-- /.product-info -->

                                                </div><!-- /.product -->

                                            </div><!-- /.products -->
                                        </div>
                                        <?php }
                                        } else { ?>

                                        <div class="col-sm-6 col-md-4 wow fadeInUp">
                                            <h3>No Product Found</h3>
                                        </div>

                                        <?php } ?>










                                    </div><!-- /.row -->
                                </div><!-- /.category-product -->

                            </div><!-- /.tab-pane -->



                        </div><!-- /.search-result-container -->

                    </div><!-- /.col -->
                </div>
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

</html>