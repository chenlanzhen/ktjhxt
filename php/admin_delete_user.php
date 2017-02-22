<?php
	header("Access-Control-Allow-Origin:*");
	error_reporting(0);
	@$deleteKey = $_REQUEST['deleteKey'];
	include("conn.php");
	$deleteSql = "delete from user_info where id = $deleteKey";
	mysqli_query($conn,$deleteSql);
	echo $deleteKey;
?>