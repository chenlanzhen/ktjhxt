<?php 
// 连接数据库
	header("Content-type: text/html; charset=utf-8");
	$conn=@mysqli_connect("localhost","root","123456");
	if(!$conn){
		die("连接数据库失败：".mysql_error());
	}
	// echo "mysql连接成功";
	mysqli_select_db($conn,"userdata");
?> 