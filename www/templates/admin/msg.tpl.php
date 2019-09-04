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
echo '</div>' . "\r\n" . '<div id="main-content">' . "\r\n" . '  <div class="row-fluid" >' . "\r\n" . '    <h3 class="heading">' . "\r\n" . '      消息管理' . "\r\n" . '    </h3>' . "\r\n\t\r\n\t" . ' ' . "\r\n\t\r\n\t\r\n" . '    <div  class="dataTables_wrapper ">' . "\r\n" . '      <div class="tb_sts"><a href="';
echo url('admin/msg.add');
echo '"  class="tab-btn add ">发布消息</a></div>' . "\r\n" . '      <div class="row">' . "\r\n" . '        <div class="span6">' . "\r\n" . '          <div id="dt_outbox_length" class="dataTables_length"> 批量操作：' . "\r\n" . '            <select size="1" name="choose_type" id="choose_type">' . "\r\n" . ' ' . "\r\n" . '              <option value="del" >删除</option>' . "\r\n" . '            </select>' . "\r\n" . '            <button class="rowbnt" type="submit" id="choose_sb">提交</button>' . "\r\n" . '          </div>' . "\r\n" . '        </div>' . "\r\n" . '        <div class="span6">' . "\r\n" . '          <div class="dataTables_filter" id="dt_outbox_filter">' . "\r\n" . '            <form method="post">' . "\r\n" . '              搜索：' . "\r\n" . '              <select name="searchtype">' . "\r\n" . '                <option value="title" ';

if ($searchtype == 'title') {
	echo 'selected';
}

echo '>标题</option>' . "\r\n" . '              </select>' . "\r\n" . '              <input type="text" class="input_text span30" name="search" value="';
echo $search;
echo '">' . "\r\n" . '              <input name="_s" type="image" src="';
echo SRC_TPL_DIR;
echo '/images/sb.jpg" align="top" border="0"  >' . "\r\n" . '            </form>' . "\r\n" . '          </div>' . "\r\n" . '        </div>' . "\r\n" . '      </div>' . "\r\n" . '      <table id="dt_inbox" class="dataTable">' . "\r\n" . '        <thead>' . "\r\n" . '          <tr role="row">' . "\r\n" . '            <th class="table_checkbox sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 13px;" aria-label=""><input type="checkbox" name="select_id" id="select_id"></th>' . "\r\n" . '            <th>标题</th>' . "\r\n" . '            <th>发布到所有</th>' . "\r\n" . '            <th>时间</th>' . "\r\n" . '            <th>发送人</th>' . "\r\n" . '            <th>操作</th>' . "\r\n" . '          </tr>' . "\r\n" . '        </thead>' . "\r\n" . '        <tbody role="alert" aria-live="polite" aria-relevant="all">' . "\r\n" . '          ';

foreach ((array) $msg as $m ) {
	echo '          <tr class="unread odd">' . "\r\n" . '            <td><input type="checkbox" name="messageid" id="article_';
	echo $m['messageid'];
	echo '" value="';
	echo $m['messageid'];
	echo '"></td>' . "\r\n" . '            <td><a href="#" target="_blank"><font color="';
	echo $m['color'];
	echo '">';
	echo $m['title'];
	echo '</font></a></td>' . "\r\n" . '            <td>';
	echo $m['type'] == 1 ? '站长' : '广告商';
	echo '</td>' . "\r\n" . '            <td>';
	echo $m['addtime'];
	echo '</td>' . "\r\n" . '            <td class="status">';
	echo $m['sendusername'];
	echo '</td>' . "\r\n" . '            <td messageid=\'';
	echo $m['messageid'];
	echo '\' class="uld_img"><a href="';
	echo url('admin/msg.edit?messageid=' . $m['messageid']);
	echo '"><img src="';
	echo SRC_TPL_DIR;
	echo '/images/pencil_gray.png" alt="" border="0" /></a> <img src="';
	echo SRC_TPL_DIR;
	echo '/images/trashcan_gray.png" alt="" border="0"  class="del" /></td>' . "\r\n" . '          </tr>' . "\r\n" . '          ';
}

