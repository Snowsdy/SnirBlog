<?php
session_start();
require 'config/functions.php';

if ($_POST) {
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $_SESSION['erreurs'] = array();

    $users = getUsers();
    foreach ($users as $user) {
        if ($_POST['pseudo'] == $user->pseudo) {
            array_push($_SESSION['erreurs'], 'Pseudo déjà utilisé');
        }
        if ($_POST['email'] == $user->email) {
            array_push($_SESSION['erreurs'], 'Email déjà utilisé');
        }
        if (($_POST['nom'] == $user->nom) && ($_POST['prenom'] == $user->prenom)) {
            array_push($_SESSION['erreurs'], 'Utilisateur déjà existante');
        }
        if (count($_SESSION['erreurs']) == 0) {
            addUserPublic($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['pseudo'], $mdp);
            $newUser = getUser('pseudo', $_POST['pseudo']);

            $_SESSION['id'] = $newUser->id;
            $_SESSION['nom'] = $newUser->nom;
            $_SESSION['prenom'] = $newUser->prenom;
            $_SESSION['mdp'] = $newUser->mdp;
            $_SESSION['email'] = $newUser->email;
            $_SESSION['admin'] = $newUser->admin;
            $_SESSION['pseudo'] = $newUser->pseudo;

            header('Location: index.php');
        }
    }
}
