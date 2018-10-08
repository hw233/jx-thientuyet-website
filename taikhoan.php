<?php
session_start();
// Tải file mssql.php lên
require_once("cauhinh.php");

// Khởi động phiên làm việc


if ( !$_SESSION['user_id'] )
{

print <<<EOF

<meta http-equiv="Refresh" content="0; url=index2.php">
EOF;

}
else
{

$user_id = intval($_SESSION['user_id']);

$sql_query = @mssql_query("SELECT * FROM Account_Info WHERE iid='{$user_id}'");
$member = @mssql_fetch_array( $sql_query );


print <<<EOF

<?php require_once('Connections/webjx.php'); ?>
<?php
mysql_select_db($database_webjx, $webjx);
mysql_query("SET NAMES 'utf8'");
$query_Recordset1 = "SELECT * FROM thongbaotrangchu";
$Recordset1 = mysql_query($query_Recordset1, $webjx) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Quản Lý Tài Khoản - Võ Lâm Truyền Kỳ</title>
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

	<!-------------------------------------------- Bố Cục --------------------------------------------->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    <meta http-equiv="Content-Type" type="image/x-icon" content="text/html; charset=utf-8"/>
    <meta name="robots" content="index,follow"/>
    <meta name="revisit-after" content="1days"/>
    <link rel="stylesheet" type="text/css" href="css/screen.css"/>
    <script type="text/javascript" src="js/jquery-1.8.3.js"></script>
    <script type="text/javascript" src="js/function.js"></script>
    <!-- MU -->
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/tooltip.jquery.js"></script>
    <script type="text/javascript" src="js/js_01.js"></script>
    <script type="text/javascript" src="js/check.js"></script>
    <script type="text/javascript" src="library/jstooltip.js"></script>
    <script language="javascript" src="./styles/js/jquery.min.js"></script>
    <script language="javascript" src="./styles/js/jquery-ui.min.js"></script>
    <script src="./styles/js/jquery.tooltip.js" type="text/javascript"></script>
    <script src="./styles/js/action.js"></script>
    <script src="./styles/js/jquery.tooltip.js" type="text/javascript"></script>
    <link href="./styles/css/jquery-ui-1.css" media="screen" rel="stylesheet" type="text/css">
    <link type="text/css" rel="stylesheet" href="./styles/css/keyframe.css"/>
    <link href="./styles/css/colorbox.css" media="screen" rel="stylesheet"/>
    <link href="./styles/css/buttons.css" media="screen" rel="stylesheet"/>
    <title>Đăng Nhập - Võ Lâm Truyền Kỳ</title>
    <meta name="description" content="Quản lý Tài khoản Võ Lâm Lậu - Võ Lâm Private - Võ Lâm Truyền Kỳ Lậu - Game Võ Lâm - vo lam lau - vo lam private - volamtruyenky - vo lam truyen ky lau - game vo lam - vo lam 1 - volam lau - volamtruyenky - vo lam truyen ky mien phi - vo lam 1 private - vo lam 2 lau - download vo lam 2 - vo lam 2 - vo lam g4 - auto vo lam - auto vo lam mien phi - auto vo lam 2 - tai game vo lam 2 - vo lam 1 lau - nhac vo lam truyen ky - game online hay - game online hay nhat - game online hay nhat 2013 - phim vo lam truyen ky - download game mini - vo lam 2 private - vo lam private 2012 - volam.us"/>
    <meta name="keywords" content="Võ Lâm Lậu - Võ Lâm Private - Võ Lâm Truyền Kỳ Lậu - Game Võ Lâm - vo lam lau - vo lam private - volamtruyenky - vo lam truyen ky lau - game vo lam - vo lam 1 - volam lau - volamtruyenky - vo lam truyen ky mien phi - vo lam 1 private - vo lam 2 lau - download vo lam 2 - vo lam 2 - vo lam g4 - auto vo lam - auto vo lam mien phi - auto vo lam 2 - tai game vo lam 2 - vo lam 1 lau - nhac vo lam truyen ky - game online hay - game online hay nhat - game online hay nhat 2013 - phim vo lam truyen ky - download game mini - vo lam 2 private - vo lam private 2012 - volam.us"/>
    <link type="text/css" rel="stylesheet" href="./css/mainsite.css"/>
	<link type="text/css" rel="stylesheet" href="../css/apprise.css"/>
	<script language="javascript" src="../css/apprise-1.5.full.js"></script>
    <!-- htmld2p:REFERENCE -->
    <!-- htmld2p:END. REFERENCE -->
    <!-- htmld2p:CSS -->
    <link type="text/css" rel="stylesheet"
          href="http://volamviet.biz/img.zing.vn/volamthuphi/skin/jxthuphi_2014_06/css/style1c1d.css?ver=222"/>
    <link type="text/css" rel="stylesheet"
          href="http://volamviet.biz/img.zing.vn/volamthuphi/skin/jxthuphi_2014_06/css/sub.css"/>
    <link type="text/css" rel="stylesheet"
          href="http://volamviet.biz/img.zing.vn/volamthuphi/skin/jxthuphi_2014_06/css/content.css"/>
    <link type="text/css" rel="stylesheet"
          href="http://volamviet.biz/img.zing.vn/volamthuphi/skin/jxthuphi_2014_06/css/j-navigation.css"/>
    <link type="text/css" rel="stylesheet"
          href="http://volamviet.biz/img.zing.vn/volamthuphi/skin/jxthuphi_2014_06/css/detailnews.css"/>
    <link type="text/css" rel="stylesheet"
          href="http://volamviet.biz/img.zing.vn/volamthuphi/skin/jxthuphi_2014_06/css/listnews.css"/>
    <link rel="stylesheet" type="text/css"
          href="http://volamviet.biz/img.zing.vn/volamthuphi/skin/jxthuphi_2014_06/css/camnang.css"/>
    <link rel="stylesheet" type="text/css"
          href="http://volamviet.biz/img.zing.vn/volamthuphi/skin/jxthuphi_2014_06/css/listevent.css"/>
    <!-- htmld2p:END. CSS -->
</head>
<body>
<!--<div id="topbar"></div>-->
<div class="WrapperBG">
  <div id="wrapper">
    <div id="wrapperIn">
      <div id="header">
        <!-- Begin block Sub_DownloadGame_DownloadGame - MTkwfFN1Yl9Eb3dubG9hZEdhbWV8NTY0fHRhbi10aHV8RG93bmxvYWRHYW1lfEhUTUw -->
        <div id="download"> <a class="SetUp" href="http://volamviet.biz/taigame.htm" title="Cài đặt ngay"
                       target="_blank">Cài đặt
          ngay</a> <a class="Register Dangky" title="Đăng ký nhanh" rel="ajax" href="dangky.php">Đăng ký nhanh</a> <a class="NapThe" rel="ajax" href="napthe.php">Nạp thẻ</a> </div>
        <a class="Logo" href="trangchu.html"
                   title="Trở về trang chủ Võ Lâm Truyền Kỳ">Trở về trang chủ Võ Lâm Truyền Kỳ</a>
        <div id="boxNav">
          <ul id="nav">
            <li><a class="Nav-1" href="trangchu.html" title="Trang chủ">Trang
              chủ<span>icon</span></a></li>
            <li><a class="Nav-2" href="http://volamviet.biz/tin-tuc.html" title="Tin tức">Tin tức<span>icon</span></a> </li>
            <li><a class="Nav-3" href="http://volamviet.biz/tin-tuc.html" title="Sự kiện">Sự kiện<span>icon</span></a> </li>
            <li><a class="Nav-4" href="http://volamviet.biz/huong-dan.html" title="Hướng dẫn">Hướng
              dẫn<span>icon</span></a></li>
            <li><a class="Nav-5" href="#HT" title="Hổ trợ" onClick="apprise('<center>Để được hỗ trợ về game bạn hãy liên hệ với nick Yahoo hoặc SDT bên dưới: <table style=width: 500px><tr><td style=width: 50%><a href=ymsgr:sendIM?tinhnghiagiangho.vltk><img width=32 height=32 border=0 src=http://opi.yahoo.com/online?u=tinhnghiagiangho.vltk&amp;m=g&amp;t=7></a></td><td style=width: 50%><a href=ymsgr:sendIM?tinhnghiagiangho.vltk><b class=RedText>tinhnghiagiangho.vltk</b></a></td></tr><tr><td><img width=32 height=32 src=../images/phone.png style=float: right /></td><td><b class=RedText>090X.XXX.XXX</b></td></tr></table><b>Chú ý:</b> <i>Khi chat nên hỏi thẳng vào vấn đề bạn cần hỗ trợ, không nên BUZZ.<br> BQT sẽ trả lời bạn sớm nếu bạn tuân thủ đúng quy định!!!</i></center>', {'animate':true});"><span>icon</span></a></li>
            <li><a class="Nav-6" href="http://facebook.com/tinhnghiagiangho.vltk" title="Fanpage"
                               target="_blank">Forum<span>icon</span></a></li>
          </ul>
        </div>
        <!-- End block Main_Navigation_MainNavigation -->
      </div>
      <div class="Main">
        <!-- Begin block Sub_Sidebar_TanThu_Subpage_Sidebar - MTg4fFN1Yl9TaWRlYmFyX1RhblRodXw1NjR8dGFuLXRodXxTdWJwYWdlX1NpZGViYXJ8SFRNTA -->
        <div class="Sidebar">
          <div class="WrapperNavMenu">
            <div class="NavMenu">
              <h2 class="TitleTinTuc">QUẢN LÝ</h2>
              <ul>
			  
                <li><a rel="ajax" href="doimatkhau.php">•Đổi Mật Khẩu</a> </li>								
                <li><a rel="ajax" href="suathongtin.php">•Đổi Thông Tin</a></li>
				<li><a rel="ajax" href="napthe.php" >•Nạp Thẻ Game</a> </li>
				<li><a href="listcard" rel="ajax">•Lịch Sử Thẻ Nạp</a></li>				
				<li><a rel="ajax" href="treoacc.php">•Treo Tài Khoản</a></li>
                <li><a rel="ajax" href="kickacc.php">•Giải Kẹt Tài Khoản</a> </li>
				<li><a rel="ajax" href="taikhoan.php">•Thông Tin Tài Khoản</a></li>

              </ul>
            </div>
          </div>
        </div>
        <!-- End block Sub_Sidebar_TanThu_Subpage_Sidebar -->
        <div class="MainContent">
          <div id="static">
            <!-- End block Sub_Search_Search -->
            <div class="StaticOuter">
              <div class="StaticInner">
                <!-- Begin module article - YXJ0aWNsZXw1NjR8dGFuLXRodQ -->
                <div class="StaticTopPanel"><img
                                        src="http://volamviet.biz/img.zing.vn/volamthuphi/skin/jxthuphi_2014_06/images/icon-header-camnang.png"/>
                    <h2 class="TitleMain">
                     <strong style="font-size:15px">Chào Mừng </strong>
					 <font color="red"><strong style="font-size:20px"> {$member['cAccName']} </strong></font> 
					 <strong style="font-size:15px">Đến Với</strong> <font color="red"><strong style="font-size:20px">
                     Võ Lâm Truyền Kỳ </strong></font>
					 <a class="Accept" href="logout.php"><strong style="font-size:15px">THOÁT</strong></a>
                    </h2>
                  <ul id="breadcrumbs">
                      <li itemscope=""><a href="http://volamviet.biz" title="Trang Chủ"
                                                            itemprop="url"><span itemprop="title">Trang Chủ</span></a>&gt; </li>
                    <li itemprop="url"><span class="Active" itemprop="title">Thông Tin Tài Khoản</span></li>
                  </ul>
            </div>

		<!----------------------------------------------- STORY------------------------------------------------>
 <!--div class="contentHTML">
  <div class="title">
    <div class="titleLocation"><strong>• Chào mừng bạn  <span class="style4"> {$member['cAccName']} </span> đã đến với <span class="style5">Võ Lâm Truyền Kỳ </font></strong></span></div>
  </div-->
  
  <div class="boxContent">
    <div class="title-page">
      <h1>&nbsp;</h1>
    </div>
    <div class="box_content">
    <p><strong> <font color="green">• Để cập nhật tài khoản vui lòng chọn trong phần QUẢN LÝ bên trái website để tiến hành thao tác</strong></font></p><br>
    </div>
    <br>
    <div class="box_image_h2">
      <table width="419" border="0">
        <tr>
          <td colspan="5"><div align="center" class="style8">•THÔNG TIN TÀI KHOẢN• </div></td>
          </tr>
        <tr>
          <td width="142"><br>+<span class="style5"> NGÀY ĐĂNG KÝ : </span></td>
          <td width="208"><span class="style10"><br>{$member['dRegDate']} </span></td>
          <td width="9">&nbsp;</td>
          <td width="29">&nbsp;</td>
          <td width="9">&nbsp;</td>	
        </tr>
        <tr>
          <td>+<span class="style5"> TÊN TÀI KHOẢN :</span></td>
          <td><span class="style10">{$member['cAccName']}</span></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>		
        </tr>
        <tr>
          <td>+<span class="style5"> ĐỊA CHỈ EMAIL :</span></td>
          <td><span class="style10">{$member['cEMail']}</span></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>		
		</tr>
		<tr>
          <td>+<span class="style5"> SỐ ĐIỆN THOẠI :</span></td>
          <td><span class="style10">{$member['cPhone']}</span></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>		
        </tr>
        <tr>
          <td>+<span class="style5"> TÊN THÀNH VIÊN :</span></td>
          <td><span class="style10">{$member['cRealName']}</span></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
		</tr>
		<tr>		
          <td>+<span class="style5"> MÃ SỐ TÀI KHOẢN :</span></td>
          <td><span class="style10">{$member['iid']}</span></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
	   </td>
     </tr>
   </table>
   <p>&nbsp;   </p>
    </form>
    </div>
    <div align="left" style="margin-right:25px;">

<font color="green"> (*) Để đảm bảo an toàn tài khoản sau khi thoát Game, vui lòng chọn <strong class="clr02">• <u> Treo Tài Khoản</u></strong><br/>

                    (*) Nếu tài khoản không đăng nhập được vào Game, vui lòng chọn <strong class="clr02"> • <u> Giải Kẹt Tài Khoản</u></strong></font>
            </div>
		  </div>			  
		  </div>
		  <div class="content-b">
		  </div>
		  </div>
          </div>			
          </div>
          </div>
		  </div>	  
      <!-- Begin block Main_Footer_MainFooter - MTkyfE1haW5fRm9vdGVyfDU2NHx0YW4tdGh1fE1haW5Gb290ZXJ8SFRNTA -->
	  
            <div id="footer">
        <div id="footerWrapper">
    	<a target="_blank" onclick="_gaq.push(['_trackEvent','MainSite', 'Main_Footer', 'Logo VNG',1]);" title="Võ Lâm Truyền Kỳ" href="http://volamviet.biz/" class="VNG">Trang Chủ</a>
    	<a target="_blank" onclick="_gaq.push(['_trackEvent','MainSite', 'Main_Footer', 'Logo KingSoft',1]);" title="Yahoo" href="ymsgr:sendIM?caorot_yeuchuot&amp" class="KingSoft">KingSoft</a>
        <p>•Ghi rõ nguồn »<font color=green>VOLAMVIET.BIZ</font>« khi bạn phát hành lại thông tin từ website này.<br>
		   •<font color=red>Lưu ý : Chúng tôi không phải nhà phát hành chính thức - cân nhắc trước khi tham gia Game.</font><br>
           •<font color=yellow>Duy trì và phát triển bởi ™Cà Rốt Yêu Chuột™ - Phiên bản WinServer mới nhất trên thị trường Game.</font></p>
        <div class="rating">
        <a target="_blank" onclick="_gaq.push(['_trackEvent','MainSite', 'Main_Footer', 'He thong phan loai game',1]);" title="Fanpage" href="http://facebook.com/tinhnghiagiangho.vltk">Hệ thống phân loại Game</a>
        </div>
    </div>
</div>
<!-- End block Main_Footer_MainFooter -->
    </div>
</div>
<ul class="MainSidebar">
    <li><a class="BtnSidebar-1" onclick="_gaq.push(['_trackEvent','MainSite', 'Main_Sidebar', 'CcTalk',1]);" href="ymsgr:sendIM?hotrovolamtruyenky&amp;m=Trong quá trình PM hỗ trợ không trả lời, mọi người vui lòng vào http://facebook.com/tinhnghiagiangho.vltk" title="Hỗ Trợ Trực Truyến" target="_blank">Hỗ Trợ Trực Truyến</a></li>
    <li><a class="BtnSidebar-2" onclick="_gaq.push(['_trackEvent','MainSite', 'Main_Sidebar', 'Youtube',1]);"href="https://www.youtube.com/user/VoLamTruyenKyVNG" title="Youtube" target="_blank">Youtube</a></li>
    <li><a class="BtnSidebar-3" onclick="_gaq.push(['_trackEvent','MainSite', 'Main_Sidebar', 'Top',1]);" href="#wrapper" title="Đầu Trang">Đầu Trang</a></li>
</ul>
    <script type="text/javascript"
            src="http://volamviet.biz/img.zing.vn/eventgame/intro/general/js/mainsite.js"></script>
    <script type="text/javascript"
            src="http://volamviet.biz/img.zing.vn/eventgame/intro/general/topbar-zone/call-topbar-zone-jx1.js"></script>
    <script type="text/javascript" src="http://volamviet.biz/img.zing.vn/volamthuphi/js/widget-login-jx.js"></script>
    <script type="text/javascript" src="http://volamviet.biz/img.zing.vn/volamthuphi/js/ga-jx.js"></script>

    <!-- htmld2p:REFERENCE -->
    <!-- htmld2p:END. REFERENCE -->
    <!-- htmld2p:JS -->
    <script type="text/javascript"
            src="http://volamviet.biz/img.zing.vn/volamthuphi/skin/jxthuphi_2014_06/js/core/core-subpage.js"></script>
    <script type="text/javascript"
            src="http://volamviet.biz/img.zing.vn/volamthuphi/skin/jxthuphi_2014_06/js/navigation.js"></script>
    <script type="text/javascript"
            src="http://volamviet.biz/img.zing.vn/volamthuphi/skin/jxthuphi_2014_06/js/navigation_left.js"></script>
    <script type="text/javascript"
            src="http://volamviet.biz/img.zing.vn/volamthuphi/skin/jxthuphi_2014_06/js/call_navigation.js"></script>
    <script type="text/javascript"
            src="http://volamviet.biz/img.zing.vn/volamthuphi/skin/jxthuphi_2014_06/js/common-sub.js"></script>
    <!-- htmld2p:END. JS -->
</div>
</div>
</body>
</html>

EOF;

}

?>