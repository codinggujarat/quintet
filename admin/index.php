<?php
session_start();
error_reporting(0);
include("include/config.php");
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $ret = mysqli_query($con, "SELECT * FROM admin WHERE username='$username' and password='$password'");
    $num = mysqli_fetch_array($ret);
    if ($num > 0) {
        $extra = "dashboard.php"; //
        $_SESSION['alogin'] = $_POST['username'];
        $_SESSION['id'] = $num['id'];
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    } else {
        $_SESSION['errmsg'] = "Invalid username or password";
        $extra = "index.php";
        $host  = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Portal | Admin login</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');
    </style>
</head>

<body>

    <style>
    input::placeholder {
        font-weight: 600;
    }

    input {

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

    input:focus {
        box-shadow: none !important;
        border: 2px solid #000 !important;

    }
    </style>



    <div class=" wrapper">

        <style>
        .wrapper {
            background: #f2f3f8 !important;
            width: 100%;
            height: 90vh;
        }

        .module-login,
        form,
        .module-body,
        .module-head {
            background: white !important;
        }

        .module-head h1 {
            text-transform: uppercase;
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
        </style>
        <div class="container">
            <div class="row" style="display: flex;align-items: center;justify-content: center;height: 80vh;     ">
                <div class="module module-login " style="width: 350px; padding: 10px;border-radius: 20px; 
                   ">
                    <form class="form-vertical" method="post">
                        <div class="module-head">
                            <h1
                                style="font-size: 20px !important ;text-transform:capitalize;font-weight: 400 !important ; text-align: left;  ">
                                Admin Panel | Sign In</h1>
                            <span
                                style="font-size: 15px; color:black;text-align: center !important ; padding: 0px;font-weight: 500;   ">
                                <?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg'] = ""); ?>
                            </span>
                        </div>
                        <div class="module-body">
                            <div class="control-group">
                                <div class="controls row-fluid input-field-login">
                                    <input class="span12 form-control" type="text" id="inputEmail" name="username"
                                        style="background-color: #f2f3f8;" required>
                                    <label>
                                        What's your username? </label>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls row-fluid input-field-login">
                                    <input class="span12" type="password" id="inputPassword" name="password"
                                        style="background-color: #f2f3f8;" required>
                                    <label>
                                        Your password?</label>
                                </div>
                            </div>
                        </div>
                        <div class="module-foot" style="background: transparent ; border: 0 !important ;  ">
                            <div class="control-group">
                                <div class="controls clearfix" style="background: #fff !important  ;">
                                    <button type="submit" class=" btn checkout-page-button" name="submit">Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
    .checkout-page-button {
        display: flex;
        align-items: center;
        justify-content: center;
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
    </style>
    <!--/.wrapper-->


    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>