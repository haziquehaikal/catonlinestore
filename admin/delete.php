<?php
require_once('../main/connect.php');
$id = $_GET['id'];
$qr = mysql_query("DELETE FROM PRODUCT WHERE uuid = '$id'");
if(!$qr){
  die (mysql_error());
}else {
  echo '<script>alert("ITEM DELETED");
        window.location="productList.php"</script>';
}
