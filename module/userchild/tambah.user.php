<?php  
if (isset($_POST['tambah'])) {
	$id_user = $_SESSION['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "INSERT INTO tb_user_child
	VALUES ('', '$id_user', '$username', '$password')";
	if ($mysql->query($sql) === TRUE) {
		sweetalert('Berhasil Tambah User !','success');		
		header("Location: ./?module=userchild");
		exit;
	}

}
?>