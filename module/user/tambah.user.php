<?php  
if (isset($_POST['tambah'])) {
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$akses = 'User';

	$sql = "INSERT INTO tb_user
	VALUES ('', '$username', '$password', '$akses')";
	if ($mysql->query($sql) === TRUE) {
		sweetalert('Berhasil Tambah User !','success');		
		header("Location: ./?module=user");
		exit;
	}

}
?>