echo '        </tbody>' . "\r\n" . '      </table>' . "\r\n" . '      <div class="row">' . "\r\n" . '        ';
echo $page->echoPage();
echo '      </div>' . "\r\n" . '    </div>' . "\r\n" . '  </div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n";
TPL::display('footer');
echo '<script language="JavaScript" type="text/javascript">' . "\r\n\r\n\r\n" . 'function uld(type,e) {' . "\r\n\t" . 'var html = \'\';' . "\r\n" . '   ' . "\t" . 'var width = 400;' . "\r\n\t" . 'if (type == \'del\') {' . "\r\n\t\t" . 'url = \'';
echo url('admin/msg.del');
echo '\';' . "\r\n\t\t" . 'title = \'删除文章\';' . "\r\n\t\t" . 'text = \'确定要删除吗？删除后无法恢复!\';' . "\r\n\t" . '}' . "\r\n\t" . 'if (type == \'lock\') {' . "\r\n\t\t" . 'url = \'';
echo url('admin/msg.lock');
echo '\';' . "\r\n\t\t" . 'html = \'<span class="notification error_bg">锁定</span>\';' . "\r\n\t" . '    text = \'确认锁定吗\';' . "\r\n\t\t" . 'title = \'锁定文章\';' . "\r\n\t" . '}' . "\r\n\t" . 'if (type == \'unlock\') {' . "\r\n\t\t" . 'url = \'';
echo url('admin/msg.unlock');
echo '\';' . "\r\n\t\t" . 'html = \'<span class="notification info_bg">活动</span>\';' . "\r\n\t" . '    text = \'确认激活吗\';' . "\r\n\t\t" . 'title = \'激活文章\';' . "\r\n\t" . '}' . "\r\n" . ' ' . "\t\t" . ' ' . "\r\n\t" . 'box.confirm(text,width,title,function(bool){ ' . "\r\n\t\t" . ' if(e) article_id = $(e).parent().attr("messageid");' . "\r\n\t\t" . ' article_id = article_id.split(\',\');' . "\r\n\t\t" . ' if (bool) {' . "\r\n\t\t\t" . ' if (type == \'del\') {' . "\r\n\t\t\t\t" . '$.each(article_id, function(i,val){   ' . "\r\n\t\t\t\t\t" . '$("#article_"+val).parent().parent().css("backgroundColor", "#faa").hide(\'normal\');' . "\r\n\t\t\t\t" . '});  ' . "\r\n\t\t\t" . ' } ' . "\r\n\t\t\t" . '$.ajax(' . "\r\n\t\t\t" . '{' . "\r\n\t\t\t\t" . 'dataType: \'html\',' . "\r\n\t\t\t\t" . 'url: url,' . "\r\n\t\t\t\t" . 'type: \'post\',' . "\r\n\t\t\t\t" . 'data: \'messageid=\' + article_id ,' . "\r\n\t\t\t\t" . 'success: function() ' . "\r\n\t\t\t\t" . '{' . "\r\n\t\t\t\t\t" . ' $.each(article_id, function(i,val){    ' . "\r\n\t\t\t\t\t\t" . ' ' . "\t" . '$("#article_"+val).parent().parent().find(\'.status\').html(html);' . "\r\n\t\t\t\t\t" . ' });   ' . "\r\n\t\t\t\t\t" . '$(".success").show();' . "\r\n\t\t\t\t" . '}' . "\r\n\t\t\t" . '});' . "\r\n\t\t" . '}' . "\r\n\t" . '});' . "\r\n" . '}' . "\r\n\r\n" . '$(".unlock,.lock,.del").click(function(){' . "\r\n\t" . 'uld(this.className,this);' . "\r\n" . '});' . "\r\n\r\n" . '$("#choose_sb").click(function(){' . "\r\n\t" . 'var arr=[];' . "\r\n\t" . 'var choose_type = $("#choose_type").val();' . "\r\n\t" . 'if(!choose_type){' . "\r\n\t\t" . 'box.alert(\'批量操作请选择一个操作对像\',300);' . "\r\n\t\t" . 'return ;' . "\r\n\t" . '}' . "\r\n" . ' ' . "\t" . 'var arrChk=$("input[name=\'messageid\']:checked"); ' . "\r\n" . '     ' . "\r\n" . '    for (var i=0;i<arrChk.length;i++)' . "\r\n" . '    {' . "\r\n" . '        var v = arrChk[i].value;' . "\r\n\t\t" . 'arr.push(v);' . "\r\n\t\t\r\n" . '    }' . "\r\n\t" . 'article_id = arr.join(",");' . "\r\n\t" . 'uld(choose_type);' . "\r\n" . '});' . "\r\n\r\n" . '$("#select_id").click(function(){' . "\r\n" . ' ' . "\t" . ' var a = $("#select_id").attr("checked");' . "\r\n\t" . ' if(a!=\'checked\') a = false;' . "\r\n" . '     $("input[name=\'messageid\']").attr("checked",a);' . "\r\n" . '});' . "\r\n" . ' </script>' . "\r\n";

?>
