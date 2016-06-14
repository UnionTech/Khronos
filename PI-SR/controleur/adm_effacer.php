<?php
include_once("modele/adm_effacer.php");
include_once("vue/adm_effacer.php");
if (isset($_POST['validation'])) 
{
	if (isset($_POST['site'])) 
	{
		effacersite($_POST['site']);
	}
	elseif(isset($_POST['fichier']))
	{
		effacercompteowncloud($_POST['fichier']);
	}
}
?>