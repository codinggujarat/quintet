<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');


.dropdown-toggle,
.dropdown a {
    font-family: 'Poppins', sans-serif !important;
    font-weight: lighter !important;
    font-weight: normal;
    font-family: 'Poppins', sans-serif !important;
}


.navbar-navs li {
    background-color: transparent !important;
}



.header-nav,
.navbar-navs li a {
    font-family: 'Poppins', sans-serif !important;
    font-weight: 400 !important;
    background: transparent !important;
    font-size: 13px !important;
    color: #000 !important;
    /* position: relative !important; */
}

.navbar-navs li a {
    line-height: 0px !important;
    padding: 10px 20px !important;
    margin-bottom: 20px;
    text-transform: uppercase;
    text-decoration: none !important;
}


.navbar-navs li a:hover {
    background: transparent !important;
}

.navbar-navs li a:after {
    background: none repeat scroll 0 0 transparent !important;
    bottom: 0 !important;
    content: "" !important;
    display: block !important;
    height: 1px !important;
    left: 50% !important;
    position: absolute !important;
    background: #000 !important;
    transition: width 0.3s ease 0s, left 0.3s ease 0s !important;
    width: 0 !important;
}

.navbar-navs li a:hover:after {
    width: 100% !important;
    left: 0 !important;
}

.navbar-navs li a:hover:after {
    width: 100% !important;
    left: 0 !important;
}



.navbar-toggle {
    border: 0 !important;
    box-shadow: none !important;
    outline: none !important;
}

.navbar-toggle:hover {
    background: transparent !important;
}

.collapse {
    overflow: hidden !important;
}

.nav-outers ul {
    display: flex !important;
    align-items: center !important;
    justify-content: start !important;
}

.header-nav {
    position: fixed;
    top: 120px;
    left: 17px;
    width: 100%;
    z-index: 999;
    background: transparent !important;
}



@media only screen and (max-width: 800px) {
    .nav-outers {
        overflow-x: auto !important;

    }

    .nav-outers::-webkit-scrollbar {
        display: none;
    }

    .nav-outers ul {
        display: flex !important;
        align-items: center !important;
        justify-content: start !important;
    }

    .header-nav {
        display: none;
    }

}
</style>
<div class="header-nav  m-t-20">
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