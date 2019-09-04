<?php

echo '﻿<!doctype html>' . "\r\n" . '<html>' . "\r\n" . '<head>' . "\r\n" . '<link rel="stylesheet" href="';
echo SRC_TPL_DIR;
echo '/style/style.css">' . "\r\n" . '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />' . "\r\n" . '<meta http-equiv="X-UA-Compatible" content="IE=edge">' . "\r\n" . '<title>广告商后台</title>' . "\r\n" . '</head>' . "\r\n\r\n" . '<body>' . "\r\n" . '<div id="navigation">' . "\r\n" . '  <div class="container-fluid"> <a href="#" id="brand">广告商后台</a>' . "\r\n" . '    <ul class=\'main-nav\'>' . "\r\n" . '      <li ';
if ((RUN_CONTROLLER == 'main/main') || !in_array(RUN_CONTROLLER, array('advertiser/zone', 'advertiser/stats', 'advertiser/report', 'advertiser/plan', 'advertiser/code', 'advertiser/ad', 'advertiser/orders', 'advertiser/cpa_report'))) {
	echo 'class=\'active\'';
}

echo '> <a href="';
echo url('advertiser/index.get_list');
echo '"> <i class="icon-home"></i> <span>我的首页</span> </a> </li>' . "\r\n" . '      <li ';

if (RUN_CONTROLLER === 'advertiser/plan') {
	echo 'class="active"';
}

echo '> <a href="';
echo url('advertiser/plan.get_list');
echo '" data-toggle="dropdown" class=\'dropdown-toggle\'> <i class="icon-edit"></i> <span>计划管理</span>  </a> </li>' . "\r\n" . '      <li ';

if (RUN_CONTROLLER === 'advertiser/ad') {
	echo 'class="active"';
}

echo '> <a href="';
echo url('advertiser/ad.get_list');
echo '" data-toggle="dropdown" class=\'dropdown-toggle\'> <i class="icon-edit"></i> <span>广告管理</span>  </a> </li>' . "\r\n" . '      <li ';

if (RUN_CONTROLLER === 'advertiser/report') {
	echo 'class="active"';
}

echo '> <a href="';
echo url('advertiser/report.get_list?type=' . $_COOKIE['report_de_type'] . '&timerange=' . DAYS . '_' . DAYS);
echo '" data-toggle="dropdown" class=\'dropdown-toggle\'> <i class="icon-table"></i> <span>效果报告</span>   </a> </li>' . "\r\n" . '      ';

if (RUN_CONTROLLER === 'advertiser/code') {
	echo '      <li class="active"> <a href="';
	echo url('advertiser/code.get_custom');
	echo '" data-toggle="dropdown" class=\'dropdown-toggle\'> <i class="icon-edit"></i> <span>链接转换工具</span>  </a> </li>' . "\r\n" . '      ';
}

echo '      ' . "\r\n" . '       ';

if (RUN_CONTROLLER === 'advertiser/cpa_report') {
	echo '      <li class="active"> <a href="';
	echo url('advertiser/cpa_report.get_list');
	echo '" data-toggle="dropdown" class=\'dropdown-toggle\'> <i class="icon-edit"></i> <span>CPA明细报表</span>  </a> </li>' . "\r\n" . '      ';
}

echo '      ';

if (RUN_CONTROLLER === 'advertiser/orders') {
	echo '      <li class="active"> <a href="';
	echo url('advertiser/cpa_report.get_list');
	echo '" data-toggle="dropdown" class=\'dropdown-toggle\'> <i class="icon-edit"></i> <span>CPS明细报表</span>  </a> </li>' . "\r\n" . '      ';
}

echo '      ' . "\r\n" . '    </ul>' . "\r\n" . '     <div class="user">' . "\r\n" . '      <ul class="icon-nav">' . "\r\n" . '          ';

if ($GLOBALS['read_num']) {
	echo '        <li class="dropdown" title="消息"> <a href="';
	echo url('advertiser/msg.get_list');
	echo '" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-msg"></i> <span class="label label-lightred">';
	echo $GLOBALS['read_num'];
	echo '</span> </a> </li>' . "\r\n" . '         ';
}

echo '         ' . "\r\n\r\n" . '  ';

if ($GLOBALS['service_qq']) {
	echo '         <li class="dropdown" title="客服"> <a href="http://wpa.qq.com/msgrd?v=3&uin=';
	echo $GLOBALS['service_qq'];
	echo '&site=qq&menu=yes" target="_blank"  class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-kf"></i> </a> </li>' . "\r\n" . '         ';
}

echo "\r\n" . '         <li class="dropdown" title="退出"> <a href="';
echo url('main/main.logout?id=' . $GLOBALS['userinfo']['uid']);
echo '" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-exit"></i> </a> </li>' . "\r\n" . '         ' . "\r\n" . '           <li class="dropdown"> <a href="';
echo url('advertiser/account.get_list');
echo '" class="dropdown-toggle" data-toggle="dropdown" style="padding-top:9px;"> ';
echo $GLOBALS['userinfo']['username'];
echo ' </a> </li>' . "\r\n" . '         ' . "\r\n" . '        </li>' . "\r\n" . '      </ul>' . "\r\n" . '    </div>' . "\r\n" . '  </div>' . "\r\n" . '</div>' . "\r\n" . '<div class="container-fluid" id="content">' . "\r\n";

?>
