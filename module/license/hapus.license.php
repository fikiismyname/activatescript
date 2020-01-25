<?php  
if (!empty($_GET['aksi']) == 'hapus' AND !empty($_GET['identity'])) {
	$id = $_GET['identity'];
	// READ tb_user FOR Relation
	$sql = "DELETE FROM tb_activate WHERE id='$id'";
	if ($mysql->query($sql) === TRUE) {
		sweetalert('Berhasil Hapus License !','success');		
		header("Location: ./?module=license");
		exit;
	}
}
?>