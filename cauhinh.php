﻿<?php
$host="127.0.0.1"; // Địa chỉ IP Sever, tên seve SQL - mặc định 127.0.0.1
$user="sa"; // Tài khoản truy cập MsSQL - mặc định "sa"
$pass="123456789"; // Mật khẩu truy cập MsSQL - mặc định để trống  
$tenweb="Võ Lâm Truyền Kỳ";
$link=mssql_connect($host,$user,$pass) or die ("Khong the ket noi den server");
mssql_select_db('account_tong',$link); 

?>