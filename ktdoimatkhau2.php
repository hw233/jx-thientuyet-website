<?php
session_start();
include_once("cauhinh.php");
include_once("mahoa.php");

	$taikhoan=$_POST['username'];
	$matkhau=$_POST['Password'];
	$matkhaumoi=$_POST['Password2'];
	sqlsafe($taikhoan);
	sqlsafe($matkhau);
	sqlsafe($matkhaumoi);
	$matkhau=md5($matkhau);
	$matkhau=strtoupper($matkhau);
	$matkhaumoi=md5($matkhaumoi);
	$matkhaumoi=strtoupper($matkhaumoi);
	$ketnoi=mssql_connect($host,$user,$pass) or die ("Khong ket noi duoc voi server");
	$link=mssql_select_db("account",$ketnoi) or die ("Khong ket noi duoc voi database");
	$sql="SELECT cAccName FROM Account_Info WHERE cAccName='$username' AND  cSecPassword='$matkhau'";
	$row=mssql_query($sql,$ketnoi);
	$num_row=mssql_num_rows($row);
	if ($num_row==1)
	{
		$sql="UPDATE Account_Info SET cSecPassword='$matkhaumoi' WHERE cAccName='$taikhoan'";
		mssql_query($sql,$ketnoi)or die ("Khong the thuc hien query");
		mssql_close($ketnoi);
		echo "<script language=Javascript1.1>alert(\"Bạn đã đổi mật khẩu thành công.\");</script>";
		echo("<script language='JavaScript'>window.top.location='index2.php';</script>"); 
	}
	else
	{
		echo "<script language=Javascript1.1>alert(\"Bạn đã nhập sai tên hoặc mật khẩu\");</script>";
		echo("<script language='JavaScript'>window.top.location='doimatkhau2.php';</script>"); 
	}
?>