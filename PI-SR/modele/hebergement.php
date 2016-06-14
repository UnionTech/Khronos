<?php
function recuperationpseudo($mail)
{
	$bdd = connexion_bdd("Khronos");
	$reponse = $bdd->query('SELECT pseudo FROM User WHERE mail LIKE "'.$mail.'"');
	$donnees = $reponse->fetch();
	return $donnees['pseudo'];
}
function recuperationidUser($mail)
{
	$bdd = connexion_bdd("Khronos");
	$reponse = $bdd->query('SELECT idUser FROM User WHERE mail LIKE "'.$mail.'"');
	$donnees = $reponse->fetch();
	return $donnees['idUser'];
}
function nouveausite($id, $tmp, $nomSite)
{
	$bdd = connexion_bdd("Khronos");
	$bdd->exec("INSERT INTO siteuser(idUser, tmp, nomSite) VALUES('".$id."','".$tmp."','".$nomSite."')");
}
?>