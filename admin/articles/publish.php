<?php

session_start();
require_once '../../config/functions.php';
if (isset($_SESSION['admin']) && $_SESSION['admin']) {
    if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
        header('Location:' . BASE_URL . 'index.php');
        exit();
    } else {
        extract($_GET);
        $id = strip_tags($id);

        $article = getArticle($id);

        if ($article) {
            if ($article->publie == 1) {
                setPublie($article->id, 0);
            } else {
                setPublie($article->id, 1);
            }
        }

        header('Location: ' . BASE_URL . 'admin/articles/main.php');
        exit();
    }
}
