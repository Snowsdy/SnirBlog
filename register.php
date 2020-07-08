<?php 
session_start();
require 'config/functions.php';

if($_POST){ 
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    
    addUserPublic($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['pseudo'], $mdp);
    $users = getUsers();
    foreach($users as $user){
        echo '<pre>' . print_r($user, true) . '</pre>';
    }
}
?>