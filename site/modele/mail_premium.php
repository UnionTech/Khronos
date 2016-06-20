<?php
function recuperationidUser($mail)
{
        $bdd = connexion_bdd("Khronos");
        $reponse = $bdd->query('SELECT idUser FROM User WHERE mail LIKE "'.$mail.'"');
        $donnees = $reponse->fetch();
        return $donnees['idUser'];
}
function nouveaumail($id,$name)
{
	$bdd = connexion_bdd("Khronos");
	$bdd->exec("INSERT INTO mail_Premium(idUser, nom, mot_de_passe) VALUES(".$id.",'".$name."','".$name."')");
}
function verifmail1($nouveau)
{
        $bdd = connexion_bdd("Khronos");
        $sortie = 0;
        $reponse = $bdd->query('SELECT name FROM mail');
        while ($donnees = $reponse->fetch())
        {
                if ($donnees['name'] == $nouveau)
                {
                        $sortie = 1;
                        break;
                }
        }
        return $sortie;
        $reponse->closeCursor();
}
function verifmail2($nouveau)
{
        $bdd = connexion_bdd("Khronos");
        $sortie = 0;
        $reponse = $bdd->query('SELECT nom FROM mail_Premium');
        while ($donnees = $reponse->fetch())
        {
                if ($donnees['nom'] == $nouveau)
                {
                        $sortie = 1;
                        break;
                }
        }
        return $sortie;
        $reponse->closeCursor();
}
?>
