#! /bin/bash


function passage (){

	pseudo=$1

	bool=1
	mysql -u root -p"jesuisuneprincesse94" -e "UPDATE Khronos.User SET admin=1 where pseudo='$pseudo'" > a.txt 2>&1
}
passage $1
