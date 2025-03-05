<?php
//session_start();

?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
@import url("https://api.fontshare.com/v2/css?f[]=panchang@300,500&f[]=cabinet-grotesk@300&display=swap");

.body-content {
    margin-top: 50px;
    padding-top: 120px;
}

.myaccount-box {
    background: transparent;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 999;
    padding: 10px 20px;
}




.myaccount-links {
    display: flex;
    align-items: center;
    justify-content: end;
    width: 100%;
}

.myaccount-links li {
    list-style-type: none !important;
    margin-left: 20px;
    margin-top: 10px;
}


.myaccount-links li a {
    display: flex;
    align-items: center;
    font-size: 12px !important;
    justify-content: center;
    font-weight: 400 !important;
    text-decoration: none;
    color: #000 !important;
    text-transform: uppercase !important;
}

.main-header:hover .myaccount-box {
    color: #000;
}

.myaccount-links li a i {
    margin-right: 6px;
}

.myaccount-links .close {
    display: none;
}

.responsive-nav {
    display: none;
}

.responsive_Nav_Link {
    display: none;
}

.fav-bag-side {
    display: none;
}

.moblieSearch {
    display: none;
}

.wrapper {
    display: none;
}

.wrapper header {
    font-size: 30px;
    font-weight: 400;
    padding-bottom: 20px;
    background: #000 !important;
}

.wrapper nav {
    position: relative;
    width: 100%;
    display: flex;
    background: #000 !important;
    align-items: center;
    border-bottom: 1px solid black;
}

.wrapper nav label {
    display: block;
    /* width: 100%; */
    height: 100%;
    cursor: pointer;
    position: relative;
    z-index: 1;
    margin-left: 20px;
    color: #fff !important;
    font-size: 16px;
    font-family: 'Poppins', sans-serif;
    transition: all 0.2s ease;
    font-weight: 300;
}


input[type="radio"] {
    display: none;
}

#home:checked~nav label.home,
#blog:checked~nav label.blog,
#code:checked~nav label.code,
#help:checked~nav label.help,
#about:checked~nav label.about {
    color: #000;
    font-weight: 600;
    font-family: 'Poppins', sans-serif;

}

nav label i {
    padding-right: 7px;
}




section .content {
    display: none;
    background: #000;
    height: 50vh;
    overflow-x: hidden;
    overflow-y: auto;
    border-bottom: 1px solid black;
}

section .content::-webkit-scrollbar {
    display: none;
}

#home:checked~section .content-1,
#blog:checked~section .content-2,
#code:checked~section .content-3 {

    display: block;
}

section .content .title {
    font-size: 21px;
    font-weight: 500;
    margin: 30px 0 10px 0;
}

section .content p {
    text-align: justify;
}

.searchBoxSideBar {
    border: 0;
    display: flex;
    align-items: center;
    justify-content: end;
    width: 20% !important;
    background: #fff;
}

.searchBoxSideBar a {
    border: 1px solid black !important;
    display: flex !important;
    align-items: center !important;
    justify-content: end !important;
    width: 100%;
    padding: 8px;
    color: #000;

}

.searchBoxSideBar a span {
    font-size: 10px !important;
}

.searchBoxSideBar i {
    display: none;
}

