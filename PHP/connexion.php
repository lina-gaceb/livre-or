<!DOCTYPE html>
<?php
session_start();
?>
<html>


<head>
    <meta charset="UTF-8">
    <link href="../CSS/style.css" rel="stylesheet">
    <title>Livre d'or </title>
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
                <li> <a href="connexion.php">Vous êtes déjà inscris </a></li>
                <li> <a href="logout.php">Deconnexion </a></li>
            <?php }
            ?>

        </ul>
    </nav>

</header>

<!-- Formulaire HTML-->

<br><br><br>

<body class="inscription">
    <?php
    if (isset($_GET['reg_err'])) {
        $err = htmlspecialchars($_GET['reg_err']);

        switch ($err) {

            case 'success':
    ?>
                <div class="box-erreur">
                    <strong>Succès</strong> inscription réussie !
                </div>
    <?php
                break;
        }
    }
    ?>

    <form class="box" action="TRAITEMENT/connexion-traitement.php" method="POST">

        <h1 class="box-titre"> CONNEXION </h1>
        <br>

        <label for="login">Login </label><br><br>
        <input type="text" class="box-input" name="login" id="name" placeholder="Login" required><br><br>

        <label for="password">Password</label><br><br>
        <input type="password" class="box-input" id"name" name="password" placeholder="password" required><br><br>

        <?php
        if (isset($_GET['login_err'])) {
            $err = htmlspecialchars($_GET['login_err']);
            switch ($err) {


                case 'empty':
        ?>
                    <div class="box-erreur">
                        <strong>Erreur</strong> certain champs sont vide
                    </div>
                <?php
                    break;

                case 'password':
                ?>
                    <div class="box-erreur">
                        <strong>Erreur</strong> le mot de passe est incorrect
                    </div>
                <?php
                    break;

                case 'already':
                ?>
                    <div class="box-erreur">
                        <strong>Erreur</strong> cette utilisateur n'existe pas
                    </div>
        <?php
                    break;
            }
        }
        ?>

        <input type="submit" value="connexion" name="btn-co" class="box-button">
        <p class="box-register"> Pas de compte ? <a href="inscription.php">Inscrivez vous ici</a></p>

    </form>
    <!-- fin Formulaire HTML -->
</body>

<footer>
    <p>Ce livre d'or a était crée en 2022 , pour que tous le monde s'amuse !</p>
</footer>

</html>