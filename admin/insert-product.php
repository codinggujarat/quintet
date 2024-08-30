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
        $productavailability = $_POST['productAvailability'];
        $productimage1 = $_FILES["productimage1"]["name"];
        $productimage2 = $_FILES["productimage2"]["name"];
        $productimage3 = $_FILES["productimage3"]["name"];
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
        $sql = mysqli_query($con, "insert into products(category,subCategory,productName,productCompany,productPrice,productDescription,shippingCharge,productAvailability,productColor,productImage1,productImage2,productImage3,productPriceBeforeDiscount) values('$category','$subcat','$productname','$productcompany','$productprice','$productdescription','$productscharge','$productavailability','productcolor','$productimage1','$productimage2','$productimage3','$productpricebd')");
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
        <script type="text/javascript">
            bkLib.onDomLoaded(nicEditors.allTextAreas);
        </script>

        <script>
            function getSubcat(val) {
                $.ajax({
                    type: "POST",
                    url: "get_subcat.php",
                    data: 'cat_id=' + val,
                    success: function (data) {
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
                <!--Nav Start-->
                <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar fixed-top"
                    style="background:#f2f3f8 !important  ; ">
                    <div class="container-fluid navbar-inner">

                        <div class="sidebar-toggle " data-toggle="sidebar" data-active="true" style="background: #0dcaf0;">
                            <i class="icon">
                                <svg width="20" class="icon-20" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                                </svg>
                            </i>
                        </div>
                        <div class="navbar-brand"
                            style="display: flex;align-items: center;justify-content: end !important ;   ">
                            <!--logo End-->
                            <!-- 
                            <h4 class="logo-title">

                            </h4> -->
                            <div class="dropdown">

                                <a href="#" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="./images/user1.png" style=" width: 50px !important;
                            height: 50px !important;
                            border-radius: 50% !important;
                            border: 1px solid black !important; 
                            background: #0dcaf0 !important ; 
                            " />
                                </a>
                                <style>
                                    .dropdown-menu {
                                        top: 50px !important;
                                        left: -130px !important;
                                    }
                                </style>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="change-password.php">Change Password</a></li>
                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="conatiner-fluid content-inner mt-5 py-0 ">
                    <div class="row" style=" margin-top: 100px !important;">
                        <div class="col-sm-12">
                            <div class="card p-lg-3">
                                <div class="card-body">
                                    <h3 style="font-family: 'Raleway',sans-serif ;font-weight: 400 !important ; "
                                        class="text-uppercase">
                                        insert product
                                    </h3>
                                    <div class="module-body">

                                        <?php if (isset($_POST['submit'])) { ?>
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>Well done!</strong>
                                                <?php echo htmlentities($_SESSION['msg']); ?>
                                                <?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                            </div>
                                        <?php } ?>


                                        <?php if (isset($_GET['del'])) { ?>
                                            <div class="alert alert-error">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>Oh snap!</strong>
                                                <?php echo htmlentities($_SESSION['delmsg']); ?>
                                                <?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                                            </div>
                                        <?php } ?>

                                        <br />

                                        <form class="form-horizontal row-fluid" name="insertproduct" method="post"
                                            enctype="multipart/form-data">

                                            <div class="control-group mb-4">
                                                <label class=" text-uppercase   text-black" for="basicinput"
                                                    style="font-size: 15px;font-weight: 500; ">Category</label>
                                                <select name="category"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black "
                                                    onChange="getSubcat(this.value);" required>
                                                    <option value="">Select Category</option>
                                                    <?php $query = mysqli_query($con, "select * from category");
                                                    while ($row = mysqli_fetch_array($query)) { ?>

                                                        <option value="<?php echo $row['id']; ?>">
                                                            <?php echo $row['categoryName']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>


                                            <div class="control-group mb-4">
                                                <label class=" text-uppercase   text-black" for="basicinput"
                                                    style="font-size: 15px;font-weight: 500; ">Sub
                                                    Category</label>
                                                <select name="subcategory" id="subcategory"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black "
                                                    required>
                                                </select>
                                            </div>


                                            <div class="control-group mb-4">
                                                <label class=" text-uppercase   text-black" for="basicinput"
                                                    style="font-size: 15px;font-weight: 500; ">Product
                                                    Name</label>
                                                <input type="text" name="productName" placeholder="Enter Product Name"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required style="outline: 0  !important ;border: 1px solid black; "
                                                    required>
                                            </div>

                                            <div class="control-group mb-4">
                                                <label class=" text-uppercase   text-black" for="basicinput"
                                                    style="font-size: 15px;font-weight: 500; ">Product
                                                    Company</label>
                                                <input type="text" name="productCompany"
                                                    placeholder="Enter Product Comapny Name"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required style="outline: 0  !important ;border: 1px solid black; "
                                                    required>
                                            </div>
                                            <div class="control-group mb-4">
                                                <label class=" text-uppercase   text-black" for="basicinput"
                                                    style="font-size: 15px;font-weight: 500; ">Product Price
                                                    Before
                                                    Discount</label>
                                                <input type="text" name="productpricebd" placeholder="Enter Product Price"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required style="outline: 0  !important ;border: 1px solid black; "
                                                    required>
                                            </div>

                                            <div class="control-group mb-4">
                                                <label class=" text-uppercase   text-black" for="basicinput"
                                                    style="font-size: 15px;font-weight: 500; ">Product Price
                                                    After
                                                    Discount(Selling Price)</label>
                                                <input type="text" name="productprice" placeholder="Enter Product Price"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required style="outline: 0  !important ;border: 1px solid black; "
                                                    required>
                                            </div>

                                            <div class="control-group mb-4">
                                                <label class=" text-uppercase   text-black" for="basicinput"
                                                    style="font-size: 15px;font-weight: 500; ">Product
                                                    Description</label>
                                                <textarea name="productDescription" placeholder="Enter Product Description"
                                                    rows="6"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required style="outline: 0  !important ;border: 1px solid black; ">
                                                                                                    </textarea>
                                            </div>

                                            <div class="control-group mb-4">
                                                <label class=" text-uppercase   text-black" for="basicinput"
                                                    style="font-size: 15px;font-weight: 500; ">Product
                                                    Shipping
                                                    Charge</label>
                                                <input type="text" name="productShippingcharge"
                                                    placeholder="Enter Product Shipping Charge"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required style="outline: 0  !important ;border: 1px solid black; "
                                                    required>
                                            </div>


                                            <div class="control-group mb-4">
                                                <label class=" text-uppercase   text-black" for="basicinput"
                                                    style="font-size: 15px;font-weight: 500; ">Product
                                                    Availability</label>
                                                <select name="productAvailability" id="productAvailability"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black "
                                                    required>
                                                    <option value="">Select</option>
                                                    <option value="In Stock">In Stock</option>
                                                    <option value="Out of Stock">Out of Stock</option>
                                                </select>
                                            </div>


                                            <div class="control-group mb-4">
                                                <label class=" text-uppercase   text-black" for="basicinput"
                                                    style="font-size: 15px;font-weight: 500; ">Product
                                                    Color</label>
                                                <input type="text" name="productColor"
                                                    placeholder="Enter Product productColor"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required style="outline: 0  !important ;border: 1px solid black; "
                                                    required>
                                            </div>
                                            <div class="control-group mb-4">
                                                <label class=" text-uppercase   text-black" for="basicinput"
                                                    style="font-size: 15px;font-weight: 500; ">Product
                                                    Image1</label>
                                                <input type="file" name="productimage1" id="productimage1" value=""
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required style="outline: 0  !important ;border: 1px solid black; "
                                                    required>
                                            </div>


                                            <div class="control-group mb-4">
                                                <label class=" text-uppercase   text-black" for="basicinput"
                                                    style="font-size: 15px;font-weight: 500; ">Product
                                                    Image2</label>
                                                <input type="file" name="productimage2"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required style="outline: 0  !important ;border: 1px solid black; "
                                                    required>
                                            </div>



                                            <div class="control-group mb-4">
                                                <label class=" text-uppercase   text-black" for="basicinput"
                                                    style="font-size: 15px;font-weight: 500; ">Product
                                                    Image3</label>
                                                <input type="file" name="productimage3"
                                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 text-black"
                                                    required style="outline: 0  !important ;border: 1px solid black; ">
                                            </div>

                                            <div class="control-group mb-4">
                                                <button type="submit" name="submit"
                                                    class="btn col-lg-4 bg-black text-white text-uppercase  border-0 rounded-0"
                                                    style=" font-family: 'Raleway' ,sans-serif ; font-weight: 400 !important ;  ">Insert</button>
                                            </div>
                                        </form>
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
            $(document).ready(function () {
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