<?php if(!defined('IN_ZYADS')) exit();
TPL::display('header'); ?>

<script type="text/javascript"
	src="<?php echo WEB_URL?>js/calendar/calendar.js"></script>
<link rel="stylesheet"
	href="<?php echo WEB_URL?>js/calendar/calendar.css" media="all"
	type="text/css" />
<link rel="stylesheet" href="<?php echo SRC_TPL_DIR?>/css/rating.css"
	media="all" type="text/css" />
<div class="alert success" <?php if(!$_SESSION['succ']) {?>
	style="display: none" <?php }?>>
	<!-- <a class="close" href="javascript:;">×</a>-->
	<strong>操作成功.</strong>
</div>
<div class="alert err" <?php if(!$_SESSION['err']) {?>
	style="display: none" <?php }?>>
	<!-- <a class="close" href="javascript:;">×</a>-->
	<strong>操作失败.</strong>
</div>
<div id="sidebar">
  <?php  TPL::display('sidebar');?>
</div>
<div id="main-content">
	<h3 class="heading">IP报表</h3>
	<div class="tab users">
		<div class="tab-header-right left">
			<a
				href="<?php echo url("admin/ip.get_list?timerange=".DAYS.'_'.DAYS."")?>"
				class="tab-btn  list tab-state-active">IP报表</a> <a
				href="javascript:;" class="tab-btn ip" id="z_all" data_v=0>展开全部IP详情</a>
			<a href="javascript:;" class="tab-btn truncate" id="del_allip">清空IP数据</a>
		</div>
	</div>
	<div class="row-fluid">
		<div class="dataTables_wrapper ">
			<div class="tb_sts" style="margin-bottom: 10px;">
				<div class="span6">
					<div class="dataTables_filter" id="dt_outbox_filter">
						<form method="post" action="<?php echo url("admin/ip.get_list")?>">
							过滤： <input type="text" class="input_text span30" id="searchval"
								name="searchval" value="<?php  echo $searchval ?>"
								style="width: 160px; color: #999999; font-style: italic"
								onFocus="this.value=''"> <select name="searchtype"
								id="searchtype">
								<option value="ip"
									<?php if ($searchtype == 'ip') echo "selected";?>>IP地址</option>
								<option value="uid"
									<?php if ($searchtype == 'uid') echo "selected";?>>会员UID</option>
								<option value="planid"
									<?php if ($searchtype == 'planid') echo "selected";?>>计划ID</option>
								<option value="adsid"
									<?php if ($searchtype == 'adsid') echo "selected";?>>广告ID</option>
							</select> <select name="planid" id="planid"
								<?php if(RUN_ACTION=='edit') echo "disabled='disabled'"?>>
								<option value="">所有计划</option>
                <?php 
			   		foreach ( explode(',', $GLOBALS['C_ZYIIS']['stats_type']) AS $t){
						
			   ?>
                <optgroup label="<?php echo strtoupper($t)?>">
                <?php foreach((array)$plan AS $p) { 
						if($p['plantype']!==$t)continue ;
				?>
                <option value="<?php echo $p['planid']?>"
										<?php if($p['planid']==$planid) echo "selected"?>>&nbsp;<?php echo $p['planname']?>&nbsp;</option>
                <?php } ?>
                </optgroup>
                <?php } ?>
              </select> <select name="timerange" id="timerange"
								style="width: 200px; margin-bottom: 10px">
								<option
									value="<?php if($timerange != '') echo $timerange ;else echo $get_timerange['day']?>">
                  <?php if($timerange != '') echo str_replace("_"," 至 ",$timerange) ;else echo str_replace("_"," 至 ",$get_timerange['day']);?>
                </option>
								<option value=""
									<?php echo ($timerange == '' ? 'selected ' : '')?>>所有时间段</option>
								<option value="<?php echo $get_timerange['day'] ?>"
									<?php echo ($timerange == $get_timerange['day'] ? ' selected' : '')?>>今天</option>
								<option value="<?php echo $get_timerange['yesterday'] ?>"
									<?php echo ($timerange == $get_timerange['yesterday'] ? ' selected' : '')?>>昨天</option>
								<option value="<?php echo $get_timerange['7day']?>"
									<?php echo ($timerange == $get_timerange['7day'] ? ' selected' : '')?>>最近7天</option>
								<option value="<?php echo $get_timerange['30day']?>"
									<?php echo ($timerange == $get_timerange['30day'] ? ' selected' : '')?>>最近30天</option>
								<option value="<?php echo $get_timerange['lastmonth']?>"
									<?php echo ($timerange == $get_timerange['lastmonth'] ? ' selected' : '')?>>上个月</option>
							</select> <img src="<?php echo SRC_TPL_DIR?>/images/calendar.png"
								align="absmiddle" onclick="__C('timerange',2)"
								style="margin-bottom: 3px;" /> <input name="_s" id="_s"
								type="image" src="<?php echo SRC_TPL_DIR?>/images/sb.jpg"
								align="top" border="0" />
						</form>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="span6">
					<div id="dt_outbox_length" class="dataTables_length">
						批量操作： <select size="1" name="choose_type" id="choose_type">
							<option value="del">删除</option>
						</select>
						<button class="rowbnt" type="submit" id="choose_sb">提交</button>
					</div>
				</div>
			</div>
			<table id="dt_inbox" class="dataTable">
				<thead>
					<tr role="row">
						<th class="table_checkbox sorting_disabled" role="columnheader"
							rowspan="1" colspan="1" style="width: 13px;" aria-label=""><input
							type="checkbox" name="select_id" id="select_id" /></th>
						<th>IP</th>
						<th>地域</th>
						<th>会员名称</th>
						<th>计名名称</th>
						<th>类型</th>
						<th>广告ID</th>
						<th>有效</th>
						<th>重复</th>
						<th>显示/记录时间</th>
					</tr>
				</thead>
				<tbody role="alert" aria-live="polite" aria-relevant="all">
          <?php  foreach((array)$ip as $i){
                  $screenwh = explode('x',$i['screen']);
                  $screenw = $screenwh[0];
                  $screenh = $screenwh[1];
                  
                  $xy = explode(';',$i['xy']);
                  $x = $screenwh[0];
                  $y = $screenwh[1];
                  
                  
		  		   	$p = dr ( 'admin/plan.get_one',$i['planid']);
					$u = dr ( 'admin/user.get_one',$i['uid']);
					$dal_id = $i["last_time"].'_'.$i['planid'].'_'.$i['adsid'].'_'.$i['uid'].'_'.$i['ip'];
					$ck = false;
					if ($i['visitnum']>10) {
					   $ck = true;
					}
					else if ( ($x && $x>$screenw) || ($y && $y>$screenh)) {
					    $ck = true;
					}else if (!$i['flash'] && $i['is_mobile']=="n" ) {
					   $ck = true;
					}else if ($i['ch']<1) {
					    $ck = true;
					}
		  ?>
          <tr class="unread odd">
						<td><input type="checkbox" name="del_id"
							id="del_id_<?php echo $dal_id?>" value="<?php echo $dal_id?>" /></td>
						<td><div class="ip-content"></div> <a
							href="<?php echo url('admin/ip.get_list?searchval='.$i['ip'].'&searchtype=ip')?>"><?php echo $i["ip"]?></a></td>
						<td><?php echo convert_ip($i["ip"]);?></td>
						<td><a
							href="<?php echo url('admin/user.affiliate_list?search='.$u['username'].'&searchtype=username')?>"><?php echo $u["username"]?></a></td>
						<td><a
							href="<?php echo url('admin/plan.get_list?search='.$p['planid'].'&searchtype=planid')?>"><?php echo $p["planname"]?></a></td>
						<td> <?php echo ucfirst($p['plantype'])?> </td>
						<td><a
							href="<?php echo url('admin/ad.get_list?search='.$i['adsid'].'&searchtype=adsid')?>"><?php echo $i["adsid"]?></a></td>
						<td><?php 
				if($i["deduction"]=='y')  {
					echo "<font  color='#ff000'>扣量</font>";
				}else {
					echo "有效";
				}
			
			?></td>
						<td><?php echo $i['visitnum']?></td>
						<td><?php echo $i['first_time']?></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td colspan="8" style="padding-left: 8px;"><img
							src="<?php echo SRC_TPL_DIR?>/images/os/<?php echo $i['os']? $i['os'] : 'un'?>.jpg"
							width="14" height="14" title="<?php echo ucfirst ($i['os'])?>" //>
							<img
							src="<?php echo SRC_TPL_DIR?>/images/browsers/<?php echo $i['browser_name']? strtolower(preg_replace ( '/[^a-z]/i', '',$i['browser_name'] )) : 'un'?>.jpg"
							width="14" height="14"
							title="<?php echo ucfirst($i['browser_name'])?> <?php echo $i['screen']?>" />
              <?php if($i['cookie']){?>
              <img
							src="<?php echo SRC_TPL_DIR?>/images/plugins/cookie.gif"
							width="14" height="14" title="支持Cookie" />
              <?php }?>
              <?php if($i['flash']){?>
              <img
							src="<?php echo SRC_TPL_DIR?>/images/plugins/flash.gif"
							width="14" height="14" title="支持Flash" />
              <?php }?>
              <?php if($i['java']){?>
              <img
							src="<?php echo SRC_TPL_DIR?>/images/plugins/java.gif" width="14"
							height="14" title="支持JAVA" />
              <?php }?>
              <?php if($i['visitnum']){?>
              - <img
							src="<?php echo SRC_TPL_DIR?>/images/re_visitor.gif" width="14"
							height="14" title="老访客" />
              <?php }?>
              <?php if($i['is_mobile'] == 'y'){?>
              - <img src="<?php echo SRC_TPL_DIR?>/images/os/mobile.jpg"
							width="14" height="14" title="移动访客" />
              <?php }?>
                 <?php if($ck){?>
               -<font color="#FF0000">!可疑</font> <?php }?>
              </td>
						<td style="padding-left: 8px;"><?php echo $i['last_time']?></td>
					</tr>
					<tr class="tr_td_b1 ip_con" style="display: none">
						<td>&nbsp;</td>
						<td colspan="9" style="padding-left: 8px;"> AGENT:<?php echo $i['useragent'];?><br>
              投放页面：<?php echo rawurldecode($i['site_page']);?><br>
              系统：<?php echo $i['os']?><br>
              浏览器：<?php echo $i['browser_name']?>/<?php echo $i['browser_version']?> （<?php echo $i['browser_lang']?>）<br>
              屏幕：<?php echo $i['screen'];?> <br>
              位置：<?php echo $i['ch'];?><br>
              插件：<?php echo $i['flash'];?><br>
              <?php if($i['page_title']){?>
              页面标题：<?php echo rawurldecode($i['page_title']);?><br>
              <?php }?>
              <?php if($i['referer_url']){?>
              来源于：<?php echo rawurldecode($i['referer_url']);?><br>
              <?php }?>
              <?php if($i['referer_keyword']){?>
              来源关键词：<?php echo  urldecode($i['referer_keyword']);?><br>
              <?php }?>
              点击坐标：<?php echo $i['xy'];?> 轨迹:<?php echo $i['xxyy'];?></td>
					</tr>
          <?php }?>
        </tbody>
			</table>
			<div class="row">
        <?php  echo $page->echoPage ();?>
      </div>
		</div>
	</div>
