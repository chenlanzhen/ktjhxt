<?php
	header("Access-Control-Allow-Origin:*");
	error_reporting(0);
	@$upsno = $_REQUEST['upsno'];
	@$upsname = $_REQUEST['upsname'];
	@$upsage = $_REQUEST['upsage'];
	@$upssex = $_REQUEST['upssex'];
	@$upsclass = $_REQUEST['upsclass'];
	include("conn.php");
	$updateSql = "update stu_info set sname='$upsname',sage=$upsage,ssex='$upssex',sclass='$upsclass' where sno = $upsno";
	mysqli_query($conn,$updateSql);
	echo $upsno;
?>