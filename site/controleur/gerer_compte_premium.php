<?php
include_once("modele/gerer_compte.php");
if (isset($_POST['mdp'])) 
{
	nouveaumdp(sha1($_POST['mdp']), $_SESSION['pseudo']);
	include_once("vue/gerer_compte_premium.php");
	echo "Votre mot de passe a bien été créé.";
}
else
{
	include_once("vue/gerer_compte_premium.php");	
}
?>
