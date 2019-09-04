<?php

if (!(defined('IN_ZYADS'))) {
	exit();
}

TPL::display('header');
echo '<script type="text/javascript" src="';
echo WEB_URL;
echo 'js/jquery/js/jquery-1.7.min.js"></script>' . "\r\n" . '<script type="text/javascript" src="';
echo WEB_URL;
echo 'js/jquery/lib/jquery-validation/jquery.validate.js"></script>' . "\r\n" . '<script type="text/javascript" src="';
echo WEB_URL;
echo 'js/jquery/lib/bigcolorpicker/js/jquery.bigcolorpicker.js"></script>' . "\r\n" . '<link rel="stylesheet" href="';
echo WEB_URL;
echo 'js/jquery/lib/bigcolorpicker/css/jquery.bigcolorpicker.css" type="text/css" />' . "\r\n" . '<div id="left">' . "\r\n" . '  <div class="subnav">' . "\r\n" . '    <div class="subnav-title"> <a href="#" class=\'toggle-subnav\'><i class="icon-angle-down"></i><span>帮助</span></a> </div>' . "\r\n" . '    <ul class="subnav-menu">' . "\r\n" . '      <li> <a href="';
echo url('index.article?id=84');
echo '" target="_blank">如何获取广告代码？</a> </li>' . "\r\n" . '      <li> <a href="';
echo url('index.article?id=85');
echo '" target="_blank">如何过渡广告？</a> </li>' . "\r\n" . '      <li> <a href="';
echo url('index.article?id=86');
echo '" title="一个广告位能显示多种广告样式吗？">广告位显示多种广告样式？</a> </li>' . "\r\n" . '      <li> <a href="';
echo url('index.article?id=87');
echo '">广告有哪些类型？</a> </li>' . "\r\n" . '      <li> <a href="';
echo url('index.article?id=88');
echo '">修改了广告位没有生效？</a> </li>' . "\r\n" . '    </ul>' . "\r\n" . '  </div>' . "\r\n" . '</div>' . "\r\n" . '<div id="main" style="padding-top:10px;"> ' . "\r\n\r\n" . '  ';

if (!($get_plantype_ok)) {
	echo '<div class="alert alert-error" style="margin-top:10px"> 没有可以投放的广告 </div>';
	exit();
}

echo '  <div class="breadcrumbs mt30">' . "\r\n" . '    <ul>' . "\r\n" . '      <li> <a href="';
echo url('affiliate/zone.get_list');
echo '">我的广告位   »</a>  ';
echo RUN_ACTION == 'create' ? '新建' : '编辑';
echo '广告位 </li>' . "\r\n" . '    </ul>' . "\r\n" . '    <div class="close-bread"> <a href="#"><i class="icon-remove"></i></a> </div>' . "\r\n" . '  </div>' . "\r\n" . '  ' . "\r\n" . '  ' . "\r\n" . '  <div class="box">' . "\r\n" . '    <div class="box-title">' . "\r\n" . '      <h3><i class="icon-new"></i>基本信息</h3>' . "\r\n" . '    </div>' . "\r\n" . '    <div class="box-content" style="position:relative">' . "\r\n" . '      ';
if (($adtpl['customcolor'] == '2') || ($adtpl['customspecs'] == '2')) {
	echo '      <div class="ad_demo" ';
	if (($plantype == 'cpm') || (RUN_ACTION == 'edit')) {
		echo 'style="display:none" ';
	}

	echo '>广告预览：</div>' . "\r\n" . '      <div class="ad_demo " ';
	if (($plantype == 'cpm') || (RUN_ACTION == 'edit')) {
		echo 'style="display:none" ';
	}

	echo '>' . "\r\n" . '        <div  class="ad_demo_iframe">' . "\r\n" . '          <iframe id="myIFrame" name="myIFrame" src="about:blank"  marginwidth="0" marginheight="0" scrolling="no" frameborder="0" allowtransparency="true"> </iframe>' . "\r\n" . '        </div>' . "\r\n" . '      </div>' . "\r\n" . '       ';
}

echo '      <form action="' . "\r\n\t" . '  ';

if (RUN_ACTION == 'edit') {
	echo url('affiliate/zone.edit_post');
}
else {
	echo url('affiliate/zone.create_post');
}

