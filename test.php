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


?>
<style>
* {
    margin: 0;
    padding: 0;
}

.heroImg {
    display: flex;
    align-items: center;
    justify-content: start;
    margin: 0;
    padding: 0;
}

.imgBox {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
}

.imgBox img {
    object-fit: cover;
}

@media only screen and (max-width:800px) {
    .heroImg {
        display: block;
    }

    .imgBox {
        width: 100%;
    }
}
</style>
<div class="heroImg section">
    <div class="imgBox section">
        <?php
        $ret = mysqli_query($con, "select * from products where category=8 AND id=89  LIMIT 1   ");
        while ($row = mysqli_fetch_array($ret)) {
            # code...
        ?>
        <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
            <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                width=" 100%" height="100%" alt="">
        </a>
        <?php } ?>
    </div>
    <div class="imgBox section">
        <?php
        $ret = mysqli_query($con, "select * from products where category=8 AND id=90  LIMIT 1 ");
        while ($row = mysqli_fetch_array($ret)) {
            # code...
        ?>
        <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
            <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                width="100%" height="100%" alt="">
        </a>
        <?php } ?>
    </div>
</div>
<div class="heroImg section">

    <div class="imgBox section">
        <?php
        $ret = mysqli_query($con, "select * from products where category=8 AND id=91  LIMIT 1   ");
        while ($row = mysqli_fetch_array($ret)) {
            # code...
        ?>
        <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
            <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                width=" 100%" height="100%" alt="">
        </a>
        <?php } ?>

    </div>
    <div class="imgBox section">
        <?php
        $ret = mysqli_query($con, "select * from products where category=8 AND id=93  LIMIT 1 ");
        while ($row = mysqli_fetch_array($ret)) {
            # code...
        ?>
        <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
            <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                width=" 100%" height="100%" alt="">
        </a>
        <?php } ?>
    </div>
</div>
<div class="heroImg section">

    <div class="imgBox section">
        <?php
        $ret = mysqli_query($con, "select * from products where category=8 AND id=94  LIMIT 1   ");
        while ($row = mysqli_fetch_array($ret)) {
            # code...
        ?>
        <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
            <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                width=" 100%" height="100%" alt="">
        </a>
        <?php } ?>

    </div>
    <div class="imgBox section">
        <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
            <?php
            $ret = mysqli_query($con, "select * from products where category=8 AND id=94  LIMIT 1 ");
            while ($row = mysqli_fetch_array($ret)) {
                # code...
            ?>
            <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                width=" 100%" height="100%" alt="">
            <?php } ?>
        </a>
    </div>
</div>
<script>
let currentSection = 0; // Track the current section
let scrollInterval; // Store the interval reference

// Function to auto-scroll by 100vh steps
function autoScrollStep() {
    const sections = document.querySelectorAll('.section');
    const totalSections = sections.length;
    currentSection = (currentSection + 1) % totalSections; // Cycle through sections

    window.scrollTo({
        top: sections[currentSection].offsetTop,
        behavior: 'smooth'
    });
}

// Start auto-scrolling every 3 seconds
function startAutoScroll() {
    scrollInterval = setInterval(autoScrollStep, 1000);
}

// Stop auto-scrolling when user scrolls manually
function stopAutoScroll() {
    clearInterval(scrollInterval); // Stop the interval
    window.removeEventListener('scroll', stopAutoScroll); // Remove the scroll listener after stopping
}

// Start auto-scrolling when the page loads
window.onload = function() {
    startAutoScroll();
    window.addEventListener('scroll', stopAutoScroll); // Listen for user scroll
};
</script>