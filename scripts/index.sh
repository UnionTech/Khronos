#! /bin/bash

nom_domaine="$1"
#touch /var/www/UsersSites/$nom_domaine/index.php
echo "<?php echo '<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <link rel=\"icon\" href=\"favicon.ico\">
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">
    <title>$nom_domaine-Landing page KHRONOS</title>
    <link rel=\"stylesheet\" href=\"vhost/css/bootstrap.min.css\" type=\"text/css\">
    <link href=\'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800\' rel=\'stylesheet\' type=\'text/css\'>
    <link href=\'http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic\' rel=\'stylesheet\' type=\'text/css\'>
    <link rel=\"stylesheet\" href=\"vhost/font-awesome/css/font-awesome.min.css\" type=\"text/css\">
    <link rel=\"stylesheet\" href=\"vhost/css/animate.min.css\" type=\"text/css\">
    <link rel=\"stylesheet\" href=\"vhost/css/creative.css\" type=\"text/css\">
</head>
<body id=\"page-top\">
    <header>
        <div class=\"header-content\">
            <div class=\"header-content-inner\">
                <img src=\"vhost/Logo.png\" width=70% height=70%/>
                <h2>Landing page $nom_domaine</h2>
                <hr>
                <p>A vous de jouer, uploadez vos fichiers à l\'aide de Filezilla !</p>
                <a href=\"https://filezilla-project.org/download.php\" class=\"btn btn-primary btn-xl page-scroll\">Télécharger Filezilla</a>
            </div>
        </div>
    </header>
    <script src=\"js/jquery.js\"></script>
    <script src=\"js/bootstrap.min.js\"></script>
    <script src=\"js/jquery.easing.min.js\"></script>
    <script src=\"js/jquery.fittext.js\"></script>
    <script src=\"js/wow.min.js\"></script>
    <script src=\"js/creative.js\"></script>
</body>
</html>
'; ?>">/var/www/UsersSites/$nom_domaine/index.php
chmod 744 /var/www/UsersSites/$nom_domaine/index.php
cp -ar /var/www/vhost /var/www/UsersSites/$nom_domaine/vhost
cp /var/www/site/favicon.ico /var/www/UsersSites/$nom_domaine/favicon.ico
