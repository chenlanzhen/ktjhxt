<?php
	session_start();
	// error_reporting(0);
	include("conn.php");
	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">

	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/admin.js"></script>
</head>
<body>
	
	<section>
	<p><a href="#">欢迎您，<?php $uid = $_SESSION['login']['user']['id']; echo $uid; ?></a></p>
			<center class = "center">请选择您的课程</center>
			<table>
			<?php $selclass = "select sclass from stu_info where sno = '$uid'"; 
			$result = mysqli_query($conn,$selclass);
			$res = mysqli_fetch_array($result);
			$selcourse = "select coursename,courseid from course_info where class = '$res[0]'";
			$resultCourse = mysqli_query($conn,$selcourse);
			if (!$resultCourse) {
 				printf("Error: %s\n", mysqli_error($conn));
 				exit();
			}
			while($resCourse = mysqli_fetch_array($resultCourse))
			{?>
				<tr>
				<?php $ketang="ketang.php?courseid=".$resCourse['courseid']."&class=".$res[0]; ?>
					<td><a href="<?php echo $ketang; ?>"><?php echo $resCourse['coursename']; ?></a></td>
				</tr>
				<?php } ?>
			</table>
	</section>
	
</body>
</html>
