<?php
require_once('../main/connect.php');
$id = $_GET['id'];
$qr = mysql_query("DELETE FROM ORDERS WHERE memid = '$id'");
if(!$qr){
  die (mysql_error());
}else {
  echo '<script>alert("ORDER DELETED");
        window.location="orders.php"</script>';
}
