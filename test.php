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
    <meta charset="utf-8" />
    <title>Swiper demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Demo styles -->
    <style>
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .swiper {
        width: 100%;
        height: 100vh;
    }

    .swiper-slide a {
        text-align: center;
        font-size: 18px;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .swiper-slide a img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .swiper-v {
        background: #eee;
    }

    @media (max-width: 1100.98px) {
        .swiper-slide a {
            display: block;
        }
    }

    @media (max-width: 500.98px) {
        .swiper-slide a img {
            height: 100vh;
        }
    }
    </style>
</head>

<body>
    <!-- Swiper -->

    <div class="swiper mySwiper swiper-h">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="swiper mySwiper2 swiper-v">
                    <div class="swiper-wrapper">
                        <?php
                        $ret = mysqli_query($con, "select * from products where category=8 ORDER BY ID DESC LIMIT 2");
                        while ($row = mysqli_fetch_array($ret)) {
                            $images[] = 'admin/productimages/' . htmlentities($row['id']) . '/' . htmlentities($row['productImage1']);
                        ?>
                        <div class="swiper-slide slide">
                            <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                    width=" 100%" height="100%" alt="">
                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage2']); ?>"
                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage2']); ?>"
                                    width=" 100%" height="100%" alt="">
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="swiper mySwiper2 swiper-v">
                    <div class="swiper-wrapper">
                        <?php
                        $ret = mysqli_query($con, "select * from products where category=10 ORDER BY ID DESC LIMIT 2");
                        while ($row = mysqli_fetch_array($ret)) {
                            $images[] = 'admin/productimages/' . htmlentities($row['id']) . '/' . htmlentities($row['productImage1']);
                        ?>
                        <div class="swiper-slide slide">
                            <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                    width=" 100%" height="100%" alt="">
                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage2']); ?>"
                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage2']); ?>"
                                    width=" 100%" height="100%" alt="">
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="swiper mySwiper2 swiper-v">
                    <div class="swiper-wrapper">
                        <?php
                        $ret = mysqli_query($con, "select * from products where category=29 ORDER BY ID DESC LIMIT 2");
                        while ($row = mysqli_fetch_array($ret)) {
                            $images[] = 'admin/productimages/' . htmlentities($row['id']) . '/' . htmlentities($row['productImage1']);
                        ?>
                        <div class="swiper-slide slide">
                            <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                    width=" 100%" height="100%" alt="">
                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage2']); ?>"
                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage2']); ?>"
                                    width=" 100%" height="100%" alt="">
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 50,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
    var swiper2 = new Swiper(".mySwiper2", {
        direction: "vertical",
        spaceBetween: 50,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
    </script>
</body>

</html>