#! /bin/bash


function liste (){

	bool=1
	mysql -u root -p"jesuisuneprincesse94" -e "select nomSite from Khronos.siteUser" > a.txt 2>&1

	sed '1d' a.txt > b.tmp
	mv b.tmp a.txt
	sed '1d' a.txt > b.tmp
	mv b.tmp a.txt

	#rm -f b.tmp a.txt
}

liste 
