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
 	});
});

function showpopup()
{
 	$("#loginform").fadeIn();
	$("#loginform").css({"visibility":"visible","display":"block"});
}

function hidepopup()
{
	$("#loginform").fadeOut();
	$("#loginform").css({"visibility":"hidden","display":"none"});
}