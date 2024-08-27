<?php
//session_start();

?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');


.top-bar {
    background: white;
    width: 100%;
    position: sticky;
    top: 0;
    z-index: 999;
    background: #F2F3F8 !important;
}




.list-unstyled li a,
.list-unstyled li a span {
    font-family: 'Raleway', sans-serif !important;
    text-transform: uppercase !important;
    font-weight: 600 !important;
}

.list-unstyled li {
    border: 0 !important;
}

.list-unstyled li a {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    border: 2px solid #000 !important;

}

.list-unstyled li a,
.list-unstyled li a .fa {
    color: #000 !important;
    font-size: 11px !important;
    padding: 5px 10px !important;
}

.list-unstyled li a .fa {
    font-size: 10px !important;
}
</style>
<div class="top-bar animate-dropdown">
    <div class="container">
        <div class="header-top-inner" style="overflow-x :auto !important   ;">
            <div class="cnt-account">
                <ul class="list-unstyled ">
                    <?php if (strlen($_SESSION['login'])) { ?>
                    <li>
                        <a href="#">
                            <i class="fa-regular fa-user"></i>
                            <span>Welcome - </span>
                            <span style="font-weight: bold; "><?php echo htmlentities($_SESSION['username']); ?></span>
                        </a>
                    </li>
                    <?php } ?>

                    <li>
                        <a href="my-account.php">
                            <i class="fa-regular fa-circle-user"></i>
                            <span>My Account</span>
                        </a>
                    </li>
                    <li>
                        <a href="my-wishlist.php">
                            <i class='fa-regular fa-bookmark '></i>
                            <span>favourites</span>
                        </a>
                    </li>
                    <li><a href="my-cart.php">
                            <i class='bx bx-shopping-bag'></i>
                            <span>shopping bag</span>
                        </a>
                    </li>
                    <?php if (strlen($_SESSION['login']) == 0) { ?>
                    <li><a href="login.php">
                            <i class='bx bx-arrow-from-right'></i>
                            <span>Login</span>
                        </a>
                    </li>
                    <?php } else { ?>

                    <li><a href="logout.php">
                            <i class='bx bx-arrow-to-right'></i>
                            <span>Logout</span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div><!-- /.cnt-account -->

            <div class="cnt-block">
                <ul class="list-unstyled list-inline">
                    <li class="dropdown dropdown-small">
                        <a href="track-orders.php" class="dropdown-toggle "
                            style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;background: #fff;color: #000 !important   ; border: 2px solid black ;font-weight: bold;  "><span
                                class="key">Track
                                Order</b></a>
                    </li>


                </ul>
            </div>

            <div class="clearfix"></div>
        </div><!-- /.header-top-inner -->
    </div><!-- /.container -->
</div><!-- /.header-top -->
<style>
.cnt-account ul li a {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
}

.cnt-account ul li a span {
    margin-left: 5px;
}
</style>