<?php
function nouveaumail($name)
{
	$bdd = connexion_bdd("Khronos");
	$bdd->exec("INSERT INTO mail(name) VALUES('".$name."')");
}
?>
