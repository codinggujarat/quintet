<?php
session_start();
include('include/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
        $id = mysqli_real_escape_string($con, $_POST['id']);

        $query = "DELETE FROM contact_us WHERE id = '$id'";

        if (mysqli_query($con, $query)) {
            echo "<script>
alert('Message deleted successfully!');
window.location.href = 'contactUs.php';
</script>";
        } else {
            echo "<script>
alert('Error deleting message.');
window.location.href = 'contactUs.php';
</script>";
        }
    }
}