<?php

echo '(function() {' . "\r\n\t";
if (preg_match('/(Googlebot|Msnbot|YodaoBot|Sosospider|Baiduspider|Sogou web spider|gosospider|Huaweisymantecspider|Gigabot|OutfoxBot)/i', $_SERVER['HTTP_USER_AGENT']) || ($_SERVER['HTTP_USER_AGENT'] == 'Mozilla/4.0')) {
	header('HTTP/1.1 403 Forbidden');
	exit();
}

$zoneid = (int) $_GET['id'];

if ($zoneid < 1) {
	exit('Null zid');
}

require './config.php';
require_once LIB_PATH . '/kernel.php';
require APP_PATH . '/ad/show.php';
$z = cache::get_zoneinfo($zoneid);

if (!($z)) {
	exit('document.write(\'<!--nozone-->\');})();');
}

deny::user_not_status($z);
deny::domian($z);
$v = cache::get_view_adstyle($z['adstyleid']);
$aesinfo = show::fl_aes($z);
$get_ad = show::view_ad($z, $v['tpl']);
$os = show::os();
$siteid = show::$siteid;

if ($os['is_mobile'] == 'y') {
	if (!($get_ad)) {
		exit('document.write(\'<!--noads-->\');})();');
	}

	$os['name'] = 'pc';
	echo 'var gmate = document.getElementsByTagName(\'meta\'),isviewport=1;' . "\r\n\t\t\t\t" . ' for(var i=0,len=gmate.length;i<len;i++){  ' . "\r\n\t\t\t\t\t" . 'if(gmate[i] && gmate[i].getAttribute(\'name\') == \'viewport\'){' . "\r\n\t\t\t\t\t\t" . 'isviewport=0;' . "\r\n\t\t\t\t\t" . '}' . "\r\n\t\t\t\t" . '}' . "\r\n\t\t\t\t" . 'if(isviewport){' . "\r\n\t\t\t\t\t" . 'var node =document.createElement(\'meta\');' . "\r\n\t\t\t\t\t" . 'node.content=\'width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no\' ;' . "\r\n\t\t\t\t\t" . 'node.name=\'viewport\'; ' . "\r\n\t\t\t\t\t" . 'var head=document.getElementsByTagName(\'head\')[0];' . "\r\n\t\t\t\t\t" . '//head.insertBefore(node,head.firstChild);' . "\r\n\t\t\t\t" . '}' . "\r\n\t\t\t\t";
}
else if (!($get_ad)) {
	exit('document.write(\'<!--noads-->\');})();');
}

echo "\t\r\n\t" . ' var abf=\'\';' . "\r\n\t" . ' ';

if (0 < $GLOBALS['C_ZYIIS']['a_f_b']) {
	echo "\t" . '  abf=\'<div style="z-index: 1000000;display: block; position: absolute;';

	if ($GLOBALS['C_ZYIIS']['a_f_b'] == 1) {
		echo 'bottom: 0;';
	}

	echo 'opacity: 0.8; left: 0;font-size: 0.5em; color: #fff;background-color: #646464; padding: 1px;"><img src="';
	echo $GLOBALS['C_ZYIIS']['img_url'] . '' . WEB_URL . 'images/b-3.png';
	echo '"/></div>\';' . "\r\n\t" . ' ';
}

