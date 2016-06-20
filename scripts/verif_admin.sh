#! /bin/bash


function verif (){

	pseudo=$1
	pwd=$2

	bool=1
	mysql -u root -p"jesuisuneprincesse94" -e "select pseudo,pwd,admin from Khronos.User where pseudo='$pseudo'" > a.txt 2>&1

	sed '1d' a.txt > b.tmp
	mv b.tmp a.txt
	sed '1d' a.txt > b.tmp
	mv b.tmp a.txt

	while read pseudobdd mdpbdd admin
	do
		if [ "$pseudo" == "$pseudobdd" ] && [ "$pwd" == "$mdpbdd" ] && [ "$admin" == 1 ]
		then
			echo "0">verif_admin.txt
			bool=0
		fi
	done < a.txt

	if [ $bool == 1 ]
	then
		echo "1">verif_admin.txt
	fi

	rm -f b.tmp a.txt
}

verif $1 $2
