<?php

class install
{
	public function __construct()
	{
	}

	public function index()
	{
		require tpl . 'index.php';
	}

	public function check()
	{

		$_SESSION['z_login'] = true;
		$type = $_GET['type'];

		if ($type == 'error') {
			$_SESSION['check_error'] = true;
			exit();
		}
		else if ($type == 'sun') {
			$_SESSION['check_error'] = '';
			exit();
		}

		require tpl . 'check.php';
	}

	public function login()
	{
		if ($_SESSION['check_error'] === true) {
			header('Location: index.php?action=check');
		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$post['username'] = $_POST['username'];
			$post['passwds'] = $_POST['passwds'];
			$post['imgcode'] = $_POST['imgcode'];
			$get = do_post('http://login.zyiis.com/?action=installlogin', $post);

			if ($get == 'e0') {
				$msg = '验证码无法确认，请重新输入';
			}
			else if ($get == 'e2') {
				$msg = '用户名密码不对，请重新登入';
			}
			else if ($get == 'e1') {
				$msg = '用户名还没有审核通过';
			}
			else if ($get == 'e4') {
				$msg = '用户名密码不能为空';
			}
			else if ($get == 'e11') {
				$msg = '请重新登入';
			}
			else {
				$msg = 'ok';
				$_SESSION['z_login'] = true;
			}

			echo $msg;
		}
		$msg = 'ok';
		$_SESSION['z_login'] = true;
		require tpl . 'login.php';
	}

	public function db()
	{
		//is_login();

		if ($_SESSION['check_error'] === true) {
			header('Location: index.php?action=check');
		}

		$db_error = $is_install = $install_sql = '';

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$dbhost = $_POST['dbhost'];
			$dbuser = $_POST['dbuser'];
			$dbpassword = $_POST['dbpassword'];
			$dbname = $_POST['dbname'];
			$dbport = $_POST['dbport'];
			if (!$dbhost || !$dbname || !$dbport || !$dbuser) {
				$db_error = '带*项不能为空';
			}

			$db = @mysql_connect($dbhost . ':' . $dbport, $dbuser, $dbpassword);

			if (!$db) {
				$db_error = '错误：连接数据库服务器失败 ' . mysql_errno() . ': ' . mysql_error();
			}
			else {
				mysql_query('SET NAMES utf8', $db);

				if (!@mysql_select_db($dbname, $db)) {
					mysql_query('CREATE DATABASE ' . $dbname);

					if (!@mysql_select_db($dbname, $db)) {
						$db_error = '错误：指定的数据库不存在, 系统也无法自动建立 ' . mysql_errno() . ': ' . mysql_error();
					}
					else {
						$install_sql = 'y';
					}
				}
				else {
					$install_sql = 'y';
					$query = mysql_query('SHOW TABLE STATUS FROM `' . $dbname . '`');

					while ($row = mysql_fetch_array($query)) {
						if (($row['Name'] == 'zyads_admin') || ($row['Name'] == 'zyads_plan')) {
							$is_install = 'y';

							if (!$_POST['forceinstall']) {
								$install_sql = 'n';
							}
						}
					}
				}
			}

			if ($install_sql == 'y') {
				$sql = @file_get_contents('../var/zyiis.sql');

				if (!$sql) {
					$db_error = '数据库脚本文件var/zyiis.sql丢失';
					$install_sql = 'n';
				}
				else {
					$sql = str_replace("\r", "\n", $sql);
					$querysql = array();
					$n = 0;

					foreach (explode(';' . "\n", trim($sql)) as $query ) {
						$b_i = explode("\n", trim($query));

						foreach ($b_i as $query ) {
							@$querysql[$n] .= (($query[0] == '#') || (($query[0] . $query[1]) == '--') ? '' : $query);
						}

						$n++;
					}

					unset($sql);
					ob_end_clean();
					flush();
					ob_flush();
				}
			}

			$_SESSION['db_data'] = $_POST;
		}

