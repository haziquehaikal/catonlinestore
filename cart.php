<!DOCTYPE html>
<?php
require_once("main/connect.php");
require("main/main.php");
session_start();
if(!isset($_SESSION['username'])){
  header("Location:customerLogin.php?err=expired");
}

if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!isset($_GET["btn"])) {
			$qr = mysql_query("SELECT * FROM PRODUCT WHERE uuid='" . $_GET["id"] . "'");
      $i = 0;
			while($row = mysql_fetch_assoc($qr)){
				$arr[] = $row;
			}
      $i = $g;
			$itemArr = array(
				  array(
					'brand'=>$arr[0]["brand"],
					'uuid'=>$arr[0]["uuid"],
          'type'=>$arr[0]["type"],
          'ttl'=>$_POST["ttl"],
					'price'=>$arr[0]["price"]));
			if(!empty($_SESSION["cart"])) {
				if(in_array($arr[0]["uuid"],$_SESSION["cart"])) {
				foreach($_SESSION["cart"] as $k => $v) {
					if($arr[0]["uuid"] == $k) $_SESSION["cart"][$k]["ttl"] = $_POST["ttl"];
				}
      } else {
        $_SESSION["cart"] = array_merge($_SESSION["cart"],$itemArr);
      }
    } else {
      $_SESSION["cart"] = $itemArr;
    }
  }
  break;
  case "remove":
  if(!empty($_SESSION["cart"])) {
    foreach($_SESSION["cart"] as $k => $v) {
      if($_GET["id"] == $k)
      unset($_SESSION["cart"][$k]);
      if(empty($_SESSION["cart"]))
      unset($_SESSION["cart"]);
    }
  }
	break;
	case "empty":
		unset($_SESSION["cart"]);
	break;
}
}

$user = $_SESSION['username'];
$usr = mysql_query("SELECT * FROM users where username = '$user'");
$data = mysql_fetch_array($usr);
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
                        <li>Shopping cart</li>
                    </ul>
                </div>

                <div class="col-md-9" id="basket">

                    <div class="box">



                            <h1>Shopping cart</h1>
                            <p class="text-muted">You currently have <?php echo count($_SESSION['cart']); ?> item(s) in your cart.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Unit price</th>
                                            <th>Quantiy</th>
                                            <th>Remove Item</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      //echo var_dump($_SESSION['cart']);
                                      foreach ($_SESSION['cart'] as $item) {
                                      ?>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <img src="img/detailsquare.jpg" alt="White Blouse Armani">
                                                </a>
                                            </td>
                                            <td><b><?php echo $item['brand']; ?></b>
                                            </td>
                                            <td>
                                                <?php echo "RM".$item["price"]; ?>
                                            </td>
                                            <td>
                                                <?php echo $item["ttl"]; ?>
                                            </td>
                                            <td>
                                              <?php
                                              for($i = 0 ; $i < sizeof($_SESSION['cart']); $i++){
                                              echo '<a href="cart.php?action=remove&id='.$i.'">';
                                            }?><i class="fa fa-trash-o"></i></a></td>

                                        </tr>
                                        <?php
                                        $item_total += ($item["price"] * $item["ttl"] );

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
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="index.php" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                      <a href="cart.php?action=empty" class="btn btn-danger"><i class="fa fa-trash-o"></i> Empty cart</a>
                                </div>

																<form method="POST" action="addorder.php?id=<?php echo $data['memid'];?>&total=<?php echo $item_total; ?>">
                                <div class="pull-right">
		                                    <button type="submit" class="btn btn-primary" >Proceed to checkout <i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
															</form>
                            </div>



                    </div>
                    <!-- /.box -->





                </div>
                <!-- /.col-md-9 -->


                <!-- /.col-md-3 -->

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