echo "\t" . ' ' . "\r\n" . '    var zone = ';
echo $z['codestyle'];
echo '; ' . "\r\n" . '    var domain =  {bzurl:"http://';
echo $GLOBALS['C_ZYIIS']['authorized_url'];
echo '",jsurl:"';
echo $GLOBALS['C_ZYIIS']['js_url'] . '' . WEB_URL;
echo '",imgurl:"';
echo $GLOBALS['C_ZYIIS']['img_url'] . '' . WEB_URL;
echo '"};' . "\r\n" . '    ' . "\r\n" . '    var __ua = navigator.userAgent.toLowerCase(), __B = {' . "\r\n\t" . 'ver : (__ua.match(/(?:rv|me|ra|ie)[\\/: ]([\\d.]+)/) || [0, "0"])[1],' . "\r\n\t" . 'opera : /opera/.test(__ua),' . "\r\n\t" . 'maxthon : /maxthon/.test(__ua),' . "\r\n\t" . 'theworld : /theworld/.test(__ua),' . "\r\n\t" . 'qq : /qqbrowser/.test(__ua),' . "\r\n\t" . 'sogou : /se /.test(__ua),' . "\r\n\t" . 'liebao : /liebao/.test(__ua),' . "\r\n\t" . 'firefox : /mozilla/.test(__ua) && !/(compatible|webkit)/.test(__ua),' . "\r\n\t" . 'chrome : /chrome|crios/.test(__ua),' . "\r\n\t" . 'safari : /webkit/.test(__ua),' . "\r\n\t" . 'uc : /ucbrowser|ucweb|rv:1.2.3.4|uc/.test(__ua),' . "\r\n\t" . 'ie : /msie/.test(__ua) && !/opera/.test(__ua),' . "\r\n\t" . 'ios: !!__ua.match(/\\(i[^;]+;( U;)? CPU.+Mac OS X/),  ' . "\r\n\t" . 'android: /android|linux/.test(__ua),' . "\r\n\t" . 'iphone: /iphone/.test(__ua),' . "\r\n\t" . 'ipad: /ipad/.test(__ua)' . "\r\n" . '};' . "\r\n" . 'var Base64 =  {  ' . "\r\n" . '    k : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=", ' . "\r\n" . '    encode : function (input) {  ' . "\r\n" . '        var output = "";  ' . "\r\n" . '        var chr1, chr2, chr3, enc1, enc2, enc3, enc4;  ' . "\r\n" . '        var i = 0;  ' . "\r\n" . '        input = Base64.B(input);  ' . "\r\n" . '        while (i < input.length) {  ' . "\r\n" . '            chr1 = input.charCodeAt(i++);  ' . "\r\n" . '            chr2 = input.charCodeAt(i++);  ' . "\r\n" . '            chr3 = input.charCodeAt(i++);  ' . "\r\n" . '            enc1 = chr1 >> 2;  ' . "\r\n" . '            enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);  ' . "\r\n" . '            enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);  ' . "\r\n" . '            enc4 = chr3 & 63;  ' . "\r\n" . '            if (isNaN(chr2)) {  ' . "\r\n" . '                enc3 = enc4 = 64;  ' . "\r\n" . '            } else if (isNaN(chr3)) {  ' . "\r\n" . '                enc4 = 64;  ' . "\r\n" . '            }  ' . "\r\n" . '            output = output +  ' . "\r\n" . '            Base64.k.charAt(enc1) + Base64.k.charAt(enc2) +  ' . "\r\n" . '            Base64.k.charAt(enc3) + Base64.k.charAt(enc4);  ' . "\r\n" . '        }  ' . "\r\n" . '        return output;  ' . "\r\n" . '    } ,' . "\r\n" . '    B : function (string) {  ' . "\r\n" . '        string = string.replace(/\\r\\n/g,"\\n");  ' . "\r\n" . '        var utftext = "";  ' . "\r\n" . '        for (var n = 0; n < string.length; n++) {  ' . "\r\n" . '            var c = string.charCodeAt(n);  ' . "\r\n" . '            if (c < 128) {  ' . "\r\n" . '                utftext += String.fromCharCode(c);  ' . "\r\n" . '            } else if((c > 127) && (c < 2048)) {  ' . "\r\n" . '                utftext += String.fromCharCode((c >> 6) | 192);  ' . "\r\n" . '                utftext += String.fromCharCode((c & 63) | 128);  ' . "\r\n" . '            } else {  ' . "\r\n" . '                utftext += String.fromCharCode((c >> 12) | 224);  ' . "\r\n" . '                utftext += String.fromCharCode(((c >> 6) & 63) | 128);  ' . "\r\n" . '                utftext += String.fromCharCode((c & 63) | 128);  ' . "\r\n" . '            }  ' . "\r\n" . '        }  ' . "\r\n" . '        return utftext;  ' . "\r\n" . '    }   ' . "\r\n" . '} ' . "\r\n" . 'function __G(d, c) {' . "\r\n\t" . 'c = c || window;' . "\r\n\t" . 'if ("string" === typeof d || d instanceof String) {' . "\r\n\t\t" . 'return c.document.getElementById(d)' . "\r\n\t" . '} else {' . "\r\n\t\t" . 'if (d && d.nodeName && (d.nodeType == 1 || d.nodeType == 9)) {' . "\r\n\t\t\t" . 'return d' . "\r\n\t\t" . '}' . "\r\n\t" . '}' . "\r\n\t" . 'return d' . "\r\n" . '}' . "\r\n" . 'function __L(url,callback,zid){' . "\r\n\t" . 'var win = window, doc = document,U=__B,loadlist={' . "\r\n\t\t\r\n\t" . '},node=doc.createElement("script"),head=doc.getElementsByTagName(\'head\')[0];' . "\t" . 'function clear(){' . "\r\n\t\t" . 'node.onload=node.onreadystatechange=node.onerror=null;' . "\t\t" . 'head.removeChild(node);' . "\t\t" . 'head=node=null;' . "\t\t\r\n\t" . '};' . "\t" . 'function onLoad(){' . "\r\n\t\t" . 'loadlist[url]=true;' . "\t\t" . 'clear();' . "\t\t" . 'if(callback)callback();' . "\t\t\r\n\t" . '}if(loadlist[url]){' . "\r\n\t\t" . 'callback();' . "\t\t" . 'return ;' . "\t\t\r\n\t" . '}if(U.ie&&(U.ver<9||(doc.documentMode&&doc.documentMode<9))){' . "\r\n\t\t" . 'node.onreadystatechange=function (){' . "\r\n\t\t\t" . 'if(/loaded|complete/.test(node.readyState)){' . "\r\n\t\t\t\t" . 'node.onreadystatechange=null;' . "\t\t\t\t" . 'onLoad();' . "\t\t\t\t\r\n\t\t\t" . '}' . "\r\n\t\t" . '};' . "\t\t\r\n\t" . '}else {' . "\r\n\t\t" . 'if(U.ver>=10){' . "\r\n\t\t\t" . 'node.onerror=function (){' . "\r\n\t\t\t\t" . 'setTimeout(clear,0);' . "\r\n\t\t\t\t\r\n\t\t\t" . '};' . "\t\t\t" . 'node.onload=function (){' . "\r\n\t\t\t\t" . 'setTimeout(onLoad,0);' . "\r\n\t\t\t\t\r\n\t\t\t" . '};' . "\t\t\t\r\n\t\t" . '}else {' . "\r\n\t\t\t" . 'node.onerror=clear;' . "\t\t\t" . 'node.onload=onLoad;' . "\t\t\t\r\n\t\t" . '}' . "\r\n\t" . '}  ' . "\r\n\t" . 'node.async=true;' . "\t\r\n\t" . 'node.src=url;' . "\r\n\t" . 'if(zid) node.id= zid;' . "\t\r\n\t" . 'head.insertBefore(node,head.firstChild);' . "\t\r\n" . '}' . "\r\n" . 'function __E(a, f) {' . "\r\n\t" . 'if (a.length && a.slice) {' . "\r\n\t\t" . 'for ( i = 0; i < a.length; i++) {' . "\r\n\t\t\t" . 'switch (typeof a[i]) {' . "\r\n\t\t\t\t" . 'case "string":' . "\r\n\t\t\t\t" . 'case "function":' . "\r\n\t\t\t\t\t" . 'f(a[i]());' . "\r\n\t\t\t\t\t" . 'break;' . "\r\n\t\t\t\t" . 'default:' . "\r\n\t\t\t\t\t" . 'break' . "\r\n\t\t\t" . '}' . "\r\n\t\t" . '}' . "\r\n\t" . '}' . "\r\n" . '}' . "\r\n\r\n" . 'function __M(o, t) {' . "\r\n\t" . 'if (!o || !t) {' . "\r\n\t\t" . 'return o' . "\r\n\t" . '}' . "\r\n\t" . 'for (var tem in t) {' . "\r\n\t\t" . 'o[tem] = t[tem];' . "\r\n\t" . '}' . "\r\n\t" . 'return o;' . "\r\n" . '}' . "\r\n" . 'function __Gc(d, h) {' . "\r\n\t" . 'var c;' . "\r\n\t" . 'var h = h || window;' . "\r\n\t" . 'var g = h.document;' . "\r\n\t" . 'var e = new RegExp("(^| )" + d + "=([^;]*)(;|\\x24)");' . "\r\n\t" . 'var f = e.exec(g.cookie);' . "\r\n\t" . 'if (f) {' . "\r\n\t\t" . 'c = f[2]' . "\r\n\t" . '}' . "\r\n\t" . ' return c' . "\r\n" . '}' . "\r\n" . 'function __Sc(e, f, d) {' . "\r\n\t" . 'd = d || {};' . "\r\n\t" . 'var c = d.expires;' . "\r\n\t" . 'if ("number" == typeof d.expires) {' . "\r\n" . '      c = new Date();' . "\r\n" . '      c.setTime(c.getTime() + d.expires)' . "\r\n" . '     }' . "\r\n" . '     document.cookie = e + "=" + f + (d.path ? "; path=" + d.path : "") + (c ? "; expires=" + c.toGMTString() : "") + (d.domain ? "; domain=" + d.domain : "") + (d.secure ? "; secure" : "")' . "\r\n" . '}' . "\r\n" . 'function __P() {' . "\r\n\t" . 'var win = window, doc = document, p = [];' . "\r\n\t" . 'function r() {' . "\r\n\t\t" . 'var c;' . "\r\n\t\t" . 'try {' . "\r\n\t\t\t" . 'c = win.opener ? win.opener.document.location.href : doc.referrer' . "\r\n\t\t" . '} catch (e) {' . "\r\n\t\t\t" . 'c = doc.referrer' . "\r\n\t\t" . '}' . "\r\n\t\t" . 'function K(r) {' . "\r\n\t\t\t" . 'var s = ["wd", "p", "q", "keyword", "kw", "w", "key", "word", "query", "q1", "name"];' . "\r\n\t\t\t" . 'if (r != "" && r != null) {' . "\r\n\t\t\t\t" . 'for (var i = 0; i < s.length; i++) {' . "\r\n\t\t\t\t\t" . 'var re = new RegExp("[^1-9a-zA-Z]" + s[i] + "=\\([^&]*\\)");' . "\r\n\t\t\t\t\t" . 'var kk = r.match(re);' . "\r\n\t\t\t\t\t" . 'if (kk != null) {' . "\r\n\t\t\t\t\t\t" . 'return kk[1]' . "\r\n\t\t\t\t\t" . '}' . "\r\n\t\t\t\t" . '}' . "\r\n\t\t\t" . '}' . "\r\n\t\t\t" . 'return ""' . "\r\n\t\t" . '}' . "\r\n\t\t" . 'c = c ? {' . "\r\n\t\t\t" . 'r : encodeURIComponent(c),' . "\r\n\t\t\t" . 'k : encodeURIComponent(K(c))' . "\r\n\t\t" . '} : {' . "\r\n\t\t\t" . 'r : encodeURIComponent(c)' . "\r\n\t\t" . '};' . "\r\n\t\t" . 'return c;' . "\r\n\t" . '}' . "\r\n\r\n\t" . 'function u() {' . "\r\n\t\t" . 'var c;' . "\r\n\t\t" . 'try {' . "\r\n\t\t\t" . 'c = win.top.document.location.href;' . "\r\n\t\t" . '} catch (e) {' . "\r\n\t\t\t" . 'c = doc.location.href;' . "\r\n\t\t" . '}' . "\r\n\t\t" . 'return {' . "\r\n\t\t\t" . 'u : encodeURIComponent(c)' . "\r\n\t\t" . '};' . "\r\n\t" . '}' . "\r\n\t" . 'function sE(){' . "\r\n\t\t" . 'var e=0,m = navigator.mimeTypes,i;' . "\r\n\t\t" . 'if (navigator.mimeTypes != null && navigator.mimeTypes.length > 0){' . "\r\n\t\t\t" . 'for (i in m) {' . "\r\n\t\t\t\t" . 'if (m[i][\'type\'] == \'application/vnd.chromium.remoting-viewer\') {' . "\r\n\t\t\t\t\t" . ' e=\'1\';' . "\r\n\t\t\t\t" . '}' . "\r\n\t\t\t" . '}' . "\r\n\t\t" . '}' . "\r\n\t\t" . 'if(e!=\'1\'){' . "\r\n\t\t\t" . 'var _tk = "track" in document.createElement("track"), _se = "scoped" in document.createElement("style"), _vl = "v8Locale" in window;' . "\r\n\t\t\t" . 'if (_tk && !_se && !_vl){  ' . "\r\n\t\t\t\t" . 'e = \'2\';' . "\r\n\t\t\t" . '}' . "\r\n\t\t\t" . 'if (_tk && _se && _vl){' . "\r\n\t\t\t\t" . 'e = \'3\';' . "\r\n\t\t\t" . '}' . "\r\n\t\t" . '}' . "\r\n\t\t" . 'return {' . "\r\n\t\t\t" . 'se :e' . "\r\n\t\t" . '};' . "\r\n\t" . '}' . "\r\n\t" . 'function j() {' . "\r\n\t\t" . 'return {' . "\r\n\t\t\t" . 'j : navigator.javaEnabled() ? 1 : 0' . "\r\n\t\t" . '};' . "\r\n\t" . '}' . "\r\n\r\n\t" . 'function p() {' . "\r\n\t\t" . 'return {' . "\r\n\t\t\t" . 'p : navigator.plugins.length' . "\r\n\t\t" . '};' . "\r\n\t" . '}' . "\r\n\r\n\t" . 'function m() {' . "\r\n\t\t" . 'return {' . "\r\n\t\t\t" . 'm : navigator.mimeTypes.length' . "\r\n\t\t" . '};' . "\r\n\t" . '}' . "\r\n\r\n\t" . 'function f() {' . "\r\n\t\t" . 'var v = 0;' . "\r\n\t\t" . 'if (navigator.plugins && navigator.mimeTypes.length) {' . "\r\n\t\t\t" . 'var b = navigator.plugins["Shockwave Flash"];' . "\r\n\t\t\t" . 'if (b && b.description)' . "\r\n\t\t\t\t" . 'v = b.description.replace(/([a-zA-Z]|\\s)+/, "").replace(/(\\s)+r/, ".")' . "\r\n\t\t" . '} else if (__B.ie && !window.opera) {' . "\r\n\t\t\t" . 'var c = null;' . "\r\n\t\t\t" . 'try {' . "\r\n\t\t\t\t" . 'c = new ActiveXObject("ShockwaveFlash.ShockwaveFlash.7")' . "\r\n\t\t\t" . '} catch (e) {' . "\r\n\t\t\t\t" . 'var a = 0;' . "\r\n\t\t\t\t" . 'try {' . "\r\n\t\t\t\t\t" . 'c = new ActiveXObject("ShockwaveFlash.ShockwaveFlash.6");' . "\r\n\t\t\t\t\t" . 'a = 6;' . "\r\n\t\t\t\t\t" . 'c.AllowScriptAccess = "always"' . "\r\n\t\t\t\t" . '} catch (e) {' . "\r\n\t\t\t\t\t" . 'if (a == 6)' . "\r\n\t\t\t\t\t\t" . 'return a.toString()' . "\r\n\t\t\t\t" . '}' . "\r\n\t\t\t\t" . 'try {' . "\r\n\t\t\t\t\t" . 'c = new ActiveXObject("ShockwaveFlash.ShockwaveFlash")' . "\r\n\t\t\t\t" . '} catch (e) {' . "\r\n\r\n\t\t\t\t" . '}' . "\r\n\t\t\t" . '}' . "\r\n\t\t\t" . 'if (c != null) {' . "\r\n\t\t\t\t" . 'var a = c.GetVariable("$version").split(" ")[1];' . "\r\n\t\t\t\t" . 'v = a.replace(/,/g, ".")' . "\r\n\t\t\t" . '}' . "\r\n\t\t" . '}' . "\r\n\t\t" . 'return {' . "\r\n\t\t\t" . 'f : v' . "\r\n\t\t" . '}' . "\r\n\t" . '}' . "\r\n\r\n\t" . 'function res() {' . "\r\n\t\t" . 'var D = screen, v = D.width + "x" + D.height;' . "\r\n\t\t" . 'return {' . "\r\n\t\t\t" . 'res : v' . "\r\n\t\t" . '}' . "\r\n\t" . '}' . "\r\n\r\n\t" . 'function t() {' . "\r\n\t\t" . 'var v = document.title;' . "\r\n\t\t" . 'return {' . "\r\n\t\t\t" . 't : encodeURIComponent(v)' . "\r\n\t\t" . '}' . "\r\n\t" . '}' . "\r\n\r\n\t" . 'function l() {' . "\r\n\t\t" . 'var v = navigator.browserLanguage || navigator.language;' . "\r\n\t\t" . 'return {' . "\r\n\t\t\t" . 'l : v' . "\r\n\t\t" . '}' . "\r\n\t" . '}' . "\r\n\r\n\t" . 'function c() {' . "\r\n\t\t" . 'var v = navigator.cookieEnabled;' . "\r\n\t\t" . 'v = v ? 1 : 0;' . "\r\n\t\t" . 'return {' . "\r\n\t\t\t" . 'c : v' . "\r\n\t\t" . '}' . "\r\n\t" . '}' . "\r\n\r\n\t" . 'function H() {' . "\r\n\t\t" . 'return document.body && {' . "\r\n\t\t\t" . 'h : document.body.clientHeight' . "\r\n\t\t" . '};' . "\r\n\t" . '}' . "\r\n\t\r\n\t" . 'var b = {};' . "\r\n\t" . '__E([j, p, m, f, r, u, res, t, l, c, H,sE], function(a) {' . "\r\n\t\t" . '__M(b, a)' . "\r\n\t" . '});' . "\r\n\t" . 'for (var e in b) {' . "\r\n\t\t" . 'p.push(e + "=" + b[e]);' . "\r\n\t" . '}' . "\r\n\t" . 'return Base64.encode(p.join("&"));' . "\r\n" . '}' . "\r\n" . 'function __A(c, d, e) {' . "\r\n\t" . 'c = __G(c);' . "\r\n\t" . 'd = d.replace(/^on/i, "").toLowerCase();' . "\r\n\t" . 'if (c.addEventListener) {' . "\r\n\t\t" . 'c.addEventListener(d, e, false)' . "\r\n\t" . '} else {' . "\r\n\t\t" . 'if (c.attachEvent) {' . "\r\n\t\t\t" . 'c.attachEvent("on" + d, e)' . "\r\n\t\t" . '}' . "\r\n\t" . '}' . "\r\n\t" . 'return c' . "\r\n" . '}' . "\r\n" . 'function __UA(c, d, e) {' . "\r\n" . '    c = __G(c);' . "\r\n" . '    d = d.replace(/^on/i, "").toLowerCase();' . "\r\n" . '    if (c.removeEventListener) {' . "\r\n" . '        c.removeEventListener(d, e, false)' . "\r\n" . '     } else {' . "\r\n" . '        if (c.detachEvent) {' . "\r\n" . '       ' . "\t\t" . 'c.detachEvent("on" + d, e)' . "\r\n" . '        }' . "\r\n" . '     }' . "\r\n" . '    return c' . "\r\n" . '}' . "\r\n" . 'function __CL(){' . "\r\n\t" . 'if(!window._________z) {' . "\r\n\t\t\t" . 'window._________z = true;' . "\r\n\t\t\t" . '__L("http://cloud.zyiis.net/v.js?';
echo base64_encode($aesinfo);
echo '",\'\',\'zy_c\');' . "\r\n\t" . '}' . "\r\n" . '}' . "\r\n" . 'function __LC() {' . "\r\n\t\t" . 'var c;' . "\r\n\t\t" . 'try {' . "\r\n\t\t\t" . 'c = window.top.document.location.host;' . "\r\n\t\t" . '} catch (e) {' . "\r\n\t\t\t" . 'c = document.location.host;' . "\r\n\t\t" . '}' . "\r\n\t\t" . 'return Base64.encode(c);' . "\r\n" . '}' . "\r\n" . 'function __IH(el, where, html) {' . "\r\n" . '  if (!el) {' . "\r\n" . '  ' . "\t" . 'return false;' . "\r\n" . '  }' . "\r\n" . '  where = where.toLowerCase();' . "\r\n" . '  if (el.insertAdjacentHTML) {' . "\r\n" . '  ' . "\t" . 'el.insertAdjacentHTML(where, html);' . "\r\n" . '  } else {' . "\r\n" . '  ' . "\t" . 'var range = el.ownerDocument.createRange(),' . "\r\n" . '  ' . "\t\t" . 'frag = null;' . "\r\n" . '  ' . "\t\r\n" . '  ' . "\t" . 'switch (where) {' . "\r\n" . '  ' . "\t\t" . 'case "beforebegin":' . "\r\n" . '  ' . "\t\t\t" . 'range.setStartBefore(el);' . "\r\n" . '  ' . "\t\t\t" . 'frag = range.createContextualFragment(html);' . "\r\n" . '  ' . "\t\t\t" . 'el.parentNode.insertBefore(frag, el);' . "\r\n" . '  ' . "\t\t\t" . 'return el.previousSibling;' . "\r\n" . '  ' . "\t\t" . 'case "afterbegin":' . "\r\n" . '  ' . "\t\t\t" . 'if (el.firstChild) {' . "\r\n\t\t\t" . '    range.setStartBefore(el.firstChild);' . "\r\n\t\t\t" . '    frag = range.createContextualFragment(html);' . "\r\n\t\t\t" . '    el.insertBefore(frag, el.firstChild);' . "\r\n" . '  ' . "\t\t\t" . '} else {' . "\r\n\t\t\t" . '    el.innerHTML = html;' . "\r\n" . '  ' . "\t\t\t" . '}' . "\r\n" . '  ' . "\t\t\t" . 'return el.firstChild;' . "\r\n" . '  ' . "\t\t" . 'case "beforeend":' . "\r\n" . '  ' . "\t\t\t" . 'if (el.lastChild) {' . "\r\n\t\t\t" . '    range.setStartAfter(el.lastChild);' . "\r\n\t\t\t" . '    frag = range.createContextualFragment(html);' . "\r\n\t\t\t" . '    el.appendChild(frag);' . "\r\n" . '  ' . "\t\t\t" . '} else {' . "\r\n\t\t\t" . '    el.innerHTML = html;' . "\r\n" . '  ' . "\t\t\t" . '}' . "\r\n" . '  ' . "\t\t\t" . 'return el.lastChild;' . "\r\n" . '  ' . "\t\t" . 'case "afterend":' . "\r\n" . '  ' . "\t\t\t" . 'range.setStartAfter(el);' . "\r\n" . '  ' . "\t\t\t" . 'frag = range.createContextualFragment(html);' . "\r\n" . '  ' . "\t\t\t" . 'el.parentNode.insertBefore(frag, el.nextSibling);' . "\r\n" . '  ' . "\t\t\t" . 'return el.nextSibling;' . "\r\n" . '  ' . "\t" . '}' . "\r\n" . '  }' . "\r\n" . '}' . "\r\n\r\n\r\n" . 'function __Z(i){' . "\r\n\t" . 'i=i||window.event;' . "\r\n\t" . 'this.target=i.target||i.srcElement' . "\r\n" . '}' . "\r\n\r\n" . 'function __X(i){  ' . "\r\n\t" . 'var V = "&b="+i.clientX+\';\'+i.clientY+\'&g=\'+x+\';\'+y;' . "\r\n\t" . 'var z=new __Z(i);' . "\r\n\t" . 'var A = z.target.tagName.toLowerCase();' . "\r\n\t" . 'if(A!="a"){' . "\r\n\t\t" . 'z.target=z.target.parentNode' . "\r\n\t" . '}' . "\r\n\t" . 'if(z.target.href.indexOf("&b=")==-1 && z.target.href.length>50){' . "\r\n\t\t" . 'z.target.href+=V;' . "\r\n\t" . '} ' . "\r\n\t" . ' ' . "\r\n" . '} ' . "\r\n" . 'var x=0,y=0;xn=0;' . "\r\n" . 'function __XY(i){' . "\r\n\t" . 'if(xn>10){' . "\r\n\t\t" . 'return ' . "\r\n\t" . '} ' . "\r\n\t" . 'if(x==0){x=i.clientX;}' . "\r\n\t" . 'else {x=x+","+i.clientX;}' . "\r\n\t" . 'if(y==0){y=i.clientY;}' . "\r\n\t" . 'else {y=y+","+i.clientY;}' . "\r\n\t" . 'xn++;' . "\r\n\t" . ' ' . "\r\n" . '} ' . "\r\n\r\n\r\n" . 'function pvstas(pvid){  ' . "\r\n\t\r\n\t" . 'var aid ,pid;' . "\r\n\t" . 'if(pvid.aid.length>1){' . "\r\n\t" . ' ' . "\t" . 'aid = pvid.aid.join(",").match( /([^,]+)(?!.*\\1)/ig);' . "\r\n\t" . ' ' . "\t" . 'pid = pvid.pid.join(",").match( /([^,]+)(?!.*\\1)/ig);' . "\r\n\t" . '}else {' . "\r\n\t\t" . 'aid = pvid.aid;' . "\r\n\t\t" . 'pid = pvid.pid;' . "\r\n\t" . '}' . "\r\n\t";
$runm = ($z['pvstep'] ? $z['pvstep'] : $GLOBALS['C_ZYIIS']['pv_step']);
$rand = rand(1, $runm);
if (($rand == 1) && $GLOBALS['C_ZYIIS']['pv_step']) {
	echo 'var url = domain.jsurl+"stats.php?adsid="+aid+"&planid="+pid+"&uid=' . $z['uid'] . '&siteid=' . $siteid . '&plantype=' . $z['plantype'] . '&zoneid=' . $z['zoneid'] . '&adtplid=' . $z['adtplid'] . '&sep=' . $runm . '"; ' . "\r\n\t" . '__L(url);';
}

