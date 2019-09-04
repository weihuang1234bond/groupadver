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
echo '</div>' . "\r\n" . '<div id="main-content">' . "\r\n" . '  <div class="row-fluid" >' . "\r\n" . '    <h3 class="heading"> 站长用户组 </h3>' . "\r\n" . '    <div  class="dataTables_wrapper ">' . "\r\n" . '      <div class="tb_sts"><a href="';
echo url('admin/group.add');
echo '"  class="tab-btn add ">新增分类</a></div>' . "\r\n" . '      <div class="row">' . "\r\n" . '        <div class="span6">' . "\r\n" . '          <div id="dt_outbox_length" class="dataTables_length"> 批量操作：' . "\r\n" . '            <select size="1" name="choose_type" id="choose_type">' . "\r\n" . '              <option value="">请选择</option>' . "\r\n" . '              <option value="del" >删除</option>' . "\r\n" . '            </select>' . "\r\n" . '            <button class="rowbnt" type="submit" id="choose_sb">提交</button>' . "\r\n" . '          </div>' . "\r\n" . '        </div>' . "\r\n" . '      </div>' . "\r\n" . '      <table id="dt_inbox" class="dataTable">' . "\r\n" . '        <thead>' . "\r\n" . '          <tr role="row">' . "\r\n" . '            <th class="table_checkbox sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 13px;" aria-label=""><input type="checkbox" name="select_id" id="select_id"></th>' . "\r\n" . '            <th>ID</th>' . "\r\n" . '            <th>分组名称</th>' . "\r\n" . '            <th>站长数量</th>' . "\r\n" . '            <th>操作</th>' . "\r\n" . '          </tr>' . "\r\n" . '        </thead>' . "\r\n" . '        <tbody role="alert" aria-live="polite" aria-relevant="all">' . "\r\n" . '          ';

foreach ((array) $group as $g ) {
	$sum = dr('admin/group.get_sum_groupid', $g['groupid']);
	echo '          <tr class="unread odd">' . "\r\n" . '            <td><input type="checkbox" name="groupid" id="group_';
	echo $g['groupid'];
	echo '" value="';
	echo $g['groupid'];
	echo '"></td>' . "\r\n" . '            <td>';
	echo $g['groupid'];
	echo '</td>' . "\r\n" . '            <td>';
	echo $g['groupname'];
	echo '</td>' . "\r\n" . '            <td>';
	echo $sum;
	echo '</td>' . "\r\n" . '            <td groupid=\'';
	echo $g['groupid'];
	echo '\' class="uld_img"><a href="';
	echo url('admin/group.edit?groupid=' . $g['groupid']);
	echo '"><img src="';
	echo SRC_TPL_DIR;
	echo '/images/pencil_gray.png" alt="" border="0" title="编辑" /></a> <img src="';
	echo SRC_TPL_DIR;
	echo '/images/trashcan_gray.png" alt="" border="0"  class="del" title="删除"/></td>' . "\r\n" . '          </tr>' . "\r\n" . '          ';
}

echo '        </tbody>' . "\r\n" . '      </table>' . "\r\n" . '      <div class="row">' . "\r\n" . '        ';
echo $page->echoPage();
echo '      </div>' . "\r\n" . '    </div>' . "\r\n" . '  </div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n";
TPL::display('footer');
echo '<script language="JavaScript" type="text/javascript">' . "\r\n\r\n\r\n" . 'function uld(type,e) {' . "\r\n\t" . 'var html = \'\';' . "\r\n" . '   ' . "\t" . 'var width = 400;' . "\r\n\t" . 'if (type == \'del\') {' . "\r\n\t\t" . 'url = \'';
echo url('admin/group.del');
echo '\';' . "\r\n\t\t" . 'title = \'删除分类\';' . "\r\n\t\t" . 'text = \'确定要删除吗？删除后无法恢复!\';' . "\r\n\t" . '}' . "\r\n\t" . ' ' . "\r\n\t" . 'box.confirm(text,width,title,function(bool){ ' . "\r\n\t\t" . ' if(e) group_id = $(e).parent().attr("groupid");' . "\r\n\t\t" . ' group_id = group_id.split(\',\');' . "\r\n\t\t" . ' if (bool) {' . "\r\n\t\t\t" . ' if (type == \'del\') {' . "\r\n\t\t\t\t" . '$.each(group_id, function(i,val){   ' . "\r\n\t\t\t\t\t" . '$("#group_"+val).parent().parent().css("backgroundColor", "#faa").hide(\'normal\');' . "\r\n\t\t\t\t" . '});  ' . "\r\n\t\t\t" . ' } ' . "\r\n\t\t\t" . '$.ajax(' . "\r\n\t\t\t" . '{' . "\r\n\t\t\t\t" . 'dataType: \'html\',' . "\r\n\t\t\t\t" . 'url: url,' . "\r\n\t\t\t\t" . 'type: \'post\',' . "\r\n\t\t\t\t" . 'data: \'groupid=\' + group_id ,' . "\r\n\t\t\t\t" . 'success: function() ' . "\r\n\t\t\t\t" . '{' . "\r\n\t\t\t\t\t" . ' $.each(group_id, function(i,val){    ' . "\r\n\t\t\t\t\t\t" . ' ' . "\t" . '$("#group_"+val).parent().parent().find(\'.status\').html(html);' . "\r\n\t\t\t\t\t" . ' });   ' . "\r\n\t\t\t\t\t" . '$(".success").show();' . "\r\n\t\t\t\t" . '}' . "\r\n\t\t\t" . '});' . "\r\n\t\t" . '}' . "\r\n\t" . '});' . "\r\n" . '}' . "\r\n\r\n" . '$(".del").click(function(){' . "\r\n\t" . 'uld(this.className,this);' . "\r\n" . '});' . "\r\n\r\n" . '$("#choose_sb").click(function(){' . "\r\n\t" . 'var arr=[];' . "\r\n\t" . 'var choose_type = $("#choose_type").val();' . "\r\n\t" . 'if(!choose_type){' . "\r\n\t\t" . 'box.alert(\'批量操作请选择一个操作对像\',300);' . "\r\n\t\t" . 'return ;' . "\r\n\t" . '}' . "\r\n" . ' ' . "\t" . 'var arrChk=$("input[name=\'groupid\']:checked"); ' . "\r\n" . '     ' . "\r\n" . '    for (var i=0;i<arrChk.length;i++)' . "\r\n" . '    {' . "\r\n" . '        var v = arrChk[i].value;' . "\r\n\t\t" . 'arr.push(v);' . "\r\n\t\t\r\n" . '    }' . "\r\n\t" . 'group_id = arr.join(",");' . "\r\n\t" . 'uld(choose_type);' . "\r\n" . '});' . "\r\n\r\n" . '$("#select_id").click(function(){' . "\r\n" . ' ' . "\t" . ' var a = $("#select_id").attr("checked");' . "\r\n\t" . ' if(a!=\'checked\') a = false;' . "\r\n" . '     $("input[name=\'groupid\']").attr("checked",a);' . "\r\n" . '});' . "\r\n" . ' </script>' . "\r\n";

?>
