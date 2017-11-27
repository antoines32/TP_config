
<!--Popup de login/register url : http://talkerscode.com/webtricks/create-a-login-form-on-popup-box-using-jquery.php-->
<div id = "loginform" class="container">
	<input type="image" name="" id="close_login" src="image/croix2min.png">
	<p>Login/Register</p>
	<div class="container" id="hidelogin">
		<form method="post" action="php/connexion.php">
			<?php echo'<input type ="hidden" name="URI" id="URI" value="'.$currentUri.'"/>'; ?>
			<input type ="text" id ="login" placeholder="Email/Username" name="pseudo">
			<input type ="password" id ="password" name="mot_de_passe" placeholder="******">
			<input type="submit" class="btn btn-success log" id="dologin" name="connexion" value="Connexion">
			<input type="button" id="show_register" class="btn btn-success log" value="Inscription">
		</form>
	</div>
	
<!--popup register-->
	<div class="container" id="hideregister">
		<form method="post" action="php/register.php">
			<?php echo'<input type ="hidden" name="URI" id="URI" value="'.$currentUri.'"/>'; ?>
			<input type="text" name="nom" placeholder="Nom" class="reg">
			<input type="text" name="prenom" placeholder="Prénom" class="reg">
			<input type="email" name="mail" id="mail" placeholder="Email" class="reg">
			<input type="password" name="mdp" placeholder="Mot de passe" class="reg">
			<input type="password" name="mdp_confirm" placeholder="Confirmer le mot de passe" class="reg">
			<input type="text" name="pseudo" id="user" placeholder="Pseudo" class="reg">
    		<select name="cpu" class="reg">
    			<option value="null">------CPU------</option>
    			<?php
 
				$conn = mysqli_connect("db711052003.db.1and1.com", "dbo711052003", "TP_config27", "db711052003");
				$sql= mysqli_query($conn,"SELECT * FROM `cpu`");
 
				while($donnees=mysqli_fetch_assoc($sql)) {
				?>
				<option value="<?php echo $donnees ['id'];?>"><?php echo $donnees ['marque'] . " " . $donnees ['famille'] . " " . $donnees ['modele'];?></option>
				<?php
				}
				?>
    		</select>
    		<select name="gpu" class="reg">
    			<option value="null">------GPU------</option>
    			<?php
 
				$conn = mysqli_connect("db711052003.db.1and1.com", "dbo711052003", "TP_config27", "db711052003");
				$sql= mysqli_query($conn,"SELECT * FROM `gpu`");
 
				while($donnees=mysqli_fetch_assoc($sql)) {
				?>
				<option value="<?php echo $donnees ['id'];?>"><?php echo $donnees ['nom'];?></option>
				<?php
				}
				?>
    		</select>
    		<select name="ram" class="reg">
    			<option value="null">------RAM------</option>
    			<option value="1">1Go</option>
    			<option value="2">2Go</option>
    			<option value="4">4Go</option>
    			<option value="6">6Go</option>
    			<option value="8">8Go</option>
    			<option value="10">10Go</option>
    			<option value="12">12Go</option>
    			<option value="16">16Go</option>
    			<option value="32">32Go</option>
    			<option value="64">64Go</option>
    		</select>
			<input type="submit" name="register" class="btn btn-success log" value="Valider" id="doregister">
			<input type="button" class="btn btn-success log" value="Déja enregistré?" id="show_log">
		</form>
	</div>
</div>