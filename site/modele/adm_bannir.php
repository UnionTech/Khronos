<?php
function listeUser()
{
	$bdd = connexion_bdd("Khronos");
	$reponse = $bdd->query('SELECT idUser, pseudo, mail FROM User WHERE admin=0');
	while ($donnees = $reponse->fetch())
	{
		echo "<tr><td><label><input type='radio' name='user' value='".$donnees['idUser']."' id='optionsRadios1'></label></td><td>".$donnees['pseudo']."</td><td>".$donnees['mail']."</td></tr>";
	}
	$reponse->closeCursor();
}
function bannir($idUser)
{
	$bdd = connexion_bdd("Khronos");
	$bdd->exec("DELETE FROM siteuser WHERE idUser=".$idUser);
	$bdd->exec("DELETE FROM fichier WHERE idUser=".$idUser);
	$bdd->exec("DELETE FROM User WHERE idUser=".$idUser);
}
?>