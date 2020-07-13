<?php
session_start();
require_once '../../config/functions.php';
if ($_SESSION['admin']) {
?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un nouvel article</title>
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
            <button class="return_btn"><a href="main.php">Retour</a></button>
            <form action="add.php" method="post" enctype="multipart/form-data">
                <h1>Ajout d'un nouvel article</h1>
                <br>
                <label for="title">Titre de l'article :</label><br>
                <input type="text" name="title" id="title">
                <br>
                <label for="author">Auteur de l'article :</label><br>
                <input type="text" name="author" id="author">
                <br>
                <label for="content">Contenu :</label><br>
                <!-- Penser à ajouter un éditeur du style stackedit -->
                <textarea name="content" id="content" rows="6"></textarea>
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
                <input type="submit" value="Ajouter" name="submit" id="submit">
            </form>
        </div>

        <?php include ROOT_PATH . '/admin/includes/footer.php'?>
    </div>
</body>

</html>

<?php } else {
    header('Location:' . BASE_URL . 'index.php');
}?>

<?php
// Upload de l'image & déplacement dans le dossier 'upload/' :

$errors = array();

if (isset($_POST['submit'])) {
    $max_size = 62914560;
    if ($_FILES['img']['error'] > 0) {
        array_push($errors, 'Une erreur est survenue lors du transfert');
        die();
    }
    $size = $_FILES['img']['size'];
    if ($size > $max_size) {
        array_push($errors, 'fichier trop volumineux');
        die();
    }
    $fileExt = "." . strtolower(substr(strrchr($_FILES['img']['name'], '.'), 1));

    $name = $_FILES['img']['name'];
    $tmpName = $_FILES['img']['tmp_name'];
    $uniqName = tronque_chaine($name, 10, '');
    $fileName = ROOT_PATH . "/admin/upload/" . $uniqName . $fileExt;
    $path_img = "admin/upload/" . $uniqName . $fileExt;
    $result = move_uploaded_file($tmpName, $fileName);
    if (!$result) {
        array_push($errors, 'transfert échoué');
        die();
    }

    // On créer maintenant l'article :
    $title = strip_tags($_POST['title']);
    if ($title == "") {
        array_push($errors, 'Titre insuffisant');
        die();
    }

    $author = strip_tags($_POST['author']);
    if ($author == "") {
        array_push($errors, 'Le champ de l\'auteur ne doit pas être vide');
        die();
    }

    $content = strip_tags($_POST['content']);
    if ($content == "") {
        array_push($errors, 'Contenu insuffisant');
        die();
    }

    $publie = $_POST['publie'];
    if ($publie == null) {
        $publie = 0;
    } else {
        $publie = 1;
    }

    // Enfin, on ajoute l'article si toutes les conditions respectées :
    if (count($errors) == 0) {
        addArticle($title, $author, $content, $publie, $path_img);
        header('Location: ' . BASE_URL . '/admin/articles/main.php');
    } else {
        $secondsWait = 1;
        header("Refresh:$secondsWait");
    }
}

?>