<?php 
session_start();
if (!isset($_SESSION['username'])) {
   header('Location: http://ctcvolam.com/dangnhap');
}

?>
<html>
<head>
    <title>Nạp thẻ</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="author" content="vippay.vn"/>
    <meta name="description" content="Thanh toán trực tuyến"/>
    <!-- css -->
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<link rel="shortcut icon" href="http://img.zing.vn/volamthuphi/images/icon.ico"/>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
          integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
      <link rel="stylesheet" href="css/style.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.1/jquery.form.min.js"></script>

    <style type="text/css">
        table tr td {
            border: none !important;
            vertical-align: middle
        }
    </style>

    <script>
        $(document).ready(function () {
            // nap the
            $("#fnapthe").ajaxForm({
                dataType: 'json',
                url: 'ajax/card.php',
                beforeSubmit: function () {
                    $("#loading_napthe").show();
                },
                success: function (data) {
                    if (data.code == 0) {
                        $("#fnapthe").resetForm();
                        $("#msg_napthe").html('<div class="alert alert-success">' + data.msg + '</div>');
                    }
                    else {
                        $("#msg_napthe").html('<div class="alert alert-danger">' + data.msg + '</div>');
                    }
                    $("#loading_napthe").hide();
                    $("#captcha").attr('src', 'captcha/CaptchaSecurityImages.php?' + Math.random());
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    $("#msg_napthe").html('<div class="alert alert-danger">Có lỗi trong quá trình thực hiện</div>');
                    $("#loading_napthe").hide();
                    $("#captcha").attr('src', 'captcha/CaptchaSecurityImages.php?' + Math.random());
                }
            });
        });
    </script>
</head>
<body>

<div class="body"> </div>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <!-- Nav -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                <span class="sr-only">Menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../">Quản lý tài khoản</a>
        </div>
        <!-- Nav collapse -->
        <div class="collapse navbar-collapse" id="menu">
            <ul class="nav navbar-nav">
                <li>
                    <a href="http://ctcvolam.com" target="_new"><b>Trang chủ</b></a>
                </li>
                <li>
                    <a href="http://home.ctcvolam.com/" target="_new"><b>Tin Tức</b></a>
                </li>
                <li>
                    <a href="http://home.ctcvolam.com/huong-dan-3/154-huong-dan-tai-va-cai-dat-vo-lam-truyen-ky" target="_new"><b>Tải game</b></a>
                </li>
                <li>
                    <a href="https://www.facebook.com/congthanhchienvolam/" target="_new"><b>Fanpage</b></a>
                </li>
            </ul>
 
            <div class="navbar-right">
                <button class="btn btn-danger navbar-btn">Hotline: 0973966788</button>
                
            </div>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<!-- /Navigation -->

<div style="margin: 0 auto; width: 500px;">
    <form action="#" method="post" id="fnapthe">
        <table class="table table-responsive">
            <tbody>
            <tr>
                <td colspan="2">
                    <div id="msg_napthe"></div>
                </td>
            </tr>
            <tr>
                <td>Tên TK game:</td>
                <!--<td><input type="text" value="" name="txtUser"  class="form-control"/></td>-->
                <td><?php echo $_SESSION['username'];  ?></td>
            </tr>
            <tr>
                <td>Loại thẻ:</td>
                <td>
                    <select name="card_type_id" class="form-control">
                        <option value="1">Viettel</option>
                        <option value="2">Mobiphone</option>
                        <option value="3">Vinaphone</option>
                        <option value="4">Gate</option>
                        <option value="5">VTC-Vcoin</option>
                        <option value="10">Vietnammobi</option>
                        <option value="11">Zing</option>
						<option value="14">OnCash</option>
                        <option value="16">BitCard</option>
                        <option value="17">Megacard</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Mã thẻ:</td>
                <td><input type="text" value="" name="pin"  class="form-control" autocomplete="off"/></td>
            </tr>
            <tr>
                <td>Seri thẻ:</td>
                <td><input type="text" value="" name="seri" class="form-control" autocomplete="off"/></td>
            </tr>
            <tr>
                <td>Mã bảo mật:</td>
                <td>
                    <input type="text" id="ma_bao_mat" name="ma_bao_mat" class="form-control" style="  width: 100px; float: left;  margin-right: 10px;" autocomplete="off"/>
                    <img src="captcha/CaptchaSecurityImages.php?height=28" id="captcha"/>
                    <img src="images/refresh.png" style="position: relative; left: 12px; top: -1px; cursor: pointer;"
                         onclick="document.getElementById('captcha').src='captcha/CaptchaSecurityImages.php?height=28&'+Math.random();"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input class="btn btn-info" type="submit" value="Nạp thẻ"/>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript: void(0);" onclick=" javascript:OpenPopup('http://ctcvolam.com/dangnhap/napthe/chuyenkhoan.html','WindowName','480','270','scrollbars=1');" class="btn btn-danger navbar-btn" >Nạp thẻ qua ngân hàng nhận thêm 20% giá trị thẻ nạp</a>
                    <div id="loading_napthe" style="display: none; float: right"><img src="images/loading.gif"/> &nbsp;Xin
                        mời chờ...
                    </div>
                </td>
            </tr>
            
            
            </tbody>
        </table>
    </form>
