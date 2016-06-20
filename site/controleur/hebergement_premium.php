<?php
include_once("modele/hebergement_premium.php");
$id = recuperationidUser($_SESSION['pseudo']);
$mdp = $_SESSION['mdp'];
if (isset($_POST['bdd']) AND isset($_POST['tmp']) AND isset($_POST['nom'])) 
{
	$verifsite = verifsite($_POST['nom'].".khronos.itinet.fr");
	if($verifsite != 1)
	{
		$veriftmp=preg_match('/[^0-9]/',$_POST['tmp']);
		$verifnom=preg_match('/\s/',$_POST['nom']);
		if ($veriftmp == 0 AND $verifnom == 0)
		{
			$tmp = $_POST['tmp'];
			$bdd = $_POST['bdd'];
			$nom = $_POST['nom'];
			exec("sudo /var/www/scripts/script_creation_site_test.sh $nom $mdp $tmp $bdd");
			nouveausite($id, $_POST['tmp'], $nom.".khronos.itinet.fr");
			$alerte = "<!-- alerte verte -->
<div class='alert alert-success alert-dismissible' role='alert' style='width:70%;margin:0 auto;opacity: 0.7'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
<strong>Bravo, votre site a bien été créé, veuillez vous rendre à l'adresse ".$nom.".khronos.itinet.fr et télécharger vos fihiers avec Filezilla</strong></div>
</div>
<!-- fin alerte verte -->";
			include_once("vue/accueil_premium.php");
		}
		else
		{
			$alerte = "<!-- alerte rouge -->
<div class='alert alert-danger alert-dismissible' role='alert' style='width:70%;margin:0 auto;opacity: 0.7'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
<strong>Le temps ne dois contenir que des chiffres et le nom ne doit pas contenir d'espace.</strong></div>
</div>
<!-- fin alerte rouge -->";
			include_once("vue/hebergement_premium.php");
		}
	}
	else
	{
		$alerte = "<!-- alerte rouge -->
<div class='alert alert-danger alert-dismissible' role='alert' style='width:70%;margin:0 auto;opacity: 0.7'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
<strong>Veuillez choisir un autre nom, celui-ci est déjà pris.</strong></div>
</div>
<!-- fin alerte rouge -->";
		include_once("vue/hebergement_premium.php");
	}
}
else
{
	include_once("vue/hebergement_premium.php");
}
?>
