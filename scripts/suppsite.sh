#! /bin/bash


function supp (){

	nom=$1
	mysql -u root -p"jesuisuneprincesse94" -e "SELECT idSite from Khronos.siteUser where nomSite='$nom'" > a.txt 2>&1
	sed '1d' a.txt > b.tmp
        mv b.tmp a.txt
        sed '1d' a.txt > b.tmp
        mv b.tmp a.txt
	id=$(sed -n "1 p" a.txt)
	echo $id
	#mysql -u root -p"jesuisuneprincesse94" -e "DELETE FROM Khronos.siteUser where idSite=$id" 2>&1
	#faire toutes les requêtes pour supprimer les vhst proprement
	mysql -u root -p"jesuisuneprincesse94" -e "SELECT idUser from Khronos.siteUser where nomSite='$nom'" > a.txt 2>&1
	sed '1d' a.txt > b.tmp
        mv b.tmp a.txt
        sed '1d' a.txt > b.tmp
        mv b.tmp a.txt
        id=$(sed -n "1 p" a.txt)
        echo $id
	mysql -u root -p"jesuisuneprincesse94" -e "SELECT pseudo from Khronos.User where idUser='$id'" > a.txt 2>&1
	sed '1d' a.txt > b.tmp
        mv b.tmp a.txt
        sed '1d' a.txt > b.tmp
        mv b.tmp a.txt
        id=$(sed -n "1 p" a.txt)
        echo $id
	rm -rf /var/www/UsersSites/$pseudo 2>&1
	rm /etc/nginx/sites-available/$pseudo 2>&1
	rm /etc/nginx/sites-enabled/$pseudo 2>&1
	service nginx reload 2>&1
	service php5-fpm reload 2>&1
	
	#sed "/$pseudo.khronos.itinet/ d" /etc/tinydns/root/data > /etc/tinydns/root/data.tmp 2>&1
	#mv /etc/tinydns/root/data.tmp /etc/tinydns/root/data 2>&1
	#cd /etc/tinydns/root 2>&1
	#make 2>&1
	#ssh -i /root/.ssh/id_rsa root@dedibox.itinet.fr 2>&1
	#cd - 2>&1
	#sed "/$pseudo:/ d" /etc/nginx/.htpasswd > /etc/nginx/.htpasswd.tmp 2>&1
	#mv /etc/nginx/.htpasswd.tmp /etc/nginx/.htpasswd 2>&1
	#rm /etc/nginx/.htpasswd.tmp 2>&1
	#userdel -fr $pseudo 2>&1
}

supp $1
