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

    <title>Help | QUINTET India </title>

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

        <?php include('includes/search.php'); ?>
    </header>
    <!-- ============================================== HEADER : END ============================================== -->
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="" style="  padding: 0;margin-left:50px;margin-right:50px;  ">
            <div class="row ">

                <style>
                .body-content {
                    margin-top: 70px !important;
                    margin-bottom: 100%;
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
                <div class="heroImg">
                    <?php
                    $ret = mysqli_query($con, "select * from products where category=8 AND id=35  LIMIT 1");
                    while ($row = mysqli_fetch_array($ret)) {
                        # code...
                    ?>
                    <div class="imgBox">
                        <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                            width=" 100%" height="100%" alt="">
                        <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage3']); ?>"
                            data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage3']); ?>"
                            width=" 100%" height="100%" alt="">
                    </div>
                    <?php } ?>
                </div>
                <!-- Alltopic style -->
                <style>
                .Alltopichelp {
                    height: 100vh;
                    width: 100%;
                    padding: 150px;
                    margin: auto;
                    background: white;
                    margin-bottom: 200px;
                }

                .Alltopichelp .topic:nth-child(2) {
                    margin-top: 100px;
                }

                .Alltopichelp .topic h1 {
                    font-size: 15px;
                    font-weight: 500;
                    color: #000;
                    text-transform: uppercase;
                    font-family: 'Poppins', sans-serif;
                }

                .Alltopichelp .topicGroup ul {
                    margin-top: 35px;
                    display: grid;
                    grid-template-columns: repeat(5, 1fr);
                    grid-auto-rows: auto;
                    grid-gap: 5rem;
                }

                .Alltopichelp .topicGroup ul li:first-child {
                    margin-left: 0;
                }

                .Alltopichelp .topicGroup ul li {
                    padding: 5px 20px;
                    border: 1px solid black;
                    text-align: center;
                }

                .Alltopichelp .topicGroup ul li a {
                    font-size: 10px;
                }

                .topicBox {
                    display: grid;
                    grid-template-columns: repeat(4, 1fr);
                    grid-auto-rows: auto;
                    grid-gap: 1rem;
                }

                .topicBox .small_topicBox {
                    padding: 30px;
                    overflow: auto;
                    border: 1px solid black;
                    height: 250px;
                    width: 270px;
                    object-fit: cover;
                    margin-top: 30px;
                    margin-bottom: 30px;
                }

                .topicBox .small_topicBox::-webkit-scrollbar-track {
                    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3) !important;
                    background-color: #fff !important;
                }

                .topicBox .small_topicBox:hover.topicBox .small_topicBox::-webkit-scrollbar {
                    display: block !important;
                }

                .topicBox .small_topicBox::-webkit-scrollbar {
                    display: none !important;
                    width: 10px !important;
                    height: 2px !important;
                }

                .topicBox .small_topicBox::-webkit-scrollbar-thumb {
                    border: 10px solid #000 !important;
                }

                .topicBox .small_topicBox ul li:first-child {
                    font-size: 15px;
                    color: #000;
                    font-weight: 300;
                    font-family: 'Poppins', sans-serif;
                    margin-bottom: 20px;
                }

                .topicBox .small_topicBox ul li {
                    margin-bottom: 5px;
                }

                .topicBox .small_topicBox ul li a {
                    font-size: 10px;
                    font-weight: 300;
                    font-family: 'Poppins', sans-serif;
                    color: #000;
                }

                .topicBox .small_topicBox ul li a:hover {
                    text-decoration: underline;
                    color: #000;
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
                }
                </style>
                <div class="Alltopichelp">
                    <div class="fitst-topic topic">
                        <h1>
                            Frequently Asked Questions
                        </h1>
                        <div class="topicGroup">
                            <ul>
                                <li><a href="ItemsAvailability">ITEMS AVAILABILITY</a></li>
                                <li><a href="OrderStatus">ORDER STATUS</a></li>
                                <li><a href="HowToReturn">HOW TO RETURN</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="second-topic topic">
                        <h1>
                            All help topics
                        </h1>
                        <div class="topicBox">
                            <div class="small_topicBox">
                                <ul>
                                    <li>MY QUINTET ACCOUNT</li>
                                    <li><a href="registrationandlogin">REGISTRATION AND LOG IN</a></li>
                                    <li><a href="profilemanagement">MANAGING MY PROFILE</a></li>
                                    <li><a href="myfavourites">MY FAVOURITES</a></li>
                                </ul>
                            </div>
                            <div class="small_topicBox">
                                <ul>
                                    <li>ITEMS AND SIZES</li>
                                    <li><a href="ItemsAvailability">ITEMS AVAILABILITY</a></li>
                                    <li><a href="whatsmysize">WHAT’S MY SIZE?</a></li>
                                    <li><a href="compositionandcare">COMPOSITION AND CARE</a></li>
                                    <li><a href="itemswarranty">ITEMS WARRANTY</a></li>
                                    <li><a href="pricingpolicy">PRICING POLICY</a></li>
                                    <li><a href="withdrawnitems">WITHDRAWN ITEMS</a></li>
                                </ul>
                            </div>
                            <div class="small_topicBox">
                                <ul>
                                    <li>GIFT OPTIONS</li>
                                    <li><a href="GiftCard">GIFT CARD</a></li>
                                    <li><a href="giftpackaging">GIFT PACKAGING</a></li>
                                </ul>
                            </div>
                            <div class="small_topicBox">
                                <ul>
                                    <li>SHIPPING</li>
                                    <li><a href="shippingmethodsTimesandcosts">SHIPPING METHODS, TIMES AND
                                            COSTS</a></li>
                                    <li><a href="OrdersInSeveralShipments">ORDERS IN SEVERAL SHIPMENTS</a>
                                    </li>
                                    <li><a href="WhereDoWeShip">WHERE DO WE SHIP?</a></li>
                                </ul>
                            </div>
                            <div class="small_topicBox">
                                <ul>
                                    <li>PAYMENTS AND INVOICES</li>
                                    <li><a href="PaymentMethods">PAYMENT METHODS</a></li>
                                </ul>
                            </div>
                            <div class="small_topicBox">
                                <ul>
                                    <li>MY PURCHASES</li>
                                    <li><a href="OnlineShopping ">ONLINE SHOPPING</a></li>
                                    <li><a href="OrderStatus">ORDER STATUS</a></li>
                                    <li><a href="ChangeOrCancelAnOnlineOrder">CHANGE OR CANCEL AN ONLINE ORDER</a>
                                    </li>
                                    <li><a href="IssuesWithMyOrder">ISSUES WITH MY ORDER</a></li>
                                    <li><a href="In_storePurchases">IN-STORE PURCHASES</a></li>
                                    <li><a href="OnlinePurchaseFromAStoreDevice">ONLINE PURCHASE FROM A STORE
                                            DEVICE</a></li>
                                </ul>
                            </div>
                            <div class="small_topicBox">
                                <ul>
                                    <li>EXCHANGES, RETURNS AND REFUNDS</li>
                                    <li><a href="HowToReturn">HOW TO RETURN</a></li>
                                    <li><a href="HowToExchange">HOW TO EXCHANGE</a></li>
                                    <li><a href="SpecialReturnConditions">SPECIAL RETURN CONDITIONS</a></li>
                                </ul>
                            </div>
                            <div class="small_topicBox">
                                <ul>
                                    <li>QUINTET EXPERIENCES</li>
                                    <li><a href="OurUsedClothingCollectionProgramme">OUR USED CLOTHING COLLECTION
                                            PROGRAMME</a></li>
                                    <li><a href="Newsletter">NEWSLETTER</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- accrdion-->
                    <style>
                    .accordion {
                        width: 100%;
                        padding: 15px;
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
                        padding: 0 15px;
                        cursor: pointer;
                        align-items: center;
                        justify-content: space-between;
                        transition: all 0.5s linear;
                    }

                    .accordion-content.open header {
                        min-height: 35px;
                    }

                    .accordion-content header .title {
                        font-size: 10px;
                        font-weight: 400;
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
                    }

                    .mobileview,
                    .accordion {
                        display: none;
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
                    <div class="accordion">
                        <div class="accordion-content">
                            <header>
                                <span class="title">MY QUINTET ACCOUNT</span>
                                <i class="fa-solid fa-plus"></i>
                            </header>
                            <div class="description">

                                <div class="small_topicBox mobileview">
                                    <ul>
                                        <li><a href="registrationandlogin">REGISTRATION AND LOG IN</a></li>
                                        <li><a href="profilemanagement">MANAGING MY PROFILE</a></li>
                                        <li><a href="myfavourites">MY FAVOURITES</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-content">
                            <header>
                                <span class="title">ITEMS AND SIZES</span>
                                <i class="fa-solid fa-plus"></i>
                            </header>
                            <div class="description">
                                <div class="small_topicBox mobileview">
                                    <ul>
                                        <li><a href="ItemsAvailability">ITEMS AVAILABILITY</a></li>
                                        <li><a href="whatsmysize">WHAT’S MY SIZE?</a></li>
                                        <li><a href="compositionandcare">COMPOSITION AND CARE</a></li>
                                        <li><a href="itemswarranty">ITEMS WARRANTY</a></li>
                                        <li><a href="pricingpolicy">PRICING POLICY</a></li>
                                        <li><a href="withdrawnitems">WITHDRAWN ITEMS</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-content">
                            <header>
                                <span class="title">GIFT OPTIONS</span>
                                <i class="fa-solid fa-plus"></i>
                            </header>
                            <div class="description">

                                <div class="small_topicBox mobileview">
                                    <ul>
                                        <li><a href="GiftCard">GIFT CARD</a></li>
                                        <li><a href="giftpackaging">GIFT PACKAGING</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-content">
                            <header>
                                <span class="title">SHIPPING</span>
                                <i class="fa-solid fa-plus"></i>
                            </header>
                            <div class="description">

                                <div class="small_topicBox mobileview">
                                    <ul>
                                        <li><a href="shippingmethodsTimesandcosts">SHIPPING METHODS, TIMES AND
                                                COSTS</a></li>
                                        <li><a href="OrdersInSeveralShipments">ORDERS IN SEVERAL SHIPMENTS</a>
                                        </li>
                                        <li><a href="WhereDoWeShip">WHERE DO WE SHIP?</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-content">
                            <header>
                                <span class="title">PAYMENTS AND INVOICES</span>
                                <i class="fa-solid fa-plus"></i>
                            </header>
                            <div class="description">

                                <div class="small_topicBox mobileview">
                                    <ul>
                                        <li><a href="PaymentMethods">PAYMENT METHODS</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-content">
                            <header>
                                <span class="title">MY PURCHASES</span>
                                <i class="fa-solid fa-plus"></i>
                            </header>
                            <div class="description">

                                <div class="small_topicBox mobileview">
                                    <ul>
                                        <li><a href="OnlineShopping ">ONLINE SHOPPING</a></li>
                                        <li><a href="OrderStatus">ORDER STATUS</a></li>
                                        <li><a href="ChangeOrCancelAnOnlineOrder">CHANGE OR CANCEL AN ONLINE
                                                ORDER</a>
                                        </li>
                                        <li><a href="IssuesWithMyOrder">ISSUES WITH MY ORDER</a></li>
                                        <li><a href="In_storePurchases">IN-STORE PURCHASES</a></li>
                                        <li><a href="OnlinePurchaseFromAStoreDevice">ONLINE PURCHASE FROM A STORE
                                                DEVICE</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-content">
                            <header>
                                <span class="title">EXCHANGES, RETURNS AND REFUNDS</span>
                                <i class="fa-solid fa-plus"></i>
                            </header>
                            <div class="description">

                                <div class="small_topicBox mobileview">
                                    <ul>
                                        <li><a href="HowToReturn">HOW TO RETURN</a></li>
                                        <li><a href="HowToExchange">HOW TO EXCHANGE</a></li>
                                        <li><a href="SpecialReturnConditions">SPECIAL RETURN CONDITIONS</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-content">
                            <header>
                                <span class="title">QUINTET EXPERIENCES</span>
                                <i class="fa-solid fa-plus"></i>
                            </header>
                            <div class="description">

                                <div class="small_topicBox mobileview">
                                    <ul>
                                        <li><a href="OurUsedClothingCollectionProgramme">OUR USED CLOTHING
                                                COLLECTION PROGRAMME</a></li>
                                        <li><a href="Newsletter">NEWSLETTER</a></li>
                                    </ul>
                                </div>
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