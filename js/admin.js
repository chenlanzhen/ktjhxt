$(document).ready(function(){
	setSectionBG();
	$(window).resize(function(){
		setSectionBG();
	});
});
function setSectionBG(){
	$window_width=$(window).width()+"px";
	$window_height=$(window).height()+"px";
	$("section").css("height",$window_height);
}