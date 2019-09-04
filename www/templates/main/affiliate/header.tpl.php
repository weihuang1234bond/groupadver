<!doctype html>
<html>
<head>
<link rel="stylesheet" href="<?php echo SRC_TPL_DIR?>/style/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>站长后台</title>
</head>

<body>
<div id="navigation">
  <div class="container-fluid"> <a href="#" id="brand">站长后台</a>
    <ul class='main-nav'>
      <li <?php if(RUN_CONTROLLER=='main/main' OR !in_array(RUN_CONTROLLER,array('affiliate/zone','affiliate/stats','affiliate/report','affiliate/plan','affiliate/code','affiliate/orders','affiliate/cpa_report'))) echo "class='active'"?>> <a href="<?php echo url("affiliate/index.get_list")?>"> <i class="icon-home"></i> <span>我的首页</span> </a> </li>
      <li <?php if(RUN_CONTROLLER === 'affiliate/zone') {?>class="active"<?php }?>> <a href="<?php echo url("affiliate/zone.get_list")?>" data-toggle="dropdown" class='dropdown-toggle'> <i class="icon-edit"></i> <span>我的广告</span>  </a> </li>
      <li <?php if(RUN_CONTROLLER === 'affiliate/plan') {?>class="active"<?php }?>> <a href="<?php echo url("affiliate/plan.get_list")?>" data-toggle="dropdown" class='dropdown-toggle'> <i class="icon-edit"></i> <span>活动广告</span>  </a> </li>
      <li <?php if(RUN_CONTROLLER === 'affiliate/report') {?>class="active"<?php }?>> <a href="<?php echo url("affiliate/report.get_list?type=".$_COOKIE['defaul_report']."&timerange=".DAYS."_".DAYS)?>" data-toggle="dropdown" class='dropdown-toggle'> <i class="icon-table"></i> <span>效果报告</span>  </a> </li>
      <?php if(RUN_CONTROLLER === 'affiliate/code') {?>
      <li class="active"> <a href="<?php echo url("affiliate/code.get_custom")?>" data-toggle="dropdown" class='dropdown-toggle'> <i class="icon-edit"></i> <span>链接转换工具</span>  </a> </li>
      <?php }?>
      <?php if(RUN_CONTROLLER === 'affiliate/cpa_report') {?>
      <li class="active"> <a href="<?php echo url("affiliate/cpa_report.get_list")?>" data-toggle="dropdown" class='dropdown-toggle'> <i class="icon-edit"></i> <span>CPA明细报表</span>  </a> </li>
      <?php }?>
      <?php if(RUN_CONTROLLER === 'affiliate/orders') {?>
      <li class="active"> <a href="<?php echo url("affiliate/cpa_report.get_list")?>" data-toggle="dropdown" class='dropdown-toggle'> <i class="icon-edit"></i> <span>CPS明细报表</span>  </a> </li>
      <?php }?>
    </ul>
    <div class="user">
      <ul class="icon-nav">
          <?php if($GLOBALS ['read_num']){?>
        <li class="dropdown" title="消息"> <a href="<?php echo url("affiliate/msg.get_list")?>" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-msg"></i> <span class="label label-lightred"><?php echo $GLOBALS ['read_num']?></span> </a> </li>
         <?php }?>
        
         <?php if($GLOBALS ['service_qq']){?>
         <li class="dropdown" title="客服"> <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php  echo $GLOBALS ['service_qq'];?>&site=qq&menu=yes" target="_blank"  class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-kf"></i> </a> </li>
         <?php }?>
         <li class="dropdown" title="退出"> <a href="<?php echo url("main/main.logout?id=".$GLOBALS ['userinfo']['uid'])?>" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-exit"></i> </a> </li>
         
          <li class="dropdown"> <a href="<?php echo url("affiliate/account.get_list")?>" class="dropdown-toggle" data-toggle="dropdown" style="padding-top:9px;"> <?php echo $GLOBALS ['userinfo'] ["username"]?> </a> </li>
          
      </ul>
      
    
                
    </div>
  </div>
</div>
<div class="container-fluid" id="content">
