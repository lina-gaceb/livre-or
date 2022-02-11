<?php
session_start();
require_once('config.php'); 

if (isset($_SESSION['user'])) {

     // On récupere les données de l'utilisateur

    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
    $req->execute(array($_SESSION['id']));
    $data = $req->fetch();
}
?>
<!DOCTYPE html>
<html>

<head>
<link href="../CSS/style.css" rel="stylesheet">
    <title>livre d'or</title>
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
             if (empty($_SESSION['login'])){ ?>
            <li> <a href="inscription.php">Inscription </a></li>
            <li> <a href="connexion.php">Vous n'êtes pas connecter </a></li>
            <?php 
            } else{
                ?>
            <li> <a href="livre-or.php">Vous êtes déjà inscris </a></li>
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
    if (isset($GET['com_err'])) {
        $com = $GET['com_err'];
        switch ($com) {
            case 'success':

    ?>
                <div class="success">
                    Bravo <?= $_SESSION['login'] ?> ! Vous avez posté votre commentaire avec succés !
                </div>
    <?php
                break;
        }
    }
?>
<?php
    $req = $bdd->query('SELECT * FROM commentaires');

    while ($livre = $req->fetch()) {
        ?>
        <br> <br>
        <div class="box">
            <div class="info">
                <?=$livre['id_utilisateur']?>  Le <?=$livre['date']?> 
            </div>   

            <div class="txt">
                <?=$livre['commentaire'];?> 
            </div>
        </div> <br> <br>
        <?php
    }
    ?>
</body>

<footer>
    <p>Ce livre d'or a était crée en 2022 , pour que tous le monde s'amuse !</p>
</footer>

</html>