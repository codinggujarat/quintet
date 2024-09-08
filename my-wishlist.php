<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:login.php');
} else {
    // Code forProduct deletion from  wishlist	
    $wid = intval($_GET['del']);
    if (isset($_GET['del'])) {
        $query = mysqli_query($con, "delete from wishlist where id='$wid'");
    }


    if (isset($_GET['action']) && $_GET['action'] == "add") {
        $id = intval($_GET['id']);
        $query = mysqli_query($con, "delete from wishlist where productId='$id'");
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']++;
        } else {
            $sql_p = "SELECT * FROM products WHERE id={$id}";
            $query_p = mysqli_query($con, $sql_p);
            if (mysqli_num_rows($query_p) != 0) {
                $row_p = mysqli_fetch_array($query_p);
                $_SESSION['cart'][$row_p['id']] = array("quantity" => 1, "price" => $row_p['productPrice']);
                header('location:my-wishlist.php');
            } else {
                $message = "Product ID is invalid";
            }
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

    <title>FAVOURITES - QUINTET</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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


    <div class="body-content outer-top-bd">
        <div class="" style="  padding: 0;margin-left:50px;margin-right:50px;  ">
            <div class="my-wishlist-page inner-bottom-sm">
                <div class="row">
                    <div class=" my-wishlist">
                        <style>
                        .wishlist {
                            width: 100%;
                        }
                        </style>
                        <div class="wishlist col-sm-12 ">
                            <div>
                                <h1
                                    style="font-family: 'Raleway',sans-serif;font-size: 14px !important ;color: #000;text-transform: uppercase ;font-weight: 500 !important ;">
                                    favourites
                                    <i class='fa-regular fa-bookmark'
                                        style="font-size: 15px ;color:black ;   margin-left: 10px; "></i>
                                </h1>
                            </div>
                            <?php
                                $ret = mysqli_query($con, "select products.productAvailability as pAvailability ,products.productName as pname,products.productName as proid,products.productImage1 as pimage,products.productPrice as pprice,wishlist.productId as pid,wishlist.id as wid from wishlist join products on products.id=wishlist.productId where wishlist.userId='" . $_SESSION['id'] . "'");
                                $num = mysqli_num_rows($ret);
                                if ($num > 0) {
                                    while ($row = mysqli_fetch_array($ret)) {

                                ?>
                            <div class="m-t-20 col-xxl-2 col-lg-2 col-md-3 col-sm-4 col-xs-12 mywishlistcard">
                                <style>
                                .mywishlistcard {
                                    display: flex;
                                    align-items: center;
                                    justify-content: start;
                                    flex-wrap: wrap;
                                }

                                @media only screen and (max-width: 800px) {
                                    .mywishlistcard {
                                        justify-content: center;
                                    }
                                }

                                .mywishlistcardimage {
                                    width: 220px !important;
                                    height: 100% !important;
                                    background: white !important;
                                    object-fit: cover;
                                }
                                </style>
                                <div class="col-card">
                                    <div class="mywishlistcardimage"> <img
                                            src="
                                        admin/productimages/<?php echo htmlentities($row['pid']); ?>/<?php echo htmlentities($row['pimage']); ?>"
                                            alt="<?php echo htmlentities($row['pname']); ?>" width="100%" height="100%">
                                    </div>
                                    <div class="mywishlistcardimage">
                                        <div class="product-name " style="padding:5px 10px;">
                                            <a style="font-family: 'Poppins', sans-serif !important;font-weight: 500 !important;color: #000 !important ;font-size: 11px !important;"
                                                href="product-details.php?pid=<?php echo htmlentities($pd = $row['pid']); ?>"><?php echo htmlentities($row['pname']); ?></a>
                                        </div>
                                        <?php $rt = mysqli_query($con, "select * from productreviews where productId='$pd'");
                                                    $num = mysqli_num_rows($rt); {
                                                    ?>


                                        <?php } ?>
                                        <div class="price"
                                            style="padding:0 10px; font-family: sans-serif, ' Poppins' !important;">
                                            Rs.
                                            <?php echo htmlentities($row['pprice']); ?>.00
                                        </div>
                                        <div class="btn-group ">
                                            <style>
                                            .btn-group {
                                                display: flex;
                                                align-items: center;
                                                justify-content: start;
                                            }
                                            </style>
                                            <?php if ($row['pAvailability'] == 'In Stock') { ?>
                                            <a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                class="btn-upper btn btn-primary col-sm-6 m-t-10"
                                                style="background: #fff !important;padding: 10px;color: black;  width: 100% !important;height: 30px !important;font-size: 12px !important;border-radius: 0 !important;display: flex;align-items: center;justify-content: center;border: 1px Solid black;">
                                                ADD </a>
                                            <?php } else { ?>

                                            <a href="#" class="btn-upper btn btn-primary col-sm-6 m-t-10"
                                                style="cursor:no-drop !important;background: #fff !important;padding: 10px;color: black;  width: 100% !important;height: 30px !important;font-size: 12px !important;border-radius: 0 !important;display: flex;align-items: center;justify-content: center;border: 1px Solid black;">
                                                Out of Stock</a>
                                            <?php } ?>
                                            <a href="my-wishlist.php?del=<?php echo htmlentities($row['wid']); ?>"
                                                onClick="return confirm('Are you sure you want to Remove?')"
                                                class="btn-upper btn btn-primary col-sm-6 m-t-10"
                                                style=" margin-left: 20px; background: #fff !important;color: black;  width: 30px !important;height: 30px !important;font-size: 12px !important;border-radius: 0 !important;display: flex;align-items: center;justify-content: center;border: 1px Solid black; ">
                                                <i class="fa-solid fa-bookmark" style="font-size: 10px;  "></i>
                                            </a>


                                        </div>
                                    </div>
                                </div>

                            </div>
                            <?php }
                                } else { ?>
                            <div style="height: 50vh ; ">
                                <div>
                                    <h4
                                        style="font-size: 15px;font-weight: 300 !important ;color: black; text-transform: uppercase; ">
                                        Your shopping basket is empty
                                    </h4>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
        </div>
    </div>
    <?php include('includes/brands-slider.php'); ?>
    <?php include('includes/footer.php'); ?>
    <script src="assets/js/jquery-1.11.1.min.js">
    </script>

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
<?php } ?>