<?php
require_once 'config/functions.php';

$articles = getArticles();
?>

<?php include 'admin/includes/header.php'?>

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
                        <i class="fa fa-user-o"></i> <?= $article->idUser?>
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

    <!-- Espace réservé pour la 'form' de Evan pour le 'Login' ou le 'Register' :) -->

    <?php include 'admin/includes/footer.php'?>

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Slick JS -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script src="js/scripts.js"></script>
</body>

</html>
