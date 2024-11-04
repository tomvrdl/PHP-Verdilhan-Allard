# PHP-Verdilhan-Allard

## Description
Ce projet consiste en la création d'un site web de citations en ligne avec les langages HTML, CSS et PHP avec les fonctionnalitées suivantes :

## Accès au site
- Télécharger les fichiers dans le dernier patch dans la dernière branche ( si erreur de téléchargement des images, elles se trouvent dans le dossier php projet ).
- Installer et Lancer Wampserver64.
- Se connecter sur le site https://admin.alwaysdata.com/login/
  
- **Entrer les identifiants suivant :**
  - Courriel : `tomverdilhan@gmail.com`
  - Mot de passe : `T@mClément13!`

- Une fois connecté se rendre sur la base de donnée MySQL et se connecter à php admin avec le lien suivant : https://phpmyadmin.alwaysdata.com
- **Entrer les identifiants suivant :**
  - Utilisateur : `verdilhan`
  - Mot de passe : `T@mClément13!`

## Page principale
- Création de la page `index.php` avec un fond d'écran carrousel.

## Connexion
- Formulaire de connexion relié à la base de données.
- Message d'erreur si mauvais identifiants.

## Utilisateurs
- **Visiteur :**
  - Identifiant : `user`
  - Mot de passe : `1234`
- **Administrateur :**
  - Identifiant : `admin`
  - Mot de passe : `1234`

## Fonctionnalités
- **Pour les utilisateurs :** Après connexion, le visiteur est redirigé vers `citation.php` pour écrire une citation. Un bouton "Valider" permet de retourner à `index.php`, où la citation sera affichée.
  
- **Pour les administrateurs :** Après connexion, l'admin est redirigé vers `admin_dashboard.php` pour gérer les citations (suppression). Un bouton "Déconnexion" permet de revenir à `index.php`.