</div>
</div>
<script language="JavaScript" type="text/javascript">

 

function gourl(url){
		window.location.href = url+_planid;
}


 


function uld(type,htmls) {
	var html = '';
   	var width = 500;
	if (type == 'del') {
		url = '<?php echo url('admin/ip.del')?>';
		title = '删除IP信息';
		text = '确定要删除吗？删除后无法恢复!';
	}
	 
  
			 
	box.confirm(text,width,title,function(bool){ 
		  __del_id = _del_id.split(','); 
		 if (bool) {
			 if (type == 'del') {
				$.each(__del_id, function(i,val){  
					var od = $("input[name='del_id']:checked:eq("+i+")").parent().parent(); 
					od.css("backgroundColor", "#faa").hide('normal');
					od.next().css("backgroundColor", "#faa").hide('normal');
					od.next().next().css("backgroundColor", "#faa").hide('normal');
				});  
			 } 
			 
			$.ajax(
			{
				dataType: 'html',
				url: url,
				type: 'post',
				data: 'del_id=' + __del_id ,
				success: function() 
				{
					$(".success").show();
				}
			});
		}
	});
}



$('.ip-content').on('click', function(option) { 
    var o = $(this).parents().parents().next().next();  
	if(o.css("display")=='none'){
		o.show(); 
	    $(this).css("backgroundImage","url(<?php echo SRC_TPL_DIR?>/images/g_ico_16.jpg)");
	}else {
		o.hide();
	    $(this).css("backgroundImage","url(<?php echo SRC_TPL_DIR?>/images/z_ico_16.jpg)");
	}
});
  
