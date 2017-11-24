	<!--Barre de navigation/Menu-->
		<nav class="navbar navbar-expand-md bg-dark navbar-dark">

		<!--Logo-->
			<div class="navbar-header col-lg-2 col-sm-3">
				<a class="navbar-brand" href="index.php">Can I Play It</a>
			</div>

		<!--Barre de recherche-->
			<div class="form-group col-lg-6 col-md-5 col-sm-6 col-8">
                <div class="input-group input-group-md icon-addon">
                    <input placeholder="Texte" name="" id="schbox" class="form-control" type="text">
                    <i class="icon icon-search"></i>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-success">Rechercher</button>
                    </span>
                </div>
            </div>

    	<!--Menu réductible-->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    			<span class="navbar-toggler-icon"></span>
    		</button>
			<div class="collapse navbar-collapse col-lg-4" id="collapsibleNavbar">
			    <ul class="navbar-nav">
			    	<li class="nav-item active">
			        	<a class="nav-link" href="index.php">Accueil</a>
			    	</li>
			    	<li class="nav-item">
			        	<a class="nav-link" href="test.php">Test</a>
			    	</li>
			    	<li class="nav-item">
			        	<a class="nav-link" href="jeux.php">Jeux</a>
			    	</li>
			    </ul>
			    <ul class="navbar-nav">
			    	<li class="nav-item">
			        	<a class="nav-link" id="show_login" value="Show Login" href="">Login/register</a>
			    	</li>
			    </ul>
		    </div>
		</nav>

<!--Page principale-->	
	<content class="container">

		<!--Popup de login/register url : http://talkerscode.com/webtricks/create-a-login-form-on-popup-box-using-jquery.php-->
		<div id = "loginform" class="container">
			<input type="image" name="" id="close_login" src="image/croix2min.png">
			<p>Login/Register</p>
			<div class="container" id="hidelogin">
	    		<form method="post" action="php/connexion.php">
	   				
	    			<input type ="text" id ="login" placeholder="Email/Username" name="pseudo">
	    			<input type ="password" id ="password" name="mot_de_passe" placeholder="******">
	    			<input type="submit" class="btn btn-success log" id="dologin" name="connexion" value="Connexion">
	    			<input type="button" id="show_register" class="btn btn-success log" value="Inscription">
	    		</form>
    		</div>
    	<!--popup register-->
    		<div class="container" id="hideregister">
    			<form method="post" action="php/register.php">
    				<input type="text" name="nom" placeholder="Nom" class="reg">
    				<input type="text" name="prenom" placeholder="Prénom" class="reg">
    				<input type="email" name="mail" id="mail" placeholder="Email" class="reg">
    				<input type="password" name="mdp" placeholder="Mot de passe" class="reg">
    				<input type="password" name="mdp_confirm" placeholder="Confirmer le mot de passe" class="reg">
    				<input type="text" name="pseudo" id="user" placeholder="Pseudo" class="reg">
    				<input type="submit" name="register" class="btn btn-success log" value="Valider" id="doregister">
    				<input type="button" class="btn btn-success log" value="Déja enregistré?" id="show_log">
    			</form>
    		</div>
 		</div>