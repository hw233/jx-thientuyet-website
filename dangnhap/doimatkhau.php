<?php
session_start();
// Lien ket file lay du lieu tai khoan
//require_once("functions.php");
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['username'])) {
   header('Location: login.php');
}
require_once("cauhinh.php");
//start by caovietquoc
if($_SERVER['REQUEST_METHOD']=='POST'){
$username = $_SESSION['username'];
$currentPassword2 = $_POST['currentPassword2'];
$currentPassword2 = md5($currentPassword2);
//$currentPassword2 = $_POST['currentPassword2'];
//$currentPassword2 = md5($currentPassword2);
$newPassword = $_POST['newPassword'];
//$newPassword = md5($newPassword);

$query = "select cAccName,cSecPassWord from Account_Info where cAccName = '$username' and cSecPassWord = '$currentPassword2' ";
$result = mssql_query($query);
$row = mssql_num_rows($result);
if($row ==1){
//if($currentPassword == $row["cPassWord"] && $currentPassword2 == $row["cSecPassWord"]){
   mssql_query("UPDATE Account_Info set cPassWord='" . md5($_POST['newPassword']) . "' WHERE cAccName='" . $username . "'");
   $message = "<p class = 'required'><b>Thay đổi mật khẩu thành công.</b><a href='index.php'> <b><i>Trở lại</i></b></a></p>";
}else{
   $message = "<p class='required'><b>Lỗi: Mật khẩu cấp 2 không đúng.</b></p>";
}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kiếm Hiệp Tinh - Võ Lâm Truyền Kỳ I - Đăng ký tài khoản game</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<!-- 2017-05-30 Added by caovietquoc for thong tin tai khoan -->

<!-- Bootstrap core CSS -->
    <link media="all" type="text/css" rel="stylesheet" href="./thongtintaikhoan_files/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/formdangnhap.css">


    <!-- Custom styles for this template -->
    <link media="all" type="text/css" rel="stylesheet" href="./thongtintaikhoan_files/styles.css">
<!-- 2017-05-30 Added by caovietquoc for thong tin tai khoan -->



<link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />
<link href="css/thongtintaikhoan.css" rel="stylesheet" type="text/css" />
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
<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/
</script>
<link href="css/content.css" rel="stylesheet" type="text/css">


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


<div id="tooplate_wrapper">
	<div id="tooplate_header_fp">
    	<div id="tooplate_menu" class="ddsmoothmenu">
            <ul>
                <li><a href="../trangchu" class="selected"><span></span>Trang chủ</a></li>
                <li><a href="../dangnhap"><span></span>Quản lý</a>
                    
                    <ul>
                        <li><a href="capnhatthongtin.php?action=edit"><span class="fontawesome-user">&nbsp;&nbsp;&nbsp;Cập nhật thông tin</span></a></li>
                        <li><a href="doimatkhau.php?action=change"><span class="fontawesome-cog">&nbsp;&nbsp;&nbsp;Đổi mật khẩu</span></a></li>
                        <li><a href="logout.php"><span class="fontawesome-off">&nbsp;&nbsp;&nbsp;Đăng xuất</span></a></li>
                  </ul>
                <li><a href="http://home.kiemhieptinh.net/index.php/huong-dan-3/154-huong-dan-tai-va-cai-dat-vo-lam-truyen-ky" target="_new"><span></span>Tải game</a>
                    <ul>
                        <!--
                        <li><a href="#">Sub menu 1</a></li>
                        <li><a href="#">Sub menu 2</a></li>
                        <li><a href="#">Sub menu 3</a></li>
                        <li><a href="#">Sub menu 4</a></li>
                        <li><a href="#">Sub menu 5</a></li>-->
                  </ul>
              </li>
                <li><a href="#"><span></span>Hỗ trợ</a></li>
                <li><a href="https://www.facebook.com/Ki%E1%BA%BFm-Hi%E1%BB%87p-T%C3%ACnh-231099694058062/" target="_blank"><span></span>Fanpage</a></li>
                <li><a href="napthe"><span></span>Nạp thẻ</a></li>
              </li>
            </ul>
            <br style="clear: left" />
        </div> <!-- end of tooplate_menu -->
        
        <div id="site_title2"><h1><a href="#">Đăng ký tài khoản</a></h1></div>
         <!--Begin Slider
         <div id="tooplate_slider">
            <div id="flash_grid_slider">
                <a href="http://www.adobe.com/go/getflashplayer">
                    <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
                </a>
            </div>
        </div>
        End Slider-->
    
    <!-- 2017-05-30 Added by caovietquoc for thong tin tai khoan -->

<script>
function validatePassword() {
var currentPassword,currentPassword2,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
currentPassword2 = document.frmChange.currentPassword2;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
  currentPassword.focus();
  document.getElementById("currentPassword").innerHTML = "Vui lòng nhập mật khẩu cũ";
  output = false;
}

else if(!newPassword.value) {
  newPassword.focus();
  document.getElementById("newPassword").innerHTML = "Vui lòng nhập mật khẩu mới";
  output = false;
}
else if(!confirmPassword.value) {
  confirmPassword.focus();
  document.getElementById("confirmPassword").innerHTML = "Vui lòng xác nhận mật khẩu mới";
  output = false;
}
if(newPassword.value != confirmPassword.value) {
  newPassword.value="";
  confirmPassword.value="";
  newPassword.focus();
  document.getElementById("confirmPassword").innerHTML = "Mật khẩu xác nhận không trùng nhau";
  output = false;
}   
return output;
}
</script>

