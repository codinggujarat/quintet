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
    width: 600px;
    background: white !important;
    padding-top: 50px;
    display: flex;
    padding-bottom: 300px;
    right: -200%;
    transition: all 0.1s linear;
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

.logo-holder .logo {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 40%;
}

.logo-holder .logo img {
    width: 500px;
    transition: all 0.5s linear;
    color: #fff;
}


.main-header:hover {
    background: linear-gradient(rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8));
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



@media only screen and (max-width: 1200px) {

    .logo-holder .logo {
        width: 35% !important;
    }

    .logo-holder .logo img {
        width: 190px;
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

    .logo {
        display: none;
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
    top: 0px !important;
    left: 5px !important;
    font-size: 30px !important;
    color: #000 !important;
    font-weight: 400 !important;
}

.side-menu {
    overflow-y: scroll !important;
    font-family: sans-serif, 'Poppins' !important;
    background: white !important;
    max-width: 800px;
    padding-top: 50px;
    padding-bottom: 300px;
    right: -200%;
    transition: all 0.5s linear;
    border: 1px solid black;
    flex-wrap: wrap;
}

.side-menu .cart-item .image a img {
    width: 265.66px;
    border: 1px solid black !important;
    border-left: 0 !important;
    border-right: 1px solid black !important;

}

.side-menu .cart-pra .cartText {
    margin: 0;
    width: 100px;
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
    width: 100%;
}


.total {
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: sticky !important;
    bottom: 8% !important;
    right: 0 !important;
    width: 100% !important;
    font-size: 15px !important;
    font-weight: 350 !important;
    color: #fff !important;
    padding: 20px !important;
}

.total h5 {
    font-weight: 400;
    font-family: 'Poppins', sans-serif;
    font-size: 15px !important;
    text-transform: uppercase;
    color: #000;
}

.total .a {
    background-color: #000;
    width: 100%;
    text-align: center;
    font-size: 15px;
    font-weight: 350;
    color: #fff;
    margin-top: 30px;
    padding: 20px;
}

.total_btn .a {
    position: absolute;
    bottom: 0;
    right: 0;
    background-color: #000;
    width: 100%;
    text-align: center;
    font-size: 15px;
    font-weight: 350;
    color: #fff;
    padding: 20px;
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

.mobileSearchbar {
    display: none;
}

@media only screen and (max-width:500px) {
    .side-menu {
        width: 100% !important;
    }

    .mobileSearchbar {
        display: none;
    }

    .cart-item {
        display: flex;
        width: 100%;
    }

    .cart-pra {
        border: 1px solid black !important;
        width: 100%;
    }

    .side-menu .cart-pra .cartText {
        width: 200px;
        text-align: left !important;
    }

    .cart-pra .cartText a {
        text-align: left !important;
        font-size: 12px !important;
        font-weight: bold !important;
        color: #000 !important;
    }
}
</style>
<div class="main-header sticky-top">
    <div class="" style=" padding: 0;margin:0 30px; ">
        <div class=" navbar_Nav">

            <div class="logo-holder">
                <div style="cursor: pointer; margin:0 !important;margin-left: -20px !important;padding:0; "
                    class=" responsive-search">
                    <svg class="responsive-search " height="30px" width="30px" onclick="openAccount()"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 9H13H19M5 15H19" stroke="#000000" stroke-width="1" stroke-linecap="round" />
                    </svg>
                </div>

                <div class="logo">
                    <svg class=" menubarmain" height="50px" width="50px" onclick="openmenuBar()" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 9H13H19M5 15H19" stroke="#000000" stroke-width="1" stroke-linecap="round" />
                    </svg>
                    <a href="index.php">
                        <img id="logo" src="img/background2.svg" alt="">
                    </a>
                </div>

                <div class="searchandBagtopNav">
                    <div class="shoppingBagMobileView shoppingBagMobileViewSearchBar">
                        <a href="searchBar.php" style="border:0;background:transparent;">
                            <i class='bx bx-search'></i>
                        </a>
                    </div>
                    <div class="mobileSearchbar">
                        <a href="searchBar.php" style="border:0;background:transparent;">
                            <span class="key">
                                <i class='bx bx-search' style="font-size: 15px;"></i>
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
            <div class="outercontainerbox">
                <div class="containerMenubar">
                    <svg width="50px" height="50px" class="closemenuBar" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" onclick="closemenuBar()">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#ddd"
                            stroke-width="0.096">
                            <path d="M19 5L5 19M5 5L9.5 9.5M12 12L19 19" stroke="#000" stroke-width="1"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M19 5L5 19M5 5L9.5 9.5M12 12L19 19" stroke="#000" stroke-width="1"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                    </svg>
                    <div class="contentDesktop">
                        <input type="radio" name="slider" checked id="woman">
                        <input type="radio" name="slider" id="man">
                        <input type="radio" name="slider" id="kids">
                        <div class="list">
                            <label for="woman" class="woman">
                                WOMAN </label>
                            <label for="man" class="man">
                                MAN </label>
                            <label for="kids" class="kids">
                                KIDS </label>
                        </div>
                        <div class="text-content">
                            <div class="woman text">
                                <ul class="responsive_Nav_Link_desktop">
                                    <li style="margin-top: 15px;margin-bottom: 45px;">
                                        <a href="category.php?cid=8">///new</a>
                                    </li>
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
                            <div class="man text">
                                <ul class="responsive_Nav_Link_desktop">
                                    <li style="margin-top: 15px;margin-bottom: 45px;">
                                        <a href="category.php?cid=10">///new</a>
                                    </li>
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
                            <div class="kids text">
                                <ul class="responsive_Nav_Link_desktop">
                                    <li style="margin-top: 15px;margin-bottom: 45px;">
                                        <a href="category.php?cid=29">///new</a>
                                    </li>
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
                        <div style="width:100%;height:20px;">
                            <style>
                            .menuBarLinks {
                                position: absolute;
                                bottom: 5%;
                            }

                            .menuBarLinks li {
                                margin-top: 10px;
                            }

                            .menuBarLinks li a {
                                font-size: 20px;
                                text-transform: uppercase;
                                color: #000;
                            }
                            </style>
                            <ul class="menuBarLinks">
                                <li>
                                    <a href="joinournewsletter.php">
                                        JOIN OUR NEWSLETTER
                                    </a>
                                </li>
                                <li>
                                    <a href="ContactUs.php">
                                        Contact Us
                                    </a>
                                </li>
                                <li>
                                    <a href="allhelpcategory.php">
                                        Help
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
            <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');



            .outercontainerbox {
                position: fixed;
                left: -200%;
                bottom: 0;
                width: 100%;
                height: 100vh;
                background: linear-gradient(rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8));
                z-index: 99;
            }

            .containerMenubar {
                padding: 20px;
                max-width: 600px;
                width: 100%;
                height: 100vh;
                background: #fff;
                border: 1px solid black;
                position: fixed;
                left: -200%;
                bottom: 0;
                /* bottom: 0; */
                padding: 30px;
                z-index: 99 !important;
                transition: all 1s linear;
            }

            .closemenuBar {
                position: absolute;
                right: 10px;
                top: 50%;
                cursor: pointer;
                z-index: 99999999 !important;
            }


            .contentDesktop {
                display: block;
            }

            .contentDesktop .list {
                width: 100%;
                position: relative;
                border-bottom: 1px solid black;
                margin: 0;
                padding: 20px 0;
            }

            .contentDesktop .list label:first-child {
                margin-left: 0;
            }

            .contentDesktop .list label {
                font-size: 20px;
                font-weight: 300;
                margin-left: 15px;
                cursor: pointer;
                transition: all 0.5s ease;
                color: #000;
                font-family: 'Poppins', sans-serif;
                text-transform: uppercase;
                z-index: 12;
                transition: 0.1s all linear;
            }

            #woman:checked~.list label.woman,
            #man:checked~.list label.man,
            #kids:checked~.list label.kids,
            #code:checked~.list label.code,
            #about:checked~.list label.about {
                color: #000;
                font-weight: 600;
                padding: 4px;
            }




            .contentDesktop .text-content {
                width: 80%;
                height: 100%;
            }

            .contentDesktop .text {
                display: none;
                height: 400px;
                overflow: scroll;
            }

            .contentDesktop .text::-webkit-scrollbar {
                display: none;
            }

            .contentDesktop .text-content .woman {
                display: block;

            }



            #woman:checked~.text-content .woman,
            #man:checked~.text-content .man,
            #kids:checked~.text-content .kids,
            #code:checked~.text-content .code,
            #about:checked~.text-content .about {
                display: block;

            }

            #man:checked~.text-content .woman,
            #kids:checked~.text-content .woman,
            #code:checked~.text-content .woman,
            #about:checked~.text-content .woman {
                display: none;
            }

            .contentDesktop input {
                display: none;
            }

            .responsive_Nav_Link_desktop li {
                list-style-type: none;
            }

            .menubarmain {
                display: block;
                cursor: pointer;
                z-index: 9 !important;
            }

            .responsive_Nav_Link_desktop li a {
                margin-top: 10px;
                font-size: 20px;
                text-transform: uppercase;
                color: #000;
                font-family: 'Poppins', sans-serif;
                text-decoration: none;
            }

            @media only screen and (max-width: 800px) {

                .containerMenubar,
                .outercontainerbox,
                .menubarmain {
                    display: none !important;
                    opacity: 0;
                }

            }
            </style>
            <script>
            function openmenuBar() {
                document.querySelector(".containerMenubar").style.left = "0";
                document.querySelector(".outercontainerbox").style.left = "0";

            }

            function closemenuBar() {
                document.querySelector(".containerMenubar").style.left = "-100%";
                document.querySelector(".outercontainerbox").style.left = "-100%";
            }
            </script>
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