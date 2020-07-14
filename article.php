<?php 
session_start();
require_once 'config/functions.php';

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('Location:'. BASE_URL .'index.php');
}else {
    extract($_GET);
    $id = strip_tags($id);

    // A modifier
    if(!empty($_POST))
    {
        extract($_POST);
        $errors = array();

        $idUser = strip_tags($idUser);
        $comment = strip_tags($comment);

        if (empty($idUser)) {
            array_push($errors, 'Entrez un pseudo');
        }

        if (empty($comment)) {
            array_push($errors, 'Entrez un commentaire');
        }

        if (count($errors) == 0) {
            $comment = addComment($id, $idUser, $comment);

            $succes = 'Votre commentaire a été publié';

            unset($idUser);
            unset($comment);
        }
    }

    $article = getArticle($id);
    $user = getUser('pseudo', $_SESSION['pseudo']);
    $count = getCommentsCount($article->id);
    if ($count->total != 0) {
        $comments = getComments($article->id);
    }
}
?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $article->title?></title>
    <link rel="stylesheet" href="admin/css/loginRegister.css">
    <link rel="stylesheet" href="admin/css/header.css">
    <link rel="stylesheet" href="admin/css/footer.css">
    <link rel="stylesheet" href="css/article.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
</head>

<body>
    <div class="bck">
        <?php include 'admin/includes/header.php'?>
        <div class="article">

            <div class="pre-info">
                <h1><?=$article->title?></h1>
                <h2>By <?= $article->author ?></h2>
                <time>Le <?= $article->publication_time ?></time>
            </div>

            <center><img src="<?= $article->path_img ?>"></center>

            <div class="content">
                <p><?=$article->content?></p>
            </div>

            <hr />

            <?php 
        if (isset($succes)) {
            echo $succes;
        }
        if(!empty($errors)):?>
            <?php foreach ($errors as $error):?>
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-danger"><?= $error ?></div>
                </div>
            </div>
            <?php endforeach;?>
            <?php endif;?>

            <div class="comments">
                <h2>Commentaires :</h2><br>
                <?php if (isset($_SESSION['pseudo'])):?>
                    <?php if($count->total != 0):?>
                        <?php 
                            foreach ($comments as $comment) {
                            showComment($comment);
                            }
                        ?>
                    <?php else:?>
                        <?= noComment() ?>
                    <?php endif?>
                    <a href="article.php?id=<?= $article->id?>">Envoyer</a>
                <?php else:?>
                <!-- Si pas connecté alors : -->
                    <p style="color: red; text-shadow: 1px 1px black;">
                        Vous devez vous connecter afin de voir les commentaires.
                    </p>
                <?php endif;?>
            </div>

        </div>
        <!-- Footer -->
        <?php include 'admin/includes/footer.php'?>
        <!-- Login -->
        <?php include 'admin/includes/login.php'?>
        <!-- Inscription -->
        <?php include 'admin/includes/inscription.php'?>
    </div>
    <!-- Script Log In / Register -->
    <script src="js/main.js"></script>
</body>

</html>