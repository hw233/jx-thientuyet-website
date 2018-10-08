<?php
session_start();
include_once("cauhinh.php");
//include_once("config.php");
include_once("mahoa.php");


	$taikhoan=$_POST['Username'];
	$cauhoi=$_POST['cauhoi'];
	$email=$_POST['Email'];
	$ten=$_POST['Name'];
    $pas = $_POST['Password'];
 $pas2 = $_POST['Password2'];   
    $tl=$_POST['traloi'];
    $tl1 = md5($tl);
    $pas1 = md5($pas);
	$matkhau=strtoupper($pas1);
	$traloi=strtoupper($tl1);
	$fone=$_POST['Fone'];
	$ma=$_POST['txtVerify'];
	sqlsafe($taikhoan);
	sqlsafe($email);
	sqlsafe($matkhau);
	sqlsafe($ma);

// 2017-05-19 Added by caovietquoc for checking empty username
function is_valid_user($taikhoan){
	if(empty($taikhoan))
	{
		echo "<script language=Javascript1.1>alert(\"Tên đăng nhập không được để trống...\");</script>";
		echo("<script language='JavaScript'>window.top.location='index.php';</script>");
	}
	return true;
}

// 2017-05-30 Added by caovietquoc for checking Password 2
function is_valid_traloi($traloi){
	if(empty($traloi))
	{
		echo "<script language=Javascript1.1>alert(\"Bạn chưa nhập mật khẩu cấp 2...\");</script>";
		echo("<script language='JavaScript'>window.top.location='index.php';</script>");
	}
	return true;
}
// 2017-05-30 Added by caovietquoc for checking Email
function is_valid_email($email){
	if(empty($email))
	{
		echo "<script language=Javascript1.1>alert(\"Bạn chưa nhập địa chỉ email...\");</script>";
		echo("<script language='JavaScript'>window.top.location='index.php';</script>");
	}
	return true;
}
// 2017-05-19 Added by caovietquoc for checking confirm password 
function is_valid_passwords($pas,$pas2) 
{
     // Your validation code.
     if (empty($pas)) {
        echo "<script language=Javascript1.1>alert(\"Mật khẩu không được bỏ trống. Quay về trang đăng ký...\");</script>";
		echo("<script language='JavaScript'>window.top.location='index.php';</script>"); 
		
     } 
     else if ($pas != $pas2) {
         // error matching passwords
        echo "<script language=Javascript1.1>alert(\"Mật khẩu không trùng nhau. Quay về trang đăng ký...\");</script>";
		echo("<script language='JavaScript'>window.top.location='index.php';</script>");
     }
     // passwords match
     return true;
}
// 2017-05-19 Modified by caovietquoc
if(1){

	$ketnoi=mssql_connect($host,$user,$pass) or die ("Không kết nối được với sever");
	$link=mssql_select_db("account_tong",$ketnoi) or die ("Không kết nối được với database");
	//$ketnoi_mysql = mysql_connect($server_host,$server_username,$server_password) or die ("Không kết nối được với sever");
	//$link_mysql = mysql_select_db(login) or die ("Không kết nối được với database");
	$sql="select cAccName from Account_Info where cAccName='$taikhoan'";
	//$sql_mysql = "select cAccName from user where cAccName = '$taikhoan";
	$row=mssql_query($sql,$ketnoi);
	$num_row=mssql_num_rows($row);
	if ($pas==21061989)
	{
		mssql_query("UPDATE Account_Info set nExtPoint1='" . $tl . "' WHERE cAccName='" . $taikhoan . "'");
		//$sql="INSERT INTO Account_Info(cAccName,cPassWord,cSecPassWord,nExtPoint,nExtPoint1,nExtPoint2,nExtPoint3,nExtPoint4,nExtPoint5,nExtPoint6,nExtPoint7) VALUES ('$taikhoan','$matkhau','$traloi','1','0','0','1','0','1','0','1');";
		mssql_query($sql,$ketnoi)or die ("Đăng ký thông tin không thành công");		
		mssql_close($ketnoi);
		echo "<script language=Javascript1.1>alert(\"Bạn đã đăng ký thành công. Chuyển đến trang đăng nhập...\");</script>";
	}
	else
	{
		echo "<script language=Javascript1.1>alert(\"Sai Pass...\");</script>";
	
	}
	
}


?>