		require tpl . 'db.php';
	}

	public function last()
	{
		//is_login();

		if ($_SESSION['check_error'] === true) {
			header('Location: index.php?action=check');
		}

		require tpl . 'last.php';
		$dbs = $_SESSION['db_data'];
		$getflie = '../config.php';
		$data = file_get_contents($getflie);
		$data = str_replace('{dbhost}', $dbs['dbhost'], $data);
		$data = str_replace('{dbport}', $dbs['dbport'], $data);
		$data = str_replace('{dbuser}', $dbs['dbuser'], $data);
		$data = str_replace('{dbpwd}', $dbs['dbpassword'], $data);
		$data = str_replace('{dbname}', $dbs['dbname'], $data);
		$data = str_replace('{web_url}', base_uri(), $data);
		file_put_contents($getflie, $data);
		$getflie = '../settings.php';
		$data = file_get_contents($getflie);
		$data = str_replace('{authorized_url}', $_SESSION['authorized_url'], $data);
		$data = str_replace('{url_key}', $_SESSION['url_key'], $data);
		$data = str_replace('{site_ip}', $_SERVER['SERVER_ADDR'], $data);
		file_put_contents($getflie, $data);
		$filename = __DIR__ . '/index.php';
		$tmp_filename = md5(substr(md5(rand()), 1, 4));
		rename($filename, $tmp_filename);
		$dbfilename = '../var/zyiis.sql';
		$tmp_filename = md5(substr(md5(rand()), 1, 5));
		rename($dbfilename, $tmp_filename);
	}
}

function is_login()
{
	return ;
	$post['s'] = $_GET['s'];
	$get = do_post('http://login.zyiis.com/?action=installgetsid', $post);
	$text = preg_replace('/[^a-zA-Z]/', '', $get);

	if (!$text) {
		header('Location: index.php?action=login');
	}
}

function ins($query, $db)
{
	$query = trim($query);

	if ($query) {
		if (substr($query, 0, 12) == 'CREATE TABLE') {
			$name = preg_replace('/CREATE TABLE `([a-z0-9_]+)` .*/is', '\\1', $query);

			if (mysql_query($query, $db)) {
				$btext = '成功';
			}
			else {
				$btext = '失败';
			}

			echo '<script type="text/javascript">show_msg("' . '建立数据表:  ' . $name . ' ... ' . $btext . '")</script>';
		}
		else {
			if (mysql_query($query, $db)) {
				$itext = '成功';
			}
			else {
				$itext = '失败';
			}

			if (substr($query, 0, 11) == 'INSERT INTO') {
				$name = preg_replace('/INSERT INTO `([a-z0-9_]+)` .*/is', '\\1', $query);
				echo '<script type="text/javascript">show_msg("' . '建立初始数据:  ' . $name . ' ... ' . $itext . '")</script>';
			}
		}
	}

	flush();
	ob_flush();
}

function ina($db)
{
	$username = mysql_real_escape_string(trim($_POST['admin']));
	$password = mysql_real_escape_string(md5(md5($_POST['admin_pwd'] . $_POST['admin'] . '123987')));
	$sql = 'INSERT INTO `zyads_administrator` (`username`, `password`, `rolesid`,  `status`, `addtime`) VALUES(\'' . $username . '\', \'' . $password . '\', 1,1,\'' . date('Y-m-d H:i:s', time()) . '\')';
	mysql_query($sql, $db);
	echo '<script type="text/javascript">show_msg("' . '创建管理员:   ... 成功")</script>';
	flush();
	ob_flush();
}

function ine($db)
{
	$urlkey = substr(md5(rand()), 1, 4);
	//$Licinfo = zend_loader_file_licensed();
	//$authorized_url = $Licinfo['Registered-To'];
	$authorized_url=@$_SERVER['HTTP_HOST'];
	$_SESSION['authorized_url'] = $authorized_url;
	$_SESSION['url_key'] = $urlkey;
	mysql_query('REPLACE INTO zyads_settings VALUES (\'ins_k\', \'' . md5($authorized_url . $urlkey) . '\')');
	mysql_query('REPLACE INTO zyads_settings VALUES (\'authorized_url\', \'' . $authorized_url . '\')');
	mysql_query('REPLACE INTO zyads_settings VALUES (\'url_key\', \'' . $urlkey . '\')');
	mysql_query('REPLACE INTO zyads_settings VALUES (\'jump_url\', \'http://' . $authorized_url . '\')');
	mysql_query('REPLACE INTO zyads_settings VALUES (\'img_url\', \'http://' . $authorized_url . '\')');
	mysql_query('REPLACE INTO zyads_settings VALUES (\'js_url\', \'http://' . $authorized_url . '\')');
	echo '<script type="text/javascript">show_msg("' . '基本设置初始化:   ... 成功")</script>';
	flush();
	ob_flush();
}

