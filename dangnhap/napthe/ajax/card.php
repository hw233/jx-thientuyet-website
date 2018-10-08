<?php
session_start();
error_reporting(E_ALL^E_NOTICE);
error_reporting(E_ERROR);


include 'Vippay_API.php';

// lay thong tin tu vippay - muc tich hop website trong quan ly tai khoan
$merchant_id = 9273; // interger
$api_user = "27c8f368ff2d46ecb37db09beb22f9eb"; // string
$api_password = "12c90a7839754a5c9c2aadfa1e3e3677"; // string

// truyen du lieu the
$pin = $_POST['pin']; // string
$seri = $_POST['seri']; // string
$card_type = $_POST['card_type_id']; // interger
$ma_bao_mat = $_POST['ma_bao_mat'];
//$user = $_POST['txtUser'];
$username = $_SESSION['username']; // Added by caovietquoc for check user logged in
/**
 * Card_type = 1 => Viettel
 * Card_type = 2 => Mobiphone
 * Card_type = 3 => Vinaphone
 * Card_type = 4 => Gate
 * Card_type = 5 => VTC
 * Card_type = 10 => Vietnammobi
 * Card_type = 11 => Zing
 * Card_type = 14 => OnCash
 * Card_type = 16 => BitCard
 * Card_type = 17 => Megacard
 * 
**/

$card = "";
if($card_type == 1){
    $card = "Viettel";
}
else if($card_type == 2){
    $card = "Mobiphone";
}
else if($card_type == 3){
    $card = "Vinaphone";
}
else if($card_type == 4){
    $card = "Gate";
}
else if($card_type == 5){
    $card = "VTC-Vcoin";
}
else if($card_type == 10){
    $card = "Vietnammobile";
}
else if($card_type == 11){
    $card = "Zing";
}
else if($card_type == 14){
    $card = "OnCash";
}
else if($card_type == 16){
    $card = "BitCard";
}
else if($card_type == 17){
    $card = "Megacard";
}

/* Edited by caovietquoc for checking username - No need
if($user == null || $user == ""){
    echo json_encode(array('code' => 1, 'msg' => "Tài khoản game không thể trống."));
    exit();
}*/

if($pin == null || $pin == "" || $seri == null || $seri == ""){
    echo json_encode(array('code' => 1, 'msg' => "Mã thẻ hoặc số seri không thể trống."));
    exit();
}
if(strlen($pin) < 8 || strlen($seri) < 8 || strlen($pin) > 20 || strlen($seri) > 20){
    echo json_encode(array('code' => 1, 'msg' => "Độ dài mã thẻ hoặc số seri không hợp lệ."));
    exit();
}
// checm ma bao mat
if($ma_bao_mat != $_SESSION['code_security']) {
     echo json_encode(array('code' => 1, 'msg' => "Sai mã bảo mật. Vui lòng nhập lại"));
     exit();
}

$vippay_api = new Vippay_API();
$vippay_api->setMerchantId($merchant_id);
$vippay_api->setApiUser($api_user);
$vippay_api->setApiPassword($api_password);
$vippay_api->setPin($pin);
$vippay_api->setSeri($seri);
$vippay_api->setCardType(intval($card_type));
$vippay_api->setNote($_SERVER['HTTP_HOST'].' - '.$username);  // Ghi chu cua ban
$vippay_api->cardCharging();
$code = intval($vippay_api->getCode());
$info_card = intval($vippay_api->getInfoCard());
$error = $vippay_api->getMsg();


// nap the thanh cong
if($code === 0 && $info_card >= 10000) {

    //$dbhost = "localhost";
    //$dbuser = "root";
    //$dbpass = "xxxxx";
    //$dbname = "web";
    //$db = mysql_connect($dbhost, $dbuser, $dbpass) or die("cant connect db");
    //mysql_select_db($dbname, $db) or die("cant select db");
    
    // added by caovietquoc
    $host="127.0.0.1"; // Địa chỉ IP Sever, tên seve SQL - mặc định 127.0.0.1
	$user="sa"; // Tài khoản truy cập MsSQL - mặc định "sa"
	$pass="Dqvndclcq1!"; // Mật khẩu truy cập MsSQL - mặc định để trống  
	$link=mssql_connect($host,$user,$pass) or die ("Không thể kết nối đến máy chủ.");
	mssql_select_db('account_tong',$link) or die ("Không thể kết nối đến máy chủ.");
    // Added by caovietquoc for checking card info

    if($info_card == 10000){
    	$xu = 2;
		$moc=1;
    }
    else if ($info_card == 20000) {
    	$xu = 4;
		$moc=2;
    	}
    	else if ($info_card == 50000) {
    	$xu = 10;
		$moc=5;
    	}
	    	else if ($info_card == 100000) {
	    	$xu = 22;
			$moc=10;
	    	}
		    	else if ($info_card == 200000) {
		    	$xu = 46;
				$moc=20;
		    	}
			    	else if ($info_card == 500000) {
			    	$xu = 120;
					$moc=50;
			    	}
    //$sql = "UPDATE Account_Info SET nExtPoint1 = ".$nExtPoint1." +".$xu." where cAccName= '" .$user. "' ";

    //mssql_query($sql);
    	mssql_query("UPDATE Account_Info set nExtPoint1= nExtPoint1 + '" .$xu. "' WHERE cAccName='" .$username. "'");
		mssql_query("UPDATE Account_Info set nExtPoint2= nExtPoint2 + '" .$moc. "' WHERE cAccName='" .$username. "'");
    echo json_encode(array('code' => 0, 'msg' => "Nạp thẻ ".$card." thành công với mệnh giá " . $info_card. " vnđ."));
}
else {
    // get thong bao loi
    echo json_encode(array('code' => 1, 'msg' =>"Lỗi: ".$error));
}