<?php
session_start();
//get user info
$id = $_GET['id'];
$ttl = $_GET['total'];
$len  = 5;
$keys = '';
$key = '';
$keys = range(0, 9);

for ($i = 0; $i < $len; $i++) {
  $key .= $keys[array_rand($keys)];
}
$order = "CAT".$key;
var_dump($_SESSION['cart']);
//echo sizeof($_SESSION['cart']);
//perform sql query
require_once('main/connect.php');
/*if(sizeof($_SESSION['cart']) == 1){
  $qty = $_SESSION['cart'][$i]["ttl"];
  $did = $_SESSION['cart'][$i]["uuid"];
  $type = $_SESSION['cart'][$i]["type"];
  $bit = mysql_query("INSERT INTO order_item (uuid,orderid,qty,type) VALUES ('$did','$order','$qty','$type')");
}else{*/
  for($i = 0 ; $i < sizeof($_SESSION['cart']); $i++){
    $qty = $_SESSION['cart'][$i]["ttl"];
    $did = $_SESSION['cart'][$i]["uuid"];
    $type = $_SESSION['cart'][$i]["type"];
    $bit = mysql_query("INSERT INTO order_item (uuid,orderid,qty,type) VALUES ('$did','$order','$qty','$type')");
  }

$qr = mysql_query("INSERT INTO ORDERS (total,memid,orderid,date) VALUES ('$ttl','$id','$order',(now()))");
unset($_SESSION["cart"]);
if(!$qr){
  die (mysql_error());
}else {
  echo "<script>alert('Order has been added your account');
    window.location='myOrder.php'</script>";
}

 ?>
