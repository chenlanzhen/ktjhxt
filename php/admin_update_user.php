<?php
	header("Access-Control-Allow-Origin:*");
	error_reporting(0);
	@$upuno = $_REQUEST['upuno'];
	@$upuname = $_REQUEST['upuname'];
	@$uputype = $_REQUEST['uputype'];
	@$upupsw = $_REQUEST['upupsw'];
	include("conn.php");
	$updateSql = "update user_info set username='$upuname',usertype=$uputype,psw='$upupsw' where id = $upuno";
	mysqli_query($conn,$updateSql);
	echo $upuno;
?>