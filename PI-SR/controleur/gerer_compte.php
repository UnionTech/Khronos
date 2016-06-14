<?php
include_once("modele/gerer_compte.php");
if (isset($_POST['mdp'])) 
{
	nouveaumdp($_POST['mdp'], $_SESSION['pseudo']);
	include_once("vue/accueil_utilisateur.php");
	echo "Votre mot de passe a bien été créé.";
}
else
{
	include_once("vue/gerer_compte.php");	
}
?>