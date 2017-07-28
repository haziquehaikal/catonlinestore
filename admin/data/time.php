<?php

header('Content-Type: application/json');
require_once('../../main/connect.php');
$data_points = array();
$qr = "SELECT monthname(date) as bulan,COUNT(*) as total FROM ORDERS GROUP BY monthname(date) desc";
$act = mysql_query($qr);
while($data = mysql_fetch_array($act)){
	$point = array("label" => $data['bulan'] , "y" => $data['total']);
	array_push($data_points, $point);
}
echo json_encode($data_points, JSON_NUMERIC_CHECK);

?>
