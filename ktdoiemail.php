<?php
session_start();
include_once("cauhinh.php");
	$mailcu=$_POST['mailcu'];
	$mailmoi=$_POST['mailmoi'];
	
	$ketnoi=mssql_connect($host,$user,$pass) or die ("Khong ket noi duoc voi server");
	$link=mssql_select_db("account",$ketnoi) or die ("Khong ket noi duoc voi database");
	$sql="SELECT cEMail FROM Account_Info WHERE cEMail='$mailcu'";
	$row=mssql_query($sql,$ketnoi);
	$num_row=mssql_num_rows($row);
	if ($num_row==1)
	{
		$sql="UPDATE Account_Info SET cEMail='$mailmoi'";
		mssql_query($sql,$ketnoi)or die ("Khong the thuc hien query");
		mssql_close($ketnoi);
		echo "<script language=Javascript1.1>alert(\"Bạn đã đổi Email thành công.Quay về trang quản lý.\");</script>";
		echo("<script language='JavaScript'>window.top.location='taikhoan.php';</script>"); 
	}
	else
	{
		echo "<script language=Javascript1.1>alert(\"Bạn đã nhập sai Email hiện tại.Mời nhập lại.\");</script>";
		echo("<script language='JavaScript'>window.top.location='doiemail.php';</script>"); 
	}
?>