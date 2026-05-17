<?php

// A MODIFIER
// 'dev' quand tu travailles sur WAMP
// 'prod' quand tu envoies sur le serveur réel
define('APP_ENV', 'dev');

// A MODIFIER
// Le chemin racine de ton projet pour éviter les erreurs de liens
define('SITE_URL', '/vite');





/*
|--------------------------------------------------------------------------
| COURS - Connexion à une base de données avec PDO
|--------------------------------------------------------------------------
|
| En PHP moderne, nous utilisons PDO (PHP Data Objects) pour nous connecter
| à une base de données.
|
| Pourquoi PDO ?
| - Compatible avec plusieurs types de bases (MySQL, PostgreSQL, etc.)
| - Plus sécurisé
| - Permet l’utilisation des requêtes préparées
|
| La variable $pdo représentera notre connexion active à la base.
|
*/

// Paramètres de connexion (à adapter selon votre environnement)
$host = "localhost";      // Serveur (localhost en environnement local)
$dbname = "serpe_dor";      // Nom de la base de données
$username = "root";       // Utilisateur MySQL
$password = "";           // Mot de passe

try {

    /*
    |--------------------------------------------------------------------------
    | Création de l'objet PDO
    |--------------------------------------------------------------------------
    |
    | new PDO(...) crée une connexion à la base.
    |
    | "mysql:host=...;dbname=...;charset=utf8"
    | → indique le type de base (mysql)
    | → le serveur
    | → le nom de la base
    | → l'encodage UTF-8 (très important)
    |
    */

    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $username,
        $password
    );

    /*
    |--------------------------------------------------------------------------
    | Gestion des erreurs
    |--------------------------------------------------------------------------
    |
    | Par défaut, PDO ne montre pas clairement les erreurs.
    | Nous activons donc le mode EXCEPTION pour afficher les erreurs
    | proprement en cas de problème.
    |
    */

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    /*
    |--------------------------------------------------------------------------
    | En cas d'erreur de connexion
    |--------------------------------------------------------------------------
    |
    | Si la connexion échoue, on arrête immédiatement le script.
    |
    */

    die("Erreur de connexion : " . $e->getMessage());
}

