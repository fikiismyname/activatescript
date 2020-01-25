<?php  
if (!empty($_GET['aksi']) == 'hapus' AND !empty($_GET['identity'])) {
	$id = $_GET['identity'];


	// READ tb_user FOR Relation
	$sqlread = "SELECT id_user FROM tb_activate WHERE id_user='$id'";
	$result = $mysql->query($sqlread);
	if ($result->num_rows > 0) {
		sweetalert('User Masih Terpakai','error');		
		header("Location: ./?module=user");
		exit;
	}else {
		$sql = "DELETE FROM tb_user WHERE id='$id'";
		if ($mysql->query($sql) === TRUE) {
			sweetalert('Berhasil Hapus Pengguna !','success');		
			header("Location: ./?module=user");
			exit;
		}
	}
	

}
?>