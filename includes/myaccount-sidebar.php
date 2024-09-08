<button class="myaccoutbtn">
    <i class='bx bx-menu ' onclick=" openSidebarAct()"></i>

</button>
<div class="overMyAccout" onclick="closeSidebarAct()">

</div>
<div class="col-md-3 sidebar  ">
    <!-- checkout-progress-sidebar -->
    <i class="bx bx-x" onclick="closeSidebarAct()"></i>
    <div class="checkout-progress-sidebar ">
        <div class="panel-group">
            <div class="panel ">

                <style>
                @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');



                .sidebar {
                    position: sticky !important;
                    top: 20px !important;
                    height: 100vh !important;
                }

                .myaccoutbtn {
                    border: 0 !important;
                    outline: 0 !important;
                    background: transparent !important;
                }

                .myaccoutbtn .bx-menu {
                    font-size: 20px !important;
                    color: #000 !important;
                    position: absolute !important;
                    right: 0 !important;
                    border: 0 !important;
                    outline: 0 !important;
                    background: transparent;
                    display: none !important;
                }

                .nav-checkout-progress li a {
                    background: #fff !important;
                }

                .nav-checkout-progress li a:hover {
                    background: #fff !important;
                }

                .sidebar .bx-x {
                    display: none;
                }

                .nav-checkout-progress li a {
                    display: flex !important;
                    align-items: center !important;
                    justify-content: start !important;
                    font-family: 'Raleway', sans-serif !important;
                    color: #000 !important;
                    font-weight: 500 !important;
                    text-transform: capitalize !important;
                    font-size: 18px !important;
                    background: #fff !important;
                    color: #000 !important;
                    margin-top: 10px;
                }



                .nav-checkout-progress li a i {
                    margin-right: 20px;
                    font-size: 24px;
                }

                @media only screen and (max-width: 1000px) {
                    .sidebar {
                        z-index: 9999999999999999999999999 !important;
                        position: fixed !important;
                        width: 400px !important;
                        top: 0 !important;
                        left: -100%;
                        display: block;
                        background: white;
                        height: 100vh !important;
                        transition: all 0.5s linear;
                    }

                    .overMyAccout {
                        position: fixed;
                        background: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5));
                        z-index: 99999;
                        left: -100%;
                        top: 0;
                        width: 100%;
                        height: 100%;
                    }

                    .myaccoutbtn .bx-menu {
                        display: block !important;
                    }

                    .sidebar .bx-x {
                        display: block;
                        position: absolute;
                        top: 10px;
                        font-size: 30px;
                        right: 10px;
                        color: #000;
                    }

                    .nav-checkout-progress {
                        margin-top: 30px;
                    }


                    /* .nav-checkout-progress li a {
                        font-family: 'Raleway', sans-serif !important;
                        color: #000 !important;
                        font-weight: 500 !important;
                        text-transform: uppercase !important;
                        font-size: 16px !important;
                        background: #fff !important;
                        color: #000 !important;
                        margin-top: 10px;
                    } */

                    .nav-checkout-progress li a:hover {
                        background: #fff !important;
                    }
                }

                .profiletitle .profiletitlelink {
                    display: flex !important;
                    align-items: start !important;
                    justify-content: start !important;
                    font-family: 'Raleway', sans-serif !important;
                    color: #000 !important;
                    font-weight: 500 !important;
                    text-transform: capitalize !important;
                    font-size: 30px !important;
                    background: #fff !important;
                    color: #000 !important;
                    margin-bottom: 50px !important;
                }
                </style>
                <div class="panel-body">
                    <ul class="nav nav-checkout-progress list-unstyled ">

                        <li class="profiletitle">
                            <a class="profiletitlelink">
                                <span>Profile Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href=" my-account.php">
                                <i class='bx bx-user'></i>
                                <span>Account Details</span>
                            </a>
                        </li>
                        <li>
                            <a href="bill-ship-addresses.php">
                                <i class='bx bx-shopping-bag'></i>
                                <span>
                                    Shipping /
                                    Billing
                                    Address
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="order-history.php">
                                <i class='bx bx-carousel'></i> <span>
                                    Order
                                    History
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="pending-orders.php">
                                <i class='bx bx-rotate-left'></i>
                                <span>
                                    Payment
                                    Pending Order
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="track-orders.php">
                                <i class='bx bx-right-top-arrow-circle'></i>
                                <span>
                                    Track Order
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="logout.php">
                                <i class='bx bx-arrow-from-left'></i>
                                <span>
                                    Sign Out
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-progress-sidebar -->
</div>
<script>
function openSidebarAct() {
    document.querySelector(".sidebar").style.left = "0";
    document.querySelector(".overMyAccout").style.left = "0";

}

function closeSidebarAct() {
    document.querySelector(".sidebar").style.left = "-100%";
    document.querySelector(".overMyAccout").style.left = "-100%";
}
</script>