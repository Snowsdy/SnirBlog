<?php
require_once 'config/functions.php';

$articles = getArticles();
?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SnirBlog</title>
    <link rel="stylesheet" href="/css/accueil.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io//favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
</head>

<body>

    <div class="header">
        <h2 class="logo"><span>Snir</span>Blog</h2>
        <input type="checkbox" id="chk">
        <label for="chk" class="show-menu-btn">
            <i class="fas fa-ellipsis-h"></i>
        </label>

        <ul class="menu">
            <a href="#">Accueil</a>
            <a href="#">
                <i class="fa fa-sign-in"></i> Se connecter
            </a>
            <a href="#">A propos</a>
            <a href="#">Nous contacter</a>
            <label for="chk" class="hide-menu-btn">
                <i class="fas fa-times"></i>
            </label>
        </ul>
    </div>

    <div class="content">
        <h1 class="title">Projet Blog</h1>
        <br>
        <h2>Bienvenue sur le projet Blog minimaliste écrit en Php.</h2>

        <p>
            Comment programmer en Php voir
            <a href="https://secure.php.net/manual/fr/index.php" class="ref">Doc Php</a>
            (dispo sur le web).
        </p>
        <br>
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
        <!-- Le but ici est de remplacer 'showArticles'
        directement par le tableau 'articles' et ensuite on
        appel le paramètre voulu. Ex : Pour l'image : $articles[0]->path_img
        pour obtenir le chemin où se situe l'image de l'article -->
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
                        <p><?= tronque_chaine($article->content) ?></p>
                        <a href="#" class="continued">Lire la suite</a>
                        <br><br><br>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>

    <div class="footer">
        <p>© 2020 - Designed by Snowsdy & Bailleu Evan</p>
    </div>

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Slick JS -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script src="js/scripts.js"></script>
</body>

</html>
