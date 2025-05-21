# ECF-projet-coRide-STUDI
Repository for my exam at the STUDI school. This is a project for an eco-friendly carpooling platform for José and his startup, ÉcoRide.

# Description
Application de covoiturage avec une démarche écologique, mise en avant des trajets dit écologiques. 
Fonctionnalités principales de l'application : 
=> US 1 Page d'accueil
=> US 2 Menu nav barre
=> US 3 Recherche de trajets
=> US 4 Filtres
=> US 5 Détails trajet
=> US 6 Participer au trajet
=> US 7 Création de compte
=> US 8 Espace User
=> US 9 Ajout de trajet
=> US 10 Historique de trajet
=> US 11 Bouton Démarrer/Arrêter trajet
=> US 12 Espace employé
=> US 13 Espace Admin

#Prérequis 
=> technologies : Symfony, MongoDB, PostgreSQL, php, Docker en option, Git et les extensions pour symfony pour BDD
=> Version : Symfony 5.10.6,MongoDB 8.0.9, PostgreSQL 17.5,php 8.4.2, Docker 28.1.1 , Git 2.49.0

#Strucutre du projet 
ecoride/
|--assets
|--bin
|--config
|--migrations
|--public
|--src
|--templates
|--tests
|--translations
|--var
|--vendor
|--.env
|--README.md

#Git
-3 branches pour le rendu, main, develoment et Documents pdf pour les annexes du projet
-2 commits sur development

#Méthode de déploiement en local :

prérequis :
-php>8.1, avec extensions mongodb et postgreSQL => décocher dans fichier php.ini
-Composer et ses dépendances 
-Symfony CLI
-XAMP
-MongoDB et MongoDB Compass
-PostgreSQL et pgAdmin4
-Mailgun

configurer .env.local :
-DATABASE_URL="postgresql://utilisateur:motdepasse@127.0.0.1:5432/ma_base" voir copie : TP_DWWM_Juin/Juil/sept/Oct25_copiearendre_RECHES_loic.pdf
-MONGODB_URL="mongodb://127.0.0.1:27017"

Lancer le server symfony cli :
-symfony serve

Ouvrir la page https://127.0.0.1:8000/

#Contact
-Reches
-Loïc
-loicreches@gmail.com
