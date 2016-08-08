<?php 
header('Content-type:text/html;charset=utf-8');
$password = "password"; // 在这里设置密码 
$p = ""; 
if(isset($_COOKIE["isview"]) && $_COOKIE["isview"] == $password){ 
$isview = true; 
}else{ 
if(isset($_POST["pwd"])){ 
if($_POST["pwd"] == $password){ 
setcookie("isview",$_POST["pwd"],time()+3600*0.2); 
$isview = true; 
}else{ 
$p = (empty($_POST["pwd"])) ? "需要密码才能查看，请输入密码。" : "密码不正确，请重新输入。初始密码为password，请在 /index.php 中更改"; 
} 
}else{ 
$isview = false; 
$p = "请输入密码查看，获取密码请联系管理员。"; 
} 
} 
if($isview){ ?>
<!-- 加密区开始 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SMS Sender</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="dist/css/vendor/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="dist/css/flat-ui.min.css" rel="stylesheet">
    <link href="docs/assets/css/demo.css" rel="stylesheet">

    <link rel="shortcut icon" href="img/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
</head>
<body>
  <div class="container">
        <h4 class="demo-panel-title">SMS SENDER</h4>
      <div class="row demo-row">
        <div class="col-xs-12">
          <nav class="navbar navbar-inverse navbar-embossed" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                <span class="sr-only">Toggle navigation</span>
              </button>
              <a class="navbar-brand" href="#">短信群发</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-01">
              <ul class="nav navbar-nav navbar-left">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">云片 <b class="caret"></b></a>
                  <span class="dropdown-arrow"></span>
                  <ul class="dropdown-menu">
                    <li><a href="https://www.yunpian.com/component/login" target="_blank">登录云片</a></li>
                    <li><a href="https://www.yunpian.com/admin/module/tpl_setting" target="_blank">模板提审</a></li>
                    <li class="divider"></li>
                    <li><a href="https://www.yunpian.com/admin/module/sms_record" target="_blank">短信记录</a></li>
                  </ul>
                </li>
                <li><a href="http://www.surl.sinaapp.com/" target="_blank">网址缩短器<span class="navbar-unread">1</span></a></li>
                <li><a href="http://www.a-site.cn/tool/zi/" target="_blank">字数统计器<span class="navbar-unread">1</span></a></li>
                <!--请勿删除此项版权信息 否则属于违法侵权行为 必将追究-->
                <li><a href="http://www.yanziyao.cn" target="_blank">开发者</a></li>
                <!--请勿删除此项版权信息 否则属于违法侵权行为 必将追究-->
               </ul>
               <form class="navbar-form navbar-right" action="#" role="search">
                <div class="form-group">
                  <div class="input-group">
                    <input class="form-control" id="navbarInput-01" type="search" placeholder="Search">
                    <span class="input-group-btn">
                      <button type="submit" class="btn"><span class="fui-search"></span></button>
                    </span>
                  </div>
                </div>
              </form>
            </div><!-- /.navbar-collapse -->
          </nav><!-- /navbar -->
        </div>
      </div> <!-- /row -->

      <h3 class="demo-panel-title">短信群发</h3>


    <div class="row">
      <form action="sendsms.php" method="post">
        <div class="col-xs-6">
          <div class="tagsinput-primary">
            <input name="mobile" class="tagsinput" data-role="tagsinput" placeholder="输入手机号码，多个手机号请用英文逗号“,”隔开。" />
          </div>
        </div> <!-- /.col-xs-6 -->
        <div class="col-xs-6">
          <div class="form-group">
            <select class="form-control select select-primary" data-toggle="select" name="sender">
            <!-- 在这里设置你已经通过云片审核的签名 -->
            <option value="【签名1】"selected>【签名1】</option>
            <option value="【签名2】">【签名2】</option>
            <option value="【签名3】">【签名3】</option>
            <!-- 在这里设置你已经通过云片审核的签名 -->
            </select>
          </div>
        
          <div class="form-group">
            <textarea type="text" id="txt" name="txt" placeholder="【操作必读】请先点击下方绿色按钮选择模板，然后用相应的文字填入“{xxx}”的内容，模板里括号之外的内容不得替换，必须以填充模板的方式撰写内容，否则无法发送！所有网址链接请务必使用上方小工具缩短为短链接（以http://t.cn/开头）；发送前使用上方小工具检查字数，每70个字符（含字母和标点）计费为1条短信（0.055元）。所有短信均有发送记录，禁止发送无关内容。" rows="8" class="form-control" maxlength="500"></textarea>
          </div>


        <!-- 在这里设置你已经通过云片审核的模板 -->
        <div class="col-xs-3">
          <input type="button" id = "btn1" value="通知发布模板" style="margin-left:auto;margin-right:auto" class="btn btn-block btn-lg btn-primary"/>
            <script type="text/javascript" src ="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js"></script>
            <script language="javaScript">
             $(document).ready(function(){
                $("#btn1").click(function(){
                    var text = $("#txt").val();
                    text += '会议主题：{输入名称}，时间：{输入时间}，{输入备注}请注册：{输入报名链接短网址}';
                    $("#txt").val(text);
                });
               });
            </script>
        </div>

        <div class="col-xs-3">
          <input type="button" id = "btn2" value="报名成功模板" style="margin-left:auto;margin-right:auto" class="btn btn-block btn-lg btn-primary"/>
            <script type="text/javascript" src ="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js"></script>
            <script language="javaScript">
             $(document).ready(function(){
                $("#btn2").click(function(){
                    var text = $("#txt").val();
                    text += '您已经成功报名：{输入活动名称}，时间：{输入时间}，地址：{输入地址}。{输入备注}';
                    $("#txt").val(text);
                });
               });
            </script>
        </div>
        <!-- 在这里设置你已经通过云片审核的模板 -->

<div class="col-xs-6">
          <button type="submit" style="margin-left:auto;margin-right:auto" class="btn btn-block btn-lg btn-danger">确认无误 发送短信</button>
        </div>
      </form>  
    </div> <!-- /row -->

  </div>
    <!-- /.container -->


    <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="dist/js/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="dist/js/vendor/video.js"></script>
    <script src="dist/js/flat-ui.min.js"></script>
    <script src="docs/assets/js/application.js"></script>

</body>
</html>

<!-- 加密区结束 -->

<?php }else{ ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" " http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns=" http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta http-equiv="pragma" content="no-cache" /> 
<meta http-equiv="cache-control" content="no-cache" /> 
<meta http-equiv="expires" content="0" /> 
<title>工作人员认证</title> 
<!--[if lt IE 6]> 
<style type="text/css"> 
.z3_ie_fix{ 
float:left; 
} 
</style> 
<![endif]--> 
<style type="text/css"> 
<!-- 
body{ 
background:none; 
} 
.passport{ 
border:1px solid red; 
background-color:#FFFFCC; 
width:400px; 
height:100px; 
position:absolute; 
left:49.9%; 
top:49.9%; 
margin-left:-200px; 
margin-top:-55px; 
font-size:14px; 
text-align:center; 
line-height:30px; 
color:#746A6A; 
} 
--> 
</style> 
<div class="passport"> 
<div style="padding-top:20px;"> 
<form action="" method="post" style="margin:0px;">输入密码 
<input type="password" name="pwd" /> <input type="submit" value="查看" /> 
</form> 
<?php echo $p; ?> 
</div> 
</div> 
</body> 
</html> 
<?php 
} ?>