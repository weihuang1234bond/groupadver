<?php if(!defined('IN_ZYADS')) exit(); 
TPL::display('header');
?>

<div id="left">
  <div class="subnav">
    <div class="subnav-title"> <a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>我的广告位</span></a> </div>
    <ul class="subnav-menu">
      <li <?php if(get('type')=='') echo "class='current'"?>> <a href="<?php echo url("affiliate/zone.get_list")?>">所有活动</a> </li>
      <?php foreach((array)$plantype as $p) {?>
      <li <?php if($type==$p['plantype']) echo "class='current'"?>> <a href="<?php echo url("affiliate/zone.get_list?type=".$p['plantype'])?>"><?php echo strtoupper($p['plantype'])?> 广告位</a> </li>
      <?php }?>
    </ul>
  </div>
  <div class="subnav">
    <div class="subnav-title"> <a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>帮助</span></a> </div>
    <ul class="subnav-menu">
      <li> <a href="<?php echo url("index.article?id=84")?>" target="_blank">如何获取广告代码？</a> </li>
     <li> <a href="<?php echo url("index.article?id=85")?>" target="_blank">如何过渡广告？</a> </li>
      <li> <a href="<?php echo url("index.article?id=86")?>" title="一个广告位能显示多种广告样式吗？">广告位显示多种广告样式？</a> </li>
      <li> <a href="<?php echo url("index.article?id=87")?>">广告有哪些类型？</a> </li>
	   <li> <a href="<?php echo url("index.article?id=88")?>">修改了广告位没有生效？</a> </li>
    </ul>
  </div>
