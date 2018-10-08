<?php
$host="192.168.1.14"; // Địa chỉ IP Sever, tên seve SQL - mặc định 127.0.0.1
$user="sa"; // Tài khoản truy cập MsSQL - mặc định "sa"
$pass="password!12@"; // Mật khẩu truy cập MsSQL - mặc định để trống
$tenweb="VO LAM MIEN PHI";
//$link=mssql_connect($host,$user,$pass) or die ("Khong the ket noi den server");
//mssql_select_db('account',$link);

// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.

$connectionInfo = array( "Database"=>"account", "UID"=>$user, "PWD"=>$pass);
$conn = sqlsrv_connect( $host, $connectionInfo);

if( $conn ) {
    echo "Connection established.<br />";
}else{
    echo "Connection could not be established.<br />";
    die( print_r( sqlsrv_errors(), true));
}

?>