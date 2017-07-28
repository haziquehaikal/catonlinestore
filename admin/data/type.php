<?php

header('Content-Type: application/json');
require_once('../../main/connect.php');
$data_points = array();
$qr = "SELECT type,COUNT(*) as total FROM order_item GROUP BY type";
$act = mysql_query($qr);
while($data = mysql_fetch_array($act)){
	$point = array("label" => $data['type'] , "y" => $data['total']);
	array_push($data_points, $point);
}
echo json_encode($data_points, JSON_NUMERIC_CHECK);

?>
