#! /bin/bash

# Script où on créé le fqdn, la bdd, le vhost et Filezilla
# Plus prise en compte du temps

nom_domaine=$1
mdp=$2
tmp=$3
reponse_bdd=$4

#***Ajout du shell adéquat****
usermod -s /usr/bin/mysecureshell $nom_domaine

#***************************CREATION DU FQDN*************************************
IP=88.177.168.133

cd /etc/tinydns/root >/dev/null 2>&1
        sudo bash -c "echo '+$nom_domaine.khronos.itinet.fr:$IP' >> data" >/dev/null 2>&1
        make >/dev/null 2>&1
        ssh -i /root/.ssh/id_rsa root@dedibox.itinet.fr >/dev/null 2>&1
cd - >/dev/null 2>&1

#***************************CREATION USER DB******************************************

if [ "$reponse_bdd" == "y" ]
then
	#****Création d'un utilisateur****
        mysql -u root -p"jesuisuneprincesse94" -e "CREATE USER '$nom_domaine'@'localhost' IDENTIFIED BY '$mdp'" >/dev/null 2>&1
        #****Création de la base de données de l'utilisateur****
        mysql -u root -p"jesuisuneprincesse94" -e "CREATE DATABASE $nom_domaine" >/dev/null 2>&1
        #****Dont des privilèges à l'utilisateur****
        mysql -u root -p"jesuisuneprincesse94" -e "GRANT ALL PRIVILEGES ON $nom_domaine.* TO '$nom_domaine'@'localhost'" >/dev/null 2>&1
fi

#****************************CREATION DU VHOST***************************************

#****Création du répertoire pour les répertoires et fichiers de l'utilisateur****
mkdir -p /var/www/UsersSites/$nom_domaine >/dev/null 2>&1

#****Pas de création de répertoire www dans le home mais création lien symbolique**** 
ln -s /var/www/UsersSites/$nom_domaine /home/$nom_domaine/www

#****Création des index (html et php)****
touch /var/www/UsersSites/$nom_domaine/index.php >/dev/null 2>&1
cd /var/www/UsersSites/$nom_domaine/ >/dev/null 2>&1

#****Remplissage du fichier index.html****
echo "<?php echo \"<center><img style=\"width: 95%; height:95%;\" src=sablier.jpg></center>
<h1 style=\"position:absolute; top:180; left:1040;\">KHRONOS</h1>
<h2 style=\"position:absolute; top:220; left:1060;\">$nom_domaine</h2>
<h3 style=\"position:absolute; top:260; left:1050;\">Landing page</h3>\" ?>">index.html

#****Remplissage du fichier index.php****
chown -R $nom_domaine:www-data /var/www/UsersSites/$nom_domaine >/dev/null 2>&1
cd -

/var/www/scripts/index.sh $nom_domaine

#****Création du fichier du vhost****
cd /etc/nginx/sites-available/ >/dev/null 2>&1
touch $nom_domaine >/dev/null 2>&1

#****Remplissage du fichier du vhost****
echo "
server {
  server_name $nom_domaine.khronos.itinet.fr;

  access_log /var/log/nginx/$nom_domaine.khronos.itinet.fr.access.log;
  error_log /var/log/nginx/$nom_domaine.khronos.itinet.fr.error.log;

  root /var/www/UsersSites/$nom_domaine;
  client_max_body_size 5G;
  fastcgi_buffers 64 4K;

  gzip off;

  rewrite ^/caldav(.*)$ /remote.php/caldav\$1 redirect;
  rewrite ^/carddav(.*)$ /remote.php/carddav\$1 redirect;
  rewrite ^/webdav(.*)$ /remote.php/webdav\$1 redirect;

  index index.php;
 error_page 403 /core/templates/403.php;
  error_page 404 /core/templates/404.php;

  location = /robots.txt {
    allow all;
    log_not_found off;
    access_log off;
  }

  location ~ ^/(?:\.htaccess|data|config|db_structure\.xml|README){
    deny all;
  }

  location / {
    rewrite ^/.well-known/host-meta /public.php?service=host-meta last;
    rewrite ^/.well-known/host-meta.json /public.php?service=host-meta-json last;

    rewrite ^/.well-known/carddav /remote.php/carddav/ redirect;
    rewrite ^/.well-known/caldav /remote.php/caldav/ redirect;

    rewrite ^(/core/doc/[^\/]+/)$ \$1/index.php;

    try_files \$uri \$uri/ /index.php;
  }

  location ~ \.php(?:$|/) {
    fastcgi_split_path_info ^(.+\.php)(/.+)$;
    include fastcgi_params;
   fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
    fastcgi_param PATH_INFO \$fastcgi_path_info;
    fastcgi_param HTTPS on;
    fastcgi_pass php-handler;
    fastcgi_intercept_errors on;
  }

  location ~* \.(?:css|js)$ {
    add_header Cache-Control \"public, max-age=7200\";
    add_header Strict-Transport-Security \"max-age=15768000; includeSubDomains; preload;\";
    add_header X-Content-Type-Options nosniff;
    add_header X-Frame-Options \"SAMEORIGIN\";
    add_header X-XSS-Protection \"1; mode=block\";
    add_header X-Robots-Tag none;
    access_log off;
  }

  location ~* \.(?:jpg|jpeg|gif|bmp|ico|png|swf)$ {
    access_log off;
  }
}">$nom_domaine

cd - >/dev/null 2>&1

#****Créatio du lien symbolique pour le vhost****
ln -s /etc/nginx/sites-available/$nom_domaine /etc/nginx/sites-enabled/$nom_domaine >/dev/null 2>&1

#****Rechargement des services après création du vhost****
service nginx reload >/dev/null 2>&1
#service php5-fpm reload >/dev/null 2>&1

#**********************************TIMER DE SUPPRESSION*************************************************

#****Temps au bout duquel le vhost est accessible par htpasswd****
#tmpReel=$(($tmp+168))
tmpReel=$(($tmp+5))

#****Mise en place du htpasswd dans le script test****
at now +$tmp hours <<FIN
/var/www/scripts/test.sh $nom_domaine
FIN

#*****Destruction totale du vhost****
at now +$tmpReel hours <<END
#****Destruction de la bdd****
mysql -u root -p"jesuisuneprincesse94" -e "DROP USER '$nom_domaine'@'localhost'"
mysql -u root -p"jesuisuneprincesse94" -e "DROP DATABASE $nom_domaine"
#****Destruction du vhost****
rm -Rf /var/www/UsersSites/$nom_domaine
rm /etc/nginx/sites-available/$nom_domaine
rm /etc/nginx/sites-enabled/$nom_domaine
rm -rf /var/www/Usersites/$nom_domaine
service nginx reload
#service php5-fpm reload
#****Destruction du fqdn****
sed "/$nom_domaine.khronos.itinet/ d" /etc/tinydns/root/data > /etc/tinydns/root/data.tmp
mv /etc/tinydns/root/data.tmp /etc/tinydns/root/data
cd /etc/tinydns/root
make
ssh -i /root/.ssh/id_rsa root@dedibox.itinet.fr
cd -
sed "/$nom_domaine:/ d" /etc/nginx/.htpasswd > /etc/nginx/.htpasswd.tmp
mv /etc/nginx/.htpasswd.tmp /etc/nginx/.htpasswd
rm /etc/nginx/.htpasswd.tmp
END
echo "après deuxième at">>/var/www/scripts/a.txt

