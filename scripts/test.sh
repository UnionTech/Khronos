#! /bin/bash

nom_domaine=$1
htpasswd -b /etc/nginx/.htpasswd $nom_domaine $nom_domaine
rm /etc/nginx/sites-available/$nom_domaine
rm /etc/nginx/sites-enabled/$nom_domaine

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
    auth_basic 'Restricted';
    auth_basic_user_file /etc/nginx/.htpasswd;
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
}">/etc/nginx/sites-available/$nom_domaine
ln -s /etc/nginx/sites-available/$nom_domaine /etc/nginx/sites-enabled/$nom_domaine
service nginx reload
#service php5-fpm reload
