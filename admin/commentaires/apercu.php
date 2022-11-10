<?php
session_start();
require_once '../../config/functions.php';

if (!isset($_GET['idArticle']) or !is_numeric($_GET['idArticle'])) {
    header('Location:' . BASE_URL . 'index.php');
    exit();
} else {
    extract($_GET);
    $idArticle = strip_tags($idArticle);

    $comments = getCommentsByIdArticle($idArticle);
}

if (isset($_SESSION['admin']) && $_SESSION['admin']) : ?>

    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modification - <?= $article->title ?></title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/edit.css">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/left_menu.css">
    </head>

    <body>
        <div class="bck">
            <?php include ROOT_PATH . '/admin/includes/header.php' ?>
            <?php include ROOT_PATH . '/admin/includes/left_menu.php' ?>

            <div class="contenu">
                <button class="return_btn"><a href="main.php">Retour</a></button>
                <!-- Affichage des commentaires -->
                <div class="comments">
                    <?php foreach ($comments as $comment) : ?>
                        <?= showComment($comment) ?>
                    <?php endforeach ?>
                </div>
            </div>

            <?php include ROOT_PATH . '/admin/includes/footer.php' ?>
        </div>
    </body>

    </html>

<?php else : ?>
    <?php header('Location: ' . BASE_URL . 'index.php');
    exit(); ?>
<?php endif ?>