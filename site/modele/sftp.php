<?php
function recuperationidUser($mail)
{
	$bdd = connexion_bdd("Khronos");
	$reponse = $bdd->query('SELECT idUser FROM User WHERE mail LIKE "'.$mail.'"');
	$donnees = $reponse->fetch();
	return $donnees['idUser'];
}
function nouveaufichier($mail)
{
	$bdd = connexion_bdd("Khronos");
	$bdd->exec("UPDATE User SET cloud_active=1 WHERE mail LIKE '".$mail."'");
}
function recuperationpseudo($mail)
{
        $bdd = connexion_bdd("Khronos");
        $reponse = $bdd->query('SELECT pseudo FROM User WHERE mail LIKE "'.$mail.'"');
        $donnees = $reponse->fetch();
        return $donnees['pseudo'];
}
function veriffichier($mail)
{
        $bdd = connexion_bdd("Khronos");
        $reponse = $bdd->query('SELECT cloud_active FROM User WHERE mail LIKE "'.$mail.'"');
        $donnees = $reponse->fetch();
        return $donnees['cloud_active'];
}
function verifinscription($mail)
{
        $bdd = connexion_bdd("Khronos");
        $reponse = $bdd->query('SELECT inscription FROM User WHERE mail LIKE "'.$mail.'"');
        $donnees = $reponse->fetch();
        return $donnees['inscription'];
}
function inscription($mail)
{
	$bdd = connexion_bdd("Khronos");
        $bdd->exec("UPDATE User SET inscription=1 WHERE mail LIKE '".$mail."'");
}
?>
