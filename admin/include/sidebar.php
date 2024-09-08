<style>
@import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');
@import url('https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css');
@import url('https: //cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css');

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Raleway', sans-serif;
}

.item-name {
    font-family: 'Raleway', sans-serif;
    font-size: 15px !important;
    font-weight: 600 !important;
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
    font-size: 17px !important;
    color: #000 !important;
    font-weight: 500 !important;
    text-transform: capitalize !important;
}

.control-group input,
.control-group textarea,
.control-group select {
    border: 2px solid gray !important;
    font-family: 'Raleway', sans-serif !important;
    font-size: 15px !important;
    color: #000 !important;
    font-weight: 600 !important;
    padding: 10px 20px !important;
    width: 100% !important;
    height: 60px !important;
    box-shadow: 0 !important;
    border-radius: 10px !important;
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
    border-radius: 10px !important;
    font-family: 'Raleway', sans-serif !important;
    font-weight: 400 !important;
}

.checkout-page-button:hover {
    color: #fff !important;
    border: 1px solid black !important;
}

.centerCard {
    display: flex;
    align-items: center;
    justify-content: center;
}

.centerCard .card {
    border-radius: 10px;
    width: 500px;
    padding: 20px;
}

.centerCard .card .card-body h3 {
    font-size: 30px;
    text-transform: capitalize !important;
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
    background: #f2f3f8 !important;
    padding: 5px;
    border-radius: 50px;
}

.logOut {
    background: #f2f3f8 !important;
}



.logOut:hover {
    box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset !important;
}

.logOut:hover svg {
    background-color: transparent !important;
}
</style>
<aside class="sidebar sidebar-default sidebar-white  sidebar-base navs-rounded-all " style="background:#fff; ">
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
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true" style="background: #0dcaf0;">
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
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon text-capitalize"
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
                        <span class="item-name text-capitalize text-black">Order's</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar-menu">
                        <li class="nav-item mb-1">
                            <a class="nav-link rounded-5  text-black bg-transparent " href="todays-orders.php">
                                <span class="item-name text-capitalize text-black "> Today's Orders </span>
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
                        <li class="nav-item mb-1">
                            <a class="nav-link rounded-5  text-black bg-transparent" href="pending-orders.php">

                                <span class="item-name text-capitalize text-black">Pending Orders</span>
                                <?php
                                $status = 'Delivered';
                                $ret = mysqli_query($con, "SELECT * FROM Orders where orderStatus!='$status' || orderStatus is null ");
                                $num = mysqli_num_rows($ret); { ?>
                                <b class=" label  rounded-5  d-flex align-items-center justify-content-center  pb-1 bg-info"
                                    style="  height: 20px;width: 20px;background-color: #000;   color: #fff; font-weight: 400; background: #0dcaf0 !important ;   "><?php echo htmlentities($num); ?></b>
                                <?php } ?>
                            </a>
                        </li>
                        <li class="nav-item mb-1">
                            <a class="nav-link rounded-5  text-black bg-transparent" href="delivered-orders.php">
                                <span class="item-name text-capitalize text-black">Delivered Orders</span>
                                <?php
                                $status = 'Delivered';
                                $rt = mysqli_query($con, "SELECT * FROM Orders where orderStatus='$status'");
                                $num1 = mysqli_num_rows($rt); { ?>
                                <b class=" label  rounded-5  d-flex align-items-center justify-content-center  pb-1 bg-info"
                                    style="  height: 20px;width: 20px;background-color: #000;   color: #fff;font-weight: 400;  background: #0dcaf0 !important ;   "><?php echo htmlentities($num1); ?></b>
                                <?php } ?>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <hr class="hr-horizontal">
                </li>
                <!-- <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon text-capitalize  "
                            style="color: #000;font-size: 14px;font-weight: 600; ">Pages</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li> -->
                <li class="nav-item mb-1">
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

                        <span class="item-name text-capitalize text-black">Manage users</span>
                    </a>
                </li>
                <li class="nav-item mb-1">
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
                        <span class="item-name text-capitalize text-black">Create Category</span>
                    </a>
                </li>
                <li class="nav-item mb-1">
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
                        <span class="item-name text-capitalize text-black">Sub Category</span>
                    </a>
                </li>
                <li class="nav-item mb-1">
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
                        <span class="item-name text-capitalize text-black">Insert Product</span>
                    </a>
                </li>
                <li class="nav-item mb-1">
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
                        <span class="item-name text-capitalize text-black">Manage Products</span>
                    </a>
                </li>
                <li class="nav-item mb-1">
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
                        <span class="item-name text-capitalize text-black">User Login Log</span>
                    </a>
                </li>
                <li class="nav-item  mt-5 ">
                    <a class="nav-link rounded-5  text-black bg-white logOut" href="logout.php">
                        <i class="icon">

                            <svg class="color" width="30" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.016 7.38948V6.45648C15.016 4.42148 13.366 2.77148 11.331 2.77148H6.45597C4.42197 2.77148 2.77197 4.42148 2.77197 6.45648V17.5865C2.77197 19.6215 4.42197 21.2715 6.45597 21.2715H11.341C13.37 21.2715 15.016 19.6265 15.016 17.5975V16.6545"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M21.8096 12.0215H9.76855" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M18.8813 9.1062L21.8093 12.0212L18.8813 14.9372" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </i>
                        <span class="item-name text-capitalize text-black">Logout</span>
                    </a>
                </li>

            </ul>
            <!-- Sidebar Menu End -->
        </div>
    </div>
    <div class="sidebar-footer"></div>
</aside>