<?php 

session_start();
require_once '../../config/functions.php';
if ($_SESSION['admin']) {
    if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
        header('Location:' . BASE_URL . 'index.php');
    } else {
        extract($_GET);
        $id = strip_tags($id);
    
        $user = getUser('id', $id);

        if ($user) {
            removeUser($user->id);
        }

        header('Location: ' . BASE_URL . 'admin/users/main.php');
    }
}
?>