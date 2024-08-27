<?php
session_start();
error_reporting(0);
include('includes/config.php');
$cid = intval($_GET['cid']);
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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="cnt-home " style="background: white !important;">

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

                    <style>
                    .sidebar {
                        position: sticky !important;
                        top: 20px !important;
                    }

                    @media only screen and (max-width: 800px) {
                        .sidebar {
                            position: relative !important;
                        }
                    }
                    </style>
                    <!-- ================================== TOP NAVIGATION ================================== -->
                    <div class="side-menu animate-dropdown outer-bottom-xs">
                        <div class=" side-menu animate-dropdown outer-bottom-xs"
                            style="border: 1px solid black !important ;box-shadow: none !important ; outline:none !important;background: transparent   !important;  ">
                            <div class="head"
                                style="padding: 8px 13px;  font-family: 'Raleway',sans-serif !important;color: #000;box-shadow: none !important ;font-weight: 600;  font-size: 13px !important  ;background: transparent  !important;border-bottom: 1px solid #000  ;">
                                Sub Categories</div>

                            <nav class=" yamm megamenu-horizontal" role="navigation">
                                <ul class="nav">
                                    <li class="dropdown menu-item">
                                        <?php $sql = mysqli_query($con, "select id,subcategory  from subcategory where categoryid='$cid'");

                                        while ($row = mysqli_fetch_array($sql)) {
                                            ?>
                                        <a href="sub-category.php?scid=<?php echo $row['id']; ?>"
                                            class=" dropdown-toggle">
                                            <?php echo $row['subcategory']; ?>
                                        </a>
                                        <?php } ?>

                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div><!-- /.side-menu -->
                    <style>
                    @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');

                    .sidebar .side-menu nav .nav>li>a,
                    .sidebar .side-menu nav .nav>li>a.dropdown-toggle::after {
                        color: #000 !important;
                        font-size: 13px !important;
                        font-weight: 400 !important;
                        text-transform: uppercase !important;
                        font-family: 'Raleway', sans-serif !important;
                        padding: 8px 13px;
                    }

                    .sidebar .side-menu nav .nav>li>a.dropdown-toggle::after {
                        display: none !important;
                    }

                    .menu-item {
                        background: transparent !important;
                    }

                    .sidebar .side-menu nav .nav>li>a:hover,
                    .sidebar .side-menu nav .nav>li>a:focus {
                        background: transparent !important;
                        border: 0px solid #555 !important;
                        color: #000 !important;
                    }
                    </style>
                    <!-- ================================== TOP NAVIGATION : END ================================== -->
                    <div class="sidebar-module-container">
                        <h3 class="section-title"
                            style="font-size: 13px;  text-transform: uppercase !important;
                        font-family: 'Raleway', sans-serif !important;font-weight: 600 !important ;  color: #000;   font-weight: 400; ">
                            shopping
                            by
                        </h3>
                        <div class="sidebar-filter">
                            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                            <div class="sidebar-widget wow fadeInUp outer-bottom-xs " style="border: 1px solid #000;">
                                <div class="widget-header" style="background:transparent ;padding:0; ">
                                    <h4 class="widget-title"
                                        style=" font-family: 'Raleway', sans-serif !important;text-transform: uppercase ; color: #000;font-size: 13px;padding: 8px 13px; font-weight: 600;   ">
                                        Category</h4>
                                </div>
                                <div class="sidebar-widget-body m-t-10" style="border-top: 1px solid black;margin: 0;">
                                    <?php $sql = mysqli_query($con, "select id,categoryName  from category");
                                    while ($row = mysqli_fetch_array($sql)) {
                                        ?>
                                    <div class="accordion">
                                        <div class="accordion-group" style="padding: 0 !;  ">
                                            <div class="accordion-heading"
                                                style="display: flex;align-items: center;justify-content: space-between;height: 40px;padding: 0 !important ;  ">
                                                <a style=" font-family: 'Raleway', sans-serif !important;width: 100%; color: #000 !important ; font-weight: 400 !important ;font-size: 13px; text-transform: uppercase; padding: 0px 13px;    "
                                                    href="category.php?cid=<?php echo $row['id']; ?>" class="">
                                                    <?php echo $row['categoryName']; ?>
                                                </a>
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
                <div class='col-md-9' style="background-color: white !important ;">
                    <!-- ========================================== SECTION – HERO ========================================= -->

                    <div id="category" class="category-carousel "
                        style="display: flex;align-items: bacseline;justify-content: space-between; ">
                        <div class="item" style="height: 20px !important ;margin-top: -20px;    ">
                            <div class="image">
                                <div class=""
                                    style=" display: flex; text-align: left; height: 100px; background-color: transparent ; ">
                                    <h1
                                        style="font-family: 'Raleway', sans-serif !important; text-transform:uppercase    ; color: #fff; font-size: 15px;font-weight: 600 !important;color: #000; ">
                                        category <i class='bx bx-chevron-right' style="font-size: 15px;"></i>
                                    </h1>
                                    <?php $sql = mysqli_query($con, "select categoryName  from category where id='$cid'");
                                    while ($row = mysqli_fetch_array($sql)) {
                                        ?>

                                    <div class="excerpt ">
                                        <h1
                                            style="font-family:  'Raleway', sans-serif  !important;  text-transform: uppercase   ; color: lightgray; font-size: 15px ; text-align: center important; font-weight: 600 !important;margin-left: 5px; color: #000;">
                                            <?php echo htmlentities($row['categoryName']); ?>
                                        </h1>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class=" search-result-container">
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product  inner-top-vs">
                                    <div class=""
                                        style="display: flex;align-items: center;justify-content: space-evenly ;flex-wrap: wrap;     ">
                                        <?php
                                        $ret = mysqli_query($con, "select * from products where category='$cid ' ORDER BY RAND()");
                                        $num = mysqli_num_rows($ret);
                                        if ($num > 0) {
                                            while ($row = mysqli_fetch_array($ret)) { ?>

                                        <div class=" wow fadeInUp" style="margin-top: 20px;  ">
                                            <style>
                                            @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');


                                            @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');


                                            .products,
                                            .product {
                                                width: 250px !important;
                                                margin-top: 10px;

                                            }

                                            .name a {
                                                font-size: 12px !important;
                                            }


                                            @media only screen and (max-width: 450px) {

                                                .products,
                                                .product {
                                                    width: 140px !important;
                                                    overflow: hidden !important;
                                                    text-overflow: ellipsis !important;
                                                    white-space: nowrap !important;
                                                }

                                                .image {
                                                    width: 100% !important;
                                                    height: 100% !important;
                                                }

                                                .addtocart {
                                                    display: none !important;
                                                }


                                                .name {
                                                    width: 140px !important;
                                                    overflow: hidden !important;
                                                    text-overflow: ellipsis !important;
                                                    white-space: nowrap !important;
                                                }

                                                .name a {
                                                    font-size: 10px !important;
                                                }
                                            }


                                            @media only screen and (max-width: 350px) {

                                                .products,
                                                .product {
                                                    width: 100% !important;
                                                }

                                                .name {
                                                    width: 100% !important;

                                                }

                                                .image {
                                                    width: 100% !important;
                                                    height: 100% !important;
                                                }
                                            }
                                            </style>

                                            <div class="products">

                                                <div class="product" id="product">
                                                    <div class="product-image" style="background:#F2F3F8 ;">
                                                        <div class="image"
                                                            style="background:transparent !important;   ">
                                                            <a
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                    width="100%" height="100%" alt=""></a>
                                                        </div><!-- /.image -->


                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left"
                                                        style="width:200px !important; margin-top: 5px !important;padding: 0 !important;">
                                                        <h3 class="name"><a
                                                                style="font-family: sans-serif, ' Poppins'
                                                !important;font-size:10px !important ;font-weight:300 !important ; text-transform: uppercase; color: #000; "
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                        </h3>

                                                        <div class="product-price" style="margin-top: -10px; ">
                                                            <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:400;font-size: 11px; ">MRP:
                                                                Rs.<?php echo htmlentities($row['productPrice']); ?>
                                                            </span>
                                                        </div><!-- /.product-price -->

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

</body>

</html>