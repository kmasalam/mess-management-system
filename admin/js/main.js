//date picker
$(".datepicker").datepicker({changeMonth:!0,dateFormat:"yy-mm-dd",changeYear:!0});
//Print btn
$("#printbtn").click(function(){$("#printarea").show(),window.print()});
//Loader box
var loaderBox="<div id='load-screen'><div id='loading'></div></div>";$("body").prepend(loaderBox),$("#load-screen").delay("200").fadeOut(200,function(){$(this).remove()});