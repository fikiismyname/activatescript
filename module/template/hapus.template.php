<?php  
if (!empty($_GET['aksi']) == 'hapus' AND !empty($_GET['identity'])) {
	$id = $_GET['identity'];

	$direcotry = 'files/protected/';

	$template = $_GET['template'];
	$file = $direcotry.str_replace(' ', '', $template).".js";
	unlink($file);

	// READ tb_user FOR Relation
	$sqlread = "SELECT template FROM tb_activate WHERE template='$id'";
	$result = $mysql->query($sqlread);
	if ($result->num_rows > 0) {
		sweetalert('Template Masih Terpakai','error');		
		header("Location: ./?module=template");
		exit;
	}else {
		$sql = "DELETE FROM tb_template WHERE id='$id'";
		if ($mysql->query($sql) === TRUE) {
			sweetalert('Berhasil Hapus Template !','success');		
			header("Location: ./?module=template");
			exit;
		}
	}
}
?>