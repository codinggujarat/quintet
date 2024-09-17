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
    <title>Document</title>
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
        .body-content {
            margin: 0 !important;
            padding: 0 !important;
        }
        </style>
        <div class="search_Box">
            <div class="top-search-holder wow fadeInUpBig ">
                <div class="search-area">
                    <form name="search" method="post" action="search-result.php" autocomplete="off">
                        <div class="control-group ">
                            <input class="search-field" name="product"
                                placeholder="Search for an item, colour, collection..." required="required" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class=" btn-card-box">
            <div class="btn-card">
                <i id="MYGRID6" class='bx bx-square'></i>
                <i id="MYGRID2" class='bx bx-grid-alt icon'></i>
                <i id="MYGRID12" class='bx bx-grid'></i>
            </div>
        </div>
        <style>
        .search_Box {
            position: sticky;
            top: 25%;
            margin-top: 200px;
        }

        .btn-card-box {
            padding: 20px;
            position: sticky;
            top: 33%;
            background: transparent;
            z-index: 999;
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
            background: #f2f3f8 !important;
            width: 300px;
            height: 100%;
            border: 1px solid black;
        }

        @media (max-width: 767.98px) {
            .card .image {
                width: 220px;
            }
        }

        @media (max-width: 500px) {
            .card .image {
                width: 150px;
            }
        }

        .box-card {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            flex-wrap: wrap;
            margin: 10px;
            height: 100%;

        }

        .responsiveCard {
            height: 100vh;
            width: 100%;
        }
        </style>
        <div class="box-card wow fadeInUpBig ">
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
        <script>
        document.getElementById('MYGRID6').addEventListener('click', function() {
            var boxes = document.querySelectorAll(
                '.responsiveCard'); // Select all elements with the class 'myBox'
            boxes.forEach(function(box) {
                box.style.width = "100%"; // Toggle 'active' class for each box
            });
        });
        document.getElementById('MYGRID2').addEventListener('click', function() {
            var boxes = document.querySelectorAll(
                '.responsiveCard'); // Select all elements with the class 'myBox'
            boxes.forEach(function(box) {
                box.style.width = "240px"; // Toggle 'active' class for each box
            });
        });
        document.getElementById('MYGRID12').addEventListener('click', function() {
            var boxes = document.querySelectorAll(
                '.responsiveCard'); // Select all elements with the class 'myBox'
            boxes.forEach(function(box) {
                box.style.width = "150px"; // Toggle 'active' class for each box
            });
        });
        </script>
    </div>

    <style>
    .control-group form {

        display: flex;
        align-items: center;
        justify-content: start;
        width: 100%;
    }

    .control-group .search-field {
        width: 110% !important;
        height: 100% !important;
        padding: 20px !important;
        color: #000 !important;
        font-weight: 400 !important;
        border-left: 0;
        border-right: 0;
        text-transform: uppercase;
    }

    .control-group .search-field::placeholder {
        color: #000 !important;
        font-weight: 300;
        font-size: 12px;
        text-transform: uppercase;
    }
    </style>
    <?php include('includes/footer.php'); ?>

</body>

</html>