<br><br>
    		
    		<div class="col-sm-3 col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<b><span class="fontawesome-calendar" style="float:left;padding-right:10px;"></span>	Đổi mật khẩu
						</b>
							<span style="float:right;font-style: italic;">Xin chào, <b><?php echo $_SESSION['username'];  ?></b></span>
					</div>

				<div class="panel-body">
									 
  					<div class="row" style="margin-top:15px;">  
    					<div class="col-md-6">
                <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
    						<!--<table class="table">
        
						        <tbody>
						    	   <tr>

						            <td><b><span class="fontawesome-user"> Tên tài khoản</span></b></td>
						            <td><?php echo $_SESSION['username'];  ?></td>
						            
						          </tr>
						          <tr>

						            <td><b><span class="fontawesome-lock"> Mật khẩu cũ</span></b></td>
						            <td>
                           <input type="password" name="passwordcu" >      
                        </td>
						            
						          </tr>
						          <tr>
						            <td><b><span class="fontawesome-lock"> Mật khẩu cấp 2</span></b></td>
						            <td><input type="password" name="passwordcap2" ></td>
						          </tr>
						          <tr>
						            <td><b><span class="fontawesome-unlock"> Mật khẩu mới</span></b></td>
						            <td><input type="password" name="passwordmoi" ></td>
						          </tr>
						          <tr>
						            <td><b><span class="fontawesome-unlock"> Xác nhận mật khẩu mới</span></b></td>
						            <td><input type="password" name="passwordmoi2" ></td>
						          </tr>
                      <tr>
                        <td><input type="submit" name="submit" class = "btn btn-primary"  value="Đổi mật khẩu" onSubmit="return validatePassword()" ></td>
                      </tr>
						        </tbody>
      						</table>-->
                  <!--<form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
                    <div style="width:300px;">
                    <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
                    <table border="0" cellpadding="10" cellspacing="0" width="350" align="center" class="tblSaveForm">
                    <tr>
                        <td><b><span class="fontawesome-user"> Tên tài khoản</span></b></td>
                        <td><?php echo $_SESSION['username'];  ?></td>
                    </tr>
                    <tr>

                        <td><b><span class="fontawesome-lock"> Mật khẩu cũ</span></b></td>
                        <td>
                           <input type="password" name="passwordcu" >      
                        </td>
                        
                      </tr>
                      <tr>
                        <td><b><span class="fontawesome-lock"> Mật khẩu cấp 2</span></b></td>
                        <td><input type="password" name="passwordcap2" ></td>
                      </tr>
                      <tr>
                        <td><b><span class="fontawesome-unlock"> Mật khẩu mới</span></b></td>
                        <td><input type="password" name="passwordmoi" ></td>
                      </tr>
                      <tr>
                        <td><b><span class="fontawesome-unlock"> Xác nhận mật khẩu mới</span></b></td>
                        <td><input type="password" name="passwordmoi2" ></td>
                      </tr>
                    <tr>
                    <td><input type="submit" name="submit" class = "btn btn-primary" value="Đổi mật khẩu" ></td>
                    </tr>
                    </table>
                    </div>
                  </form>-->

