#! /bin/bash

#fqdn="test.khronos"
sed "/$1/ d" /etc/tinydns/root/data > /etc/tinydns/root/data.tmp
mv /etc/tinydns/root/data.tmp /etc/tinydns/root/data

cd /etc/tinydns/root
make

