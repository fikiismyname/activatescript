<?php  
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token'); 

$json = file_get_contents('database.json');
$json = json_decode($json);

$getlicense = $_GET['license'];
$getdomain = $_GET['domain'];
$status = "false";

foreach (@$json as $key => $value) {
	if ($getlicense == $json[$key]->license AND $getdomain == $json[$key]->domain) {

		$status = "true";

	}
}

echo $status;
?>