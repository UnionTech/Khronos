<?php
function nouveaumdp($mdp, $mail)
{
	$bdd = connexion_bdd("Khronos");
		$bdd->exec("UPDATE User SET pwd = '".$mdp."' WHERE mail LIKE '".$mail."'");
}
?>
