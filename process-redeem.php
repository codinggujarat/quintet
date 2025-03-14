<?php
session_start();
include 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $gift_code = $_POST['gift_code'];

    // Check if the gift card exists
    $query = "SELECT * FROM gift_orders WHERE gift_code='$gift_code' LIMIT 1";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        $gift = mysqli_fetch_assoc($result);
        $_SESSION['gift_balance'] = $gift['amount'];
        echo "✅ Gift Card Applied: $$gift[amount]";
    } else {
        echo "❌ Invalid Gift Code!";
    }
}