<?php
session_start();
require_once 'config/functions.php';

$articles = getArticlesPublies();
?>

<html lang="fr">

<head>
    <title>SnirBlog</title>
    <?php require_once 'components/header.php'; ?>
    <link rel="stylesheet" href="admin/css/loginRegister.css">
    <link rel="stylesheet" href="css/accueil.css">
    <link rel="stylesheet" href="admin/css/header.css">
    <link rel="stylesheet" href="admin/css/footer.css">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
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
                        <?php foreach ($articles as $article) : ?>
                            <?= showArticle($article) ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenu de la page -->

        <div class="post-description">
            <h3>Nos Articles :</h3><br>
            <?php foreach ($articles as $article) : ?>
                <div class="article">
                    <img src="<?= $article->path_img ?>" />
                    <div class="article-content">
                        <h4><?= $article->title ?></h4>
                        <i class="fa fa-user-o"></i> <?= $article->author ?>
                        &nbsp;
                        <i class="fa fa-calendar"></i> <?= $article->publication_time ?>
                        <p><?= tronque_chaine($article->content) ?></p>
                        <a href="article.php?id=<?= $article->id ?>" class="continued">Lire la suite</a>
                        <br><br><br>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Login -->

    <?php
    include 'admin/includes/login.php';
    ?>

    <!-- inscription -->

    <?php
    include 'admin/includes/inscription.php'
    ?>

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