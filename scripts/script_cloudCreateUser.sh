#!/bin/bash

curl -d userid=$1 -d password=$2 http://khronos:jesuisuneprincesse94@cloud.khronos.itinet.fr/ocs/v1.php/cloud/users
curl -d groupid="Utilisateurs" http://khronos:jesuisuneprincesse94@cloud.khronos.itinet.fr/ocs/v1.php/cloud/users/$1/groups

