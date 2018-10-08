<?php require_once('Connections/webjx.php');?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "admin";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "505.html";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php
mysql_select_db($database_webjx, $webjx);
$query_admin = "SELECT * FROM `admin`";
$admin = mysql_query($query_admin, $webjx) or die(mysql_error());
$row_admin = mysql_fetch_assoc($admin);
$totalRows_admin = mysql_num_rows($admin);
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $tenweb; ?></title>
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



		<!--[if IE 6]>

		<script src="http://img.zing.vn/volamnew/skin/JX1_Subpage_012010/template/js/DD_belatedPNG_0.0.8a-min.js"></script>

		<script>

            if ( isIE6 ) {

                $(document).ready(function () {

                    DD_belatedPNG.fix('#hoa-van,.content-b,#menu li.Active ul li ul, #menu li.Active ul li a, ul#sidenav, ul#sidenav li, ul#sidenav li a, ul#sidenav li ul, img, #box-footer,#menu li.Active ul,#menu li.Active ul li a,#menu li.Active ul li,#menu li.Active ul li.Hilite a,#menu li.Active ul li.off a,#menu li.Active ul li.bottom a,#menu li.Active ul li.Active ul li a.bottom, img');

                });

            }

		</script>

		<![endif]-->
		
<!-- js chung -->

<!-- phan content -->
<link href="css/content.css" rel="stylesheet" type="text/css">


<!-- phan content -->



<script>
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
</script>





<style type="text/css">
                @import 'css/style-topbar.css';
.style2 {font-size: 72px}
.style3 {color: transparent}
.style4 {color: #FF0000}
.style5 {font-weight: bold}
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
			<div class="style2" id="download"><a href="taigame.php" class="style3"></a><a href="taigame.php"><img src="images/sub_down.jpg" width="131" height="73" border="0" /></a></div>
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
              <p><img src="images/title-huongdancoban.jpg" /></p>
              <div id="box-sidenav">
                <ul id="sidenav">
                  <li><a href="admincp.php">Trang chủ </a></li>
                  <li><a href="javascript:void(0);">Quản lý thông báo trang chủ </a>
                      <ul>
                        <li><a href="suathongbao.php">Sửa thông báo</a></li>
                      </ul>
                  <li><a href="javascript:void(0);">Quản lý tin tức môn phái </a>
                      <ul>
                        <li><a href="themtttv.php">Thêm tin tức Thiên Vương</a>
                        <li><a href="themttttl.php">Thêm tin tức Thiêú Lâm</a>
                        <li><a href="themttdm.php">Thêm tin tức Đường Môn</a>
                        <li><a href="themttnd.php">Thêm tin tức Ngũ Độc</a>
                        <li><a href="themttnm.php">Thêm tin tức Nga My</a>
                        <li><a href="themttty.php">Thêm tin tức Thúy Yên</a>
                        <li><a href="themttcb.php">Thêm tin tức Cái Bang</a>
                        <li><a href="themtttn.php">Thêm tin tức Thiên Nhẫn</a>
                        <li><a href="themttvd.php">Thêm tin tức Võ Đang</a>
                        <li><a href="themttcl.php">Thêm tin tức Côn Lôn</a>
                    </ul>
                  <li><a href="javascript:void(0);">Quản lý tài khoản </a>
                      <ul>
                        <li><a href="suatk.php">Sửa tài khoản</a>
                        <li><a href="xoatk.php">Xóa tài khoản</a>
                    </ul>
                  <li><a href="javascript:void(0);">Quản lý tải game</a>
                      <ul>
                        <li><a href="qltaigame.php">Sửa link tải game</a>
                    </ul>
                  <li><a href="javascript:void(0);">Quản lý hướng dẫn CS </a>
                      <ul>
                        <li><a href="themhdcs.php">Sửa hướng dẫn CS</a>
                    </ul>
                  <li><a href="javascript:void(0);">Quản lý tọa độ boss </a>
                      <ul>
                        <li><a href="themtdb.php">Thêm tọa độ boss</a>
                        <li><a href="suatdb.php">Sửa tọa độ boss</a>
                        <li><a href="xoatdb.php">Xóa tọa độ boss</a>
                    </ul>
                  <li><a href="javascript:void(0);">Quản lý quy định </a>
                      <ul>
                        <li><a href="suaquydinh.php">Sửa quy định</a>
                    </ul>
                  <li><a href="javascript:void(0);">Quản lý Admin</a>
                      <ul>
                        <li><a href="doimkadmin.php">Đổi mật khẩu admin</a>
                    </ul>
                  <li><a href="<?php echo $logoutAction ?>">Thoát</a> </li>
                </ul>
              </div>
              <!-- block left_menu_huongdancoban_html -->
                <div class="clear"></div>
                <div id="ad_zone_310" class="nav-ad">
                  <div id="beacon_4553" style="position: absolute; left: 0px; top: 0px; visibility: hidden;"><img src="images/lg.gif" alt="" style="width: 0px; height: 0px;" width="0" height="0" /></div>
                </div>
              </div>
            </div>
	      </div>
		  <div id="col-2">
            <div class="content-bg">
              <div class="content-t">
                <!-- STORY-->
                <div class="contentHTML">
                  <div class="title">
                    <div class="titleLocation">ADMINCP </div>
                  </div>
                  <div class="boxContent">
                    <div class="title-page">
                      <h1></h1>
                    </div>
                    <div class="box_content style5">
                      <p><br />
                      </p>
                    </div>
                    <div class="text-16px">
                      <p><strong>Chào mừng bạn <span class="style4"><?php echo $row_admin['username']; ?></span> đến với trang quản lý website JX ONLINE.</strong></p>
                      <p><strong>Mong các bạn tôn trọng bản quyền và không xóa copyright.  </strong></p>
                    </div>
                    <p>&nbsp;</p>
                  </div>
                </div>
                <script>
   	var activesidenav = "menu4_1_0";
	var activemenu_nav = "menu3_4_1";
        </script>
                <!-- /STORY-->
                <div style="height: 70px; width: 100%;"></div>
                <!-- END STORY -->
              </div>
            </div>
		    <div class="content-b"></div>
	      </div>
		  </div>
		</div>
		</div>
</div>
		  <div class="clear"></div>
			<div id="box-footer">
				<p>WEB JX PRO FULL - SKIN RIP BY MILLY.</p>
			</div>
</body></html>
<?php
mysql_free_result($admin);
?>
