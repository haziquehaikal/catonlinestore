<?php
$id = $_GET['uname'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$tel = $_POST['tel'];
$addr = $_POST['addr'];
$usr = $_POST['uname'];
//$type = $_POST['type'];
$img = uniqid();
$uuid = "pro" . uniqid();

require_once('main/connect.php');
$qr = mysql_query("UPDATE users SET fname='$fname',lname='$lname',address='$addr',tel='$tel',username='$usr' WHERE memid = '$id'");
if(!$qr){
  die (mysql_error());
}else {
  echo "<script>alert('Personal info updated!');
  window.location='myacc.php'</script>";
}
