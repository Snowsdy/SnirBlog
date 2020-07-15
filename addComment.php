<?php 

session_start();
require_once 'config/functions.php';

if (isset($_SESSION['pseudo'])) {
    $errors = array();

    if (isset($_POST['submit'])) {
        if ($_POST['comment'] == "") {
            array_push($errors, 'Le champ du commentaire ne doit pas être vide');
        }

        if ($_POST['title'] == "") {
            array_push($errors, 'Le titre ne doit pas être vide');
        }
    
        if (count($errors) == 0) {
            // Récupération de l'id de l'article :

            if ($_GET) {
                extract($_GET);
                $idArticle = strip_tags($idArticle);
            }


            // Récupération de l'id de l'utilisateur :

            $pseudo = $_SESSION['pseudo'];

            $user = getUser('pseudo', $pseudo);

            // Récupération du titre du commentaire :

            $title = ucfirst(strip_tags($_POST['title']));

            // Récupération du commentaire :
            $comment = ucfirst(strip_tags($_POST['comment']));

            // Enfin ou ajoute le commentaire à l'article :

            addComment($idArticle, $user->id, $title, $pseudo, $comment);
            header('Location:'. BASE_URL .'article.php?id=' . $idArticle);

        }
    }else {
        header('Location:' . BASE_URL . 'index.php');
    }
}
?>