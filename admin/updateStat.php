<?php
$id = $_GET['id'];
$type = $_POST['stat'];
$img = uniqid();

require_once('../main/connect.php');
$qr = mysql_query("UPDATE ORDERS SET status='$type' WHERE orderid= '$id'");
if(!$qr){
  die (mysql_error());
}else {
  echo "<script>alert('Status Updated!');
  window.location='orders.php'</script>";
}