</div>
<style type="text/css">
             .tieude{
                color:red;
                font-weight: bold;
             }
            </style>

<div style="margin: 0 auto; width: 500px;">
    <table  border="0" class="table table-responsive">
        <tbody>
        <tr>
            <td>
                <p class="tieude">BẢNG GIÁ NẠP THẺ</p>
            </td>
        </tr>
        <tr>
        <td><b>10.000 VNĐ</b> đổi được <b>1</b> KNB.</td>
        <td><b>20.000 VNĐ</b> đổi được <b>2</b> KNB.</td>
        </tr>
        <tr>
        <td><b>50.000 VNĐ</b> đổi được <b>5</b> KNB.</td>
        <td><b>100.000 VNĐ</b> đổi được <b>11</b> KNB.</td>
        </tr>
        <tr>
        <td><b>200.000 VNĐ</b> đổi được <b>23</b> KNB.</td>
        <td><b>500.000 VNĐ</b> đổi được <b>60</b> KNB.</td>
        </tr>
        
        </tbody>
    </table>
    <tr>
        <td><b><i><font color="red">LƯU Ý: </font></i></b>Nếu gặp bất kỳ lỗi gì trong quá trình nạp thẻ, hãy lưu giữ lại thẻ gốc và gửi khiếu nại lên BQT, chúng tôi sẽ giải quyết nhanh nhất có thể.</td>
        </tr>
		<!--<center>
			<td>
		<br><a href="../" class="btn btn-info">Quay lại trang chủ</a>
			</td>
		</center>-->
</div>
<!--<script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",66124]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script>
-->
<!--Start FB Chat-->
<div id="fb-root"></div>
  <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
  <style>#cfacebook{position:fixed;bottom:0px;right:10px;z-index:999999999999999;width:250px;height:auto;box-shadow:6px 6px 6px 10px rgba(0,0,0,0.2);border-top-left-radius:5px;border-top-right-radius:5px;overflow:hidden;}#cfacebook .fchat{float:left;width:100%;height:270px;overflow:hidden;display:none;background-color:#fff;}#cfacebook .fchat .fb-page{margin-top:-130px;float:left;}#cfacebook a.chat_fb{float:left;padding:0 25px;width:250px;color:#fff;text-decoration:none;height:35px;line-height:35px;text-shadow:0 1px 0 rgba(0,0,0,0.1);background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAqCAMAAABFoMFOAAAAWlBMV…8/UxBxQDQuFwlpqgBZBq6+P+unVY1GnDgwqbD2zGz5e1lBdwvGGPE6OgAAAABJRU5ErkJggg==);background-repeat:repeat-x;background-size:auto;background-position:0 0;background-color:#2e6da4;border:0;border-bottom:1px solid #133783;z-index:9999999;margin-right:12px;font-size:18px;}#cfacebook a.chat_fb:hover{color:yellow;text-decoration:none;}</style>
  <script>
  jQuery(document).ready(function () {
  jQuery(".chat_fb").click(function() {
jQuery('.fchat').toggle('slow');
  });
  });
  </script>
  <div id="cfacebook">
  <a href="javascript:;" class="chat_fb" onclick="return:false;"><i class="fa fa-facebook-square"></i>Liên hệ với GM</a>
  <div class="fchat">
  <div class="fb-page" data-tabs="messages" data-href="https://www.facebook.com/congthanhchienvolam/" data-width="250" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
  </div>
  </div>
  <!--End FB Chat-->
 <!--Start Nạp thẻ ngân hàng popup-->
 <script type="text/javascript">
//<![CDATA[
function OpenPopup(Url,WindowName,width,height,extras,scrollbars) {
var wide = width;
var high = height;
var additional= extras;
var top = (screen.height-high)/2;
var leftside = (screen.width-wide)/2; newWindow=window.open(''+ Url + 
'',''+ WindowName + '','width=' + wide + ',height=' + high + ',top=' + 
top + ',left=' + leftside + ',features=' + additional + '' + 
',scrollbars=1');
newWindow.focus();
}
//]]>
</script>
  <!--End Nạp thẻ ngân hàng popup-->
  </body>
</html>

