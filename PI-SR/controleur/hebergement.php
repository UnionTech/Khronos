<?php
include_once("modele/hebergement.php");
$pseudo = recuperationpseudo($_SESSION['pseudo']);
$id = recuperationidUser($_SESSION['pseudo']);
if (isset($_POST['bdd']) AND isset($_POST['tmp'])) 
{
	nouveausite($id, $_POST['tmp'], $pseudo.".khronos.itinet.fr");
	include_once("vue/accueil_utilisateur.php");
	echo "Votre site a bien été créé.";
}
else
{
	include_once("vue/hebergement.php");
}
?>