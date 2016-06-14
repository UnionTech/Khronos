<?php
function deconnexion($mail)
{
	$bdd = connexion_bdd("Khronos");
		$bdd->exec("UPDATE User SET etat = 'deconnecte' WHERE mail LIKE '".$mail."'");
}
?>