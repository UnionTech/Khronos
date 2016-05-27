#! /bin/bash

# Script où on créé juste l'utilisateur unix avec son inclusion au groupe.
# Application des quotas sur l'utilisateur

#********************AJOUT DE L'UTILISATEUR DANS LE GROUPE KHRONOS*******************************

pass=$(perl -e 'print crypt($ARGV[0], "password")' $mdp)
useradd -m -p $pass $nom_domaine
usermod -a -G khronosUsers $nom_domaine

#********************************APPLICATION DES QUOTAS********************************
edquota -p julie $nom_domaine