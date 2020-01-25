<?php  
if (isset($_POST['tambah'])) {
	$id_user = $_SESSION['id'];
	$template = $_POST['template'];
	$url = $_POST['url'];
	$protected = base64_encode($_POST['protected']);

	$direcotry = 'files/protected/';

	$file = $direcotry.str_replace(' ', '', $template).".js";
	$getbase = file_get_contents('files/protected.js');
	$replace = str_replace('//________replace________', $_POST['protected'], $getbase);
	$replace = str_replace('##________replace________##', home_base_url().'files/validate.php', $replace);	

	//packed 
	include "config/packer.php";
	$packer = new Tholu\Packer\Packer($replace, 'Numeric', false, false, false);
	$packed_js = $packer->pack();

	$script = $packed_js;
	if (file_put_contents($file, $script)) {
		$sql = "INSERT INTO tb_template
		VALUES ('', '$id_user', '$template', '$url', '$protected')";
		if ($mysql->query($sql) === TRUE) {
			sweetalert('Berhasil Tambah Template !','success');		
			header("Location: ./?module=template");
			exit;
		}
	}else{
		sweetalert('Gagal Tambah Template !','error');		
		header("Location: ./?module=template");
		exit;
	}

}
?>