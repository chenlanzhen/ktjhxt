<?php 
	session_start();
	include("conn.php");
	@$userid = $_REQUEST['userid'];
	@$username = $_REQUEST['username'];
	@$class = $_REQUEST['class'];
	@$courseid = $_REQUEST['courseid'];
	@$coursename = $_REQUEST['coursename'];
	@$postMessage = $_REQUEST['postMessage'];
	@$postTime = $_REQUEST['postTime'];
	$sqlInsert = "insert into message_info(stuid,stuname,class,courseid,coursename,postmessage,posttime) value('$userid','$username','$class','$courseid','$coursename','$postMessage','$postTime')";
	mysqli_query($conn,$sqlInsert);
	$arr = array("userid"=>$userid,"username"=>$username,"class"=>$class,"courseid"=>$courseid,"coursename"=>$coursename,"postmessage"=>$postMessage,"posttime"=>$postTime);
	// echo $arr;
	echo json_encode('JSON'=>$arr);
	// echo $userid.$username.$class.$courseid.$coursename.$postMessage.$postTime;
 ?>