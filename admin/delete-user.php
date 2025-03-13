<?php
session_start();
include('include/config.php');
if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']);

    // Delete user orders (optional)
    $delete_orders = mysqli_query($con, "DELETE FROM orders WHERE userId='$user_id'");

    // Delete user wishlist (optional)
    $delete_wishlist = mysqli_query($con, "DELETE FROM wishlist WHERE userId='$user_id'");

    // Delete user from users table
    $delete_user = mysqli_query($con, "DELETE FROM users WHERE id='$user_id'");

    if ($delete_user) {
        echo "<script>alert('User deleted successfully!'); window.location.href='manage-users.php';</script>";
    } else {
        echo "<script>alert('Error deleting user.'); window.location.href='manage-users.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='manage-users.php';</script>";
}

mysqli_close($con);