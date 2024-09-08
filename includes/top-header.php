<?php
//session_start();

?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');

.myaccount-box {
    display: flex;
    align-items: center;
    justify-content: end;
    padding: 10px;
    background: #f2f3f8;
    position: relative;
    top: 0;
    width: 100%;
    z-index: 999;
    padding-left: 40px;
    padding-right: 40px;
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
}


.myaccount-links li a {
    display: flex;
    align-items: center;
    font-size: 12px !important;
    justify-content: center;
    font-weight: 600 !important;
    text-decoration: none;
    color: #000 !important;
    text-transform: capitalize !important;
}

.myaccount-links li a i {
    margin-right: 6px;
}

.myaccount-links .bx-x {
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
    }

    .myaccount-links {
        position: fixed;
        top: 0;
        left: -100%;
        /* left: 0; */
        height: 100vh;
        width: 380px;
        text-align: left;
        display: block;
        background-color: white;
        z-index: 9999;
        transition: 0.5s linear;
        overflow-y: auto;
        overflow-x: hidden;
    }



    .myaccount-links li {
        display: flex;
        align-items: center;
        justify-content: start;
        width: 100%;
        margin-top: 20px;

    }

    .myaccount-links li a span,
    .myaccount-links li a i {
        font-size: 16px;
        color: #000 !important;
        text-transform: capitalize;
    }

    .myaccount-links li a i {
        margin-right: 20px;
    }

    .myaccount-links .bx-x {
        display: block;
        position: absolute;
        right: 10px;
        top: 10px;
        font-size: 30px;
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
        display: flex;
        align-items: center;
        width: 90%;
        justify-content: center;
    }

    .logInOut a {
        padding: 10px 50px;
        border-radius: 50px;
        background: #f2f3f8;
        border: 1px solid black;
        color: #000;
    }

    .logInOut a:hover {
        box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
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
}

@media only screen and (max-width: 500px) {
    .myaccount-links {
        width: 100%;
    }
}
</style>

<div class="myaccount-box top-fixed">
    <div class="myaccount-links-box">
        <div class="myaccount-links">
            <i class="bx bx-x" onclick="closeAccount()"></i>
            <li class="fav-bag-side" style="margin-top: 40px;"></li>
            <?php if (strlen($_SESSION['login'])) { ?>
            <li class="fav-bag-side"
                style="font-size: 16px !important;font-family: 'Raleway',sans-serif; color: #000;text-transform: uppercase      !important  ;">
                <a href="my-account.php">
                    <span>Hi, </span>
                    <span>&nbsp;<?php echo htmlentities($_SESSION['username']); ?></span>
                    <i class='bx bx-user' style="font-size: 25px;margin-left:10px;"></i>
                </a>
            </li>
            <?php } ?>
            <?php $sql = mysqli_query($con, "select id,categoryName  from category limit 6");
            while ($row = mysqli_fetch_array($sql)) {
            ?>

            <li class="responsive_Nav_Link ">
                <a href=" category.php?cid=<?php echo $row['id']; ?>"
                    style="font-size: 16px  !important;text-transform:capitalize !important;">
                    <?php echo $row['categoryName']; ?>
                </a>
            </li>
            <?php } ?>
            <li class="responsive_Nav_Link responsive_Nav_Link2">
                <a href=" New_Arrivals.php"
                    style="font-size: 16px  !important;text-transform:capitalize !important;">New
                    Arrivals</a>
            </li>
            <?php if (strlen($_SESSION['login']) == 0) { ?>
            <li class="logInOut"><a href="login.php">
                    <i class='bx bx-arrow-from-right'></i>
                    <span class="linkLog">sign in</span>
                </a>
            </li>
            <?php } else { ?>
            <li class="fav-bag-side">
                <?php if (strlen($_SESSION['login'])) { ?>
                <a href="track-orders.php">
                    <i class='bx bx-bookmark'></i>

                    <span class="key">
                        favorites
                    </span>
                </a>
                <?php } ?>
            </li>
            <li class=" fav-bag-side">
                <?php if (strlen($_SESSION['login'])) { ?>
                <a href=" track-orders.php">
                    <i class='bx bx-shopping-bag'></i>
                    <span class="key">
                        Bag
                    </span>
                </a>
                <?php } ?>
            </li>

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
            <li class="logInOut fav-bag-side"><a href="logout.php">
                    <i class='bx bx-arrow-to-right'></i>
                    <span class="linkLog">Logout</span>
                </a>
            </li>
            <?php if (strlen($_SESSION['login'])) { ?>
            <li class="deskotp-link"
                style="font-size: 16px !important;font-family: 'Raleway',sans-serif; color: #000;text-transform: uppercase      !important  ;">
                <a href="my-account.php">
                    <span>Hi, </span>
                    <span>&nbsp;<?php echo htmlentities($_SESSION['username']); ?></span>
                    <i class='bx bx-user' style="font-size: 25px;margin-left:10px;"></i>
                </a>
            </li>
            <?php } ?>

            <?php } ?>
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
// Select all elements with the class "sticky-top"
const elements = document.querySelectorAll('.sticky-top');

// Loop through each element and apply the logic
elements.forEach(element => {
    // Check if the element has the class "sticky-top"
    if (element.classList.contains('sticky-top')) {
        // Remove the "sticky-top" class
        element.classList.remove('sticky-top');

        // Add the "fixed-top" class
        element.classList.add('fixed-top');
    }
});

// Select all elements with the class "top-fixed"
let navElements = document.querySelectorAll(".top-fixed");
// Select all scroll buttons
let scrollBtns = document.querySelectorAll(".scroll-button a");

console.log(scrollBtns);

window.onscroll = function() {
    // Loop through all "top-fixed" elements
    navElements.forEach(nav => {
        if (document.documentElement.scrollTop > 20) {
            nav.classList.add("sticky");
        } else {
            nav.classList.remove("sticky");
        }
    });

    // Loop through all scroll buttons and show/hide them based on scroll position
    scrollBtns.forEach(scrollBtn => {
        if (document.documentElement.scrollTop > 20) {
            scrollBtn.style.display = "block";
        } else {
            scrollBtn.style.display = "none";
        }
    });
};
</script>