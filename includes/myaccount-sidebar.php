<div class="myaccoutbtn">
    <button onclick=" openSidebarAct()">
        <span>
            Profile Settings
        </span>
        <svg fill="#000000" width="20px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.949 511.949" xml:space="preserve">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <g>
                    <g>
                        <path
                            d="M386.235,248.308L140.902,2.975c-4.267-4.053-10.987-3.947-15.04,0.213c-3.947,4.16-3.947,10.667,0,14.827l237.76,237.76 l-237.76,237.867c-4.267,4.053-4.373,10.88-0.213,15.04c4.053,4.267,10.88,4.373,15.04,0.213c0.107-0.107,0.213-0.213,0.213-0.213 l245.333-245.333C390.395,259.188,390.395,252.468,386.235,248.308z">
                        </path>
                    </g>
                </g>
            </g>
        </svg>
    </button>
</div>
<div class="overMyAccout" onclick="closeSidebarAct()">

</div>
<div class="col-md-3 sidebar  ">
    <!-- checkout-progress-sidebar -->
    <svg width="20px" viewBox="0 0 24 24" class="bx-x" fill="none" xmlns="http://www.w3.org/2000/svg"
        onclick="closeSidebarAct()">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
            <path d="M6 6L18 18" stroke="#000000" stroke-linecap="round"></path>
            <path d="M18 6L6.00001 18" stroke="#000000" stroke-linecap="round"></path>
        </g>
    </svg>
    <div class="checkout-progress-sidebar ">
        <div class="panel-group">
            <div class="panel ">

                <style>
                @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');



                .sidebar {
                    border-right: 1px solid black;
                    position: sticky !important;
                    top: 20px !important;
                    height: 100vh !important;
                }

                .myaccoutbtn {
                    display: none;
                }

                .myaccoutbtn button {
                    display: flex;
                    align-items: center;
                    border: 0;
                    outline: 0;
                    background: transparent;
                    text-transform: uppercase;
                }

                .myaccoutbtn button i {
                    margin-right: 10px;
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
                    font-family: 'Poppins', sans-serif !important;
                    color: #000 !important;
                    font-weight: 300 !important;
                    text-transform: uppercase !important;
                    font-size: 15px !important;
                    background: #fff !important;
                    color: #000 !important;
                    margin-top: 10px;
                }



                .nav-checkout-progress li a svg {
                    margin: 0;
                    margin-right: 20px;
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

                    .myaccoutbtn {
                        display: block;
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
                        font-family: 'Poppins', sans-serif !important;
                        color: #000 !important;
                        font-weight: 400 !important;
                        text-transform: uppercase !important;
                        font-size: 16px !important;
                        background: #fff !important;
                        color: #000 !important;
                        margin-top: 10px;
                    } */

                    .nav-checkout-progress li a:hover {
                        background: #fff !important;
                    }

                    .profiletitle {
                        display: flex !important;
                        align-items: center !important;
                        justify-content: center !important;
                        text-align: center !important;
                        width: 100% !important;
                        border-bottom: 1px solid black;
                        margin: 0 !important;
                        padding: 0 !important;
                    }

                    .profiletitle a {
                        margin: 0 !important;
                    }
                }

                .profiletitle a {
                    display: flex;
                    align-items: start;
                    justify-content: start;
                    font-family: 'Poppins', sans-serif;
                    color: #000;
                    text-transform: uppercase;
                    background: #fff;
                    color: #000;
                    margin-bottom: 50px;
                }

                .profiletitle .profiletitlelink span {
                    font-family: 'Poppins', sans-serif;
                    font-weight: 300;
                    font-size: 18px;
                    text-transform: uppercase;
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
                                <svg width="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M12.1992 12C14.9606 12 17.1992 9.76142 17.1992 7C17.1992 4.23858 14.9606 2 12.1992 2C9.43779 2 7.19922 4.23858 7.19922 7C7.19922 9.76142 9.43779 12 12.1992 12Z"
                                            stroke="#000000" stroke-width="1" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path
                                            d="M3 22C3.57038 20.0332 4.74796 18.2971 6.3644 17.0399C7.98083 15.7827 9.95335 15.0687 12 15C16.12 15 19.63 17.91 21 22"
                                            stroke="#000000" stroke-width="1" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                                <span>Account Details</span>
                            </a>
                        </li>
                        <li>
                            <a href="bill-ship-addresses.php">
                                <svg width="20px" viewBox=" 0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="">
                                        <path
                                            d="M9 11V6C9 4.34315 10.3431 3 12 3C13.6569 3 15 4.34315 15 6V10.9673M10.4 21H13.6C15.8402 21 16.9603 21 17.816 20.564C18.5686 20.1805 19.1805 19.5686 19.564 18.816C20 17.9603 20 16.8402 20 14.6V12.2C20 11.0799 20 10.5198 19.782 10.092C19.5903 9.71569 19.2843 9.40973 18.908 9.21799C18.4802 9 17.9201 9 16.8 9H7.2C6.0799 9 5.51984 9 5.09202 9.21799C4.71569 9.40973 4.40973 9.71569 4.21799 10.092C4 10.5198 4 11.0799 4 12.2V14.6C4 16.8402 4 17.9603 4.43597 18.816C4.81947 19.5686 5.43139 20.1805 6.18404 20.564C7.03968 21 8.15979 21 10.4 21Z"
                                            stroke="#000000" stroke-width="1"></path>
                                    </g>
                                </svg>
                                <span>
                                    Shipping /
                                    Billing
                                    Address
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="order-history.php">
                                <svg width="20px" viewBox=" 0 0 24 24" role="img" xmlns="http://www.w3.org/2000/svg"
                                    aria-labelledby="historyIconTitle" stroke="#000000" stroke-width="1"
                                    stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title id="historyIconTitle">History</title>
                                        <polyline points="1 12 3 14 5 12"></polyline>
                                        <polyline points="12 7 12 12 15 15"></polyline>
                                        <path
                                            d="M12,21 C16.9705627,21 21,16.9705627 21,12 C21,7.02943725 16.9705627,3 12,3 C7.02943725,3 3,7.02943725 3,12 C3,11.975305 3,12.3086383 3,13">
                                        </path>
                                    </g>
                                </svg> <span>
                                    Order
                                    History
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="pending-orders.php">
                                <svg width="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <rect x="3" y="6" width="18" height="13" rx="2" stroke="#000000"
                                            stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></rect>
                                        <path d="M3 10H20.5" stroke="#000000" stroke-width="1" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M7 15H9" stroke="#000000" stroke-width="1" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                                <span>
                                    Payment
                                    Pending Order
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="track-orders.php">
                                <svg width="20px" fill="#000000" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M2.84375 13C1.285156 13 0 14.285156 0 15.84375L0 42C0 43.660156 1.339844 45 3 45L7.09375 45C7.570313 47.835938 10.035156 50 13 50C15.964844 50 18.429688 47.835938 18.90625 45L28.15625 45C28.894531 45 29.554688 44.6875 30.0625 44.21875C30.582031 44.675781 31.246094 44.992188 32 45L33.09375 45C33.570313 47.835938 36.035156 50 39 50C42.300781 50 45 47.300781 45 44C45 40.699219 42.300781 38 39 38C36.035156 38 33.570313 40.164063 33.09375 43L32 43C31.8125 43 31.527344 42.871094 31.3125 42.65625C31.097656 42.441406 31 42.183594 31 42L31 23C31 22.625 31.625 22 32 22L40 22C40.785156 22 41.890625 22.839844 42.65625 23.75C42.664063 23.761719 42.679688 23.769531 42.6875 23.78125L42.84375 24L38 24C36.40625 24 35 25.289063 35 27L35 31C35 31.832031 35.375 32.5625 35.90625 33.09375C36.4375 33.625 37.167969 34 38 34L48 34L48 42C48 42.375 47.375 43 47 43L45 43L45 45L47 45C48.660156 45 50 43.660156 50 42L50 32.375C50 30.085938 48.40625 28.0625 48.40625 28.0625L48.375 28.0625L44.25 22.5625L44.25 22.53125L44.21875 22.5C43.296875 21.386719 41.914063 20 40 20L32 20C31.644531 20 31.316406 20.074219 31 20.1875L31 15.90625C31 14.371094 29.789063 13 28.1875 13 Z M 2.84375 15L28.1875 15C28.617188 15 29 15.414063 29 15.90625L29 42.15625C29 42.625 28.628906 43 28.15625 43L18.90625 43C18.429688 40.164063 15.964844 38 13 38C10.035156 38 7.570313 40.164063 7.09375 43L3 43C2.625 43 2 42.371094 2 42L2 15.84375C2 15.375 2.367188 15 2.84375 15 Z M 38 26L44.34375 26L46.78125 29.25C46.78125 29.25 47.6875 30.800781 47.875 32L38 32C37.832031 32 37.5625 31.875 37.34375 31.65625C37.125 31.4375 37 31.167969 37 31L37 27C37 26.496094 37.59375 26 38 26 Z M 13 40C15.222656 40 17 41.777344 17 44C17 46.222656 15.222656 48 13 48C10.777344 48 9 46.222656 9 44C9 41.777344 10.777344 40 13 40 Z M 39 40C41.222656 40 43 41.777344 43 44C43 46.222656 41.222656 48 39 48C36.777344 48 35 46.222656 35 44C35 41.777344 36.777344 40 39 40Z">
                                        </path>
                                    </g>
                                </svg>
                                <span>
                                    Track Order
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="logout.php">
                                <svg width="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        <g id="layer1" stroke-linecap="round" stroke-linejoin="round">
                                            <path
                                                d="M 0 1 L 0 20 L 12 20 L 12 16 L 11 16 L 11 19 L 1 19 L 1 2 L 11 2 L 11 5 L 12 5 L 12 1 L 0 1 z M 15 7 L 18 10 L 5 10 L 5 11 L 18 11 L 15 14 L 16.5 14 L 20 10.5 L 16.5 7 L 15 7 z "
                                                style="fill:#222222; fill-opacity:1; stroke:none; stroke-width:1px;">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
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
<style>
.myprofile {
    display: flex;
    align-items: center;
    justify-content: start;
}

.myprofilecard {
    width: 800px;
    padding: 20px;
    margin-top: 1%;
}

@media only screen and (max-width: 500px) {
    .myprofilecard {
        width: 100%;
        padding: 0;
        margin-top: 0;
    }
}

.input-field {
    position: relative;
}



.input-field label {
    position: absolute;
    top: 50%;
    left: 15px;
    transform: translateY(-50%);
    color: #000;
    font-size: 15px;
    pointer-events: none;
    transition: 0.3s;
    text-transform: uppercase;
    font-family: 'Poppins', sans-serif !important;
    font-weight: 400;
}

input:focus {
    border: 2px solid #000;
}

input:focus~label,
input:valid~label {
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

.form-group input,
.form-group textarea {
    border: 2px solid gray !important;
    border: 2px solid gray;
    font-family: 'Poppins', sans-serif !important;
    font-size: 15px;
    color: #000;
    height: 50px;
    border-radius: 8px;
    font-weight: 400;
}

.form-group input:focus,
.form-group textarea:focus {
    border: 2px solid black !important;
}


.form-group input::placeholder,
.form-group textarea::placeholder {
    font-family: 'Poppins', sans-serif !important;
    font-size: 15px;
    color: #000;
    font-weight: 400;
    text-transform: capitalize;
}

.form-group input:focus {
    border: 2px solid black !important;
}

.checkout-page-button {
    background: #000 !important;
    width: 150px !important;
    color: #fff !important;
    border: 1px solid black;
    height: 40px !important;
    border-radius: 0;
    font-size: 13px !important;
    font-family: 'Poppins', sans-serif !important;
    font-weight: 400 !important;
}

.checkout-page-button:hover {
    color: #000;
    border: 1px solid black;
}
</style>
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