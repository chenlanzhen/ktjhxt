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
	$sql = "select * from stu_info where sno = $userid";
	if(mysqli_query($conn,$sql)){
		$sqlInsert = "insert into message_info(stuid,stuname,class,courseid,coursename,postmessage,posttime) value('$userid','$username','$class','$courseid','$coursename','$postMessage','$postTime')";
		echo "dui";
	}else{
		$sqlInsert = "insert into message_info(teaid,teaname,class,courseid,coursename,postmessage,posttime) value('$userid','$username','$class','$courseid','$coursename','$postMessage','$postTime')";
		echo "cuo";
	}
	// $arr = array("userid"=>$userid,"username"=>$username,"class"=>$class,"courseid"=>$courseid,"coursename"=>$coursename,"postmessage"=>$postMessage,"posttime"=>$postTime);
	$res = mysqli_query($conn,$sqlInsert);
	if($res){
		$result = array("msg"=>"200");
		echo json_encode($result);
	}else{
		$result = array("msg"=>"203");
		echo json_encode($result);
	}
		
		// echo $arr;
		
	mysqli_close($conn);
 ?>