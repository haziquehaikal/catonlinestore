<?php

require_once ("connect.php");

//display the slider (index.php) content
function contentSlider(){

  require ("connect.php");
  $qr = mysql_query("SELECT * FROM PRODUCT");
  if(!$qr){
    die (mysql_error());
  }else {
    while ($result = mysql_fetch_array($qr)){
      echo '<div class="item">
          <div class="product">
              <div class="flip-container">
                  <div class="flipper">
                      <div class="front">
                          <a href="#">
                              <img src="gambar/'.$result['image_id'].'" alt="" class="img-responsive">
                          </a>
                      </div>
                      <div class="back">
                          <a href="#">
                              <img src="gambar/'.$result['image_id'].'" alt="" class="img-responsive">
                          </a>
                      </div>
                  </div>
              </div>
              <a href="productDetails?id='.$result['uuid'].'" class="invisible">
                  <img src="gambar/'.$result['image_id'].'" alt="" class="img-responsive">
              </a>
              <div class="text">
                  <h3><a href="productDetails.php?id='.$result['uuid'].'">'.$result['brand'].'</a></h3>
                  <p class="price">RM '.$result['price'].'</p>
              </div>
              <!-- /.text -->
          </div>
          <!-- /.product -->
      </div>';
    }
  }
}

function footer(){

  echo '<div id="footer" data-animate="fadeInUp">
      <div class="container">
          <div class="row">
              <div class="col-md-3 col-sm-6">

                  <h4>User section</h4>

                  <ul>
                      <li><a href="customerLogin.php">Login</a>
                      </li>
                      <li><a href="customerLogin.php">Regiter</a>
                      </li>
                  </ul>

                  <hr class="hidden-md hidden-lg hidden-sm">

              </div>
              <!-- /.col-md-3 -->

              <div class="col-md-3 col-sm-6">

                  <h4>Top categories</h4>



                  <ul>
                      <li><a href="aqua.php">Aquatic</a>
                      </li>
                      <li><a href="cat.php">Cats</a>
                      </li>
                      <li><a href="supply.php">Pet Supply</a>
                      </li>

                  </ul>

                  <hr class="hidden-md hidden-lg">

              </div>
              <!-- /.col-md-3 -->

              <div class="col-md-3 col-sm-6">

                  <h4>Where to find us</h4>

                  <p><strong>Comel Pet store</strong>
                      <br>No 2 Bangunan Besar
                      <br>Jalan Uniten
                      <br>43200 Cheras
                      <br>Selangor
                      <br>
                      <strong>Malaysia</strong>
                  </p>

                  <a href="contact.html">Go to contact page</a>

                  <hr class="hidden-md hidden-lg">

              </div>
              <!-- /.col-md-3 -->



              <div class="col-md-3 col-sm-6">




              </div>
              <!-- /.col-md-3 -->

          </div>
          <!-- /.row -->

      </div>
      <!-- /.container -->
  </div>
  <!-- /#footer -->

  <!-- *** FOOTER END *** -->




  <!-- *** COPYRIGHT ***
_________________________________________________________ -->
  <div id="copyright">
      <div class="container">
          <div class="col-md-6">
              <p class="pull-left">© 2016 Comel pet store</p>

          </div>

      </div>
  </div>';
}

//display instant shawl
function productSupply(){
  require_once('connect.php');
  $qr = mysql_query("SELECT * FROM PRODUCT WHERE type = 'supply'");
  while($row = mysql_fetch_assoc($qr)){
		$arr[] = $row;
	}
	if (!empty($arr)) {
		foreach($arr as $key=>$value){
      echo '
      <div class="col-md-4 col-sm-6">
          <div class="product">
              <div class="flip-container">
                  <div class="flipper">
                      <div class="front">
                          <a href="#">
                              <img src="gambar/'.$arr[$key]['image_id'].'" alt="" class="img-responsive">
                          </a>
                      </div>
                      <div class="back">
                          <a href="#">
                              <img src="gambar/'.$arr[$key]['image_id'].'" alt="" class="img-responsive">
                          </a>
                      </div>
                  </div>
              </div>
              <a href="#" class="invisible">
                  <img src="img/product1.jpg" alt="" class="img-responsive">
              </a>
            <form method="post" action="cart.php?action=add&id='.$arr[$key]['uuid'].'">
              <div class="text">
                  <h3><a href="productDetails.php?id='.$arr[$key]['uuid'].'">'.$arr[$key]['brand'].'</a></h3>
                  <p class="price">RM '.$arr[$key]["price"].'</p>
                  <p class="buttons">
                  <input type="text" name="ttl" value="1" size="2">
                      <a href="productDetails.php?id='.$arr[$key]['uuid'].'" class="btn btn-default">View detail</a>
                      <button type="submit" class="btn btn-primary" name="btn"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                  </p>
              </div>
              </form>
              <!-- /.text -->
          </div>
          <!-- /.product -->
      </div>
      ';
    }
  }

}

