#!/bin/bash

IP=88.177.168.133

#$1 1)creer 2)suppression
#$2 nom fqdn
cd /etc/tinydns/root
case $1 in
        1)
                if [[ -z $test ]] ; then
                        sudo bash -c "echo '+$2.khronos.itinet.fr:$IP' >> data"
                else
                        exit 1
                fi
        ;;

        2)
                        sudo sed "/$2/ d" /etc/tinydns/root/data > /etc/tinydns/root/data.tmp
                         mv /etc/tinydns/root/data.tmp /etc/tinydns/root/data
        ;;
esac

sudo make
sudo ssh -i /root/.ssh/id_rsa root@dedibox.itinet.fr


