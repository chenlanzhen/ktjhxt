<?php
	header("Access-Control-Allow-Origin:*");
	error_reporting(0);
	@$deleteKey = $_REQUEST['deleteKey'];
	include("conn.php");
	$deleteSql = "delete from stu_info where sno = $deleteKey";
	mysqli_query($conn,$deleteSql);
	echo $deleteKey;
?>