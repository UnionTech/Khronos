<?php

# ****************************** Démarrage du système de sessions PHP *************************************

session_start();

# ********************************** Fonction de connexion à la BDD ****************************************

function connexion_bdd($mabdd)
{
	try
	{
	    $bdd = new PDO('mysql:host=localhost;dbname='.$mabdd.';charset=utf8', 'root', 'jesuisuneprincesse94');
	}
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}
	return($bdd);
}

# *********************************Pour affichier le pseudo sur chaque page ********************************

function pseudo($mail)
{
	$bdd = connexion_bdd("Khronos");
	$reponse = $bdd->query('SELECT pseudo FROM User WHERE mail like "'.$mail.'"');
	$donnees = $reponse->fetch();
	$pseudo = $donnees['pseudo'];
	return $pseudo;
}

if (isset($_SESSION['pseudo'])) 
{
	$pseudo = pseudo($_SESSION['pseudo']);
}

# ********************************** Analyse de la query string ********************************************

if($_SERVER['QUERY_STRING'] != "")
{
	$querybreak = explode("&", $_SERVER['QUERY_STRING']);
	$t = array();
	for ($i=0; $i < count($querybreak); $i++) 
	{ 
		$t[$i] = explode("=", $querybreak[$i]);
	}
	$page = $t[0][1];
	if (count($t) > 1) 
	{
		$choix = $t[1][1];
	}
	if ($_SESSION['role'] == "admin") 
	{
		switch ($page) 
		{
			case 'connexion':
				include_once("controleur/connexion.php");
				break;
			case 'accueil':
				include_once("vue/accueil.php");
				break;
			case 'inscription':
				include_once("controleur/inscription.php");
				break;
			case 'deconnexion':
				include_once("controleur/deconnexion.php");
				break;
			case 'adm_accueil':
				include_once("controleur/adm_accueil.php");
				break;
			case 'adm_bannir':
				include_once("controleur/adm_bannir.php");
				break;
			case 'adm_effacer':
				include_once("controleur/adm_effacer.php");
				break;
			case 'adm_premium':
				include_once("controleur/adm_premium.php");
				break;
			case 'mail':
				include_once("controleur/mail.php");
				break;
		}
	}
	elseif ($_SESSION['role'] == "user") {
		if ($_SESSION['offre'] == 0) {
			switch ($page) 
			{
				case 'connexion':
					include_once("controleur/connexion.php");
					break;
				case 'accueil':
					include_once("vue/accueil.php");
					break;
				case 'inscription':
					include_once("controleur/inscription.php");
					break;
				case 'accueil_utilisateur':
					include_once("controleur/accueil_utilisateur.php");
					break;
				case 'sftp':
					$sftp=1;
					include_once("controleur/sftp.php");
					break;
				case 'hebergement':
					include_once("controleur/hebergement.php");
					break;
				case 'deconnexion':
					include_once("controleur/deconnexion.php");
					break;
				case 'gerer_compte':
					include_once("controleur/gerer_compte.php");
					break;
				case 'mdp':
					include_once("controleur/mdp.php");
					break;
				case 'devenir_premium':
					$validation=1;
					include_once("controleur/devenir_premium.php");
					break;
				case 'mail':
					include_once("controleur/mail.php");
					break;
			}
		}
		else{
			switch ($page) 
			{
				case 'connexion':
					include_once("controleur/connexion.php");
					break;
				case 'accueil':
					include_once("vue/accueil.php");
					break;
				case 'inscription':
					include_once("controleur/inscription.php");
					break;
				case 'accueil_premium':
					include_once("controleur/accueil_premium.php");
					break;
				case 'sftp':
					$sftp=1;
					include_once("controleur/sftp.php");
					break;
				case 'hebergement':
					include_once("controleur/hebergement_premium.php");
					break;
				case 'deconnexion':
					include_once("controleur/deconnexion.php");
					break;
				case 'gerer_compte':
					include_once("controleur/gerer_compte_premium.php");
					break;
				case 'mdp':
					include_once("controleur/mdp.php");
					break;
				case 'mail':
					include_once("controleur/mail_premium.php");
					break;
			}
		
		}
	}
	else
	{
		switch ($page) 
		{
			case 'connexion':
				include_once("controleur/connexion.php");
				break;
			case 'accueil':
				include_once("vue/accueil.php");
				break;
			case 'inscription':
				include_once("controleur/inscription.php");
				break;
			case 'mail':
				include_once("controleur/mail.php");
				break;
		}
	}
}
else
{
	include_once("vue/accueil.php");
}
?>
