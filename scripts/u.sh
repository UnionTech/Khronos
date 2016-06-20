#! /bin/bash

pseudo="luna"
rep=$(sed -n '1 p' compteur.txt)
if [ $rep -le 10 ]
then
	echo $rep
	mysql -u root -p"jesuisuneprincesse94" -e "UPDATE Khronos.User SET offre=1 WHERE pseudo='$pseudo'" 2>&1
	rep=$(($rep+1))
	echo $rep > compteur.txt
fi
