<?php

echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">' . "\r\n" . '<html>' . "\r\n" . '<head>' . "\r\n" . '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />' . "\r\n";
require './config.php';
require_once LIB_PATH . '/kernel.php';
require APP_PATH . '/ad/show.php';
$z = cache::get_zoneinfo($_GET['id']);
$v = cache::get_view_adstyle($z['adstyleid']);
$ad = show::view_ad($z, $v['tpl']);

if (!($ad)) {
	exit($GLOBALS['C_ZYIIS']['show_text_notad']);
}

$os = show::os();
echo '<style>' . "\r\n" . 'body {' . "\r\n\t" . 'margin: 0px;' . "\r\n\t" . 'padding: 0px' . "\r\n" . '}' . "\r\n\r\n" . 'a#bz {' . "\r\n\t" . 'z-index: 1000000;' . "\r\n\t" . 'display: block;' . "\r\n\t" . 'position: absolute;' . "\r\n\t" . 'bottom: 0;' . "\r\n\t" . 'right: 0;' . "\r\n\t" . 'width: 22px;' . "\r\n\t" . 'height: 0;' . "\r\n\t" . 'padding-top: 18px;' . "\r\n\t" . 'overflow: hidden;' . "\r\n\t" . 'background: url(';
echo $GLOBALS['C_ZYIIS']['img_url'] . '' . WEB_URL;
echo 'images/b-1.png);' . "\r\n\t" . 'outline: 0;' . "\r\n\t" . 'blr: expression(this.onFocus = this.blur () );' . "\r\n" . '}' . "\r\n\r\n" . 'a#bz:hover {' . "\r\n\t" . 'width: 76px;' . "\r\n\t" . 'background: url(';
echo $GLOBALS['C_ZYIIS']['img_url'] . '' . WEB_URL;
echo 'images/b-2.png);' . "\r\n" . '}' . "\r\n\r\n" . '* html a#bz {' . "\r\n\t" . 'filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src="';
echo $GLOBALS['C_ZYIIS']['img_url'] . '' . WEB_URL;
echo 'images/b-1.png");' . "\r\n\t" . 'background: none;' . "\r\n\t" . 'cursor: pointer;' . "\r\n" . '}' . "\r\n\r\n" . '* * html a#bz:hover {' . "\r\n\t" . 'filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src="';
echo $GLOBALS['C_ZYIIS']['img_url'] . '' . WEB_URL;
echo 'images/b-2.png");' . "\r\n\t" . 'background: none;' . "\r\n\t" . 'cursor: pointer;' . "\r\n" . '}' . "\r\n\t\r\n" . '.a1{' . "\r\n\t" . 'z-index: 1000000;' . "\r\n" . '    display: block;' . "\r\n" . '    position: absolute;' . "\r\n\t" . ' ';

if ($GLOBALS['C_ZYIIS']['a_f_b'] == 1) {
	echo '    bottom: 0;' . "\r\n\t" . ' ';
}

echo '    opacity: 0.8;' . "\r\n" . '    left: 0;' . "\r\n" . '    font-size: 0.5em;' . "\r\n" . '    color: #fff;' . "\r\n" . '    background-color: #646464;' . "\r\n" . '    padding: 1px;' . "\r\n" . '}' . "\t\r\n" . '</style>' . "\r\n" . '</head>' . "\r\n" . '<body>' . "\r\n\t" . '<div id="container" class="container"></div>' . "\r\n\t" . ' ';

if ($GLOBALS['C_ZYIIS']['union_bz_status'] == '1') {
	echo "\t" . '<a id="bz" class="bz"' . "\r\n\t\t" . 'href="http://';
	echo $GLOBALS['C_ZYIIS']['authorized_url'] . '' . WEB_URL;
	echo '"' . "\r\n\t\t" . 'target="_blank">#bz</a>' . "\r\n\t";
}

echo "\t\r\n\t" . ' ';

