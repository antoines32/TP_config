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
 	$("#show_log").click(function(){
 		closeregister();
 		return false;
 	})
 	$(".test").click(function()
 	{
 		showtest();
 		return false;
 	})
 		AfficheConnexion();
});

//-------------------------------------------------------------
function AfficheConnexion()
{
	var Message = "";
    var items = location.search.substr(1).split("&");
	for (var index = 0; index < items.length; index++)
	{
		tmp = items[index].split("=");
		if(tmp[0] == "Connexion")
		{
			alert(decodeURI(tmp[1]));
		}
	}
}
//-------------------------------------------------------------



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

	$("#hidelogin").css({"visibility":"visible","display":"block"});
	
	$("#hideregister").css({"visibility":"hidden","display":"none"});
}

function showtest ()
{
	var isconnect = 1;
	if (isconnect == 1) {
		$(".test").fadeOut();
		$(".test").css({"visibility":"hidden","display":"none"});
		$(".hidetest").fadeIn();
		$(".hidetest").css({"visibility":"visible","display":"block"});
	}
	else{
		showpopup();
	}
}