@media only screen and (max-width: 800px) {
    .myaccount-box {
        background: transparent !important;
    }

    .myaccount-links-box {
        background: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5));
        height: 100vh;
        z-index: 9999;
        width: 100%;
        top: 0;
        left: -100%;
        position: fixed;
        display: block;
        overflow: auto;
    }

    .myaccount-links {
        position: fixed;
        top: 0;
        left: -100%;
        /* left: 0; */
        height: 100vh;
        width: 100%;
        text-align: left;
        display: block;
        background-color: black;
        z-index: 9999;
        transition: 0.2s linear;
        overflow-y: auto;
        overflow-x: hidden;
    }



    .myaccount-links li {
        display: flex;
        align-items: center;
        justify-content: start;
        width: 100%;
        margin-top: 20px;
        font-family: 'Poppins', sans-serif;
        font-weight: 400;

    }

    .myaccount-links li a span,
    .myaccount-links li a i {
        font-size: 15px;
        color: #fff !important;

        text-transform: uppercase !important;
    }

    .myaccount-links li a i {
        margin-right: 20px;
    }

    .myaccount-links .close {
        display: block;
        position: absolute;
        left: 10px;
        top: 10px;
        color: #fff;
        z-index: 999;
    }

    .responsive-nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 10px;
        height: 100% !important;
    }

    .responsive-nav a img {
        width: 200px;
    }

    .responsive-nav button {
        border: 0;
        background: transparent;
        font-size: 20px;
        margin: 10px;

    }

    .logInOut a {
        position: absolute;
        right: 20px;
        top: 10px;
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
    }



    .logInOut a .bx,
    .logInOut a .linkLog {
        color: #000 !important;
        text-transform: uppercase;
        font-size: 15px;
    }

    .responsive_Nav_Link2 {
        margin-bottom: 40%;
    }

    .deskotp-link {
        display: none !important;
    }

    .moblieSearch {
        position: fixed !important;
        bottom: 2% !important;
        background: transparent;
        padding: 20px 0 !important;
        width: 100%;
        right: 0;
    }

    .moblieSearch a {
        border: 1px solid black !important;
        color: #000 !important;
        text-align: center !important;
        position: fixed !important;
        width: 100%;
        padding: 10px;
    }

    .side_navbar {
        display: flex !important;
        align-items: center !important;
        justify-content: start !important;
    }

    .bottom-sidebar {
        position: fixed;
        bottom: 20px;
        left: 0;
        border-top: 1px solid black;
        width: 100%;
    }

    .responsive_Nav_Link,
    .wrapper {
        display: block;
    }

    .searchBoxSideBar {
        position: absolute;
        bottom: 10px;
        left: 20px;
        display: flex;
        align-items: center;
        justify-content: end;
        width: 80% !important;
    }

    .searchBoxSideBar a {
        border: 1px solid black !important;
        display: flex !important;
        align-items: center !important;
        justify-content: end !important;
        width: 100%;
        padding: 5px;
    }

    .searchBoxSideBar a span {
        font-size: 10px !important;

    }

    .searchBoxSideBar i {
        display: none;
    }
}

@media only screen and (max-width: 500px) {
    .body-content {
        margin-top: 100px !important;
        padding-top: 0 !important;
    }


    .myaccount-links {
        width: 100%;
    }
}
</style>

<div class="overMyCart" onclick="closeMyCart()">

</div>


