<?php
session_start();
include_once("cauhinh.php");
include_once("mahoa.php");

	$username=$_POST['username'];
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
	$sql="SELECT cAccName FROM Account_Info WHERE cAccName='$username' AND  cPassWord='$matkhau'";
	$row=mssql_query($sql,$ketnoi);
	$num_row=mssql_num_rows($row);
	if ($num_row==1)
	{
		$sql="UPDATE Account_Info SET cPassWord='$matkhaumoi' WHERE cAccName='$username'";
		mssql_query($sql,$ketnoi)or die ("Khong the thuc hien query");
		mssql_close($ketnoi);
		echo "<script language=Javascript1.1>alert(\"Bạn đã đổi Mật Khẩu thành công.Quay lại trang quản lý.\");</script>";
		echo("<script language='JavaScript'>window.top.location='taikhoan.php';</script>"); 
	}
	else
	{
		echo "<script language=Javascript1.1>alert(\"Bạn đã nhập sai tên Tài Khoản hoặc Mật Khẩu. Xin hãy nhập lại.\");</script>";
		echo("<script language='JavaScript'>window.top.location='doimatkhau.php';</script>"); 
	}
?>