if (0 < $GLOBALS['C_ZYIIS']['a_f_b']) {
	echo "\t" . ' <div class="a1"><img src="';
	echo $GLOBALS['C_ZYIIS']['img_url'] . '' . WEB_URL . 'images/b-3.png';
	echo '"/></div>' . "\r\n\t" . ' ';
}

echo '</body>' . "\r\n" . '<script>' . "\r\n" . 'var pvid={pid:[],aid:[]};' . "\r\n" . 'var ads = ';
echo json_encode($ad);
echo '; ' . "\r\n" . 'var config = ';
echo $z['codestyle'];
echo '; ' . "\r\n" . 'function pvstas(pvid){' . "\r\n\r\n\t";
$runm = ($z['pvstep'] ? $z['pvstep'] : $GLOBALS['C_ZYIIS']['pv_step']);
$rand = rand(1, $runm);
if (($rand == 1) && $GLOBALS['C_ZYIIS']['pv_step']) {
	echo "\t" . 'var aid ,pid;' . "\r\n\t" . 'if(pvid.aid.length>1){' . "\r\n\t" . ' ' . "\t" . 'aid = pvid.aid.join(",").match( /([^,]+)(?!.*\\1)/ig);' . "\r\n\t" . ' ' . "\t" . 'pid = pvid.pid.join(",").match( /([^,]+)(?!.*\\1)/ig);' . "\r\n\t" . '}else {' . "\r\n\t\t" . 'aid = pvid.aid;' . "\r\n\t\t" . 'pid = pvid.pid;' . "\r\n\t" . '}' . "\r\n\t" . 'var jsurl= \'';
	echo $GLOBALS['C_ZYIIS']['js_url'] . WEB_URL;
	echo '\';' . "\r\n" . '    var d=document,' . "\r\n" . '    g=d.createElement("script"), ' . "\r\n" . '    s=d.getElementsByTagName("head")[0];' . "\r\n" . '    g.type="text/javascript";' . "\r\n" . '    g.defer=true; ' . "\r\n" . '    g.async=true;' . "\r\n" . '    g.src=jsurl+"stats.php?adsid="+aid+"&planid="+pid+"&uid=';
	echo $z['uid'];
	echo '&siteid=';
	echo (int) $_GET['siteid'];
	echo '&plantype=';
	echo $z['plantype'];
	echo '&zoneid=';
	echo $z['zoneid'];
	echo '&adtplid=';
	echo $z['adtplid'];
	echo '&sep=';
	echo $runm;
	echo '"; ' . "\r\n" . '    s.insertBefore(g,s.firstChild);' . "\t\r\n" . '    ';
}

