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

    <title>Payment Methods | Help | QUINTET India </title>

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
                    <?php include('includes/PaymentsAndInvoices.php'); ?>
                </div>
                <div class="col-lg-7 col-md-8 col-sm-7">
                    <div class="RegisterAndLoginRighttext">
                        <h1>PAYMENT METHODS</h1>
                    </div>
                    <div class="RegisterAndLoginRighttext">
                        <img src="img/PaymentMethods.jpg" alt="">
                    </div>
                    <div class="RegisterAndLoginRighttext">
                        <p style="border-bottom: 1px solid black; padding-bottom: 20px;">
                            At Quinteonline.in we accept Only one Cash on Delivery. Available payment methods may
                            vary
                            at
                            checkout.
                        </p>
                    </div>

                    <div class="RegisterAndLoginRighttext"
                        style="border-bottom: 1px solid black;padding-bottom:20px; align-items: center; display: flex;">
                        <svg width="60" height="" viewBox="0 0 60 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="60" height="40" fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M19.2341 17.9707H21.73C21.6534 17.2507 21.4673 16.612 21.1717 16.0546C20.8761 15.4972 20.5012 15.0298 20.0469 14.6524C19.5926 14.2749 19.0782 13.9875 18.5034 13.7901C17.9287 13.5927 17.3185 13.494 16.6726 13.494C15.775 13.494 14.9677 13.6624 14.2507 13.9991C13.5336 14.3359 12.9288 14.8004 12.4362 15.3927C11.9436 15.9849 11.566 16.6788 11.3033 17.4742C11.0405 18.2697 10.9092 19.132 10.9092 20.061C10.9092 20.9668 11.0405 21.8116 11.3033 22.5955C11.566 23.3793 11.9436 24.0616 12.4362 24.6422C12.9288 25.2228 13.5336 25.6786 14.2507 26.0096C14.9677 26.3406 15.775 26.506 16.6726 26.506C17.3951 26.506 18.0574 26.3899 18.6594 26.1577C19.2615 25.9254 19.7869 25.5886 20.2358 25.1473C20.6846 24.7061 21.0458 24.1719 21.3195 23.5448C21.5932 22.9177 21.7628 22.2151 21.8285 21.4371H19.3327C19.2341 22.2732 18.9632 22.9467 18.5199 23.4577C18.0765 23.9687 17.4608 24.2241 16.6726 24.2241C16.0924 24.2241 15.5998 24.1051 15.1948 23.867C14.7898 23.629 14.4614 23.3125 14.2096 22.9177C13.9578 22.5229 13.7745 22.0787 13.6595 21.5851C13.5446 21.0916 13.4871 20.5836 13.4871 20.061C13.4871 19.5152 13.5446 18.9868 13.6595 18.4758C13.7745 17.9649 13.9578 17.5091 14.2096 17.1084C14.4614 16.7078 14.7898 16.3885 15.1948 16.1504C15.5998 15.9123 16.0924 15.7933 16.6726 15.7933C16.9901 15.7933 17.2938 15.8485 17.5839 15.9588C17.874 16.0691 18.134 16.223 18.3639 16.4204C18.5938 16.6178 18.7853 16.8472 18.9386 17.1084C19.0918 17.3697 19.1904 17.6571 19.2341 17.9707ZM23.2406 19.9913C23.2735 19.4107 23.4103 18.9287 23.6511 18.5455C23.892 18.1623 24.1985 17.8546 24.5707 17.6223C24.9428 17.3901 25.3616 17.2246 25.8268 17.1259C26.292 17.0272 26.76 16.9778 27.2307 16.9778C27.6576 16.9778 28.09 17.0097 28.5279 17.0736C28.9658 17.1375 29.3653 17.2623 29.7266 17.4481C30.0878 17.6339 30.3834 17.8923 30.6132 18.2233C30.8431 18.5542 30.9581 18.9926 30.9581 19.5384V24.2241C30.9581 24.6306 30.9799 25.0196 31.0237 25.3912C31.0675 25.7628 31.1441 26.0415 31.2536 26.2273H28.8891C28.8453 26.088 28.8098 25.9457 28.7824 25.8006C28.755 25.6554 28.7359 25.5073 28.7249 25.3564C28.3527 25.7628 27.9149 26.0473 27.4113 26.2099C26.9078 26.3725 26.3933 26.4538 25.8678 26.4538C25.4628 26.4538 25.0852 26.4015 24.7349 26.297C24.3846 26.1925 24.0781 26.0299 23.8153 25.8093C23.5526 25.5886 23.3474 25.3099 23.1996 24.9732C23.0518 24.6364 22.9779 24.2358 22.9779 23.7712C22.9779 23.2603 23.0627 22.8393 23.2324 22.5084C23.4021 22.1774 23.621 21.9132 23.8892 21.7158C24.1574 21.5184 24.4639 21.3703 24.8087 21.2716C25.1536 21.1729 25.5011 21.0945 25.8514 21.0364C26.2017 20.9784 26.5465 20.9319 26.8859 20.8971C27.2252 20.8623 27.5263 20.81 27.789 20.7403C28.0517 20.6706 28.2597 20.569 28.4129 20.4355C28.5662 20.3019 28.6374 20.1074 28.6264 19.852C28.6264 19.5849 28.5854 19.3729 28.5033 19.2162C28.4212 19.0594 28.3117 18.9374 28.1749 18.8504C28.038 18.7633 27.8793 18.7052 27.6987 18.6762C27.5181 18.6471 27.3238 18.6326 27.1158 18.6326C26.656 18.6326 26.2948 18.7371 26.032 18.9462C25.7693 19.1552 25.6161 19.5036 25.5723 19.9913H23.2406ZM28.6259 21.8204C28.5274 21.9133 28.4042 21.9859 28.2564 22.0382C28.1087 22.0904 27.9499 22.134 27.7803 22.1688C27.6106 22.2036 27.4327 22.2327 27.2466 22.2559C27.0605 22.2791 26.8744 22.3082 26.6883 22.343C26.5132 22.3778 26.3408 22.4243 26.1711 22.4823C26.0014 22.5404 25.8536 22.6188 25.7277 22.7175C25.6019 22.8162 25.5006 22.941 25.424 23.092C25.3474 23.243 25.309 23.4346 25.309 23.6668C25.309 23.8875 25.3474 24.0733 25.424 24.2243C25.5006 24.3752 25.6046 24.4942 25.736 24.5813C25.8673 24.6684 26.0206 24.7294 26.1957 24.7642C26.3709 24.7991 26.5515 24.8165 26.7376 24.8165C27.1973 24.8165 27.5531 24.7352 27.8049 24.5726C28.0567 24.4101 28.2428 24.2155 28.3632 23.9891C28.4836 23.7626 28.5575 23.5333 28.5848 23.301C28.6122 23.0688 28.6259 22.883 28.6259 22.7436V21.8204ZM34.5712 23.3007H32.3545C32.3764 23.9046 32.505 24.4068 32.7404 24.8075C32.9757 25.2081 33.2767 25.5304 33.6435 25.7742C34.0102 26.0181 34.4289 26.1923 34.8996 26.2968C35.3703 26.4013 35.852 26.4536 36.3446 26.4536C36.8262 26.4536 37.2997 26.4042 37.7649 26.3055C38.2301 26.2068 38.6434 26.0355 39.0046 25.7917C39.3659 25.5478 39.6587 25.2255 39.8831 24.8249C40.1075 24.4243 40.2197 23.9278 40.2197 23.3356C40.2197 22.9175 40.1431 22.5662 39.9898 22.2817C39.8366 21.9972 39.634 21.7591 39.3823 21.5675C39.1305 21.3759 38.8431 21.2221 38.5202 21.1059C38.1973 20.9898 37.8662 20.8911 37.5268 20.8098C37.1984 20.7285 36.8755 20.653 36.558 20.5834C36.2406 20.5137 35.9587 20.4353 35.7124 20.3482C35.4661 20.2611 35.2663 20.1479 35.1131 20.0085C34.9598 19.8692 34.8832 19.6892 34.8832 19.4685C34.8832 19.2827 34.927 19.1347 35.0145 19.0244C35.1021 18.914 35.2088 18.8298 35.3347 18.7718C35.4606 18.7137 35.6002 18.676 35.7534 18.6586C35.9067 18.6411 36.049 18.6324 36.1804 18.6324C36.5963 18.6324 36.9576 18.7166 37.2641 18.885C37.5706 19.0534 37.7403 19.3756 37.7731 19.8518H39.9898C39.946 19.2943 39.8119 18.8327 39.5875 18.4669C39.3631 18.1011 39.0812 17.8079 38.7419 17.5873C38.4025 17.3666 38.0167 17.2099 37.5843 17.117C37.1519 17.0241 36.7058 16.9776 36.246 16.9776C35.7863 16.9776 35.3375 17.0212 34.8996 17.1083C34.4617 17.1953 34.0677 17.3463 33.7174 17.5611C33.3671 17.776 33.0852 18.0692 32.8717 18.4408C32.6583 18.8124 32.5515 19.2885 32.5515 19.8692C32.5515 20.264 32.6282 20.5979 32.7814 20.8708C32.9347 21.1437 33.1372 21.3701 33.389 21.5501C33.6407 21.7301 33.9281 21.8753 34.251 21.9856C34.5739 22.0959 34.9051 22.1917 35.2444 22.273C36.0764 22.4588 36.725 22.6446 37.1902 22.8304C37.6554 23.0162 37.888 23.2949 37.888 23.6665C37.888 23.8872 37.8388 24.0701 37.7403 24.2152C37.6417 24.3604 37.5186 24.4765 37.3708 24.5636C37.223 24.6507 37.0588 24.7146 36.8782 24.7552C36.6976 24.7959 36.5252 24.8162 36.361 24.8162C36.1311 24.8162 35.9094 24.7872 35.696 24.7291C35.4825 24.671 35.2937 24.581 35.1295 24.4591C34.9653 24.3372 34.8312 24.1804 34.7272 23.9888C34.6232 23.7972 34.5712 23.5678 34.5712 23.3007ZM41.5819 13.7901V26.2273H43.9135V21.5068C43.9135 20.5894 44.0559 19.9303 44.3405 19.5297C44.6251 19.1291 45.0848 18.9287 45.7197 18.9287C46.278 18.9287 46.6666 19.1116 46.8856 19.4774C47.1045 19.8432 47.214 20.3978 47.214 21.141V26.2273H49.5456V20.6881C49.5456 20.1307 49.4991 19.6226 49.406 19.1639C49.313 18.7052 49.1515 18.3162 48.9217 17.9968C48.6918 17.6775 48.3771 17.4278 47.9775 17.2478C47.5779 17.0678 47.0662 16.9778 46.4422 16.9778C46.0044 16.9778 45.5555 17.0968 45.0958 17.3349C44.636 17.573 44.2584 17.9533 43.9628 18.4759H43.9135V13.7901H41.5819Z"
                                fill="#2B2B2B" />
                        </svg>
                        Cash on Delivery
                    </div>
                    <div class="RegisterAndLoginRighttext"
                        style="margin-left: 20px; align-items: center; display: flex;padding:20px;">
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
                    <!-- accrdion-->
                    <style>
                    .RegisterAndLoginRighttext {
                        margin-bottom: 20px;
                    }

                    .RegisterAndLoginRighttext h1 {
                        font-size: 20px;
                        font-weight: 400;
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

                    .RegisterAndLoginRighttext p span {
                        font-weight: 900;
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