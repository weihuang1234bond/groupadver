<?php if(!defined('IN_ZYADS')) exit();
TPL::display('header'); $hour_text = array ("0:00-1:00","1:00-2:00","2:00-3:00","3:00-4:00","4:00-5:00","5:00-6:00","6:00-7:00","7:00-8:00","8:00-9:00","9:00-10:00","10:00-11:00","11:00-12:00","12:00-13:00","13:00-14:00","14:00-15:00","15:00-16:00","16:00-17:00","17:00-18:00","18:00-19:00","19:00-20:00","20:00-21:00","21:00-22:00","22:00-23:00", "23:00-0:00");
?>
<script type="text/javascript" src="<?php echo WEB_URL?>js/jquery/lib/highcharts/js/highcharts.js"></script>
<script type="text/javascript" src="<?php echo WEB_URL?>js/calendar/calendar.js"></script>
<link rel="stylesheet" href="<?php echo WEB_URL?>js/calendar/calendar.css" media="all" type="text/css" />
<link rel="stylesheet" href="<?php echo SRC_TPL_DIR?>/css/rating.css" media="all" type="text/css" />
<div id="sidebar">
  <?php  TPL::display('sidebar');?>
</div>
<div id="main-content">
  <form method="post" id="formid" action="<?php echo url('admin/trend.get_list')?>" >
    <h3 class="heading">趋势分析  <span class="h3span"> <a href="<?php echo url("admin/trend.get_list?timerange=".$get_timerange['day'] )?>">今天</a> | <a href="<?php echo url("admin/trend.get_list?timerange=".$get_timerange['yesterday'])?>">昨天</a> | <a href="<?php echo url("admin/trend.get_list?timerange=".$get_timerange['7day'])?>">最近7天</a> | <a href="<?php echo url("admin/trend.get_list?timerange=".$get_timerange['30day'])?>">最近30天</a> | <a href="<?php echo url("admin/trend.get_list")?>">所有数据</a></span></h3>
    <div class="tab users">
      <div class="tab-header-right left" > <a href="<?php echo url('admin/trend.get_list')?>" class="tab-btn  list tab-state-active">趋势分析</a>  <a href="<?php echo url('admin/client_trend.get_os?timerange='.$get_timerange['day'].'')?>" class="tab-btn  os">客户端属性</a></div>
    </div>
    <div  class="dataTables_wrapper ">
      <div class="tb_sts" style="margin-bottom:10px;">
        <div class="span6">
          <div class="dataTables_filter" id="dt_outbox_filter"> 搜索：
            <input type="text" class="input_text " name="searchval" value="<?php echo $searchval?>" />
            <select name="searchtype">
              <option value="planid" <?php if ($searchtype == 'planid') echo "selected";?>>计划ID</option>
              <option value="uid" <?php if ($searchtype == 'uid') echo "selected";?>>站长ID</option>
            </select>
            <select name="timerange" id="timerange" style="width:200px;margin-bottom: 10px">
              <option value="<?php if($timerange != '') echo $timerange ;else echo $get_timerange['day']?>">
              <?php if($timerange != '') echo str_replace("_"," 至 ",$timerange) ;else echo str_replace("_"," 至 ",$get_timerange['day']);?>
              </option>
              <option  value="" <?php echo ($timerange == '' ? 'selected ' : '')?>>所有时间段</option>
               <option  value="<?php echo $get_timerange['day'] ?>" <?php echo ($timerange == $get_timerange['day'] ? ' selected' : '')?>>今天</option>
              <option value="<?php echo $get_timerange['yesterday'] ?>" <?php echo ($timerange == $get_timerange['yesterday'] ? ' selected' : '')?> >昨天</option>
              <option value="<?php echo $get_timerange['7day']?>" <?php echo ($timerange == $get_timerange['7day'] ? ' selected' : '')?> >最近7天</option>
              <option value="<?php echo $get_timerange['30day']?>" <?php echo ($timerange == $get_timerange['30day'] ? ' selected' : '')?> >最近30天</option>
              <option value="<?php echo $get_timerange['lastmonth']?>" <?php echo ($timerange == $get_timerange['lastmonth'] ? ' selected' : '')?> >上个月</option>
            </select>
            <img src="<?php echo SRC_TPL_DIR?>/images/calendar.png" align="absmiddle"  onclick="__C('timerange',2)" style="margin-bottom: 3px;"/>
            <input name="_s" id="_s" type="image" src="<?php echo SRC_TPL_DIR?>/images/sb.jpg" align="top" border="0"  >
          </div>
        </div>
      </div>
      <?php if(request ( 'compare' )!=1){
	 		// echo $timerange;
	  ?>
      <table width="100%"   border="0" align="center" cellpadding="0" cellspacing="0" class="tab_r">
        <tr>
          <td align="center"><span class="i_num">
            <?php
		  			 foreach((array)$sum_stats as $s) {
						 $views +=$s['views'];
					} echo (int)$views?>
            </span><br>
            <span class="i_text">浏览量</span></td>
          <?php foreach((array)explode(',', $GLOBALS['C_ZYIIS']['stats_type']) as $t) {
			 		$num = 0;
			 		foreach((array)$sum_stats as $s) {
						if($dc != $s['day']) continue;
						if($t == $s['plantype']) {
						 	 
							$num = $s[ 'num'];
						} 
					}
			 ?>
          <td align="center"><span class="i_num"><?php echo $num?></span><br />
            <span class="i_text"><?php echo strtoupper($t)?></span></td>
          <?php } ?>
          <td align="center"><span class="i_num">
            <?php
		  			 foreach((array)$sum_stats as $s) { if($dc != $s['day']) continue;
						 $sumpay +=$s['sumpay'];
					} echo (int)$sumpay?>
            </span><br>
            <span class="i_text">应付</span></td>
          <td align="center"><span class="i_num">
            <?php
		  			 foreach((array)$sum_stats as $s) { if($dc != $s['day']) continue;
						 $sumprofit +=$s['sumprofit'];
					} echo (int)$sumprofit?>
            </span><br>
            <span class="i_text">盈利</span></td>
        </tr>
      </table>
      <?php  $sumpay =  $sumprofit = 0;} ?>
      <div style="margin-top:20px; margin-left:30px">
        <input name="group" type="radio" value="day" <?php if($group=='day' || !$group)echo "checked"?>/>
        按天
        <input name="group" type="radio" value="hour" <?php if($group=='hour')echo "checked"?>/>
        按时
        <input name="compare" type="checkbox" id="compare" value="1" <?php if(request ( 'compare' )==1)echo "checked"?>/>
        对比数据 <span class="compare" style="display:<?php if(request ( 'compare' )!=1)echo "none"?>">
        <input name="compare_1" id="compare_1" type="text"  class="input_text" onclick="__C('compare_1',1)" style="width:80px" value="<?php  echo request('compare_1')?>"/>
        与
        <input name="compare_2" id="compare_2" type="text"  class="input_text "  onclick="__C('compare_2',1)" style="width:80px" value="<?php  echo request('compare_2')?>"/>
        <select name="plantype" class="plantype" id="plantype">
          <option value="">所有类型</option>
          <?php foreach(explode(',', $GLOBALS['C_ZYIIS']['stats_type']) AS $t) {?>
          <option value="<?php echo $t?>" <?php if(request('plantype')==$t)echo "selected"?> >对比<?php echo strtoupper($t)?></option>
          <?php }?>
        </select>
        <button class="rowbnt" type="submit" id="choose_sb">对比</button>
        </span> </div>
      <div id="container"  style="margin-top:20px;  height:270px"> </div>
      <div class="fold"> <a href="javascript:void(0);" id="fold_close"></a> </div>
      <script language="JavaScript" type="text/javascript">
