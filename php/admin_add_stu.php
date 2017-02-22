<?php
	header("Access-Control-Allow-Origin:*");
	error_reporting(0);
	@$sno = $_REQUEST['sno'];
	@$sname = $_REQUEST['sname'];
	@$sage = $_REQUEST['sage'];
	@$ssex = $_REQUEST['ssex'];
	@$sclass = $_REQUEST['sclass'];
	include("conn.php");
	$insertSql = "insert into stu_info value('$sno','$sname','$sage','$sclass','$ssex')";
	mysqli_query($conn,$insertSql);
	echo $sno.$sname.$sage.$ssex.$sclass;
?>