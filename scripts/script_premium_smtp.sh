#!/bin/bash
#$1 1:Ajout  2:Suppression
#$2 Utilisateur

cd /etc/postfix/

test=`sudo cat vmailbox | grep $2`
case $1 in
	1)
		if [[ -z $test ]];
		then
				sudo bash -c "echo '$2@khronos.itinet.fr $2/'>> vmailbox"
				sudo mkdir /var/mail/$2
				sudo chmod 700 /var/mail/$2
				sudo chown khronos_mail:khronos_mail /var/mail/$2
		else
			exit 1
		fi
	;;
	2)
		if [[ -n $test ]];
		then
			sudo sed -i -e "/^$2@khronos.itinet.fr /d" vmailbox
			sudo rm -R /var/mail/$2
		else
			exit
		fi
	;;

esac

sudo postmap vmailbox
sudo postfix reload