<!--Start Change Password Form - Added by caovietquoc 2017-06-01-->
<style type="text/css">
  .required{
    color:red;
    font-size:11px;
    font-weight:italic;
    padding-left:10px;
  }
</style>
<form name="frmChange" method="post" action="doimatkhau.php?action=change" onSubmit="return validatePassword()">
<div style="width:300px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<table border="0" cellpadding="5" cellspacing="0" width="400" align="center" class="tblSaveForm">
<tr>
<td><b><span class="fontawesome-user">&nbsp;&nbsp;&nbsp; Tên tài khoản</span></b></td>
                        <td><?php echo $_SESSION['username'];  ?></td>
</tr>
<tr>
<td width="40%"><b><span class="fontawesome-lock">&nbsp;&nbsp;&nbsp; Mật khẩu cấp 2</span></b></td>
<td width="60%"><input type="password" name="currentPassword2" class="txtField"/><span id="currentPassword2"  class="required"></span></td>
</tr>

<tr>
<td><b><span class="fontawesome-unlock">&nbsp;&nbsp;&nbsp; Mật khẩu mới</span></td>
<td><input type="password" name="newPassword" class="txtField"/><span id="newPassword" class="required"></span></td>
</tr>
<td><b><span class="fontawesome-unlock">&nbsp;&nbsp;&nbsp; Xác nhận mật khẩu</span></b></td>
<td><input type="password" name="confirmPassword" class="txtField"/><span id="confirmPassword" class="required"></span></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="submit" class = "btn btn-primary" value="Đổi mật khẩu" ></td>
</tr>
</table>
</div>
</form>

    					</div>
     
  					</div>

							</div>
						</div>
					</div>
</div></div>
              

    <!-- 2017-05-30 Added by caovietquoc for thong tin tai khoan -->	


<!--<object style="position:fixed; top:120px; left:0; idne" width="500" height="500"> <embed src="http://img.zing.vn/volamthuphi/images/landing-page/2015/02-quy-doi-tien-dong/swf/flash.swf" width="500" height="500" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" menu="false" wmode="transparent"><param name="wmode" value="transparent"></object>-->




      </div>
  <!--  	
