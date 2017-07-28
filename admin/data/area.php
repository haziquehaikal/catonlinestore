<?php

header('Content-Type: application/json');

	require_once('../main/connect.php');
	$data_points = array();
	$qr = "SELECT area , COUNT(*) as total FROM report GROUP BY area";
	try {
		$stmt = $conn->query($qr);
		while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$point = array("label" => $data['area'] , "y" => $data['total']);
			array_push($data_points, $point);
		}
		echo json_encode($data_points, JSON_NUMERIC_CHECK);
	} catch (Exception $e) {

	}

?>
