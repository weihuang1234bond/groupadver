<?php

if (!defined('IN_ZYADS')) {
	exit();
}

TPL::display('header');
echo "\r\n" . '<link rel="stylesheet" href="';
echo SRC_TPL_DIR;
echo '/css/rating.css" media="all" type="text/css" />' . "\r\n" . '<div class="alert success" ';

if (!$_SESSION['succ']) {
	echo 'style="display:none"';
}

echo '>' . "\r\n" . '  <!-- <a class="close" href="javascript:;">×</a>-->' . "\r\n" . '  <strong>操作成功.</strong> </div>' . "\r\n" . '<div class="alert err" ';

if (!$_SESSION['err']) {
	echo 'style="display:none"';
}

echo '>' . "\r\n" . '  <!-- <a class="close" href="javascript:;">×</a>-->' . "\r\n" . '  <strong>操作失败.</strong> </div>' . "\r\n" . '<div id="sidebar">' . "\r\n" . '  ';
TPL::display('sidebar');
echo '</div>' . "\r\n" . '<div id="main-content">' . "\r\n" . '  <div id="main_nav">' . "\r\n" . '    <div class="mn_lfet"></div>' . "\r\n" . '    <div class="mn_right">' . "\r\n" . '      <div class="mn_mt"> 广告样式</div>' . "\r\n" . '    </div>' . "\r\n" . '  </div>' . "\r\n" . '  <div class="row-fluid mt60" >' . "\r\n" . '    <div class="heading">' . "\r\n" . '      <div class="mbox_new"> <a href="';
echo url('admin/adstyle.add');
echo '" style=" width:110px; text-align:left"><i class="n_user"></i>新增广告样式</a> <span class="dataTables_length">' . "\r\n" . '        <select size="1" name="choose_type" id="choose_type" style="margin-left:20px"  onchange="location.href = this.options[selectedIndex].value">' . "\r\n" . '          <option value="';
echo url('admin/adstyle.get_list');
echo '" >所有类型</option>' . "\r\n" . '          ';

foreach ((array) $adtpl as $atl ) {
	$oh .= '<option value=' . url('admin/adstyle.get_list?adtplid=' . $atl['tplid']) . '';

	if ($adtplid == $atl['tplid']) {
		$oh .= ' selected';
	}

	$oh .= '>' . $atl['tplname'] . '</option>';
}

$oh .= '</optgroup>';
echo $oh;
echo '        </select>' . "\r\n" . '      </span></div>' . "\r\n" . '    </div>' . "\r\n" . '     ' . "\r\n" . '    ' . "\r\n" . '      <table id="dt_inbox" class="dataTable">' . "\r\n" . '        <thead>' . "\r\n" . '          <tr role="row">' . "\r\n" . '            <th>ID</th>' . "\r\n" . '            <th>样式名称</th>' . "\r\n" . '            <th>应于广告模式</th>' . "\r\n" . '            <th>广告个数</th>' . "\r\n" . '            <th>描述</th>' . "\r\n" . '            <th>状态</th>' . "\r\n" . '            <th>操作</th>' . "\r\n" . '          </tr>' . "\r\n" . '        </thead>' . "\r\n" . '        <tbody role="alert" aria-live="polite" aria-relevant="all">' . "\r\n" . '          ';

foreach ((array) $adstyle as $a ) {
	echo '          <tr class="unread odd">' . "\r\n" . '            <td>';
	echo $a['styleid'];
	echo '</td>' . "\r\n" . '            <td>';
	echo $a['stylename'];
	echo '</td>' . "\r\n" . '            <td>';
	$tplid = explode(',', $a['tplid']);

	foreach ((array) $tplid as $tid ) {
		$tpl = dr('admin/adtpl.get_one', (int) $tid);
		$tpln[] = $tpl['tplname'];
	}

	echo implode('<br>', $tpln);
	unset($tpln);
	echo '</td>' . "\r\n" . '            <td >';
	echo $a['adnum'] == 1 ? 1 : '不限';
	echo '</td>' . "\r\n" . '            <td >';
	echo $a['description'];
	echo '</td>' . "\r\n" . '            <td class="status">';

	switch ($a['status']) {
	case 'y':
		echo '<span class="notification info_bg">正常</span>';
		break;

	case 'n':
		echo '<span class="notification error_bg">锁定</span>';
		break;
	}

	echo '            </td>' . "\r\n" . '            <td adstyleid=\'';
	echo $a['styleid'];
	echo '\' class="uld_img"><span id="adtpl_';
	echo $a['styleid'];
	echo '" style="display:none"></span><a href="';
	echo url('admin/adstyle.edit?styleid=' . $a['styleid']);
	echo '"><img src="';
	echo SRC_TPL_DIR;
	echo '/images/pencil_gray.png" alt="" border="0" title="编辑" /></a> <img src="';
	echo SRC_TPL_DIR;
	echo '/images/access_ok_gray.png" alt="" border="0" class="unlock" title="激活" /> <img src="';
	echo SRC_TPL_DIR;
	echo '/images/lock-icon.png" alt="" border="0" class="lock" title="锁定"/> <img src="';
	echo SRC_TPL_DIR;
	echo '/images/trashcan_gray.png" alt="" border="0"  class="del" title="删除"/></td>' . "\r\n" . '          </tr>' . "\r\n" . '          ';
}

