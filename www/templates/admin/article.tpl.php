<?php if(!defined('IN_ZYADS')) exit();
TPL::display('header'); ?>

<link rel="stylesheet" href="<?php echo SRC_TPL_DIR?>/css/rating.css" media="all" type="text/css" />
<div class="alert success" <?php if(!$_SESSION['succ']) {?>style="display:none"<?php }?>>
  <!-- <a class="close" href="javascript:;">×</a>-->
  <strong>操作成功.</strong> </div>
<div class="alert err" <?php if(!$_SESSION['err']) {?>style="display:none"<?php }?>>
  <!-- <a class="close" href="javascript:;">×</a>-->
  <strong>操作失败.</strong> </div>
<div id="sidebar">
  <?php  TPL::display('sidebar');?>
</div>
<div id="main-content">
  <div class="row-fluid" >
    <h3 class="heading">
      <?php  $text_type = "所有内容";foreach ($GLOBALS['article_type'] AS $key=>$val){ if($type == $key  ){$text_type = $val;}} echo $text_type;?>
    </h3>
	
	 <div class="tab users">
      <div class="tab-header-right left"> <a href="<?php echo url('admin/article.get_list?type='.$type)?>" class="tab-btn  list <?php if($status=='') echo 'tab-state-active';?>">全部列表</a> <a href="<?php echo url('admin/article.get_list?status=y&type='.$type)?>" class="tab-btn unlock <?php if($status=='y') echo 'tab-state-active';?>"> 已审核</a> <a href="<?php echo url('admin/article.get_list?status=n&type='.$type)?>" class="tab-btn lock <?php if($status=='n') echo 'tab-state-active';?>">已锁定</a> </div>
    </div>
	
	
    <div  class="dataTables_wrapper ">
      <div class="tb_sts"><a href="<?php echo url('admin/article.add')?>"  class="tab-btn add ">发布文章公告</a></div>
      <div class="row">
        <div class="span6">
          <div id="dt_outbox_length" class="dataTables_length"> 批量操作：
            <select size="1" name="choose_type" id="choose_type">
              <option value="">请选择</option>
              <option value="unlock">激活</option>
              <option value="lock" >锁定</option>
              <option value="del" >删除</option>
            </select>
            <button class="rowbnt" type="submit" id="choose_sb">提交</button>
          </div>
        </div>
        <div class="span6">
          <div class="dataTables_filter" id="dt_outbox_filter">
            <form method="post">
              搜索：
              <select name="searchtype">
                <option value="title" <?php if ($searchtype == 'title') echo "selected";?>>标题</option>
              </select>
              <input type="text" class="input_text span30" name="search" value="<?php echo $search?>">
              <input name="_s" type="image" src="<?php echo SRC_TPL_DIR?>/images/sb.jpg" align="top" border="0"  >
            </form>
          </div>
        </div>
      </div>
      <table id="dt_inbox" class="dataTable">
        <thead>
          <tr role="row">
            <th class="table_checkbox sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 13px;" aria-label=""><input type="checkbox" name="select_id" id="select_id"></th>
            <th>标题</th>
            <th>类型</th>
            <th>时间</th>
            <th>状态</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
          <?php  foreach((array)$article as $a){?>
          <tr class="unread odd">
            <td><input type="checkbox" name="articleid" id="article_<?php echo $a["articleid"]?>" value="<?php echo $a["articleid"]?>"></td>
            <td><a href="<?php echo url("index.article?id=".$a["articleid"])?>" target="_blank"><font color="<?php echo $a['color']?>"><?php echo $a['top']=='2'?'[置顶] ':'';echo $a["title"]?></font></a></td>
            <td><?php  foreach ($GLOBALS['article_type'] AS $key=>$val){ if($a['type'] == $key  ){echo $val;} }?></td>
            <td><?php echo $a["addtime"];?></td>
            <td class="status"><?php 
			  		switch($a['status']){
						case 'y':
							echo '<span class="notification info_bg">活动</span>';
							break;
						case 'n':
							echo '<span class="notification error_bg">锁定</span>';
							break;
					} 
				?>
            </td>
            <td articleid='<?php echo $a["articleid"]?>' class="uld_img"><a href="<?php echo url('admin/article.edit?articleid='.$a['articleid'])?>"><img src="<?php echo SRC_TPL_DIR?>/images/pencil_gray.png" alt="" border="0" /></a> <img src="<?php echo SRC_TPL_DIR?>/images/access_ok_gray.png" alt="" border="0" class="unlock" /> <img src="<?php echo SRC_TPL_DIR?>/images/lock-icon.png" alt="" border="0" class="lock"/> <img src="<?php echo SRC_TPL_DIR?>/images/trashcan_gray.png" alt="" border="0"  class="del" /></td>
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
<?php  
TPL::display('footer');
?>
<script language="JavaScript" type="text/javascript">


function uld(type,e) {
	var html = '';
   	var width = 400;
	if (type == 'del') {
		url = '<?php echo url('admin/article.del')?>';
		title = '删除文章';
		text = '确定要删除吗？删除后无法恢复!';
	}
	if (type == 'lock') {
		url = '<?php echo url('admin/article.lock')?>';
		html = '<span class="notification error_bg">锁定</span>';
	    text = '确认锁定吗';
		title = '锁定文章';
	}
	if (type == 'unlock') {
		url = '<?php echo url('admin/article.unlock')?>';
		html = '<span class="notification info_bg">活动</span>';
	    text = '确认激活吗';
		title = '激活文章';
	}
 		 
	box.confirm(text,width,title,function(bool){ 
		 if(e) article_id = $(e).parent().attr("articleid");
		 article_id = article_id.split(',');
		 if (bool) {
			 if (type == 'del') {
				$.each(article_id, function(i,val){   
					$("#article_"+val).parent().parent().css("backgroundColor", "#faa").hide('normal');
				});  
			 } 
			$.ajax(
			{
				dataType: 'html',
				url: url,
				type: 'post',
				data: 'articleid=' + article_id ,
				success: function() 
				{
					 $.each(article_id, function(i,val){    
						 	$("#article_"+val).parent().parent().find('.status').html(html);
					 });   
					$(".success").show();
				}
			});
		}
	});
}

$(".unlock,.lock,.del").click(function(){
	uld(this.className,this);
});

$("#choose_sb").click(function(){
	var arr=[];
	var choose_type = $("#choose_type").val();
	if(!choose_type){
		box.alert('批量操作请选择一个操作对像',300);
		return ;
	}
 	var arrChk=$("input[name='articleid']:checked"); 
     
    for (var i=0;i<arrChk.length;i++)
    {
        var v = arrChk[i].value;
		arr.push(v);
		
    }
	article_id = arr.join(",");
	uld(choose_type);
});

$("#select_id").click(function(){
 	 var a = $("#select_id").attr("checked");
	 if(a!='checked') a = false;
     $("input[name='articleid']").attr("checked",a);
});
 </script>
