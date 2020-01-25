<?php  
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token'); 

@$mysql = new mysqli('localhost','kurteyki_script','EBsWVqEn35S2hra','kurteyki_script');

if ($mysql->connect_error) {
	die("Connection failed: " . $mysql->connect_error);
	exit;
} 

$getlicense = $_GET['license'];
$getdomain = $_GET['domain'];
$status = "false";

$sql = $mysql->query("SELECT * FROM activation WHERE domain='$getdomain' AND license='$getlicense'");
$read = $sql->fetch_array();

if($getlicense == $read['license'] AND $getdomain = $read['domain']){
$status = "true";
}
echo $status;
?>