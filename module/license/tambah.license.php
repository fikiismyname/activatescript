<?php  
if (isset($_POST['tambah'])) {
	$domain = $_POST['domain'];
	$template = $_POST['template'];
	$id_user = $_SESSION['id'];	
	$license = implode( '-', str_split( substr( strtoupper( md5( time() . rand( 1000, 9999 ) ) ), 0, 20 ), 4 ) )."-".$template;
	$sql = "INSERT INTO tb_activate
	VALUES ('', '$id_user', '$license', '$domain', '$template')";
	if ($mysql->query($sql) === TRUE) {
		sweetalert('Berhasil Tambah Domain !','success');		
		header("Location: ./?module=license");
		exit;
	}

}
?>