<?php
function recuperationidUser($mail)
{
	$bdd = connexion_bdd("Khronos");
	$reponse = $bdd->query('SELECT idUser FROM User WHERE mail LIKE "'.$mail.'"');
	$donnees = $reponse->fetch();
	return $donnees['idUser'];
}
function nouveaufichier($id, $tmp)
{
	$bdd = connexion_bdd("Khronos");
	$bdd->exec("INSERT INTO fichier(idUser, tmp) VALUES('".$id."','".$tmp."')");
}