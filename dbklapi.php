<?php

$ch = curl_init('http://dbklpgis.scadatron.net/dbklpgisd7.xml');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$sss = curl_exec($ch);
curl_close($ch);

preg_match_all("#class="normal"?</a>$#", $sss, $arr);

echo json_encode($sss);
