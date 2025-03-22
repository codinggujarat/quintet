<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
@import url('https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css');
@import url('https: //cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css');

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    box-shadow: none !important;
    font-family: 'Poppins', sans-serif;
}

.item-name {
    font-family: 'Poppins', sans-serif;
    font-size: 15px !important;
    font-weight: 400 !important;
}

input:focus {
    box-shadow: none !important;
    outline: none !important;
    border: 2px solid black !important;
}

textarea,
input {
    border: 1px solid black !important;
}

textarea:focus {
    box-shadow: none !important;
    outline: none !important;
    border: 2px solid black !important;
}

.input-field-login {
    position: relative;
}

.input-field-login input {

    height: 50px !important;
    width: 100% !important;
    outline: none !important;
    font-size: 16px !important;
    border: 1px solid #000 !important;
    transition: all 0.3s ease !important;
    outline: o !important;
    color: #000;
    font-weight: bold !important;
    background: #fff !important;

}



.input-field-login label {
    font-family: 'Raleway', sans-serif !important;
    font-size: 17px;
    color: #000;
    font-weight: 600;
    text-transform: capitalize !important;
}

.input-field-login label {
    position: absolute;
    top: 50%;
    left: 15px;
    transform: translateY(-50%);
    color: #000;
    font-size: 15px;
    pointer-events: none;
    transition: 0.3s;
    font-family: 'Raleway', sans-serif !important;
    font-weight: 500;

}

input:focus,
textarea:focus {
    border: 2px solid #000;
}

input:focus~label,
textarea:focus~label,
select:focus~label,
input:valid~label,
textarea:valid~label,
select:valid~label {
    top: 0;
    left: 15px;
    font-size: 16px;
    padding: 0 2px;
    background: #fff;
    color: #000;
}

.noallowtochage input {
    cursor: no-drop;
    background: #f2f3f8;
}

.control-group label {
    font-family: 'Raleway', sans-serif !important;
    font-size: 14px !important;
    color: #000 !important;
    font-weight: 500 !important;
    text-transform: uppercase !important;
}

.control-group input,
.control-group textarea,
.control-group select {
    border: 2px solid gray !important;
    font-family: 'Raleway', sans-serif !important;
    font-size: 14px !important;
    color: #000 !important;
    font-weight: 600 !important;
    padding: 10px 20px !important;
    width: 100% !important;
    height: 50px !important;
    box-shadow: 0 !important;
    /* border-radius: 10px !important; */
}




.control-group input::placeholder,
.control-group textarea::placeholder {
    font-family: 'Raleway', sans-serif !important;
    font-size: 15px !important;
    color: #000 !important;
    font-weight: 600 !important;
    text-transform: capitalize !important;
}

.control-group input:focus,
.control-group textarea:focus {
    border: 2px solid black !important;
    box-shadow: none !important;
}

.checkout-page-button {
    background: #000 !important;
    width: 100% !important;
    color: #fff !important;
    height: 50px !important;
    font-size: 18px !important;
    /* border-radius: 10px !important; */
    font-family: 'Raleway', sans-serif !important;
    font-weight: 400 !important;
}

.checkout-page-button:hover {
    color: #fff !important;
    border: 1px solid black !important;
}

.centerCard {
    display: flex;
    align-items: start;
    justify-content: start;
}

.centerCard .card {
    border-radius: 10px;
    width: 400px;
    padding: 20px;
}

.centerCard .card .card-body h3 {
    font-size: 17px !important;
    text-transform: uppercase !important;
    font-family: 'Poppins', sans-serif !important;
}

.main-content {
    background: #f2f3f8;
    height: 100%;
}

.imgLable {
    position: absolute;
    top: 50%;
    left: 15px;
    transform:
        translateY(-50%);
    color: #000;
    font-size: 15px;
    pointer-events: none;
    transition: 0.3s;
    font-family: 'Raleway', sans-serif !important;
    font-weight: 500;
    top: 0;
    left: 15px;
    font-size: 16px;
    padding: 0 2px;
    background: #fff;
    color: #000;
}

