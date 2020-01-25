<?php  
if (isset($_POST['update'])) {
	$template = $_POST['template'];
	$url = $_POST['url'];
	$protected = base64_encode($_POST['protected']);	
	$id = $_POST['id'];

	$direcotry = 'files/protected/';

	// delete old file
	$template_old = $_POST['template_old'];
	$file_old = $direcotry.str_replace(' ', '', $template_old).".js";
	unlink($file_old);
	
	// create new file
	$file = $direcotry.str_replace(' ', '', $template).".js";
	$getbase = file_get_contents('files/protected.js');
	$replace = str_replace('//________replace________', $_POST['protected'], $getbase);
	$replace = str_replace('##________replace________##', home_base_url().'files/validate.php', $replace);;	

	//packed 
	include "config/packer.php";
	$packer = new Tholu\Packer\Packer($replace, 'Numeric', false, false, false);
	$packed_js = $packer->pack();

	$script = $packed_js;
	if (file_put_contents($file, $script)) {
		$sql = "UPDATE tb_template SET template='$template',url='$url',protected='$protected' WHERE id='$id'";
		if ($mysql->query($sql) === TRUE) {
			sweetalert('Berhasil Update Template !','success');		
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