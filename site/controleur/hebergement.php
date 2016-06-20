<?php
include_once("modele/hebergement.php");
$pseudo = recuperationpseudo($_SESSION['pseudo']);
$id = recuperationidUser($_SESSION['pseudo']);
$mdp = $_SESSION['mdp'];
$verifsite=verifsite($id);
if($inscription == 0)
{
	inscription($_POST['pseudo']);
        exec("sudo /var/www/scripts/script_creation_user.sh $pseudo $mdp");
}
if($verifsite != "")
{
	$alerte="<!-- alerte rouge -->
<div class='alert alert-danger alert-dismissible' role='alert' style='width:70%;margin:0 auto;opacity: 0.7'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
<strong>Vous avez déjà un site actif, veuillez vous rendre à l'adresse ".$verifsite." et uploader vos fichiers avec Filezilla.</strong></div>
</div>
<!-- fin alerte rouge -->";
	include_once("vue/accueil_utilisateur.php");
}
else
{
	if (isset($_POST['bdd']) AND isset($_POST['tmp'])) 
	{
		$tmp = $_POST['tmp'];
		$bdd = $_POST['bdd'];
		exec("sudo /var/www/scripts/script_creation_site_test.sh $pseudo $mdp $tmp $bdd"); 
		nouveausite($id, $_POST['tmp'], $pseudo.".khronos.itinet.fr");
		$alerte="<!-- alerte verte -->
<div class='alert alert-success alert-dismissible' role='alert' style='width:70%;margin:0 auto;opacity: 0.7'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
<strong>Votre site a bien été créé, veuillez vous rendre à l'adresse ".$pseudo.".khronos.itinet.fr et télécharger vos fichiers avec Filezilla</strong></div>
</div>
<!-- fin alerte verte -->";
		include_once("vue/accueil_utilisateur.php");
	}
	else
	{
		include_once("vue/hebergement.php");
	}
}
?>
