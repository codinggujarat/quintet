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
    height: 60px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: baseline;
}


.control-group .search-field {
    width: 100% !important;
    border-right: 0 !important;
    border-radius: 50px !important;
    height: 60px;
    /* border: 2px solid black !important; */
    text-transform: uppercase !important;
    font-weight: 400;
    font-family: 'Raleway', sans-serif !important;
    font-size: 15px !important;
}

.control-group .search-field::placeholder {
    font-size: 15px !important;
    color: #000 !important;
}



.control-group .search-buttons {
    outline: 0 !important;
    border: 0 !important;
    background: transparent !important;
    position: relative !important;
    height: 60px;

}

.control-group .search-buttons .bx-search-alt {
    font-size: 25px;
    top: 6px !important;
    left: -55px;
    position: absolute;
    color: #000;
    background: black;
    color: #fff;
    padding: 12px;
    border-radius: 50px;
}


.search-area {
    border: 0 !important;
}

.main-header {
    background: white !important;
    z-index: 40 !important;
    margin-top: 40px;
}
</style>
<div class="main-header">
    <div class="container">
        <div class="row" style=" display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap; ">
            <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                <!-- ============================================================= LOGO ============================================================= -->
                <div class="logo">
                    <a href="index.php"
                        style="display: flex;align-items: center;justify-content: center;height: 80px;    ">
                        <div
                            style="background-image: url(img/quintet.jpg);background-size: 100% 100%;background-position: center;width:200px;height: 65px;">
                        </div>

                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">
                <div class="search-area ">
                    <form name="search" method="post" action="search-result.php">
                        <div class="control-group ">

                            <input class="search-field" placeholder="Search here..." name="product" required="required"
                                style="box-shadow: rgba(0, 0, 0, 0.2) 0px 12px 28px 0px, rgba(0, 0, 0, 0.1) 0px 2px 4px 0px, rgba(255, 255, 255, 0.05) 0px 0px 0px 1px inset;" />

                            <button class="search-buttons" type="submit" name="search"><i
                                    class='bx bx-search-alt'></i></button>

                        </div>
                    </form>
                </div><!-- /.search-area -->
                <!-- ============================================================= SEARCH AREA : END ============================================================= -->
            </div><!-- /.top-search-holder -->

            <div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row">
                <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
                <?php
                if (!empty($_SESSION['cart'])) {
                ?>
                <div class="dropdown dropdown-cart">
                    <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown" style="border:none !important;">
                        <div class="items-cart-inner"
                            style="border:1px solid black !important;display: flex;align-items: center;justify-content: space-between;    ">
                            <div class=" total-price-basket"
                                style=" border-right:0 !important;width: 50px !important ; ">
                                <span class=" lbl"
                                    style="font-family: sans-serif, 'Poppins' !important; font-weight: bold; font-size: 15px;color:black; ">
                                    cart
                                    -</span>
                                <span class="total-price"
                                    style="font-family: sans-serif, 'Poppins' !important;font-weight: bold; font-size: 15px;color:black;">
                                    <span class="sign">Rs.</span>
                                    <span class="value"><?php echo $_SESSION['tp']; ?></span>
                                </span>
                            </div>
                            <div class="basket"
                                style=" background:transparent  !important; height: 70px; border-left:0 !important;">
                                <i class='bx bxs-shopping-bag' style="font-size: 30px;color:#000;"></i>
                            </div>
                            <div class="basket-item-count"
                                style="background:black;  display: flex !important; align-items: center !important ; justify-content:center; height:25px; width:25px; right: -10px;top:-10px; border:2px solid black !important;">
                                <span class="count" style=" font-size:15px;"><?php echo $_SESSION['qnty']; ?></span>
                            </div>

                        </div>
                    </a>
                    <ul class="dropdown-menu"
                        style="font-family: sans-serif, 'Poppins' !important;background:white !important;width:350px !important;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;border-radius:10px ;">

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


                        <li style="background:white !important;width:300px !important">
                            <div class="cart-item product-summary">
                                <div class=" row " style=" background:white; width:100%;margin-bottom:10px;">
                                    <div class="col-xs-4 ">
                                        <div class="image" style="background:lightgray !important; width:70px;">
                                            <a href="product-details.php?pid=<?php echo $row['id']; ?>"><img
                                                    src="admin/productimages/<?php echo $row['id']; ?>/<?php echo $row['productImage1']; ?>"
                                                    width="70" height="70" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">

                                        <h3 class="name"><a href="product-details.php?pid=<?php echo $row['id']; ?>"
                                                style="font-family: sans-serif, 'Poppins' !important; font-weight: bold; "><?php echo $row['productName']; ?></a>
                                        </h3>
                                        <div class="price">
                                            Rs.<?php echo ($row['productPrice'] + $row['shippingCharge']); ?>*<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>
                                        </div>
                                    </div>
                                </div>
                                <hr style="margin-bottom:2px;margin-top:2px;">
                            </div><!-- /.cart-item -->

                            <?php }
                            } ?>
                            <div class=" clearfix">
                            </div>
                            <hr>

                            <div class="clearfix cart-total">
                                <div class="pull-right">

                                    <span class="text"
                                        style="font-family: sans-serif, 'Poppins' !important; font-size: 20px;">Total
                                        :</span><span
                                        style="font-family: sans-serif, 'Poppins' !important; font-size: 20px;"
                                        class='price'>Rs.<?php echo $_SESSION['tp'] = "$totalprice" . ".00"; ?></span>

                                </div>

                                <div class=" clearfix">
                                </div>

                                <a href="my-cart.php" class="btn btn-upper btn-primary btn-block m-t-20"
                                    style="background:black;border-radius: 0;">My Cart</a>
                            </div><!-- /.cart-total-->


                        </li>
                    </ul><!-- /.dropdown-menu-->
                </div><!-- /.dropdown-cart -->
                <?php } else { ?>
                <div class="dropdown dropdown-cart">
                    <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown" style="border:none !important;">
                        <div class="items-cart-inner"
                            style="border:1px solid black !important;display: flex;align-items: center;justify-content: space-between;   ">
                            <div class="total-price-basket" style=" border-right:0 !important;">
                                <span class=" lbl"
                                    style="font-family: sans-serif, 'Poppins' !important; font-weight: bold; font-size: 15px;color:black; ">
                                    cart
                                    -</span>
                                <span class="total-price">
                                    <span class="sign"
                                        style="font-family: sans-serif, 'Poppins' !important;font-weight: bold; font-size: 15px;color:black;">Rs.</span>
                                    <span class="value"
                                        style="font-family: sans-serif, 'Poppins' !important;font-weight: bold; font-size: 15px;color:black;">00.00</span>
                                </span>
                            </div>
                            <div class="basket"
                                style=" background:transparent  !important; height: 70px; border-left:0 !important;">
                                <i class='bx bxs-shopping-bag' style="font-size: 30px;color:#000;"></i>
                            </div>
                            <div class="basket-item-count"
                                style="background:black;  display: flex !important; align-items: center !important; justify-content:center; height:25px; width:25px; right: -10px;top:-10px; border:2px solid black !important;">
                                <span class="count" style=" font-size:15px;">0</span>
                            </div>

                        </div>
                    </a>
                    <ul class="dropdown-menu"
                        style="font-family: sans-serif, 'Poppins' !important;background:white !important;width:350px !important;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;border-radius:10px ; ">




                        <li style="background:white !important;width:300px !important;">
                            <div class="cart-item product-summary">
                                <div class="row" style=" background:white; width:100%;margin-bottom:10px;">
                                    <div class="col-xs-12"
                                        style="display: flex;align-items: center;justify-content: center; height: 100px;  ">
                                        <h4
                                            style="font-weight: 500 !important ;color: #000;text-transform: capitalize; ">
                                            Your Shopping Cart is
                                            Empty.</h4>
                                    </div>


                                </div>
                            </div><!-- /.cart-item -->


                            <hr>

                            <div class="clearfix cart-total">
                                <div class="clearfix"></div>
                                <a href="index.php" class="btn btn-upper btn-primary btn-block m-t-20"
                                    style="background:black;border-radius: 0;">Continue
                                    Shooping</a>
                            </div><!-- /.cart-total-->


                        </li>
                    </ul><!-- /.dropdown-menu-->
                </div>
                <?php } ?>




                <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
            </div><!-- /.top-cart-row -->
        </div><!-- /.row -->

    </div><!-- /.container -->

</div>