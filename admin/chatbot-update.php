<?php
session_start();
include('include/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    $id = $_GET['id'];
    $result = mysqli_query($con, "SELECT * FROM chatbot WHERE id=$id");
    $row = mysqli_fetch_assoc($result);

    if (isset($_POST['update'])) {
        $query = mysqli_real_escape_string($con, $_POST['query']);
        $reply = mysqli_real_escape_string($con, $_POST['reply']);

        $sql = "UPDATE chatbot SET queries='$query', replies='$reply' WHERE id=$id";
        if (mysqli_query($con, $sql)) {
            header("Location: chatbot.php");
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Chatbot</title>
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
    <!-- jQuery -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- TinyMCE (Text Editor) -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.tiny.cloud/1/3vxwi4cfe8e7tjrhybsa8xgu2eyorwm4od3ul0zxur1wtdc5/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <!-- RTL Css -->
    <link rel="stylesheet" href="assets2.0/css/rtl.min.css" />
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>


    <script>
    $(document).ready(function() {
        tinymce.init({
            selector: '.editor',
            height: 250,
            menubar: true,
            plugins: 'image link lists advlist code table textcolor colorpicker fullscreen',
            toolbar: 'undo redo | formatselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | fontsizeselect forecolor backcolor | bullist numlist | outdent indent | image link table code fullscreen',

            // Font options
            fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
            content_css: 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',

            // Image upload settings
            images_upload_url: 'chatbot-update.php', // Create this file for handling image uploads
            automatic_uploads: true,
            file_picker_types: 'image',
            file_picker_callback: function(callback, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];
                    var reader = new FileReader();
                    reader.onload = function() {
                        callback(reader.result, {
                            alt: file.name
                        });
                    };
                    reader.readAsDataURL(file);
                };
                input.click();
            }
        });
    });
    </script>

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
</head>

<body>


    <?php include('include/sidebar.php'); ?>
    <main class="main-content">
        <div ss="position-relative iq-banner">
            <?php include('include/header.php'); ?>
            <?php include_once('include/topstorebar.php'); ?>
            <div class="coner-fc content-inner mt-5 py-0 ">
                <div class="row" style=" margin-top: 100px !important;">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card ">
                            <div class="card-body">
                                <h3 style="
    font-size: 17px !important;
                                font-family: 'Poppins',sans-serif ;font-weight: 400 !important ; "
                                    class="text-uppercase">
                                    manage Chatbot Query/Reply
                                </h3>
                                <div class="module-body " style=" overflow-x:auto !important ;">

                                    <style>
                                    table thead tr th,
                                    table tbody tr td {
                                        font-size: 13px !important;
                                        font-weight: 500 !important;
                                        text-transform: capitalize !important;
                                        color: #000 !important;
                                    }

                                    .form-control {
                                        width: 100% !important;
                                    }

                                    input,
                                    .card {
                                        width: 100% !important;
                                        padding: 12px 10px;
                                    }
                                    </style>
                                    <div class="card p-0">
                                        <h2>Edit Chatbot Query</h2>
                                        <form method="post">

                                            <div class="form-control">
                                                <input type="text" class=form-control" name="query"
                                                    value="<?php echo $row['queries']; ?>" required>
                                            </div>
                                            <div class="form-control">
                                                <textarea name="reply"
                                                    class="editor"><?php echo $row['replies']; ?></textarea>
                                            </div>

                                            <div class="form-control">
                                                <button type="submit" class="btn btn-dark" name="update">Update</button>
                                                <a href="chatbot.php" class="btn btn-dark">Back to List</a>
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
    <script>
    $(document).ready(function() {
        tinymce.init({
            selector: '.editor',
            height: 250,
            menubar: true,
            plugins: 'image link lists advlist code table textcolor colorpicker fullscreen',
            toolbar: 'undo redo | formatselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | fontsizeselect forecolor backcolor | bullist numlist | outdent indent | image link table code fullscreen',

            // Font options
            fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
            content_css: 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',

            // Image upload settings
            images_upload_url: 'upload_image.php', // Create this file for handling image uploads
            automatic_uploads: true,
            file_picker_types: 'image',
            file_picker_callback: function(callback, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];
                    var reader = new FileReader();
                    reader.onload = function() {
                        callback(reader.result, {
                            alt: file.name
                        });
                    };
                    reader.readAsDataURL(file);
                };
                input.click();
            }
        });
    });
    </script>


    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript">
    </script>
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

</html>