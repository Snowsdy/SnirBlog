<?php 
session_start();
require_once 'config/functions.php';

$users = getUsers();
$_SESSION['erreurLogin'] = array();
$erreur = 0;

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
}

if (isset($_POST['login_button'])) {
    if(isset($_POST['pseudo']) && isset($_POST['mdp'])){
        $pseudo = $_POST['pseudo'];
        foreach ($users as $user) {
            $confMdp = password_verify($_POST['mdp'], $user->mdp);
            if ($pseudo == $user->pseudo && $confMdp) {
                $erreur++;
            
                $_SESSION['id'] = $user->id;
                $_SESSION['nom'] = $user->nom;
                $_SESSION['prenom'] = $user->prenom;
                $_SESSION['mdp'] = $user->mdp;
                $_SESSION['email'] = $user->email;
                $_SESSION['admin'] = $user->admin;
                $_SESSION['pseudo'] = $user->pseudo;

                header('Location: index.php');
            }
        }
        if ($erreur == 0) {
            array_push($_SESSION['erreurLogin'], 'Pseudo et/ou Mot de passe incorect');
            header('Location: index.php');
        }
    }
}
?>