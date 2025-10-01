# Procédure de Déploiement

Décrivez ci-dessous votre procédure de déploiement en détaillant chacune des étapes. De la préparation du VPS à la méthodologie de déploiement continu.


## Méthode de déploiement

Pour commencer j'ai créé un fichier Dockerfile
Celui ci utilise l'image de PHP 8.1
Je copie le contenu du code dans l'image généré par le dockerfile
Une fois réalisé, je créer un docker compose afin de mettre en container l'image du code créer ainsi que la base de données.

Il me suffit ensuite de construire l'image avec la commande "docker build -t habit-tracker-app ."
Problème, au lancement de la commande l'url vers debian est bloqué " # Ign:1 http://deb.debian.org/debian trixie InRelease" "#   Temporary failure resolving 'deb.debian.org'"

Je n'ai pas pu créer l'image de cette façon.DB_HOST="localhost"
DB_PORT="3308"
DB_DATABASE="habit_tracker"
DB_USERNAME="gregory"
DB_PASSWORD="ab6949c1b986c8"
DB_ROOT_PASSWORD="ab6949c1b986c8"

De sauvegrader cette image dans le repertoire avec "docker save habit-tracker-app -o habit-tracker-app.tar"

Ensuite je vais dans la machine virtuelle et je copie/colle les fichier 
- habit-tracker-app.tar
- docker-compose.yml

il me faudra également rediriger le tout dans le dossier de travail que j'ai appelé "project-deploy"

j'aurais juste a créer le fichier .env pour les vaiable d'environnement en production
Le déploiement ne fonctionnant pas, je pense avoir des souci sur l'utilisation de composer.

## Tentative d'urgeence

Dans le cas ou cela ne prend pas, je vais donc devoir utiliser aaPanel. 
J'ai installé aaPanel avec la commande :
``` URL=https://www.aapanel.com/script/install_7.0_en.sh && if [ -f /usr/bin/curl ];then curl -ksSO "$URL" ;else wget --no-check-certificate -O install_7.0_en.sh "$URL";fi;bash install_7.0_en.sh aapanel ```

Le site à été ajouté sur aaPanel, j'ai créer le dépot distant et j'ai créer le nouveau remote au projet avec la commande 
```git remote add vps root@172.17.4.41:/Metz-Numeric-School/habit-tracker-buggy-web-app-bloc-4-dfs-2025-bis-VueGreg```

Je n'ai malheureusement pas le temps de finir...

## Fail de sécurité

JE suis embêté avec la correction de bug, je n'ai pas de visuel, j'essai de me connecter à la base de données depuis le container mais rien y fait, pour autant dans le fichier d'environnement, j'ai bien mis le port exposé.
