<?php
//域名 www_zyh_dir
define('WWW_ZYH_DIR', @$_SERVER['HTTP_HOST']);
//ip地址 www_zya_dir
define('WWW_ZYA_DIR', @$_SERVER['SERVER_ADDR'] ? @$_SERVER['SERVER_ADDR'] : @$_SERVER['LOCAL_ADDR']);
//这个应该是安全验证  www_rz_dir
define('WWW_RZ_DIR', '5AF7EB75771ADAA391151EFE127C5588');
$installs = is_file('./install/index.php');

if ($installs) {
	header('Location: ./install/index.php');
	exit();
}

require_once './config.php';
require_once '../library/init.php';
APP::run();

?>
