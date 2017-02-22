<?php
	header("Access-Control-Allow-Origin:*");
	error_reporting(0);
	@$tno = $_REQUEST['tno'];
	@$tname = $_REQUEST['tname'];
	@$tage = $_REQUEST['tage'];
	@$tsex = $_REQUEST['tsex'];
	@$tinstitute = $_REQUEST['tinstitute'];
	include("conn.php");
	$insertSql = "insert into tea_info value('$tno','$tname','$tage','$tinstitute','$tsex')";
	mysqli_query($conn,$insertSql);
	echo $tno.$tname.$tage.$tsex.$tinstitute;
?>