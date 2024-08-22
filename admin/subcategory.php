<?php
session_start();
include('include/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $category = $_POST['category'];
        $subcat = $_POST['subcategory'];
        $sql = mysqli_query($con, "insert into subcategory(categoryid,subcategory) values('$category','$subcat')");
        $_SESSION['msg'] = "SubCategory Created !!";
    }

    if (isset($_GET['del'])) {
        mysqli_query($con, "delete from subcategory where id = '" . $_GET['id'] . "'");
        $_SESSION['delmsg'] = "SubCategory deleted !!";
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| SubCategory</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>
</head>

<body>
    <?php include('include/header.php'); ?>

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <?php include('include/sidebar.php'); ?>
                <div class="span9">
                    <div class="content">
                        <style>
                        .module-body {
                            overflow-x: auto !important;
                        }

                        .module-body::-webkit-scrollbar-track {
                            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3) !important;
                            background-color: #F5F5F5 !important;
                        }

                        .module-body::-webkit-scrollbar {
                            width: 10px !important;
                            background-color: #F5F5F5 !important;
                            height: 5px !important;
                        }

                        .module-body::-webkit-scrollbar-thumb {
                            background-color: #000000 !important;
                            border: 2px solid #555555 !important;
                        }
                        </style>
                        <div class="module">
                            <div class="module-head">
                                <h3>Sub Category</h3>
                            </div>
                            <div class="module-body">

                                <?php if (isset($_POST['submit'])) { ?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Well done!</strong>
                                    <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                </div>
                                <?php } ?>


                                <?php if (isset($_GET['del'])) { ?>
                                <div class="alert alert-error">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Oh snap!</strong>
                                    <?php echo htmlentities($_SESSION['delmsg']); ?><?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                                </div>
                                <?php } ?>

                                <br />

                                <form class="form-horizontal row-fluid" name="subcategory" method="post">
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Category</label>
                                        <select name="category" class="span12 tip" required>
                                            <option value="">Select Category</option>
                                            <?php $query = mysqli_query($con, "select * from category");
                                                while ($row = mysqli_fetch_array($query)) { ?>

                                            <option value="<?php echo $row['id']; ?>">
                                                <?php echo $row['categoryName']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">SubCategory Name</label>
                                        <input type="text" placeholder="Enter SubCategory Name" name="subcategory"
                                            class="span8 tip" required>
                                    </div>



                                    <div class="control-group">
                                        <button type="submit" name="submit" class="btn">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="module">
                            <div class="module-head">
                                <h3>Sub Category</h3>
                            </div>
                            <div class="module-body table">
                                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table "
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Creation date</th>
                                            <th>Last Updated</th>
                                            <th style="width: 50px !important ; ">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $query = mysqli_query($con, "select subcategory.id,category.categoryName,subcategory.subcategory,subcategory.creationDate,subcategory.updationDate from subcategory join category on category.id=subcategory.categoryid");
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                        <tr>
                                            <td><?php echo htmlentities($cnt); ?></td>
                                            <td><?php echo htmlentities($row['categoryName']); ?></td>
                                            <td><?php echo htmlentities($row['subcategory']); ?></td>
                                            <td> <?php echo htmlentities($row['creationDate']); ?></td>
                                            <td><?php echo htmlentities($row['updationDate']); ?></td>
                                            <td style="display: block;align-items: center;justify-content: center;
                                                height: 100px;">
                                                <a href="edit-subcategory.php?id=<?php echo $row['id'] ?>"
                                                    style="display: flex;align-items: center;justify-content: center;    border: 1px solid black ; padding: 10px;height: 20px;width: 20px;border-radius: 50px; ">
                                                    <i class='bx bxs-edit' style="font-size: 15px; color: black; "></i>
                                                </a>
                                                <a href="subcategory.php?id=<?php echo $row['id'] ?>&del=delete"
                                                    onClick="return confirm('Are you sure you want to delete?')"
                                                    style="display: flex;align-items: center;justify-content: center;    border: 1px solid black ; padding: 10px;height: 20px;width: 20px;border-radius: 50px; ">
                                                    <i class='bx bxs-trash' style="font-size: 15px; color: black; "></i>
                                                </a>
                                            </td>


                                        </tr>
                                        <?php $cnt = $cnt + 1;
                                            } ?>

                                </table>
                            </div>
                        </div>



                    </div>
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->

    <?php include('include/footer.php'); ?>

    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="scripts/datatables/jquery.dataTables.js"></script>
    <script>
    $(document).ready(function() {
        $('.datatable-1').dataTable();
        $('.dataTables_paginate').addClass("btn-group datatable-pagination");
        $('.dataTables_paginate > a').wrapInner('<span />');
        $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
        $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
    });
    </script>
</body>
<?php } ?>