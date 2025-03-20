<?php
session_start();
error_reporting(0);
include('includes/config.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $contactNumber = mysqli_real_escape_string($con, $_POST['contactNumber']);
    $amount = mysqli_real_escape_string($con, $_POST['amount']);
    $utr_number = mysqli_real_escape_string($con, $_POST['utr_number']);

    // Handle file upload
    $targetDir = "admin/QRCODEuploads/";
    $qr_code_img = $targetDir . basename($_FILES["qr_code_img"]["name"]);
    move_uploaded_file($_FILES["qr_code_img"]["tmp_name"], $qr_code_img);

    // Insert into database
    $sql = "INSERT INTO paymentInformation (email, name, contactNumber, amount, utr_number, qr_code_img)
VALUES ('$email', '$name', '$contactNumber', '$amount', '$utr_number', '$qr_code_img')";

    if (mysqli_query($con, $sql)) {
        header("Location: payment-method.php");
        exit(); // Ensure no further execution

    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_close($con);
}