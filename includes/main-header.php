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

.logo-holder .logo svg {
    width: 500px;
    transition: all 0.5s linear;
    color: #fff;
    fill: black !important;
}

.logo-holder .logo svg path {
    fill: black !important;

}

.main-header:hover {
    background: linear-gradient(rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8)) !important;
}

.main-header {
    width: 100%;
    z-index: 9 !important;
}

.main-header.sticky {
    background: linear-gradient(rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8)) !important;
    width: 100%;
    z-index: 9;
    color: #fff;
}

.main-header.sticky .logo-holder .logo svg {
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
    .logo-holder .logo svg {
        width: 150px;
    }

    .main-header.sticky .logo-holder .logo svg {
        width: 150px;

    }

    .main-header {
        height: 70px;
    }


}

@media only screen and (max-width: 800px) {
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
                <div style="margin:0 !important;padding:0;" class="responsive-search">
                    <svg class="responsive-search " height="30px" width="30px" onclick="openAccount()"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 9H13H19M5 15H19" stroke="#000000" stroke-width="1" stroke-linecap="round" />
                    </svg>
                </div>
                <div class="logo">
                    <a href="index">
                        <svg width="500" height="" viewBox="0 0 486 92" fill="" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M29.6 72.5C24 71.4333 19.0333 69.2333 14.7 65.9C10.3667 62.5667 6.96667 58.4 4.5 53.4C2.1 48.4 0.9 42.9333 0.9 37C0.9 30.1333 2.46667 23.9333 5.6 18.4C8.8 12.8 13.2 8.43333 18.8 5.29999C24.4 2.1 30.6667 0.499997 37.6 0.499997C44.5333 0.499997 50.8 2.1 56.4 5.29999C62 8.43333 66.3667 12.8 69.5 18.4C72.7 23.9333 74.3 30.1333 74.3 37C74.3 42.9333 73.0667 48.4 70.6 53.4C68.2 58.4 64.8333 62.5667 60.5 65.9C56.1667 69.2333 51.2 71.4333 45.6 72.5V92H29.6V72.5ZM37.6 57.8C41.4667 57.8 44.9333 56.9 48 55.1C51.1333 53.3 53.5667 50.8333 55.3 47.7C57.1 44.5 58 40.9333 58 37C58 33.0667 57.1 29.5333 55.3 26.4C53.5667 23.2 51.1333 20.7 48 18.9C44.9333 17.0333 41.4667 16.1 37.6 16.1C33.7333 16.1 30.2667 17.0333 27.2 18.9C24.1333 20.7 21.7 23.2 19.9 26.4C18.1667 29.5333 17.3 33.0667 17.3 37C17.3 40.9333 18.1667 44.5 19.9 47.7C21.7 50.8333 24.1333 53.3 27.2 55.1C30.2667 56.9 33.7333 57.8 37.6 57.8ZM120.103 73.5C113.636 73.5 107.936 72.1667 103.003 69.5C98.1365 66.8333 94.3698 63.1 91.7031 58.3C89.0365 53.4333 87.7031 47.7667 87.7031 41.3V2H103.703V40.5C103.703 44.1667 104.336 47.3333 105.603 50C106.936 52.6 108.803 54.6 111.203 56C113.67 57.4 116.636 58.1 120.103 58.1C123.57 58.1 126.503 57.4 128.903 56C131.37 54.6 133.236 52.6 134.503 50C135.77 47.3333 136.403 44.1667 136.403 40.5V2H152.403V41.3C152.403 47.7667 151.07 53.4333 148.403 58.3C145.803 63.1 142.036 66.8333 137.103 69.5C132.236 72.1667 126.57 73.5 120.103 73.5ZM170.741 72V2H186.741V72H170.741ZM206.386 72V2H222.486L254.786 67.1V2H270.786V72H254.686L222.386 6.9V72H206.386ZM308.47 72V17.4H283.27V2H349.57V17.4H324.47V72H308.47ZM362.05 72V2H410.35V15.9H377.75V36H399.95V38H377.75V58.1H413.25V72H362.05ZM444.017 72V17.4H418.817V2H485.117V17.4H460.017V72H444.017Z"
                                fill="white" />
                        </svg>
                    </a>
                </div>
                <div class="searchandBagtopNav">
                    <div class="shoppingBagMobileView">
                        <a href="searchBar" style="border:0;background:transparent;">
                            <span class="key">
                                <i class='bx bx-search'></i>
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