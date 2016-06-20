#! /bin/bash


function verif (){

	pseudo=$1
	pwd=$2

	bool=1
	mysql -u root -p"jesuisuneprincesse94" -e "select pseudo,pwd from Khronos.User where pseudo='$pseudo'" > a.txt 2>&1

	sed '1d' a.txt > b.tmp
	mv b.tmp a.txt
	sed '1d' a.txt > b.tmp
	mv b.tmp a.txt

	while read pseudobdd mdpbdd
	do
		if [ "$pseudo" == "$pseudobdd" ] && [ "$pwd" == "$mdpbdd" ]
		then
			echo "0">verif_compte.txt
			bool=0
		fi
	done < a.txt

	if [ $bool == 1 ]
	then
		echo "1">verif_compte.txt
	fi

	rm -f b.tmp a.txt
}

verif $1 $2
