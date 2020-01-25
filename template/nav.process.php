<?php  
switch (@$_GET['module']) {

	case 'user':
	if ($_SESSION['akses'] == 'User') {
		header("Location: ?module=userchild");
	}elseif (empty($_SESSION['akses'])) {
		header("Location: ?module=");
	}
	include "module/user/index.php";
	break;

	case 'userchild':
	if (empty($_SESSION['akses'])) {
		header("Location: ?module=");
	}
	include "module/userchild/index.php";
	break;

	case 'userchildtemplate':
	if (empty($_SESSION['akses'])) {
		header("Location: ?module=");
	}
	include "module/userchildtemplate/index.php";
	break;

	case 'license':
	include "module/license/index.php";
	break;

	case 'template':
	if (empty($_SESSION['akses'])) {
		header("Location: ?module=");
	}
	include "module/template/index.php";
	break;

	case 'tentangaplikasi':
	include "module/tentangaplikasi/index.php";
	break;

	case 'userinfo':
	include "module/userinfo/index.php";
	break;

	default:
	include "module/dashboard/index.php";
	break;
	
}
?>