$(function () {
		 
        $('#container').highcharts({
		   chart:{
		   	borderWidth:0,
			borderRadius:2
		   },
            title: {
                text: '<?php echo str_replace("_"," 至 ",$timerange)?>',
                x: -20 //center
            },
            
            xAxis: {
                categories: [<?php echo $xAxis?>],			  
                tickInterval: <?php $cn = count(explode(',', $xAxis));echo $cn>7 ? (int)($cn*0.2) : 1;?> 
				 
            },
            yAxis: {
                title: {
                    text: '流量统计'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }],
				min: 0
            },
            tooltip: {
                valueSuffix: '次'
            } ,
            legend: {
				borderWidth: 0,
                align: 'right',
                x: -10,
                verticalAlign: 'top',
                y: 0,
                floating: true,
                backgroundColor: '#FFFFFF',
				borderColor: '#FFFFFF'
            },
			 
            series: [<?php echo str_replace(array("pv","ip"),array("浏览量","结算数"),$series);?>]
			
			
        });
    });
    
  $('input:radio[name="group"]').on('click', function(option) {	
        $('input:radio[name=group]').attr("checked", false);
		$(this).attr("checked",true);
		$('input:checkbox[name="compare"]').attr("checked",false)
        $("#formid").submit();
    });
	
	$('input:checkbox[name="compare"]').on('click', function(option) {	
        if($('input:checkbox[name="compare"]').attr("checked")){
			 $(".compare").show();
		}else {
			 $(".compare").hide();
		}
		 
    });
 

 </script>
 
 <?php if ($group == 'day') {?>
 
 <table id="dt_inbox" class="dataTable" style="margin-top:30px">
        <thead>
          <tr role="row">
            <th>日期</th>
          
            <th>浏览量</th>
            <th>结算数</th>
            <th>点击量</th>
            <th>效果数</th>
            <th>扣量</th>
            <th>二次点击</th>
            <th>CTR</th>
            <th>应付金额</th>
            <th>盈利</th>
            
          </tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
          <?php  
		  if($group == 'day'){$day_hour = $day_sum_stats = $day_sum_stats_page;}
		  foreach((array)$day_hour as $d){?>
          <tr class="unread odd">
            <td><?php echo $group == 'day' ? $d['day'] : $hour_text[$d]?></td>
            
            <td><?php echo $d['views']?></td>
            <td><?php echo $d['num']?></td>
            <td><?php echo $d['clicks']?></td>
            <td><?php echo $d['effectnum']?></td>
            <td><?php echo $d['deduction']?></td>
            <td><?php echo $d['do2click']?></td>
            <td><?php echo Ctr($d["views"],$d['num'])?>%</td>
            <td><?php echo abs($d['sumpay'])?></td>
            <td><?php echo abs($d['sumprofit'])?></td>
            
          </tr>
          <?php }?>
        </tbody>
      </table>
      
   <?php } else {?>
       
      <table id="dt_inbox" class="dataTable" style="margin-top:30px">
        <thead>
          <tr role="row">
            <th>日期</th>
            <?php foreach((array)$st as $t) {?>
            <th><?php echo strtoupper($t)?></th>
            <?php }?>
          </tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
          <?php    
		  if($group == 'day'){$day_hour = $day_sum_stats = $day_sum_stats_page;}
		  foreach((array)$day_hour as $d){?>
          <tr class="unread odd">
            <td><?php echo $group == 'day' ? $d['day'] : $hour_text[$d]?></td>
            <?php foreach((array)$st as $t) {?>
            <td><?php 
					$num = 0;
				 
			 		foreach((array)$day_sum_stats as $s) {
						if ($group == 'day') { 
							if($t == $s['plantype'] && $s['day']== $d['day']) {
								 
								$num = $s['num'];
							} 
						}else {  
							if( strtolower($t) == strtolower($s['plantype'])  ) { 
							  
								$ft = 'hour'.$d;   
								$num = $s[$ft];
							}
							
						}	
					}
					echo $num;
			?></td>
            <?php }?>
          </tr>
          <?php }?>
        </tbody>
      </table>
      
      <?php }?>
       
      <div class="zpage_bt1">
        <?php  echo $page->echoPage ();?>
      </div>
    </div>
  </form>
</div>
</div>
</div>
<?php  
TPL::display('footer');
?>
<script language="JavaScript" type="text/javascript">
 $("#_s").click(function(){
	$('input:checkbox[name="compare"]').attr("checked",false)
});	

$("#fold_close").click(function(){

	var o = $('#container');
	if(o.css("display")=='none'){
		o.show(); 
	    $(this).css("backgroundImage","url(<?php echo SRC_TPL_DIR?>/images/fold_t.jpg)");
	}else {
		o.hide();
	    $(this).css("backgroundImage","url(<?php echo SRC_TPL_DIR?>/images/fold_m.jpg)");
	}
});	

 </script> 
