<?php
include_once("modele/devenir_premium.php");
$pseudo=recuperationpseudo($_SESSION['pseudo']);
$mdp=$_SESSION['mdp'];
if (isset($validation))
{
	exec("sudo /var/www/scripts/script_creation_user.sh $pseudo $mdp");
	exec("sudo /var/www/scripts/shell.sh $pseudo");
	premium($_SESSION['pseudo']);
	$alerte="<!-- alerte verte -->
<div class='alert alert-success alert-dismissible' role='alert' style='width:70%;margin:0 auto;opacity: 0.7'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
<strong>Bravo, vous êtes désormais premium, veuillez vous reconnecter pour accéder à votre nouvelle formule</strong></div>
</div>
<!-- fin alerte verte -->";
	include_once("vue/connexion.php");
}
?>
