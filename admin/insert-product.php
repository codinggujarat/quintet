<?php
session_start();
include('include/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    if (isset($_POST['submit'])) {
        $category = $_POST['category'];
        $subcat = $_POST['subcategory'];
        $productname = $_POST['productName'];
        $productcompany = $_POST['productCompany'];
        $productprice = $_POST['productprice'];
        $productpricebd = $_POST['productpricebd'];
        $productdescription = $_POST['productDescription'];
        $productscharge = $_POST['productShippingcharge'];
        $productcolor = $_POST['productColor'];
        $productcare = $_POST['ProductCare'];
        $productSizes = $_POST['productSizes'];
        $productavailability = $_POST['productAvailability'];
        $productimage1 = $_FILES["productimage1"]["name"];
        $productimage2 = $_FILES["productimage2"]["name"];
        $productimage3 = $_FILES["productimage3"]["name"];
        $productimageFour = $_FILES["productimageFour"]["name"];
        $productimageFive = $_FILES["productimageFive"]["name"];
        $productimageSix = $_FILES["productimageSix"]["name"];
        //for getting product id
        $query = mysqli_query($con, "select max(id) as pid from products");
        $result = mysqli_fetch_array($query);
        $productid = $result['pid'] + 1;
        $dir = "productimages/$productid";
        if (!is_dir($dir)) {
            mkdir("productimages/" . $productid);
        }

        move_uploaded_file($_FILES["productimage1"]["tmp_name"], "productimages/$productid/" . $_FILES["productimage1"]["name"]);
        move_uploaded_file($_FILES["productimage2"]["tmp_name"], "productimages/$productid/" . $_FILES["productimage2"]["name"]);
        move_uploaded_file($_FILES["productimage3"]["tmp_name"], "productimages/$productid/" . $_FILES["productimage3"]["name"]);
        move_uploaded_file($_FILES["productimageFour"]["tmp_name"], "productimages/$productid/" . $_FILES["productimageFour"]["name"]);
        move_uploaded_file($_FILES["productimageFive"]["tmp_name"], "productimages/$productid/" . $_FILES["productimageFive"]["name"]);
        move_uploaded_file($_FILES["productimageSix"]["tmp_name"], "productimages/$productid/" . $_FILES["productimageSix"]["name"]);
        $sql = mysqli_query($con, "insert into products(category,subCategory,ProductCare,productSizes,productName,productCompany,productPrice,productDescription,shippingCharge,productAvailability,productColor,productImage1,productImage2,productImage3,productImageFour,productImageFive,productImageSix,productPriceBeforeDiscount) values('$category','$subcat','$productname','$productcompany','$productcare','$productSizes','$productprice','$productdescription','$productscharge','$productavailability','productcolor','$productimage1','$productimage2','$productimage3','$productimageFour','$productimageFive','$productimageSix','$productpricebd')");
        $_SESSION['msg'] = "Product Inserted Successfully !!";
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
                            <div class="card p-0" style="width:700px ;">
                                <div class="card-body">
                                    <h3 style="font-family: 'Poppins',sans-serif ;font-weight: 400 !important ; "
                                        class="text-uppercase">
                                        insert product
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

                                            <div class="control-group input-field-login mb-4">
                                                <select name="category"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black "
                                                    onChange="getSubcat(this.value);" required>
                                                    <option value=""></option>
                                                    <?php $query = mysqli_query($con, "select * from category");
                                                        while ($row = mysqli_fetch_array($query)) { ?>

                                                    <option value="<?php echo $row['id']; ?>">
                                                        <?php echo $row['categoryName']; ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                                <label>Select Category</label>
                                            </div>


                                            <div class="control-group input-field-login mb-4">
                                                <select name="subcategory" id="subcategory"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black "
                                                    required>
                                                </select>
                                                <label>Sub
                                                    Category</label>
                                            </div>


                                            <div class="control-group input-field-login mb-4">
                                                <input type="text" name="productName"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required required>
                                                <label>Product
                                                    Name</label>
                                            </div>

                                            <div class="control-group input-field-login mb-4">
                                                <input type="text" name="productCompany"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required required>
                                                <label>Product
                                                    Company</label>
                                            </div>
                                            <div class="control-group input-field-login mb-4">
                                                <input type="text" name="productpricebd"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required required>
                                                <label>Product Price
                                                    Before
                                                    Discount</label>
                                            </div>

                                            <div class="control-group input-field-login mb-4">
                                                <input type="text" name="productprice"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required required>
                                                <label>Product Price
                                                    After
                                                    Discount(Selling Price)</label>
                                            </div>
                                            <div class="control-group   mb-4" style="position: relative;">

                                                <label for="size">Select Size:</label>
                                                <select name="productSizes" id="size">
                                                    <option value="Select Size">
                                                        Select Size
                                                    </option>
                                                    <option value="S">Small</option>
                                                    <option value="M">Medium</option>
                                                    <option value="L">Large</option>
                                                    <option value="XL">Extra Large</option>
                                                </select>
                                            </div>
                                            <div class="control-group input-field-login mb-4">
                                                <textarea name="productDescription" rows="12"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required>
                                            </textarea>
                                                <label>Product
                                                    Description</label>
                                            </div>
                                            <div class="control-group input-field-login mb-4">
                                                <textarea name="ProductCare" placeholder="Enter Product Description"
                                                    rows="6" class="span8 tip">
                                            </textarea>
                                                <label>Product
                                                    Care</label>
                                            </div>

                                            <div class="control-group input-field-login mb-4">
                                                <input type="text" name="productShippingcharge"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required required>
                                                <label>Product
                                                    Shipping
                                                    Charge</label>
                                            </div>


                                            <div class="control-group input-field-login mb-4">
                                                <select name="productAvailability" id="productAvailability"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black "
                                                    required>
                                                    <option value=""></option>
                                                    <option value="In Stock">In Stock</option>
                                                    <option value="Out of Stock">Out of Stock</option>
                                                </select>
                                                <label>Product
                                                    Availability</label>
                                            </div>


                                            <div class="control-group input-field-login mb-4">
                                                <input type="text" name="productColor"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required required>
                                                <label>Product
                                                    Color</label>
                                            </div>
                                            <div class="control-group   mb-4" style="position: relative;">
                                                <input type="file" name="productimage1" id="productimage1" value=""
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required required>
                                                <label class="imgLable">Product
                                                    Image One</label>
                                            </div>


                                            <div class="control-group  mb-4" style="position: relative;">
                                                <input type="file" name="productimage2"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required required>
                                                <label class="imgLable">Product
                                                    Image Two</label>
                                            </div>



                                            <div class="control-group  mb-4" style="position: relative;">
                                                <input type="file" name="productimage3"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required>
                                                <label class="imgLable">Product
                                                    Image Three</label>
                                            </div>
                                            <div class="control-group  mb-4" style="position: relative;">
                                                <input type="file" name="productimageFour"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required>
                                                <label class="imgLable">Product
                                                    Image Four</label>
                                            </div>
                                            <div class="control-group  mb-4" style="position: relative;">
                                                <input type="file" name="productimageFive"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required>
                                                <label class="imgLable">Product
                                                    Image Five</label>
                                            </div>
                                            <div class="control-group  mb-4" style="position: relative;">
                                                <input type="file" name="productimageSix" id="productimageSix"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required>
                                                <label class="imgLable">Product
                                                    Image Six</label>
                                            </div>

                                            <div class="control-group input-field-login mb-4">
                                                <button type="submit" name="submit"
                                                    class="checkout-page-button">Insert</button>
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

    <script src=" scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="scripts/datatables/jquery.dataTables.js"></script>
    <script>
    $(document).ready(function() {
        $('.datatable-1').dataTable();
        $('.dataTables_paginate').addClass("btn-group datatable-pagination");
        $('.dataTables_paginate > a').wrapInner('<span />');
        $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
        $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
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