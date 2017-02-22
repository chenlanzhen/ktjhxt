<?php
	header("Access-Control-Allow-Origin:*");
	error_reporting(0);
	@$uptno = $_REQUEST['uptno'];
	@$uptname = $_REQUEST['uptname'];
	@$uptage = $_REQUEST['uptage'];
	@$uptsex = $_REQUEST['uptsex'];
	@$uptinstitute = $_REQUEST['uptinstitute'];
	include("conn.php");
	$updateSql = "update tea_info set tname='$uptname',tage=$uptage,tsex='$uptsex',tinstitute='$uptinstitute' where tno = $uptno";
	mysqli_query($conn,$updateSql);
	echo $uptno;
?>