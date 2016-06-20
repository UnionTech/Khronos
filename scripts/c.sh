#! /bin/bash

a="des roses";
b=$(echo $a | sed -e 's/[[:blank:]]//g'); 
echo $b;