</div>
<div id="main" style="padding-top:10px">


  
  
  <?php if($_SESSION ['succ']) {?>
  <div class="alert alert-info" style="margin-top:10px"> 修改成功</div>
   <?php }?>
  
  <div class="mt30" style=" height:30px; ">
    <div class="new_bg" style="float:left"><a href="<?php echo url("affiliate/zone.create?type=".$type)?>">新建广告位</a></div>
   <!-- <div style="float:right;background: #e63a3a; padding:5px; color:#FFFFFF">
    <span>价格： 90~100元/Kip</span></div>-->
  </div>
  <div class="box" >
    <div class="box-title">
      <h3><i class="icon-table"></i>广告位管理</h3>
      <div class="actions" style="color: #08c;"> <span style=" cursor:pointer"><span>十</span> 高级过虑器</span> </div>
    </div>
    <div class="z_panel" style="display:none">
      <table width="200" border="0" align="right" cellpadding="0" cellspacing="0">
       <!-- <tr>
          <td width="50">显示：</td>
          <td><input type="checkbox" name="checkbox" value="checkbox" />
            闲置</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="checkbox" name="checkbox2" value="checkbox" />
            活动 </td>
        </tr>-->
        <tr>
          <td>尺寸：</td>
          <td><select id="zadsize">
              <option value="">全部尺寸</option>
              <?php foreach((array)$adsize as $a) {?>
              <option value="<?php echo $a?>"><?php echo $a?></option>
              <?php }?>
            </select></td>
        </tr>
        <tr>
          <td>类型：</td>
          <td><select id="zadtplid">
              <option value="">全部类型</option>
              <?php foreach((array)$zadtplid as $a) {
				  		$atpl = dr ( 'affiliate/adtpl.get_one', $a);
				  ?>
              <option value="<?php echo $a?>"><?php echo $atpl['tplname']?></option>
              <?php }?>
            </select></td>
        </tr>
        <tr>
          <td class="brb1d">&nbsp;</td>
          <td class="brb1d">&nbsp;</td>
        </tr>
        <tr>
          <td height="30">ID：</td>
          <td><input type="text" name="zid" id="zid" style="width:110px" /></td>
        </tr>
        <tr>
          <td height="30">名称：</td>
          <td><input type="text" name="zname"  id="zname" style="width:110px" /></td>
        </tr>
        <tr>
          <td height=30</td>
          <td></td>
        </tr>
      </table>
    </div>
    <div class="box-content">
      <table class="table">
        <thead>
          <tr>
            <th width="300">广告位名称</th>
            <th width="100">广告位ID</th>
            <th width="100">尺寸</th>
            <th width="120">广告</th>
            <th width="100">计费方式</th>
            <th width="120">上次修改日期</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach((array)$zone as $z) { 
		  			$tpl = dr ( 'affiliate/adtpl.get_one', $z['adtplid'] );
		  ?>
          <tr class="d_a gzid_<?php echo $z['zoneid']?>" zname="<?php echo $z['zonename']?>" zid="<?php echo $z['zoneid']?>" zsize="<?php echo $z['width'].'x'.$z['height']?>" ztype="<?php echo $z['adtplid']?>" zl="<?php echo $tpl['tpltype'] == 'url_jump' ? '1' : 0?>">
            <td><?php echo $z['zonename']?><br>
              <a href="<?php echo url("affiliate/zone.edit?zoneid=".$z['zoneid'])?>">修改</a> <a href="javascript:;" class="getcode">获取代码</a> <a href="javascript:;" class="delzone">删除</a> <a href="<?php echo url("affiliate/report.get_list?timerange=".DAYS."_".DAYS."&type=zone&id=".$z['zoneid'])?>">查看报告</a> </td>
            <td><?php echo $z['zoneid']?></td>
            <td><?php echo $z['width'].'x'.$z['height'];?></td>
            <td>
			<?php  
		    echo  $tpl['tplname'];
			?></td>
            <td><?php echo strtoupper($z['plantype'])?></td>
            <td><?php echo $z['uptime']?></td>
          </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo WEB_URL?>js/clipboard/clipboard.js"></script>
<script type="text/javascript" src="<?php echo WEB_URL?>js/jquery/js/jquery-1.7.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_URL?>js/jquery/lib/leanmodal/leanmodal.min.js"></script>
<link rel="stylesheet" href="<?php echo SRC_TPL_DIR?>/style/modal.css">
<script language="JavaScript" type="text/javascript">
$("#zid").on('keyup', function(option) {
	 var v = $(this).val();
	 $(".d_a").each(function() {
	 	 $(this).hide();
          if(v == $(this).attr("zid"))   $(this).show();
     });
	 if(!v) $(".d_a").show(); 
	 
});

$("#zname").on('keyup', function(option) {
	 var v = $(this).val();
	 $(".d_a").each(function() {
	 	  $(this).hide();
          if ($(this).attr("zname").indexOf(v) > -1 )  $(this).show();
     });
	 if(!v) $(".d_a").show(); 
	 
});


$("#zadsize").on('change', function(option) {
	 var v = $(this).val();
	 $(".d_a").each(function() {
	 	  $(this).hide();
          if ($(this).attr("zsize").indexOf(v) > -1 )  $(this).show();
     });
	 if(!v) $(".d_a").show(); 
	 
});


$("#zadtplid").on('change', function(option) {
	 var v = $(this).val();
	 $(".d_a").each(function() {
	 	  $(this).hide();
          if ($(this).attr("ztype").indexOf(v) > -1 )  $(this).show();
     });
	 if(!v) $(".d_a").show(); 
	 
});

 $('.actions').on('click', function(option) { 
       if($('.z_panel').is(":hidden")){
	   		$('.actions span span').html("一");
			$('.z_panel').show();
	   }else {
	   		$('.actions span span').html("十");
			$('.z_panel').hide();
	   }
 });
 
 $('.delzone').on('click', function(option) { 
	_zoneid = $(this).parent().parent().attr("zid");
 	_parent = $(this).parent().parent();
	 box.confirm('确认删除吗',300,'删除广告位',function(bool){
	 if(bool) {
	 	  $.ajax(
			{
				dataType: 'html',
				url: '<?php echo url("affiliate/zone.del")?>',
				type: 'post',
				data: 'zoneid=' + _zoneid,
				success: function() 
				{
					 _parent.css("backgroundColor", "#faa").hide('normal');
				}
			});
		}	
	});
	
 }); 
 
$('.getcode').on('click', function(option) { 
 	 var zid = $(this).parent().parent().attr("zid");
	 get_code(zid);
});



function get_code(zid){
	 var zl = $('.gzid_'+zid).attr('zl');
	 var ztype =  $('.gzid_'+zid).attr('ztype');
	 
	 if(zl>0){  
		var surl = "<?php echo $GLOBALS['C_ZYIIS']['js_url'].WEB_URL?>c.php?id="+zid;
	 }else {
		 var surl = "<script src='<?php echo $GLOBALS['C_ZYIIS']['js_url'].WEB_URL?>s.php?id="+zid+"'><\/script>";
	 }
	 text = '<textarea  class="input_text span70 textarea_text" name="log_text" id="log_text" style="width: 90%;">'+surl+'</textarea><input name="button"  type="button" class="btn btn-green big" id="getcode"  value="复制代码" /><span class="copy_ok" style=" ">复制成功!</span>';
	
	box.confirm(text,600,'获取代码',function(bool){});
	$("#modeal_ok").hide();
	$('#getcode').on('mouseenter', function(option) {  
		var clip = new ZeroClipboard.Client(); 
		ZeroClipboard.setMoviePath("<?php echo WEB_URL?>js/clipboard/clipboard.swf") ;
		clip.setHandCursor(true); 
		clip.setText($(".textarea_text").val());          
		clip.addEventListener('complete',  function(client, text) {
			$(".copy_ok").show();
		});
		clip.glue('getcode');  
	});
}

<?php 
if($_GET['code']=='yes') echo "get_code(".$_GET['zoneid'].")";
?> 	
	
</script>
