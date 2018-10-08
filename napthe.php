<?php
include('includes/MobiCard.php');
$kquade ='';
if(isset($_POST['NLNapThe'])){
		$txtUser = $_POST['txtUser'];
		$soseri = $_POST['txtSoSeri'];
		$sopin = $_POST['txtSoPin'];
		$type_card = $_POST['select_method'];
		
			if ($_POST['txtUser'] == "" ) {
			echo '<script>alert("Vui long nhap Ten Tai Khoan");</script>';
			echo "<script>location.href='".$_SERVER['HTTP_REFERER']."';</script>";
			exit();
		}
		if ($_POST['txtSoSeri'] == "" ) {
			echo '<script>alert("Vui long nhap So Seri");</script>';
			echo "<script>location.href='".$_SERVER['HTTP_REFERER']."';</script>";
			exit();
		}
		if ($_POST['txtSoPin'] == "" ) {
			echo '<script>alert("Vui long nhap Ma The");</script>';
			echo "<script>location.href='".$_SERVER['HTTP_REFERER']."';</script>";
			exit();
		}
		
		
	function anti_sql($sql) 
	{
		$sql = str_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|*|--|\)/"),"",$sql);
		return trim(strip_tags(addslashes($sql))); #strtolower()
	}
	
	
	if($txtUser == '')
	{
		$thongbao="Vui lòng click ch&#7885;n logo m&#7841;ng &#273;i&#7879;n tho&#7841;i c&#7911;a th&#7867; cào.";
	}else
	{
		$userid=anti_sql($txtUser);
		$mapinid=anti_sql($sopin);
		$soseriid=anti_sql($soseri);
	

		
		$call = new MobiCard();
			  $rs = new Result();
			  
			  $ref_code = time();
					
			  $rs = $call->CardPay($sopin,$soseri,$type_card,$ref_code,"Tên khách hàng","Mobile Khách Hàng"," Email Khách hàng");
			  
			  if($rs->error_code == '00') {				
				// Cập nhật data tại đây
			
				//$rs->card_amount= 20000;
					$tien =$rs->card_amount;
					if($tien == 10000){
					$sql = "SELECT * FROM `napthe` where `id` <200 and `trang_thai` =0;";
				
					}
					if($tien == 20000){
					$sql = "SELECT * FROM `napthe` where `id` >200 and `id` <500 and `trang_thai` =0;";
					}
					if($tien ==50000)
					{
					$sql = "SELECT * FROM `napthe` where `id` >500 and `id` <750 and `trang_thai` =0;";
					}
					if($tien ==100000)
					{
					$sql = "SELECT * FROM `napthe` where `id` >750 and `id` <900 and`trang_thai` =0;";
					$sql1 = "SELECT * FROM `mapin` where `id` >750 and `id` <900 and`trang_thai` =0;";
					}
					
					if($tien ==200000)
					{
					$sql = "SELECT * FROM `napthe` where `id` >900 and `id` <950 and`trang_thai` =0;";
					}
					
					if($tien ==300000)
					{
					$sql = "SELECT * FROM `napthe` where `id` >950 and `id` <980 and`trang_thai` =0;";
					}
					if($tien ==500000)
					{
					$sql = "SELECT * FROM `napthe` where `id` >980 and `id` <1000 and`trang_thai` =0;";
				
					}
					
					
					mysql_connect("localhost","root","carotyeuchuot123") or die("Lỗi kết nối  mysql");
					mysql_select_db("datanapxucarot");
					$kt=mysql_query($sql);				        
					$row = mysql_fetch_array($kt);
					$id =$row["id"];
					$maso =$row["maso"];
					mysql_query("update `napthe` set trang_thai =1 where id = '$id'");
					mysql_query("update `napthe` set tentaikhoan = '$userid' where id = '$id'");
					mysql_query("update `napthe` set masothe = '$mapinid' where id = '$id'");

					
				
				$kquade= "Nạp thẻ thành công . $maso   . Bạn hãy lưu lại Serial và Mã Thẻ này.Sau đó vào Game. Đi tìm gặp NPC Tiền Trang(199/199) để tiến hành nạp thẻ. ";
			
				  echo  '<script>alert("'.$kquade.'");</script>'; //$total_results;
			   }
			   else {
			   	   $kquade= "Thông báo : Bạn đã nhập sai mã pin hoặc số seri của thẻ cào. Lưu ý: nhập các chữ số liền nhau ,không được có khoảng trắng...<br> Xin vui lòng nhập lại  . ";
				
				   echo  '<script>alert("Lỗi :'.$rs->error_message.' Lưu ý: nhập các chữ số liền nhau ,không được có khoảng trắng...<br> Xin vui lòng nhập lại  . ");</script>';
			   }
	}
	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" type="image/x-icon" content="text/html; charset=utf-8" />
