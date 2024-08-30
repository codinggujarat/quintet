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

    font-size: 13px !important;
    font-weight: 600 !important;
}
</style>
<aside class="sidebar sidebar-default sidebar-white  sidebar-base navs-rounded-all m-lg-3"
    style="border-radius: 30px;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
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
                    <img src="./images/quintet.jpg" alt="logo" class="nav-avatar m-0 p-0">
                </div>
                <div class="logo-mini ">
                    <img src="./images/q.png" alt="logo" class="nav-avatar m-0 p-0">
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
                        <span class="default-icon text-uppercase"
                            style="color: #000;font-size: 14px;font-weight: 600; ">order's
                            management</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>
                <li class="nav-item text-black "
                    style="background: transparent !important ;color: black !important ;box-shadow: none !important ;   ">
                    <a class="nav-link text-info" data-bs-toggle="collapse" href="#horizontal-menu" role="button"
                        aria-expanded="false" aria-controls="horizontal-menu"
                        style="background: transparent !important ; color: black !important ;box-shadow: none !important ;  ">
                        <i class="icon text-info">
                            <svg width="23" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.87774 6.37856C8.87774 8.24523 7.33886 9.75821 5.43887 9.75821C3.53999 9.75821 2 8.24523 2 6.37856C2 4.51298 3.53999 3 5.43887 3C7.33886 3 8.87774 4.51298 8.87774 6.37856ZM20.4933 4.89833C21.3244 4.89833 22 5.56203 22 6.37856C22 7.19618 21.3244 7.85989 20.4933 7.85989H13.9178C13.0856 7.85989 12.4101 7.19618 12.4101 6.37856C12.4101 5.56203 13.0856 4.89833 13.9178 4.89833H20.4933ZM3.50777 15.958H10.0833C10.9155 15.958 11.5911 16.6217 11.5911 17.4393C11.5911 18.2558 10.9155 18.9206 10.0833 18.9206H3.50777C2.67555 18.9206 2 18.2558 2 17.4393C2 16.6217 2.67555 15.958 3.50777 15.958ZM18.5611 20.7778C20.4611 20.7778 22 19.2648 22 17.3992C22 15.5325 20.4611 14.0196 18.5611 14.0196C16.6623 14.0196 15.1223 15.5325 15.1223 17.3992C15.1223 19.2648 16.6623 20.7778 18.5611 20.7778Z"
                                    fill="#0dcaf0"></path>
                            </svg>
                        </i>
                        <span class="item-name text-uppercase text-black">Order's</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar-menu">
                        <li class="nav-item mb-1">
                            <a class="nav-link rounded-5  text-info bg-transparent " href="todays-orders.php">
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
                        <li class="nav-item mb-1">
                            <a class="nav-link rounded-5  text-info bg-transparent" href="pending-orders.php">

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
                        <li class="nav-item mb-1">
                            <a class="nav-link rounded-5  text-info bg-transparent" href="delivered-orders.php">
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
                    </ul>
                </li>

                <li>
                    <hr class="hr-horizontal">
                </li>
                <!-- <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon text-uppercase  "
                            style="color: #000;font-size: 14px;font-weight: 600; ">Pages</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li> -->
                <li class="nav-item mb-1">
                    <a class="nav-link rounded-5  text-info bg-transparent" href="manage-users.php">
                        <i class="icon">




                            <svg class="color" width="23" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M16.1583 8.23285C16.1583 10.5825 14.2851 12.4666 11.949 12.4666C9.61292 12.4666 7.73974 10.5825 7.73974 8.23285C7.73974 5.88227 9.61292 4 11.949 4C14.2851 4 16.1583 5.88227 16.1583 8.23285ZM11.949 20C8.51785 20 5.58809 19.456 5.58809 17.2802C5.58809 15.1034 8.49904 14.5396 11.949 14.5396C15.3802 14.5396 18.31 15.0836 18.31 17.2604C18.31 19.4362 15.399 20 11.949 20ZM17.9571 8.30922C17.9571 9.50703 17.5998 10.6229 16.973 11.5505C16.9086 11.646 16.9659 11.7748 17.0796 11.7946C17.2363 11.8216 17.3984 11.8369 17.5631 11.8414C19.2062 11.8846 20.6809 10.821 21.0883 9.21974C21.6918 6.84123 19.9198 4.7059 17.6634 4.7059C17.4181 4.7059 17.1835 4.73201 16.9551 4.77884C16.9238 4.78605 16.8907 4.80046 16.8728 4.82838C16.8513 4.8626 16.8674 4.90853 16.8889 4.93825C17.5667 5.8938 17.9571 7.05918 17.9571 8.30922ZM20.6782 13.5126C21.7823 13.7296 22.5084 14.1727 22.8093 14.8166C23.0636 15.3453 23.0636 15.9586 22.8093 16.4864C22.349 17.4851 20.8654 17.8058 20.2887 17.8886C20.1696 17.9066 20.0738 17.8031 20.0864 17.6833C20.3809 14.9157 18.0377 13.6035 17.4315 13.3018C17.4055 13.2883 17.4002 13.2676 17.4028 13.255C17.4046 13.246 17.4154 13.2316 17.4351 13.2289C18.7468 13.2046 20.1571 13.3847 20.6782 13.5126ZM6.43711 11.8413C6.60186 11.8368 6.76304 11.8224 6.92063 11.7945C7.03434 11.7747 7.09165 11.6459 7.02718 11.5504C6.4004 10.6228 6.04313 9.50694 6.04313 8.30913C6.04313 7.05909 6.43353 5.89371 7.11135 4.93816C7.13284 4.90844 7.14806 4.86251 7.12746 4.82829C7.10956 4.80127 7.07553 4.78596 7.04509 4.77875C6.81586 4.73192 6.58127 4.70581 6.33593 4.70581C4.07951 4.70581 2.30751 6.84114 2.91191 9.21965C3.31932 10.8209 4.79405 11.8845 6.43711 11.8413ZM6.59694 13.2545C6.59962 13.268 6.59425 13.2878 6.56918 13.3022C5.9621 13.6039 3.61883 14.9161 3.91342 17.6827C3.92595 17.8034 3.83104 17.9061 3.71195 17.889C3.13531 17.8061 1.65163 17.4855 1.19139 16.4867C0.936203 15.9581 0.936203 15.3457 1.19139 14.817C1.49225 14.1731 2.21752 13.73 3.32156 13.512C3.84358 13.385 5.25294 13.2049 6.5656 13.2292C6.5853 13.2319 6.59515 13.2464 6.59694 13.2545Z"
                                    fill="#0dcaf0" />
                            </svg>


                        </i>

                        <span class="item-name text-uppercase text-black">Manage users</span>
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a class="nav-link rounded-5  text-info bg-transparent" href="category.php">
                        <i class="icon">
                            <svg class="color" width="23" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.33 2H16.66C20.06 2 22 3.92 22 7.33V16.67C22 20.06 20.07 22 16.67 22H7.33C3.92 22 2 20.06 2 16.67V7.33C2 3.92 3.92 2 7.33 2ZM12.82 12.83H15.66C16.12 12.82 16.49 12.45 16.49 11.99C16.49 11.53 16.12 11.16 15.66 11.16H12.82V8.34C12.82 7.88 12.45 7.51 11.99 7.51C11.53 7.51 11.16 7.88 11.16 8.34V11.16H8.33C8.11 11.16 7.9 11.25 7.74 11.4C7.59 11.56 7.5 11.769 7.5 11.99C7.5 12.45 7.87 12.82 8.33 12.83H11.16V15.66C11.16 16.12 11.53 16.49 11.99 16.49C12.45 16.49 12.82 16.12 12.82 15.66V12.83Z"
                                    fill="#0dcaf0"></path>
                            </svg>
                        </i>
                        <span class="item-name text-uppercase text-black">Create Category</span>
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a class="nav-link rounded-5  text-info bg-transparent" href="subcategory.php">
                        <i class="icon">

                            <svg class="color" width="23" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12.5495 13.73H14.2624C14.6683 13.73 15.005 13.4 15.005 12.99C15.005 12.57 14.6683 12.24 14.2624 12.24H12.5495V10.51C12.5495 10.1 12.2228 9.77 11.8168 9.77C11.4109 9.77 11.0743 10.1 11.0743 10.51V12.24H9.37129C8.96535 12.24 8.62871 12.57 8.62871 12.99C8.62871 13.4 8.96535 13.73 9.37129 13.73H11.0743V15.46C11.0743 15.87 11.4109 16.2 11.8168 16.2C12.2228 16.2 12.5495 15.87 12.5495 15.46V13.73ZM19.3381 9.02561C19.5708 9.02292 19.8242 9.02 20.0545 9.02C20.302 9.02 20.5 9.22 20.5 9.47V17.51C20.5 19.99 18.5099 22 16.0446 22H8.17327C5.59901 22 3.5 19.89 3.5 17.29V6.51C3.5 4.03 5.5 2 7.96535 2H13.2525C13.5099 2 13.7079 2.21 13.7079 2.46V5.68C13.7079 7.51 15.203 9.01 17.0149 9.02C17.4381 9.02 17.8112 9.02316 18.1377 9.02593C18.3917 9.02809 18.6175 9.03 18.8168 9.03C18.9578 9.03 19.1405 9.02789 19.3381 9.02561ZM19.61 7.5662C18.7961 7.5692 17.8367 7.5662 17.1466 7.5592C16.0516 7.5592 15.1496 6.6482 15.1496 5.5422V2.9062C15.1496 2.4752 15.6674 2.2612 15.9635 2.5722C16.4995 3.1351 17.2361 3.90891 17.9693 4.67913C18.7002 5.44689 19.4277 6.21108 19.9496 6.7592C20.2387 7.0622 20.0268 7.5652 19.61 7.5662Z"
                                    fill="#0dcaf0"></path>
                            </svg>
                        </i>
                        <span class="item-name text-uppercase text-black">Sub Category</span>
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a class="nav-link rounded-5  text-info bg-transparent" href="insert-product.php">
                        <i class="icon">

                            <svg class="color" width="23" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.66618 22H16.3328C19.7231 22 22 19.6219 22 16.0833V7.91672C22 4.37811 19.7231 2 16.3338 2H7.66618C4.2769 2 2 4.37811 2 7.91672V16.0833C2 19.6219 4.2769 22 7.66618 22ZM8.49886 11C7.12021 11 6 9.87827 6 8.5C6 7.12173 7.12021 6 8.49886 6C9.8765 6 10.9977 7.12173 10.9977 8.5C10.9977 9.87827 9.8765 11 8.49886 11ZM19.8208 14.934C20.1557 15.7926 19.9817 16.8246 19.6237 17.6749C19.1994 18.6863 18.3869 19.452 17.3632 19.7864C16.9087 19.935 16.432 20 15.9564 20H7.52864C6.68999 20 5.94788 19.7988 5.3395 19.4241C4.95839 19.1889 4.89102 18.646 5.17358 18.2941C5.6462 17.7059 6.11279 17.1156 6.5834 16.5201C7.48038 15.3808 8.08473 15.0506 8.75645 15.3406C9.02896 15.4603 9.30248 15.6398 9.58404 15.8297C10.3342 16.3395 11.377 17.0402 12.7506 16.2797C13.6906 15.7532 14.2358 14.8501 14.7106 14.0637L14.7185 14.0506C14.7522 13.9954 14.7855 13.9402 14.8187 13.8852C14.9783 13.6212 15.1357 13.3607 15.3138 13.1207C15.5371 12.8204 16.3646 11.8813 17.4366 12.5501C18.1194 12.9711 18.6936 13.5408 19.308 14.1507C19.5423 14.3839 19.7092 14.6491 19.8208 14.934Z"
                                    fill="#0dcaf0"></path>
                            </svg>
                        </i>
                        <span class="item-name text-uppercase text-black">Insert Product</span>
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a class="nav-link rounded-5  text-info bg-transparent" href="manage-products.php">
                        <i class="icon">

                            <svg class="color" width="23" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.81 2H16.191C19.28 2 21 3.78 21 6.83V17.16C21 20.26 19.28 22 16.191 22H7.81C4.77 22 3 20.26 3 17.16V6.83C3 3.78 4.77 2 7.81 2ZM8.08 6.66V6.65H11.069C11.5 6.65 11.85 7 11.85 7.429C11.85 7.87 11.5 8.22 11.069 8.22H8.08C7.649 8.22 7.3 7.87 7.3 7.44C7.3 7.01 7.649 6.66 8.08 6.66ZM8.08 12.74H15.92C16.35 12.74 16.7 12.39 16.7 11.96C16.7 11.53 16.35 11.179 15.92 11.179H8.08C7.649 11.179 7.3 11.53 7.3 11.96C7.3 12.39 7.649 12.74 8.08 12.74ZM8.08 17.31H15.92C16.319 17.27 16.62 16.929 16.62 16.53C16.62 16.12 16.319 15.78 15.92 15.74H8.08C7.78 15.71 7.49 15.85 7.33 16.11C7.17 16.36 7.17 16.69 7.33 16.95C7.49 17.2 7.78 17.35 8.08 17.31Z"
                                    fill="#0dcaf0"></path>
                            </svg>
                        </i>
                        <span class="item-name text-uppercase text-black">Manage Products</span>
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a class="nav-link rounded-5  text-info bg-transparent" href="user-logs.php">
                        <i class="icon">

                            <svg class="color" width="23" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M17.294 7.29105C17.294 10.2281 14.9391 12.5831 12 12.5831C9.0619 12.5831 6.70601 10.2281 6.70601 7.29105C6.70601 4.35402 9.0619 2 12 2C14.9391 2 17.294 4.35402 17.294 7.29105ZM12 22C7.66237 22 4 21.295 4 18.575C4 15.8539 7.68538 15.1739 12 15.1739C16.3386 15.1739 20 15.8789 20 18.599C20 21.32 16.3146 22 12 22Z"
                                    fill="#0dcaf0"></path>
                            </svg>
                        </i>
                        <span class="item-name text-uppercase text-black">User Login Log</span>
                    </a>
                </li>
                <li class="nav-item  mt-5 ">
                    <a class="nav-link rounded-5  text-info bg-transparent" href="logout.php">
                        <i class="icon">


                            <svg class="color" width="23" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.89535 11.23C9.45785 11.23 9.11192 11.57 9.11192 12C9.11192 12.42 9.45785 12.77 9.89535 12.77H16V17.55C16 20 13.9753 22 11.4724 22H6.51744C4.02471 22 2 20.01 2 17.56V6.45C2 3.99 4.03488 2 6.52762 2H11.4927C13.9753 2 16 3.99 16 6.44V11.23H9.89535ZM19.6302 8.5402L22.5502 11.4502C22.7002 11.6002 22.7802 11.7902 22.7802 12.0002C22.7802 12.2002 22.7002 12.4002 22.5502 12.5402L19.6302 15.4502C19.4802 15.6002 19.2802 15.6802 19.0902 15.6802C18.8902 15.6802 18.6902 15.6002 18.5402 15.4502C18.2402 15.1502 18.2402 14.6602 18.5402 14.3602L20.1402 12.7702H16.0002V11.2302H20.1402L18.5402 9.6402C18.2402 9.3402 18.2402 8.8502 18.5402 8.5502C18.8402 8.2402 19.3302 8.2402 19.6302 8.5402Z"
                                    fill="#0dcaf0"></path>
                            </svg>
                        </i>
                        <span class="item-name text-uppercase text-black">Logout</span>
                    </a>
                </li>

            </ul>
            <!-- Sidebar Menu End -->
        </div>
    </div>
    <div class="sidebar-footer"></div>
</aside>