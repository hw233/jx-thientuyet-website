<?php
session_start();
include_once('cauhinh.php');
include_once('mahoa.php');
$search_query=$_POST['search_query']


$query= mssql_query("SELECT * FROM Account_Info WHERE cAccName LIKE '$search_query'");



$result= mssql_num_rows($query);

if ($result == 0)

{

echo 'Khong tim thay ten thanh vien nay $search_query';

exit;

}

else if ($result == 1)

{

echo 'Tim thay 1 san pham';

}

else {

echo 'Tim thay $result san pham';

}

while ($row= mssql_fetch_array($query))

{

$username= $row['cAccName'];

echo 'The first name of the user is: $username';


}

?> 