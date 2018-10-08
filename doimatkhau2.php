<?php
session_start();
// Tải file mssql.php lên
require_once("cauhinh.php");

// Khởi động phiên làm việc


if ( !$_SESSION['user_id'] )
{

print <<<EOF
<html>
<body>
<meta http-equiv='refresh' content="0; url=login.php">
</body>
</html>
EOF;

}
else
{

$user_id = intval($_SESSION['user_id']);

$sql_query = @mssql_query("SELECT * FROM Account_Info WHERE iid='{$user_id}'");
$member = @mssql_fetch_array( $sql_query );

print <<<EOF



<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>$tenweb</title>
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
.style5 {
	color: #3366FF;
	font-weight: bold;
}
.style8 {color: #CC3300; font-weight: bold; }
.style10 {color: #FF0000; font-weight: bold; }
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
            <!-- block menu_header_html --><div class="clear"></div>	 			
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
	  <li><a href="napthe.php">Nạp thẻ</a></li>
    <li><a href="doimatkhau1.php">Đổi mật khẩu cấp 1 </a></li>
    <li><a href="suathongtin.php">Đổi thông tin tài khoản</a>
				<a href="kickacc.php">Kick acc kẹt</a>
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
	 <li><a href="logout.php">Thoát</a></li>
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
    <div class="titleLocation">Chào bạn <span class="style4">{$member['cAccName']} - WEB JX PRO FULL </span></div>
  
  </div>
  <div class="boxContent">
    <div class="title-page">
      <h1>&nbsp;</h1>
    </div>
    <div class="box_content">
      <form method="post" action="ktdoimatkhau2.php">
        <table width="509" border="0">
			<tr>
            <td width="152">Tên tài khoản</td>
            <td width="275"><label>
              <input type="text" name="username" id="username" />
            </label></td>
            <td width="68">&nbsp;</td>
          </tr>
          <tr>
            <td width="152">Mật khẩu cấp 2 hiện tại </td>
            <td width="275"><label>
              <input type="password" name="password2cu" id="password2cu" />
            </label></td>
            <td width="68">&nbsp;</td>
          </tr>
          <tr>
            <td>Mật khẩu cấp 2 mới </td>
            <td><label>
              <input type="password" name="password2moi" id="password2moi" />
            </label></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><label>
              <input type="submit" name="Submit" value="Đổi mật khẩu"/>
            </label></td>
            <td>&nbsp;</td>
          </tr>
        </table>
            </form>
      <p>&nbsp;</p>
      </div>
 
    <div class="box_image_h2"></div>

  </div>
</div>
<script>
   	var activesidenav = "menu4_1_0";
	var activemenu_nav = "menu3_4_1";
</script>
<!-- /STORY-->
 

	



  	
	<div style="height: 70px; width: 100%;"></div>
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






EOF;

}

?>