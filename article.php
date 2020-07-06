<?php 
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('Location: index.php');
}else {
    extract($_GET);
    $id = strip_tags($id);

    require_once 'config/functions.php';

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
    print_r($article, true);
    //$comments = getComments($id);
}
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $article->title?></title>
</head>
<body>
    
</body>
</html>