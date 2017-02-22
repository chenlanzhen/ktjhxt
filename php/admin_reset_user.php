<?php
	header("Access-Control-Allow-Origin:*");
	error_reporting(0);
	@$resetKey = $_REQUEST['resetKey'];
	$psw = 123456;
	echo $psw;
	include("conn.php");
	$resetSql = "update user_info set psw='$psw' where id = $resetKey";
	mysqli_query($conn,$resetSql);
	echo $resetKey;
?>