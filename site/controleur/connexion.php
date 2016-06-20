<?php
include_once("modele/connexion_inscription.php");
if (isset($_POST['mail']) AND isset($_POST['mdp'])) 
{
	$existence=existencecompte($_POST['mail'], sha1($_POST['mdp']));
	if ($existence == 1) 
	{
		connexion($_POST['mail']);
		$_SESSION['pseudo']=$_POST['mail'];
		$_SESSION['mdp']=$_POST['mdp'];
		$admin = verifadmin($_POST['mail']);
		if ($admin == 1) 
		{
			$_SESSION['role'] = "admin";
			include_once("vue/adm_accueil.php");
		}
		else
		{
			$pseudo = recuperationpseudo($_POST['mail']);
			$alerte = "<!-- alerte verte -->
			<div class='alert alert-success alert-dismissible' role='alert' style='width:50%;margin:0 auto;font-size:x-large;opacity:0.7'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			<strong>".$pseudo.", bienvenue sur votre compte ! </strong></div>
			</div>
			<!-- fin alerte verte -->";
			$_SESSION['role'] = "user";
			$_SESSION['offre'] = verifoffre($_POST[mail]);
			if($_SESSION['offre'] == 0)
			{
				include_once("vue/accueil_utilisateur.php");
			}
			else
			{
				include_once("vue/accueil_premium.php");
			}
		}
	}
	else
	{
		echo "Ce compte n'existe pas veuillez vous inscrire.";
		include_once("vue/inscription.php");
	}
}
else
{
	include_once("vue/connexion.php");
}
?>
