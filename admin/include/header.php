 <div class=""
     style="display: flex;align-items: center;justify-content: end;  position: fixed;width: 100%;   top: 40px;right: 40px;     ;  ">
     <ul class="nav ">
         <li class=" dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                 <img src="./images/user1.png" class="nav-avatar" />
             </a>
             <ul class="dropdown-menu">
                 <li><a href="change-password.php">Change Password</a></li>
                 <li><a href="logout.php">Logout</a></li>
             </ul>
         </li>
     </ul>
 </div><!-- /.nav-collapse -->


 <style>
.dropdown-toggle {
    display: flex !important;
    align-items: center !important;
}

.dropdown-toggle:hover,
.dropdown-toggle:active {
    background: transparent !important;
}

.dropdown-menu li a {
    padding: 10px;
}

ul.nav li.dropdown:hover ul.dropdown-menu {
    display: block;
}

.dropdown-menu {
    top: 100px !important;
    left: -100px !important;
    background: #f2f3f8 !important;
    box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px !important;
    border-radius: 8px !important;
    text-transform: uppercase !important;
    border: 0 !important;
}

.nav-avatar {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    border: 1px solid black;
}
 </style>