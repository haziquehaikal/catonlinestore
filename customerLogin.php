<!DOCTYPE html>
<?php
 ob_start();
 session_start();
 require_once ('main/connect.php');
 include ('main/main.php');
 // it will never let you open index(login) page if session is set

 if(isset($_SESSION['username'])!="" ) {
  header("Location:myacc.php");
  exit;
 }



 if(isset($_POST['btn-login']) ) {
   switch ($_POST['radio']) {
     case 'admin':
     $email = $_POST['user'];
     $upass = $_POST['password'];

     //$email = strip_tags(trim($email));
     //$upass = strip_tags(trim($upass));

     //$password = hash('sha256', $upass); // password hashing using SHA256

     $res=mysql_query("SELECT memid, username, password,level FROM users WHERE username='$email' OR email = '$email'");

     $row=mysql_fetch_array($res);

     $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row

     if($count == 1 && $row['password']==$upass && $row['level'] == 'ADMIN') {
         //$_SESSION['user'] = $row['userid'];
         $_SESSION['admin'] = $row['username'];
         header("Location:admin/index.php");
     }
     else if($row['level'] != 'ADMIN'){
       echo "<script>alert('You are now allowed to login as admin');
       window.location='customerLogin.php'</script>";
     }
     else {
       echo "<script>alert('Wrong Username Or Password');
       window.location='customerLogin.php'</script>";
     }
       break;
       case 'customer':
       $email = $_POST['user'];
       $upass = $_POST['password'];
       $res=mysql_query("SELECT memid, username, password,level FROM users WHERE username='$email' OR email = '$email'");

       $row=mysql_fetch_array($res);

       $count = mysql_num_rows($res);

       if($count == 1 && $row['password'] == $upass && $row['level'] == 'USER') {
        $_SESSION['user'] = $row['memid'];
        //loginCheck($_SESSION['user']); 'user'
        $_SESSION['username'] = $row['username'];
        header("Location:myacc.php");
       } else {
         echo "<script>alert('Wrong Username Or Password');
         window.location='customerLogin.php'</script>";
       }
     default:
       # code...
       break;
   }
 }

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

 <?php navbar() ?>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">

            <div class="container">

                <div class="col-cs-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>New account / Sign in</li>
                    </ul>

                </div>

                <div class="col-xs-6">
                    <div class="box">
                        <h1>Login</h1>

                        <p class="lead">Already our customer?</p>

                        <hr>

                        <form  method="post">
                            <div class="form-group">
                                <label for="email">Email or Username</label>
                                <input type="text" class="form-control" name="user">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>

                            <div class="form-group">
                                <label><strong>Access As:</strong></label><br>
                                <label class="radio-inline">
                                    <input type="radio" name="radio"  value="admin">Administrator
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="radio" value="customer" checked>Customer
                                </label>

                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary" name="btn-login"><i class="fa fa-sign-in"></i> Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box">
                        <h1>New account</h1>

                        <p class="lead">Not our registered customer yet?</p>
                        <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p>

                        <hr>
                        <?php echo $msg; ?>
                        <form action="main/register.php" method="post">
                            <div class="form-group">
                                <label for="name">Full name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="name">username</label>
                                <input type="text" class="form-control" id="name" name="uname">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="password">Retype Password</label>
                                <input type="password" class="form-control" id="password2" name="password2">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                            </div>
                        </form>
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
