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
	$bdd->exec("INSERT INTO siteUser(idUser, tmp, nomSite) VALUES('".$id."','".$tmp."','".$nomSite."')");
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
function verifsite($nouveau)
{
        $bdd = connexion_bdd("Khronos");
        $sortie = false;
        $reponse = $bdd->query('SELECT nomSite FROM siteUser');
        while ($donnees = $reponse->fetch())
        {
                if ($donnees['nomSite'] == $nouveau)
                {
                        $sortie = true;
                        break;
                }
        }
        return $sortie;
        $reponse->closeCursor();
}
?>
