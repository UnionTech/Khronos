<?php
include_once("modele/connexion_inscription.php");
if (isset($_POST['mail']) AND isset($_POST['mdp']) AND isset($_POST['pseudo'])) 
{

	$existence=existencecompte($_POST['mail'], sha1($_POST['mdp']));
	$inscription=inscription();
	if ($existence == 1) 
	{
		$alerte="<!-- alerte rouge -->
<div class='alert alert-danger alert-dismissible' role='alert' style='width:70%;margin:0 auto;opacity: 0.7'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
<strong>Veuillez choisir un autre mail, celui ci est déjà utilisé.</strong></div>
</div>
<!-- fin alerte rouge -->";
		include_once("vue/inscription.php");
	}
	elseif ($existence == 0 && $inscription[0] == 1)
	{
		$alerte="<!-- alerte rouge -->
<div class='alert alert-danger alert-dismissible' role='alert' style='width:70%;margin:0 auto;opacity: 0.7'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
<strong>".$inscription[1]."</strong></div>
</div>
<!-- fin alerte rouge -->";
		include_once("vue/inscription.php");
	}
	else
	{
		$pseudo = $_POST['pseudo']; 
		$mdp = $_POST['mdp'];
		$_SESSION['mdp']=$_POST['mdp'];
		nouvelleinscription($_POST['pseudo'], $_POST['mail'], sha1($_POST['mdp']));
		$alerte="<!-- alerte verte -->
<div class='alert alert-success alert-dismissible' role='alert' style='width:70%;margin:0 auto;opacity: 0.7'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
<strong>Votre comte a bien été créé, veuillez vous connecter avec vos identifiants.</strong></div>
</div>
<!-- fin alerte verte -->";
		header('Location: http://khronos.itinet.fr/index.php?page=connexion');
	}
}
else
{
	include_once("vue/inscription.php");
}

function inscription()
{
	if(!empty($_POST)) {
		if ($_POST['pseudo']) {
			if ($_POST['mail']) {
				if ($_POST['mdp']) {
					if ($_POST['mdp'] == $_POST['repetition_mdp']) {
						if (strlen($_POST['mdp']) >= 5 && strlen($_POST['mdp']) <= 10) {
							if (preg_match('/^[a-zA-Z0-9]+$/i',$_POST['pseudo'])) {
								if (strlen($_POST['mail']) <= 70) {
									if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
										$alert="";
										return array(0,$alert);
									}
									else{
										$alert="vous avez échoué au dernier stade !";
										return array(1,$alert);
									}
								}
								else{
									$alert="mail trop long.";
									return array(1,$alert);
								}
							}
							else {
								$alert="je n'accepte que les chiffres et les lettres pour le pseudo, dommage, retente ta chance.";
								return array(1,$alert);
							}
						}
						else {
							$alert="Votre mot de passe doit contenir au minimum 5 caractères et au maximum 10";
							return array(1,$alert);
						}
					}
					else {
						$alert="vous n'avez pas écrit les mêmes mot de passe.";
						return array(1,$alert);
					}
				}
				else {
					$alert="il n'y a pas de mot de passe.";
					return array(1,$alert);
				}
			}
			else {
				$alert="il n'y a pas de mail.";
				return array(1,$alert);
			}
		}
		else {
			$alert="Il n'y a pas de pseudo.";
			return array(1,$alert);
		}
	}
	else {
		$alert = "Je ne peut rien faire pour vous.";
		return array(1,$alert);
	}
}
?>
