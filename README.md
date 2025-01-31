# Escape Game 

## Description
Ce projet est une application web permettant de créer, répondre et gérer des questions d'un escape game.

### Fonctionnalités principales :
- Ajouter une question avec un message de succès et d'échec.
- Répondre à une question et afficher le taux de réussite.
- Lister, trier et supprimer des questions.
- Naviguer entre les questions avec des boutons "Précédente" et "Suivante".

---

## Prérequis
- PHP >= 7.4
- MySQL ou MariaDB
- Serveur Web (Apache, Nginx, ou autre)
- Navigateur Web (Google Chrome, Firefox, etc.)

---

## Installation

### 1. Cloner le projet
Téléchargez ou clonez le projet dans le répertoire de votre serveur web (par exemple, `htdocs` pour XAMPP).

### 2. Importer la base de données
1. Ouvrez votre outil de gestion SQL (phpMyAdmin, DBeaver, ou autre).
2. Créez une base de données appelée `escape-game`.
3. Importez le fichier `escape-game.sql` fourni dans ce projet.

### 3. Configurer la connexion à la base de données
1. Ouvrez le fichier `config.php`.
2. Mettez à jour les informations de connexion à la base de données :

$host = "localhost"; // Adresse du serveur
$dbname = "escape-game"; // Nom de la base de données
$username = "root"; // Nom d'utilisateur
$password = ""; // Mot de passe

### 4. Lancer l'application
1. Assurez-vous que votre serveur web est en cours d'exécution.
2. Accédez au projet via votre navigateur web :

http://localhost/escape-game/

---

## Utilisation

### Ajouter une question
1. Cliquez sur le bouton **"Ajouter une question"**.
2. Remplissez le formulaire avec une question, la réponse, et les messages associés.
3. Validez le formulaire pour ajouter la question.

### Répondre à une question
1. Depuis la page d'accueil, cliquez sur **"Voir"** pour accéder à une question.
2. Entrez une réponse dans le champ prévu à cet effet et validez.
3. Le taux de réussite sera mis à jour après chaque tentative.

### Gérer les questions
- **Lister les questions** : La page d'accueil affiche toutes les questions avec leur taux de réussite.
- **Trier les questions** : Utilisez les boutons **"Tri croissant"** et **"Tri décroissant"**.
- **Supprimer une question** : Cliquez sur le bouton **"Supprimer"** pour supprimer une question.

---

## Structure des fichiers
- `index.php` : Liste des questions (page d'accueil).
- `ajouter.php` : Formulaire pour ajouter une question.
- `traiter_ajout.php` : Traitement de l'ajout de questions.
- `question.php` : Affichage et réponse à une question.
- `supprimer.php` : Suppression d'une question.
- `escape-game.sql` : Script SQL pour créer la base de données.

---

## Auteur
Projet réalisé par Clément CASTEX.