<meta name="robots" content="index,follow" />
<meta name="revisit-after" content="1days" />
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
<meta name="google-site-verification" content="xPSgBSfWXd5bk31ICazGl1WvpG3B1J4j5Cg9P6V8OZo" />
<script type="text/javascript" src="img.zing.vn/eventgame/intro/general/js/mainsite.js"></script>
<title>HỆ THỐNG NẠP THẺ - VÕ LÂM TRUYỀN KỲ</title>
<meta name="keywords" content="Lich thi dau, vo lam truyen ki , vo lam , vltk , game online, download game, tai game, choi game online, son ha xa tac, choi game mien phi, tai game mien phi, download game free"/>
<meta name="description" content="Lich thi dau Tai va choi game online mien phi Vo Lam Truyen Ky . Choi game online Vo Lam, thuc hien nhiem vu Son Ha Xa Tac"/>
<meta property="fb:app_id" content="218407745021247" /> 
<link rel="shortcut icon" href="images/favicon.ico"/>
<link rel="alternate" type="application/rss+xml" title="Volam - RSS" href="http://volamviet.biz/rss"/>
<link type="text/css" rel="stylesheet" href="img.zing.vn/eventgame/intro/general/css/mainsite.css"/>
<link type="text/css" rel="stylesheet" href="img.org.vcdn.vn/volamthuphi/skin/jxthuphi_2014_06_minisub/css/jx1minisub.css?ver=12301452" />
<link type="text/css" rel="stylesheet" href="img.org.vcdn.vn/volamthuphi/skin/jxthuphi_2014_06_minisub/css/content-new.css" />
<script type="text/javascript">
var activemenu_nav = "menu1_0_0";
</script>
</head>
<body>
<!--<div id="topbar" ></div>-->
<div id="wrapper">
    <div id="wrapperIn">
        <div id="container">
        	<div class="TopUtility">
            	<a class="Logo" title="Trở về trang chủ Võ Lâm Truyền Kỳ" href="/trangchu.html" onclick="_gaq.push(['_trackEvent','MainSite', 'Main_Navigation', 'Logo',1]);">Trở về trang chủ Võ Lâm Truyền Kỳ</a>
                <ul id="nav-link">
				<img class="magnify" magnifyby="3" style="width: 363px; height: 256px;" src="http://volamviet.biz/images/banggia.jpg" alt="" border="0" /> 
                    <!--li><a onclick="_gaq.push(['_trackEvent','MiniSubweb', 'Utility Link', 'Trang chu',1]);" href="/trangchu.html" title="TRANG CHỦ">TRANG CHỦ</a>|</li>
                    <li><a onclick="_gaq.push(['_trackEvent','MiniSubweb', 'Utility Link', 'Dien dan',1]);" href="http://facebook.com/tinhnghiagiangho.vltk" target="_blank" title="FANPAGE">FANPAGE</a>|</li>
                    <li><a onclick="_gaq.push(['_trackEvent','MiniSubweb', 'Utility Link', 'Su kien',1]);" href="ymsgr:sendIM?hotrovolamtruyenky&amp;m=Trong quá trình PM hỗ trợ không trả lời, mọi người vui lòng vào http://facebook.com/tinhnghiagiangho.vltk" title="HỖ TRỢ">HỖ TRỢ</a></li-->
                </ul>
            </div>
            <!-- Begin module event - ZXZlbnR8NTY3fHN1LWtpZW5fbWluaQ --><div id="header">
    <div class="name-event">•HỆ THỐNG NẠP THẺ - TÌNH NGHĨA GIANG HỒ•</div>
    <div class="event-time"><b><font color =red>•LỰA CHỌN LOẠI THẺ NẠP•</font></b></div>
