<img src="public/img/favicon.svg" alt="Adlink.bio" width="100"/>

# Adlink.bio
Projet fictif d'un CMS permettant de générer une landing page par utilisateur et customisable sur Symfony.

## Le CMS comporte :
- Un **espace administrateur** qui leur permette de gérer l’ensemble des comptes clients.
- Chaque client a un **espace membre** pour gérer uniquement sa landing page.

## Les 5 sections de la landing page :
- Upload d’un **logo** et renseigner un **titre** et une **baseline**
- Possibilité d’intégrer une **vidéo YouTube**
- Afficher des **codes promo**
- Spécifier des **liens vers des ressources** externes (blog, boutique, évènements…)
- Spécifier des **liens vers ses réseaux sociaux** (Instagram, Facebook, TikTok, Twitter, GitHub, YouTube dans un premier temps)

La landing page publique est accessible à l’URL suivante : `https://adlink.bio/{slug-client}`

Il est possible aussi de customiser l’interface en y définissant globalement une **typographie** et en fonction de la section, il sera également possible de changer les **couleurs**.
L'utilisateur pourra aussi définir si la section sera **visible** ou non.

## Installation

  1. Installer les dépendances :

      ```bash
      composer install
      npm install
      ```

  2. Créer un fichier `.env.local` à la racine du projet et y ajouter la configuration de la base de données

      ```env
      ###> doctrine/doctrine-bundle ###
      DATABASE_URL="mysql://user:password@127.0.0.1:3306/bdd_name?serverVersion=mariadb-10.4.13"
      ###< doctrine/doctrine-bundle ###
      ```

  3. Créer la base de données :

      ```bash
      symfony console doctrine:database:create
      ```

  4. Mettre à jour la base de données :

      ```bash
      symfony console doctrine:migrations:migrate
      ```

  5. build les assets :

      ```bash
      npm run build
      ```

  6. Lancer le serveur :

      ```bash
      symfony serve -d
      ```

---
