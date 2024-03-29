<?php
session_start();
require_once 'config/functions.php';

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('Location:' . BASE_URL . 'index.php');
} else {
    extract($_GET);
    $id = strip_tags($id);

    $article = getArticle($id);
    if (isset($_SESSION['pseudo'])) {
        $user = getUser('pseudo', $_SESSION['pseudo']);
    }

    $count = getCommentsCount($article->id);
    if ($count->total != 0) {
        $comments = getComments($article->id);
    }
}
?>

<html lang="fr">

<head>
    <title><?= $article->title ?></title>
    <?php require_once 'components/header.php'; ?>
    <link rel="stylesheet" href="css/article.css">
    <link rel="stylesheet" href="css/addComment.css">
    <link rel="stylesheet" href="admin/css/loginRegister.css">
    <link rel="stylesheet" href="admin/css/header.css">
    <link rel="stylesheet" href="admin/css/footer.css">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
</head>

<body>
    <div class="bck">
        <?php include 'admin/includes/header.php' ?>
        <div class="article">

            <div class="pre-info">
                <h1><?= $article->title ?></h1>
                <h2>By <?= $article->author ?></h2>
                <time>Le <?= $article->publication_time ?></time>
            </div>

            <center><img src="<?= $article->path_img ?>"></center>

            <div class="content">
                <p><?= $article->content ?></p>
            </div>

            <hr />

            <div class="comments">
                <h2>Commentaires :</h2><br>
                <?php if (isset($_SESSION['pseudo'])) : ?>
                    <?php if ($count->total != 0) : ?>
                        <?php foreach ($comments as $comment) : ?>
                            <?= showComment($comment) ?>
                        <?php endforeach ?>
                    <?php else : ?>
                        <?= noComment() ?>
                    <?php endif ?>
                    <br>
                    <form action="addComment.php?idArticle=<?= $article->id ?>" method="post" class="addComment-form">
                        <h3>Ajouter un commentaire :</h3><br>
                        <label for="title">Titre du commentaire : </label><br>
                        <input type="text" name="title" id="title"><br>
                        <label for="comment" id="comment-label">Commentaire :</label><br>
                        <textarea name="comment" id="comment" cols="55" rows="8"></textarea><br>
                        <input type="submit" value="Envoyer" name="submit" id="submit">
                    </form>
                <?php else : ?>
                    <!-- Si pas connecté alors : -->
                    <p style="color: red; text-shadow: 1px 1px black;">
                        Vous devez vous connecter afin de voir les commentaires.
                    </p>
                <?php endif; ?>
            </div>
        </div>
        <?php include 'admin/includes/footer.php' ?>
    </div>

    <!-- Login -->
    <?php include 'admin/includes/login.php' ?>
    <!-- Inscription -->
    <?php include 'admin/includes/inscription.php' ?>
    <!-- Script Log In / Register -->
    <script src="js/main.js"></script>
</body>

</html>