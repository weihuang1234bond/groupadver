<?php if(!defined('IN_ZYADS')) exit(); 
TPL::display('header'); ?>
<script type="text/javascript" src="<?php echo WEB_URL?>js/jquery/js/jquery-1.7.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_URL?>js/jquery/lib/jquery-validation/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo WEB_URL?>js/jquery/lib/jquery-validation/additional-methods.js"></script>

<div id="left">
  <?php TPL::display('left');?>
</div>
<div id="main" style="padding-top:10px;">
  <div class="breadcrumbs mt30">
    <ul>
      <li> <a href="<?php echo url("affiliate/site.get_list")?>">我的网站   »</a>
        <?php  echo RUN_ACTION == 'create' ? '新建' : '编辑';?>
        网站 </li>
    </ul>
    <div class="close-bread"> <a href="#"><i class="icon-remove"></i></a> </div>
  </div>
  <div class="box">
    <div class="box-title">
      <h3><i class="icon-new"></i>基本信息</h3>
    </div>
    <div class="box-content" style="position:relative">
      <form action="
	  <?php if(RUN_ACTION == 'edit') {
	  	echo url("affiliate/site.edit_post");
	  }else{
	  	echo url("affiliate/site.create_post");
	  }?>" method="POST" class="form-horizontal" id="form_b" >
        <input name="isok" id="isok"  type="hidden" value="" />
        <input name="siteid" id="siteid"  type="hidden" value="<?php echo  $site['siteid']?>" />
        <div class="control-group">
          <label for="textfield" class="control-label">您的网站域名</label>
          <div class="controls"> http://
            <input type="text" name="siteurl" id="siteurl" class="input-27" value="<?php echo $site['siteurl']?>" <?php if(RUN_ACTION == 'edit') {?>disabled="disabled" <?php }?>>
          </div>
          <?php if(RUN_ACTION == 'create' && in_array($GLOBALS ['C_ZYIIS'] ['site_status'],array(4,5))) {?>
          <div class="controls">
            <div class="checksite">
              <p>
                <label for="st_1"  class="active cktab" id="for_1">
                <input name="cktype" type="radio" id="st_1" value="file" checked="checked" />
                验证方式一：文件验证 </label>
                <label for="st_2" class="cktab"  id="for_2">
                <input type="radio" name="cktype" value="html" id="st_2"  />
                方式二：HTML标签 </label>
              </p>
              <div class="text"> <span id="text1"> 1.  请点击“<a href="<?php echo url("affiliate/site.download_file")?>" id="down" >下载验证文件</a>”获取验证文件<br>
                2. 20分钟内将验证文件放置于您所配置域名(如www.zyiis.com)的根目录下<br>
                3. 点击“完成验证”按钮 </span> <span id="text2" style="display:none">
                <textarea name="ck2val" id="ck2val" style="font-size:12px;height:60px;margin-top:10px;width:400px;"></textarea>
                <br>
                将以上代码添加到您网站首页HTML代码的
                <HEAD>
                标签与
                </HEAD>
                标签之间，并点击“完成验证”按钮。<br>
                （该步骤需在20分钟内完成） </span>
                <div style="padding:10px">
                  <input type="button" id="doCheckSite" value="完成验证" />
                </div>
              </div>
              <div id="ckinfo" style="color:#FF0000;padding:10px"></div>
            </div>
          </div>
          <?php }?>
        </div>
        <div class="control-group">
          <label for="textfield" class="control-label">网站名称</label>
          <div class="controls">
            <input type="text" name="sitename" id="sitename" class="input-27" value="<?php echo $site['sitename']?>">
          </div>
        </div>
        <div class="control-group">
          <label  class="control-label">网站备案信息</label>
          <div class="controls">
            <input type="text" name="beian" id="beian" class="input-27" value="<?php echo $site['beian']?>">
            <span class="help-block"> </span>
            <div id="add_html" style="display:none"></div>
          </div>
        </div>
        <div class="control-group">
          <label  class="control-label">网站类别</label>
          <div class="controls">
            <select name="sitetype" id="sitetype" style="padding:5px; width:160px">
              <option value="">请选择</option>
              <?php foreach((array)$sitetype as $st) {?>
              <option value="<?php echo $st['classid']?>" <?php if($site['sitetype']==$st['classid']) echo "selected"?> ><?php echo $st['classname']?></option>
              <?php }?>
            </select>
          </div>
        </div>
        <div class="control-group">
          <label for="textfield" class="control-label">日访问量</label>
          <div class="controls">
            <input name="dayip" type="text" class="input-27" id="dayip"   value="<?php echo $site['dayip']?>" />
            IP </div>
        </div>
        <div class="control-group">
          <label for="textfield" class="control-label">网站描述</label>
          <div class="controls">
            <textarea name="siteinfo" class="input-27" id="siteinfo" style="height:50px"><?php echo $site['siteinfo']?></textarea>
          </div>
        </div>
        <div class="form-actions" style="margin-top:60px; margin-bottom:60px">
          <button type="submit" class="btn btn-primary"> 提 交 </button>
        </div>
      </form>
    </div>
  </div>
