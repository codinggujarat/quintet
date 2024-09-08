<style>
.navbar_Nav {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    flex-wrap: wrap !important;
}
</style>
<?php

if (isset($_Get['action'])) {
    if (!empty($_SESSION['cart'])) {
        foreach ($_POST['quantity'] as $key => $val) {
            if ($val == 0) {
                unset($_SESSION['cart'][$key]);
            } else {
                $_SESSION['cart'][$key]['quantity'] = $val;
            }
        }
    }
}
?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');



.control-group {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: baseline;
}





.control-group .search-field {
    border-right: 0 !important;
    border-radius: 50px !important;
    height: 40px;
    background-color: #f2f3f8 !important;
    font-family: 'Raleway', sans-serif !important;
    font-size: 15px !important;
    width: 200px !important;
    padding: 0 40px !important;
    font-weight: 500;
    color: #000 !important;

}

.control-group .search-field:focus,
.control-group .search-field:hover,
.basket i:hover {
    box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
    border: 1px solid #f2f3f8 !important;
}

.control-group .search-field::placeholder {
    font-size: 15px !important;
    color: #000 !important;
    text-transform: capitalize;
    font-weight: 500;
}



.control-group .search-buttons {
    outline: 0 !important;
    border: 0 !important;
    background: transparent !important;
    position: relative !important;
    height: 60px;

}

.control-group .search-buttons .bx-search-alt {
    font-size: 26px;
    top: 10px !important;
    left: 11px;
    position: absolute;
    background: #f2f3f8;
    color: #000;
    padding: 7px;
    border-radius: 50px;
}


.search-area {
    border: 0 !important;
}







.items-cart-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    border: 0;
    margin: -17px !important;
    padding: 0 !important;
}

.total-price-basket {
    border-right: 0 !important;
}


.total-price-basket .lbl {
    font-family: sans-serif, 'Poppins' !important;
    font-weight: bold;
    font-size: 15px;
    color: black;
}

.total-price-basket .total-price {
    font-family: sans-serif, 'Poppins' !important;
    font-weight: bold;
    font-size: 15px;
    color: black;
}

.basket {
    background: transparent !important;
    border-left: 0 !important;
}

.responsive-search i,
.basket i {
    font-size: 20px !important;
    color: #000 !important;
    cursor: pointer;
    border-radius: 50px;
    background: #f2f3f8;
    padding: 10px;
    margin: 0 !important;
}



.basket i:hover {
    background: #f2f3f8;
}

.basket-item-count {
    background: black !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    height: 20px !important;
    width: 20px !important;
    right: 8px !important;
    top: 15px !important;
    border: 2px solid black !important;
}

.basket-item-count span {
    font-size: 12px !important;
}

.logo-holder {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 50px;
}

.side-menu {
    overflow-y: scroll !important;
    font-family: sans-serif, 'Poppins' !important;
    background: white !important;
    width: 400px !important;
    display: flex;
    align-items: start;
    justify-content: start;
    flex-wrap: wrap;
    padding-top: 50px;
    padding-bottom: 300px;
    right: -100%;
    transition: 0.5s linear;
    position: fixed;
    top: 0;
    right: 0;
    height: 100%;
    width: 100%;
    z-index: 999999;
    border: 0;
    outline: 0;
    box-shadow: 0;
    overflow-y: scroll;

}

.side-menu::-webkit-scrollbar {
    display: none;
}

.logo-holder .logo img {
    width: 300px;
}


.responsive-search {
    display: none;
}

.control-group .bx-x {
    display: none;
}

@media only screen and (max-width: 1000px) {
    .main-header {
        position: relative;
    }


}