//display instant shawl
function productAssc(){
  require_once('connect.php');
  $qr = mysql_query("SELECT * FROM PRODUCT WHERE type = 'assc'");
  while($row = mysql_fetch_assoc($qr)){
		$arr[] = $row;
	}
	if (!empty($arr)) {
		foreach($arr as $key=>$value){
      echo '
      <div class="col-md-4 col-sm-6">
          <div class="product">
              <div class="flip-container">
                  <div class="flipper">
                      <div class="front">
                          <a href="#">
                              <img src="gambar/'.$arr[$key]['image_id'].'" alt="" class="img-responsive">
                          </a>
                      </div>
                      <div class="back">
                          <a href="#">
                              <img src="gambar/'.$arr[$key]['image_id'].'" alt="" class="img-responsive">
                          </a>
                      </div>
                  </div>
              </div>
              <a href="#" class="invisible">
                  <img src="img/product1.jpg" alt="" class="img-responsive">
              </a>
            <form method="post" action="cart.php?action=add&id='.$arr[$key]['uuid'].'">
              <div class="text">
                  <h3><a href="productDetails.php?id='.$arr[$key]['uuid'].'">'.$arr[$key]['brand'].'</a></h3>
                  <p class="price">RM '.$arr[$key]["price"].'</p>
                  <p class="buttons">
                  <input type="text" name="ttl" value="1" size="2">
                      <a href="productDetails.php?id='.$arr[$key]['uuid'].'" class="btn btn-default">View detail</a>
                      <button type="submit" class="btn btn-primary" name="btn"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                  </p>
              </div>
              </form>
              <!-- /.text -->
          </div>
          <!-- /.product -->
      </div>
      ';
    }
  }

}

//display shawl tudung
function cat(){
  require_once('connect.php');
  $qr = mysql_query("SELECT * FROM PRODUCT WHERE type = 'cat'");
  while($row = mysql_fetch_assoc($qr)){
		$arr[] = $row;
	}
	if (!empty($arr)) {
		foreach($arr as $key=>$value){
      echo '
      <div class="col-md-4 col-sm-6">
          <div class="product">
              <div class="flip-container">
                  <div class="flipper">
                      <div class="front">
                          <a href="#">
                              <img src="gambar/'.$arr[$key]['image_id'].'" alt="" class="img-responsive">
                          </a>
                      </div>
                      <div class="back">
                          <a href="#">
                                <img src="gambar/'.$arr[$key]['image_id'].'" alt="" class="img-responsive">
                          </a>
                      </div>
                  </div>
              </div>
              <a href="#" class="invisible">
                  <img src="img/product1.jpg" alt="" class="img-responsive">
              </a>
            <form method="post" action="cart.php?action=add&id='.$arr[$key]['uuid'].'">
              <div class="text">
                  <h3><a href="productDetails.php?id='.$arr[$key] ['uuid'].'">'.$arr[$key]['brand'].'</a></h3>
                  <p class="price">RM '.$arr[$key]["price"].'</p>
                  <p class="buttons">
                  <input type="text" name="ttl" value="1" size="2">
                      <a href="productDetails.php?id='.$arr[$key]['uuid'].'" class="btn btn-default">View detail</a>
                      <button type="submit" class="btn btn-primary" name="btn"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                  </p>
              </div>
              </form>
              <!-- /.text -->
          </div>
          <!-- /.product -->
      </div>
      ';
    }
  }

}