<div id="tooplate_main">
    	
    	<div class="col_fw">       	
          
          <div class="col_allw300">
           	<h2>Donec urna neque</h2>
            <img src="images/tooplate_image_01.png" alt="image" class="image_frame" />
            <p><em>Lorem ipsum dolor sit amet, consectetur adipiscing elit cras mollis molestie libero.</em></p>
            <p>Bubble Show is brought to you by tooplate. Feel free to adapt and apply this template for your websites. Credits go to <a href="http://www.photovaco.com/" target="_blank">free photos</a> and <a href="http://www.thewebdesignblog.co.uk/" target="_blank">icons</a>. Sed molestie ultricies ante. Duis adipiscing, neque et sagittis sodales.</p>
				<div class="cleaner h20"></div>
             <a class="more" href="#"></a>
            </div>
            <div class="col_allw300">
            	<h2>In venenatis sagittis</h2>
				<img src="images/tooplate_image_02.png" alt="image" class="image_frame" />
              <p><em>Fusce nulla tellus, malesuada id accumsan a, hendrerit vitae nulla.</em></p>
              <p>In venenatis sagittis luctus. Phasellus ante metus, faucibus et vulputate mattis, dignissim et felis. Suspendisse at tortor gravida odio tempor faucibus vel a sem. Etiam mattis tortor quis tellus iaculis nec suscipit. Validate <a href="http://validator.w3.org/check?uri=referer" rel="nofollow"><strong>XHTML</strong></a> and <a href="http://jigsaw.w3.org/css-validator/check/referer" rel="nofollow"><strong>CSS</strong></a>.</p>
              	<div class="cleaner h20"></div>
               <a class="more" href="#"></a>
          </div>
          <div class="col_allw300 col_rm">
            	<h2>Our Latest News</h2>
                <div class="news_box">
                    <a href="#">Aliquam bibendum vulputate</a>
                    <p>Auris nisl mi, aliquet ac lobortis ut, tincidunt in tortor nisl vitae lectus dapibus pellentesque.</p>
                </div>
                <div class="news_box">
                    <a href="#">Nunc viverra vestibulum </a>
                    <p>Nunc viverra vestibulum magna, nec dignissim turpis rhoncus tincidunt. Donec ac nibh arcu. </p>
                </div>
                 <div class="news_box">
                    <a href="#">Fusce placerat ultrices</a>
                    <p>Integer ac ultricies nisi. Curabitur velit ante, porttitor ac feugiat a, porta ut lectus.</p>
                </div>
                <div class="cleaner h20"></div>
                <a class="more" href="#"></a>
            </div>
            <div class="cleaner"></div>
        </div>
        
        <div class="col_fw_last">
            <div class="col_w240 fp_service_box">
              <img src="images/icon-01.png" alt="image" />
   			  <h3>Web Design <br /><span>nunc sit amet tortor</span></h3>               
                <p> Vivamus a velit. Vivamus leo velit, convallis id, ultrices sit amet, tempor a, feugiat a libero.</p>
                <a class="more" href="#"></a>
          </div>
            <div class="col_w240 fp_service_box">
           	  <img src="images/icon-02.png" alt="image" />
              <h3>Marketing <br /><span>convallis id</span></h3>                
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ipsum felis, consectetur non.</p>
                <a class="more" href="#"></a>
          </div>
            <div class="col_w240 fp_service_box col_last">
	            <img src="images/icon-03.png" alt="image" />
                <h3>Social Media <br /><span>ut condimentum</span></h3>
                <p>Curabitur sed lectus id erat viverra consectetur nec in sapien. Etiam vitae tortor mi.</p>
                <a class="more" href="#"></a>
            </div>
            <div class="col_w240 fp_service_box col_last">
	            <img src="images/icon-04.png" alt="image" />
                <h3>Support <br /><span>fringilla molestie neque</span></h3>
                <p>Fusce nulla tellus, malesuada id accumsan a, hendrerit vitae nulla dignissim et felis.</p>
                <a class="more" href="#"></a>
            </div>

            
            <div class="cleaner"></div>
        </div>
        <div class="cleaner"></div>
    </div>--> <!-- end of main -->

</div>

<div id="tooplate_footer_wrapper">
    <div id="tooplate_footer">
		
    Bản quyền trò chơi thuộc công ty Kingsoft. Công ty Cổ phần VNG phân phối độc quyền tại Việt Nam. 182 Lê Đại Hành, Phường 15, Quận 11, TP.HCM.<br>
    Giấy phép phê duyệt nội dung số: 447/BTTTT-VT cấp ngày 26/9/2007 do Bộ Thông Tin Và Truyền Thông cấp.<br>
    <div class="cleaner"></div>
    
    </div>
</div> 

</body>
</html>