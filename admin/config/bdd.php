<?php
    // Stocker la connexion à la bdd

    $dsn = 'mysql:dbname=bibliotheque_real;host=localhost';
    $utilisateur = 'bibliotheque';
    $mdp = 'F)0@NZM4gg_2a3SD';

    try {
        $bdd = new PDO($dsn, $utilisateur, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }catch (PDOException $e){
        die('Erreur avec la base de données;');
    }
?>