<?php
session_start();
require_once 'config.php';

// si la session existe pas le redirige

if (!isset($_SESSION['id'])) {
    header('Location:livre-or.php');
    die();
}

// On récupere les données de l'utilisateur

$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
$req->execute(array($_SESSION['id']));
$data = $req->fetch();
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="../CSS/style.css" rel="stylesheet">
    <title>Commentaires</title>
</head>

<!--header-->
<header>
    <nav class=admin>
        <ul class=admin>
            <li class="deroulant"> <a href="#">Commentaires &ensp;</a>
                <ul class="sous">
                    <li><a href="commentaire.php">Laisser un commentaire</a></li>

                    <li><a href="livre-or.php">Voir les commentaires </a></li>
                    <li><a href="profil.php"> Profil </a></li>

                </ul>
            </li>

            <li><a href="../index.php"> Accueil &ensp;</a>
            </li>

            <?php
            if (empty($_SESSION['login'])) { ?>
                <li> <a href="inscription.php">Inscription </a></li>
                <li> <a href="connexion.php">Vous n'êtes pas connecter </a></li>
            <?php
            } else {
            ?>
                <li> <a href="commentaire.php">Vous êtes déjà inscris </a></li>
                <li> <a href="logout.php">Deconnexion </a></li>
            <?php }
            ?>

        </ul>
    </nav>
</header>
<br>
<!--FIN header-->


<body>

    <?php

    if (isset($_GET['com_err'])) {
        $Comm = $_GET['com_err'];
        switch ($Comm) {
            case 'court':
    ?>
                <div class="box-erreur">
                    Votre commentaire doit contenir minimum 5 caractères !
                </div>
            <?php
                break;

            case 'empty':
            ?>
                <div class="box-erreur">
                    Votre commentaire est vide.
                </div>
    <?php
                break;
        }
    }
    ?>

    <main>

        <div class="box">
            <form action="TRAITEMENT/commentaire-traitement.php" method="POST" class="login-email">
                <p  style="font-size: 2rem; font-weight: 800;">Commenter !</p>
                <br>
                <div class="input-group">
                    <input placeholder="ex: Les animes c'est super ! " name="commentaire" value="" required>
                </div>
                <br>
                <div class="btn">
                    <button name="submit" class="box-button">Envoyer</button>
                </div>

            </form>
        </div>
    </main>

    <footer>
        <p>Ce livre d'or a était crée en 2022 , pour que tous le monde s'amuse !</p>
    </footer>


</body>

</html>