function iae($querysql, $db)
{
	foreach ($querysql as $query ) {
		ins($query, $db);
	}

	ina($db);
	sleep(1);
	ine($db);
	sleep(1);
	echo '<script type="text/javascript">show_msg("正在安装数据库 ... 成功")</script>';
	echo '<script type="text/javascript">' . "\r\n" . 'setTimeout(function(){window.location="index.php?action=last&s=' . $_GET['s'] . '"}, 1000);' . "\r\n" . '</script>' . "\r\n\t";
}

function base_uri()
{
	$PHP_SELF = $_SERVER['PHP_SELF'];
	$url = dirname(substr($PHP_SELF, 0, strrpos($PHP_SELF, '/') + 1));
	if (($url == '/') || ($url == '\\')) {
		$base_uri = '/';
	}
	else {
		$base_uri = $url . '/';
	}

	return $base_uri;
}

function gd_version()
{
	if (function_exists('gd_info')) {
		$GDArray = gd_info();
		$gd_version_number = ($GDArray['GD Version'] ? $GDArray['GD Version'] : 0);
		unset($GDArray);
	}
	else {
		$gd_version_number = 0;
	}

	return $gd_version_number;
}

function is_mysql()
{
	if (!extension_loaded('mysql')) {
		return false;
	}

	return true;
}

function is_mcrypt()
{
	if (!extension_loaded('mcrypt')) {
		return false;
	}

	return true;
}

function zend_ver()
{
	if (!extension_loaded('Zend Guard Loader')) {
		return false;
	}

	$ver = zend_loader_version();

	if ($ver < 3.3) {
		return $ver;
	}

	return 'ok';
}

function php_ver()
{
	$ver = PHP_VERSION;

	if ($ver < 5.4) {
		return $ver;
	}

	return 'ok';
}

function internet()
{
	$h = gethostbyname('www.qq.com');

	if ($h == 'www.qq.com') {
		return false;
	}

	return true;
}

function lic()
{
	return @$_SERVER['HTTP_HOST'];
	/*
	if (zend_ver() == 'ok') {
		$Licinfo = zend_loader_file_licensed();
		return $Licinfo['Registered-To'];
	}

	return false;
	*/
}

function get_ck_path()
{
	$path = array('./a' => dirname(__DIR__) . '/a', './var/log' => dirname(__DIR__) . '/var/log', './var/cache/a' => dirname(__DIR__) . '/var/cache/a', './var/cache/v' => dirname(__DIR__) . '/var/cache/v', './var/cache/z' => dirname(__DIR__) . '/var/cache/z', './install' => dirname(__DIR__) . '/install', './config.php' => dirname(__DIR__) . '/config.php', './settings.php' => dirname(__DIR__) . '/settings.php');
	return $path;
}

function get_x_function()
{
	$fun = array('gethostbyname' => 'gethostbyname', 'file_get_contents' => 'file_get_contents', 'fsockopen' => 'fsockopen', 'mcrypt_encrypt' => 'mcrypt_encrypt');
	return $fun;
}

function is_wr($file)
{
	if (is_dir($file)) {
		$file = rtrim($file, '/') . '/' . md5(rand(1, 100));

		if (($fp = @fopen($file, 'ab')) === false) {
			return false;
		}

		fclose($fp);
		@chmod($file, 511);
		@unlink($file);
		return true;
	}
	else if (($fp = @fopen($file, 'ab')) === false) {
		return false;
	}

	fclose($fp);
	return true;
}

function do_post($url, $postdata)
{
	$optionpost = array(
		'http' => array('timeout' => 8, 'method' => 'POST', 'header' => 'User-Agent:Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0)' . "\r\n" . 'Accept:*/*' . "\r\n" . 'Referer:www.zyiis.com', 'content' => http_build_query($postdata, '', '&'))
		);
	$text = @file_get_contents($url, false, stream_context_create($optionpost));
	return $text;
}

date_default_timezone_set('Asia/Shanghai');
error_reporting(~8);
session_start();
define('IS_INSTALL', true);
$_SESSION['z_login'] = false;
$action = @$_GET['action'];
define('tpl', __DIR__ . '/tpl/');
$i = new install();

if (!$action) {
	$action = 'index';
}

$i->$action();

?>