echo '" method="POST" class="form-horizontal" id="form_b" >' . "\r\n" . '        <input name="zoneid" id="zoneid"  type="hidden" value="';
echo $z['zoneid'];
echo '" />' . "\r\n" . '        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="zone_form controls">' . "\r\n" . '          <tr>' . "\r\n" . '            <td width="100">计费方式</td>' . "\r\n" . '            <td>';
if ((RUN_ACTION == 'edit') || $adsid) {
	echo '              <input name="plantype" type="radio" value="';
	echo $z['plantype'];
	echo '" checked/>' . "\r\n" . '              ';
	echo strtoupper($z['plantype']);
	echo '              ';
}
else {
	echo '              ';

	foreach ((array) $get_plantype_ok as $p ) {
		echo '              <label>' . "\r\n" . '                <input name="plantype" type="radio" value="';
		echo $p['plantype'];
		echo '" ';

		if ($plantype == $p['plantype']) {
			echo 'checked';
		}

		echo '  />' . "\r\n" . '                ';
		echo strtoupper($p['plantype']);
		echo '</label>' . "\r\n" . '              ';
	}
}

echo '</td>' . "\r\n" . '          </tr>' . "\r\n" . '          <tr>' . "\r\n" . '            <td>广告位名称</td>' . "\r\n" . '            <td><input type="text" name="zonename" id="zonename" class="input-27" value="';
echo RUN_ACTION == 'create' ? '创建于' . DATETIMES : $z['zonename'];
echo '"></td>' . "\r\n" . '          </tr>' . "\r\n" . '          <tr>' . "\r\n" . '            <td valign="top">广告类型</td>' . "\r\n" . '            <td><div id="adtplid_e_p">' . "\r\n" . '                ';

if (RUN_ACTION == 'edit') {
	echo '                <input name="adtplid" id="adtplid" type="radio" value="';
	echo $z['adtplid'];
	echo '" checked>' . "\r\n" . '                ';
	$get_tpl = dr('affiliate/adtpl.get_one_adtpl_adtype', $z['adtplid']);
	echo $get_tpl['tplname'] . ' - ' . $get_tpl['name'];
	echo '                ';
}
else {
	echo '                <select  name="adtplid" id="adtplid" style="padding:5px; width:180px" >' . "\r\n" . '                  ';

	foreach ((array) $get_adtpl_ok as $a ) {
		echo '                  <option value="';
		echo $a['tplid'];
		echo '" ';

		if ($a['tplid'] == $adtplid) {
			echo 'selected';
		}

		echo '  > ';
		echo $a['tplname'] . ' - ' . $a['name'];
		echo '</option>' . "\r\n" . '                  ';
	}

	echo '                </select>' . "\r\n" . '                ';
}

echo '              </div>' . "\r\n" . '              <div id="add_html" ';

if (!($adstyle_add_html['htmlcontrol'])) {
	echo 'style="display:none"';
}

echo '>' . "\r\n" . '                ';

if ($adstyle_add_html['htmlcontrol']) {
	$cp = (array) unserialize($adstyle_add_html['htmlcontrol']);
	$cp_num = count($cp['htmlcontrol_title']);

	if ($z) {
		$zh = (array) unserialize($z['htmlcontrol']);
	}

	for ($i = 0; $i < $cp_num; $i++) {
		if (($zh[$cp['htmlcontrol_name'][$i]] != '') && ($cp['htmlcontrol_type'][$i] == 'text')) {
			$cp['htmlcontrol_value'][$i] = $zh[$cp['htmlcontrol_name'][$i]];
		}

		$adhtml .= '<p> <label>' . ($cp['htmlcontrol_type'][$i] == 'text' ? $cp['htmlcontrol_title'][$i] : '') . '<input name="a_h[' . $cp['htmlcontrol_name'][$i] . ']"  type="' . $cp['htmlcontrol_type'][$i] . '" value="' . $cp['htmlcontrol_value'][$i] . '" ' . ($cp['htmlcontrol_type'][$i] == 'text' ? 'class=input-27' : ' ') . '';
		if (($zh[$cp['htmlcontrol_name'][$i]] && ($zh[$cp['htmlcontrol_name'][$i]] == $cp['htmlcontrol_value'][$i])) || (!($z) && $cp['htmlcontrol_checked'][$i])) {
			$adhtml .= 'checked';
		}

		$adhtml .= '> ' . ($cp['htmlcontrol_type'][$i] != 'text' ? $cp['htmlcontrol_title'][$i] : '') . '</label></p>';
	}

	echo $adhtml;
}

