<?php
session_start();
include_once("cauhinh.php");
include_once("config.php");
include_once("mahoa.php");

if (!isset($_SESSION['ma']))
{
	echo "<script language=Javascript1.1>alert(\"Truy cập bị từ chối.\");</script>";
	echo("<script language='JavaScript'>window.top.location='index.php';</script>"); 
	exit;
}
else
{
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
}
if ($ma<>$_SESSION['ma'])
	{
		echo "<script language=Javascript1.1>alert(\"Bạn đã nhập sai mã bảo vệ. Quay về trang đăng ký...\");</script>";
		echo("<script language='JavaScript'>window.top.location='index.php';</script>"); 
		exit; 
	}

// 2017-05-19 Added by caovietquoc for checking empty username
function is_valid_user($taikhoan){
	if(empty($taikhoan))
	{
		echo "<script language=Javascript1.1>alert(\"Tên đăng nhập không được để trống...\");</script>";
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
if( is_valid_passwords($pas,$pas2) && is_valid_user($taikhoan)){
	$ketnoi=mssql_connect($host,$user,$pass) or die ("Không kết nối được với sever");
	$link=mssql_select_db("account_tong",$ketnoi) or die ("Không kết nối được với database");
	$ketnoi_mysql = mysql_connect($server_host,$server_username,$server_password) or die ("Không kết nối được với sever");
	$link_mysql = mysql_select_db(login) or die ("Không kết nối được với database");
	$sql="select cAccName from Account_Info where cAccName='$taikhoan'";
	$sql_mysql = "select cAccName from user where cAccName = '$taikhoan";
	$row=mssql_query($sql,$ketnoi);
	$num_row=mssql_num_rows($row);
	if ($num_row==0)
	{
		$sql="INSERT INTO Account_Info(cAccName,cPassWord,cSecPassWord,nExtPoint,nExtPoint1,nExtPoint2,nExtPoint3,nExtPoint4,nExtPoint5,nExtPoint6,nExtPoint7) VALUES ('$taikhoan','$matkhau','$traloi','1','1','1','1','1','1','1','1');";
		mssql_query($sql,$ketnoi)or die ("Đăng ký thông tin không thành công");
		$sql="INSERT INTO Account_Habitus(cAccName,iLeftSecond,dEndDate) VALUES('$taikhoan','0','10/10/2050 10:10:10 AM');";
		mssql_query($sql,$ketnoi)or die ("Đăng ký thông tin không thành công");
		$sql = "INSERT INTO user(cAccName,cPassWord) VALUES ('$taikhoan','$matkhau')";
		mysql_query($sql,$ketnoi_mysql)or die ("Đăng ký thông tin không thành công");
		mssql_close($ketnoi);
		echo "<script language=Javascript1.1>alert(\"Bạn đã đăng ký thành công. Chuyển đến trang chủ...\");</script>";
		echo("<script language='JavaScript'>window.top.location='../trangchu';</script>"); 
	}
	else
	{
		echo "<script language=Javascript1.1>alert(\"Tên đăng nhập đã tồn tại. Chuyển đến trang đăng ký...\");</script>";
		echo("<script language='JavaScript'>window.top.location='index.php';</script>"); 
		
	}
}

?>
