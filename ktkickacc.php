<?php
session_start();
include_once("cauhinh.php");
  
	$id = intval($_SESSION['user_id']);
	$on=$_POST['on'];
	$off=$_POST['off'];
	$ketnoi=mssql_connect($host,$user,$pass) or die ("Khong ket noi duoc voi server");
	$link=mssql_select_db("account",$ketnoi) or die ("Khong ket noi duoc voi database");
	$sql="SELECT iClientID FROM Account_Info WHERE iClientID=4 AND iid='$id'";
	$row=mssql_query($sql,$ketnoi);
	$num_row=mssql_num_rows($row);
	if ($num_row==1)
	{
		$sql="UPDATE Account_Info SET iClientID=0 WHERE iid='$id'";
		mssql_query($sql,$ketnoi)or die ("Khong the thuc hien query");
		mssql_close($ketnoi);
		echo "<script language=Javascript1.1>alert(\"Bạn đã Giãi Kẹt Tài Khoản thành công.Quay về trang quản lý...\");</script>";
		echo("<script language='JavaScript'>window.top.location='taikhoan.php';</script>"); 
	}
	else
	{
		echo "<script language=Javascript1.1>alert(\"Giãi Kẹt Tài Khoản thất bại. Tài khoản của bạn không bị kẹt.\");</script>";
		echo("<script language='JavaScript'>window.top.location='kickacc.php';</script>"); 
	}
?>