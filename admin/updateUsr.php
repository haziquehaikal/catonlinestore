<?php
$id = $_GET['id'];
$fname = $_POST['name'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$addr = $_POST['addr'];
$level = $_POST['level'];
//$type = $_POST['type'];
$img = uniqid();
$uuid = "pro" . uniqid();

require_once('../main/connect.php');
$qr = mysql_query("UPDATE users SET level='$level', fname='$fname', email = '$email', address='$addr',tel='$tel' WHERE memid = '$id'");
if(!$qr){
  die (mysql_error());
}else {
  echo "<script>alert('Personal info updated!');
  window.location='viewuser.php?id=".$id."'</script>";
}
