<?php if(!defined('IN_ZYADS')) exit(); 
TPL::display('header'); ?>
<script type="text/javascript" src="<?php echo WEB_URL?>js/jquery/js/jquery-1.7.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_URL?>js/jquery/lib/highcharts/js/highcharts.js"></script>

<div id="left">
  <?php TPL::display('left');?>
</div>
<div id="main" >
 <?php if($GLOBALS ['C_ZYIIS']['recommend_status']=='1'){?>
  <div>会员发展链接：<?php echo $GLOBALS ['C_ZYIIS']['authorized_url'].WEB_URL.'track/c/?rid='.$GLOBALS ['userinfo']['uid'];?> <span style="padding-left:20px; color:#F00">成功发展：<?php echo dr ( 'main/account.get_sum_recommend', $GLOBALS ['userinfo']['uid'])?>个</span></div>
  <?php }?>
  <table   border="0" cellpadding="0" cellspacing="0" class="mt30">
    <tr>
      <td width="21%"><span class="money"><?php echo sprintf("%.2f",$get_day_sunpay["sumpay"]) ?></span>元</td>
      <td width="21%"><span class="money"><?php echo sprintf("%.2f",$get_yesterday_sunpay["sumpay"]) ?></span>元</td>
      <td width="21%"><span class="money"><?php echo sprintf("%.2f",$get_month_sunpay["sumpay"]) ?></span>元</td>
      <td><span class="money"><?php echo sprintf("%.2f",$GLOBALS['userinfo']['daymoney']+$GLOBALS['userinfo']['weekmoney']+$GLOBALS['userinfo']['monthmoney']+$GLOBALS['userinfo']['xmoney']) ?></span>元</td>
    </tr>
    <tr>
      <td>当日收入</td>
      <td>昨日收入</td>
      <td>当月收入</td>
      <td>账户余额</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><button type="submit" class="btn btn-primary" onclick="location.href = '<?php echo url("affiliate/paylog.get_list")?>'">付款记录</button>
        查看最近的付款记录</td>
    </tr>
  </table>
  <div class="box">
    <div class="box-title">
      <h3><i class="icon-table"></i>当天报告</h3>
       
    </div>
    <div class="box-content">
      <table class="table table-hover table-nomargin">
        <thead>
          <tr>
            <th>类型</th>
            <th width="120">浏览量</th>
            <th width="120" class="hidden-350">结算</th>
            <th width="160" class="hidden-480">收益</th>
          </tr>
        </thead>
        <tbody>
		
		 <?php foreach( (array)$stats  as $t) { ?>
		 
          <tr>
            <td><?php echo strtoupper($t['plantype'])?>报表数据</td>
            <td><?php echo $t['views']?></td>
            <td class="hidden-350"><?php echo $t['num']?></td>
            <td class="hidden-480"><?php echo abs($t['sumpay'])?>元</td>
          </tr>
           <?php }?>
        </tbody>
      </table>
    </div>
    <div class="box-title">
      <h3><i class="icon-table"></i>快捷报告</h3>
    </div>
    <div class="box-content ai_report">
      <ul>
        <li><a href="<?php echo url("affiliate/report.get_list?&timerange=".$get_timerange['thismonth'])?>">本月报告</a></li>
        <li><a href="<?php echo url("affiliate/report.get_list?&timerange=".$get_timerange['lastmonth'])?>">上个月报告</a></li>
        <li><a href="<?php echo url("affiliate/report.get_list?&timerange=".$get_timerange['7day'])?>">最近一周报告</a></li>
        <li><a href="<?php echo url("affiliate/report.get_list?&timerange=".$get_timerange['day'])?>">今天报告</a></li>
      </ul>
    </div>
  </div>
</div>