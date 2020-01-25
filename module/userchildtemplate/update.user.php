<?php  
if (isset($_POST['update'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$id = $_POST['id'];
	$sql = "UPDATE tb_user_child SET username='$username', password='$password' WHERE id='$id'";
	if ($mysql->query($sql) === TRUE) {
		sweetalert('Berhasil Update User !','success');		
		header("Location: ./?module=userchild");
		exit;
	}

}
?>