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
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> CSS Vertical Tabs | CodingLab </title>
    <link rel="stylesheet" href="style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');




    .container {
        max-width: 350px;
        width: 100%;
        background: #fff;
        border: 1px solid black;
        position: fixed;
        left: 10%;
        top: 0;
    }


    .content {
        display: block;
    }

    .content .list {
        width: auto;
        position: relative;
        padding: 20px;
        border-bottom: 1px solid black;

    }

    .content .list label {
        height: 60px;
        font-size: 14px;
        font-weight: 400;
        margin-left: 20px;
        cursor: pointer;
        transition: all 0.5s ease;
        color: #333;
        font-family: 'Poppins', sans-serif;

        text-transform: uppercase;
        z-index: 12;
    }

    #home:checked~.list label.home,
    #blog:checked~.list label.blog,
    #help:checked~.list label.help,
    #code:checked~.list label.code,
    #about:checked~.list label.about {
        color: #000;
        font-weight: 600;
    }




    .content .text-content {
        width: 80%;
        height: 100%;
    }

    .content .text {
        display: none;
        height: 400px;
    }


    .content .text-content .home {
        display: block;
    }

    #home:checked~.text-content .home,
    #blog:checked~.text-content .blog,
    #help:checked~.text-content .help,
    #code:checked~.text-content .code,
    #about:checked~.text-content .about {
        display: block;
    }

    #blog:checked~.text-content .home,
    #help:checked~.text-content .home,
    #code:checked~.text-content .home,
    #about:checked~.text-content .home {
        display: none;
    }

    .content input {
        display: none;
    }

    .responsive_Nav_Link_desktop li {
        list-style-type: none;
    }

    .responsive_Nav_Link_desktop li a {
        font-size: 14px;
        text-transform: uppercase;
        color: #000;
        font-family: 'Poppins', sans-serif;
        text-decoration: none;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            <input type="radio" name="slider" checked id="home">
            <input type="radio" name="slider" id="blog">
            <input type="radio" name="slider" id="help">
            <div class="list">
                <label for="home" class="home">
                    WOMAN </label>
                <label for="blog" class="blog">
                    MAN </label>
                <label for="help" class="help">
                    KIDS </label>
            </div>
            <div class="text-content">
                <div class="home text">
                    <ul class="responsive_Nav_Link_desktop">
                        <?php $sql = mysqli_query($con, "select id,subcategory  from subcategory where categoryid=8");

                        while ($row = mysqli_fetch_array($sql)) {
                        ?>
                        <li style="margin-top: 15px;">
                            <a href="sub-category.php?scid=<?php echo $row['id']; ?>"
                                style="width: 100%; text-align: left !important; display: flex !important;align-items: start !important; justify-content: start !important;   ">
                                <?php echo $row['subcategory']; ?>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="blog text">
                    <ul class="responsive_Nav_Link_desktop">
                        <?php $sql = mysqli_query($con, "select id,subcategory  from subcategory where categoryid=10");

                        while ($row = mysqli_fetch_array($sql)) {
                        ?>
                        <li style="margin-top: 15px;">
                            <a href="sub-category.php?scid=<?php echo $row['id']; ?>"
                                style="width: 100%; text-align: left !important; display: flex !important;align-items: start !important; justify-content: start !important;   ">
                                <?php echo $row['subcategory']; ?>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="help text">
                    <ul class="responsive_Nav_Link_desktop">
                        <?php $sql = mysqli_query($con, "select id,subcategory  from subcategory where categoryid=29");

                        while ($row = mysqli_fetch_array($sql)) {
                        ?>
                        <li style="margin-top: 15px;">
                            <a href="sub-category.php?scid=<?php echo $row['id']; ?>"
                                style="width: 100%; text-align: left !important; display: flex !important;align-items: start !important; justify-content: start !important;   ">
                                <?php echo $row['subcategory']; ?>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script>
    function openmenuBar() {
        document.querySelector(".container").style.left = "0";

    }

    function closemenuBar() {
        document.querySelector(".container").style.left = "-100%";
    }
    </script>
</body>

</html>