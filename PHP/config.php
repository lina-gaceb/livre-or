<?php 
    // Informations d'identification
    $host = 'localhost';
    $dbname = 'livreor';
    $login = 'root';
    $password = '';

    //connexion base donnée
    try 
    {
        $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$login,$password);
    }

    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }