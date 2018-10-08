<?php
session_start();
include_once("cauhinh.php");
include_once("mahoa.php");
	$taikhoan=$_POST['username'];
	$cauhoi=$_POST['cauhoi'];
	$traloi=$_POST['traloi'];
	$email=$_POST['email'];
	$passmoi=$_POST['passmoi'];
	$passmoi1=md5($passmoi);
	$matkhaumoi=strtoupper($passmoi1);
	$ketnoi=mssql_connect($host,$user,$pass) or die ("Khong ket noi duoc voi server");
	$link=mssql_select_db("account",$ketnoi) or die ("Khong ket noi duoc voi database");
	$sql="SELECT cAccName FROM Account_Info WHERE cAccName='$taikhoan' AND  cEMail='$email' AND cQuestion='$cauhoi' AND cAnswer='$traloi'";
	$row=mssql_query($sql,$ketnoi);
	$num_row=mssql_num_rows($row);
	if ($num_row==1)
	{
		$sql="UPDATE Account_Info SET cPassWord='$matkhaumoi' WHERE cAccName='$taikhoan'";
		mssql_query($sql,$ketnoi)or die ("Khong the thuc hien query");
		mssql_close($ketnoi);
		echo "<script language=Javascript1.1>alert(\"Bạn đã lấy mật khẩu mới thành công\");</script>";
		echo("<script language='JavaScript'>window.top.location='login.php';</script>"); 
	}
	else
	{
		echo "<script language=Javascript1.1>alert(\"Bạn đã nhập sai tên tài khoản hoặc email.\");</script>";
		echo("<script language='JavaScript'>window.top.location='quenmatkhau.php';</script>"); 
	}
?>