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

    <title>How To Exchange | Help | QUINTET India </title>

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
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
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

    <!-- animated  -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body class="cnt-home">



    <!-- ============================================== HEADER ============================================== -->
    <header class="header-style-1">
        <?php include('includes/top-header.php'); ?>
        <?php include('includes/main-header.php'); ?>
        <?php include('includes/menu-bar.php'); ?>

    </header>
    <!-- ============================================== HEADER : END ============================================== -->
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="" style="  padding: 0;margin-left:50px;margin-right:50px;  ">
            <div class="row">

                <style>
                    .body-content {
                        margin-top: 150px !important;
                        margin-bottom: 100%;
                    }

                    .row {
                        margin-left: 100px;
                        margin-right: 100px;
                    }
                </style>

                <!-- Alltopic style -->
                <style>
                    @media only screen and (max-width: 1000px) {
                        .row {
                            margin-left: 0;
                            margin-right: 0;
                        }
                    }

                    @media only screen and (max-width: 800px) {


                        .topicBox {
                            grid-template-columns: repeat(2, 1fr);

                        }

                        .Alltopichelp .topicGroup ul {
                            grid-template-columns: repeat(2, 1fr);
                            grid-gap: 1rem;
                        }

                        .topicBox .small_topicBox {
                            width: 200px;
                        }

                        .Alltopichelp {
                            margin: 0;
                            padding: 5px;
                        }

                        .row {
                            flex-wrap: wrap !important;
                            margin: 0 !important;
                            padding: 0 !important;
                            width: 100% !important;
                        }

                        .RegisterAndLogin {
                            display: none;
                        }
                    }
                </style>
                <div class="col-lg-3 col-md-4 col-sm-5">
                    <?php include('includes/ExchangesReturnsAndRefunds.php'); ?>
                </div>
                <div class="col-lg-7 col-md-8 col-sm-7">
                    <div class="RegisterAndLoginRighttext">
                        <h1>
                            HOW TO EXCHANGE


                        </h1>
                    </div>
                    <div class="RegisterAndLoginRighttext">
                        <img src="img/EXCHANGESRETURNSANDREFUNDS.jpg" alt="">
                    </div>
                    <div class="RegisterAndLoginRighttext">
                        <p>
                            At Quintet, you have the option to exchange the items you purchase for free. Here are the
                            conditions and how you can manage it.

                        </p>

                        <div class="lightBack">
                            <h4>
                                IN THIS ARTICLE
                            </h4>
                            <a href="#CONDITIONSFORMAKINGANEXCHANGE">CONDITIONS FOR MAKING AN EXCHANGE</a>
                            <br>
                            <br>
                            <a href="#EXCHANGESATAQUINTETSTORE">EXCHANGES AT A QUINTET STORE</a>
                            <br>
                            <br>
                        </div>
                        <h1 id="CONDITIONSFORMAKINGANEXCHANGE">CONDITIONS FOR MAKING AN EXCHANGE</h1>
                        <ol>
                            <li>You must manage the exchange before the established deadline:
                            </li>
                            <p>
                                <span>Shop at a physical store:</span> You have 30 days from the date of purchase.
                            </p>
                            <li>Items must be in their <span>original condition</span> and include all labels.
                            </li>
                            <li>You have to make the exchange in the same market/region where you made the purchase.
                            </li>
                            <p>
                                You can find more information about the Return and Exchange Policy and the right of
                                withdrawal in our Purchase Conditions.
                            </p>
                        </ol>

                        <h1 style="margin-top: 40px;" id="EXCHANGESATAQUINTETSTORE">
                            EXCHANGES AT A QUINTET STORE
                        </h1>
                        <p>
                            The exchange option in a Quintet store is not available for online purchases. Please note
                            that
                            you can always return your order before the deadline and make a new purchase.
                        </p>
                        <p>
                            However, for purchases made in a store, you have the option to exchange items for another
                            garment, another size or another colour.
                        </p>
                        <p style="background:whitesmoke;padding:20px;">
                            <span>Remember:</span> to make an exchange, you must show the purchase receipt or
                            your Quintet QR code.

                        </p>

                    </div>

                    <!-- accrdion-->
                    <style>
                        .lightBack {
                            background: whitesmoke;
                            height: 100%;
                            padding: 30px;
                            width: 100%;
                            font-family: serif;
                            display: inline-block;
                            font-family: 'Poppins', sans-serif;
                            text-transform: uppercase;
                            color: #000;
                            font-weight: 300;
                        }

                        .lightBack h4 {
                            font-weight: 400;

                        }

                        .lightBack a {
                            text-decoration: underline;
                            font-weight: 300;
                        }

                        .RegisterAndLoginRighttext {
                            margin-bottom: 20px;
                        }

                        .RegisterAndLoginRighttext h1 {
                            font-size: 20px;
                            font-weight: 300;
                            font-family: 'Poppins', sans-serif;
                            text-transform: uppercase;
                            color: #000;

                        }

                        .RegisterAndLoginRighttext h6 {
                            font-weight: 400;
                            color: #000;
                            font-family: 'Poppins', sans-serif;
                            text-transform: uppercase;
                        }


                        .RegisterAndLoginRighttext img {
                            width: 100%;
                            height: 30vh;
                            object-fit: cover;
                            background-position: center;
                        }

                        .RegisterAndLoginRighttext p {
                            font-size: 11px;
                            font-weight: 300;
                            color: #000;
                            font-family: 'Poppins', sans-serif;

                        }

                        .RegisterAndLoginRighttext p a {
                            font-size: 11px;
                            font-weight: 300;
                            color: #000;
                            font-family: 'Poppins', sans-serif;
                            text-decoration: underline;
                        }

                        .RegisterAndLoginRighttext p span,
                        .RegisterAndLoginRighttext ol span {
                            font-weight: 600;
                            color: #000;
                            font-family: 'Poppins', sans-serif;
                        }

                        .RegisterAndLoginRighttext ol {
                            list-style-type: disc;
                            padding: 0;
                            margin-left: 5px;
                            font-family: 'Poppins', sans-serif;

                        }

                        .RegisterAndLoginRighttext ol li {
                            font-size: 12px;
                            font-weight: 300;
                            color: #000;
                            margin: 10px;
                            font-family: 'Poppins', sans-serif;

                        }

                        .accordion {
                            width: 100%;
                        }


                        .accordion .accordion-content {
                            border: 1px solid #000;
                            overflow: hidden;
                        }


                        .accordion-content.open {
                            padding-bottom: 10px;
                        }

                        .accordion-content header {
                            display: flex;
                            min-height: 50px;
                            font-family: 'Poppins', sans-serif;

                            padding: 0 15px;
                            cursor: pointer;
                            align-items: center;
                            justify-content: space-between;
                            transition: all 0.5s linear;
                        }


                        .accordion-content header .title {
                            font-size: 10px;
                            font-weight: 400;
                            font-family: 'Poppins', sans-serif;

                            color: #000;
                            text-transform: uppercase;
                        }

                        .accordion-content header i {
                            font-size: 9px;
                            color: #000;
                        }

                        .accordion-content .description {
                            height: 0;
                            font-size: 12px;
                            color: #000;
                            font-weight: 400;
                            padding: 0 15px;
                            transition: all 0.2s linear;
                            font-family: 'Poppins', sans-serif;
                        }


                        .small_topicBox a {
                            text-decoration: underline;
                            color: #000;
                        }

                        @media only screen and (max-width:500px) {
                            .second-topic {
                                display: none;
                            }

                            .mobileview,
                            .accordion {
                                display: block;
                            }
                        }
                    </style>
                    <div class="" style="margin-left: 20px; align-items: center; display: flex;padding:20px;">
                        <div class="">
                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22Z"
                                    stroke="#000" stroke-width="1" />
                            </svg>
                        </div>
                        <div style="margin-left: 10px;">
                            <p style="text-transform: uppercase;">
                                Can’t find what you’re looking for? <br>
                                <a href="ContactUs.php" style="text-transform: capitalize; font-weight: 300;
                                    text-decoration: underline;
                        color: #000;
                        font-family: 'Poppins', sans-serif;">
                                    Contact us
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                const accordionContent = document.querySelectorAll(".accordion-content");
                accordionContent.forEach((item, index) => {
                    let header = item.querySelector("header");
                    header.addEventListener("click", () => {
                        item.classList.toggle("open");
                        let description = item.querySelector(".description");
                        if (item.classList.contains("open")) {
                            description.style.height =
                                `${description.scrollHeight}px`; //scrollHeight property returns the height of an element including padding , but excluding borders, scrollbar or margin
                            item.querySelector("i").classList.replace("fa-plus", "fa-minus");
                        } else {
                            description.style.height = "0px";
                            item.querySelector("i").classList.replace("fa-minus", "fa-plus");
                        }
                        removeOpen(
                            index
                        ); //calling the funtion and also passing the index number of the clicked header
                    })
                })

                function removeOpen(index1) {
                    accordionContent.forEach((item2, index2) => {
                        if (index1 != index2) {
                            item2.classList.remove("open");
                            let des = item2.querySelector(".description");
                            des.style.height = "0px";
                            item2.querySelector("i").classList.replace("fa-minus", "fa-plus");
                        }
                    })
                }
            </script>
        </div>
    </div>
    </div>

    <div class="" style="margin-top: 400%;">
        <?php include('includes/footer.php'); ?>

    </div>
    <script src=" assets/js/jquery-1.11.1.min.js">
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