@media only screen and (max-width: 800px) {
    .responsive-search {
        display: block;
    }

    .control-group {
        position: fixed;
        left: 0;
        top: 0;
        width: 400px;
        background: white;
        height: 100%;
        display: flex;
        align-items: baseline;
        padding: 20px;
        justify-content: start;
        z-index: 99999;
        display: block;
        left: -100%;
        transition: 0.2s linear;

    }

    .control-group .bx-x {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 30px;
        color: #000;
    }

    .total-price-basket {
        display: none !important;
    }

    .items-cart-inner {
        border: 0 !important;
    }


    .control-group .search-field {
        height: 50px !important;
    }

    .control-group .search-buttons .bx-search-alt {
        font-size: 25px;
        top: 63px !important;
        left: 0px;
        position: absolute;
        background: #f2f3f8;
        color: #000;
        padding: 13px;
        border-radius: 50px;
    }

    .control-group .bx-x {
        display: block;
    }

    .control-group .search-field {
        border-right: 0 !important;
        border-radius: 50px !important;
        height: 50px;
        border: 1px solid black !important;
        background-color: transparent !important;
        font-family: 'Raleway', sans-serif !important;
        font-size: 15px !important;
        /* box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset; */
        width: 100% !important;
        padding: 0 50px !important;
        font-weight: 500;
        color: #000 !important;

    }

    .logo-holder .logo img {
        width: 140px;
    }

    .navbar_Nav {
        align-items: start !important;
        justify-content: space-between !important;
    }

    .overMySearch {
        position: fixed;
        background: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5));
        z-index: 99999;
        left: -100%;
        top: 0;
        width: 100%;
        height: 100%;
    }

}

.overMyCart {
    position: fixed;
    background: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5));
    z-index: 99999;
    right: -100%;
    top: 0;
    width: 100%;
    height: 100%;
}
</style>
<style>
.lnk-cart {
    margin: 0 !important;
    padding: 0 !important;
    border: 0 !important;
}


.cartBtn button {
    background: transparent;
    border: 0;
    margin: 0;
    padding: 0;
}

.side-menu .bx-x {
    position: absolute !important;
    top: 10px !important;
    left: 10px !important;
    font-size: 30px !important;
    color: #000 !important;
}

.side-menu {
    overflow-y: scroll !important;
    font-family: sans-serif, 'Poppins' !important;
    background: white !important;
    width: 400px !important;
    display: flex;
    align-items: start;
    justify-content: start;
    flex-wrap: wrap;
    padding-top: 50px;
    padding-bottom: 300px;
    right: -100%;
    transition: 0.5s linear;

}

.side-menu .cart-item .image img {
    width: 190px;
}

.side-menu .cart-pra h3 {
    margin: 0;
    overflow: hidden;
    padding: 0;
    overflow: hidden !important;
    text-overflow: ellipsis !important;
    white-space: nowrap !important;
    width: 190px;
}

.side-menu .cart-pra h3 a {
    margin: 0;
    padding: 0;
    font-size: 12px !important;
    font-family: 'Poppins', sans-serif !important;
    font-weight: 500 !important;
}

