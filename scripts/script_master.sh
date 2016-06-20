#! /bin/bash

echo "Bienvenue chez KHRONOS";
bool=1

cat <<-FIN
Choissisez une option:

1 - Inscription
2 - Connexion
3 - Je veux créer un boite mail
4 - Gérer le site (réservé aux admins)
0 - Quitter

FIN

echo -n "Votre choix: "
read reponse1
case "$reponse1" in
	"1" ) echo -n "Votre pseudo: "
		read pseudo
		echo -n "Votre mail: "
		#NPO vérifier si déjà existant ou non !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		read mail
		echo -n "Votre mot de passe: "
		read mdp
		./script_creation_user.sh $pseudo $mdp
		mysql -u root -p"jesuisuneprincesse94" -e "INSERT INTO Khronos.User(pwd,mail,admin,etat,pseudo) VALUES('$mdp','$mail',0,'deconnecte','$pseudo')" 2>&1
		echo "Vous êtes bien inscrit, veuillez vous connecter:"
		echo -n "Votre pseudo: "
		read pseudo
		echo -n "Votre mot de passe: "
		read mdp
		./verif_compte.sh $pseudo $mdp
		rep=$(cut -c1 verif_compte.txt)
		if [ $rep == 0 ]
		then
			bool=0
			mysql -u root -p"jesuisuneprincesse94" -e "UPDATE Khronos.User SET etat='connecte' WHERE pseudo='$pseudo'" 2>&1
		fi
		;;
	"2" ) echo -n "Votre pseudo: "
		read pseudo
		echo -n "Votre mot de passe:"
		read mdp
		./verif_compte.sh $pseudo $mdp		
		rep=$(cut -c1 verif_compte.txt)
		if [ $rep == 0 ]
		then
			bool=0
			mysql -u root -p"jesuisuneprincesse94" -e "UPDATE Khronos.User SET etat='connecte' WHERE pseudo='$pseudo'" 2>&1
		fi
		;;
	"3" ) echo -n "Nom de la boîte mail: "
		read nom
		#Vérifier si boîte mail existe déjà
		./script_smtp.sh 1 $nom
		./script_imap.sh 1 $nom
		;;
	"4" ) echo -n "Veuillez donner votre pseudo admin: "
		read pseudo
		echo -n "Veuillez donner votre mot de passe admin: "
		read mdp
		./verif_admin.sh $pseudo $mdp
		rep=$(cut -c1 verif_admin.txt)
		if [ $rep == 0 ]
		then
			while :
			do
				cat <<-FIN
				
				Choissisez une option:

				1 - Bannir un utilisateur
				2 - Effacer un contenu illicite
				3 - Faire passer un basique en premium
				0 - Se déconnecter
			
				FIN
				
				echo -n "Votre choix: "
				read reponse3
				case "$reponse3" in
					"1" )
						./liste_user.sh
						i=1
						while read user
						do
							echo "$i - $user"
							i=$(($i+1))
						done<a.txt
						echo -n "Votre choix: "
						read choix
						p=$(sed -n "$choix p" a.txt)
						./banir.sh $p
						;;
					"2" ) cat <<-FIN
						
						Voulez-vous supprimer:
						
						1 - Un site
						2 - Un document
						
						FIN
						echo -n "Votre choix: "
                                                read choix
						case $choix in
							"1" ) ./liste_site.sh
                                                		i=1
                                                		while read site
                                                		do
                                                        		echo "$i - $site"
                                                        		i=$(($i+1))
                                                		done<a.txt
                                                		echo -n "Votre choix: "
                                                		read choix
								p=$(sed -n "$choix p" a.txt)
								echo $p
								#pas de mise en place	
								;;
							"2" ) ;;
							* ) echo "je ne peux rien faire pour vous" 
								exit 0 ;;
						esac
						;;
					"3" ) ./liste_user.sh
						i=1
						while read user
						do
							echo "$i - $user"
							i=$(($i+1))
						done <a.txt
						echo -n "Votre choix: "
						read choix
						p=$(sed -n "$choix p" a.txt)
						./basique_premium.sh $p
						echo "$p est désormais un admin";;
					"0" ) echo "Au revoir"
						exit 0;;
					* ) echo "Je ne connais pas cette commande";;
				esac
			done
		fi
		;;
	"0" ) echo "Au revoir"
		exit 0;;
	* ) echo "Je ne connais pas cette commande";;
esac

if [ $bool == 0 ]
then
	while :
	do
		cat <<-FIN
		
			Choissisez une option :

			1 - Je veux héberger un site
			2 - Je veux faire du transfert de fichier
			3 - Gérer mon compte utilisateur
			0 - Se déconnecter
		
		FIN

		echo -n "Votre choix: "
		read reponse2
		case "$reponse2" in
			"1" ) echo -n "Temporalité (en heure(s))"
				read tmp
				echo -n "Une bdd ? (y/n) "
				read bdd
				#vérifier si le site existe déjà
				./script_creation_site.sh $pseudo $mdp $tmp $bdd 
				echo "Rendez-vous à l'adresse $pseudo.khronos.itinet.fr avec vos identifiants de connexion";;
			"2" ) echo "Mise en place de votre cloud."
				#vérifier si le compte existe déjà
				./script_cloudCreateUser.sh $pseudo $mdp 
				echo "Rendez-vous à l'adresse cloud.khronos.itinet.fr avec vos identifiants de connexion";;
			"3" ) cat <<-FIN
				
				Choissisez une option :
				
				1 - Devenir premium
				2 - Gérer mes informations

				FIN
				echo "Votre choix : "
				read choix
				if [ $choix == 1 ]
				then
					cat <<-FIN
					
					Choissisez une option :
					
					1 - Payer avec Paypal
					2 - Tenter sa chance !	
					
					FIN
					echo "Votre choix : "
					read choix
					case "$choix" in
						"1" ) echo "ouverture probable d'une page paypal" ;;
						"2" ) rep=$(sed -n '1 p' compteur.txt)
							if [ $rep -le 10 ]
							then
        							echo "Vous pouvez passer admin ! Vous êtes le $rep ème !"
								mysql -u root -p"jesuisuneprincesse94" -e "UPDATE Khronos.User SET offre=1 WHERE pseudo='$pseudo'" 2>&1
        							rep=$(($rep+1))
        							echo $rep > compteur.txt
							fi
							;;
						* );;
					esac
				else
					cat <<-FIN
					
					Choissisez une option :
					
					1 - Changer le pseudo
					2 - Changer le mot de passe
					
					FIN
					echo "Votre choix : "
					read choix
					case "$choix" in
						"1" ) echo -n "Votre nouveau pseudo: "
							read nom
							mysql -u root -p"jesuisuneprincesse94" -e "UPDATE Khronos.User SET pseudo='$nom' WHERE pseudo='$pseudo'" 2>&1							
							;;
						"2" ) echo -n "Votre nouveau mot de passe"
							read mdp
							mysql -u root -p"jesuisuneprincesse94" -e "UPDATE Khronos.User SET pwd='$mdp' WHERE pseudo='$pseudo'" 2>&1
							;;
						* ) echo "Votre demande ne veut rien dire."
							exit 0 ;;
					esac
				fi ;;
				
			"0" ) echo "Au revoir."
				mysql -u root -p"jesuisuneprincesse94" -e "UPDATE Khronos.User SET etat='deconnecte' WHERE pseudo='$pseudo'" 2>&1
				exit 0;;
			* ) echo "Je ne connais pas cette commande.";;
		esac
	done
else
	echo "Je ne peux rien faire pour vous."
fi

