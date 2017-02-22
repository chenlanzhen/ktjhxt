<?php 
	session_start();
	include("conn.php");
	// error_reporting(0);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/ketang.css">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<!-- <script type="text/javascript" src="../js/ketang.js"></script> -->
</head>
<body>
	<?php $courseid = $_GET["courseid"];
		$class = $_GET["class"];
		// echo $courseid;
		// echo $class;
		$sqlclass = "select coursename,teaname from course_info where courseid = '$courseid'";
		$res = mysqli_fetch_array(mysqli_query($conn,$sqlclass));
	 ?>
	 <header>
	 	<h2>欢迎来到<?php echo $class?>班的<?php echo $res['coursename'];?>课堂</h2>
	 </header>
	 <section>
	 	<div class="left">
	 		<div class="message"></div>
	 		<div class="contentPost">
	 			<form>
	 				<textarea id="text"></textarea>
	 				<input type="button" name="submit" value="发布" id="submit">
	 			</form>	 			
	 		</div>
	 	</div>
	 	<div class="right">
	 		<ul>
	 			<li><?php echo $res['teaname']; ?></li>
	 			<?php $sqls = "select sno,sname from stu_info where sclass = '$class'";
	 			$resultstu = mysqli_query($conn,$sqls);
	 			while($resstu=mysqli_fetch_array($resultstu)){
	 				?>
	 				<li><?php echo $resstu['sname']; ?></li>
	 				<?php } ?>
	 		</ul>
	 	</div>
	 </section>
</body>
<script type="text/javascript">
	$("#submit").click(function(){
		$text = $("#text").val();
		if(!$text){
			alert("发言框不能为空！");
		}else{
			
			$userid = <?php $userid = $_SESSION["userid"];echo $userid; ?>;
			<?php $sqlUserName = "select sname from stu_info where sno = '$userid'";
			$resultUserName = mysqli_fetch_array(mysqli_query($conn,$sqlUserName)); ?>
			$username = "<?php echo $resultUserName[0]; ?>";
			$class = "<?php echo $class; ?>";
			$courseid = <?php echo $courseid; ?>;
			$coursename = "<?php echo $res['coursename']; ?>";
			<?php  ?>
			$postTime = "<?php echo date('Y/m/d h:i:s',strtotime('now')); ?>";
			$courseid = <?php echo $courseid; ?>;
			$coursename = "<?php echo $res['coursename']; ?>";
			$postTime = "<?php echo date('Y/m/d h:i:s',strtotime('now')); ?>";
			
			$.post("postMessage.php",
			{
				userid:$userid,
				username:$username,
				class:$class,
				courseid:$courseid,
				coursename:$coursename,
				postMessage:$text,
				postTime:$postTime
			},function(data){
				alert(data['userid']);
			}).error(function(){
					alert("error");
			});
			 // alert($postTime);
			
		}

	});
</script>
</html>