echo '              </div></td>' . "\r\n" . '          </tr>' . "\r\n" . '          <tr class="ad_size_html_d" ';

if ($adtpl['tpltype'] == 'url_jump') {
	echo 'style="display:none" ';
}

echo ' >' . "\r\n" . '            <td>广告尺寸</td>' . "\r\n" . '            <td><div class="ad_size_html">' . "\r\n" . '                ';

if (RUN_ACTION == 'edit') {
	echo '                <input name="specs" id="specs" type="radio" value="';
	echo $z['width'] . 'x' . $z['height'];
	echo '" checked>' . "\r\n" . '                ';
	echo $z['width'] . 'x' . $z['height'];
	echo '                ';
}
else {
	echo '                <select name="specs" id="ad_size" style="padding:5px; width:180px">' . "\r\n" . '                  ';

	foreach ((array) $adspecs as $sp ) {
		echo '                  <option value="';
		echo $sp;
		echo '" ';

		if ($specs == $sp) {
			echo 'selected';
		}

		echo '> ';
		echo $sp;
		echo '</option>' . "\r\n" . '                  ';
	}

	echo '                </select>' . "\r\n" . '                ';

	if ($adtpl['customspecs'] == 2) {
		echo '                <a href=\'javascript:;\' style=\'margin-left:10px\' id=\'ad_size_zd_a\'>自定义尺寸</a> <a href=\'javascript:;\' style=\'margin-left:10px; display:none\' id=\'ad_size_zd_b\'>选择尺寸</a>' . "\r\n" . '                ';
	}

	echo '                ';
}

echo '              </div></td>' . "\r\n" . '          </tr>' . "\r\n" . '          <tr class="ad_size_zd" style="display:none">' . "\r\n" . '            <td valign="top">自定义尺寸</td>' . "\r\n" . '            <td><table border="0" cellpadding="0" cellspacing="3" class="tbcodes">' . "\r\n" . '                <tbody>' . "\r\n" . '                  <tr>' . "\r\n" . '                    <td  width="50">宽度：</td>' . "\r\n" . '                    <td  ><input name="zd_size_w" type="text" id="zd_size_w" value="" size="8" maxlength="6" /></td>' . "\r\n" . '                  </tr>' . "\r\n" . '                  <tr>' . "\r\n" . '                    <td>高度：</td>' . "\r\n" . '                    <td><input name="zd_size_h" type="text" id="zd_size_h" value="" size="8" maxlength="6" /></td>' . "\r\n" . '                  </tr>' . "\r\n" . '                </tbody>' . "\r\n" . '              </table></td>' . "\r\n" . '          </tr>' . "\r\n" . '          <tr  ';

if ($adtpl['tpltype'] == 'url_jump') {
	echo 'style="display:none" ';
}

echo '>' . "\r\n" . '            <td>显示效果</td>' . "\r\n" . '            <td><select name="styleid" id="styleid" style="padding:5px; width:180px">' . "\r\n" . '                ';

foreach ((array) $adstyle as $as ) {
	echo '                <option value="';
	echo $as['styleid'];
	echo '" ';
	if (($z['adstyleid'] == $as['styleid']) || ($styleid == $as['styleid'])) {
		echo 'selected';
	}

	echo ' > ';
	echo $as['stylename'];
	echo '</option>' . "\r\n" . '                ' . "\r\n" . '                ' . "\r\n" . '                ';
}

echo '              </select></td>' . "\r\n" . '          </tr>' . "\r\n" . '          <tr class="color_style_d" ';

if ($adtpl['customcolor'] == 1) {
	echo 'style="display:none" ';
}

