<?php
include_once("modele/sftp.php");
$id = recuperationidUser($_SESSION['pseudo']);
include_once("vue/sftp.php");
if (isset($_POST['validation']))
{
	nouveaufichier($id, 168);
}
?>