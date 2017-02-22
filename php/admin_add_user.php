<?php
	header("Access-Control-Allow-Origin:*");
	error_reporting(0);
	@$uno = $_REQUEST['uno'];
	@$uname = $_REQUEST['uname'];
	@$utype = $_REQUEST['utype'];
	@$upsw = $_REQUEST['ssex'];
	include("conn.php");
	$insertSql = "insert into user_info value('$id','$username','$usertype','$psw')";
	mysqli_query($conn,$insertSql);
	echo $uno.$uname.$utype.$upsw;
?>