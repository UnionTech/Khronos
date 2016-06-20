<?php
include_once("modele/sftp.php");
$id = recuperationidUser($_SESSION['pseudo']);
$mdp = $_SESSION['mdp'];
$pseudo = recuperationpseudo($_SESSION['pseudo']);
$inscription = verifinscription($_SESSION['pseudo']);
if($inscription == 0)
{
	inscription($_SESSION['pseudo']);
	exec("sudo /var/www/scripts/script_creation_user.sh $pseudo $mdp");
}
if (isset($sftp))
{
	$verif = veriffichier($_SESSION['pseudo']);
	if ($verif == 0)
	{
		nouveaufichier($_SESSION['pseudo']);
		exec("sudo /var/www/scripts/script_cloudCreateUser_test.sh $pseudo $mdp");
		header('Location: http://cloud.khronos.itinet.fr');

	}
	else
	{
		$alerte = "<!-- alerte rouge -->
		<div class='alert alert-danger alert-dismissible' role='alert' style='width:70%;margin:0 auto'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
		<strong>Votre compte Owncloud est déjà actif, veuillez aller <a href='http://cloud.khronos.itinet.fr' class='alert-link'>ici</a>  et utiliser vos identifiants</strong></div>
		</div>
		<!-- fin alerte rouge -->";
		include_once("vue/accueil_utilisateur.php");
	}
}
?>
