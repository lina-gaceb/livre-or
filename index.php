<!DOCTYPE html>
<html>
<?php
session_start();
?>

<head>
    <meta charset="utf-8">
    <title> Livre d'or</title>
    <link href="CSS/style.css" rel="stylesheet">
</head>

<!--header-->

<!--header-->
<header>
    <nav class=admin>
        <ul class=admin>
            <li class="deroulant"> <a href="#">Commentaires &ensp;</a>
                <ul class="sous">
                    <li><a href="PHP/commentaire.php">Laisser un commentaire</a></li>
                    <li><a href="PHP/livre-or.php">Voir les commentaires </a></li>
                    <li><a href="PHP/profil.php"> Profil </a></li>

                </ul>
            </li>

            <li><a href="index.php"> Accueil &ensp;</a>
            </li>
            <?php
            if (empty($_SESSION['login'])){ ?>
            <li> <a href="PHP/inscription.php">Inscription </a></li>
            <li> <a href="PHP/connexion.php">Vous n'êtes pas connecter </a></li>
            <?php 
            } else{
                ?>
            <li> <a href="index.php">Vous êtes déjà inscris </a></li>
            <li> <a href="PHP/logout.php">Deconnexion </a></li>
            <?php }
            ?> 



        </ul>
    </nav>

</header>

<br><br><br>

<main>
    <?php
    if (!empty($_SESSION['login'])) {
        $login = $_SESSION['login'];
        echo "<div class=\"presentation\">
        <h1 class=\"box-titre\">Bienvenue $login </h1>
    </div>";
    
    } else {
        echo "<div class=\"presentation\">
        <h1 class=\"box-titre\">Bienvenue sur mon livre d'or </h1>
    </div>";
    }
    ?>

</main>

<footer>
    <p>Ce livre d'or a était crée en 2022 , pour que tous le monde s'amuse !</p>
</footer>

</html>