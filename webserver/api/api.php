<?php
include '../inc/database.php';
header("Content-type: text/xml");
 $xml = new SimpleXMLElement("<?xml version='1.0' encoding='UTF-8'?><licenceinfo></licenceinfo>");
 
$secret_key = mysqli_real_escape_string($con, htmlspecialchars($_GET['key']));
$licence_key = mysqli_real_escape_string($con, htmlspecialchars($_GET['licence']));

$result = $con->query("SELECT * FROM projects WHERE secret_key = '" . $secret_key .  "'");
	while($row = $result->fetch_assoc()) {
		$projectid = $row['id'];
		$result_all = $con->query("SELECT * FROM licences WHERE projectid = '" . $projectid .  "' AND licencekey = '". $licence_key ."'");
		while($row = $result_all->fetch_assoc()) {
			$serverip = $row['serverip'];
			$website = $row['website'];
			$licencekey = $row['licencekey'];
			$status = $row['status'];
			$dateissued = $row['dateissued'];
			$expirationdate = $row['expirationdate'];
			
			$ip = $xml->addChild('serverip',$serverip);
			$url = $xml->addChild('website',$website);
			$licencekey_xml = $xml->addChild('licencekey',$licencekey);
			$status_xml = $xml->addChild('status',$status);
			$dateissued_xml = $xml->addChild('dateissued',$dateissued);
			$expirationdate_xml = $xml->addChild('expirationdate',$expirationdate);
		}
	}
	 print($xml->asXML());
?>