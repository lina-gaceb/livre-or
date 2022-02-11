<?php

require_once '../config.php'; //  Apel bdd

// Si les variables existent et qu'elles ne sont pas vides

if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['password2'])) {

    // je crée des variable pour chaque donné 

    $login = htmlspecialchars($_POST['login']);

    $password = htmlspecialchars($_POST['password']);

    $password2 = htmlspecialchars($_POST['password2']);


    // On vérifie si l'utilisateur existe deja 

    $check = $bdd->prepare('SELECT * FROM utilisateurs WHERE login = ?');

    $check->execute(array($login));

    $data = $check->fetch();

    $row = $check->rowCount();

    if ($row == 0) {
        if (strlen($login) <= 100) { // caractére depasse pas <= 100

            if ($password === $password2) { // si les deux mdp sont identique 

                // On hash le mot de passe avec Bcrypt, via un coût de 12
                $cost = ['cost' => 12];
                $password = password_hash($password, PASSWORD_BCRYPT, $cost);


                // On l'insère dans la base de données

                $insert = $bdd->prepare('INSERT INTO utilisateurs(login,password) VALUES(:login,:password)');
                $insert->execute(array(
                    'login' => $login,
                    'password' => $password,
                ));

                // On redirige avec le message de succès
                header('Location:../connexion.php?reg_err=success');
                die();
            } else {
                header('Location:../inscription.php?reg_err=password');
                die();
            }
        } else {
            header('Location:../inscription.php?reg_err=pseudo_length');
            die();
        }
    } else {
        header('Location:../inscription.php?reg_err=already');
        die();
    }
} else {
    header('Location:../inscription.php?reg_err=empty');
    die();
}

