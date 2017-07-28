<?php
$uuid = $_GET['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$desc = $_POST['desc'];
$type = $_POST['type'];
//$uuid = "pro" . uniqid();
require_once('../main/connect.php');
$qr = mysql_query("UPDATE PRODUCT SET brand='$name',price='$price',info='$desc',type='$type' WHERE uuid= '$uuid'");
if(!$qr){
  die (mysql_error());
}else {
  echo "<script>alert('Product Info Updated!');
  window.location='editProduct.php?id=$uuid'</script>";
}
