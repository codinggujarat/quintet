<?php
include('includes/config.php'); // Include database connection

if (isset($_GET['categoryid'])) {
    $categoryId = intval($_GET['categoryid']);
    $query = mysqli_query($con, "SELECT subcategory FROM subcategory WHERE categoryid='$categoryId'");

    while ($row = mysqli_fetch_array($query)) {
        echo "<div>" . htmlentities($row['subcategory']) . "</div>";
    }
}