echo '>' . "\r\n" . '            <td valign="top">配色</td>' . "\r\n" . '            <td><table width="160" border="0" cellpadding="0" cellspacing="3" class="tbcodes">' . "\r\n" . '                <tbody>' . "\r\n" . '                  <tr>' . "\r\n" . '                    <td  width="160">边框：' . "\r\n" . '                      #' . "\r\n" . '                      <input name="color[border]" type="text" id="color_border" value="';
echo $codestyle['color']['border'] ? $codestyle['color']['border'] : 'FFFFFF';
echo '" size="8" maxlength="6"></td>' . "\r\n" . '                    <td><span style="background-color:#';
echo $codestyle['color']['border'] ? $codestyle['color']['border'] : 'FFFFFF';
echo '" data-target="color_border" class="j_clor color_border"></span></td>' . "\r\n" . '                  </tr>' . "\r\n" . '                  <tr>' . "\r\n" . '                    <td>标题：' . "\r\n" . '                      #' . "\r\n" . '                      <input name="color[headline]" type="text" id="color_headline" value="';
echo $codestyle['color']['headline'] ? $codestyle['color']['headline'] : '0000FF';
echo '" size="8" maxlength="6"></td>' . "\r\n" . '                    <td><span style="background-color:#';
echo $codestyle['color']['headline'] ? $codestyle['color']['headline'] : '0000FF';
echo '" data-target="color_headline" class="j_clor color_headline"></span></td>' . "\r\n" . '                  </tr>' . "\r\n" . '                  <tr>' . "\r\n" . '                    <td>背景：' . "\r\n" . '                      #' . "\r\n" . '                      <input name="color[background]" type="text" id="color_background" value="';
echo $codestyle['color']['background'] ? $codestyle['color']['background'] : 'FFFFFF';
echo '" size="8" maxlength="6"></td>' . "\r\n" . '                    <td><span style="background-color:#';
echo $codestyle['color']['background'] ? $codestyle['color']['background'] : 'FFFFFF';
echo '" data-target="color_background" class="j_clor color_background"></span></td>' . "\r\n" . '                  </tr>' . "\r\n" . '                  <tr>' . "\r\n" . '                    <td>描述：' . "\r\n" . '                      #' . "\r\n" . '                      <input name="color[description]" type="text" id="color_description" value="';
echo $codestyle['color']['description'] ? $codestyle['color']['description'] : '444444';
echo '" size="8" maxlength="6"></td>' . "\r\n" . '                    <td><span style="background-color:#';
echo $codestyle['color']['description'] ? $codestyle['color']['description'] : '444444';
echo '"   data-target="color_description"class="j_clor color_description"></span></td>' . "\r\n" . '                  </tr>' . "\r\n" . '                  <tr>' . "\r\n" . '                    <td>链接：' . "\r\n" . '                      #' . "\r\n" . '                      <input name="color[dispurl]" type="text" id="color_dispurl" value="';
echo $codestyle['color']['dispurl'] ? $codestyle['color']['dispurl'] : '008000';
echo '" size="8" maxlength="6"></td>' . "\r\n" . '                    <td><span style="background-color:#';
echo $codestyle['color']['dispurl'] ? $codestyle['color']['dispurl'] : '008000';
echo '" data-target="color_dispurl"  class="j_clor color_dispurl"></span></td>' . "\r\n" . '                  </tr>' . "\r\n" . '                </tbody>' . "\r\n" . '              </table></td>' . "\r\n" . '          </tr>' . "\r\n" . '          <tr>' . "\r\n" . '            <td valign="top">广告过滤</td>' . "\r\n" . '            <td><input name="viewtype" type="radio" value="1" ';
if (($z['viewtype'] == 1) || !($z)) {
	echo 'checked';
}

echo ' />' . "\r\n" . '              智能轮播' . "\r\n" . '              <input name="viewtype" type="radio"  id="viewtype_s" value="2" ';

if ($z['viewtype'] == 2) {
	echo 'checked';
}

echo ' />' . "\r\n" . '              手动选择 <span id="ckinfo"></span>' . "\r\n" . '              <div class="viewtype_html"  style="display:';
if (($z['viewtype'] == '1') || !($z)) {
	echo 'none';
}

echo '" >' . "\r\n" . '                <p>' . "\r\n" . '                  <input type="checkbox" id="viewadsid_all" >' . "\r\n" . '                  全选</p>' . "\r\n" . '                我们为你匹配到以下的广告 <span id="viewtype_html_e_p_adnum"></span><br>' . "\r\n" . '                <div class="a_d">' . "\r\n" . '                  ';
$count = count($ads);

