<?php
session_start();
include('include/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM chatbot WHERE id=$id";

        if (mysqli_query($con, $sql)) {
            header("Location: chatbot.php");
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}