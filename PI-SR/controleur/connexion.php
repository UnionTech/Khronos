<?php
include_once("modele/connexion_inscription.php");
if (isset($_POST['mail']) AND isset($_POST['mdp'])) 
{
	$existence=existencecompte($_POST['mail'], $_POST['mdp']);
	if ($existence == 1) 
	{
		connexion($_POST['mail']);
		$_SESSION['pseudo']=$_POST['mail'];
		$admin = verifadmin($_POST['mail']);
		if ($admin == 1) 
		{
			$_SESSION['role'] = "admin";
			include_once("vue/adm_accueil.php");
		}
		else
		{
			$_SESSION['role'] = "user";
			include_once("vue/accueil_utilisateur.php");
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