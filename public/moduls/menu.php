<?php
	$currentUri = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";;
?>

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
			<?php
				if(isset($_SESSION['menu']))
				{ //defini le menu 1 comme actif
					if($_SESSION['menu'] == 1)
					{
						echo'<li class="nav-item active">';
					}
					else
					{
						echo'<li class="nav-item">';
					}
				}
				else
				{
					echo'<li class="nav-item">';
				}
			?>
				<a class="nav-link" href="index.php">Accueil</a>
			</li>
			<?php
				if(isset($_SESSION['menu']))
				{
					if($_SESSION['menu'] == 3)
					{ //defini le menu 3 comme actif
						echo'<li class="nav-item active">';
					}
					else
					{
						echo'<li class="nav-item">';
					}
				}
				else
				{
					echo'<li class="nav-item">';
				}
			?>
				<a class="nav-link" href="test.php">Test</a>
			</li>
			<?php
				if(isset($_SESSION['menu']))
				{ //defini le menu 2 comme actif
					if($_SESSION['menu'] == 2)
					{
						echo'<li class="nav-item active">';
					}
					else
					{
						echo'<li class="nav-item">';
					}
				}
				else
				{
					echo'<li class="nav-item">';
				}
			?>
				<a class="nav-link" href="jeux.php">Jeux</a>
			</li>
		</ul>
		<ul class="navbar-nav">
			<li class="nav-item">
				<?php
					if(isset($_SESSION['id']))
					{
						echo "Bienvenue '".$_SESSION['pseudo']."'";
						echo "<a class='nav-link' id='deco' value='deconnexion' href='php/deconnexion.php'>Déconnexion</a>";
					} else
					{
						echo "<a class='nav-link' id='show_login' value='Show Login' href=''>Login/register</a>";
					}
				?>
			</li>
		</ul>
	</div>
</nav>