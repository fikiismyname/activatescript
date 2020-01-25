<?php
header('Content-Type: application/javascript');
require 'Packer.php';
error_reporting(E_ALL);
$js = file_get_contents('real.js');
$packer = new Tholu\Packer\Packer($js, 'Numeric', false, false, false);
$packed_js = $packer->pack();
$packed_js = $packer->pack();
echo $packed_js; ?>