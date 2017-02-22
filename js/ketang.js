$class = <?php echo $class; ?>;
			$courseid = <?php echo $courseid; ?>;
			$coursename = <?php echo $res['coursename']; ?>;
			$postTime = <?php var_dump(date("Y/m/d h:i:s",strtotime('now'))); ?>;
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
				alert(data);
			}).error(function(){
					alert("error");
			});