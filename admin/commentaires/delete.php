<?php 

session_start();
require_once '../../config/functions.php';
if ($_SESSION['admin']) {
    if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
        header('Location:' . BASE_URL . 'index.php');
    } else {
        extract($_GET);
        $id = strip_tags($id);
    
        $comment = getComment($id);

        if ($comment) {
            removeComment($comment->id);
        }

        header('Location: ' . BASE_URL . 'admin/commentaires/main.php');
    }
}
?>