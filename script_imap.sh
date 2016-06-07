#!/bin/bash
#$1  1)Ajout  2)Suppression
#$2  Nom d'utilisateur

cd /etc/courier/

test=`sudo cat userdb | grep "/$2|"`

case $1 in

                1)
                        if [[ -z $test ]];
                        then
                                sudo userdb $2 set imappw=$(openssl passwd -1 $2) uid=1008 gid=1009 home=/var/mail/$2 mail=/var/mail/$2
                        else
                                        exit 1
                        fi
                ;;

                2)
                        if [[ -n $test ]];
                        then
                                sudo sed -i -e "s&$test&&g" userdb
                                sudo sed -i -e '/^$2/d' userdb
                        else
                                        exit
                        fi
                ;;

esac

at now +1 weeks <<FIN
sudo sed -i -e "s&$test&&g" userdb
sudo sed -i -e '/^$2/d' userdb
FIN

sudo makeuserdb
