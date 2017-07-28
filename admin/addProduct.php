<!DOCTYPE html>
<?php
require('core.php');
require_once('../main/connect.php');
require('../main/main.php');
ob_start();
session_start();
$user = $_SESSION['username'];
if(!isset($_SESSION['admin'])){
  header("Location:login.php?err=expired");
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MoDe Admin Panel</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">Welcome , <?php echo $_SESSION['admin'] ?>&nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>
           <!-- /. NAV TOP  -->
                <?php sideMenu() ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Add new product</h2>


                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">

                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="post" action="add.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input class="form-control" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label>Product Price</label>
                                            <input class="form-control"  name="price">
                                        </div>
                                        <div class="form-group">
                                            <label>Product image</label>
                                            <input type="file" name="file">
                                        </div>
                                    <br />

                                  </div>

                                <div class="col-md-6">

                                  <div class="form-group">
                                      <label>Product Description</label>
                                      <textarea class="form-control" rows="3"name="desc"></textarea>
                                  </div>




                                  <div class="form-group">
                                      <label>Product Type</label>
                                      <select class="form-control" name="type">
                                          <option value="aqua">Aquatic</option>
                                          <option value="cat">cat</option>
                                          <option value="supply">Suppply</option>
                                          <option value="assc">Accories</option>
                                      </select>
                                  </div>
                                    <button type="submit" class="btn btn-default">Add product</button>
                                    <button type="reset" class="btn btn-primary">Reset</button>

                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
                <!-- /. ROW  -->

                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
