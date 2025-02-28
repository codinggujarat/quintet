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
<script>
function openFullScreen() {
    let elem = document.documentElement;

    if (!document.fullscreenElement &&
        !document.mozFullScreenElement &&
        !document.webkitFullscreenElement &&
        !document.msFullscreenElement) {

        // Enter full screen
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.mozRequestFullScreen) {
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) {
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) {
            elem.msRequestFullscreen();
        }
    } else {
        // Exit full screen
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }
    }
}

// Auto enter full screen on page load
window.onload = function() {
    openFullScreen();
};
</script>

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

    <title>QUINTET | New Collection Online</title>

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
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">
    <!-- Favicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- animated  -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <!--Model Viewer  -->
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

</head>

<body class="cnt-home">



    <!-- ============================================== HEADER ============================================== -->
    <header class="header-style-1">
        <?php include('includes/main-header.php'); ?>
        <?php include('includes/top-header.php'); ?>
        <?php include('includes/menu-bar.php'); ?>

    </header>
    <style>
    .col-lg-12 {
        width: 100%;
    }

    .body-content {

        margin: 0 !important;
        padding: 0 !important;
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

    .swiper-pagination::before,
    .swiper-pagination::after {
        background: #000;
        color: #000;

    }

    .swiper-button-next,
    .swiper-button-prev {
        color: #000;

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
    <!-- ============================================== HEADER : END ============================================== -->

    <div class="body-content outer-top-xs">

        <div class="swiper mySwiper swiper-h">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="swiper mySwiper2 swiper-v">
                        <div class="swiper-wrapper">
                            <?php
                            $ret = mysqli_query($con, "select * from products where category=8 ORDER BY ID DESC LIMIT 10");
                            while ($row = mysqli_fetch_array($ret)) {
                                $images[] = 'admin/productimages/' . htmlentities($row['id']) . '/' . htmlentities($row['productImage1']);
                            ?>
                            <div class="swiper-slide slide">
                                <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                    <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                        data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                        width=" 100%" height="100%" alt="">
                                    <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageSix']); ?>"
                                        data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageSix']); ?>"
                                        width=" 100%" height="100%" alt="">
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>

                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="swiper mySwiper2 swiper-v">
                        <div class="swiper-wrapper">
                            <?php
                            $ret = mysqli_query($con, "select * from products where category=10 ORDER BY ID DESC LIMIT 10");
                            while ($row = mysqli_fetch_array($ret)) {
                                $images[] = 'admin/productimages/' . htmlentities($row['id']) . '/' . htmlentities($row['productImage1']);
                            ?>
                            <div class="swiper-slide slide">
                                <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                    <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                        data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                        width=" 100%" height="100%" alt="">
                                    <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageSix']); ?>"
                                        data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageSix']); ?>"
                                        width=" 100%" height="100%" alt="">
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>

                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="swiper mySwiper2 swiper-v">
                        <div class="swiper-wrapper">
                            <?php
                            $ret = mysqli_query($con, "select * from products where category=29 ORDER BY ID DESC LIMIT 10");
                            while ($row = mysqli_fetch_array($ret)) {
                                $images[] = 'admin/productimages/' . htmlentities($row['id']) . '/' . htmlentities($row['productImage1']);
                            ?>
                            <div class="swiper-slide slide">
                                <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                    <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                        data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                        width=" 100%" height="100%" alt="">
                                    <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageSix']); ?>"
                                        data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImageSix']); ?>"
                                        width=" 100%" height="100%" alt="">
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>

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
                type: "fraction",
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        var swiper2 = new Swiper(".mySwiper2", {
            direction: "vertical",
            spaceBetween: 50,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
        </script>
        <!-- ========================================= SECTION – HERO : END ========================================= -->
        <!-- ============================================== INFO BOXES ============================================== -->


    </div>
    <!-- /.row -->
    <!-- <div class="container">

            </div> -->
    <style>
    .bg-video-wrap {
        position: relative;
        overflow: hidden;
        width: 100%;
        height: 100vh;
    }

    video {
        width: 100%;
        height: 100%;
        z-index: 1;

    }

    .overlay {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        background-size: 3px 3px;
        z-index: 2;
        background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.10));
    }

    .bg- -wrap a h1 {
        text-align: center;
        color: #fff;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        z-index: 3;
        font-size: 30px;
        max-width: 400px;
        width: 100%;
        height: 50px;
        font-weight: 700;
    }
    </style>

    <!-- <div class="col-lg-12 ">
        <div class="bg-video-wrap">
            <video src="assets/video/large_2x.mp4" loop muted autoplay>
            </video>
            <a href="product-details.php?pid=22">
                <div class="overlay">
                </div>
                <h1>
                    Big, bigger &and; faster
                </h1>
            </a>
        </div>
    </div> -->
    <style>
    .center-btn {
        position: absolute;
        top: 95%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999999999999999999;
    }

    /* Note that you only needs to edit the config to customize the button! */

    .plusButton {
        /* Config start */
        --plus_sideLength: 2.5rem;
        --plus_topRightTriangleSideLength: 0.9rem;
        /* Config end */
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid white;
        width: var(--plus_sideLength);
        height: var(--plus_sideLength);
        background-color: #000000;
        overflow: hidden;
    }

    .plusButton::before {
        position: absolute;
        content: "";
        top: 0;
        right: 0;
        width: 0;
        height: 0;
        border-width: 0 var(--plus_topRightTriangleSideLength) var(--plus_topRightTriangleSideLength) 0;
        border-style: solid;
        border-color: transparent white transparent transparent;
        transition-timing-function: ease-in-out;
        transition-duration: 0.2s;
    }

    .plusButton:hover {
        cursor: pointer;
    }

    .plusButton:hover::before {
        --plus_topRightTriangleSideLength: calc(var(--plus_sideLength) * 2);
    }

    .plusButton:focus-visible::before {
        --plus_topRightTriangleSideLength: calc(var(--plus_sideLength) * 2);
    }

    .plusButton>.plusIcon {
        fill: white;
        width: calc(var(--plus_sideLength) * 0.7);
        height: calc(var(--plus_sideLength) * 0.7);
        z-index: 1;
        transition-timing-function: ease-in-out;
        transition-duration: 0.2s;
    }

    .plusButton:hover>.plusIcon {
        fill: black;
        transform: rotate(180deg);
    }

    .plusButton:focus-visible>.plusIcon {
        fill: black;
        transform: rotate(180deg);
    }
    </style>

    <div class="center-btn">
        <div tabindex="0" class="plusButton" onclick="openFullScreen()">
            <svg class="plusIcon " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                <g mask="url(#mask0_21_345)">
                    <path d="M13.75 23.75V16.25H6.25V13.75H13.75V6.25H16.25V13.75H23.75V16.25H16.25V23.75H13.75Z">
                    </path>
                </g>
            </svg>
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
    <script type="text/javascript" src="assets/js/lghtbox.min.js"></script>
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

    <!-- Initialize Swiper -->
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <script>
    const images = <?php echo json_encode($images); ?>; // Make sure paths are correct
    console.log(images); // Debug image paths

    let currentImageIndex = 0;
    const logo = document.getElementById('logo');

    function getImageBrightness(imageSrc, callback) {
        const img = new Image();
        img.crossOrigin = "Anonymous";
        img.src = imageSrc;

        img.onload = function() {
            const canvas = document.createElement("canvas");
            const context = canvas.getContext("2d");

            canvas.width = img.width;
            canvas.height = img.height;
            context.drawImage(img, 0, 0, img.width, img.height);

            const imageData = context.getImageData(0, 0, img.width, img.height);
            let totalBrightness = 0;
            const pixelData = imageData.data;

            for (let i = 0; i < pixelData.length; i += 4) {
                const r = pixelData[i];
                const g = pixelData[i + 1];
                const b = pixelData[i + 2];
                const brightness = (r * 299 + g * 587 + b * 114) / 1000;
                totalBrightness += brightness;
            }

            const averageBrightness = totalBrightness / (pixelData.length / 4);
            console.log('Average brightness:', averageBrightness); // Debugging
            callback(averageBrightness);
        };
    }

    function changeLogoColor(imageSrc) {
        getImageBrightness(imageSrc, function(brightness) {
            if (brightness < 128) {
                logo.style.filter = "invert(1)";
            } else {
                logo.style.filter = "invert(0)";
            }
        });
    }

    function changeBackground() {
        const currentImage = images[currentImageIndex];
        document.body.style.backgroundImage = `url(${currentImage})`;

        // Change logo color based on brightness
        changeLogoColor(currentImage);

        currentImageIndex = (currentImageIndex + 1) % images.length;
    }

    setInterval(changeBackground, 2500);
    changeBackground();
    </script>


</body>

</html>