<?php  
@$mysql = new mysqli('localhost','root','','kurteyki_script');

if ($mysql->connect_error) {
    die("Connection failed: " . $mysql->connect_error);
    exit;
} 
?>