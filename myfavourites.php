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

    <title>My Favourites | Help | QUINTET India </title>

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
                    <?php include('includes/MyQuintetAccount.php'); ?>
                </div>
                <div class="col-lg-7 col-md-8 col-sm-7">
                    <div class="RegisterAndLoginRighttext">
                        <h1>MY FAVOURITES</h1>
                    </div>
                    <div class="RegisterAndLoginRighttext">
                        <img src="img/lookformyaccoutsidebar.jpg" alt="">
                    </div>
                    <div class="RegisterAndLoginRighttext">
                        <p>
                            With the Favourites and Save for later options, you can mark the items you like most and go
                            back and access them easily. Here's how to use them.
                        </p>
                        <h6>FAVOURITES</h6>

                        <ol class="list">
                            <li>Every time you click on the Favourites symbol on the product page, that <span>item will
                                    be
                                    added to your list</span>.</li>
                            <li>You can <span>access</span> your list from your shopping basket and <span>share
                                    it</span> with
                                whoever you like
                                using the link provided when you choose this option.</li>
                            <li>You can <span>delete</span> items at any time by simply clicking on the Favourites
                                symbol.</li>
                            <li>The maximum capacity of the <span>Favourites</span> option is <span>100 items</span>.
                            </li>
                            <li>Marking an item as a favourite does not imply its reservation.</li>
                        </ol>
                        <p style="align-items: center; display: flex;">
                            <i class="bx bx-bookmark" style="margin-right: 10px;"></i>
                            Look for this symbol to add the items to your favourites.
                        </p>
                        <p style="background:whitesmoke;font-size:10px;padding:20px;">
                            <span> Remember:</span> you will only be able to enjoy the Favourites option if you are a
                            registered
                            customer. Gift Cards cannot be added to this list.
                        </p>
                        <h6>SAVE FOR LATER</h6>
                        <p>
                        <p>If you do not wish to complete the purchase of all the items in your basket and would prefer
                            to leave some for another time, we suggest you use the Save for later option.
                        </p>
                        <p>This will enable you to add these items to a list of favourites and retrieve them whenever
                            you wish.
                        </p>
                        </p>
                    </div>
                    <!-- accrdion-->
                    <style>
                    .RegisterAndLoginRighttext {
                        margin-bottom: 20px;
                        font-family: 'Poppins', sans-serif !important;
                        font-weight: 400 !important;
                    }

                    .RegisterAndLoginRighttext h1 {
                        font-size: 20px;
                        font-weight: 400;
                        font-family: 'Poppins', sans-serif;
                        text-transform: uppercase;
                        color: #000;

                    }

                    .RegisterAndLoginRighttext h6 {
                        font-size: 12px;
                        font-weight: 400;
                        color: #000;
                        font-family: 'Poppins', sans-serif;

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
                    }

                    .RegisterAndLoginRighttext p span,
                    .RegisterAndLoginRighttext ol span {
                        font-weight: 900;
                        color: #000;
                        font-family: 'Poppins', sans-serif !important;
                        font-weight: 600 !important;
                    }

                    .RegisterAndLoginRighttext ol {
                        list-style-type: disc;
                    }

                    .RegisterAndLoginRighttext ol li {
                        font-size: 11px;
                        font-weight: 300;
                        color: #000;
                        margin-bottom: 10px;
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
                        padding: 0 15px;
                        cursor: pointer;
                        align-items: center;
                        justify-content: space-between;
                        transition: all 0.5s linear;
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