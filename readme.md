# < PROJECT OC SYMF />
## Présentation du projet
Ce projet fait suite à une demande de candidature à la formation "Développeur d'application - PHP/Symfony" d'OpenClassrooms. 
N'ayant pas d'expériences professionnelles officielles ou de diplôme en informatique, il m'a été demandé de présenter un 
projet en vidéo d'une durée de 10 minutes.

Ne connaissant pas les attentes de la plateforme, j'ai décidé de réaliser un nouveau projet avec quelques complexités.
J'ai choisi le thème des jeux vidéos en proposant une application web contenant une liste de jeux vidéos ajouté au fur 
et à mesure de leur sortie. Laissant la possibilité de s'inscrire et d'émettre un avis avec une note.

Il existe deux types d'utilisateurs : "USER" et "ADMIN".
- L'utilisateur peut accéder à sa page de profil afin de modifier ses informations personnelles et ajouter une photo de profil.
Il peut lire l'article d'un jeu et y laisser son avis avec son vote.
- L'administrateur a accès à un tableau de bord dont il est seul à pouvoir visualiser la liste de tous les utilisateurs et 
de tous les articles de jeux vidéos. Pour les utilisateurs, il peut seulement rendre actif ou inactif un compte utilisateur.
En revanche, pour les articles de jeux vidéos, s'il souhaite en modifier son contenu, il lui faut visualiser l'article correspondant.
Il aura ainsi accès à des boutons que seul lui peut voir. Il n'est pas possible pour un administrateur d'y laisser un avis et un vote.

Pour ce projet, j'ai choisi d'utiliser Symfony et Twig afin de rester en concordance avec le thème de la formation que je souhaite
réaliser. Pour ceux qui souhaitent essayer le projet sur leur machine, mais qui ne veulent pas installer php, symfony ou mysql, 
j'ai dockerisé le projet avec uniquement un container php et mysql.

J'ai également ajouté des fixtures pour créer 100 utilisateurs (**admin@test.com**, **user1@test.com** ...> **user99@test.com** / mot de passe : **123123**), 
une dizaine de jeux en 5 exemplaires et des avis random. Les données ne sont pas en lorem ipsum, j'ai récupéré la majorité
d'entre-elles sur steam et wikipedia. Pour les avis, j'ai créé une liste avec des avis négatifs et positifs.

Vous pouvez tester le projet à l'adresse suivante : https://www.mehdi-haddou.fr

## Installation

### Fichier d'environnement pour l'application Symfony :
Créer un fichier ".env" à la racine du dossier "app". Copier et coller à l'intérieur de ce fichier, les lignes suivantes :
```dotenv
APP_ENV=dev
APP_SECRET=cba8a257d4a315256b938fe8b88c47d3
MESSENGER_TRANSPORT_DSN=doctrine://default?auto_setup=0
# A Modifier en fonction de votre configuration de votre machine local si vous n'utilisez pas Docker
DATABASE_URL="mysql://root:password@db/db_dev?serverVersion=8&charset=utf8mb4"
```

### Installation de Docker (pour ceux qui le souhaitent) :
Suivant votre distribution (OSX, Windows, Linux), vous pouvez suivre les instructions sur la page officiel :
https://docs.docker.com/engine/install/

### Avec Docker :
Une fois que docker est installé sur votre machine, vous devez créer le volume pour la base de données mysql.
Ensuite vous devez lancer les containers puis créer la database, mettre à jour le schema et charger les fixtures dans le 
container php.

Dans le terminal, à la racine du projet, faites les commandes suivantes :

<u>Création du volume pour la base de données mysql</u> :
```bash
docker volume create oc_dev
```

<u>Lancement des containers "php" et "db"</u> :
```bash
docker-compose -f docker-compose.dev.yml up -d --build
```

<u>Se connecter au terminal du container php</u> :
```bash
docker exec -it symf-oc-project_php_1 bash
```
A ce stade, vous vous trouverez à la racine du projet dans le container php où se trouve toute l'application.

<u>Installation des dépendances</u> :
```bash
symfony composer install
```

<u>Création de la base de données</u> :
```bash
symfony console d:d:c --env=dev
```

<u>Mise à jour du schema de la base de données</u> :
```bash
symfony console d:s:u -f --env=dev
```

<u>Chargement des fixtures dans la base de données</u> :
```bash
symfony console d:f:l --env=dev
```
(*) <small>Cette étape peut être plus ou moins longue.</small>

<u>Sortir du container "php"</u> :
```bash
exit
```

<u>Arrêter les containers "php" et "db"</u> :
```bash
docker-compose -f docker-compose.dev.yml down -v
```

### Sans Docker
#### il sera nécessaire d'installer le cli de symfony et php 8.1 pour exécuter le projet, avoir accès à une base donnée mysql et composer d'installé.
(*) <small>N'oubliez pas de modifier le fichier .env avec les informations de votre base de données.</small>

#### Installation du CLI de symfony :
Suivez les indications de la page officiel : https://symfony.com/download

#### Installation Composer :
Suivez les indications de la page officiel : https://getcomposer.org/download/

#### Mise en place de l'application :

Dans le terminal, allez à la racine du dossier "app" et exécutez les commandes suivantes :

<u>Installation des dépendances</u> :
```bash
composer install
```

<u>Création de la base de données</u> :
```bash
symfony console d:d:c --env=dev
```

<u>Mise à jour du schema de la base de données</u> :
```bash
symfony console d:s:u -f --env=dev
```

<u>Chargement des fixtures dans la base de données</u> :
```bash
symfony console d:f:l --env=dev
```
(*) <small>Cette étape peut être plus ou moins longue.</small>

<u>Lancement du serveur</u> :
```bash
symfony console serve -d --port=3000
```

<u>Arrêter le serveur</u> :
```bash
symfony console server:stop
```