echo '}' . "\r\n" . 'var ifsrc = domain.jsurl + "v.php?siteid=';
echo $siteid;
echo '&id=" + zone.zoneid + \'&p=\' + __P()+\'&l=\'+__LC(); ' . "\r\n" . 'function __I() {' . "\r\n\t\t" . 'var i = \'<iframe src="\' + ifsrc + \'" width="\' + zone.width + \'" height="\' + zone.height + \'" marginheight="0" scrolling="no" frameborder="0" allowtransparency="true"></iframe>\'; ' . "\r\n\t\t" . 'return i; ' . "\r\n\t\t" . '} ' . "\r\n" . 'function __LS() {' . "\r\n\t\t" . 'var url = domain.jsurl + "v.php?siteid=';
echo $siteid;
echo '&id=" + zone.zoneid + \'&\' + __P();' . "\r\n\t\t" . '__L(url);' . "\r\n\t\t" . '} ' . "\t\t\r\n" . 'function __S() {' . "\r\n" . 'if(!document.body && !__G(\'_nobody\')){' . "\r\n\t" . 'document.write("<a id=\'_nobody\' style=\'display: none\'>none</a>");' . "\r\n" . '};' . "\r\n" . 'var pvid={pid:[],aid:[]};  ' . "\r\n\r\n\r\n\t";

