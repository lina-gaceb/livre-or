<html>

<head>
    <meta charset="utf-8">
    <title>Profil</title>
    <link href="../CSS/style.css" rel="stylesheet">
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
                <li> <a href="inscription.php">Vous êtes déjà inscris </a></li>
                <li> <a href="logout.php">Deconnexion </a></li>
            <?php }
            ?>

        </ul>
    </nav>

</header>
<br>

<?php
if (isset($_GET['reg_err'])) {
    $err = htmlspecialchars($_GET['reg_err']);

    switch ($err) {
        case 'password':
?>
            <div class="box-erreur">
                <strong>Erreur</strong> mot de passe différent
            </div>
        <?php
            break;

        case 'pseudo_length':
        ?>
            <div class="box-erreur">
                <strong>Erreur</strong> pseudo trop long
            </div>
        <?php
            break;

        case 'already':
        ?>
            <div class="box-erreur">
                <strong>Erreur</strong> compte déjà existant
            </div>

        <?php
            break;

        case 'empty':
        ?>
            <div class="box-erreur">
                <strong>Erreur</strong> certain champs sont vide
            </div>
<?php
            break;
    }
}
?>


<!-- Formulaire HTML-->

<body class="inscription">

    <form method="post" class="box" action="TRAITEMENT/inscription-traitement.php">

        <h1 class=box-titre>INSCRIPTION</h1>
        <br><br>


        <input type="text" placeholder="Nom" id="name" name="login">
        <br> <br><br>
        <input type="password" placeholder="Mot de passe" id="name" name="password">
        <br> <br><br>
        <input type="password" placeholder="Confirmer mot de passe" id="name" name="password2">
        <br> <br><br>
        <input type="submit" class="box-button" value="s'inscrire">
        <br> <br><br>
    </form>
</body>

<!-- fin Formulaire HTML -->


<footer>
    <p>Ce livre d'or a était crée en 2022 , pour que tous le monde s'amuse !</p>
</footer>

</html>