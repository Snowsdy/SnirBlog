<?php
session_start();
require_once 'config/functions.php';

$articles = getArticles();
?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SnirBlog</title>
    <link rel="stylesheet" href="/admin/css/header.css">
    <link rel="stylesheet" href="css/accueil.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="admin/css/footer.css">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io//favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
</head>

<body>
    <?php
        include "admin/includes/header.php";
    ?>

    <div class="content">
        <div class="post-articles">
            <h1 class="title">Projet Blog</h1>
            <br>
            <h2>Bienvenue sur le projet Blog minimaliste écrit en Php.</h2>

            <p>
                Comment programmer en Php voir
                <a href="https://secure.php.net/manual/fr/index.php" class="ref">Doc Php</a>
                (dispo sur le web).
            </p>
        </div>
        <!-- Affichage des articles -->
        <br>
        <div class="articles">
            <!-- Page wrapper -->
            <div class="page-wrapper">
                <!-- Posts Slider -->
                <div class="posts-slider">
                    <h1 class="slider-title">Trending Posts</h1><br>
                    <i class="fa fa-chevron-right next"></i>
                    <i class="fa fa-chevron-left prev"></i>

                    <div class="posts-wrapper">
                        <?php foreach($articles as $article):?>
                        <?= showArticle($article) ?>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenu de la page -->

        <div class="post-description">
            <h3>Nos Articles :</h3><br>
            <?php foreach($articles as $article):?>
            <div class="article">
                <img src="<?= $article->path_img ?>" />
                <div class="article-content">
                    <h4><?= $article->title ?></h4>
                    <i class="fa fa-user-o"></i> <?= $article->author?>
                    &nbsp;
                    <i class="fa fa-calendar"></i> <?= $article->publication_time?>
                    <p><?= tronque_chaine($article->content)?></p>
                    <a href="article.php?id=<?= $article->id?>" class="continued">Lire la suite</a>
                    <br><br><br>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>

    <!-- Login -->

    <?php 
        include 'admin/includes/login.php';
    ?>

    <!-- inscription -->

    <div id="inscription" class="inscription">
        <div class="login-content">
            <form class="box" action="register.php" method="post">
                <span class="close" id="close">&times;</span>
                <h1>inscription</h1>
                <b style="color: red;">
                    <?php 
                        if (!empty($_SESSION['erreurRegister'])) {
                            foreach ($_SESSION['erreurRegister'] as $error) {
                                echo '<b style="color: red;>' . $error . '<br></b>';
                            }
                            unset($_SESSION['erreurRegister']);
                        }
                    ?>
                </b style="color: red;">
                <div class="nom_prenom">
                    <input type="text" name="prenom" placeholder="Prénom">
                    <input type="text" name="nom" placeholder="Nom">
                </div>
                <input type="text" name="pseudo" class="marg" placeholder="Pseudo">
                <input type="text" name="email" class="marg" placeholder="Email">
                <div class="nom_prenom">
                    <input type="password" name="mdp" placeholder="Mot de passe">
                    <input type="password" name="confMdp" placeholder="Confirmation Mdp">
                </div>
                <input type="submit" value="Inscription">
            </form>
        </div>
    </div>

    <!-- FOOTER -->
    <?php
        include 'admin/includes/footer.php'
    ?>

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Slick JS -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script src="js/main.js"></script>

    <script src="js/scripts.js"></script>
</body>

</html>