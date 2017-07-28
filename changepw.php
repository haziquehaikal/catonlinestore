<?php
require_once('main/connect.php');
session_start();
$user = $_SESSION['user'];
$pw = $_POST['pw'];
$pw1  = $_POST['pw1'];
$pw2 = $_POST['pw2'];
$qr = mysql_query("SELECT * from users where memid = '$user'");
$data = mysql_fetch_array($qr);
if($data['password'] != $pw){
  echo '<script>alert("Old password not match");
        window.location="myacc.php"</script>';
}
else if ($pw1 != $pw2){
  echo '<script>alert("Password not match");
        window.location="myacc.php"</script>';
}
else {
  $chg = mysql_query("UPDATE users SET password = '$pw1' WHERE memid = '$user'");
  if(!$chg){
    die (mysql_error());
  }else {
    echo '<script>alert("PASSWORD CHANGED");
          window.location="myacc.php"</script>';
  }
}