.nav-link svg {
    background: transparent !important;
    padding: 5px;
    border-radius: 50px;
}

.logOut {
    background: #000 !important;
    color: white;
}




.logOut svg {
    background-color: transparent !important;
}

.alert {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #f2f3f8;
    border: 1px solid black;
    height: 20px;
    margin-top: 30px;
    border-radius: 0;
    margin-bottom: 30px;
}


.alert button {
    border: 0;
    outline: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: transparent;
}

.alert span {
    font-weight: bold;
}

.card {
    box-shadow: 0 !important;
    margin: 0 !important;
    padding: 0 !important;
}

.alert span,
.alert h6 {
    text-transform: uppercase;
    font-size: 13px;
}
</style>
<aside class="sidebar sidebar-default sidebar-white  sidebar-base navs-rounded-all " style="background:#fff;">
    <div class="sidebar-header d-flex align-items-center justify-content-start">
        <a href="index.php" class="navbar-brand">
            <!--Logo start-->
            <style>
            .nav-avatar {
                width: 100% !important;
                border: 0 !important;
                height: 50px !important;
                border-radius: 0 !important;
            }
            </style>
            <div class="logo-main">
                <div class="logo-normal">
                </div>
                <div class="#logo-mini ">
                </div>
            </div>
            <!--logo End-->
            <!-- <h4 class="logo-title">
                <img src="./images/quintet.jpg" alt="" class="nav-avatar m-0 p-0">
            </h4> -->
        </a>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </i>
        </div>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true" style="background: #000;">
            <i class="icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </i>
        </div>
    </div>

    <div class="sidebar-body pt-0 data-scrollbar">
        <div class="sidebar-list">
            <!-- Sidebar Menu Start -->
            <ul class="navbar-nav iq-main-menu" id="sidebar-menu">

                <li class="nav-item ">
                    <a class="nav-link rounded-5  text-black bg-transparent" href="dashboard.php">
                        <i class="icon">
                            <svg class="color" width="30" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3 6.5C3 3.87479 3.02811 3 6.5 3C9.97189 3 10 3.87479 10 6.5C10 9.12521 10.0111 10 6.5 10C2.98893 10 3 9.12521 3 6.5Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M14 6.5C14 3.87479 14.0281 3 17.5 3C20.9719 3 21 3.87479 21 6.5C21 9.12521 21.0111 10 17.5 10C13.9889 10 14 9.12521 14 6.5Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3 17.5C3 14.8748 3.02811 14 6.5 14C9.97189 14 10 14.8748 10 17.5C10 20.1252 10.0111 21 6.5 21C2.98893 21 3 20.1252 3 17.5Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M14 17.5C14 14.8748 14.0281 14 17.5 14C20.9719 14 21 14.8748 21 17.5C21 20.1252 21.0111 21 17.5 21C13.9889 21 14 20.1252 14 17.5Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </i>

                        <span class="item-name text-uppercase text-black">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon text-uppercase"
                            style="color: #000;font-size: 14px;font-weight: 600; ">order's
                            management</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>
                <li class="nav-item text-black "
                    style="background: transparent !important ;color: black !important ;box-shadow: none !important ;   ">
                    <a class="nav-link text-black" data-bs-toggle="collapse" href="#horizontal-menu" role="button"
                        aria-expanded="false" aria-controls="horizontal-menu"
                        style="background: transparent !important ; color: black !important ;box-shadow: none !important ;  ">
                        <i class="icon text-black">
                            <svg width="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.33 16.5928H4.0293" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M13.1406 6.90042H19.4413" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.72629 6.84625C8.72629 5.5506 7.66813 4.5 6.36314 4.5C5.05816 4.5 4 5.5506 4 6.84625C4 8.14191 5.05816 9.19251 6.36314 9.19251C7.66813 9.19251 8.72629 8.14191 8.72629 6.84625Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20.0002 16.5538C20.0002 15.2581 18.9429 14.2075 17.6379 14.2075C16.3321 14.2075 15.2739 15.2581 15.2739 16.5538C15.2739 17.8494 16.3321 18.9 17.6379 18.9C18.9429 18.9 20.0002 17.8494 20.0002 16.5538Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </i>
                        <span class="item-name text-uppercase text-black">Order's</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar-menu">
                        <li class="nav-item ">
                            <a class="nav-link rounded-5  text-black bg-transparent " href="todays-orders.php">
                                <span class="item-name text-uppercase text-black "> Today's Orders </span>
                                <?php
                                $f1 = "00:00:00";
                                $from = date('Y-m-d') . " " . $f1;
                                $t1 = "23:59:59";
                                $to = date('Y-m-d') . " " . $t1;
                                $result = mysqli_query($con, "SELECT * FROM Orders where orderDate Between '$from' and '$to'");
                                $num_rows1 = mysqli_num_rows($result); {
                                ?>
                                <b class=" label  rounded-5  d-flex align-items-center justify-content-center  pb-1 bg-info"
                                    style="  height: 20px;width: 20px;   color: #fff;font-weight: 400;background: #0dcaf0 !important ;     "><?php echo htmlentities($num_rows1); ?></b>
                                <?php } ?>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link rounded-5  text-black bg-transparent" href="pending-orders.php">

                                <span class="item-name text-uppercase text-black">Pending Orders</span>
                                <?php
                                $status = 'Delivered';
                                $ret = mysqli_query($con, "SELECT * FROM Orders where orderStatus!='$status' || orderStatus is null ");
                                $num = mysqli_num_rows($ret); { ?>
                                <b class=" label  rounded-5  d-flex align-items-center justify-content-center  pb-1 bg-info"
                                    style="  height: 20px;width: 20px;background-color: #000;   color: #fff; font-weight: 400; background: #0dcaf0 !important ;   "><?php echo htmlentities($num); ?></b>
                                <?php } ?>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link rounded-5  text-black bg-transparent" href="packed-orders.php">
                                <span class="item-name text-uppercase text-black">Packed Orders</span>
                                <?php
                                $status = 'Packed';
                                $rt = mysqli_query($con, "SELECT * FROM Orders where orderStatus='$status'");
                                $num1 = mysqli_num_rows($rt); { ?>
                                <b class=" label  rounded-5  d-flex align-items-center justify-content-center  pb-1 bg-info"
                                    style="  height: 20px;width: 20px;background-color: #000;   color: #fff;font-weight: 400;  background: #0dcaf0 !important ;   "><?php echo htmlentities($num1); ?></b>
                                <?php } ?>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link rounded-5  text-black bg-transparent" href="Dispatched-orders.php">
                                <span class="item-name text-uppercase text-black">Dispatched Orders</span>
                                <?php
                                $status = 'Dispatched';
                                $rt = mysqli_query($con, "SELECT * FROM Orders where orderStatus='$status'");
                                $num1 = mysqli_num_rows($rt); { ?>
                                <b class=" label  rounded-5  d-flex align-items-center justify-content-center  pb-1 bg-info"
                                    style="  height: 20px;width: 20px;background-color: #000;   color: #fff;font-weight: 400;  background: #0dcaf0 !important ;   "><?php echo htmlentities($num1); ?></b>
                                <?php } ?>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link rounded-5  text-black bg-transparent" href="intransit-orders.php">
                                <span class="item-name text-uppercase text-black">In Transit Orders</span>
                                <?php
                                $status = 'In Transit';
                                $rt = mysqli_query($con, "SELECT * FROM Orders where orderStatus='$status'");
                                $num1 = mysqli_num_rows($rt); { ?>
                                <b class=" label  rounded-5  d-flex align-items-center justify-content-center  pb-1 bg-info"
                                    style="  height: 20px;width: 20px;background-color: #000;   color: #fff;font-weight: 400;  background: #0dcaf0 !important ;   "><?php echo htmlentities($num1); ?></b>
                                <?php } ?>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link rounded-5  text-black bg-transparent" href="OutForDelivery-orders.php">
                                <span class="item-name text-uppercase text-black">Out For Delivery <br> Orders</span>
                                <?php
                                $status = 'Out For Delivery';
                                $rt = mysqli_query($con, "SELECT * FROM Orders where orderStatus='$status'");
                                $num1 = mysqli_num_rows($rt); { ?>
                                <b class=" label  rounded-5  d-flex align-items-center justify-content-center  pb-1 bg-info"
                                    style="  height: 20px;width: 20px;background-color: #000;   color: #fff;font-weight: 400;  background: #0dcaf0 !important ;   "><?php echo htmlentities($num1); ?></b>
                                <?php } ?>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link rounded-5  text-black bg-transparent" href="delivered-orders.php">
                                <span class="item-name text-uppercase text-black">Delivered Orders</span>
                                <?php
                                $status = 'Delivered';
                                $rt = mysqli_query($con, "SELECT * FROM Orders where orderStatus='$status'");
                                $num1 = mysqli_num_rows($rt); { ?>
                                <b class=" label  rounded-5  d-flex align-items-center justify-content-center  pb-1 bg-info"
                                    style="  height: 20px;width: 20px;background-color: #000;   color: #fff;font-weight: 400;  background: #0dcaf0 !important ;   "><?php echo htmlentities($num1); ?></b>
                                <?php } ?>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link rounded-5  text-black bg-transparent" href="cancelled-orders.php">
                                <span class="item-name text-uppercase text-black">cancelled Orders</span>
                                <?php
                                $status = 'Cancelled';
                                $rt = mysqli_query($con, "SELECT * FROM Orders where orderStatus='$status'");
                                $num1 = mysqli_num_rows($rt); { ?>
                                <b class=" label  rounded-5  d-flex align-items-center justify-content-center  pb-1 bg-info"
                                    style="  height: 20px;width: 20px;background-color: #000;   color: #fff;font-weight: 400;  background: #0dcaf0 !important ;   "><?php echo htmlentities($num1); ?></b>
                                <?php } ?>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link rounded-5  text-black bg-transparent" href="return-order.php">
                                <span class="item-name text-uppercase text-black">Return Orders</span>
                                <?php
                                $status = 'return order';
                                $rt = mysqli_query($con, "SELECT * FROM Orders where orderStatus='$status'");
                                $num1 = mysqli_num_rows($rt); { ?>
                                <b class=" label  rounded-5  d-flex align-items-center justify-content-center  pb-1 bg-info"
                                    style="  height: 20px;width: 20px;background-color: #000;   color: #fff;font-weight: 400;  background: #0dcaf0 !important ;   "><?php echo htmlentities($num1); ?></b>
                                <?php } ?>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item ">
                    <a class="nav-link rounded-5  text-black bg-transparent" href="manage-users.php">
                        <i class="icon">





                            <svg class="color" width="30" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.8877 10.8967C19.2827 10.7007 20.3567 9.50473 20.3597 8.05573C20.3597 6.62773 19.3187 5.44373 17.9537 5.21973"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path
                                    d="M19.7285 14.2505C21.0795 14.4525 22.0225 14.9255 22.0225 15.9005C22.0225 16.5715 21.5785 17.0075 20.8605 17.2815"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.8867 14.6638C8.67273 14.6638 5.92773 15.1508 5.92773 17.0958C5.92773 19.0398 8.65573 19.5408 11.8867 19.5408C15.1007 19.5408 17.8447 19.0588 17.8447 17.1128C17.8447 15.1668 15.1177 14.6638 11.8867 14.6638Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.8869 11.888C13.9959 11.888 15.7059 10.179 15.7059 8.069C15.7059 5.96 13.9959 4.25 11.8869 4.25C9.7779 4.25 8.0679 5.96 8.0679 8.069C8.0599 10.171 9.7569 11.881 11.8589 11.888H11.8869Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path
                                    d="M5.88509 10.8967C4.48909 10.7007 3.41609 9.50473 3.41309 8.05573C3.41309 6.62773 4.45409 5.44373 5.81909 5.21973"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path
                                    d="M4.044 14.2505C2.693 14.4525 1.75 14.9255 1.75 15.9005C1.75 16.5715 2.194 17.0075 2.912 17.2815"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </i>

                        <span class="item-name text-uppercase text-black">Manage users</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link rounded-5  text-black bg-transparent" href="category.php">
                        <i class="icon">

                            <svg class="color" width="30" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.0001 8.32739V15.6537" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M15.6668 11.9904H8.3335" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M16.6857 2H7.31429C4.04762 2 2 4.31208 2 7.58516V16.4148C2 19.6879 4.0381 22 7.31429 22H16.6857C19.9619 22 22 19.6879 22 16.4148V7.58516C22 4.31208 19.9619 2 16.6857 2Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>

                        </i>
                        <span class="item-name text-uppercase text-black">Create Category</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link rounded-5  text-black bg-transparent" href="subcategory.php">
                        <i class="icon">

                            <svg class="color" width="30" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M14.7366 2.76175H8.08455C6.00455 2.75375 4.29955 4.41075 4.25055 6.49075V17.3397C4.21555 19.3897 5.84855 21.0807 7.89955 21.1167C7.96055 21.1167 8.02255 21.1167 8.08455 21.1147H16.0726C18.1416 21.0937 19.8056 19.4087 19.8026 17.3397V8.03975L14.7366 2.76175Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M14.4741 2.75V5.659C14.4741 7.079 15.6231 8.23 17.0431 8.234H19.7971"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M14.2936 12.9141H9.39355" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M11.8442 15.3639V10.4639" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </i>
                        <span class="item-name text-uppercase text-black">Sub Category</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link rounded-5  text-black bg-transparent" href="insert-product.php">
                        <i class="icon">


                            <svg class="color" width="30" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M16.3025 2.74976H7.65051C4.63851 2.74976 2.74951 4.88376 2.74951 7.90376V16.0498C2.74951 19.0698 4.63051 21.2038 7.65051 21.2038H16.2975C19.3225 21.2038 21.2025 19.0698 21.2025 16.0498V7.90376C21.2065 4.88376 19.3255 2.74976 16.3025 2.74976Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10.7027 8.78496C10.7027 9.80496 9.87674 10.631 8.85674 10.631C7.83774 10.631 7.01074 9.80496 7.01074 8.78496C7.01074 7.76496 7.83774 6.93896 8.85674 6.93896C9.87574 6.93996 10.7017 7.76596 10.7027 8.78496Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path
                                    d="M21.207 14.951C20.284 14.001 18.509 12.082 16.579 12.082C14.648 12.082 13.535 16.315 11.678 16.315C9.821 16.315 8.134 14.401 6.646 15.628C5.158 16.854 3.75 19.361 3.75 19.361"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </i>
                        <span class="item-name text-uppercase text-black">Insert Product</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link rounded-5  text-black bg-transparent" href="manage-products.php">
                        <i class="icon">


                            <svg class="color" width="30" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.7161 16.2234H8.49609" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M15.7161 12.0369H8.49609" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M11.2521 7.86011H8.49707" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.909 2.74976C15.909 2.74976 8.23198 2.75376 8.21998 2.75376C5.45998 2.77076 3.75098 4.58676 3.75098 7.35676V16.5528C3.75098 19.3368 5.47298 21.1598 8.25698 21.1598C8.25698 21.1598 15.933 21.1568 15.946 21.1568C18.706 21.1398 20.416 19.3228 20.416 16.5528V7.35676C20.416 4.57276 18.693 2.74976 15.909 2.74976Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </i>
                        <span class="item-name text-uppercase text-black">Manage Products</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link rounded-5  text-black bg-transparent" href="payments.php">
                        <i class="icon">
                            <svg class="color" width="30" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21.6389 14.3957H17.5906C16.1042 14.3948 14.8993 13.1909 14.8984 11.7045C14.8984 10.218 16.1042 9.01409 17.5906 9.01318H21.6389"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M18.049 11.6429H17.7373" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.74766 3H16.3911C19.2892 3 21.6388 5.34951 21.6388 8.24766V15.4247C21.6388 18.3229 19.2892 20.6724 16.3911 20.6724H7.74766C4.84951 20.6724 2.5 18.3229 2.5 15.4247V8.24766C2.5 5.34951 4.84951 3 7.74766 3Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M7.03516 7.5382H12.4341" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </i>
                        <span class="item-name text-uppercase text-black">Manage Payments </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link rounded-5  text-black bg-transparent" href="chatbot.php">
                        <i class="icon">
                            <svg class="color" width="35" viewBox="-0.5 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M14.665 9.605H2.995C2.715 9.605 2.495 9.825 2.495 10.105V15.265C2.495 15.545 2.715 15.765 2.995 15.765H4.495V18.505L7.16501 15.765H14.665C14.945 15.765 15.165 15.545 15.165 15.265V10.105C15.165 9.825 14.935 9.605 14.665 9.605Z"
                                        stroke="#0F0F0F" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path d="M15.175 12.655H15.165" stroke="#0F0F0F" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path
                                        d="M8.83496 7.575V6.995C8.83496 6.715 9.05496 6.495 9.33496 6.495H21.005C21.275 6.495 21.505 6.715 21.505 6.995V12.325C21.505 12.505 21.365 12.655 21.185 12.655H19.505"
                                        stroke="#0F0F0F" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path d="M8.83496 9.605V9.575" stroke="#0F0F0F" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M19.505 12.655V15.385L16.835 12.655" stroke="#0F0F0F"
                                        stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </i>
                        <span class="item-name text-uppercase text-black">Manage Chatbot </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link rounded-5  text-black bg-transparent" href="feedback.php">
                        <i class="icon">
                            <svg class="color" width="30" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.7476 20.4428H21.0002" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12.78 3.79479C13.5557 2.86779 14.95 2.73186 15.8962 3.49173C15.9485 3.53296 17.6295 4.83879 17.6295 4.83879C18.669 5.46719 18.992 6.80311 18.3494 7.82259C18.3153 7.87718 8.81195 19.7645 8.81195 19.7645C8.49578 20.1589 8.01583 20.3918 7.50291 20.3973L3.86353 20.443L3.04353 16.9723C2.92866 16.4843 3.04353 15.9718 3.3597 15.5773L12.78 3.79479Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M11.021 6.00098L16.4732 10.1881" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </i>
                        <span class="item-name text-uppercase text-black">Manage Feedback </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link rounded-5  text-black bg-transparent" href="contactUs.php">
                        <i class="icon">
                            <svg class="color" width="30" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M19.0714 19.0699C16.0152 22.1263 11.4898 22.7867 7.78642 21.074C7.23971 20.8539 6.79148 20.676 6.36537 20.676C5.17849 20.683 3.70117 21.8339 2.93336 21.067C2.16555 20.2991 3.31726 18.8206 3.31726 17.6266C3.31726 17.2004 3.14642 16.7602 2.92632 16.2124C1.21283 12.5096 1.87411 7.98269 4.93026 4.92721C8.8316 1.02443 15.17 1.02443 19.0714 4.9262C22.9797 8.83501 22.9727 15.1681 19.0714 19.0699Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M15.9393 12.4131H15.9483" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M11.9306 12.4131H11.9396" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M7.92128 12.4131H7.93028" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </i>
                        <span class="item-name text-uppercase text-black">Manage Contact </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link rounded-5  text-black bg-transparent" href="newsletter.php">
                        <i class="icon">
                            <svg class="color" width="30" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.9028 8.85107L13.4596 12.4641C12.6201 13.1301 11.4389 13.1301 10.5994 12.4641L6.11865 8.85107"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M16.9089 21C19.9502 21.0084 22 18.5095 22 15.4384V8.57001C22 5.49883 19.9502 3 16.9089 3H7.09114C4.04979 3 2 5.49883 2 8.57001V15.4384C2 18.5095 4.04979 21.0084 7.09114 21H16.9089Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </i>
                        <span class="item-name text-uppercase text-black">Manage Newsletter </span>
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link rounded-5  text-black bg-transparent" href="review.php">
                        <i class="icon">
                            <svg class="color" width="30" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.1043 4.17701L14.9317 7.82776C15.1108 8.18616 15.4565 8.43467 15.8573 8.49218L19.9453 9.08062C20.9554 9.22644 21.3573 10.4505 20.6263 11.1519L17.6702 13.9924C17.3797 14.2718 17.2474 14.6733 17.3162 15.0676L18.0138 19.0778C18.1856 20.0698 17.1298 20.8267 16.227 20.3574L12.5732 18.4627C12.215 18.2768 11.786 18.2768 11.4268 18.4627L7.773 20.3574C6.87023 20.8267 5.81439 20.0698 5.98724 19.0778L6.68385 15.0676C6.75257 14.6733 6.62033 14.2718 6.32982 13.9924L3.37368 11.1519C2.64272 10.4505 3.04464 9.22644 4.05466 9.08062L8.14265 8.49218C8.54354 8.43467 8.89028 8.18616 9.06937 7.82776L10.8957 4.17701C11.3477 3.27433 12.6523 3.27433 13.1043 4.17701Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>

                        </i>
                        <span class="item-name text-uppercase text-black">Manage Reviews </span>
                    </a>
                </li>
                <li class="nav-item text-black "
                    style="background: transparent !important ;color: black !important ;box-shadow: none !important ;   ">
                    <a class="nav-link text-black" data-bs-toggle="collapse" href="#horizontal-menu2" role="button"
                        aria-expanded="false" aria-controls="horizontal-menu2"
                        style="background: transparent !important ; color: black !important ;box-shadow: none !important ;  ">
                        <i class="icon text-black">
                            <svg width="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.33 16.5928H4.0293" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M13.1406 6.90042H19.4413" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.72629 6.84625C8.72629 5.5506 7.66813 4.5 6.36314 4.5C5.05816 4.5 4 5.5506 4 6.84625C4 8.14191 5.05816 9.19251 6.36314 9.19251C7.66813 9.19251 8.72629 8.14191 8.72629 6.84625Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20.0002 16.5538C20.0002 15.2581 18.9429 14.2075 17.6379 14.2075C16.3321 14.2075 15.2739 15.2581 15.2739 16.5538C15.2739 17.8494 16.3321 18.9 17.6379 18.9C18.9429 18.9 20.0002 17.8494 20.0002 16.5538Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </i>
                        <span class="item-name text-uppercase text-black">Report</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="horizontal-menu2" data-bs-parent="#sidebar-menu">
                        <li class="nav-item ">
                            <a class="nav-link rounded-5  text-black bg-transparent" href="review.php">
                                <i class="icon">
                                    <svg class="color" width="30" xmlns="http://www.w3.org/2000/svg" width="25px"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                    </svg>
                                </i>
                                <span class="item-name text-uppercase text-black">sales Report </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link rounded-5  text-black bg-transparent" href="review.php">
                                <i class="icon">
                                    <svg class="color" width="30" width="20px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M21.4 11.6L12.4 2.6C12 2.2 11.5 2 11 2H4C2.9 2 2 2.9 2 4V11C2 11.5 2.2 12 2.6 12.4L11.6 21.4C12 21.8 12.5 22 13 22C13.5 22 14 21.8 14.4 21.4L21.4 14.4C21.8 14 22 13.5 22 13C22 12.5 21.8 12 21.4 11.6M13 20L4 11V4H11L20 13M6.5 5C7.3 5 8 5.7 8 6.5S7.3 8 6.5 8 5 7.3 5 6.5 5.7 5 6.5 5M10.1 8.9L11.5 7.5L17 13L15.6 14.4L10.1 8.9M7.6 11.4L9 10L13 14L11.6 15.4L7.6 11.4Z" />
                                    </svg>
                                </i>
                                <span class="item-name text-uppercase text-black">Manage Stock </span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item ">
                    <a class="nav-link rounded-5  text-black bg-transparent" href="user-logs.php">
                        <i class="icon">

                            <svg class="color" width="30" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.9849 15.3462C8.11731 15.3462 4.81445 15.931 4.81445 18.2729C4.81445 20.6148 8.09636 21.2205 11.9849 21.2205C15.8525 21.2205 19.1545 20.6348 19.1545 18.2938C19.1545 15.9529 15.8735 15.3462 11.9849 15.3462Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.9849 12.0059C14.523 12.0059 16.5801 9.94779 16.5801 7.40969C16.5801 4.8716 14.523 2.81445 11.9849 2.81445C9.44679 2.81445 7.3887 4.8716 7.3887 7.40969C7.38013 9.93922 9.42394 11.9973 11.9525 12.0059H11.9849Z"
                                    stroke="currentColor" stroke-width="1.42857" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </i>
                        <span class="item-name text-uppercase text-black">User Login Log</span>
                    </a>
                </li>
                <hr style="border: 1px solid black;">
                <li class="nav-item ">
                    <a class="nav-link rounded-5  text-black bg-transparent" href="change-password.php">
                        <i class="icon">

                            <svg class="color" width="30" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.9849 15.3462C8.11731 15.3462 4.81445 15.931 4.81445 18.2729C4.81445 20.6148 8.09636 21.2205 11.9849 21.2205C15.8525 21.2205 19.1545 20.6348 19.1545 18.2938C19.1545 15.9529 15.8735 15.3462 11.9849 15.3462Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.9849 12.0059C14.523 12.0059 16.5801 9.94779 16.5801 7.40969C16.5801 4.8716 14.523 2.81445 11.9849 2.81445C9.44679 2.81445 7.3887 4.8716 7.3887 7.40969C7.38013 9.93922 9.42394 11.9973 11.9525 12.0059H11.9849Z"
                                    stroke="currentColor" stroke-width="1.42857" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </i>
                        <span class="item-name text-uppercase text-black">Change Password</span>
                    </a>
                </li>
                <li class=" nav-item  ">
                    <a class=" nav-link rounded-5 text-white bg-black logOut" href="logout.php">
                        <i class="icon">

                            <svg class="color" width="30" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.016 7.38948V6.45648C15.016 4.42148 13.366 2.77148 11.331 2.77148H6.45597C4.42197 2.77148 2.77197 4.42148 2.77197 6.45648V17.5865C2.77197 19.6215 4.42197 21.2715 6.45597 21.2715H11.341C13.37 21.2715 15.016 19.6265 15.016 17.5975V16.6545"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round">
                                </path>
                                <path d="M21.8096 12.0215H9.76855" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M18.8813 9.1062L21.8093 12.0212L18.8813 14.9372" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </i>
                        <span class="item-name text-uppercase text-white">Logout</span>
                    </a>
                </li>

            </ul>
            <!-- Sidebar Menu End -->
        </div>
    </div>
    <div class="sidebar-footer"></div>
</aside>