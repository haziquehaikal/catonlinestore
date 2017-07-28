<!DOCTYPE html>
<?php
$id = $_GET['id'];
require_once('main/connect.php');
require('main/main.php');
require('main/userFunc.php');
require('admin/core.php');
ob_start();
session_start();
if(!isset($_SESSION['username'])){
  header("Location:login.php");
}

$user = $_SESSION['username'];
$usr = mysql_query("SELECT * FROM users where username = '$user'");
$data = mysql_fetch_array($usr);
$see = $data['memid'];
$qr = mysql_query("SELECT brand,price,qty,PRODUCT.uuid FROM PRODUCT,order_item WHERE orderid = '$id' and PRODUCT.uuid = order_item.uuid");
 ?>
<html lang="en">

<head>



    <title>
        Online pet store
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
                        <li>My orders</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Customer section</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li class="active">
                                    <a href="myOrder.php"><i class="fa fa-list"></i> My orders</a>
                                </li>
                                <li >
                                    <a href="myacc.php"><i class="fa fa-user"></i> My account</a>
                                </li>
                                <li>
                                    <a href="main/logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9" id="customer-orders">
                    <div class="box">
                        <h1>Orders details for <?php echo $id ?></h1>

                        <p class="lead">Your orders on one place.</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>

                        <button class="btn btn-danger" data-toggle="modal" data-target="#stat"><i class="fa fa-trash-o"></i> Cancel this order ! </button>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Item ID</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price each</th>
                                        <th>Total price each item</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php while ($id = mysql_fetch_array($qr)){ ?>
                                    <tr>
                                        <td><?php echo $id['uuid'] ?></td>
                                        <td><?php echo $id['brand'] ?></td>
                                        <td><?php echo $id['qty'] ?></td>
                                        <td>RM<?php echo number_format($id['price'], 2);  ?></td>
                                        <td>RM<?php echo number_format(($id['price'] * $id['qty']), 2)  ?></td>
                                    </tr>
                                    <?php
                                    $item_total += ($id["price"] * $id["qty"] );
                                  } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">Total Amount</th>
                                        <th ><?php echo "RM".number_format($item_total , 2); ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** FOOTER ***
 _________________________________________________________ -->

        <!-- /#footer -->

        <!-- *** FOOTER END *** -->




        <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
        <?php footer(); ?>
        <!-- *** COPYRIGHT END *** -->



    </div>
    <div class="modal fade" id="stat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">

                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title" id="myModalLabel">Delete confirmation</h4>
                 </div>

                 <div class="modal-body">
                     <p>Are you sure to delete this order ?</p>
                 </div>

                 <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
										  <button type="button" id="btn" onClick="changeStat()" class="btn btn-danger btn-ok">Yes</button>
                 </div>
             </div>
         </div>
     </div>
</div>
    <!-- /#all -->

<script>
function changeStat(){
	//var sel  = document.getElementById('status').value;
	//console.log(sel);
	var id = window.location.search;
  console.log(id);
	$.ajax({
		type:'POST',
		url:'deleteorder.php'+id
	}).then(function(response){
    console.log(response);
		//successAlert("Status Changed!");
    //$('#stat').modal('hide');
    alert("ORDER SUCCESSFULLY DELETED");
    $('#stat').modal('hide');
    window.location('myacc.php');
    return false;

		//$('#btn').hide();
	})
}
</script>


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
