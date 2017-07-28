<?php
require_once('main/connect.php');
$id = $_GET['id'];
$qr = mysql_query("DELETE FROM ORDERS WHERE orderid = '$id'");
$qr = mysql_query("DELETE FROM order_item WHERE orderid = '$id'");
if(!$qr){
  die (mysql_error());
}else {
  echo '<script>alert("ORDER DELETED");
        window.location="orders.php"</script>';
}