</div>
<script language="JavaScript" type="text/javascript">

$(document).ready(function() {

$("#form_b").validate({
        errorClass: "error",
        highlight: function(element) {
            $(element).closest('div').addClass("f_error");
        },
        unhighlight: function(element) {
            $(element).closest('div').removeClass("f_error");
        },
		  <?php if(RUN_ACTION == 'create' && in_array($GLOBALS ['C_ZYIIS'] ['site_status'],array(4,5))) {?>
		  ignore: "",
		  <?php }?>
        rules: {
            siteurl: {
                required: true,
				remote:{  
					　　 type:"POST",    
					　　 url:'<?php echo url("affiliate/site.check_site_repeat")?>',  
					　　 data:{
						  siteurl:function(){
								return $("#siteurl").val();
							}
				　　 	   } 
				},
			   url2:true
            },
            sitename: {
                required: true
            },
			beian: {
                required: true
            },
			sitetype: {
                required: true
            },
			dayip: {
                required: true
            },
			isok: {
                required: true
            }
        },
        messages: {
            siteurl: {
				required:"网站url为能空",
				url2:"请填写一个正确url",
				remote:"存在的域名"
			},
            sitename: "网站名称不能为空",
			beian: "输入一个备案号",
			sitetype: "选择一个网站类型",
			dayip: "日访问量不能为空",
        	isok: "无法验证当前网站域名"
        },
        
        errorElement: 'span' ,
        errorPlacement: function(error, element) {
            var name = element.attr('name');  
            if (name == 'isok') {
                $('#ckinfo').append(error);
            } else {
                error.insertAfter(element);
            }
        }

    });


$("#cksite").click(function(){
		 if($("#form_b").validate().element($("#siteurl"))){
		 		$(".checksite").show();
		 }
});


$("#down").click(function(){
		if($("#form_b").validate().element($("#siteurl"))){
			this.href +="&url="+$("#siteurl").val();  
		}
});

$("#for_1").click(function(){
		this.className = 'active cktab';
		$('#for_2').removeClass().addClass("cktab");
		$('#text1').show();
		$('#text2').hide();
});
$("#for_2").click(function(){
		var siteurl = $("#siteurl").val();
		this.className = 'active cktab';
		$('#for_1').removeClass().addClass("cktab");
		$('#text2').show();
		$('#text1').hide();
		$.post("<?php echo url("affiliate/site.download_file")?>", { type:'html',url: siteurl},
		function (data, textStatus){
			if(data){
				$('#ck2val').val(data);
				$("#ck2val").attr("disabled",true);  
			}
		}, "text");
		
});

$("#doCheckSite").click(function(){
	 if($("#form_b").validate().element($("#siteurl"))){
			 var siteurl = $("#siteurl").val();
	 		 var cktype = $("input:[name=cktype]:radio:checked").val();
	 		$.post("<?php echo url("affiliate/site.check_site")?>", { type:cktype,url:siteurl},
			function (data, textStatus){
				if(data){
					if(data=='ok'){
						$("#ckinfo").html("验证完成");
						$('#isok').val("ok");
					}
					if(data=='repeat'){
						$("#ckinfo").html("无法完成验证，重复的域名");
					}
					
					if(data=='no'){
						$("#ckinfo").html("无法验证当前域名,请按上面的方法操作");
					}
					
				}
			}, "text")
	 }
});


});
</script>
