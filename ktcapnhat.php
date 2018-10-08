<?php
session_start();
include_once("cauhinh.php");
    $taikhoan=$_POST['taikhoan'];
	$ten=$_POST['ten'];
	$fone=$_POST['fone'];
	$cauhoi=$_POST['cauhoi'];
    $traloi = $_POST['traloi'];
    $email = $_POST['email'];
	
	$ketnoi=mssql_connect($host,$user,$pass) or die ("Không kết nối được với sever");
	$link=mssql_select_db("account",$ketnoi) or die ("Không kết nối được với database");
	@mssql_query("SET NAMES 'utf8'");
	$sql="select * from Account_Info where cAccName='$taikhoan'";
	$row=mssql_query($sql,$ketnoi);
	$num_row=mssql_num_rows($row);
	if ($num_row==1)
	{
		$sql="UPDATE Account_Info SET cRealName='$ten', cPhone='$fone', cQuestion='$cauhoi', cAnswer='$traloi', cEMail='$email' WHERE cAccName='$taikhoan'";
		mssql_query($sql,$ketnoi)or die ("Cập nhật thông tin thành công.Quay về trang quản lý.");
		mssql_close($ketnoi);
		echo "<script language=Javascript1.1>alert(\"Bạn đã cập nhật thông tin thành công.Quay về trang quản lý.\");</script>";
		echo("<script language='JavaScript'>window.top.location='taikhoan.php';</script>"); 
	}
	else
	{
		echo "<script language=Javascript1.1>alert(\"Lỗi cập nhật...Có thể Server đang bảo trì vui lòng quay lại sau!\");</script>";
		echo("<script language='JavaScript'>window.top.location='index.html';</script>"); 
		
	}

?>
