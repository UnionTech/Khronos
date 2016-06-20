<?php
include_once("modele/mail.php");
include_once("modele/mail_premium.php");
if (isset($_POST['mail']))
{
	$verifmail1=verifmail1($_POST['mail']);
        $verifmail2=verifmail2($_POST['mail']);
	$verifnom=preg_match('/\s/',$_POST['mail']);
        if ($verifmail1 == 0 AND $verifmail2 == 0)
        {
		if ($verifnom == 0°
		{
                	nouveaumail($id, $_POST['mail']);
	                $mail = $_POST['mail'];
        	        echo $mail;
                	exec("sudo /var/www/scripts/script_smtp.sh 1 $mail");
	                exec("sudo /var/www/scripts/script_imap.sh 1 $mail");
        	        header('Location: http://rainloop.khronos.itinet.fr');
		}
		else
		{
                $alerte = "<!-- alerte rouge -->
<div class='alert alert-danger alert-dismissible' role='alert' style='width:70%;margin:0 auto;opacity: 0.7'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
<strong>Veuillez choisir un autre nom, celui-ci contient des espaces.</strong></div>
</div>
<!-- fin alerte rouge -->";
                include_once("vue/mail.php");
		}
        }
        else
        {
                $alerte = "<!-- alerte rouge -->
<div class='alert alert-danger alert-dismissible' role='alert' style='width:70%;margin:0 auto;opacity: 0.7'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
<strong>Veuillez choisir un autre nom, celui-ci est déjà pris.</strong></div>
</div>
<!-- fin alerte rouge -->";
                include_once("vue/mail.php");
        }
}
else
{
	include_once("vue/mail.php");
}
?>
