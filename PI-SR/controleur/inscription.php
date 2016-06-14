<?php
include_once("modele/connexion_inscription.php");
if (isset($_POST['mail']) AND isset($_POST['mdp']) AND isset($_POST['pseudo'])) 
{
	$existence=existencecompte($_POST['mail'], $_POST['mdp']);
	if ($existence == 1) 
	{
		echo "Ce compte existe déjà.";
		include_once("vue/inscription.php");
	}
	else
	{
		echo "Ce compte n'existe pas".$_POST['pseudo'];
		nouvelleinscription($_POST['pseudo'], $_POST['mail'], $_POST['mdp']);
		header('Location: http://localhost/PI-SR/index.php?page=connexion');
	}
}
else
{
	include_once("vue/inscription.php");
}
?>