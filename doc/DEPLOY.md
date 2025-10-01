# Procédure de Déploiement

Décrivez ci-dessous votre procédure de déploiement en détaillant chacune des étapes. De la préparation du VPS à la méthodologie de déploiement continu.


## Méthode de déploiement

Pour commencer j'ai créé un fichier Dockerfile
Celui ci utilise l'image de PHP 8.1
Je copie le contenu du code dans l'image généré par le dockerfile
Une fois réalisé, je créer un docker compose afin de mettre en container l'image du code créer ainsi que la base de données.
Il me suffit ensuite de construire l'image avec la commande docker build -t habit-tracker-app .
De sauvegrader cette image dans le repertoire avec docker save taskmanager-app -o habit-tracker-app.tar

Ensuite je vais dans la machine virtuelle et je copie/colle les fichier 
- habit-tracker-app.tar
- docker-compose.yml

j'aurias juste a créer le fichier .env pour les vaiable d'environnement en production
Le déploiement ne fonctionnant pas, je pense avoir des souci sur l'utilisation de composer.