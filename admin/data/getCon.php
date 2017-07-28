<?php

header('Content-Type: application/json');

require_once('../config/config.php');
// Check connection

    $data_points = array();

    $result = mysql_query("SELECT citizen , COUNT(*) as total FROM student GROUP BY citizen");

    while($row = mysql_fetch_array($result))
    {
        $point = array("label" => $row['citizen'] , "y" => $row['total']);

        array_push($data_points, $point);
    }

    echo json_encode($data_points, JSON_NUMERIC_CHECK);

?>
