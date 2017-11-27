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
 	});
 	$(".test").click(function()
 	{
 		showtest();
 		return false;
 	});
 	/*$("#cipi").click(function()
 	{
 		compare();
 		return false;
 	})*/
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
	$("#form-compare").css({"visibility":"hidden","display":"none"});
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
		$(".test").fadeOut();
		$(".test").css({"visibility":"hidden","display":"none"});
		$("#div-result").css({"visibility":"hidden","display":"none"})
		$(".hidetest").fadeIn();
		$(".hidetest").css({"visibility":"visible","display":"block"});
		$("#form-compare").css({"visibility":"visible","display":"block"});
}

/*function compare ()
{
	$.get(
    '../php/comparaison.php', // Le fichier cible côté serveur.
    'false', // Nous utilisons false, pour dire que nous n'envoyons pas de données.
    'affiche_resultat', // Nous renseignons uniquement le nom de la fonction de retour.
    'text' // Format des données reçues.
)};

function affiche_resultat(texte_recu){
    // Du code pour gérer le retour de l'appel AJAX.

	var tab_result = texte_recu.split(".");
	$("#pcuser").after('<div><form><input type="text" disabled="disabled" name="resultatcpu" value="'+tab_result[0]+'"><input type="text" disabled="disabled" name="resultatgpu" value="'+tab_result[1]+'"><input type="text" disabled="disabled" name="resultatram" value="'+tab_result[2]+'"></form></div>');

};*/