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
        } else {
            $message = "Product ID is invalid";
        }
    }
    echo "<script>alert('Product has been added to the cart')</script>";
    echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEARCH</title>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- animated  -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />

    <link rel="stylesheet" href="lib/animate/animate.css">
    <link rel="stylesheet" href="lib/animate/animate.min.css">
    <script src="lib/wow/wow.js"></script>
    <script src="lib/wow/wow.js"></script>
</head>

<body class="cnt-home" style="background: white !important;">
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

    <div class="body-content outer-top-xs">
        <style>
        .searchBoxSideBar {
            display: none;
        }

        .body-content {
            margin: 0 !important;
            padding: 0 !important;
        }

        .marquee {
            margin: 0em 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        .marquee-box-one {
            overflow: hidden;
            position: relative;
            display: flex;
            align-items: center;
            width: 500px;
            margin-bottom: 20px;
        }

        .marquee-content-one {
            display: flex;
            gap: 20px;
            animation: scroll-one 120s linear infinite;
        }

        .marquee-content-one {
            background-color: #fff;
        }

        .marquee-box-two {
            overflow: hidden;
            position: relative;
            display: flex;
            align-items: center;
            margin: 3em 0 6em 0;
        }


        .marquee-text {
            white-space: nowrap;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 400;
            flex-shrink: 0;
            font-family: 'Poppins', sans-serif;
            padding: 7px;
            border: 1px solid black;
            color: #000;
            display: flex;
            align-items: center;
            user-select: none;
        }

        .marquee-text:hover {
            color: gray;
            border: 1px solid gray;

        }

        @keyframes scroll-one {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        @keyframes scroll-two {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(0);
            }
        }
        </style>
        <div class="search_Box">
            <div class="top-search-holder">
                <h1>What are you looking for?</h1>

                <div class="marquee">
                    <div class="marquee-box-one">
                        <div class="marquee-content-one">
                            <?php $sql = mysqli_query($con, "select id,subcategory  from subcategory where categoryid=8 OR categoryid=10 OR categoryid=29");

                            while ($row = mysqli_fetch_array($sql)) {
                            ?>
                            <a href="sub-category.php?scid=<?php echo $row['id']; ?>"
                                style="width: 100%; text-align: left !important; display: flex !important;align-items: start !important; justify-content: start !important;   ">
                                <h2 class="marquee-text"><?php echo htmlentities($row['subcategory']); ?></h2>
                            </a>
                            <?php } ?>
                        </div>
                    </div> <!-- marquee-box-one -->

                </div> <!-- marquee -->
                <div class="search-area">
                    <form name="search" method="post" action="search-result.php" autocomplete="off">
                        <div class="control-group searchgroup">
                            <input class="   " name="product" placeholder="Search ..." required="required" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <style>
        .top-search-holder h1 {
            font-size: 18px;
            font-family: 'Poppins', sans-serif;
            color: #000;
            font-weight: 300;
            text-align: center;
            margin-top: 200px;
            margin-bottom: 20px;
        }

        .btn-card-box {
            padding: 20px;
            background: transparent;
            z-index: 999;
        }

        @media only screen and (max-width: 1200px) {
            .search_Box {
                top: 10%;
                margin-top: 0px;
            }

            .btn-card-box {
                top: 9.5%;
            }

        }

        .btn-card {
            display: flex;
            align-items: center;
            justify-content: end;
            padding: 0px 20px;
        }

        .btn-card i {
            font-size: 23px;
            margin-left: 10px;
        }

        .card .image {
            width: auto;
            height: 100%;
            border: 1px solid black;
        }


        .box-card {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            grid-auto-rows: auto;
            width: 100%;
        }

        @media only screen and (max-width: 1200px) {
            .box-card {
                grid-template-columns: repeat(5, 1fr);
            }
        }

        @media only screen and (max-width: 1000px) {
            .box-card {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media only screen and (max-width: 550px) {

            .box-card {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        .responsiveCard {
            height: 100vh;
            width: 100%;
        }

        .box-card .SearchHeading {
            padding: 20px;
            font-size: 12px;
            color: #000;
            font-weight: 300;
            font-family: 'Poppins', sans-serif;
            text-transform: uppercase;
        }
        </style>
        <div class="box-card ">
            <h1 class="SearchHeading">You might be interested in</h1>
        </div>
        <div class="box-card ">
            <?php
            $ret = mysqli_query($con, "SELECT * FROM products  where category ORDER BY RAND() ");
            while ($row = mysqli_fetch_array($ret)) {
                # code...
            ?>
            <div class="card ">
                <div class="image  responsiveCard">
                    <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                        <img src=" admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                            width=" 100%" height="100%" alt=""></a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <style>
    .search-area {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
    }

    .search-area form {
        width: 400px;
    }

    .searchgroup input {
        width: 100% !important;
        height: 100% !important;
        color: #000 !important;
        font-weight: 400 !important;
        border: 1px solid black;
        text-transform: uppercase;
        border-right: 0 !important;
        border-top: 0 !important;
        border-left: 0 !important;
        padding: 20px 170px;
    }



    .searchgroup input::placeholder {
        color: #000 !important;
        font-weight: 300;
        font-size: 15px;
        text-transform: uppercase;
    }

    .searchgroup input:focus::placeholder {
        display: none;
    }

    .searchgroup input:focus,
    .searchgroup input:active {
        border: none !important;

    }
    </style>
    <?php include('includes/footer.php'); ?>

</body>

</html>