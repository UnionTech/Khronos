#! /bin/bash


function banir (){

	pseudo=$1
	mysql -u root -p"jesuisuneprincesse94" -e "delete from Khronos.User where pseudo='$pseudo'" 2>&1
	mysql -u root -p"jesuisuneprincesse94" -e "DROP USER '$pseudo'@'localhost'" 2>&1
	mysql -u root -p"jesuisuneprincesse94" -e "DROP DATABASE $pseudo" 2>&1
	rm -Rf /var/www/UsersSites/$pseudo 2>&1
	rm /etc/nginx/sites-available/$pseudo 2>&1
	rm /etc/nginx/sites-enabled/$pseudo 2>&1
	rm -rf /var/www/Usersites/$pseudo 2>&1
	service nginx reload 2>&1
	service php5-fpm reload 2>&1
	sed "/$pseudo.khronos.itinet/ d" /etc/tinydns/root/data > /etc/tinydns/root/data.tmp 2>&1
	mv /etc/tinydns/root/data.tmp /etc/tinydns/root/data 2>&1
	cd /etc/tinydns/root 2>&1
	make 2>&1
	ssh -i /root/.ssh/id_rsa root@dedibox.itinet.fr 2>&1
	cd - 2>&1
	sed "/$pseudo:/ d" /etc/nginx/.htpasswd > /etc/nginx/.htpasswd.tmp 2>&1
	mv /etc/nginx/.htpasswd.tmp /etc/nginx/.htpasswd 2>&1
	rm /etc/nginx/.htpasswd.tmp 2>&1
	userdel -fr $pseudo 2>&1
}

banir $1
