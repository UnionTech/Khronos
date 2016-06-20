<?php
include_once("modele/adm_premium.php");
if (isset($_POST['user'])) 
{
	premium($_POST['user']);
	include_once("vue/adm_premium.php");
}
else
{
	include_once("vue/adm_premium.php");
}
?>