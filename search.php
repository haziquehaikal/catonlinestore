<!DOCTYPE html>
<?php

require_once ('main/connect.php');
include ('main/main.php');

if(!isset($_POST['cari'])){
  //echo '<script>alert("ERROR")</script>';
}

if(isset($_POST['cari'])){
  //$sort = $_POST['radio'];
  $tata = $_POST['cari'];
  //$tata = preg_replace("#[^0-9a-z]#i","",$tata);
  $qr = mysql_query("SELECT * from PRODUCT where uuid LIKE '%$tata%' OR brand LIKE '%$tata%' OR type LIKE '%$tata%'") or die("".mysql_error());
  $chk = mysql_num_rows($qr);
  //$brang = mysql_fetch_array($qr);
  if($chk == 0){
  //echo '<script>alert("ERROR")</script>';
    }

}

?>


<html lang="en">

<head>

    <title>
        Comel pet store
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">



</head>

<body>
    <!-- *** TOPBAR ***
 _________________________________________________________ -->
 <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
     <div class="modal-dialog modal-sm">

         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" id="Login">Customer login</h4>
             </div>
             <div class="modal-body">
                 <form action="customer-orders.html" method="post">
                     <div class="form-group">
                         <input type="text" class="form-control" id="email-modal" placeholder="email">
                     </div>
                     <div class="form-group">
                         <input type="password" class="form-control" id="password-modal" placeholder="password">
                     </div>

                     <p class="text-center">
                         <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                     </p>


                 </form>

                 <p class="text-center text-muted">Not registered yet?</p>
                 <p class="text-center text-muted"><a href="register.html"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

             </div>
         </div>
     </div>
 </div>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

 <?php navbar(); ?>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Search Item</li>
                    </ul>
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-success">
                            <div class="panel-heading">
                              Search Items
                            </div>
                            <div class="panel-body">
                              <form method="post" action="search.php">
                              <input type="text" class="input-sm" name="cari"> <button type="submit" class="btn btn-primary">Search</button>

                            </form>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                          <th>Product ID</th>
                                          <th>Brand</th>
                                          <th>type</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php


                                        while ($brang = mysql_fetch_array($qr)){
                                          //var_dump($brang);
                                       ?>

                                        <tr>
                                            <td><?php echo $brang['uuid'] ?></td>
                                            <td><?php echo $brang['brand'] ?></td>
                                            <td><?php echo $brang['type'] ?></td>
                                            <td><a href="productDetails.php?id=<?php echo $brang['uuid'] ?>"><button class="btn btn-success"><i class="fa fa-info"></i>  View Product</button></a></td>
                                        </tr>
                                        <?php }?>

                                    </tbody>
                                </table>
                            </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>





            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** FOOTER ***
 _________________________________________________________ -->
        <?php footer(); ?>
        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->




    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>



</body>

</html>
