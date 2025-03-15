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
// Initialize variables
$userEmail = "";
$message = "";

// Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userEmail = trim($_POST["email"]);

    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format.";
    } else {
        // Check if email already exists
        $stmt = $con->prepare("SELECT * FROM newsletter_subscribers WHERE email = ?");
        $stmt->bind_param("s", $userEmail);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $message = "You are already subscribed!";
        } else {
            // Insert into database
            $stmt = $con->prepare("INSERT INTO newsletter_subscribers (email) VALUES (?)");
            $stmt->bind_param("s", $userEmail);

            if ($stmt->execute()) {
                $message = "Subscription successful!";

                // Send confirmation email
                $to = $userEmail;
                $subject = "Newsletter Subscription";
                $emailMessage = "
                Hello,

We hope you're having a fantastic day! At QUINTET,
we're always bringing you the best products at unbeatable prices.
This month, we have some exciting new arrivals
and exclusive discounts that you don’t want to miss!

✨ What's New?

Fresh styles and trendy products just added!
Limited-time discounts on top categories.
Special offers for our loyal customers!

🎁 Special Offer:
Get an extra 10% OFF on your first order this month! Use code QUINTET10 at checkout.

🛍️ Shop Now & Save Big!
Visit our website and grab your favorites before they’re gone!
Shop Now

Stay connected with us for more updates, flash sales, and exclusive perks. Follow
us on social media and subscribe for more exciting deals!

Happy Shopping!
The QUINTET Team";
                $headers = "From: no-reply@yourwebsite.com";

                mail($to, $subject, $emailMessage, $headers);
            } else {
                $message = "Subscription failed. Try again.";
            }
        }
    }
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

    <title>join our newsletter | New Collection Online</title>

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
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- animated  -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <!--Model Viewer  -->
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

</head>

<body class="cnt-home">

    <header class="header-style-1">
        <?php include('includes/top-header.php'); ?>
        <?php include('includes/main-header.php'); ?>
        <?php include('includes/menu-bar.php'); ?>

        <?php include('includes/search.php'); ?>
    </header>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    @media only screen and (max-width: 800px) {
        .logo a svg {

            width: 300px;
        }
    }

    @media only screen and (max-width: 500px) {
        .container {
            width: 90%;
        }

        .logo a svg {

            width: 200px;
        }
    }

    .wrapperForm {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        background-color: #f1f3f8;
    }

    .wrapperForm form {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        width: 500px;
        border: 1px solid white;
        height: 300px;
        background-color: #000;
        margin: 0;
        padding: 20px;
    }

    .wrapperForm form .alert {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Poppins', sans-serif;
        text-transform: uppercase;
        font-weight: 100;
        color: #fff;
        border: 1px solid white;

    }

    .wrapperForm form .alert.success-alert {
        background: transparent;


    }

    .wrapperForm form .alert.error-alert {
        background: transparent;

    }


    .wrapperForm form .inputbox,
    .btn {
        width: 100%;
        margin: 0;
        padding: 0;
    }


    .wrapperForm form .btn button {
        width: 100%;
        border: 1px solid white;
        height: 50px;
        color: white;
        background: transparent;
        font-family: 'Poppins', sans-serif;
        text-transform: uppercase;
        font-weight: 100;
    }


    .wrapperForm form input {
        width: 100%;
        height: 50px;
        padding: 20px;
        color: white;
        border: 1px solid white;
        background: transparent !important;
    }

    .wrapperForm form input::placeholder {
        color: #fff;
        font-weight: 100 !important;
    }

    .wrapperForm form h1 {
        text-transform: uppercase;
        font-family: 'Poppins', sans-serif;
        font-weight: 100;
        color: #fff;
    }

    .input-field-login {
        position: relative;
    }



    .input-field-login label {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: #fff;
        font-size: 12px;
        pointer-events: none;
        transition: 0.3s;
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
    }

    input:focus,
    textarea:focus {
        border: 2px solid #000;
    }

    input:focus~label,
    textarea:focus~label,
    input:valid~label,
    textarea:valid~label {
        top: 0;
        left: 15px;
        font-size: 12px;
        padding: 0 2px;
        background: #000;
        color: #fff;
    }

    .message {
        text-transform: uppercase;
        font-size: 12px;
        color: #fff;
        text-align: center;
        border: 1px solid #fff;
        padding: 10px;
        width: 100%;
    }
    </style>
    <div class="wrapperForm">
        <form method="POST" autocomplete="off">
            <h1>join our newsletter</h1>
            <?php if (!empty($message)): ?>
            <p class="message"><?php echo $message; ?></p>
            <?php endif; ?>
            <div class=" inputbox input-field-login">
                <input type="email" class="email" name="email" required value="<?php echo $userEmail ?>">
                <label>E-mail</label>
            </div>
            <div class=" btn">
                <button type="submit">Subscribe</button>
            </div>
        </form>
    </div>
</body>

</html>