foreach ((array) $ads as $ad ) {
	$ck = $au = '';
	if (in_array($ad['adsid'], explode(',', $z['viewadsid'])) || ($ad['adsid'] == $adsid)) {
		$ck = ' checked';
	}

	$price = main_public::format_plan_print($ad['planid']);

	if (is_array($price)) {
		$price = $price['min'] . '~' . $price['max'];
	}

	if ($ad['audit'] == 'y') {
		$ap = dr('affiliate/apply.get_apply_status', (int) $_SESSION['affiliate']['uid'], $ad['planid']);

		if ($ap['status'] == '0') {
			$ck = ' onclick="return false"  apply="n"';
			$au = '<font color="#ff0000">(申请审核中)</font>';
			$count--;
		}
		else if ($ap['status'] == '1') {
			$ck = ' onclick="return false"  apply="n"';
			$au = '<font color="#ff0000">(申请被拒绝)</font>';
			$count--;
		}
		else if ($ap['status'] == '2') {
			$audit = 'a2';
		}
		else {
			$ck = ' onclick="return false" apply="n"';
			$au = '<a href="javascript:apply(' . $ad['planid'] . ')" ><font color="#ff0000">(点击申请)</font></a>';
			$count--;
		}
	}

	if ($ad['headline']) {
		$html .= ' <p><label> <input type="checkbox" name="viewadsid[]" value="' . $ad['adsid'] . '" ' . $ck . ' > <a href= target="_blank">' . $ad['headline'] . '#' . $ad['adsid'] . ' </a>' . $au . '<font color="#ff0000"> / ' . $price . '元</font></label></p>';
	}
	else {
		$html .= ' <div class="img" id="ad_id_' . $ad['adsid'] . '"><label> <input type="checkbox" name="viewadsid[]"  value="' . $ad['adsid'] . '" ' . $ck . '>#' . $ad['planname'] . '(Aid#' . $ad['adsid'] . ')' . $au . '<font color="#ff0000"> ' . $price . '' . ($plantype == 'cps' ? '%' : '元') . '</font>';

		if ($ad['width']) {
			$html .= '<br><iframe  width=' . $ad['width'] . ' height=' . $ad['height'] . ' frameborder=0 src="' . url('affiliate/ad.view_ad?adsid=') . $ad['adsid'] . '" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no"></iframe>';
		}

		$html .= '</label></div >';
	}
}

echo $html;
echo '                </div>' . "\r\n" . '              </div></td>' . "\r\n" . '          </tr>' . "\r\n" . '          <tr>' . "\r\n" . '            <td>&nbsp;</td>' . "\r\n" . '            <td>  <input type="submit" class="btn btn-primary" value="';

if (RUN_ACTION == 'edit') {
	echo '保存';
}
else {
	echo '保存并获取代码 »';
}

echo '"  class="btn btn-primary"/></td>' . "\r\n" . '          </tr>' . "\r\n" . '          <tr>' . "\r\n" . '            <td>&nbsp;</td>' . "\r\n" . '            <td></td>' . "\r\n" . '          </tr>' . "\r\n" . '        </table>' . "\r\n" . '      </form>' . "\r\n" . '    </div>' . "\r\n" . '  </div>' . "\r\n" . '</div>' . "\r\n" . '<script type="text/javascript" src="';
echo WEB_URL;
echo 'js/jquery/lib/leanmodal/leanmodal.min.js"></script>' . "\r\n" . '<link rel="stylesheet" href="';
echo SRC_TPL_DIR;
echo '/style/modal.css">' . "\r\n" . '<div id="apply_html" style="display:none">' . "\r\n" . '  <table   border="0" cellpadding="0" cellspacing="0" style="width:450px">' . "\r\n" . '    <tr>' . "\r\n" . '      <td height="40" colspan="3">选择需要申请广告的网站</td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr>' . "\r\n" . '      <td width="100"><input name="applysiteidtype" type="radio" value="1" checked="checked" />' . "\r\n" . '        <input name="applyplanid" type="hidden" value="" />' . "\r\n" . '        全部网站</td>' . "\r\n" . '      <td height="40"><input type="radio" name="applysiteidtype" value="2" />' . "\r\n" . '        选择网站</td>' . "\r\n" . '      <td>&nbsp;</td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr>' . "\r\n" . '      <td>&nbsp;</td>' . "\r\n" . '      <td><div style="width:258px; overflow: auto;border: 1px solid #b8b8b8;float:left;display:none" class="applysiteid_d">' . "\r\n" . '          <table class="table" style="margin-bottom:0px;">' . "\r\n" . '            <thead>' . "\r\n" . '              <tr>' . "\r\n" . '                <th style="width:12%;"></th>' . "\r\n" . '                <th >名称</th>' . "\r\n" . '              </tr>' . "\r\n" . '            </thead>' . "\r\n" . '            <tbody>' . "\r\n" . '               ';

