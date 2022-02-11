<?php
session_start();
require('../config.php');

if (!isset($_SESSION['login'])) {
    header('Location:../PHP/index.php');
    die();
}

if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['newpassword']) && !empty($_POST['confirmer'])) {

    $new_login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $new_password = htmlspecialchars($_POST['newpassword']);
    $confirmer = htmlspecialchars($_POST['confirmer']);

    $check = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = :id');
    $check->execute(array(
        "id" => $_SESSION['id']
    ));
    $data = $check->fetch();

    if (password_verify($password, $data['password'])) {
        if ($new_password === $confirmer) {
            $new_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update = $bdd->prepare('UPDATE utilisateurs SET login = :login, password = :password WHERE id = :id');
            $update->execute(array(
                "login" => $new_login,
                "password" => $new_password,
                "id" => $_SESSION['id']
            ));
            header('Location:../profil.php?err_profil=success');
            die();
        } else {
            header('Location:../profil.php?err_profil=confirm');
        }
    } else {
        header('Location:../profil.php?err_profil=password');
    }
} else {
    header('Location:../profil.php?err_profil=empty');
}