echo '        </tbody>' . "\r\n" . '      </table>' . "\r\n" . '      <div class="row">' . "\r\n" . '         ' . "\r\n" . '      </div>' . "\r\n" . '  </div>' . "\r\n" . '  </div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n";
TPL::display('footer');
echo '<script language="JavaScript" type="text/javascript">' . "\r\n\r\n\r\n" . 'function uld(type,e) {' . "\r\n\t" . 'var html = \'\';' . "\r\n" . '   ' . "\t" . 'var width = 400;' . "\r\n\t" . 'if (type == \'del\') {' . "\r\n\t\t" . 'url = \'';
echo url('admin/adstyle.del');
echo '\';' . "\r\n\t\t" . 'title = \'删除广告模板\';' . "\r\n\t\t" . 'text = \'确定要删除吗？删除后无法恢复!<br>现有投放的代码无法显示\';' . "\r\n\t" . '}' . "\r\n\t" . 'if (type == \'lock\') {' . "\r\n\t\t" . 'url = \'';
echo url('admin/adstyle.lock');
echo '\';' . "\r\n\t\t" . 'html = \'<span class="notification error_bg">锁定</span>\';' . "\r\n\t" . '    text = \'确认锁定吗？锁定后现有投放的代码无法显示\';' . "\r\n\t\t" . 'title = \'锁定奖品\';' . "\r\n\t" . '}' . "\r\n\t" . 'if (type == \'unlock\') {' . "\r\n\t\t" . 'url = \'';
echo url('admin/adstyle.unlock');
echo '\';' . "\r\n\t\t" . 'html = \'<span class="notification info_bg">活动</span>\';' . "\r\n\t" . '    text = \'确认激活吗\';' . "\r\n\t\t" . 'title = \'激活信息\';' . "\r\n\t" . '}' . "\r\n" . ' ' . "\t\t" . ' ' . "\r\n\t" . 'box.confirm(text,width,title,function(bool){ ' . "\r\n\t\t" . ' if(e) adtpl_id = $(e).parent().attr("adstyleid");' . "\r\n\t\t" . ' adtpl_id = adtpl_id.split(\',\');' . "\r\n\t\t" . ' if (bool) {' . "\r\n\t\t\t" . ' if (type == \'del\') {' . "\r\n\t\t\t\t" . '$.each(adtpl_id, function(i,val){   ' . "\r\n\t\t\t\t\t" . '$("#adtpl_"+val).parent().parent().css("backgroundColor", "#faa").hide(\'normal\');' . "\r\n\t\t\t\t" . '});  ' . "\r\n\t\t\t" . ' } ' . "\r\n\t\t\t" . '$.ajax(' . "\r\n\t\t\t" . '{' . "\r\n\t\t\t\t" . 'dataType: \'html\',' . "\r\n\t\t\t\t" . 'url: url,' . "\r\n\t\t\t\t" . 'type: \'post\',' . "\r\n\t\t\t\t" . 'data: \'styleid=\' + adtpl_id ,' . "\r\n\t\t\t\t" . 'success: function() ' . "\r\n\t\t\t\t" . '{' . "\r\n\t\t\t\t\t" . ' $.each(adtpl_id, function(i,val){    ' . "\r\n\t\t\t\t\t\t" . ' ' . "\t" . '$("#adtpl_"+val).parent().parent().find(\'.status\').html(html);' . "\r\n\t\t\t\t\t" . ' });   ' . "\r\n\t\t\t\t\t" . '$(".success").show();' . "\r\n\t\t\t\t" . '}' . "\r\n\t\t\t" . '});' . "\r\n\t\t" . '}' . "\r\n\t" . '});' . "\r\n" . '}' . "\r\n\r\n" . '$(".unlock,.lock,.del").click(function(){' . "\r\n\t" . 'uld(this.className,this);' . "\r\n" . '});' . "\r\n\r\n" . '$("#choose_sb").click(function(){' . "\r\n\t" . 'var arr=[];' . "\r\n\t" . 'var choose_type = $("#choose_type").val();' . "\r\n\t" . 'if(!choose_type){' . "\r\n\t\t" . 'box.alert(\'批量操作请选择一个操作对像\',300);' . "\r\n\t\t" . 'return ;' . "\r\n\t" . '}' . "\r\n" . ' ' . "\t" . 'var arrChk=$("input[name=\'id\']:checked"); ' . "\r\n" . '     ' . "\r\n" . '    for (var i=0;i<arrChk.length;i++)' . "\r\n" . '    {' . "\r\n" . '        var v = arrChk[i].value;' . "\r\n\t\t" . 'arr.push(v);' . "\r\n\t\t\r\n" . '    }' . "\r\n\t" . 'gift_id = arr.join(",");' . "\r\n\t" . 'uld(choose_type);' . "\r\n" . '});' . "\r\n\r\n" . '$("#select_id").click(function(){' . "\r\n" . ' ' . "\t" . ' var a = $("#select_id").attr("checked");' . "\r\n\t" . ' if(a!=\'checked\') a = false;' . "\r\n" . '     $("input[name=\'id\']").attr("checked",a);' . "\r\n" . '});' . "\r\n" . ' </script>' . "\r\n";

?>
