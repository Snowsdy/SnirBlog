<?php
session_start();
require_once '../../config/functions.php';
if ($_SESSION['admin']) {
    if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
        header('Location:' . BASE_URL . 'index.php');
    } else {
        extract($_GET);
        $id = strip_tags($id);

        $article = getArticle($id);
    }
} else {
    header(BASE_URL . "index.php");
}
?>

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
        <?php include ROOT_PATH . '/admin/includes/header.php'?>
        <?php include ROOT_PATH . '/admin/includes/left_menu.php'?>

        <div class="contenu">
            <!-- Formulaire -->
            <form action="edit.php" method="post" enctype="multipart/form-data">
                <h1>Modification</h1>
                <br>
                <label for="title">Titre de l'article :</label><br>
                <input type="text" name="title" id="title" value="<?= $article->title ?>">
                <br>
                <label for="author">Auteur de l'article :</label><br>
                <input type="text" name="author" id="author" value="<?= $article->author ?>">
                <br>
                <label for="content">Contenu :</label><br>
                <!-- Penser à ajouter un éditeur du style stackedit -->
                <textarea name="centent" id="content" rows="6"><?= $article->content ?></textarea>
                <br>
                <label for="publication_time">Date de publication :</label><br>
                <input type="text" name="publication_time" placeholder="AAAA-MM-JJ HH-mm-SS" id="publication_time" value="<?= $article->publication_time ?>">
                <br>
                <label for="publie">Publié ?</label><br>
                <label class="switch">
                    <input type="checkbox" name="publie" id="publie">
                    <span class="slider round"></span>
                </label>
                <br>
                <label for="path_img">Image de l'article :</label><br>
                <input type="file" name="img" id="img" accept="image/png,image/jpeg,image/gif,image/jpg">
                <br>
                <input type="submit" value="Valider" name="submit" id="submit">
            </form>
        </div>

        <?php include ROOT_PATH . '/admin/includes/footer.php'?>
    </div>
</body>

</html>