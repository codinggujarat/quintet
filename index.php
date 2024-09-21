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
        <div class=" row">
            <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                <!-- ========================================== SECTION – HERO ========================================= -->
                <!-- Swiper -->
                <div class=" swiper mySwiper2 swiper-v">
                    <div class="swiper-wrapper" id="slider">
                        <?php
                        $ret = mysqli_query($con, "select * from products where category=8 ORDER BY ID DESC LIMIT 3");
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
                        <?php
                        $ret = mysqli_query($con, "select * from products where category=10 ORDER BY ID DESC LIMIT 3");
                        while ($row = mysqli_fetch_array($ret)) {
                            # code...
                        ?>
                        <div class="swiper-slide ">
                            <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                    width=" 100%" height="100%" alt="">
                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage3']); ?>"
                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage3']); ?>"
                                    width=" 100%" height="100%" alt="">
                            </a>
                        </div>
                        <?php } ?>
                        <?php
                        $ret = mysqli_query($con, "select * from products where category=29 ORDER BY ID DESC LIMIT 2");
                        while ($row = mysqli_fetch_array($ret)) {
                            # code...
                        ?>
                        <div class="swiper-slide slide">
                            <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                    width=" 100%" height="100%" alt="">
                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage3']); ?>"
                                    data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage3']); ?>"
                                    width=" 100%" height="100%" alt="">
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <!-- Initialize Swiper -->
        <script>
        var swiper = new Swiper(".mySwiper", {});
        var swiper2 = new Swiper(".mySwiper2", {
            direction: "vertical",
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
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

    .bg-video-wrap a h1 {
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
    model-viewer::-webkit-scrollbar {
        display: none !important;
    }

    model-viewer {
        width: 600px !important;
        height: 600px !important;
        overflow: hidden !important;
    }

    .model-viewer {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .btn-card svg {
        cursor: pointer;
    }

    .imgBox {
        display: flex;
        align-items: center;
        justify-content: start;
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
    }

    @media only screen and (max-width:800px) {
        .imgBox {
            width: 50%;
        }
    }
    </style>
    <!-- 
    <div class="col-lg-12 model-viewerbox" style="background-color:#f2f3f8;">
        <h1
            style="text-transform: uppercase;text-align: center;font-weight: 400;color: #000;  font-family: 'Raleway',sans-serif ;  ">
            Take a closer
            <span class="swipe" style="font-family: 'Raleway', sans-serif;-webkit-text-stroke: 3px white;
                        color: transparent;
                        font-weight: 900;  -webkit-text-stroke: 2px #000;">
                Look..
            </span>
        </h1>
        <div class="model-viewer wow zoomIn" data-wow-delay="0.5s">
            <model-viewer camera-controls alt="Model" src="assets/360model/iphone_15_pro_max_-__glgt.glb">
            </model-viewer>
        </div>
    </div> -->

    <!-- <div class="col-lg-12 col-md-12 col-sm-12 btn-card-box">
        <div class="btn-card">
            <svg id="MYGRID6" width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <rect x="4" y="4" width="16" height="16" stroke="black" stroke-width="1" stroke-linecap="none"
                    stroke-linejoin="round" />
            </svg>
            <svg id="MYGRID2" width="20px" height="20px" viewBox="0 0 24 24" fill="none" style="margin-left: 10px;"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M3.5 3.5H10.5V20.5H3.5V3.5Z" stroke="#000000" stroke-width="1" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M13.5 3.5H20.5V20.5H13.5V3.5Z" stroke="#000000" stroke-width="1" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <svg id="MYGRID12" width="20px" height="20px" viewBox="0 0 24 24" fill="none" style="margin-left: 10px;"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M3.5 3.5H10.5V10.5H3.5V3.5Z" stroke="#000000" stroke-width="1" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M3.5 13.5H10.5V20.5H3.5V13.5Z" stroke="#000000" stroke-width="1" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M13.5 3.5H20.5V10.5H13.5V3.5Z" stroke="#000000" stroke-width="1" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M13.5 13.5H20.5V20.5H13.5V13.5Z" stroke="#000000" stroke-width="1" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </div>
    </div>
    <style>
    .btn-card-box {
        padding: 20px;
        position: sticky;
        top: 5%;
        background: transparent;
        z-index: 999;
    }

    .btn-card {
        display: flex;
        align-items: center;
        justify-content: end;
        padding: 0px 20px;

    }


    .card .image a img {
        background: #f2f3f8 !important;
        width: 100%;
        margin: 0;
        padding: 0;
        object-fit: cover;
        height: 100%;
    }

    @media (max-width: 767.98px) {
        .card .image {
            width: 220px;
        }

        .box-card {
            justify-content: start;
        }

    }

    @media (max-width: 500px) {
        .card .image {
            width: 100%;
        }
    }

    .box-card {
        display: flex;
        align-items: start;
        justify-content: center;
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        flex-wrap: wrap;
    }
    </style>

    <div class="  ">
        <h1 style=" padding-left:20px;padding:10px;font-size:15px;text-align: left;border-bottom:1px solid
        black;font-weight: 400;color: #000; font-family: 'Raleway' ,sans-serif ; ">
            NEW IN - MAN</h1>

        <div class=" box-card wow fadeInUpBig ">
            <?php $ret = mysqli_query($con, "SELECT * FROM products WHERE category=10  ORDER BY RAND() ");

            while ($row = mysqli_fetch_array($ret)) {
                # code... 
            ?><div class=" card ">
                <div class=" image responsiveCard"><a
                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><img
                            src=" admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                            width=" 100%" height="100%" alt=""></a></div>
            </div>
            <?php
            }

            ?>
        </div>
    <!-- </div> -->
    <script>
    document.getElementById('MYGRID6').addEventListener('click', function() {
            var boxes = document.querySelectorAll(
                '.responsiveCard'); // Select all elements with the class 'myBox'

            boxes.forEach(function(box) {
                    box.style.width = "100%"; // Toggle 'active' class for each box
                }

            );
        }

    );

    document.getElementById('MYGRID2').addEventListener('click', function() {
            var boxes = document.querySelectorAll(
                '.responsiveCard'); // Select all elements with the class 'myBox'

            boxes.forEach(function(box) {
                    box.style.width = "220px"; // Toggle 'active' class for each box
                }

            );
        }

    );

    document.getElementById('MYGRID12').addEventListener('click', function() {
            var boxes = document.querySelectorAll(
                '.responsiveCard'); // Select all elements with the class 'myBox'

            boxes.forEach(function(box) {
                    box.style.width = "150px"; // Toggle 'active' class for each box
                }

            );
        }

    );
    </script>

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

    <!-- Initialize Swiper -->
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper2 = new Swiper(".mySwiper2", {
        direction: "vertical",
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
    });
    </script>
    <script>
    var swiper = new Swiper(".mySwiper3", {
        loop: true,
        centerSlide: true,
        centeredSlides: true,
        fade: "true",
        autoplay: {
            delay: 5000,
            disableOnInteraction: true,
        },
        grabCursor: "true",
        freeMode: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },

        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            700: {
                slidesPerView: 1,
            },
            868: {
                slidesPerView: 2,
            },
            1400: {
                slidesPerView: 3,
            },
        },
    });
    </script>
    <script src="https://unpkg.com/scrollreveal"></script>

    <script>
    const scrollRevealOption = {
        distance: "50px",
        origin: "bottom",
        duration: 500,
    };

    ScrollReveal().reveal(" .mySwiper ", {
        ...scrollRevealOption,
        origin: "right",
        delay: 800,
    });
    ScrollReveal().reveal(" .bg-video-wrap video", {
        ...scrollRevealOption,
        origin: "bottom",
        delay: 500,
    });

    ScrollReveal().reveal(" .section .retro-layout .featured-img", {
        ...scrollRevealOption,
        origin: "bottom",
        delay: 500,
    });
    </script>
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