<?php if(!defined('IN_ZYADS')) exit(); 
TPL::display('header');
?>

<div id="left">
 <?php TPL::display('left');?>
</div>
<div id="main" style="padding-top:10px">
   
  
  <div class="alert alert-info" style="margin-top:10px">
							<h4>付款规则</h4>
							<p>1.支付标准为 <?php echo $GLOBALS['C_ZYIIS']['min_clearing']?>元起付</p>
							<p>2.结算时间 <?php $ec=explode(',',$GLOBALS['C_ZYIIS']['clearing_cycle']);foreach($ec as $c){if($c=='day')echo '日结 ';if($c=='week')echo '周结（每周'.$GLOBALS['C_ZYIIS']['clearing_weekdata'].'） ';if($c=='month')echo '月结（每月'.$GLOBALS['C_ZYIIS']['clearing_monthdata'].'号）';}?></p>
							<p>3.如果您帐户分类金额尚未累计至 <?php echo $GLOBALS['C_ZYIIS']['min_clearing']?>元，系统会自动累计下次结算</p>
  </div>
     
  
  <div class="box" >
    <div class="box-title">
      <h3><i class="icon-table"></i>付款记录</h3>
      
    </div>
     
    <div class="box-content">
      <table class="table">
        <thead>
          <tr>
            <th>时间</th>
            <th>广告收入</th>
            <th>下线收入</th>
            <th>代扣税</th>
            <th width="100">手续费</th>
            <th width="100">应付金额</th>
            <th width="100">状态</th>
            
          </tr>
        </thead>
        <tbody>
          <?php foreach((array)$paylog as $p) {
		  		
		  ?>
          <tr sid="<?php echo $p['addtime']?>">
            <td><?php echo $p['addtime']?></td>
            <td>￥<?php echo abs($p['money'])?></td>
            <td>￥<?php echo abs($p['xmoney'])?></td>
            <td>￥<?php echo $p['tax']?> </td>
            <td>￥<?php echo $p['charges']?></td>
            <td>￥<?php echo abs($p['pay']);?></td>
            <td><?php
			  if ($p['status'] == '0')
				{
					$statusY = '<font color=red>未支付</font>';
				} 
				if ($p['status']=='1')
				{
					$statusY = '<font color=blue>已支付</font>';
				} 
				echo $statusY;
			  ?></td>
            
          </tr>
          <?php }?>
        </tbody>
      </table>
      
        <div><?php  echo $page->echoPage ();?></div>
        
    </div>
  </div>
</div>
 
