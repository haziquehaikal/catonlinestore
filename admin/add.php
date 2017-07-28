<?php
$name = $_POST['name'];
$price = $_POST['price'];
$desc = $_POST['desc'];
$type = $_POST['type'];
$ven = $_POST['ven'];
$imgdir = "../gambar/";
$ext = substr($_FILES["file"]["name"], strripos($_FILES["file"]["name"], '.'));
$id = uniqid();
$new = $id . $ext;
move_uploaded_file($_FILES["file"]["tmp_name"], $imgdir . $new);
$len  = 5;
$keys = '';
$key = '';
$keys = range(0, 9);

for ($i = 0; $i < $len; $i++) {
  $key .= $keys[array_rand($keys)];
}
$uuid = "PRO".$key;
require_once('../main/connect.php');
$qr = mysql_query("INSERT INTO PRODUCT (brand,type,info,price,image_id,uuid) VALUES ('$name','$type','$desc','$price','$new','$uuid')");
if(!$qr){
  die (mysql_error());
}else {
  echo "<script>alert('Product Added');
  window.location='productList.php'</script>";
}
