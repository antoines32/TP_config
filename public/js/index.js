$(document).ready(function()
{
	$("#show_login").click(function()
	{
		showpopup();
	    return false;
 	});
 	$("#close_login").click(function()
 	{
  		hidepopup();
  		closeregister();
 	});
 	$("#show_register").click(function()
 	{
 		showregister();
 		return false;
 	});
<<<<<<< HEAD
 	$("#show_log").click(function(){
 		closeregister();
 		return false;
 	})
 	$(".test").click(function()
 	{
 		showtest();
=======
 	$("show_log").click(function()
 	{
 		closeregister();
>>>>>>> antoineHome
 		return false;
 	})

});

function showpopup()
{
 	$("#loginform").fadeIn();
	$("#loginform").css({"visibility":"visible","display":"block"});
	$(".hidecontent").css({"visibility":"hidden","display":"none"});
}

function hidepopup()
{
	$("#loginform").fadeOut();
	$("#loginform").css({"visibility":"hidden","display":"none"});
	$(".hidecontent").css({"visibility":"visible","display":"block"});
}

function showregister()
{
	$("#hidelogin").fadeOut();
	$("#hidelogin").css({"visibility":"hidden","display":"none"});
	$("#hideregister").fadeIn();
	$("#hideregister").css({"visibility":"visible","display":"block"});
}

function closeregister ()
{
	$("#hideregister").fadeOut();
	$("#hideregister").css({"visibility":"hidden","display":"none"});
<<<<<<< HEAD
}

function showtest ()
{
	var cpuuser = "I7";
	var gpuuser = "";
	var ramuser = 8;
	var isconnect = 1;
	if (isconnect == 1) {
		$(".test").fadeOut();
		$(".test").css({"visibility":"hidden","display":"none"});
		$(".hidetest").fadeIn();
		$(".hidetest").css({"visibility":"visible","display":"block"});
		if (cpuuser != ""){
			$("#cpuuser").after('<input type="text" disabled="disabled" value="'+cpuuser+'">');

		}
		else{
			$("#cpuuser").after('<input type="text" disabled="disabled" value="cpu non renseigné">');
		}
		if (gpuuser != ""){
			$("#gpuuser").after('<input type="text" disabled="disabled" value="'+gpuuser+'">');
		}
		else{
			$("#gpuuser").after('<input type="text" disabled="disabled" value="gpu non renseigné">');
		}
		if (ramuser != ""){
			$("#ramuser").after('<input type="text" disabled="disabled" value="'+ramuser+'">');
		}
		else{
			$("#ramuser").after('<input type="text" disabled="disabled" value="ram non renseigné">');
		}
	}
	else{
		showpopup();
	}
=======
	$("#hidelogin").fadeIn();
	$("#hidelogin").css({"visibility":"visible","display":"block"});
>>>>>>> antoineHome
}