foreach ((array) $site as $s ) {
	echo '                <tr>' . "\r\n" . '                  <td ><input name="siteid[]" type="checkbox" class="apply_siteid" value="';
	echo $s['siteid'];
	echo '" url="';
	echo $s['siteurl'];
	echo '" /></td>' . "\r\n" . '                  <td >';
	echo $s['siteurl'];
	echo '</td>' . "\r\n" . '                </tr>' . "\r\n" . '                ';
}

echo '              <tr>' . "\r\n" . '                <th colspan="2" ><input type="checkbox" id="siteid_all" >' . "\r\n" . '                  全选</th>' . "\r\n" . '              </tr>' . "\r\n" . '            </tbody>' . "\r\n" . '          </table>' . "\r\n" . '        </div></td>' . "\r\n" . '      <td>&nbsp;</td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr>' . "\r\n" . '      <td>&nbsp;</td>' . "\r\n" . '      <td height="40"></td>' . "\r\n" . '      <td><button type="button" class="btn btn-primary post_apply"> 提交申请 </button></td>' . "\r\n" . '    </tr>' . "\r\n" . '  </table> ' . "\r\n" . '</div>' . "\r\n" . '<script language="JavaScript" type="text/javascript">' . "\r\n\r\n" . '$("#viewadsid_all").click(function(){' . "\r\n\t" . 'var a = $("#viewadsid_all").attr("checked");' . "\r\n\t" . 'if(a!=\'checked\') a = false;' . "\r\n\t" . '//$("input[name=\'viewadsid[]\']").attr("checked",a);' . "\t\r\n\t\r\n\t" . '$.each($("input[name=\'viewadsid[]\']"), function(i,o){    ' . "\r\n\t" . ' ' . "\t" . 'if($(o).attr(\'apply\') != \'n\'){' . "\r\n\t\t\t" . '$(o).attr("checked",a);' . "\t\r\n\t\t" . '}' . "\r\n\t" . '});' . "\r\n\t\t\t" . '  ' . "\r\n" . '});' . "\r\n\t\r\n" . 'var acount = ';
echo (int) $count;
echo ';' . "\r\n" . ' ' . "\r\n" . 'if($(\'input:radio[name=viewtype]:checked\').val()==1 && !acount){' . "\r\n\r\n\t" . 'box.alert("当前的计费方式和广告类型尺寸下的广告无法使用智能轮播，以下广告需要申请，或更换一个其它尺寸");' . "\r\n\r\n" . '//box.confirm(\'当前';
echo $plantype;
echo '广告需要申请才能投放\',300,\'系统提示\',function(bool){ ' . "\r\n\t" . '$(\'input:radio[name=viewtype]\')[1].checked = true;' . "\r\n\t" . '$(".viewtype_html").show();' . "\r\n" . '//});' . "\r\n\r\n" . '}' . "\r\n" . ' ' . "\r\n\r\n" . 'function apply(planid) { ' . "\r\n" . ' ' . "\r\n" . '  box.confirm(\'确认申请\',300,\'审请广告\',function(bool){ ' . "\r\n\t\t" . ' $.ajax(' . "\r\n\t\t\t" . '{' . "\r\n\t\t\t\t" . 'dataType: \'html\',' . "\r\n\t\t\t\t" . 'url: \'';
echo url('affiliate/apply.post_apply');
echo '\',' . "\r\n\t\t\t\t" . 'type: \'post\',' . "\r\n\t\t\t\t" . 'data: \'planid=\'+planid+\'&siteid=&applysiteidtype=1\' ,' . "\r\n\t\t\t\t" . 'success: function() ' . "\r\n\t\t\t\t" . '{' . "\r\n\t\t\t\t\t" . ' ' . "\r\n\t\t\t\t\t" . 'box.alert(\'申请成功，请等待我们审核\',300);' . "\r\n\r\n\t\t\t\t" . '}' . "\r\n\t\t\t" . '}); ' . "\t\r\n" . ' ' . "\r\n" . ' ' . "\r\n" . '});' . "\r\n" . '}  ' . "\r\n" . '$(\'#ad_size_zd_a\').on(\'click\', function(option) {  ' . "\r\n\t" . '$(".ad_size_zd").show(); ' . "\r\n\t" . '$("#ad_size_zd_b").show(); ' . "\r\n\t" . '$("#ad_size").hide(); ' . "\r\n" . '});' . "\r\n\r\n" . '$(\'#ad_size_zd_b\').on(\'click\', function(option) {  ' . "\r\n\t" . '$(".ad_size_zd").hide(); ' . "\r\n\t" . '$("#ad_size_zd_b").hide(); ' . "\r\n\t" . '$("#ad_size").show(); ' . "\r\n" . '});' . "\r\n" . '$(\'input:radio[name=viewtype]\').on(\'click\', function(option) {' . "\r\n\t" . 'if(!acount){' . "\r\n\t\t" . '$(\'input:radio[name=viewtype]\')[1].checked = true;' . "\r\n\t\t" . '$(".viewtype_html").show();' . "\r\n\t\t" . 'return;' . "\r\n\t" . '} ' . "\r\n" . '    var v = $(this).val();' . "\r\n" . '    if (v == 2) {' . "\r\n\t\t" . ' $(".viewtype_html").show();' . "\r\n\t" . '}else {' . "\r\n\t\t" . ' $(".viewtype_html").hide();' . "\r\n\t\t" . '}' . "\t\r\n" . '});' . "\r\n" . '$(\'input:radio[name=plantype]\').on(\'click\', function(option) {' . "\r\n" . '    var v = $(this).val();' . "\r\n" . '    var url = "';
echo url('affiliate/zone.create?plantype=');
echo '"+v;' . "\r\n\t" . 'location.href = url;' . "\r\n" . '});' . "\r\n\r\n\r\n" . '$(\'#ad_size\').on(\'change\', function(option) {' . "\r\n" . '    var v = $(this).val();' . "\r\n" . '    var url = "';
echo url('affiliate/zone.create?plantype=' . $plantype . '&adtplid=' . $adtplid . '&specs=');
echo '"+v;' . "\r\n\t" . 'location.href = url;' . "\r\n" . '});' . "\r\n\r\n" . '$(\'#adtplid\').on(\'change\', function(option) {' . "\r\n" . '    var v = $(this).val();' . "\r\n" . '    var url = "';
echo url('affiliate/zone.create?plantype=' . $plantype . '&adtplid=');
echo '"+v;' . "\r\n\t" . 'location.href = url;' . "\r\n" . '});' . "\r\n\r\n" . '$(\'#styleid\').on(\'change\', function(option) {' . "\r\n\t" . 'if(\'';
echo RUN_ACTION;
echo '\' == \'create\'){' . "\r\n" . '  ' . "\t" . ' ' . "\t" . 'var v = $(this).val();' . "\r\n" . '    ' . "\t" . 'var url = "';
echo url('affiliate/zone.create?plantype=' . $plantype . '&adtplid=' . $adtplid . '&specs=' . $specs . '&styleid=');
echo '"+v;' . "\r\n\t\t" . 'location.href = url;' . "\r\n\t" . '}' . "\r\n" . '});' . "\r\n\r\n\r\n" . '$(".j_clor").bigColorpicker(function(el, color) {' . "\r\n" . '      $(el).css("backgroundColor", color);' . "\r\n" . '      $("#" + $(el).attr("data-target")).val(color.replace(\'#\', \'\')); ' . "\r\n\t" . '  setTimeout(demo,500); ' . "\r\n" . '}); ' . "\r\n" . '$(\'#zd_size_w,#zd_size_h\').on(\'keyup\', function(option) { ' . "\r\n" . ' ' . "\r\n\t" . 'setTimeout(demo,500);  ' . "\r\n" . '});' . "\r\n" . 'setTimeout(demo,500);' . "\r\n\r\n" . '  ' . "\r\n" . 'function demo(){ ' . "\t" . ' ' . "\r\n\t";
if (($adtpl['customcolor'] == '2') || ($adtpl['customspecs'] == '2')) {
	echo "\t" . 'var v2 = $("#ad_size").val(); ' . "\r\n\t" . 'var zw = $(\'#zd_size_w\').val();' . "\r\n\t" . 'var zh = $(\'#zd_size_h\').val();' . "\r\n\t" . 'if(zw && zh) {' . "\r\n\t\t" . 'v2 = zw+\'x\'+zh;' . "\t\r\n\t" . '}' . "\r\n\t" . 'if(!v2) return;' . "\r\n\t" . 'g2 = v2.split(\'x\');' . "\r\n\t" . '$("#myIFrame").attr("width",g2[0]);' . "\r\n\t" . '$("#myIFrame").attr("height",g2[1]);  ' . "\r\n\t" . '$("#form_b").attr("target","myIFrame");' . "\r\n\t" . 'var ac = $("#form_b").attr("action"); ' . "\r\n\t" . '$("#form_b").attr("action","';
	echo url('affiliate/zone.demo');
	echo '");' . "\r\n\t" . '$("#form_b").submit();  ' . "\r\n\t" . '$("#form_b").attr("target","");' . "\r\n\t" . '$("#form_b").attr("action",ac);' . "\t" . '    ' . "\r\n\t" . '$(\'.ad_demo_iframe\').on(\'mouseenter\', function(option) { ' . "\r\n\t" . 'if(g2[0]>360){' . "\r\n\t\t" . '$(this).css("width",g2[0]+"px"); ' . "\r\n\t\t" . '$(this).parent().css("width",g2[0]+"px"); ' . "\r\n\t" . '}' . "\t\r\n\t" . '}).on(\'mouseleave\', function(option) { ' . "\r\n\t\t" . '$(this).css("width", "360px"); ' . "\r\n\t\t" . '$(this).parent().css("width", "360px"); ' . "\r\n\t" . '})' . "\r\n\t";
}

