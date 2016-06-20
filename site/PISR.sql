create database PISR;

create table user (
	user int,
	mail varchar(50),
	mdp varchar(100),
	etat varchar(20)
);

insert into user values (1, "gaelle@gmail.com", "gaelle1", "deconnecte");
insert into user values (2, "carina@gmail.com", "carina1", "deconnecte");


$nom_domaine="lydia";
$tmp=1;
$bdd="y";
include_once("index.html");
exec("sudo /var/www/scripts/script_creation_user.sh $nom_domaine $nom_domaine");


UPDATE user
SET etat = 'deconnecte'
WHERE mail = 'gaelle@gmail.com';