//display bawal tudung
function aqua(){
  require_once('connect.php');
  $qr = mysql_query("SELECT * FROM PRODUCT WHERE type = 'aqua'");
  while($row = mysql_fetch_assoc($qr)){
		$arr[] = $row;
	}
	if (!empty($arr)) {
		foreach($arr as $key=>$value){
      echo '
      <div class="col-md-4 col-sm-6">
          <div class="product">
              <div class="flip-container">
                  <div class="flipper">
                      <div class="front">
                          <a href="#">
                              <img src="gambar/'.$arr[$key]['image_id'].'" alt="" class="img-responsive">
                          </a>
                      </div>
                      <div class="back">
                          <a href="#">
                              <img src="gambar/'.$arr[$key]['image_id'].'" alt="" class="img-responsive">
                          </a>
                      </div>
                  </div>
              </div>
              <a href="#" class="invisible">
                  <img src="gambar/'.$arr[$key]['image_id'].'" alt="" class="img-responsive">
              </a>
              <form method="post" action="cart.php?action=add&id='.$arr[$key]['uuid'].'">
                <div class="text">

                    <h3><a href="productDetails.php?id='.$arr[$key]['uuid'].'">'.$arr[$key]['brand'].'</a></h3>

                    <p class="price">RM '.$arr[$key]["price"].'</p>
                    <p class="buttons">
                      <input type="text" name="ttl" value="1" size="2">
                        <a href="productDetails.php?id='.$arr[$key]['uuid'].'" class="btn btn-default">View detail</a>
                        <button type="submit" class="btn btn-primary" name="btn"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                    </p>
                </div>
                </form>
              <!-- /.text -->
          </div>
          <!-- /.product -->
      </div>
      ';
    }
  }

}


//function for navbar
function navbar(){
  echo '<div class="navbar navbar-default yamm" role="navigation" id="navbar">
      <div class="container">
          <div class="navbar-header">

              <a class="navbar-brand home" href="index.php" data-animate-hover="bounce">
                  <img src="img/test.jpg" alt="Obaju logo" class="hidden-xs">
                  <img src="img/logo-smal" alt="Obaju logo" class="visible-xs"><span class="sr-only"></span>
              </a>
              <div class="navbar-buttons">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                      <span class="sr-only">Toggle navigation</span>
                      <i class="fa fa-align-justify"></i>
                  </button>
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                      <span class="sr-only">Toggle search</span>
                      <i class="fa fa-search"></i>
                  </button>
              </div>
          </div>
          <!--/.navbar-header -->

          <div class="navbar-collapse collapse" id="navigation">

              <ul class="nav navbar-nav navbar-left">
                  <li class="active"><a href="index.php">Home</a>
                  </li>
                  <li class="dropdown yamm-fw">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Product <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                          <li>
                              <div class="yamm-content">
                                  <div class="row">
                                      <div class="col-sm-3">
                                          <h5>Aquatic</h5>
                                          <div class="banner">
                                              <a href="aqua.php">
                                                  <img src="img/test1.jpg" class="img img-responsive" alt="">
                                              </a>
                                          </div>
                                      </div>
                                      <div class="col-sm-3">
                                          <h5>Cats</h5>
                                          <div class="banner">
                                              <a href="cat.php">
                                                  <img src="img/jibu.jpg" class="img img-responsive" alt="">
                                              </a>
                                          </div>
                                      </div>
                                      <div class="col-sm-3">
                                          <h5>Pet Supplies</h5>
                                          <div class="banner">
                                              <a href="supply.php">
                                                  <img src="img/supply.jpg" class="img img-responsive" alt="">
                                              </a>
                                          </div>
                                      </div>
                                      <div class="col-sm-3">
                                          <h5>Pet asscories</h5>
                                          <div class="banner">
                                              <a href="assc.php">
                                                  <img src="img/test1.jpg" class="img img-responsive" alt="">
                                              </a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- /.yamm-content -->
                          </li>
                      </ul>
                  </li>

                  <li class="dropdown yamm-fw">
                      
                  </li>
              </ul>

          </div>
          <!--/.nav-collapse -->

            <div class="navbar-buttons">


              ';
              echo checkLogin($_SESSION['username']);

              echo '<div class="navbar-collapse collapse right" id="search-not-mobile">
                  <a href="cart.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">My Cart ('.count($_SESSION['cart']).')</span></a>
              </div>';

              echo '
              <!--/.nav-collapse -->

              <div class="navbar-collapse collapse right" id="search-not-mobile">
                  <a href="search.php" class="btn btn-primary navbar-btn"><i class="fa fa-search"></i><span class="hidden-sm">Search</span></a>


                  </button>
              </div>

          </div>

          <div class="collapse clearfix" id="search">

              <form class="navbar-form" role="search">
                  <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search">
                      <span class="input-group-btn">

    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

      </span>
                  </div>
              </form>

          </div>
          <!--/.nav-collapse -->

      </div>
      <!-- /.container -->
  </div>';
}

