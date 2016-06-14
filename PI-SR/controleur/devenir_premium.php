<?php
include_once("modele/devenir_premium.php");
if (isset($_POST['validation']))
{
	premium($_SESSION['pseudo']);
	include_once("vue/accueil_utilisateur.php");
}
else
{
	include_once("vue/devenir_premium.php");
}
?>