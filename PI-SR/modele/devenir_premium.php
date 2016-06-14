<?php
function premium($mail)
{
	$bdd = connexion_bdd("Khronos");
		$bdd->exec("UPDATE User SET offre = 1 WHERE mail LIKE '".$mail."'");
}
?>