echo '}' . "\r\n\r\n" . '$("#form_b").validate({' . "\r\n" . '        errorClass: "error",' . "\r\n" . '        highlight: function(element) {' . "\r\n" . '            $(element).closest(\'td\').addClass("f_error");' . "\r\n" . '        },' . "\r\n" . '        unhighlight: function(element) {' . "\r\n" . '            $(element).closest(\'td\').removeClass("f_error");' . "\r\n" . '        },' . "\r\n\t\t" . '          rules: {' . "\r\n" . '            ' . "\r\n" . '            zonename: {' . "\r\n" . '                required: true' . "\r\n" . '            } ,' . "\r\n\t\t\t" . '"viewadsid[]": {' . "\r\n" . '              ' . "\r\n\t\t\t\t" . 'required: "#viewtype_s:checked",' . "\r\n\t\t\t\t" . ' ' . "\r\n" . '            }' . "\r\n" . '        },' . "\r\n" . '        messages: {' . "\r\n" . '           ' . "\r\n" . '            zonename: "网站名称不能为空",' . "\r\n\t\t\t" . '"viewadsid[]": "需要选择一个广告"' . "\r\n\t\t\t" . ' ' . "\r\n" . '        },' . "\r\n" . '        ' . "\r\n" . '        errorElement: \'span\' ,' . "\r\n" . '        errorPlacement: function(error, element) {' . "\r\n" . '            var name = element.attr(\'name\');  ' . "\r\n" . '            if (name == \'viewadsid[]\') {' . "\r\n" . '                $(\'#ckinfo\').append(error);' . "\r\n" . '            } else {' . "\r\n" . '                error.insertAfter(element);' . "\r\n" . '            }' . "\r\n" . '        }' . "\r\n\r\n" . '    });' . "\r\n\t\r\n" . ' ' . "\r\n" . '</script> ' . "\r\n\r\n\r\n\r\n";

?>
