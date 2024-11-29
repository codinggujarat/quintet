<?php
session_start();
include('include/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    date_default_timezone_set('Asia/Kolkata'); // change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());


    if (isset($_POST['submit'])) {
        $sql = mysqli_query($con, "SELECT password FROM  admin where password='" . md5($_POST['password']) . "' && username='" . $_SESSION['alogin'] . "'");
        $num = mysqli_fetch_array($sql);
        if ($num > 0) {
            $con = mysqli_query($con, "update admin set password='" . md5($_POST['newpassword']) . "', updationDate='$currentTime' where username='" . $_SESSION['alogin'] . "'");
            $_SESSION['msg'] = "Password Changed Successfully !!";
        } else {
            $_SESSION['msg'] = "Old Password not match !!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| Change Password</title>

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

    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>
    <script type="text/javascript">
    function valid() {
        if (document.chngpwd.password.value == "") {
            alert("Current Password Filed is Empty !!");
            document.chngpwd.password.focus();
            return false;
        } else if (document.chngpwd.newpassword.value == "") {
            alert("New Password Filed is Empty !!");
            document.chngpwd.newpassword.focus();
            return false;
        } else if (document.chngpwd.confirmpassword.value == "") {
            alert("Confirm Password Filed is Empty !!");
            document.chngpwd.confirmpassword.focus();
            return false;
        } else if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
            alert("Password and Confirm Password Field do not match  !!");
            document.chngpwd.confirmpassword.focus();
            return false;
        }
        return true;
    }
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
    <style>
    .checkbox {
        display: flex;
        align-items: center;
        justify-content: start;
        width: 200px;
        padding: 10px 0;
    }

    .checkbox input {
        height: 16px;
        width: 16px;
        accent-color: #000;
    }

    .checkbox label {
        font-size: 18px !important;
        color: #000;
        margin-left: 10px;
        font-weight: 500;
        font-family: 'Raleway', sans-serif !important;
    }

    .radio {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: end;
    }
    </style>

</head>


<body>
    <?php include('include/sidebar.php'); ?>

    <style>
    .input-field-login input {

        height: 50px !important;
        width: 100% !important;
        outline: none !important;
        font-size: 16px !important;
        border: 1px solid #000 !important;
        transition: all 0.3s ease !important;
        outline: o !important;
        color: #000;
        font-weight: bold !important;
        background: #fff !important;

    }

    .checkout-page-button {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        background: #000 !important;
        width: 100% !important;
        color: #fff !important;
        height: 40px !important;
        font-size: 15px !important;
        border-radius: 10px !important;
        font-family: 'Raleway', sans-serif !important;
        font-weight: 400 !important;
    }

    .checkout-page-button:hover {
        color: #fff !important;
        border: 1px solid black !important;
    }

    .input-field-login {
        position: relative;
    }



    .input-field-login label {
        font-family: 'Raleway', sans-serif !important;
        font-size: 17px;
        color: #000;
        font-weight: 600;
        text-transform: capitalize !important;
    }

    .input-field-login label {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: #000;
        font-size: 15px;
        pointer-events: none;
        transition: 0.3s;
        font-family: 'Raleway', sans-serif !important;
        font-weight: 500;

    }

    input:focus,
    textarea:focus {
        border: 2px solid #000 !important;
    }

    input:focus~label,
    textarea:focus~label,
    input:valid~label,
    textarea:valid~label {
        top: 0;
        left: 15px;
        font-size: 16px;
        padding: 0 2px;
        background: #fff;
        color: #000;
    }

    .noallowtochage input {
        cursor: no-drop;
        background: #f2f3f8;
    }

    .alert {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #f2f3f8;
        border: 1px solid black;
        height: 20px;
        margin-top: 30px;
        border-radius: 0;
        margin-bottom: 30px;
    }


    .alert button {
        border: 0;
        outline: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: transparent;
    }

    .alert span {
        font-weight: bold;
    }

    .alert span,
    .alert h6 {
        text-transform: uppercase;
        font-size: 13px;
    }
    </style>

    <main class="main-content">

        <div class="position-relative iq-banner">
            <?php include('include/header.php'); ?>

            <div class="conatiner-fluid content-inner mt-5 py-0 d-flex align-items-center justify-content-center"
                style="height: 100vh; display: flex;align-items:center; justify-content:center;  ">
                <div class="module bg-white p-5 rounded-3" style="width:400px;">
                    <div class="module-head">
                        <h4 class="text-capitalize "
                            style="font-size:25px;text-align:left; font-weight: 600;font-family: 'Raleway',sans-serif  ;  ">
                            Admin Change
                            Password
                        </h4>
                    </div>
                    <div class="module-body ">

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
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 490 490" xml:space="preserve">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
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

                        <form class="form-horizontal row-fluid " name="chngpwd" method="post" onSubmit="return valid();"
                            action="">

                            <div class="control-group mb-3 input-field-login">
                                <input type="password" name="password"
                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 password" required
                                    style="outline: 0  !important ;border: 1px solid black; ">
                                <label>Enter Your Current Password</label>
                            </div>


                            <div class="control-group mb-3 input-field-login">
                                <input type="password" " name=" newpassword"
                                    class="bg-transparent border-1 rounded-0 w-100 p-lg-2 password" required
                                    style="outline: 0  !important ;border: 1px solid black; ">
                                <label>Enter Your New Password</label>
                            </div>

                            <div class="control-group mb-3 input-field-login">
                                <input type="password" name="confirmpassword"
                                    class="bg-transparent border-1 rounded-0 w-100   p-lg-2 password " required
                                    style="outline: 0  !important ;border: 1px solid black;  ">
                                <label> Enter Your Confirm Password</label>
                            </div>

                            <span class="checkbox">
                                <input type="checkbox" id="checks" class="eye-icon" />
                                <label for="checks">Show Password</label>
                            </span>



                            <div class="control-group">
                                <button type="submit" name="submit" class="checkout-page-button">Submit</button>
                            </div>
                        </form>
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
    <script>
    const container = document.querySelector(".container"),
        pwFields = document.querySelectorAll(".password"),
        signUp = document.querySelector(".signup-link"),
        login = document.querySelector(".login-link");





    const forms = document.querySelector(".forms"),
        pwShowHide = document.querySelectorAll(".eye-icon");
    pwShowHide.forEach(eyeIcon => {
        eyeIcon.addEventListener("click", () => {
            let pwFields = eyeIcon.parentElement.parentElement
                .querySelectorAll(".password");

            pwFields.forEach(password => {
                if (password.type === "password") {
                    password.type = "text";
                    eyeIcon.classList.replace("bx-hide",
                        "bx-show");
                    return;
                }
                password.type = "password";
                eyeIcon.classList.replace("bx-show",
                    "bx-hide");
            })

        })
    })
    </script>
</body>
<?php } ?>