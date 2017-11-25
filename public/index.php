
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Can I Play It</title>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="https://andwecode.com/wp-content/uploads/2015/10/jquery.leanModal.min_.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="js/index.js"></script>

</head>
<body>	
<?php include("php/menu.php"); ?>

<!--Page principale-->	
	<content class="container">

		<!--Popup de login/register url : http://talkerscode.com/webtricks/create-a-login-form-on-popup-box-using-jquery.php-->
		<div id = "loginform" class="container">
			<input type="image" name="" id="close_login" src="image/croix2min.png">
			<p>Login/Register</p>
			<div class="container" id="hidelogin">
	    		<form method="post" action="php/connexion.php">
	   				
	    			<input type ="text" id ="login" placeholder="Email/Username" name="pseudo" required>
	    			<input type ="password" id ="password" name="mot_de_passe" placeholder="******" required>
	    			<input type="submit" class="btn btn-success log" id="dologin" name="connexion" value="Connexion">
	    			<input type="button" id="show_register" class="btn btn-success log" value="Inscription">
	    		</form>
    		</div>
    	<!--popup register-->
    		<div class="container" id="hideregister">
    			<form method="post" action="php/register.php">
    				<input type="text" name="nom" placeholder="Nom" class="reg" required>
    				<input type="text" name="prenom" placeholder="Prénom" class="reg" required>
    				<input type="email" name="mail" id="mail" placeholder="Email" class="reg" required>
    				<input type="password" name="mdp" placeholder="Mot de passe" class="reg" required>
    				<input type="password" name="mdp_confirm" placeholder="Confirmer le mot de passe" class="reg" required>
    				<input type="text" name="pseudo" id="user" placeholder="Pseudo" class="reg" required>
    					<?php
    					session_start();
    					mysqli_connect("db711052003.db.1and1.com","dbo711052003","TP_config27","db711052003");
    					$Requete = mysqli_query("SELECT * FROM cpu;");
    					echo "<select name='cpu' class='reg'>";
    					while ($donnees = mysqli_fetch_array($Requete) ) {
    						echo "<option value='".$donnees['id'].">".$donnees['nom']."</option>";
    					}
    					echo "</select>";
    					mysqli_close();
    					?>
    				<input type="submit" name="register" class="btn btn-success log" value="Valider" id="doregister">
    				<input type="button" class="btn btn-success log" value="Déja enregistré?" id="show_log">
    			</form>
    		</div>
 		</div>

 		<!--Description du site-->
		<div class="container hidecontent">
			<p>Qui ne s'est pas déjà cassé la tête à rechercher et comparer sur le net si sa configuration de PC correspondait ou non aux derniers jeux sorties ? </p>
			<p>Nous avons conçus se site pour pouvoir comparer votre configuration personnel avec la configuration requise les différents jeux auxquels vous aimeriez jouer.</p>
		<!--Bouton de test (c'est le même que le test dans le menu-->
			<button class="test btn btn-success">Commencer un test</button>
		</div>
		<div class="container hidetest">
			<form id='pcuser'>
				<label id="cpuuser">CPU : </label>
				<label id="gpuuser">GPU : </label>
				<label id="ramuser">RAM : </label>
			</form>
			<form id="jeuxuser">
				<label>Jeux à tester : </label>
				
				<select name="choixdecouleur">
				        <option value="R">rouge</option>
				        <option value="B">bleu</option>
				        <option value="V">vert<option>
				      </select>
		</div>

		
	</content>
	<footer>
		
	</footer>

</body>
</html>