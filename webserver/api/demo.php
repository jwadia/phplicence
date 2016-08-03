<?php
error_reporting(-1);
$url = 'https://outragehost.com/templates/phplicence/api/api.php?key=2f6cfcc63040f522da33932849e013a9&licence=OWNED-f100b51fc7c78a2b744172ebd4c99fe4';
$c = curl_init($url)
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
$responseXML = curl_exec($c);
curl_close($c);
$xml = simplexml_load_string($responseXML);
echo $xml->serverip;
?>