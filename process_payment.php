<?php
session_start();
error_reporting(E_ALL); // Show all errors for debugging
include('includes/config.php');

$utr_error = ""; // Variable to store UTR error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $contactNumber = mysqli_real_escape_string($con, $_POST['contactNumber']);
    $amount = mysqli_real_escape_string($con, $_POST['amount']);
    $utr_number = mysqli_real_escape_string($con, $_POST['utr_number']);

    // Check if UTR number already exists
    $utr_check = mysqli_query($con, "SELECT * FROM paymentInformation WHERE utr_number='$utr_number'");
    if (mysqli_num_rows($utr_check) > 0) {
        $utr_error = "❌ Error: This UTR number has already been used. Please enter a different one.";
    } else {
        // Handle file upload
        $targetDir = "admin/QRCODEuploads/";
        if (!is_dir($targetDir)) {
            die("Upload directory does not exist.");
        }

        $qr_code_img = $targetDir . basename($_FILES["qr_code_img"]["name"]);
        if ($_FILES["qr_code_img"]["error"] != UPLOAD_ERR_OK) {
            die("File upload error: " . $_FILES["qr_code_img"]["error"]);
        }

        if (!move_uploaded_file($_FILES["qr_code_img"]["tmp_name"], $qr_code_img)) {
            die("Failed to upload image.");
        }

        // Insert into database
        $sql = "INSERT INTO paymentInformation (email, name, contactNumber, amount, utr_number, qr_code_img) 
                VALUES ('$email', '$name', '$contactNumber', '$amount', '$utr_number', '$qr_code_img')";

        if (mysqli_query($con, $sql)) {
            header("Location: payment-method.php");
            exit(); // Ensure no further execution
        } else {
            // Check if the error is due to a duplicate UTR number
            if (mysqli_errno($con) == 1062) {
                $utr_error = "❌ Error: This UTR number is already used. Please try a different one.";
            } else {
                $utr_error = "SQL Error: " . mysqli_error($con);
            }
        }
    }

    mysqli_close($con);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Payment</title>
</head>

<body>
    <style>
    .center {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        width: 100%;
    }

    .center .card {

        text-align: center;
        padding: 20px;
        font-weight: 400;
        color: #fff;
        font-size: 12px;
        text-transform: uppercase;
        background: #000;
        font-family: 'Poppins', sans-serif;
    }

    .btn {
        font-size: 12px;
        background: #fff;
        color: #fff;
        padding: 10px 10px;
        font-weight: bold;
        color: #000;
        text-transform: uppercase;
        font-family: 'Poppins', sans-serif;
        outline: none;
        cursor: pointer;
        border: 1px solid white;
    }
    </style>
    <div class="center">

        <div class="card">
            <?php if (!empty($utr_error)): ?>
            <p><?php echo $utr_error; ?></p>
            <button class="btn" onclick="history.back()"> Go Back</button>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>