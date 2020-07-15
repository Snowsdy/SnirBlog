<?php
session_start();
require_once '../../config/functions.php';

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('Location:' . BASE_URL . 'index.php');
} else {
    extract($_GET);
    $id = strip_tags($id);

    $article = getArticle($id);
}

if ($_SESSION['admin']) :?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification - <?=$article->title?></title>
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
            <button class="return_btn"><a href="main.php">Retour</a></button>
            <!-- Formulaire -->
            <form action="edit.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
                <h1>Modification</h1>
                <br>
                <label for="title">Titre de l'article :</label><br>
                <input type="text" name="title" id="title" value="<?=$article->title?>">
                <br>
                <label for="author">Auteur de l'article :</label><br>
                <input type="text" name="author" id="author" value="<?=$article->author?>">
                <br>
                <label for="content">Contenu :</label><br>
                <!-- Penser à ajouter un éditeur du style stackedit -->
                <textarea name="content" id="content" rows="6"><?=$article->content?></textarea>
                <br>
                <label for="publication_time">Date de publication :</label><br>
                <input type="text" name="publication_time" placeholder="AAAA-MM-JJ HH-mm-SS" id="publication_time"
                    value="<?=$article->publication_time?>">
                <br>
                <label for="publie">Publié ?</label><br>
                <label class="switch">
                    <input type="checkbox" name="publie" id="publie">
                    <span class="slider round"></span>
                </label>
                <br>
                <label for="img">Image de l'article :</label><br>
                <input type="file" name="img" id="img" accept="image/png,image/jpeg,image/gif,image/jpg">
                <br>
                <input type="submit" value="Modifier" name="submit" id="submit">
            </form>
        </div>

        <?php include ROOT_PATH . '/admin/includes/footer.php'?>
    </div>
</body>

</html>

<?php else:?>
    <?php header('Location: ' . BASE_URL . 'index.php')?>
<?php endif?>

<?php
// Upload de l'image & déplacement dans le dossier 'upload/' :

$errors = array();

if (isset($_POST['submit'])) {
    $max_size = 62914560;
    if ($_FILES['img']['name'] != "") {
        $fileExt = "." . strtolower(substr(strrchr($_FILES['img']['name'], '.'), 1));

        $name = $_FILES['img']['name'];
        if (preg_match('#[\x00-\x1F\x7F-\x9F/\\\\]#', $name)) {
            array_push($errors, 'Nom de fichier invalide');
        }

        $tmpName = $_FILES['img']['tmp_name'];
        $uniqName = tronque_chaine($name, 8, '');
        $fileName = ROOT_PATH . "/admin/upload/" . $uniqName . $fileExt;
        $path_img = "admin/upload/" . $uniqName . $fileExt;

        $result = move_uploaded_file($tmpName, $fileName);
        $oldImg = ROOT_PATH . "/$article->path_img";
        unlink($oldImg);
        if (!$result) {
            array_push($errors, 'transfert échoué');
        }
    } else {
        $path_img = $article->path_img;
    }

    // On créer maintenant l'article :
    $title = strip_tags($_POST['title']);
    if ($title == "") {
        array_push($errors, 'Titre insuffisant');
    }

    $author = strip_tags($_POST['author']);
    if ($author == "") {
        array_push($errors, 'Le champ de l\'auteur ne doit pas être vide');
    }

    $publication_time = strip_tags($_POST['publication_time']);
    if ($publication_time == "") {
        array_push($errors, 'Date de publication invalide');
    }

    $content = strip_tags($_POST['content']);
    if ($content == "") {
        array_push($errors, 'Contenu insuffisant');
        die();
    }

    if ($_POST['publie'] == "on") {
        $publie = 1;
    } else {
        $publie = 0;
    }

    // Enfin, on ajoute l'article si toutes les conditions respectées :
    if (count($errors) == 0) {
        editArticle($id, $title, $author, $content, $publication_time, $publie, $path_img);
        header('Location:' . BASE_URL . 'admin/articles/main.php');
    } else {
        $secondsWait = 1;
        header("Refresh:$secondsWait");
    }
}?>