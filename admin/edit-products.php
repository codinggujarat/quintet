<?php
session_start();
include('include/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    $pid = intval($_GET['id']); // product id
    if (isset($_POST['submit'])) {
        $category = $_POST['category'];
        $subcat = $_POST['subcategory'];
        $productname = $_POST['productName'];
        $productcompany = $_POST['productCompany'];
        $productprice = $_POST['productprice'];
        $productpricebd = $_POST['productpricebd'];
        $productdescription = $_POST['productDescription'];
        $productscharge = $_POST['productShippingcharge'];
        $productavailability = $_POST['productAvailability'];
        $productcolor = $_POST['productColor'];
        $sql = mysqli_query($con, "update  products set category='$category',subCategory='$subcat',productName='$productname',productCompany='$productcompany',productPrice='$productprice',productDescription='$productdescription',shippingCharge='$productscharge',productAvailability='$productavailability',productColor='$productcolor',productPriceBeforeDiscount='$productpricebd' where id='$pid' ");
        $_SESSION['msg'] = "Product Updated Successfully !!";
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| Insert Product</title>
    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="assets2.0/css/core/libs.min.css" />


    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="assets2.0/css/hope-ui.min.css?v=2.0.0" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="assets2.0/css/custom.min.css?v=2.0.0" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="assets2.0/css/dark.min.css" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="assets2.0/css/customizer.min.css" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="assets2.0/css/rtl.min.css" />
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');
    @import url('https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css');
    @import url('https: //cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css');

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: 'Raleway ', sans-serif;
    }

    :root {
        --bs-blue: #3a57e8;
        --bs-indigo: #6610f2;
        --bs-purple: #6f42c1;
        --bs-pink: #d63384;
        --bs-red: #c03221;
        --bs-orange: #FAA938;
        --bs-yellow: #f16a1b;
        --bs-green: #1aa053;
        --bs-teal: #001F4D;
        --bs-cyan: #079aa2;
        --bs-white: #ffffff;
        --bs-gray: #6c757d;
        --bs-gray-dark: #343a40;
        --bs-gray-100: #f8f9fa;
        --bs-gray-200: #e9ecef;
        --bs-gray-300: #dee2e6;
        --bs-gray-400: #ced4da;
        --bs-gray-500: #adb5bd;
        --bs-gray-600: #6c757d;
        --bs-gray-700: #495057;
        --bs-gray-800: #343a40;
        --bs-gray-900: #212529;
        --bs-primary: #3a57e8;
        --bs-secondary: #001F4D;
        --bs-success: #1aa053;
        --bs-info: #079aa2;
        --bs-warning: #f16a1b;
        --bs-danger: #c03221;
        --bs-light: #dee2e6;
        --bs-dark: #212529;
        --bs-gray: #6c757d;
        --bs-gray-dark: #343a40;
        --bs-primary-rgb: 58, 87, 232;
        --bs-secondary-rgb: 0, 31, 77;
        --bs-success-rgb: 26, 160, 83;
        --bs-info-rgb: 7, 154, 162;
        --bs-warning-rgb: 241, 106, 27;
        --bs-danger-rgb: 192, 50, 33;
        --bs-light-rgb: 222, 226, 230;
        --bs-dark-rgb: 33, 37, 41;
        --bs-gray-rgb: 108, 117, 125;
        --bs-gray-dark-rgb: 52, 58, 64;
        --bs-white-rgb: 255, 255, 255;
        --bs-black-rgb: 0, 0, 0;
        --bs-body-color-rgb: 138, 146, 166;
        --bs-body-bg-rgb: 245, 246, 250;
        --bs-font-sans-serif: "Inter", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
        --bs-body-font-family: var(--bs-font-sans-serif);
        --bs-body-font-size: 1rem;
        --bs-body-font-weight: 400;
        --bs-body-line-height: 1.5;
        --bs-body-color: #8A92A6;
        --bs-body-bg: #F5F6FA;
        --bs-border-width: 1px;
        --bs-border-style: solid;
        --bs-border-color: #eee;
        --bs-border-color-translucent: rgba(0, 0, 0, 0.175);
        --bs-border-radius: 0.5rem;
        --bs-border-radius-sm: 0.25rem;
        --bs-border-radius-lg: 1rem;
        --bs-border-radius-xl: 1rem;
        --bs-border-radius-2xl: 2rem;
        --bs-border-radius-pill: 50rem;
        --bs-link-color: #3a57e8;
        --bs-link-hover-color: #2e46ba;
        --bs-code-color: #d63384;
        --bs-highlight-bg: #fcf8e3
    }



    .navbar-nav .nav-item .nav-link {
        overflow: visible;
        -webkit-transform: translateZ(0);
        transform: translateZ(0);
        box-shadow: 0 0 1px rgba(0, 0, 0, 0);
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        -webkit-transition: color .4s;
        transition: color .4s;
    }


    @keyframes eff24-move {
        30% {
            -webkit-transform: translate3d(0, -10px, 0);
        }

        100% {
            -webkit-transform: rotate(0deg);
        }
    }

    .navbar-nav .nav-item .nav-link:hover {
        -webkit-animation-name: eff24-move;
        animation-name: eff24-move;
        -webkit-animation-duration: 0.9s;
        animation-duration: 0.9s;
        -webkit-animation-timing-function: ease-in-out;
        animation-timing-function: ease-in-out;
        -webkit-animation-iteration-count: 1;
        animation-iteration-count: 1;

    }
    </style>
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
    bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>

    <script>
    function getSubcat(val) {
        $.ajax({
            type: "POST",
            url: "get_subcat.php",
            data: 'cat_id=' + val,
            success: function(data) {
                $("#subcategory").html(data);
            }
        });
    }

    function selectCountry(val) {
        $("#search-box").val(val);
        $("#suggesstion-box").hide();
    }
    </script>


</head>

<body>
    <?php include('include/sidebar.php'); ?>

    <main class="main-content">
        <div ss="position-relative iq-banner">
            <?php include('include/header.php'); ?>

            <div class="conatiner-fluid content-inner mt-5 py-0 ">
                <div class="row" style=" margin-top: 100px !important;">
                    <div class="col-sm-12">
                        <div class="centerCard">
                            <div class="card " style="width: 700px;">
                                <div class="card-body">
                                    <h3 style="font-family: 'Raleway',sans-serif ;font-weight: 400 !important ; "
                                        class="text-uppercase">
                                        edit category
                                    </h3>
                                    <div class="module-body">

                                        <?php if (isset($_POST['submit'])) { ?>
                                        <div class="alert alert-success">
                                            <h6>
                                                <span>
                                                    Well done!
                                                </span>
                                                <?php echo htmlentities($_SESSION['msg']); ?>
                                                <?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                            </h6>
                                            <button type="button" class="close" data-dismiss="alert">
                                                <svg fill="#000000" height="12px" width="12px" version="1.1" id="Capa_1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 490 490"
                                                    xml:space="preserve">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <polygon
                                                            points="456.851,0 245,212.564 33.149,0 0.708,32.337 212.669,245.004 0.708,457.678 33.149,490 245,277.443 456.851,490 489.292,457.678 277.331,245.004 489.292,32.337 ">
                                                        </polygon>
                                                    </g>
                                                </svg>
                                            </button>
                                        </div>
                                        <?php } ?>


                                        <?php if (isset($_GET['del'])) { ?>
                                        <div class="alert alert-error">
                                            <h6>
                                                <span>Oh snap!</span>
                                                <?php echo htmlentities($_SESSION['delmsg']); ?>
                                                <?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                                            </h6>
                                            <button type="button" class="close" data-dismiss="alert">
                                                <svg fill="#000000" height="12px" width="12px" version="1.1" id="Capa_1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 490 490"
                                                    xml:space="preserve">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <polygon
                                                            points="456.851,0 245,212.564 33.149,0 0.708,32.337 212.669,245.004 0.708,457.678 33.149,490 245,277.443 456.851,490 489.292,457.678 277.331,245.004 489.292,32.337 ">
                                                        </polygon>
                                                    </g>
                                                </svg>
                                            </button>
                                        </div>
                                        <?php } ?>

                                        <br />

                                        <form class="form-horizontal row-fluid" name="insertproduct" method="post"
                                            enctype="multipart/form-data">

                                            <?php

                                                $query = mysqli_query($con, "select products.*,category.categoryName as catname,category.id as cid,subcategory.subcategory as subcatname,subcategory.id as subcatid from products join category on category.id=products.category join subcategory on subcategory.id=products.subCategory where products.id='$pid'");
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($query)) {



                                                ?>


                                            <div class="control-group mb-4" style="position: relative;">
                                                <select name="category"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black "
                                                    onChange="getSubcat(this.value);" required>
                                                    <option value="<?php echo htmlentities($row['cid']); ?>">
                                                        <?php echo htmlentities($row['catname']); ?>
                                                    </option>
                                                    <?php $query = mysqli_query($con, "select * from category");
                                                            while ($rw = mysqli_fetch_array($query)) {
                                                                if ($row['catname'] == $rw['categoryName']) {
                                                                    continue;
                                                                } else {
                                                            ?>

                                                    <option value="<?php echo $rw['id']; ?>">
                                                        <?php echo $rw['categoryName']; ?>
                                                    </option>
                                                    <?php }
                                                            } ?>
                                                </select>
                                                <label class="imgLable">Category</label>
                                            </div>


                                            <div class="control-group mb-4" style="position: relative;">

                                                <select name="subcategory" id="subcategory"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black "
                                                    required>
                                                    <option value="<?php echo htmlentities($row['subcatid']); ?>">
                                                        <?php echo htmlentities($row['subcatname']); ?>
                                                    </option>
                                                </select>
                                                <label class="imgLable">Sub
                                                    Category</label>
                                            </div>


                                            <div class="control-group mb-4" style="position: relative;">
                                                <input type="text" name="productName" placeholder="Enter Product Name"
                                                    value="<?php echo htmlentities($row['productName']); ?>"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required style="outline: 0  !important ;border: 1px solid black; ">
                                                <label class="imgLable">Product
                                                    Name</label>
                                            </div>

                                            <div class="control-group mb-4" style="position: relative;">
                                                <input type="text" name="productCompany"
                                                    placeholder="Enter Product Comapny Name"
                                                    value="<?php echo htmlentities($row['productCompany']); ?>"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required style="outline: 0  !important ;border: 1px solid black; "
                                                    required>
                                                <label class="imgLable">Product
                                                    Company</label>
                                            </div>
                                            <div class="control-group mb-4" style="position: relative;">
                                                <input type="text" name="productpricebd"
                                                    placeholder="Enter Product Price"
                                                    value="<?php echo htmlentities($row['productPriceBeforeDiscount']); ?>"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required style="outline: 0  !important ;border: 1px solid black; "
                                                    required>
                                                <label class="imgLable">Product
                                                    Price Before
                                                    Discount</label>
                                            </div>

                                            <div class="control-group mb-4" style="position: relative;">
                                                <input type="text" name="productprice" placeholder="Enter Product Price"
                                                    value="<?php echo htmlentities($row['productPrice']); ?>"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required style="outline: 0  !important ;border: 1px solid black; "
                                                    required>
                                                <label class="imgLable">Product
                                                    Price</label>
                                            </div>

                                            <div class="control-group mb-4" style="position: relative;">
                                                <textarea name="productDescription"
                                                    placeholder="Enter Product Description" rows="6"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required style="outline: 0  !important ;border: 1px solid black; ">
                                                <?php echo htmlentities($row['productDescription']); ?>
                                                <label class="imgLable">Product
                                                    Description</label>
</textarea>
                                            </div>

                                            <div class="control-group mb-4" style="position: relative;">
                                                <input type="text" name="productShippingcharge"
                                                    placeholder="Enter Product Shipping Charge"
                                                    value="<?php echo htmlentities($row['shippingCharge']); ?>"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required style="outline: 0  !important ;border: 1px solid black; "
                                                    required>
                                                <label class="imgLable">Product
                                                    Shipping
                                                    Charge</label>
                                            </div>

                                            <div class="control-group mb-4" style="position: relative;">
                                                <select name="productAvailability" id="productAvailability"
                                                    class="span12 tip" required>
                                                    <option
                                                        value="<?php echo htmlentities($row['productAvailability']); ?>">
                                                        <?php echo htmlentities($row['productAvailability']); ?>
                                                    </option>
                                                    <option value="In Stock">In Stock</option>
                                                    <option value="Out of Stock">Out of Stock</option>
                                                </select>
                                                <label class="imgLable">Product
                                                    Availability</label>
                                            </div>
                                            <div class="control-group mb-4" style="position: relative;">
                                                <input type="text" name="productColor"
                                                    value="<?php echo htmlentities($row['productColor']); ?>"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required style="outline: 0  !important ;border: 1px solid black; "
                                                    required>
                                                <label class="imgLable">Product
                                                    Color</label>
                                            </div>


                                            <div class="control-group mb-4" style="position: relative;">
                                                <img src="productimages/<?php echo htmlentities($pid); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                    width="300px" height="100%"
                                                    style="border: 1px solid black;background:#f2f3f8  ; ">
                                                <a href="update-image1.php?id=<?php echo $row['id']; ?>"
                                                    style="border: 1px solid black; padding: 0;margin: 0;width: 100%; height: 40px;padding: 10px; display: flex;align-items: center;justify-content: start; background: #f2f3f8;   color: #000;  text-transform: uppercase;margin-top: 20px;    ">
                                                    <span>
                                                        Change Image one
                                                    </span>
                                                </a>
                                                <label class="imgLable">Product
                                                    Image One</label>
                                            </div>


                                            <div class="control-group mb-4" style="position: relative;">
                                                <img src="productimages/<?php echo htmlentities($pid); ?>/<?php echo htmlentities($row['productImage2']); ?>"
                                                    width="300px" height="100%"
                                                    style="border: 1px solid black;background:#f2f3f8  ; "> <a
                                                    href="update-image2.php?id=<?php echo $row['id']; ?>"
                                                    style="border: 1px solid black; padding: 0;margin: 0;width: 100%; height: 40px;padding: 10px; display: flex;align-items: center;justify-content: start; background: #f2f3f8;   color: #000;  text-transform: uppercase;margin-top: 20px;    ">
                                                    <span>
                                                        Change Image two
                                                    </span></a>
                                                <label class="imgLable">Product
                                                    Image Two</label>
                                            </div>



                                            <div class="control-group mb-4" style="position: relative;">
                                                <img src="productimages/<?php echo htmlentities($pid); ?>/<?php echo htmlentities($row['productImage3']); ?>"
                                                    width="300px" height="100%"
                                                    style="border: 1px solid black;background:#f2f3f8  ; "> <a
                                                    href="update-image3.php?id=<?php echo $row['id']; ?>"
                                                    style="border: 1px solid black; padding: 0;margin: 0;width: 100%; height: 40px;padding: 10px; display: flex;align-items: center;justify-content: start; background: #f2f3f8;   color: #000;  text-transform: uppercase;margin-top: 20px;    ">
                                                    <span>
                                                        Change Image three
                                                    </span></a>
                                                <label class="imgLable">Product
                                                    Image Three</label>
                                            </div>
                                            <div class="control-group mb-4" style="position: relative;">
                                                <img src="productimages/<?php echo htmlentities($pid); ?>/<?php echo htmlentities($row['productImageFour']); ?>"
                                                    width="300px" height="100%"> <a
                                                    href="update-image4.php?id=<?php echo $row['id']; ?>"
                                                    style="border: 1px solid black; padding: 0;margin: 0;width: 100%; height: 40px;padding: 10px; display: flex;align-items: center;justify-content: start; background: #f2f3f8;   color: #000;  text-transform: uppercase;margin-top: 20px;    ">
                                                    <span>
                                                        Change Image four
                                                    </span></a>
                                                <label class="imgLable">Product
                                                    Image Four</label>
                                            </div>
                                            <div class="control-group mb-4" style="position: relative;">
                                                <img src="productimages/<?php echo htmlentities($pid); ?>/<?php echo htmlentities($row['productImageFive']); ?>"
                                                    width="300px" height="100%"> <a
                                                    href="update-image5.php?id=<?php echo $row['id']; ?>"
                                                    style="border: 1px solid black; padding: 0;margin: 0;width: 100%; height: 40px;padding: 10px; display: flex;align-items: center;justify-content: start; background: #f2f3f8;   color: #000;  text-transform: uppercase;margin-top: 20px;    ">
                                                    <span>
                                                        Change Image five
                                                    </span>
                                                </a>
                                                <label class="imgLable">Product
                                                    Image Five</label>
                                            </div>
                                            <div class="control-group mb-4" style="position: relative;">
                                                <img src="productimages/<?php echo htmlentities($pid); ?>/<?php echo htmlentities($row['productImageSix']); ?>"
                                                    width="300px" height="100%"> <a
                                                    href="update-image6.php?id=<?php echo $row['id']; ?>"
                                                    style="border: 1px solid black; padding: 0;margin: 0;width: 100%; height: 40px;padding: 10px; display: flex;align-items: center;justify-content: start; background: #f2f3f8;   color: #000;  text-transform: uppercase;margin-top: 20px; ;margin-bottom: 20px;    ">
                                                    <span>
                                                        Change Image six
                                                    </span></a>
                                                <label class="imgLable">Product
                                                    Image Six</label>
                                            </div>
                                            <?php } ?>
                                            <div class="control-group mb-4" style="position: relative;">
                                                <button type="submit" name="submit"
                                                    class="checkout-page-button">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include('include/footer.php'); ?>

    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="scripts/datatables/jquery.dataTables.js"></script>
    <script>
    $(document).ready(function() {
        $('.datatable-1').dataTable();
        $('.dataTables_paginate').addClass("btn-group datatable-pagination");
        $('.dataTables_paginate > a').wrapInner('<span />');
        $('.dataTables_paginate > a:first-child').append(
            '<i class="icon-chevron-left shaded"></i>');
        $('.dataTables_paginate > a:last-child').append(
            '<i class="icon-chevron-right shaded"></i>');
    });
    </script>
    <!-- Library Bundle Script -->
    <script src="assets2.0/js/core/libs.min.js"></script>

    <!-- External Library Bundle Script -->
    <script src="assets2.0/js/core/external.min.js"></script>

    <!-- Widgetchart Script -->
    <script src="assets2.0/js/charts/widgetcharts.js"></script>

    <!-- mapchart Script -->
    <script src="assets2.0/js/charts/vectore-chart.js"></script>
    <script src="assets2.0/js/charts/dashboard.js"></script>

    <!-- fslightbox Script -->
    <script src="assets2.0/js/plugins/fslightbox.js"></script>

    <!-- Settings Script -->
    <script src="assets2.0/js/plugins/setting.js"></script>

    <!-- Slider-tab Script -->
    <script src="assets2.0/js/plugins/slider-tabs.js"></script>

    <!-- Form Wizard Script -->
    <script src="assets2.0/js/plugins/form-wizard.js"></script>

    <!-- AOS Animation Plugin-->

    <!-- App Script -->
    <script src="assets2.0/js/hope-ui.js" defer></script>
</body>
<?php } ?>