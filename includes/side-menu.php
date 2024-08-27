<div class="side-menu animate-dropdown outer-bottom-xs"
    style="border: 1px solid black !important ;box-shadow: none !important ; outline:none !important;background: transparent   !important;  ">
    <div class="head"
        style="font-weight: 600;    padding: 8px 13px;  font-family: 'Raleway',sans-serif !important;color: #000;box-shadow: none !important ; font-size: 13px !important  ;background: transparent  !important;border-bottom: 1px solid #000  ;">
        Categories</div>
    <nav class=" yamm megamenu-horizontal" role="navigation">

        <ul class=" nav">
            <li class="dropdown menu-item">
                <?php $sql = mysqli_query($con, "select id,categoryName  from category");
                while ($row = mysqli_fetch_array($sql)) {
                    ?>
                <a href="category.php?cid=<?php echo $row['id']; ?>" class="dropdown-toggle">
                    <?php echo $row['categoryName']; ?></a>
                <?php } ?>

            </li>
        </ul>
    </nav>
</div>
<style>
.sidebar {
    position: sticky !important;
    top: 20px !important;
}

@media only screen and (max-width: 800px) {
    .sidebar {
        position: relative !important;
    }
}
</style>
<style>
@import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');

.sidebar .side-menu nav .nav>li>a,
.sidebar .side-menu nav .nav>li>a.dropdown-toggle::after {
    color: #000 !important;
    font-size: 13px !important;
    font-weight: 400 !important;
    text-transform: uppercase !important;
    font-family: 'Raleway', sans-serif !important;
    padding: 8px 13px;
}

.sidebar .side-menu nav .nav>li>a.dropdown-toggle::after {
    display: none !important;
}

.menu-item {
    background: transparent !important;
}

.sidebar .side-menu nav .nav>li>a:hover,
.sidebar .side-menu nav .nav>li>a:focus {
    background: transparent !important;
    border: 0px solid #555 !important;
    color: #000 !important;
}
</style>