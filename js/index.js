$(document).ready(function(){
	setSectionBG();
	$(window).resize(function(){
		setSectionBG();
	});
	$("#submit").click(function(){
		var userid = encodeURIComponent($("#userid").val());
		var pwd = encodeURIComponent($("#pwd").val());
		var userType = encodeURIComponent($("#userType").val());
		var xhr = getXMLHttpRequest();
		xhr.onreadystatechange = function(){
			if (xhr.readyState == 4 && xhr.status == 200) {
				console.log(xhr.responseText)
				if (xhr.responseText == 101) {
					location.href = "html/admin.html";
				} else if (xhr.responseText == 102) {
					location.href = "html/teacher.html";
				}else if (xhr.responseText == 103){
					location.href = "php/stu.php";
				}
			}
		}
		xhr.open("post","http://localhost/ktjhxt/php/login.php",true);
		xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
		xhr.send("userid="+userid+"&pwd="+pwd+"&userType="+userType);
	});

	function getXMLHttpRequest(){
		if (window.XMLHttpRequest) {
			return new XMLHttpRequest();
		}else{
			return new AtiveXObject("Microsoft.XMLHTTP");
		}
	}
});
function setSectionBG(){
	$window_width=$(window).width()+"px";
	$window_height=$(window).height()+"px";
	$("section").css("height",$window_height);
}