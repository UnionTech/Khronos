<?php
include_once("modele/adm_bannir.php");
if (isset($_POST['user'])) 
{
	bannir($_POST['user']);
	include_once("vue/adm_bannir.php");
}
else
{
	include_once("vue/adm_bannir.php");
}
?>