</div>
 
<div id="quickLink">
    <div id="download">
    <a onclick="_gaq.push(['_trackEvent','MiniSubweb', 'MiniSub_DownloadGame', 'Cai dat',1]);" href="taigame.htm" class="SetUp" title="Cài đặt ngay" target="_blank">Cài đặt ngay</a>
    <a onclick="_gaq.push(['_trackEvent','MiniSubweb', 'MiniSub_DownloadGame', 'Dang ky',1]);" href="dangky.php" class="Register Dangky" title="Đăng ký nhanh" target="_blank">Đăng ký nhanh</a>
    <a onclick="_gaq.push(['_trackEvent','MiniSubweb', 'MiniSub_DownloadGame', 'Nap the',1]);" href="napthe.php" class="NapThe" title="Nạp thẻ" target="_blank">Nạp thẻ</a>
    </div>
	<ul id="sidenavMenu">
              	 <li><a href="trangchu.html" title="TRANG CHỦ">TRANG CHỦ</a></li>
    		     <!--li><a href="https://www.facebook.com/tinhnghiagiangho.vltk" title="FANPAGE">FANPAGE</a></li-->	
	    		 <li><a href="ymsgr:sendIM?hotrovolamtruyenky&amp;m=Trong quá trình PM hỗ trợ không trả lời, mọi người vui lòng vào http://facebook.com/tinhnghiagiangho.vltk" title="TIN TỨC">HỖ TRỢ NẠP THẺ</a></li>
				 <li><a href="#" title="HƯỚNG DẪN NẠP THẺ">HƯỚNG DẪN NẠP THẺ</a></li>
    </ul>    <a class="ScrollTop" href="javascript:void(0);"><img src="img.org.vcdn.vn/volamthuphi/skin/jxthuphi_2014_06_minisub/images/top.png"/></a>
</div>
<div id="static">
	<div class="StaticOuter">
		<div class="StaticInner">
	<div class="StaticMain">  <style type="text/css">
            #wrapper {
    background: url("img.zing.vn/volamthuphi/images/data/event2015/de-nhat-bang-ver2.jpg") no-repeat center top;
}

.logo {
    height: 110px;
    left: 60px;
    margin: 0 auto;
    position: absolute;
    top: 25px;
    width: 210px;
    z-index: 1;
}
</style>
		
<CENTER>	  
            <td><form   action="#" method="post" name="napthe" id="napthe">
              <div id="body12" ;  margin: 0 auto;  padding: 100px;  width: 560px;">
                <p align="left"><span style="color:blue;size:50;"><?PHP echo $kquade ?></span></p>
                <div align="center" style="color:CC0000;margin-top:10px;font-size:14px">
                  <div align="left" class="style13">
                    <div align="center" class="style18">
                      <p align="left"> 
					  </div>
                  </div>
                </div>	
                <table width="200" align="center">
                    <tr>
                      <td colspan="3"><table>
                          <tr>
                            <td style="padding-top:10px;padding-left:10px" align="left"><label for="120"><img width="115" height="50" src="includes/images/gate.jpg" /> </label></td>
                            <td style="padding-top:10px;padding-left:10px" align="left"><label for="121"><img width="115" height="50" src="includes/images/vtc.jpg" /> </label> </td> 
                            <td style="padding-top:10px;padding-left:10px" align="left"><label for="107"><img width="115" height="50" src="includes/images/vt.jpg" /> </label></td>
                            <td style="padding-left:10px;padding-top:10px" align="right" ><label for="92"><img width="115" height="50" src="includes/images/mobifone.jpg" /> </label>  </td>
                            <td style="padding-left:10px;padding-top:10px"><label for="93"><img width="115" height="50"  src="includes/images/vinaphone.jpg" /></label></td>
                          </tr>
                          <tr>
                            <td align="center" style="padding-bottom:0px;padding-right:0px"><input type="radio" id="120" value="GATE" name="select_method" />   </td>
                            <td align="center" style="padding-right:0px"><input type="radio" id="121" value="VCOIN" name="select_method" />   </td>                               
                            <td align="center" style="padding-bottom:0px;padding-right:0px"><input type="radio"  name="select_method" value="VIETTEL" id="107" />  </td>
                            <td align="center" style="padding-bottom:0px;"><input type="radio" name="select_method" checked="checked" value="VMS" id="92" /> </td>
                            <td align="center" style="padding-bottom:0px;padding-left:0px"><input type="radio"  name="select_method" value="VNP" id="93" />   </td>
                          </tr>
                      </table></td> 
                    </tr> 
</CENTER>
                    <tr>
                    <td width="206" align="left" style="padding-bottom:10px"><br><span class="style18"></span><span class="style19"></span></td>
                    </tr>
                    <tr>
                      <td width="130" align="right" style="padding-bottom:10px"><span class="style18"><strong>Tên Tài Khoản :</strong></span></td>
                      <td width="357" colspan="2"><input type="text" id="txtUser" name="txtUser" style="height:25px;width:200px" /></td>
                    </tr>
                    <tr>					
                      <td align="right" style="padding-bottom:10px"><span class="style18"><strong>Mã Số Thẻ :</strong></span></td>
                      <td colspan="2"><input type="text" id="txtSoPin" name="txtSoPin" style="height:25px;width:200px" /></td>
                    </tr>
                    <tr>
                      <td align="right"><span class="style19"><strong><strong>Số Serial :</strong> </span></td>
                      <td colspan="2"><span class="style13">
                        <input type="text" id="txtSoSeri" name="txtSoSeri" style="height:25px;width:200px" />
                      </span></td>
                    </tr>
                    <tr>				
                      <td height="60" colspan="3" align="center" style="padding-bottom:10px;padding-right:10px"><p><span class="style17"> 
                       </span>			                               
  							  <input type="submit" id="Submit" name="NLNapThe" value="NẠP THẺ" class="Accept"/>
		                      <input class="NotAccept" name="reset" value="NHẬP LAI" type="reset"/></p>								  
                    </tr>
                  </table>
              </div>
	  
<!--div class="StaticMain">
    <div class="ContentBlock">
	<img class="magnify" magnifyby="3" style="width: 250px; height: 175px;" src="http://volamviet.biz/images/banggia.jpg" alt="" border="0" />     
    </div>
</div-->	
<script type="text/javascript">/*<![CDATA[*/
 	var activemenu_nav = "menu_1_0";
   	var activesidenav = "menu1";
 /*]]>*/
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("input[type=radio]").click(function () {
                var title = $(this).attr("title");
                var box = "#mang-" + title;
                var mang = "check" + title;
                $("#chonmang div").not(box).removeClass('active');
                $(box).addClass('active');
                var check = box + " #check" + title;
                $(check).removeClass('hide');
                $("#chonmang div div").not(check).removeClass('show');
                $("#chonmang div div").not(check).addClass('hide');
                $(box).addClass('show');
            });
        });
</script>

<script type="text/javascript">
		function reload() {
           var img = new Image();
            img.src = "captcha.php";
           var x = document.getElementById('imgcaptchahinh');
           x.src = img.src;
       };
</script>
</div>
	
