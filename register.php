<?php
session_start();
require 'config/functions.php';

if ($_POST) {
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $confMdp = password_verify($_POST['confMdp'], $mdp);
    $_SESSION['erreurRegister'] = array();
    $erreurPseudo = 0;
    $erreurEmail = 0;
    $erreurNom = 0;

    $users = getUsers();
    foreach ($users as $user) {
        if ($_POST['pseudo'] == $user->pseudo) {
            $erreurPseudo = 1;
        }else{
            $erreurPseudo = 0;
        }

        if ($_POST['email'] == $user->email) {
            $erreurEmail = 2;
        }else{
            $erreurEmail = 0;
        }

        if (($_POST['nom'] == $user->nom) && ($_POST['prenom'] == $user->prenom)) {
            $erreurNom = 3;
        }else{
            $erreurNom = 0;
        }

    }
    if ($erreurPseudo == 1) {
        array_push($_SESSION['erreurRegister'], 'Pseudo déjà utilisé');
    }
    if ($erreurEmail == 2) {
        array_push($_SESSION['erreurRegister'], 'Email déjà utilisé');
    }
    if ($erreurNom == 3) {
        array_push($_SESSION['erreurRegister'], 'Utilisateur déjà existante');
    }
    if ($confMdp) {
        array_push($_SESSION['erreurRegister'], 'Mots de passe non identiques');
    }

    if (count($_SESSION['erreurRegister']) == 0) {
        addUser($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['pseudo'], $mdp);
        $newUser = getUser('pseudo', $_POST['pseudo']);

        $_SESSION['id'] = $newUser->id;
        $_SESSION['nom'] = $newUser->nom;
        $_SESSION['prenom'] = $newUser->prenom;
        $_SESSION['mdp'] = $newUser->mdp;
        $_SESSION['email'] = $newUser->email;
        $_SESSION['admin'] = $newUser->admin;
        $_SESSION['pseudo'] = $newUser->pseudo;
    }

    header('Location:'. BASE_URL .'index.php');
}
