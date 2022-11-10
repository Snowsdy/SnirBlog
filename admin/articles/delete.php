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
            removeArticle($article->id);
        }

        header('Location: ' . BASE_URL . 'admin/articles/main.php');
    }
} else {
    header(('Location: ' . BASE_URL . 'index.php'));
    exit();
}
