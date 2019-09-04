<?php if(!defined('IN_ZYADS')) exit(); ?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="广告联盟" />
<meta name="description" content="" />
<meta name="generator" content="zyiis.com v9" />
<meta name="author" content="The YingZhong network Science and Technology CO.Ltd All rights reserved" />
<meta name="copyright" content="2005-2018 YingZhong Inc." />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<script src="<?php echo WEB_URL?>js/jquery/js/jquery-1.7.min.js" type="text/javascript"></script>
</head>
<link rel="stylesheet" href="<?php echo SRC_TPL_DIR?>/css.css">
<title>登入 <?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>

<body  >
<div class="head">
  <div class="head_box">
    <div class="head_list">
      <h1 class="logo"> <a href="<?php echo WEB_URL?>" > <img src="<?php echo SRC_TPL_DIR?>/images/logo.gif" border="0"  > </a> </h1>
      <h2 class="logo-title"> 登入 </h2>
    </div>
  </div>
</div>
<div class="main" style="padding-top:30px">
  <form   id="form1" name="form1" method="post" action="<?php echo url("index.postlogin")?>" onSubmit="return doLogin()">
    <div class="left_list">
<div class="intro_box"> 
<?php if(get('key') == "login_timeout"){?>
<span style="font-size:14px; color:#ff0000">登入超时，请重新登入</span>
<?php } else {?>
欢迎光临
<?php } ?>
</div>
      <div class="title_box">
        <div class="step item3">
          <ul>
            <li class="on" id="verifiy_username"><span>登入</span></li>
          </ul>
        </div>
      </div>
      <ul class="form_list" id="ul_username" style="">
        <li style="position:relative;">
          <label><em class="red">*</em> 用户名：</label>
          <input type="text" class="input_text" name="username" id="username" placeholder="请输入用户名" maxlength="20">
          <div class="tip" id="txt_username_tip"></div>
        </li>
        <li style="position:relative;">
          <label><em class="red">*</em> 密码：</label>
          <input type="password" class="input_text" name="password" id="password" placeholder="请输入密码" maxlength="20">
          <div class="tip" id="txt_password_tip"></div>
        </li>
		<?php if ($GLOBALS ['C_ZYIIS']['login_check_code']=='1'){?>
        <li style="position:relative;">
          <label><em class="red">*</em> 验证码：</label>
          <input type="text" class="input_text" name="checkcode" id="img_code" placeholder="请输入验证码" maxlength="6">
          <img src="<?php echo url("index.codeimage")?>" align="absmiddle"  title= "看不清?请点击刷新验证码"  onclick="this.src='<?php echo url("index.codeimage?rand=")?>'+Math.random();"  style= "cursor:pointer;"  />
          <div class="tip" id="img_code_tip" >验证码不正确</div>
        </li>
		<?php }?>
        <li>
          <label></label>
          <input type="submit" value="登入" class="btn_css" id="btn_username">
        </li>
        <li class="noMar gray9">
          <label></label>
          <a href="<?php echo url("index.register")?>" class="blue">如需注册，请点击这里！</a> </li>
      </ul>
    </div>
    <div class="right_login">
      <ul class="right_list">
        <li>没有由帐号？马上注册</li>
        <li class="btn_box">
          <input type="button" value="注 册" class="btn_css" onclick="window.open('<?php echo url("index.register")?>')">
        </li>
        <li>您还可以用其他方式直接登录：</li>
        <?php if ($GLOBALS ['C_ZYIIS']['oauth_qq_app_id']){?>
        <li class="other"> <a href="<?php echo url("oauth/qq.login")?>"><img src="<?php echo SRC_TPL_DIR?>/images/qqonline.gif"  border="0" alt="腾讯QQ登录"> QQ登录</a> </li>
        <?php }?>
      </ul>
    </div> 
  </form>
  <div class="clear"></div>
</div>
<div class="footer">Copyright ©<?php echo date("Y",TIMES)?> All Rights Reserved</div>
<script>
 function doLogin () {
	 var username = $.trim($("#username").val());
     if (username == "") {
        $("#txt_username_tip").html('用户名不能为空').show();	
        return false;
     }
	 $("#txt_username_tip").hide();	
	 var password = $.trim($("#password").val());
     if (password == "") {
        $("#txt_password_tip").html('密码不能为空').show();	
        return false;
     }
	 $("#txt_password_tip").hide();	
	 <?php if ($GLOBALS ['C_ZYIIS']['login_check_code']=='1'){?>
	 var img_code = $.trim($("#img_code").val());
     if (img_code == "") {
        $("#img_code_tip").html('验证码不能为空').show();	
        return false;
     }
	 $("#img_code_tip").hide();	
 	<?php }?> 
} 
</script> 
