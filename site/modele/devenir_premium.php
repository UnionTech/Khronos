<?php
function premium($mail)
{
	$bdd = connexion_bdd("Khronos");
		$bdd->exec("UPDATE User SET offre = 1 WHERE mail LIKE '".$mail."'");
}
function recuperationpseudo($mail)
{
        $bdd = connexion_bdd("Khronos");
        $reponse = $bdd->query('SELECT pseudo FROM User WHERE mail LIKE "'.$mail.'"');
        $donnees = $reponse->fetch();
        return $donnees['pseudo'];
}
?>
