<!DOCTYPE html>
<?php
require('core.php');
require_once('../main/connect.php');
require('../main/main.php');
session_start();
$user = $_SESSION['username'];
if(!isset($_SESSION['admin'])){
  header("Location:login.php?err=expired");
}
$id = $_GET['id'];
$qr = mysql_query("SELECT * from productDetails where vendorID = '$id'");
if(!$qr){
  die ("".mysql_error());
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
font-size: 16px;">Welcome , <?php echo $_SESSION['admin'] ?> &nbsp; <a href="../main/logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>
           <!-- /. NAV TOP  -->
                <?php sideMenu() ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>View Company details</h2>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                  <!-- Form Elements -->
                  <div class="panel panel-primary">
                      <div class="panel-heading">
                        Company overview
                      </div>
                      <div class="panel-body">
                          <div class="row">
                              <div class="col-md-6">
                                  <?php viewVendor(); ?>
                          </div>
                      </div>
                  </div>
                   <!-- End Form Elements -->
                </div>
            </div>

            <div class="col-md-20">
              <!-- Form Elements -->
              <div class="panel panel-danger">
                  <div class="panel-heading">
                  Supplied items list by <b><?php echo $id ?></b>
                  </div>
                  <div class="panel-body">
                      <div class="table-responsive">
                          <table class="table table-striped table-bordered table-hover">
                              <thead>
                                  <tr>
                                      <th>Item ID</th>
                                      <th>Item brand</th>
                                      <th>price each</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php while ($brang = mysql_fetch_array($qr)){ ?>
                                  <tr>
                                      <td><?php echo $brang['uuid'] ?></td>
                                      <td><?php echo $brang['brand'] ?></td>
                                      <td>RM <?php echo $brang['price'] ?></td>
                                  </tr>
                                  <?php } ?>

                              </tbody>
                          </table>
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
