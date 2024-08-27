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

    <title>My Wishlist</title>
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
    <link rel="shortcut icon" href="assets/images/favicon.ico">
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
        <div class="container">
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
                                $ret = mysqli_query($con, "select products.productName as pname,products.productName as proid,products.productImage1 as pimage,products.productPrice as pprice,wishlist.productId as pid,wishlist.id as wid from wishlist join products on products.id=wishlist.productId where wishlist.userId='" . $_SESSION['id'] . "'");
                                $num = mysqli_num_rows($ret);
                                if ($num > 0) {
                                    while ($row = mysqli_fetch_array($ret)) {

                                        ?>
                            <div class="m-t-20 col-lg-4" style="
                                    display: flex;align-items: center;justify-content: space-between  ;    ">
                                <div class="col-card col-lg-12" style="
                                    display: flex;align-items: center;justify-content: start  ;    ">
                                    <div class="col-sm-12"
                                        style=" width: 80px;height: 80px; background: #F2F3F8;  ;display: flex;align-items: center;justify-content: center;    ">
                                        <img src="
                                            admin/productimages/<?php echo htmlentities($row['pid']); ?>/<?php echo htmlentities($row['pimage']); ?>"
                                            alt="<?php echo htmlentities($row['pname']); ?>" width="70px" height="70px">
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="product-name"><a
                                                style="font-family: 'Raleway', sans-serif !important;color: #000 !important ;font-size: 12px; "
                                                href="product-details.php?pid=<?php echo htmlentities($pd = $row['pid']); ?>"><?php echo htmlentities($row['pname']); ?></a>
                                        </div>
                                        <?php $rt = mysqli_query($con, "select * from productreviews where productId='$pd'");
                                                    $num = mysqli_num_rows($rt); {
                                                        ?>


                                        <?php } ?>
                                        <div class="price" style=" font-family: sans-serif, ' Poppins' !important;">
                                            Rs.
                                            <?php echo htmlentities($row['pprice']); ?>.00
                                        </div>
                                        <div class="btn-group">
                                            <style>
                                            .btn-group {
                                                display: flex;
                                                align-items: center;
                                                justify-content: start;
                                            }
                                            </style>
                                            <a href="my-wishlist.php?page=product&action=add&id=<?php echo $row['pid']; ?>"
                                                class="btn-upper btn btn-primary"
                                                style="background: #F2F3F8 !important;color: black;  width: 80px !important;height: 30px !important;font-size: 12px !important;border-radius: 0 !important;display: flex;align-items: center;justify-content: center;border: 1px Solid black;">
                                                Add </a>
                                            <a href="my-wishlist.php?del=<?php echo htmlentities($row['wid']); ?>"
                                                onClick="return confirm('Are you sure you want to delete?')"
                                                class="btn-upper btn btn-primary"
                                                style="margin-left: 20px; background: #F2F3F8 !important;color: black;  width: 30px !important;height: 30px !important;font-size: 12px !important;border-radius: 0 !important;display: flex;align-items: center;justify-content: center;border: 1px Solid black; ">
                                                <i class='bx bxs-trash' style="font-size: 15px;  "></i>
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
            <?php include('includes/brands-slider.php'); ?>
        </div>
    </div>
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