.side-menu .cart-pra h6 {
    font-weight: normal;
    font-size: 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.side-menu .cart-pra {
    /* margin: 0 10px; */
    padding: 0;
}

.cart-total {
    background: #fff;
    width: 100%;
    position: fixed;
    bottom: 2%;
}

.total {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 400px;
}

.total h5 {
    font-size: 15px;
    text-transform: uppercase;
    font-weight: 600;
    color: #000;
}

.total_btn a {
    display: flex;
    align-items: center;
    justify-content: center;
    background: #000 !important;
    width: 400px !important;
    color: #fff !important;
    height: 50px !important;
    font-size: 16px !important;
    border-radius: 0 !important;
    font-family: 'Raleway', sans-serif !important;
    font-weight: 300 !important;
    margin-top: 20px !important;
}
</style>
<div class="overMyCart" onclick="closeMyCart()">

</div>
<div class="overMySearch" onclick="closeSearch()">

</div>
<div class="main-header">
    <div class="" style="  padding: 0;margin:0 30px;  ">
        <div class="navbar_Nav">

            <div class=" logo-holder">
                <!-- ============================================================= LOGO ============================================================= -->
                <div class="logo">
                    <a href="index.php">
                        <img src="img/Quintet10.png" alt="">
                    </a>
                </div>
            </div>


            <style>
            .myWishlist i {
                font-size: 30px;
                color: #000;
            }

            .sidebar-navitem {
                display: flex;
                align-items: center;
                justify-content: end;
            }

            .dropdown-cart {
                margin: 0 !important;
                padding: 0 !important;
            }
            </style>
            <style>
            .bag {
                display: flex;
                align-items: center;
                justify-content: center;
                position: absolute;
                left: 45%;
                top: 5%;
            }

            .bag i {
                font-size: 40px;
                color: #000;
            }

            .bag span {
                position: absolute;
                left: 40%;
                top: 40%;
                font-weight: bolder;
            }
            </style>
            <div class="sidebar-navitem">
                <div class="top-search-holder">
                    <div class="search-area ">
                        <form name="search" method="post" action="search-result.php" autocomplete="off">

                            <div class="control-group ">
                                <i class="bx bx-x" onclick="closeSearch() "></i>
                                <button class="search-buttons" type="submit" name="search"><i
                                        class='bx bx-search-alt'></i></button>
                                <input class="search-field" placeholder="Search here..." name="product"
                                    required="required" />
                            </div>
                        </form>
                    </div>
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div><!-- /.top-search-holder -->
                <div class="  top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                    <?php
                    if (!empty($_SESSION['cart'])) {
                    ?>
                    <div class="dropdown dropdown-cart cartBtn   ">

                        <button class=" lnk-cart" onclick="openSearch() ">
                            <div class="basket responsive-search">
                                <i class="bx bx-search-alt"></i>
                            </div>
                        </button>
                        <a href="my-wishlist.php" class=" lnk-cart">
                            <div class="basket">
                                <i class='bx bx-bookmark'></i>
                            </div>
                        </a>
                        <button class=" lnk-cart" onclick="openMyCart()">
                            <div class="items-cart-inner  ">
                                <div class="basket ">
                                    <i class='bx bx-shopping-bag'></i>
                                </div>
                                <div class="basket-item-count">

                                    <span class="count"><?php echo $_SESSION['qnty']; ?></span>
                                </div>
                            </div>
                        </button>
                        <button class=" lnk-cart" onclick="openAccount()">
                            <div class="basket responsive-search">
                                <i class="bx bx-menu"></i>
                            </div>
                        </button>

                        <ul class="side-menu">
                            <i class="bx bx-x" onclick="closeMyCart()"></i>
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
                            <div class="bag">
                                <div>
                                    <i class='bx bx-shopping-bag'></i>
                                </div>
                                <span>
                                    <?php echo $_SESSION['qnty']; ?>
                                </span>

                            </div>
                            <li style="margin-top: 50px;">

                                <div class=" cart-item  ">
                                    <div class="image">
                                        <a href=" product-details.php?pid=<?php echo $row['id']; ?>"><img
                                                src="admin/productimages/<?php echo $row['id']; ?>/<?php echo $row['productImage1']; ?>"
                                                width="100%" height="100%" alt="" style="border: 1px solid black;"></a>
                                    </div>

                                    <div class="cart-pra">
                                        <h3>
                                            <a href=" product-details.php?pid=<?php echo $row['id']; ?>">
                                                <?php echo $row['productName']; ?></a>
                                        </h3>
                                        <h6>
                                            <span>
                                                Rs.
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
                                        style="font-family: sans-serif, 'Poppins' !important; font-size: 15px;font-weight: 600;color: #000;"
                                        class='price'>Rs.<?php echo $_SESSION['tp'] = "$totalprice" . ".00"; ?></span>
                                </div>
                                <div class="total_btn">
                                    <a href="my-cart.php" class="btn checkout-page-button">
                                        My Bag </a>
                                </div>
                            </div><!-- /.cart-total-->
                        </ul><!-- /.dropdown-menu-->
                    </div><!-- /.dropdown-cart -->
                    <?php } else { ?>
                    <div class="dropdown dropdown-cart cartBtn">
                        <button class=" lnk-cart" onclick="openSearch() ">
                            <div class="items-cart-inner">
                                <div class="basket responsive-search">
                                    <i class="bx bx-search-alt"></i>
                                </div>
                            </div>
                        </button>
                        <a href="my-wishlist.php" class="lnk-cart">
                            <div class="items-cart-inner">
                                <div class="basket">
                                    <i class='bx bx-bookmark'></i>
                                </div>
                            </div>
                        </a>
                        <button class="lnk-cart" onclick="openMyCart()">
                            <div class="items-cart-inner">
                                <div class="basket">
                                    <i class='bx bx-shopping-bag'></i>
                                </div>
                                <div class="basket-item-count">
                                    <span class="count">0</span>
                                </div>
                            </div>
                        </button>
                        <button class=" lnk-cart" onclick="openAccount()">
                            <div class="basket responsive-search">
                                <i class='bx bx-menu'></i>
                            </div>
                        </button>

                        <ul class="side-menu" style=" display: flex;
                            align-items: center;
                            justify-content: center;">
                            <i class="bx bx-x" onclick="closeMyCart()"
                                style="position: absolute !important;top: 10px !important;left: 10px !important;font-size: 30px !important;color: #000 !important;"></i>

                            <div class="bag">
                                <div>
                                    <i class='bx bx-shopping-bag'></i>
                                </div>
                                <span>
                                    0
                                </span>
                            </div>
                            <li style="margin-top: 50px !important;">
                                <div class="cart-item ">
                                    <h4
                                        style="font-size: 20px;  font-family: 'Raleway',sans-serif !important ; font-weight: 600 !important ;text-align: center; color: #000;text-transform: uppercase  ; ">
                                        Your shopping basket is empty
                                        .</h4>
                                </div><!-- /.cart-item -->
                                <div class=" cart-total">
                                    <div class="total_btn">
                                        <a href="index.php" class="btn out-page-button">Continue
                                            Shooping</a>
                                    </div>
                                </div><!-- /.cart-total-->
                            </li>
                        </ul><!-- /.dropdown-menu-->
                    </div>
                    <?php } ?>
                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div><!-- /.top-cart-row -->
            </div>
        </div><!-- /.row -->

    </div><!-- /.container -->

</div>

<script>
// Select the element with the class "sticky-top"
const element = document.querySelector('.sticky-top');

// Check if the element has the class "sticky-top"
if (element) {
    // Remove the "sticky-top" class
    element.classList.remove('sticky-top');

    // Add the "fixed-top" class
    element.classList.add('fixed-top');
}
let nav = document.querySelector(".main-header");
let scrollBtn = document.querySelector(".scroll-button a");
console.log(scrollBtn);
let val;
window.onscroll = function() {
    if (document.documentElement.scrollTop > 20) {
        nav.classList.add("sticky");
        scrollBtn.style.display = "block";
    } else {
        nav.classList.remove("sticky");
        scrollBtn.style.display = "none";
    }
}
</script>
<script>
function openSearch() {
    document.querySelector(".control-group").style.left = "0";
    document.querySelector(".overMySearch").style.left = "0";

}

function closeSearch() {
    document.querySelector(".control-group").style.left = "-100%";
    document.querySelector(".overMySearch").style.left = "-100%";
}
</script>
<script>
function openMyCart() {
    document.querySelector(".side-menu").style.right = "0";
    document.querySelector(".overMyCart").style.right = "0";

}

function closeMyCart() {
    document.querySelector(".side-menu").style.right = "-100%";
    document.querySelector(".overMyCart").style.right = "-100%";
}
</script>