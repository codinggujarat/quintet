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
        $extra = "change-password.php"; //
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

    <div class="navbar navbar-fixed-top" style="background: #f2f3f8 !important ; ">
        <div class="navbar-inner" style="background: #f2f3f8 !important ;">
            <div class="container">
                <style>
                input {
                    height: 45px !important;
                    width: 100% !important;
                    outline: none !important;
                    font-size: 12px !important;
                    border-radius: 5px !important;
                    border: 1px solid #000 !important;
                    transition: all 0.3s ease !important;
                    outline: o !important;
                }

                input:focus {
                    box-shadow: none !important;
                    border-color: #9b59b6;
                }
                </style>

                <div class="nav-collapse "
                    style="display: flex;align-items:center;justify-content: end   ;height: 80px !important; background: #f2f3f8 !important ;">
                    <ul class="nav ">
                        <li>
                            <a href="http://localhost/shopping/"
                                style="background :#fff;  border: 2px solid black;text-transform: uppercase;line-height: 1px;font-size: 12px;font-weight: 600 !important;    ">
                                Back to Web
                            </a>
                        </li>
                    </ul>
                </div><!-- /.nav-collapse -->
            </div>
        </div><!-- /navbar-inner -->
    </div><!-- /navbar -->



    <div class="wrapper ">
        <div class="container">
            <div class="row" style="display: flex;align-items: center;justify-content: center;height: 70vh;     ">
                <div class="module module-login "
                    style="background-color: #f2f3f8;width: 400px; padding: 30px;border-radius: 20px; border: 1px solid black;    ">
                    <form class="form-vertical" method="post">
                        <div class="module-head" style="background-color: #f2f3f8;">
                            <h1 style="font-size: 30px !important ;font-weight: 400 !important ;text-align: center;  ">
                                Sign In</h1>
                            <span
                                style="font-size: 15px; color:black;text-align: center !important ; padding: 0px;font-weight: 500;   ">
                                <?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg'] = ""); ?>
                            </span>
                        </div>
                        <div class="module-body" style="background-color: #f2f3f8;">
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <label class="info-title" for="exampleInputEmail2"
                                        style="font-family: 'Raleway' , sans-serif !important;font-size: 17px;color: #000;text-transform: capitalize !important ; ">username</label>
                                    <input class="span12 form-control" type="text" id="inputEmail" name="username"
                                        placeholder="Enter Your Username" style="background-color: #f2f3f8;">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <label class="info-title" for="exampleInputEmail2"
                                        style="font-family: 'Raleway' , sans-serif !important;font-size: 17px;color: #000;text-transform: capitalize !important ; ">Password</label>
                                    <input class="span12" type="password" id="inputPassword" name="password"
                                        placeholder="Enter Your Password" style="background-color: #f2f3f8;">
                                </div>
                            </div>
                        </div>
                        <div class="module-foot" style="background: transparent ; border: 0 !important ;  ">
                            <div class="control-group">
                                <div class="controls clearfix" style="background: #fff !important  ;">
                                    <button type="submit" class=" " name="submit"
                                        style="width: 100%;padding: 10px 10px;  font-size: 14px;background: #fff !important ;border: 1px solid !important ;outline: 0 !important ;  ">Login</button>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/.wrapper-->


    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>