# PHP-Verdilhan-Allard

## Description
Ce projet consiste en la création d'un site web simple avec les fonctionnalités suivantes :

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
