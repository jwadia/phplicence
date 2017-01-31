<?php
$licence = file('licence.txt');
$config = file('config.txt');

$xml=simplexml_load_file("http://jehanwadia.ca/phplicence/webserver/api/api.php?key=". $config[0] ."&licence=". $licence[0] ."") or die(header("Location: ../licence.php"));
$serverip = $xml->serverip;
$website = $xml->website;
$licencekey = $xml->licencekey;
$status = $xml->status;
$dateissued = $xml->dateissued;
$expirationdate = $xml->expirationdate;

if ($_SERVER['SERVER_ADDR'] != $serverip) {
	die(header("Location: ../licence.php"));
}

echo "Key Valid!"
?>