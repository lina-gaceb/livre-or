<?php
session_start();
include('config.php');


if (!isset($_SESSION['id'])) {
    header('Location: ../index.php');
    exit;
}
$check = $bdd->prepare("SELECT * FROM utilisateurs WHERE id = ?");
$check->execute(array($_SESSION['id']));
$data = $check->fetch();
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../CSS/style.css" />
    <meta charset="utf-8">
    <title>Mon profil</title>

</head>

<!--header-->

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
             if (empty($_SESSION['login'])){ ?>
            <li> <a href="inscription.php">Inscription </a></li>
            <li> <a href="connexion.php">Vous n'êtes pas connecter </a></li>
            <?php 
            } else{
                ?>
            <li> <a href="profil.php">Vous êtes déjà inscris </a></li>
            <li> <a href="logout.php">Deconnexion </a></li>
            <?php }
            ?>

        </ul>
    </nav>

</header>
<br>

<body>
    <?php
    if (isset($_GET['err_profil'])) {
        $error = $_GET['err_profil'];
        switch ($error) {
            case 'confirm':
                echo "Veuillez rentrer une confirmation de mot de passe valide";
                break;

            case 'password':
                echo "Le mot de passe n'est pas le bon";
                break;

            case 'empty':
                echo "Veuillez compléter tout les champs";
                break;
            case 'success':
                echo "Vos informations ont été modifié avec succés";
                break;
        }
    }
    ?>

    <form method="POST" class="box" action="profil_traitement.php">


        <h1 class=box-titre>Modifier son profil</h1>

        <br>

        <label for="login">Login</label>
        <input type="text" name="login" value="<?= $data['login']; ?> " required>
        <br><br>

        <label for="password">Mot de passe</label>
        <input type="password" placeholder="Mot de passe" name="password" required>
        <br><br>

        <label for="newpassword">Nouveau mot de passe</label>
        <input type="password" placeholder="Nouveau mot de passe" name="newpassword" required>
        <br><br>

        <label for="confirmer">Confirmation</label>
        <input type="password" placeholder="confirmer nouveau mot de passe " name="confirmer" required>
        <br><br>

        <input type="submit" name="submitprofil" value="Envoyer">

    </form>
</body>

<footer>
    <p>Ce livre d'or a était crée en 2022 , pour que tous le monde s'amuse !</p>
</footer>

</html>