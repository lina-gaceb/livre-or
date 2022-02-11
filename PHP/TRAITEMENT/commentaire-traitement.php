<?php
session_start();

require_once('../config.php');

// si la session existe pas on redirige

if (!isset($_SESSION['id'])) {
    header('Location:../../index.php');
    die();
}

//on recupere les donnée de l'utilisateurs 

$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
$req->execute(array($_SESSION['id']));
$data = $req->fetch();

 // on verifie si la case commentaire n'est pas vide 

if (!empty($_POST['commentaire'])) {

    // on recupe le commentaire 

    $commentaire = htmlspecialchars($_POST['commentaire']);

    // on cree une variable avec la date atcuelle 

    $date = new DateTime();

    // on donne le format qui conviens a la date

    $date->format('Y-m-d H:i:s');

    // on vérifie si le commentaire a au moins 5 carac

    if (strlen($commentaire) >= 5) {

        // on insert dans la base de donnée 

        $insert = $bdd->prepare('INSERT INTO commentaires(commentaire,id_utilisateur,date) VALUES(:commentaire,:id_utilisateur,NOW())');
        
        $insert->execute(array(
            'commentaire' => $commentaire,
            'id_utilisateur' => intval($data['id']),
        ));

        // on redirige av succès

        header('Location:../livre-or.php?com_err=success');
        die();
    } else {
        header('Location:../commentaire.php?com_err=court');
    }
} else {
    header('Location:../commentaire.php?com_err=empty');
}

