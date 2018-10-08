<?php
session_start();
?>
<?php
  ob_start();
  //Gọi file connection.php ở bài trước
  require_once("cauhinh.php");
  // Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
  if (isset($_POST["btn_submit"])) {
    // lấy thông tin người dùng
    $username = $_POST["username"];
    $password = $_POST["password"];

    //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
    //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password);
    $password = addslashes($password);
    $password = md5($password);
    if ($username == "" || $password =="") {
      //echo "username hoặc password bạn không được để trống!";
      echo "<script language=Javascript1.1>alert(\"Bạn chưa nhập đủ thông tin đăng nhập.\");</script>";
    }else{
      $sql = "select * from Account_Info where cAccName = '$username' and cPassWord = '$password' ";
      //$query = mysqli_query($conn,$sql);
      $query = mssql_query($sql);
      //$num_rows = mysqli_num_rows($query);
      $num_rows = mssql_num_rows($query);
      if ($num_rows==0) {
        echo "<script language=Javascript1.1>alert(\"Thông tin đăng nhập chưa đúng.\");</script>";
      }else{
        //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
        $_SESSION['username'] = $username;
                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
                header("Location: index.php");
      }
    }
  }

ob_end_flush();
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Công Thành Chiến - Võ Lâm Truyền Kỳ I - Đăng ký tài khoản game</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<!--

-->



<link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />
<link href="css/formdangnhap.css" rel="stylesheet" type="text/css" />
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
                <li><a href="../dangky"><span></span>Đăng ký</a>
                
                    <!--
                    <ul>
                        <li><a href="#">Sub menu 1</a></li>
                        <li><a href="#">Sub menu 2</a></li>
                        <li><a href="#">Sub menu 3</a></li>
                  </ul>-->
              </li>
                <li><a href="http://home.ctcvolam.com/huong-dan-3/154-huong-dan-tai-va-cai-dat-vo-lam-truyen-ky" target="_new"><span></span>Tải game</a>
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
                <li><a href="https://www.facebook.com/congthanhchienvolam/" target="_blank"><span>Fanpage</span></a></li>
                <li><a href="#"><span></span>Nạp thẻ</a></li>
            </ul>
            <br style="clear: left" />
        </div> <!-- end of tooplate_menu -->
        
        <div id="site_title"><h1><a href="#">Đăng ký tài khoản</a></h1></div>
         <!--Begin Slider
         <div id="tooplate_slider">
            <div id="flash_grid_slider">
                <a href="http://www.adobe.com/go/getflashplayer">
                    <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
                </a>
            </div>
        </div>
        End Slider-->
    	



    <form method="POST" action="login.php" id="formdangnhap">
  <fieldset>
      <legend>Đăng nhập</legend>
        <table>
          <tr>
            <td><b>Tên tài khoản</b></td>
            <td><input type="text" name="username" size="30"></td>
          </tr>
          <tr>
            <td><b>Mật khẩu</b></td>
            <td><input type="password" name="password" size="30"></td>
          </tr>
          <tr>
            <td colspan="2" align="center"> <input name="btn_submit" type="submit" value="Đăng nhập tài khoản" id="btndangnhap"></td>
          </tr>
          
        </table>
  </fieldset>
  
  </form>
  

  <style type="text/css">
  .resetpass{
    color:red;
    font-size:16px;
    font-weight:italic;
    padding-left:454px;
  }
  .luuy{
    color:black;
    font-size:13px;
    font-weight:italic;
    padding-left:330px;
  }
</style>
  <div class="resetpass">
    <tr>
      <td colspan="2" align="center" ><p class="fontawesome-cogs"><a href="forgot_password.php?action=reset"><b>&nbsp;Quên mật khẩu</b></a></p></td>
      
    </tr>
  </div>
  <div class="luuy"><p class="fontawesome-signin"><b><i><u>&nbsp;Lưu ý: </u>Bạn phải ghi nhớ mật khẩu cấp 2 để lấy lại mật khẩu.</i></b></p></div>


<!--<object style="position:fixed; top:120px; left:0; idne" width="600" height="500"> <embed src="http://img.zing.vn/volamthuphi/images/landing-page/2015/02-quy-doi-tien-dong/swf/flash.swf" width="600" height="500" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" menu="false" wmode="transparent"><param name="wmode" value="transparent"></object>-->




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