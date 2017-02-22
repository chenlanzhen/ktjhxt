<?php
	header("Access-Control-Allow-Origin:*");
	error_reporting(0);
	include("conn.php");
	// $page = isset($GET['page'])?$_GET['page']:1;
	$pagesize=5;
	$beginIndex = ($page-1)*4;
	$selSql = "select * from tea_info";
	@$result = mysqli_query($conn,$selSql);
	$teaArr = array();
	// $count=intval($result[0]);
	// $pagesum=ceil($count/$pagesize);
	$i = 0;
	while($res = mysqli_fetch_array($result)) {
		$teaArr[$i] = $res;
		$i++;
	}
	echo json_encode(array('teaJSON'=>$teaArr));
?>