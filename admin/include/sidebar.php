<div class="span3">
    <div class="sidebar">
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');
        @import url('https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css');
        @import url('https: //cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css');

        .label {
            border-radius: 50% !important;
            background: transparent !important;
            height: 20px !important;
            width: 10px !important;
            display: flex;
            color: #000;
            border: 1px solid black;
            align-items: center;
            justify-content: center;
            font-weight: 300;
        }

        .widget-menu li a {
            background: #f2f3f8 !important;
        }
        </style>
        <ul class="widget widget-menu unstyled">
            <li style="background: #fff !important;">
                <a class="collapsed" data-toggle="collapse" href="#togglePages">
                    <span style="text-transform: uppercase;font-size: 13px; ">Order Management</span>
                    <i class="icon-chevron-down pull-right"></i>
                    <i class="icon-chevron-up pull-right"></i>
                </a>
                <ul id="togglePages" class="collapse unstyled" style="background: #fff !important ;">
                    <li style="background: #fff !important ;">
                        <a href="todays-orders.php" style="color: black;">
                            Today's Orders
                            <?php
                            $f1 = "00:00:00";
                            $from = date('Y-m-d') . " " . $f1;
                            $t1 = "23:59:59";
                            $to = date('Y-m-d') . " " . $t1;
                            $result = mysqli_query($con, "SELECT * FROM Orders where orderDate Between '$from' and '$to'");
                            $num_rows1 = mysqli_num_rows($result); {
                                ?>
                            <b class=" label pull-right"><?php echo htmlentities($num_rows1); ?></b>
                            <?php } ?>
                        </a>
                    </li>
                    <li style="background: #fff !important ;">
                        <a href="pending-orders.php" style="color: black;">
                            Pending Orders
                            <?php
                            $status = 'Delivered';
                            $ret = mysqli_query($con, "SELECT * FROM Orders where orderStatus!='$status' || orderStatus is null ");
                            $num = mysqli_num_rows($ret); { ?><b
                                class="label  pull-right"><?php echo htmlentities($num); ?></b>
                            <?php } ?>
                        </a>
                    </li>
                    <li style="background: #fff !important ;">
                        <a href="delivered-orders.php" style="color: black;">
                            Delivered Orders
                            <?php
                            $status = 'Delivered';
                            $rt = mysqli_query($con, "SELECT * FROM Orders where orderStatus='$status'");
                            $num1 = mysqli_num_rows($rt); { ?><b
                                class="label  pull-right"><?php echo htmlentities($num1); ?></b>
                            <?php } ?>

                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="manage-users.php"
                    style="color: black;display: flex;align-items: center;justify-content: start;   ">

                    <span>Manage users</span>
                </a>
            </li>

            <li>
                <a href="category.php" style="color: black;display: flex;align-items: center;justify-content: start; ">
                    <span>
                        Create Category
                    </span>
                </a>
            </li>
            <li><a href="subcategory.php"
                    style="color: black;display: flex;align-items: center;justify-content: start; ">
                    <span>Sub Category</span>
                </a>

            </li>
            <li><a href="insert-product.php"
                    style="color: black;display: flex;align-items: center;justify-content: start; ">
                    <span>Insert Product</span>
                </a>
            </li>
            <li><a href="manage-products.php"
                    style="color: black;display: flex;align-items: center;justify-content: start; ">
                    <span>Manage Products</span>
                </a>
            </li>

            <!--/.widget-nav-->
            <li>
                <a href="user-logs.php" style="color: black;display: flex;align-items: center;justify-content: start; ">
                    <span>User Login Log</span>
                </a>
            </li>

            <li>
                <a href="logout.php" style="color: black;display: flex;align-items: center;justify-content: start; ">
                    Logout
                </a>
            </li>
        </ul>

    </div>
    <!--/.sidebar-->
</div>
<!--/.span3-->