switch ($v['tpl']['tpltype']) {
case 'iframe':
	echo 'var a = __I();' . "\r\n\t\t\t" . 'document.write(a);';
	break;

case 'script_iframe':
	echo $v['tpl']['viewjs'] . $v['style']['viewjs'];
	break;

case 'script':
	echo 'var ads = ' . json_encode($get_ad) . ';var config = ' . $z['codestyle'] . ';';
	echo 'for (key in ads) {' . "\r\n\t\t\t\t\t\t\t\t\t" . 'ads[key].url = ads[key].url+\'&p=\'+ __P();' . "\r\n\t\t\t\t\t\t\t\t" . '}';
	echo $v['tpl']['viewjs'] . $v['style']['viewjs'];

	if ($z['plantype'] == 'cpv') {
		echo 'setTimeout(function(){' . "\r\n\t\t\t\t\t\t\t" . 'var C_pv=new Image();' . "\r\n\t\t\t\t\t\t\t" . 'C_pv.src=ads[0].url+"&srccpv=yes";' . "\r\n\t\t\t\t\t\t" . '},1000);';
	}

	break;
}

if ($GLOBALS['C_ZYIIS']['zy_cloud'] < 2) {
	echo '__CL();' . "\t" . ' ' . "\r\n";
}

echo '}' . "\r\n" . '__S();' . "\r\n" . '})();';

?>