echo '}' . "\r\n";
echo $v['style']['iframejs'] . $v['tpl']['iframejs'];
echo ';' . "\r\n\r\n" . '(function() {' . "\r\n" . ' ' . "\r\n" . 'function __G(d, c) {' . "\r\n\t" . 'c = c || window;' . "\r\n\t" . 'if ("string" === typeof d || d instanceof String) {' . "\r\n\t\t" . 'return c.document.getElementById(d)' . "\r\n\t" . '} else {' . "\r\n\t\t" . 'if (d && d.nodeName && (d.nodeType == 1 || d.nodeType == 9)) {' . "\r\n\t\t\t" . 'return d' . "\r\n\t\t" . '}' . "\r\n\t" . '}' . "\r\n\t" . 'return d' . "\r\n" . '}' . "\r\n" . 'function __A(c, d, e) {' . "\r\n\t" . 'c = __G(c);' . "\r\n\t" . 'd = d.replace(/^on/i, "").toLowerCase();' . "\r\n\t" . 'if (c.addEventListener) {' . "\r\n\t\t" . 'c.addEventListener(d, e, false)' . "\r\n\t" . '} else {' . "\r\n\t\t" . 'if (c.attachEvent) {' . "\r\n\t\t\t" . 'c.attachEvent("on" + d, e)' . "\r\n\t\t" . '}' . "\r\n\t" . '}' . "\r\n\t" . 'return c' . "\r\n" . '}' . "\r\n" . 'function __B(i){' . "\r\n\t" . 'i=i||window.event;' . "\r\n\t" . 'this.target=i.target||i.srcElement' . "\r\n" . '}' . "\r\n" . 'function __C(i){' . "\r\n\t" . 'i=i||window.event;' . "\r\n\t" . 'this.target=i.target||i.srcElement' . "\r\n" . '}' . "\r\n" . 'function __Z(i){' . "\r\n\t" . 'i=i||window.event;' . "\r\n\t" . 'this.target=i.target||i.srcElement' . "\r\n" . '}' . "\r\n\r\n" . 'function __X(i){  ' . "\r\n\t" . 'var V = "&b="+i.clientX+\';\'+i.clientY+\'&g=\'+x+\';\'+y;' . "\r\n\t" . 'var z=new __Z(i);' . "\r\n\t" . 'var A = z.target.tagName.toLowerCase();' . "\r\n\t" . 'if(A!="a"){' . "\r\n\t\t" . 'z.target=z.target.parentNode' . "\r\n\t" . '}' . "\r\n\t" . 'if(z.target.href.indexOf("&b=")==-1 && z.target.href.length>50){' . "\r\n\t\t" . 'z.target.href+=V;' . "\r\n\t" . '} ' . "\r\n\t" . ' ' . "\r\n" . '} ' . "\r\n" . 'var x=0,y=0;xn=0;' . "\r\n" . 'function __XY(i){' . "\r\n\t" . 'if(xn>10){' . "\r\n\t\t" . 'return ' . "\r\n\t" . '} ' . "\r\n\t" . 'if(x==0){x=i.clientX;}' . "\r\n\t" . 'else {x=x+","+i.clientX;}' . "\r\n\t" . 'if(y==0){y=i.clientY;}' . "\r\n\t" . 'else {y=y+","+i.clientY;}' . "\r\n\t" . 'xn++;' . "\r\n\t" . ' ' . "\r\n" . '} ' . "\r\n\r\n" . 'function __C2(i){' . "\r\n\t" . 'var jump_url= \'';
echo $GLOBALS['C_ZYIIS']['jump_url'];
echo '\';' . "\r\n\t" . 'var z=new __Z(i);' . "\r\n\t" . 'var A = z.target.tagName.toLowerCase();' . "\r\n\t" . 'if(A!="a"){' . "\r\n\t\t" . 'z.target=z.target.parentNode' . "\r\n\t" . '}  ' . "\r\n\t" . 'if(z.target.href.indexOf(jump_url)>-1 && z.target.href.length>50){' . "\r\n\t\t" . 'var C_2=new Image();' . "\r\n\t\t" . 'C_2.src=ads[0].c2_url;' . "\r\n\t" . '} ' . "\r\n\t\r\n" . '}' . "\r\n" . 'var e=document;' . "\r\n" . 'dishs=e.getElementsByTagName("a");' . "\r\n" . 'for(var q=0;q<dishs.length;q++){' . "\r\n\t" . '__A(dishs[q],"click",__X);' . "\r\n\t" . '__A(dishs[q],"mousemove",__XY);' . "\r\n\t";

if ($os['is_mobile'] == 'y') {
	echo 'dishs[q].target="_top"';
}

echo ' ' . "\r\n\t";

if ($z['plantype'] == 'cpv') {
	echo "\t\t" . '__A(dishs[q],"click",__C2);' . "\r\n\t";
}

echo '}' . "\r\n\r\n";

if ($z['plantype'] == 'cpv') {
	echo "\t" . 'setTimeout(function(){' . "\r\n\t\t\t" . 'var C_pv=new Image();' . "\r\n\t\t\t" . 'C_pv.src=ads[0].url+"&srccpv=yes";' . "\r\n\t\t" . '},1000);' . "\r\n";
}

echo '})();' . "\r\n" . '</script>' . "\r\n" . ' ';

?>
