$(document).ready(function(){
	setSectionBG();
	$(window).resize(function(){
		setSectionBG();
	});
	function getXMLHttpRequest(){
		if (window.XMLHttpRequest) {
			return new XMLHttpRequest();
		}else{
			return new AtiveXObject("Microsoft.XMLHTTP");
		}
	}
	var xhr = getXMLHttpRequest();
	xhr.onreadystatechange = function(){
		if (xhr.readyState == 4 && xhr.status == 200) {
			var jsonObj = JSON.parse(xhr.responseText);
			var dataArr = jsonObj.stuJSON;
			for (var i = 0; i < dataArr.length; i++) {
				var htmlText = $("tbody").html();
				htmlText = htmlText+"<tr><td>"+dataArr[i].sno+"</td><td>"+dataArr[i].sname+"</td><td>"+dataArr[i].sage+"</td><td>"+dataArr[i].ssex+"</td><td>"+dataArr[i].sclass+"</td><td><a href='javascript:;' onclick='delete(this)'>删除</a></td><td><a href='javascript:;' onclick='edit(this)'>修改</a></td></tr>"
				$("tbody").html(htmlText);
			}

		}
	}
	xhr.open("get","http://localhost/ktjhxt/php/getStuData.php",true);
	xhr.send(null);
	// function delete(this){
	// 	console.log('111');
	// }
});
function setSectionBG(){
	$window_width=$(window).width()+"px";
	$window_height=$(window).height()+"px";
	$("section").css("height",$window_height);
}
