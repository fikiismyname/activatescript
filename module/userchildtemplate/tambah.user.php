<?php  
if (isset($_POST['tambah'])) {
	$id_user = $_SESSION['id'];
	$id_user_child = $_POST['id_user_child'];
	$id_template = $_POST['id_template'];

	$sql = "INSERT INTO tb_user_child_template
	VALUES ('', '$id_user', '$id_user_child', '$id_template')";
	if ($mysql->query($sql) === TRUE) {
		sweetalert('Berhasil Tambah User !','success');		
		header("Location: ./?module=userchildtemplate");
		exit;
	}

}
?>