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
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');




body::-webkit-scrollbar {
    display: none;
}


.items-cart-inner {
    font-family: 'Poppins', sans-serif !important;
    font-weight: lighter !important;
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
    text-transform: uppercase !important;
    font-weight: 400 !important;
    background: transparent !important;
    border-left: 0 !important;
}

.responsive-search i,
.basket i {
    font-size: 20px !important;
    color: #000 !important;
    background: transparent !important;

    cursor: pointer;
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
    color: #fff !important;
    width: 20px !important;
    right: 8px !important;
    top: 15px !important;
    color: #fff !important;
    border: 2px solid black !important;
}

.basket-item-count span {
    font-size: 12px !important;
}

.logo-holder {
    display: flex;
    width: 100%;
    align-items: center;
    justify-content: space-between;
}

.side-menu {
    overflow-y: scroll !important;
    font-family: sans-serif, 'Poppins' !important;
    width: 400px;
    background: white !important;
    padding-top: 50px;
    display: flex;
    padding-bottom: 300px;
    right: -200%;
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
    width: 500px;
    transition: all 0.5s linear;
    color: #fff;
}


.main-header:hover {
    background: linear-gradient(rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8)) !important;
}

.main-header {
    width: 100%;
    z-index: 9 !important;
}

.main-header.sticky {
    /* background: linear-gradient(rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8)) !important; */
    width: 100%;
    z-index: 9;
    color: #fff;
}




.main-header.sticky .logo-holder .logo img {
    width: 340px;
}


.responsive-search {
    display: none;
}

.control-group .bx-x {
    display: none;
}


.main-header {
    position: fixed;
    top: 0;
    z-index: 99999;
}



@media only screen and (max-width: 1000px) {
    .logo-holder .logo img {
        width: 300px;
    }

    .main-header.sticky .logo-holder .logo img {
        width: 150px;
    }

    .main-header {
        height: 70px;
    }


}

@media only screen and (max-width: 800px) {
    .logo-holder .logo img {
        width: 150px !important;
    }

    .main-header {
        width: 100%;
        z-index: 99;
    }

    .responsive-search {
        display: block;
    }


    .total-price-basket {
        display: none !important;
    }

    .items-cart-inner {
        border: 0 !important;
    }


    .logo-holder .logo img {
        width: 300px;
    }

    .navbar_Nav {
        align-items: start !important;
        justify-content: space-between !important;
    }

    .overMySearch {
        position: fixed;
        background: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5));
        z-index: 99999;
        left: -200%;
        top: 0;
        width: 100%;
        height: 100%;
    }


}

@media only screen and (max-width:450px) {
    .shoppingBagMobileViewSearchBar {
        position: fixed;
        bottom: 1%;
        background: transparent;
        width: 100%;
        left: 0;
        padding: 10px;
        border: 1px solid #fff;
    }

    .shoppingBagMobileViewSearchBar a {
        color: #fff;
    }

}

.overMyCart {
    position: fixed;
    background: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5));
    z-index: 999;
    right: -200%;
    top: 0;
    width: 100%;
    height: 100%;
}
</style>
<style>
.lnk-cart {
    margin-left: 20px !important;
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
    font-weight: 400 !important;
}

.side-menu {
    overflow-y: scroll !important;
    font-family: sans-serif, 'Poppins' !important;
    background: white !important;
    width: 400px;
    padding-top: 50px;
    padding-bottom: 300px;
    right: -200%;
    transition: 0.5s linear;
    border: 1px solid black;
}

.side-menu .cart-item .image a img {
    width: 199px;
    border: 1px solid black !important;
    border-left: 0 !important;
    border-right: 1px solid black !important;

}

.side-menu .cart-pra .cartText {
    margin: 0;

    width: 100px !important;
    font-size: 10px !important;
    overflow: hidden !important;
    overflow: hidden !important;
    text-overflow: ellipsis !important;
    white-space: nowrap !important;
}

.side-menu .cart-pra h3 a {
    font-size: 12px !important;
    font-family: 'Poppins', sans-serif !important;
    font-weight: 400 !important;
}

.side-menu .cart-pra h6 {
    font-weight: normal;
    font-size: 10px;
}

.side-menu .cart-pra {
    padding: 5px;
    border: 1px solid black;
    border-top: 0;
    border-left: 0 !important;
    border-right: 1px solid black !important;
}

.cart-total {
    background: #fff;
    width: 400px;
    position: fixed;
    bottom: 0%;
}