<div class="myaccount-box ">
    <div class="myaccount-links-box">
        <div class="myaccount-links">
            <svg width="50px" height="50px" class=" close " viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg" onclick="closeAccount()">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC"
                    stroke-width="0.096">
                    <path d="M19 5L5 19M5 5L9.5 9.5M12 12L19 19" stroke="#ffff" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M19 5L5 19M5 5L9.5 9.5M12 12L19 19" stroke="#ffff" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </g>
            </svg>
            <li class=" fav-bag-side" style="margin-top: 40px;"></li>
            <?php if (strlen($_SESSION['login'])) { ?>
            <li class="fav-bag-side logInOut"
                style="font-family: 'Raleway',sans-serif; color: #000;text-transform: uppercase      !important  ;">
                <a href="my-account.php">
                    <span style="font-size: 13px !important;">Hi, </span>
                    <span
                        style="font-size: 13px !important;">&nbsp;<?php echo htmlentities($_SESSION['username']); ?></span>
                    <i class='bx bx-user' style="font-size: 13px;margin-left:10px;"></i>
                </a>
            </li>
            <?php } else { ?>
            <li class="fav-bag-side logInOut"
                style="font-family: 'Raleway',sans-serif; color: #000;text-transform: uppercase      !important  ;">
                <a href="my-account.php">
                    <span style="font-size: 13px !important;">my account</span>
                    <i class='bx bx-user' style="font-size: 13px;margin-left:10px;"></i>
                </a>
            </li>
            <?php } ?>
            <div class="wrapper">
                <input type="radio" name="slider" checked id="home">
                <input type="radio" name="slider" id="blog">
                <input type="radio" name="slider" id="code">
                <nav style="padding: 20px;">
                    <label for="home" class="home">WOMAN</label>
                    <label for="blog" class="blog">MAN</label>
                    <label for="code" class="code">KIDS</label>
                </nav>
                <section style="padding: 20px;margin-top:-40px !important;">
                    <div class="content content-1">
                        <ul class="responsive_Nav_Link">
                            <li style="margin-top: 15px;margin-bottom: 45px;">
                                <a href="category.php?cid=8">///new</a>
                            </li>
                            <?php $sql = mysqli_query($con, "select id,subcategory  from subcategory where categoryid=8");

                            while ($row = mysqli_fetch_array($sql)) {
                            ?>
                            <li style="margin-top: 15px;">
                                <a href="sub-category.php?scid=<?php echo $row['id']; ?>"
                                    style="color:white !important; font-size: 16px !important; width: 100%; text-align: left !important; display: flex !important;align-items: start !important; justify-content: start !important;   ">
                                    <?php echo $row['subcategory']; ?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class=" content content-2">
                        <ul class="responsive_Nav_Link">
                            <li style="margin-top: 15px;margin-bottom: 45px;">
                                <a href="category.php?cid=10">///new</a>
                            </li>
                            <?php $sql = mysqli_query($con, "select id,subcategory  from subcategory where categoryid=10");

                            while ($row = mysqli_fetch_array($sql)) {
                            ?>
                            <li style="margin-top: 15px;">
                                <a href="sub-category.php?scid=<?php echo $row['id']; ?>"
                                    style="color:white !important; font-size: 16px !important;width: 100%; text-align: left !important; display: flex !important;align-items: start !important; justify-content: start !important;   ">
                                    <?php echo $row['subcategory']; ?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="content content-3">
                        <ul class="responsive_Nav_Link">
                            <li style="margin-top: 15px;margin-bottom: 45px;">
                                <a href="category.php?cid=29">///new</a>
                            </li>
                            <?php $sql = mysqli_query($con, "select id,subcategory  from subcategory where categoryid=29");

                            while ($row = mysqli_fetch_array($sql)) {
                            ?>
                            <li style="margin-top: 15px;">
                                <a href="sub-category.php?scid=<?php echo $row['id']; ?>"
                                    style="color:white !important; font-size: 16px !important;width: 100%; text-align: left !important; display: flex !important;align-items: start !important; justify-content: start !important;   ">
                                    <?php echo $row['subcategory']; ?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </section>
            </div>



            <li class="searchBoxSideBar" style="font-size: 15px !important;font-family: 'Raleway',sans-serif; color: #000;text-transform:
                uppercase !important ;">
                <a href="searchBar.php" style="border:0;background:transparent;">
                    <i class='bx bx-search' style="font-size: 14px;"></i>
                    <span class="key text-black" style="color: #000 !important;">
                        search
                    </span>
                </a>
            </li>

            <li class="">
                <a href="my-wishlist.php">
                    <i class='bx bx-bookmark'></i>
                    <span class="key">
                        favorites
                    </span>
                </a>
            </li>
            <li class="deskotp-link">
                <?php
                if (!empty($_SESSION['cart'])) {
                ?>
                <a href="#ShoppingBag" onclick="openMyCart()">
                    <i class='bx bx-shopping-bag'></i> <span class="key">
                        Shopping bag (<?php echo $_SESSION['qnty']; ?>)
                    </span>
                </a>
                <?php } else { ?>
                <a href="#ShoppingBag" onclick="openMyCart()">
                    <i class='bx bx-shopping-bag'></i> <span class="key">
                        Shopping bag (0)
                    </span>
                </a>
                <?php } ?>
            </li>

            <?php if (strlen($_SESSION['login'])) { ?>
            <li class="deskotp-link"
                style="font-size: 16px !important;font-family: 'Raleway',sans-serif; color: #000;text-transform: uppercase      !important  ;">
                <a href="my-account.php">
                    <span>Hi, </span>
                    <span>&nbsp;<?php echo htmlentities($_SESSION['username']); ?></span>
                    <i class='bx bx-user' style="font-size: 15px;margin-left:10px;"></i>
                </a>
            </li>

            <?php } ?>

            <?php if (strlen($_SESSION['login']) == 0) { ?>
            <li class=""><a href="login.php">
                    <i class='bx bx-arrow-from-right '></i>
                    <span class="linkLog backtext" id="backtext">LOG IN</span>
                </a>
            </li>
            <?php } else { ?>
            <li class="fav-bag-side">
                <?php if (strlen($_SESSION['login'])) { ?>
                <a href="track-orders.php">
                    <i class='bx bx-right-top-arrow-circle'></i>
                    <span class="key">
                        Track
                        Order</span>
                </a>
                <?php } ?>
            </li>
            <li class="">
                <?php if (strlen($_SESSION['login'])) { ?>
                <a href="allhelpcategory.php">
                    <span class="key">
                        Help
                    </span>
                </a>
                <?php } ?>
            </li>

            <li class=" fav-bag-side"><a href="logout.php">
                    <i class='bx bx-arrow-to-right'></i>
                    <span class="linkLog">Logout</span>
                </a>
            </li>

            <?php } ?>

            <!-- --------------------------------- -->
            <div class="sidebar-navitem">

                <!-- /.top-search-holder -->
                <div class="top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                    <?php
                    if (!empty($_SESSION['cart'])) {
                    ?>
                    <div class="dropdown dropdown-cart cartBtn">
                        <ul class="side-menu">
                            <svg width="50px" height="50px" class="bx-x" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" onclick="closeMyCart()">
                                <rect width="24" height="24" fill="white" />
                                <path d="M7 17L16.8995 7.10051" stroke="#000000" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M7 7.00001L16.8995 16.8995" stroke="#000000" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <!-- <i class="bx bx-x" ></i> -->
                            <?php
                                $sql = "SELECT * FROM products WHERE id IN(";
                                foreach ($_SESSION['cart'] as $id => $value) {
                                    $sql .= $id . ",";
                                }
                                $sql = substr($sql, 0, -1) . ") ORDER BY id ASC";
                                $query = mysqli_query($con, $sql);
                                $totalprice = 0;
                                $totalqunty = 0;
                                if (!empty($query)) {
                                    while ($row = mysqli_fetch_array($query)) {
                                        $quantity = $_SESSION['cart'][$row['id']]['quantity'];
                                        $subtotal = $_SESSION['cart'][$row['id']]['quantity'] * $row['productPrice'] + $row['shippingCharge'];
                                        $totalprice += $subtotal;
                                        $_SESSION['qnty'] = $totalqunty += $quantity;
                                ?>
                            <li style="margin: 0;padding:0;">
                                <div class="bag">
                                    <div
                                        style="color: #000; text-transform: uppercase; background-color: #fff;font-size:15px;">
                                        shopping bag (<?php echo $_SESSION['qnty']; ?>)
                                    </div>
                                </div>

                                <div class=" cart-item  wow fadeUpBig" style="margin: 0;padding:0;">
                                    <div class="image">
                                        <a href=" product-details?pid=<?php echo $row['id']; ?>"><img
                                                src="admin/productimages/<?php echo $row['id']; ?>/<?php echo $row['productImageSix']; ?>"
                                                width="100%" height="100%" alt=""></a>
                                    </div>

                                    <div class="cart-pra">
                                        <h6 class="cartText">
                                            <a href=" product-details?pid=<?php echo $row['id']; ?>">
                                                <?php echo $row['productName']; ?></a>
                                        </h6>
                                        <h6>
                                            <span>
                                                ₹
                                            </span>
                                            <span>
                                                <?php echo ($row['productPrice'] + $row['shippingCharge']); ?>
                                            </span>
                                        </h6>
                                        <h6>
                                            <span>
                                                Qty.
                                            </span>
                                            <span>
                                                <?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>
                                            </span>
                                        </h6>
                                    </div>
                                </div>
                                <?php }
                                } ?>
                            </li>
                            <div class=" cart-total ">
                                <div class="total">
                                    <h5>
                                        Total :
                                    </h5>
                                    <span
                                        style="font-family: sans-serif, 'Poppins' !important; font-size: 15px;font-weight: 400;color: #000;"
                                        class='price'>
                                        ₹
                                        <?php echo $_SESSION['tp'] = "$totalprice" . ".00"; ?></span>
                                </div>
                                <div class="total_btn">
                                    <a href="my-cart.php" class="a" style="
                                    position: absolute !important;
    bottom: 0 !important;
    right: 0 !important;
    background-color: #000 !important;
    width: 100% !important;
    text-align: center !important;
    font-size: 15px !important;
    font-weight: 350 !important;
    color: #fff !important;
    padding: 20px !important;">
                                        MY BAG </a>
                                </div>
                            </div><!-- /.cart-total-->
                        </ul><!-- /.dropdown-menu-->
                    </div><!-- /.dropdown-cart -->
                    <?php } else { ?>
                    <div class="dropdown dropdown-cart cartBtn">
                        <ul class="side-menu"
                            style=" display: flex !important;align-items: center !important;justify-content: center !important;">
                            <svg width="50px" height="50px" class="bx-x" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" onclick="closeMyCart()">
                                <rect width="24" height="24" fill="white" />
                                <path d="M7 17L16.8995 7.10051" stroke="#000000" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M7 7.00001L16.8995 16.8995" stroke="#000000" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <li style="margin-top: 100px !important;">
                                <div class="bag">
                                    <div style="text-transform:uppercase;font-size: 15px;">
                                        shopping bag (0)
                                    </div>
                                </div>
                                <div class=" cart-item" style="width: 100%;">
                                    <h4
                                        style=" font-size: 15px; font-family: 'Poppins' ,sans-serif !important ; font-weight: 400 !important ;text-align: center; color: #000;text-transform: uppercase ; ">
                                        Your shopping basket is empty.</h4>
                                </div>
                            </li>
                            <style>

                            </style>
                            <!-- /.cart-item -->
                            <div class="total_btn">
                                <a href="index.php" class="a">CONTINUE SHOOPING</a>
                            </div>
                        </ul><!-- /.dropdown-menu-->
                    </div>
                    <?php } ?>
                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div><!-- /.top-cart-row -->
            </div>

        </div>

    </div>
</div>
<script>
let jsArrow = document.querySelector(".js-arrow");
jsArrow.onclick = function() {
    navLinks.classList.toggle("show3");
}

function openAccount() {
    document.querySelector(".myaccount-links").style.left = "0";
    document.querySelector(".myaccount-links-box").style.left = "0";

}

function closeAccount() {
    document.querySelector(".myaccount-links").style.left = "-100%";
    document.querySelector(".myaccount-links-box").style.left = "-100%";
}
</script>


<script>
function openMyCart() {
    document.querySelector(".side-menu").style.right = "0";
    document.querySelector(".overMyCart").style.right = "0";

}

function closeMyCart() {
    document.querySelector(".side-menu").style.right = "-200%";
    document.querySelector(".overMyCart").style.right = "-200%";
}
</script>