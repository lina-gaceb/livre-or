<?php
session_start();
require '../config.php'; //apel bdd

if(!empty($_POST['login']) && !empty ($_POST['password'])) {

       // recupere le login et password avec html special char pour secu 
       $login = htmlspecialchars($_POST['login']);

       $password = htmlspecialchars($_POST['password']);
   
       $check = $bdd->prepare('SELECT * FROM utilisateurs WHERE login = ?');
       $check->execute(array($login));
   
    
       $data = $check->fetch();

       $row = $check->rowCount();
   
       // Si > 0 alors l'utilisateur existe
       if ($row > 0) {
           // on verifie Si le mot de passe est le meme
   
           if (password_verify($password, $data['password'])) {
               // On ouvre la session et on redirige sur connexion.php
               
            $_SESSION['id'] = $data['id'];
            $_SESSION['login'] = $data['login'];

            header('Location:../../index.php');
            die();
        } else {
            header('Location: ../connexion.php?login_err=password');
            die();
        }
    } else {
        header('Location: ../connexion.php?login_err=already');
        die();
    }
} else {
    header('Location: ../connexion.php?login_err=empty');
    die();
} // si le formulaire est envoyé sans aucune données
