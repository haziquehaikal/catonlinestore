<!DOCTYPE html>
<?php
ob_start();
session_start();
//SINI ONLY
//cari file for db connect
//**************************************
require_once('../main/connect.php');//**
//**************************************
require('../main/main.php');
require('core.php');

if(isset($_SESSION['admin'])!="" ) {
 header("Location:index.php");
 exit;
}

//check button submit from <button type="submit" name="btn-login">
//isset =  return value = boolean
if( isset($_POST['btn-login']) ) {

//recieve user input
 $email = $_POST['user'];
 $upass = $_POST['password'];


//perform query nak login
 $res=mysql_query("SELECT uid, username, password FROM users_admin WHERE username='$email'");

//ambik data dari database
 $row=mysql_fetch_array($res);

//kire row dari database
 $count = mysql_num_rows($res);


 if( $count == 1 && $row['password']==$upass ) { // kalau user = 1 an password input ==  password database
  $_SESSION['user'] = $row['userid'];
  $_SESSION['admin'] = $row['username']; //bagi session dekat $_SESSION['admin']  = usernmae dalam database
  header("Location:../admin/index.php");
} else { //kalau x betul
   echo "<script>alert('Wrong Username Or Password');
   window.location='../admin/login.php'</script>"; //kalau salah prompt error
 }
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
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> MoDe Admin Panel</h2>
                 <br />
            </div>
        </div>
         <div class="row ">

                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>   Enter Details To Login </strong>
                            </div>
                            <div class="panel-body">
                                <form method="post">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Your Username" name="user" required/>
                                        </div>
                                                                              <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  placeholder="Your Password" name="password" required/>
                                        </div>

                                     <button class="btn btn-primary" name="btn-login">Login</button>
                                    <hr />
                                    </form>
                            </div>

                        </div>
                    </div>


        </div>
    </div>


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
