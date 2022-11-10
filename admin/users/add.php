<?php
session_start();
require_once '../../config/functions.php';
if (isset($_SESSION['admin']) && $_SESSION['admin']) {
?>

    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajout d'un nouvel article</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/edit.css">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/left_menu.css">
    </head>

    <body>
        <div class="bck">
            <?php include ROOT_PATH . '/admin/includes/header.php' ?>
            <?php include ROOT_PATH . '/admin/includes/left_menu.php' ?>

            <div class="contenu">
                <!-- Formulaire -->
                <button class="return_btn"><a href="main.php">Retour</a></button>
                <form action="add.php" method="post">
                    <h1>Ajout d'un nouvel utilisateur</h1>
                    <br>
                    <label for="nom">Nom :</label><br>
                    <input type="text" name="nom" id="nom">
                    <br>
                    <label for="prenom">Prénom :</label><br>
                    <input type="text" name="prenom" id="prenom">
                    <br>
                    <label for="pseudo">Pseudo :</label><br>
                    <input type="text" name="pseudo" id="pseudo">
                    <br>
                    <label for="email">Email :</label><br>
                    <input type="email" name="email" id="email">
                    <br>
                    <label for="mdp">Mot de passe :</label><br>
                    <input type="password" name="mdp" id="mdp">
                    <br>
                    <label for="confMdp">Confirmation :</label><br>
                    <input type="password" name="confMdp" id="confMdp">
                    <br>
                    <label for="admin">Admin ?</label><br>
                    <label class="switch">
                        <input type="checkbox" name="admin" id="admin">
                        <span class="slider round"></span>
                    </label>
                    <br>
                    <input type="submit" value="Ajouter" name="submit" id="submit">
                </form>
            </div>

            <?php include ROOT_PATH . '/admin/includes/footer.php' ?>
        </div>
    </body>

    </html>

<?php } else {
    header('Location:' . BASE_URL . 'index.php');
    exit();
} ?>

<?php

$errors = array();

if (isset($_POST['submit'])) {

    // Vérification des champs :
    $nom = strip_tags($_POST['nom']);
    if ($nom == "") {
        array_push($errors, 'Titre insuffisant');
        die();
    }

    $prenom = strip_tags($_POST['prenom']);
    if ($prenom == "") {
        array_push($errors, 'Le champ du prénom ne doit pas être vide');
        die();
    }

    $pseudo = strip_tags($_POST['pseudo']);
    if ($pseudo == "") {
        array_push($errors, 'Pseudo insuffisant');
        die();
    }

    $email = strip_tags($_POST['email']);
    if ($email == "") {
        array_push($errors, 'Le champ de l\'email ne doit pas être vide');
        die();
    }

    //Concordance des mdp :

    $mdp = password_hash(strip_tags($_POST['mdp']), PASSWORD_DEFAULT);
    $confMdp = password_verify(strip_tags($_POST['confMdp']), $mdp);
    if (!$confMdp) {
        array_push($errors, 'Les mots de passe ne concordent pas');
        die();
    }

    $admin = isset($_POST['admin']);
    if ($admin) {
        $admin = $_POST['admin'];
    } else {
        $admin = 0;
    }

    // Enfin, on ajoute l'article si toutes les conditions respectées :
    if (count($errors) == 0) {
        addUser($nom, $prenom, $email, $pseudo, $mdp, $admin);
        header('Location: ' . BASE_URL . 'admin/users/main.php');
        exit();
    } else {
        $secondsWait = 1;
        header("Refresh:$secondsWait");
    }
}

?>