<style>
@import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');

.dropdown-toggle,
.dropdown a {
    font-weight: normal;
    font-family: sans-serif, 'Poppins' !important;
}


.navbar-nav li {
    background-color: white !important;
}



.header-nav,
.navbar-nav li a {
    font-family: 'Raleway', sans-serif !important;
    background: white !important;
    font-size: 15px !important;
    color: #000 !important;
    font-weight: 600 !important;
    position: relative !important;
}

.navbar-nav li a {
    line-height: 0px !important;
    padding: 10px 20px !important;
    margin-bottom: 20px;
}


.navbar-nav li a:hover {
    background: #fff !important;
}

.navbar-nav li a:after {
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

.navbar-nav li a:hover:after {
    width: 100% !important;
    left: 0 !important;
}

.navbar-nav li a:hover:after {
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

.nav-outer {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
}

@media only screen and (max-width: 800px) {
    .nav-outer {
        display: flex !important;
        align-items: center !important;
        justify-content: start !important;
    }
}
</style>
<div class="header-nav animate-dropdown m-t-20">
    <div class="" style="  padding: 0;margin-left:50px;margin-right:50px;  ">
        <div class="yamm navbar navbar-default " role="navigation">
            <div class="navbar-header">
                <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                    class="navbar-toggle collapsed" type="button">
                    <i class='bx bx-food-menu  ' style="font-size: 20px;"></i>
                </button>
            </div>
            <div class="nav-bg-class">
                <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                    <div class="nav-outer ">
                        <ul class="nav navbar-nav ">
                            <li class=" active dropdown yamm-fw ">
                                <a href=" New_Arrivals.php" data-hover="dropdown" class=" dropdown-toggle">New
                                    Arrivals</a>
                            </li>
                            <?php $sql = mysqli_query($con, "select id,categoryName  from category limit 6");
                            while ($row = mysqli_fetch_array($sql)) {
                            ?>

                            <li class="dropdown yamm">
                                <a href="category.php?cid=<?php echo $row['id']; ?>">
                                    <?php echo $row['categoryName']; ?>
                                </a>

                            </li>
                            <?php } ?>


                        </ul><!-- /.navbar-nav -->
                        <div class="clearfix"></div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>