<?php  
if (isset($_POST['update'])) {
	$domain = $_POST['domain'];
	$template = $_POST['template'];
	$id = $_POST['id'];
	$sql = "UPDATE tb_activate SET domain='$domain',template='$template' WHERE id='$id'";
	if ($mysql->query($sql) === TRUE) {
		sweetalert('Berhasil Update License !','success');		
		header("Location: ./?module=license");
		exit;
	}

}
?>