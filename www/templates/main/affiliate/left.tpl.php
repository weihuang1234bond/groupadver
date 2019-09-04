<div class="subnav">
    <div class="subnav-title"> <a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>我的概况</span></a> </div>
    <ul class="subnav-menu">
      <li <?php if(RUN_CONTROLLER=="affiliate/index") echo "class='current'"?>> <a href="<?php echo url("affiliate/index.get_list")?>">我的概况</a> </li>
      <li <?php if(RUN_CONTROLLER=="affiliate/account") echo "class='current'"?>> <a href="<?php echo url("affiliate/account.get_list")?>">帐户设置</a> </li>
	  <li <?php if(RUN_CONTROLLER=="affiliate/site") echo "class='current'"?>> <a href="<?php echo url("affiliate/site.get_list")?>">网站管理</a> </li>
	  <li <?php if(RUN_CONTROLLER=="affiliate/paylog") echo "class='current'"?>> <a href="<?php echo url("affiliate/paylog.get_list")?>">付款记录</a> </li>
      <li <?php if(RUN_CONTROLLER=="affiliate/msg") echo "class='current'"?>> <a href="<?php echo url("affiliate/msg.get_list")?>">消息中心</a> </li>
      <?php if($GLOBALS['C_ZYIIS']['integral_status']=='1'){?>
      <li <?php if(RUN_CONTROLLER=="affiliate/gift") echo "class='current'"?>> <a href="<?php echo url("affiliate/gift.get_list")?>">积分乐园</a> </li>
     <?php }?>
      
    </ul>
  </div>
  <div class="subnav">
    <div class="subnav-title"> <a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>帮助</span></a> </div>
    <ul class="subnav-menu">
      <li> <a href="<?php echo url("index.article?id=81")?>" target="_blank">怎么修改财务信息？</a> </li>
      <li> <a href="<?php echo url("index.article?id=82")?>" target="_blank">怎么增加网站信息？</a> </li>
      <li> <a href="<?php echo url("index.article?id=83")?>" target="_blank">联盟付款规则？</a> </li>
      <li> <a href="<?php echo url("index.article?id=84")?>" target="_blank">如何获取广告代码？</a> </li>
    </ul>
  </div>