function checkLogin($test){
  if(isset($test)){
    return '<div class="navbar-collapse collapse right" id="basket-overview">
        <a href="myacc.php" class="btn btn-primary navbar-btn"><i class="fa fa-sign-in"></i><span class="hidden-sm">My account</span></a>
    </div>';
  }
  else{
    return '<div class="navbar-collapse collapse right" id="basket-overview">
        <a href="customerLogin.php" class="btn btn-primary navbar-btn"><i class="fa fa-sign-in"></i><span class="hidden-sm">Customer Login</span></a>
    </div>';
  }
}
//function for display poduct details
function productDetail(){
  require_once('connect.php');
  $id = $_GET['id'];
  $qr = mysql_query("SELECT * FROM PRODUCT WHERE  uuid = '$id'");
  while($row = mysql_fetch_assoc($qr)){
		$arr[] = $row;
	}
	if (!empty($arr)) {
		foreach($arr as $key=>$value){
      echo '<div class="container">

          <div class="col-md-12">
              <ul class="breadcrumb">
                  <li><a href="#">Home</a>
                  </li>
                  <li><a href="#">Ladies</a>
                  </li>
                  <li><a href="#">Tops</a>
                  </li>
                  <li>'.$arr[$key]['brand'].'</li>
              </ul>

          </div>



          <div class="col-md-11">

              <div class="row" id="productMain">
                  <div class="col-sm-6">
                      <div id="mainImage">
                          <img src="gambar/'.$arr[$key]['image_id'].'" alt="" class="img-responsive">
                      </div>

                  </div>
                  <div class="col-sm-6">
                      <div class="box">
                          <h1 class="text-center">'.$arr[$key]['brand'].'</h1>
                          <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material & care and sizing</a>
                          </p>
                          <p class="price">RM '.$arr[$key]['price'].'</p>
                        <form method="post" action="cart.php?action=add&id='.$arr[$key]['uuid'].'">
                          <p class="text-center buttons">
                          <input type="text" name="ttl" value="1" size="2">
                              <button type="submit" class="btn btn-primary" name="btn"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                          </p>
                          </form>


                      </div>

                      <div class="row" id="thumbs">
                          <div class="col-xs-4">
                              <a href="gambar/'.$arr[$key]['image_id'].'" class="thumb">
                                  <img src="gambar/'.$arr[$key]['image_id'].'" alt="" class="img-responsive">
                              </a>
                          </div>
                          <div class="col-xs-4">
                              <a href="gambar/'.$arr[$key]['image_id'].'" class="thumb">
                                  <img src="gambar/'.$arr[$key]['image_id'].'" alt="" class="img-responsive">
                              </a>
                          </div>
                          <div class="col-xs-4">
                              <a href="gambar/'.$arr[$key]['image_id'].'" class="thumb">
                                  <img src="gambar/'.$arr[$key]['image_id'].'" alt="" class="img-responsive">
                              </a>
                          </div>
                      </div>
                  </div>

              </div>


              <div class="box" id="details">
                  <p>
                      <h4>Product details</h4>
                      <p>'.$arr[$key]['info'].'</p>

                      <hr>
              </div>





          </div>
          <!-- /.col-md-9 -->
      </div>';
    }
  }

}


 ?>
