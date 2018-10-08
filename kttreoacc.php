<?php
session_start();
include_once("cauhinh.php");
  
	$id = intval($_SESSION['user_id']);
	$on=$_POST['on'];
	$off=$_POST['off'];
	$ketnoi=mssql_connect($host,$user,$pass) or die ("Khong ket noi duoc voi server");
	$link=mssql_select_db("account",$ketnoi) or die ("Khong ket noi duoc voi database");
	$sql="SELECT iClientID FROM Account_Info WHERE iClientID=0 AND iid='$id'";
	$row=mssql_query($sql,$ketnoi);
	$num_row=mssql_num_rows($row);
	if ($num_row==1)
	{
		$sql="UPDATE Account_Info SET iClientID=4 WHERE iid='$id'";
		mssql_query($sql,$ketnoi)or die ("Khong the thuc hien query");
		mssql_close($ketnoi);
		echo "<script language=Javascript1.1>alert(\"Bạn đã Treo tài khoản thành công. Để mở tài khoản hãy Click vào Ngừng Treo Tài Khoản.\");</script>";
		echo("<script language='JavaScript'>window.top.location='treoacc.php';</script>"); 
	}
	else
	{
		echo "<script language=Javascript1.1>alert(\"Treo tài khoản thất bại. Tài khoản hiện đang Online hoặc đã Treo.\");</script>";
		echo("<script language='JavaScript'>window.top.location='treoacc.php';</script>"); 
	}
?>