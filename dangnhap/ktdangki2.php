<?php
session_start();
include_once("cauhinh.php");
include_once("mahoa.php");

if (!isset($_SESSION['ma']))
{
	echo "<script language=Javascript1.1>alert(\"Truy cập bị từ chối.\");</script>";
	echo("<script language='JavaScript'>window.top.location='dangki.php';</script>"); 
	exit;
}
else
{
	$taikhoan=$_POST['Username'];
	$email=$_POST['Email'];
	$ten=$_POST['Name'];
$pas = $_POST['Password'];
$pas1 = md5($pas);
	$matkhau=strtoupper($pas1);

$pas2 = $_POST['Password'];
$pass2 = md5($pas2);
	$matkhau2=strtoupper($pass2);
	
	$fone=$_POST['Fone'];
	$ma=$_POST['txtVerify'];
	sqlsafe($taikhoan);
	sqlsafe($email);
	sqlsafe($matkhau);
	sqlsafe($ma);
}
if ($ma<>$_SESSION['ma'])
	{
		echo "<script language=Javascript1.1>alert(\"Bạn đã nhập sai mã bảo vệ. Quay về trang đăng kí...\");</script>";
		echo("<script language='JavaScript'>window.top.location='dangky.php';</script>"); 
		exit; 
	}
	else
{
	$ketnoi=mssql_connect($host,$user,$pass) or die ("Không kết nối được với sever");
	$link=mssql_select_db("account",$ketnoi) or die ("Không kết nối được với database");
	$sql="select cAccName from Account_Info where cAccName='$taikhoan'";
	$row=mssql_query($sql,$ketnoi);
	$num_row=mssql_num_rows($row);
	if ($num_row==0)
	{
		$sql="INSERT INTO Account_Info(cAccName,cPassWord,cPhone,cEMail,cRealName,dRegDate) VALUES ('$taikhoan','$matkhau','$fone','$email','$ten','10/10/2000 10:10:10 AM');";
		mssql_query($sql,$ketnoi)or die ("Đăng ký thông tin không thành công");
		$sql="INSERT INTO Account_Habitus(cAccName,iFlag,iLeftSecond,nExtPoint,dBeginDate,iLeftMonth,dEndDate) VALUES('$taikhoan','0','999','999','1/1/2010 3:17:04 PM','999','10/10/2020 10:10:10 AM');";
		mssql_query($sql,$ketnoi)or die ("Đăng ký thông tin không thành công");
		mssql_close($ketnoi);
		echo "<script language=Javascript1.1>alert(\"Bạn đã đăng kí thành công. Chuyển đến trang đăng nhập...\");</script>";
		echo("<script language='JavaScript'>window.top.location='login.php';</script>"); 
	}
	else
	{
		echo "<script language=Javascript1.1>alert(\"Tài khoản đã được sử dụng. Quay về trang đăng kí...\");</script>";
		echo("<script language='JavaScript'>window.top.location='dangki.php';</script>"); 
		
	}
}
?>
