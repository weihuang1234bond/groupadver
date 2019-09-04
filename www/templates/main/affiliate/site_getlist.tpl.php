<?php if(!defined('IN_ZYADS')) exit(); 
TPL::display('header');
?>

<div id="left">
 <?php TPL::display('left');?>
</div>
<div id="main" style="padding-top:10px">
  <div class="mt30" style=" height:30px; ">
    <div class="new_bg" style="float:left"><a href="<?php echo url("affiliate/site.create")?>">新建网站</a></div>
     
  </div>
  <div class="box" >
    <div class="box-title">
      <h3><i class="icon-table"></i>网站管理</h3>
      
    </div>
     
    <div class="box-content">
      <table class="table">
        <thead>
          <tr>
            <th width="300">网站名称</th>
            <th width="100">网站域名</th>
            <th width="100">分类</th>
            <th width="100">星级</th>
            <th width="100">状态</th>
            <th width="120">操作</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach((array)$site as $s) { 
		  		$c =  dr ( 'main/class.get_one',$s["sitetype"] );
		  ?>
          <tr sid="<?php echo $s['siteid']?>">
            <td><?php echo $s['sitename']?></td>
            <td><?php echo $s['siteurl']?></td>
            <td><?php echo $c['classname']?></td>
            <td><img alt="" src="<?php echo SRC_TPL_DIR?>/images/s<?php echo $s['grade']?>.jpg" title="<?php echo $s['grade']?>级" /></td>
            <td><?php 
					 
			  		switch($s['status']){
						case 0:
							echo '<span class="notification error_bg">新增待审</span>';
							break;
						case 1:
							echo '<span class="notification error_bg">拒绝</span>';
							break;
						case 2;
							echo '<span class="notification error_bg">锁定</span>';
							break;
						case 3:
							echo '<span class="notification info_bg">正常</span>';
							break;
						case 4:
							echo '<span class="notification error_bg">修改待审</span>';
							
					} 
				?> </td>
            <td><a href="<?php echo url("affiliate/site.edit?siteid=".$s['siteid'])?>">修改</a> <a href="javascript:;" class="delsite">删除</a></td>
          </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
  </div>
</div>
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
 
 $('.delsite').on('click', function(option) { 
	_siteid = $(this).parent().parent().attr("sid");
 	_parent = $(this).parent().parent();
	 box.confirm('确认删除吗',300,'删除网站',function(bool){
	 if(bool) {
	 	  $.ajax(
			{
				dataType: 'html',
				url: '<?php echo url("affiliate/site.del")?>',
				type: 'post',
				data: 'siteid=' + _siteid,
				success: function() 
				{
					 _parent.css("backgroundColor", "#faa").hide('normal');
				}
			});
		}	
	});
	
 }); 
 
	
</script>
