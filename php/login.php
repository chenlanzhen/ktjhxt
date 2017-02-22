<?php
//开启session
	session_start();
	header("Access-Control-Allow-Origin:*");
	// error_reporting(0);
	@$userid = $_REQUEST['userid'];
	@$psw = $_REQUEST['pwd'];
	@$userType = $_REQUEST['userType'];

	$_SESSION["userid"] = $userid;

	include('conn.php');
	$checkSql = "select * from user_info where id = '$userid' and psw = '$psw' and userType = '$userType'";
	@$result = mysqli_query($conn,$checkSql);
	if ($res = mysqli_fetch_array($result)) {
		$_SESSION['login']['user'] = $res;
		$flag = $res['usertype'];
		// echo $a;
		if ($flag == "管理员") {
			echo "101";
		}else if ($flag == "教师"){
			echo "102";
		}else{
			echo "103";
		}
	}else{
		echo "100";
	}
?>