.total {
    border: 0 solid black;
    border-top: 1px solid black;
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 20px;
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 20px;
}

.total h5 {
    font-weight: 400;
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    text-transform: uppercase;
    color: #000;
}

.total_btn .a {
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff !important;
    width: 400px !important;
    color: #000 !important;
    height: 50px !important;
    font-size: 12px !important;
    border-radius: 0 !important;
    font-weight: 500 !important;
    border: 1px solid black;
    border-left: 0;
    margin-top: 20px !important;
}
</style>

<style>
.navbar_Nav button {
    background: transparent !important;
    border: 0;
}

.navbar_Nav button .sideMenu {
    font-size: 20px;
}


.navbar_Nav {
    display: flex;
    align-items: center;
    justify-content: space-between;

}

/* shoppingBagMobileView */
.shoppingBagMobileView a {
    display: none;
    font-size: 12px !important;
    text-transform: uppercase;
    font-family: 'Poppins', sans-serif !important;
    font-weight: 400 !important;
}

.searchandBagtopNav {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
}

@media only screen and (max-width: 1000px) {
    .shoppingBagMobileView a {
        display: block;
    }
}
</style>
<div class="main-header sticky-top">
    <div class="" style=" padding: 0;margin:0 30px; ">
        <div class=" navbar_Nav">

            <div class="logo-holder">
                <div style=" margin:0 !important;margin-left: -20px !important;padding:0; " class=" responsive-search">
                    <svg class="responsive-search " height="30px" width="30px" onclick="openAccount()"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 9H13H19M5 15H19" stroke="#000000" stroke-width="1" stroke-linecap="round" />
                    </svg>
                </div>

                <div class="logo">
                    <a href="index">
                        <img id="logo" src="img/background2.svg" alt="">
                    </a>
                </div>

                <div class="searchandBagtopNav">
                    <div class="shoppingBagMobileView shoppingBagMobileViewSearchBar">
                        <a href="searchBar" style="border:0;background:transparent;">
                            <i class='bx bx-search'></i>
                            <span class="key">
                                search
                            </span>
                        </a>
                    </div>
                    <div class="shoppingBagMobileView" style="margin-left: 20px;">
                        <?php
                        if (!empty($_SESSION['cart'])) {
                        ?>
                        <a href=" #ShoppingBag" onclick="openMyCart()">
                            <i class='bx bx-shopping-bag'></i>
                            Shopping bag (<?php echo $_SESSION['qnty']; ?>)
                        </a>
                        <?php } else { ?>
                        <a href="#ShoppingBag" onclick="openMyCart()">
                            <i class='bx bx-shopping-bag'></i>
                            Shopping bag (0)
                        </a>
                        <?php } ?>
                    </div>

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
                left: 15%;
                top: 2.3%;
            }
            </style>

        </div><!-- /.row -->

    </div><!-- /.container -->
    <div class="header-nav ">
        <div class="nav-bg-classa">
            <div class="nav-outers ">
                <ul class="nav navbar-navs ">
                    <li>
                        <a href=" New_Arrivals.php">New
                            Arrivals</a>
                    </li>
                    <?php $sql = mysqli_query($con, "select id,categoryName  from category limit 6");
                    while ($row = mysqli_fetch_array($sql)) {
                    ?>

                    <li>
                        <a href="category.php?cid=<?php echo $row['id']; ?>">
                            <?php echo $row['categoryName']; ?>
                        </a>

                    </li>
                    <?php } ?>
                </ul><!-- /.navbar-navs -->
            </div>
        </div>
    </div>
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
document.addEventListener("DOMContentLoaded", function() {
    let activeForm = null;

    // Event listener for buttons to toggle forms
    document.body.addEventListener("click", function(event) {
        const target = event.target;
        if (target.matches("[data-toggle-form]")) {
            event.stopPropagation(); // Prevents the click from propagating further

            const formId = target.getAttribute("data-toggle-form");
            const form = document.getElementById(formId);

            if (activeForm && activeForm !== form) {
                activeForm.style.display = "none";
            }

            if (form.style.display === "block") {
                form.style.display = "none";
                activeForm = null;
            } else {
                form.style.display = "block";
                activeForm = form;
            }
        } else if (activeForm && !activeForm.contains(event.target)) {
            // Click outside any active form closes it
            activeForm.style.display = "none";
            activeForm = null;
        }
    });
});
</script>