<!-- CODE KHUNG CHAT WEB  -->
<script lang="javascript">
(function() {var _h1= document.getElementsByTagName('title')[0] || false;
var product_name = ''; if(_h1){product_name= _h1.textContent || _h1.innerText;}var ga = document.createElement('script'); ga.type = 'text/javascript';
ga.src = '//live.vnpgroup.net/js/web_client_box.php?hash=1fc4ac53d6788b221c17b8d9d7a975ab&data=eyJoYXNoIjoiNjk5NDg5NjYyYWRlOWMwYmQ2ZDFmYzYzNDAwZTk2NDEiLCJzc29faWQiOjIyMjgwODJ9&pname='+product_name;
var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();
</script>
<script type="text/javascript">// <![CDATA[
var activemenu_nav = "menu3_0_0";
// ]]></script>    </div>			    
		       </div>
	        </div>
          </div>
        </div>
    </div>
</div>
<!-- Begin block Main_Footer_MainFooter - MTkyfE1haW5fRm9vdGVyfDU2N3xzdS1raWVuX21pbml8TWFpbkZvb3RlcnxIVE1M --><div id="footer">
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
</div><!-- End block Main_Footer_MainFooter --> 
<script type="text/javascript" src="img.zing.vn/eventgame/intro/general/js/mainsite.js?v=2.5"></script> 
<script type="text/javascript" src="img.zing.vn/eventgame/intro/general/topbar-zone/call-topbar-zone-jx1.js"></script> 
<script type="text/javascript" src="img.zing.vn/volamthuphi/skin/mini_subweb_022011/js/jx1minisub.js"></script> 
<script type="text/javascript" src="img.zing.vn/volamthuphi/js/widget-login-jx1.js"></script> 
<script type="text/javascript" src="img.org.vcdn.vn/volamthuphi/skin/jxthuphi_2014_06_minisub/js/jTopslide.js"></script> 
<script type="text/javascript" src="img.org.vcdn.vn/volamthuphi/skin/jxthuphi_2014_06_minisub/js/common.js"></script> 
<script type="text/javascript">	
	//varables for tracking
	var SITE_URL = "http://volamviet.biz";
	var IMG_URL = "img.zing.vn/volamthuphi";
	var res = activemenu_nav.substr(4, 1) - 1;
	jQuery("ul#sidenavMenu > li").eq(res).addClass("Hilite");	
</script>
<div id="advTopBar1_temp" style="z-index: 1000; display: none; left: 141.5px; top: 70px;">
	<script type="text/javascript">
    	objAds.showBannerTopBar1();
    </script>
</div>
<!-- EXCEPTION --> 
<!-- END. EXCEPTION -->


<!-- Begin block social-like-plugin_social-like-plugin - MTg2fHNvY2lhbC1saWtlLXBsdWdpbnw1Njd8c3Uta2llbl9taW5pfHNvY2lhbC1saWtlLXBsdWdpbnxIVE1M -->

<div class="plugin-social-block-p" style="margin:20px"><div id="popup-social-sub"><div class="block-social"><div class="share-block-social"><span class="title">Like và Share Fanpage mọi người nhé!</span></div><div class="like-block-social"><div class="group-facebook"><div class="btn-fb-like-social"><div class="fb-like fb-link-href" data-href="#" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div><div id="fb-root"></div></div><div class="btn-fb-share-social" title="Share"><div class="pluginButtonImage"><span class="pluginButtonIcon img sp_plugin-button sx_plugin-button_favblue"></span></div><span class="pluginButtonLabel">Share</span></div><div class="btn-custom-like"></div><div id="zme-root"></div></div></div></div></div></div>

<!-- End block social-like-plugin_social-like-plugin -->
<script type="text/javascript" src="img.zing.vn/eventgame/intro/general/js/socialPlugin-vr4.js?vr=3"></script> 
<script>
	$(document).ready(function() {
		showPopupSocial.init({
			RelativeID: 'popup-social-home',
			typePage: 'subpage'
		});
		if($(".plugin-social-block-p").size()) {
			$(".StaticInner h3").before($(".plugin-social-block-p"));
		}
	})
	
var width = window.innerWidth || document.body.clientWidth;
var height = window.innerHeight || document.body.clientHeight;
width  = Math.round(width/10)*10;
height = Math.round(height/10)*10; //Using a 10 pixel granularity
var size = width + "x" + height;
_gaq.push(['_trackEvent', 'Browser Size', 'Range', size,, true]); //don't count in Bounce Rate
</script>
<!--CODE CSS RÊ CHUỘT PHÓNG TO ẢNH-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://www.yourjavascript.com/560192341/magnifier.txt.js"></script>
</head>
</body>
</html>