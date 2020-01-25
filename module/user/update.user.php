<?php  
if (isset($_POST['update'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$akses = 'User';
	$id = $_POST['id'];
	$sql = "UPDATE tb_user SET username='$username', password='$password', akses='$akses' WHERE id='$id'";
	if ($mysql->query($sql) === TRUE) {
		sweetalert('Berhasil Update User !','success');		
		header("Location: ./?module=user");
		exit;
	}

}
?>