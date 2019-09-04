<?php

require './config.php';
require_once LIB_PATH . '/kernel.php';
$type = $_GET['type'];
$planid = $_GET['pid'];
$ip = $_SERVER['REMOTE_ADDR'];
if (($type == 'ecstats') || ($type == 'ef')) {
	if ($type == 'ecstats') {
		$c = addslashes($_COOKIE['do2click_' . $planid]);
	}
	else {
		$c = addslashes($_COOKIE['doEffect_' . $planid]);
	}

	if (!$c) {
		exit();
	}

	$e = explode('|', $c);
	$adsid = (int) $e[0];
	$planid = (int) $e[1];
	$uid = (int) $e[2];
	$zoneid = (int) $e[3];
	$siteid = (int) $e[4];

	if ($type == 'ecstats') {
		dr('jump/jump.updata_2click', DAYS, $ip, $planid, $adsid, $uid, $zoneid, $siteid, 2);
	}
	else {
		dr('jump/jump.updata_effect', DAYS, $ip, $planid, $adsid, $uid, $zoneid, $siteid, 1);
	}

	exit();
}

if ($type == 'ecv') {
	$adsid = (int) $_GET['adsid'];
	$planid = (int) $_GET['planid'];
	$uid = (int) $_GET['uid'];
	$zoneid = (int) $_GET['oneid'];
	$siteid = (int) $_GET['siteid'];
	$adtplid = (int) $_GET['adtplid'];
	$plantype = $_GET['plantype'];
	dr('jump/jump.updata_click', DAYS, $ip, $planid, $adsid, $uid, $zoneid, $siteid, $adtplid, $plantype, 3);
	exit();
}

echo "\r\n" . '(function() {' . "\r\n" . 'var z =  {' . "\r\n\t\t" . 's:function(name){' . "\r\n\t\t\t" . 'var Then = new Date();' . "\r\n\t\t\t" . 'Then.setTime(Then.getTime()+ 60 * 1000*60);' . "\r\n\t\t\t" . 'document.cookie=name+\'=1;expires=\'+ Then.toGMTString()+\';path=/;\';' . "\r\n\t\t" . '},' . "\r\n\t\t" . 'g:function(name){' . "\r\n\t\t\t" . 'var search = name + "=";' . "\r\n\t\t\t" . 'var vauel = "";' . "\r\n\t\t\t" . 'if (document.cookie.length > 0) {' . "\r\n\t\t\t\t" . 'offset = document.cookie.indexOf(search);' . "\r\n\t\t\t\t" . 'if (offset != -1) {' . "\r\n\t\t\t\t\t" . 'offset += search.length;' . "\r\n\t\t\t\t\t" . 'end = document.cookie.indexOf(";", offset);' . "\r\n\t\t\t\t\t" . 'if (end == -1){' . "\r\n\t\t\t\t\t\t" . 'vauel=unescape(document.cookie.substring(offset, document.cookie.length));' . "\r\n\t\t\t\t\t" . '}else{' . "\r\n\t\t\t\t\t\t" . 'vauel=unescape(document.cookie.substring(offset, end));' . "\r\n\t\t\t\t\t\t" . '}' . "\r\n\t\t\t\t\t" . '}' . "\r\n\t\t\t" . '}' . "\r\n\t\t\t" . 'return vauel;' . "\r\n\t\t" . '},' . "\r\n\t\t" . 'g:function(d, c) {' . "\r\n\t\t\t" . 'c = c || window;' . "\r\n\t\t\t" . 'if ("string" === typeof d || d instanceof String) {' . "\r\n\t\t\t\t" . 'return c.document.getElementById(d)' . "\r\n\t\t\t" . '} else {' . "\r\n\t\t\t\t" . 'if (d && d.nodeName && (d.nodeType == 1 || d.nodeType == 9)) {' . "\r\n\t\t\t\t\t" . 'return d' . "\r\n\t\t\t\t" . '}' . "\r\n\t\t\t" . '}' . "\r\n\t\t\t" . 'return d;' . "\r\n\t\t" . '},' . "\r\n\t\t" . 'a:function(c, d, e) {' . "\r\n\t\t\t" . 'c = z.g(c);' . "\r\n\t\t\t" . 'd = d.replace(/^on/i, "").toLowerCase();' . "\r\n\t\t\t" . 'if (c.addEventListener) {' . "\r\n\t\t\t\t" . 'c.addEventListener(d, e, false)' . "\r\n\t\t\t" . '} else {' . "\r\n\t\t\t\t" . 'if (c.attachEvent) {' . "\r\n\t\t\t\t\t" . 'c.attachEvent("on" + d, e)' . "\r\n\t\t\t\t" . '}' . "\r\n\t\t\t" . '}' . "\r\n\t\t\t" . 'return c;' . "\r\n\t\t" . '},' . "\r\n\t\t" . 'd:function (c, d, e) {' . "\r\n\t\t\t" . 'if (c.removeEventListener) {' . "\r\n\t\t\t\t" . 'c.removeEventListener(d, e, false);' . "\r\n\t\t\t" . '} else if (c.detachEvent) {' . "\r\n\t\t\t\t" . 'c.detachEvent("on" + d, e);' . "\r\n\t\t\t" . '} else { ' . "\r\n\t\t\t\t" . 'c["on" + d] = null;' . "\r\n\t\t\t" . '}' . "\r\n\t\t" . '},' . "\r\n\t\t" . 'b:function(){' . "\r\n\t\t\t" . 'var n = "__c_';
echo $planid;
echo '" ;' . "\r\n\t\t\t" . 'var a=new Image();' . "\t\r\n\t\t\t" . 'var url = "';
echo $GLOBALS['C_ZYIIS']['jump_url'] . WEB_URL;
echo 'effect.php?type=ecstats&pid=';
echo $planid;
echo '";' . "\r\n\t\t\t" . 'a.src=url;' . "\r\n\t\t\t" . 'z.d(document,"click",z.b);' . "\r\n\t\t\t" . 'z.s(n);' . "\r\n\t\t" . '},' . "\r\n\t\t" . 'c:function(){' . "\r\n\t\t\t" . 'var n = "__c_';
echo $planid;
echo '" ;' . "\r\n\t\t\t" . 'var a = z.g(n);' . "\r\n\t\t\t" . 'if(!a){' . "\r\n\t\t\t\t" . 'z.a(document,"click",z.b);' . "\r\n\t\t\t" . '}' . "\r\n\t\t\t\r\n\t\t" . '}' . "\r\n\t" . '}' . "\r\n\t" . 'z.c();' . "\r\n\r\n" . '})()';

?>
