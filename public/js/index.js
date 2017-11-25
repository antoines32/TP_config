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
 	$("show_log").click(function()
 	{
 		closeregister();
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
	$("#hidelogin").fadeIn();
	$("#hidelogin").css({"visibility":"visible","display":"block"});
}