$('#z_all').on('click', function(option) { 
	if($(this).attr("data_v") == 1){  
		var o = $('.ip_con').hide();
		$(this).attr("data_v",0);
		$(".ip-content").css("backgroundImage","url(<?php echo SRC_TPL_DIR?>/images/z_ico_16.jpg)"); 
	
	}else {
    	var o = $('.ip_con').show();
		$(this).attr("data_v",1);
		$(".ip-content").css("backgroundImage","url(<?php echo SRC_TPL_DIR?>/images/g_ico_16.jpg)"); 
	}
});

$("#select_id").click(function(){
 	 var a = $("#select_id").attr("checked");
	 if(a!='checked') a = false;
     $("input[name='del_id']").attr("checked",a);
});

$("#choose_sb").click(function(){
	var arr=[];
	var choose_type = $("#choose_type").val();
	if(!choose_type){
		box.alert('批量操作请选择一个操作对像',300);
		return ;
	}
 	var arrChk=$("input[name='del_id']:checked"); 
     
    for (var i=0;i<arrChk.length;i++)
    {
        var v = arrChk[i].value;
		arr.push(v);
		
    }
	_del_id = arr.join(",");
	uld(choose_type);
});

 

$("#_s").click(function(){
	var timerange = $("#timerange").val();
	var searchval = $("#searchval").val();
	if(timerange == '搜索日期-默认所有') $("#timerange").val('');
	if(searchval == '搜索IP相关') $("#searchval").val('')
});

 $(".truncate").click(function(){
 
  
  
  box.confirm("确认清空所有IP吗？<br>清空IP报表不影响会员数据。",300,'清空所有IP',function(bool){ 
		 if (bool) { 
			 $.get("<?php echo url('admin/ip.truncate')?>", function(result){
				 $(".success").show();
				 window.location.reload();
			  });
		}
	});
	
	
});
 
 </script>
<?php  
TPL::display('footer');
?>
