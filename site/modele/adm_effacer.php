<?php
function listeSite()
{
	$bdd = connexion_bdd("Khronos");
	$reponse = $bdd->query('SELECT siteuser.idSite, siteuser.nomSite, User.pseudo FROM siteuser JOIN User ON siteUser.idUser=User.idUser');
	while ($donnees = $reponse->fetch())
	{
		echo "<tr><td><label><input type='radio' name='site' value='".$donnees['idSite']."' id='optionsRadios1'></label></td><td>".$donnees['pseudo']."</td><td>".$donnees['nomSite']."</td></tr>";
	}
	$reponse->closeCursor();
}
function listecomptesowncloud()
{
	$bdd = connexion_bdd("Khronos");
	$reponse = $bdd->query('SELECT fichier.idFichier, fichier.idUser, User.pseudo FROM fichier JOIN User ON fichier.idUser=User.idUser');
	while ($donnees = $reponse->fetch())
	{
		echo "<tr><td><label><input type='radio' name='site' value='".$donnees['idFichier']."' id='optionsRadios1'></label></td><td>".$donnees['pseudo']."</td></tr>";
	}
	$reponse->closeCursor();
}
function effacersite($idSite)
{
	$bdd = connexion_bdd("Khronos");
	$bdd->exec("DELETE FROM siteuser WHERE idSite LIKE '".$idSite."'");
}
function effacercompteowncloud($idCloud)
{
	$bdd = connexion_bdd("Khronos");
	$bdd->exec("DELETE FROM fichier WHERE idFichier LIKE '".$idCloud."'");
}
?>