<?php 
	session_start();
	include("conn.php");
	error_reporting(0);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/ketang.css">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<!-- <script type="text/javascript" src="../js/ketang.js"></script> -->
	<script type="text/javascript">
		
	</script>
</head>
<body>
	<?php $courseid = $_GET["courseid"];
		$class = $_GET["class"];
		$sqlclass = "select coursename,teaname from course_info where courseid = '$courseid'";
		$res = mysqli_fetch_array(mysqli_query($conn,$sqlclass));
	 ?>
	 <header>
	 	<h2>欢迎来到<?php echo $class?>班的<?php echo $res['coursename'];?>课堂</h2>
	 </header>
	 <section>
	 	<div class="left">
	 		<div class="message" id="messageBox">
	 		<ul>
	 		<?php $sqlmessage="select * from message_info where courseid = '$courseid' and class = '$class' order by posttime";
	 		$messql=mysqli_query($conn,$sqlmessage);
	 		?>
	 		<?php while ($resMes=mysqli_fetch_array($messql)) { ?>
	 		 	<li>
	 				<div class="singlemes">
	 					<p class="username"><?php if($resMes['stuid']){
	 						echo $resMes['stuname'];
	 					}else{
	 						echo $resMes['teaname'];
	 					} ?>(<?php if($resMes['stuid']){
	 						echo $resMes['stuid'];
	 					}else{
	 						echo $resMes['teaid'];
	 					} ?>)<span class="mesTime"><?php echo $resMes['posttime']; ?></span></p>
	 					<p class="mes">
	 						<?php echo $resMes['postmessage']; ?>
	 					</p>
	 		<?php } ?>
	 			
	 					
	 				</div>
	 			</li>
	 		</ul>
	 		</div>
	 		<div class="contentPost">
	 			<form>
	 				<textarea id="text"></textarea>
	 				<button id="submit">发布</button>
	 			</form>	 			
	 		</div>
	 	</div>
	 	<div class="right">
	 		
	 		<div>
	 			<button id="signIn">签到</button>
	 			<?php $sqlstate = "select * from stu_info where sno = $userid";
				$state = mysqli_query($conn,$sql);
				$resstate = mysqli_fetch_array($conn,$sqlstate); 
				echo $resstate; ?> 
				<script type="text/javascript">
				console.log(<?php echo $ressql['sclassstate']; ?>)
					
				</script>
			<?php if($ressql['sclassstate']==1){ ?>
				<script type="text/javascript">
				console.log(<?php echo $ressql['sclassstate']; ?>);
					$("#signIn").css({"background-color":"green"});
				</script>
				<?php } ?>
	 		</div>
	 		<div>
	 			<button>举手</button>
	 		</div>
	 		<div>
	 			<button>课堂小题</button>
	 		</div>
	 		<div>
	 			<button>课件分享</button>
	 		</div>
	 	</div>
	 </section>
</body>
<script type="text/javascript">
	$("#submit").click(function(){
		// console.log("fabu");
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

			
			$.ajax({
				type:"post",
				url:"postMessage.php",
				data:{
					userid:$userid,
					username:$username,
					class:$class,
					courseid:$courseid,
					coursename:$coursename,
					postMessage:$text,
					postTime:$postTime
				},
				dataType:"JSON",
				async:true,
				success:function(data){
					console.log("js中的"+data);
				},
				error: function() {
					 alert("出错啦，请重新尝试");
				},
			});
		}
	});
	$("#signIn").click(function(){
		console.log("aaa");
		$userid = <?php $userid = $_SESSION["userid"];echo $userid; ?>;
		<?php $sql = "select * from stu_info where sno = $userid";
		$sqlcheck = mysqli_query($conn,$sql);
		if($sqlcheck){
			$ressql = mysqli_fetch_array($conn,$sqlcheck); 
		if($ressql['sclassstate']==0){
			$sqlsign = "update stu_info set sclassstate=1,scourse=$courseid where sno=$userid";
			if(mysqli_query($conn,$sqlsign)){ ?>
				$(this).css({"background-color":"green"});
			<?php }
		}

			
		}else{

		} ?>
	});
</script>
</html>