<?php  
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token'); 

include "../config/mysql.php";

$getlicense = $_GET['license'];
$getdomain = $_GET['domain'];
$status = "false";

$sql = $mysql->query("SELECT * FROM tb_activate WHERE domain='$getdomain' AND license='$getlicense'");
$read = $sql->fetch_array();

if($getlicense == $read['license'] AND $getdomain = $read['domain']){
	$status = "true";
}
echo $status;
?>