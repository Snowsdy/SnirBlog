<?php 
session_start();
require_once '../config/functions.php';

if ($_SESSION['admin']) :
?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Tableau de bord - <?= $_SESSION['pseudo'] ?></title>
</head>

<body>

    <div class="content">
        <?php include 'includes/header.php'?>
        <div class="left-menu">
            <ul class="left-in-menu">
                <a><b style="color: black;">Administration :</b></a>
                <a href="#">Gestion des Articles</a>
                <a href="#">Gestion des Utilisateurs</a>
                <a href="#">Gestion des Commentaires</a>
            </ul>
        </div>
        <div class="message">
            <p>
                Bienvenue <b style="color: black; text-shadow: none;"><?= $_SESSION['pseudo'] ?></b> dans le tableau de bord du SnirBlog !
                Afin de pouvoir gérer tous les articles, les utilisateurs
                ou encore les commentaires d'un article nous vous invitons à vous rediriger
                vers le menu à gauche où chaque catégorie y est disponible.<br />
                Sur ce, bonne gestion !
            </p>
        </div>
        <div class="fct">
            <p>Pour ce qui est des <b>fonctionnalités :</b></p>
            <ul>
                <li class="tete"><b>Articles :</b>
                    <ul>
                        <li>Add</li>
                        <li>Edit</li>
                        <li>Publish</li>
                        <li>Remove</li>
                    </ul>
                </li>
                <li class="tete"><b>Utilisateurs :</b>
                    <ul>
                        <li>Add</li>
                        <li>Edit</li>
                        <li>Remove</li>
                    </ul>
                </li>
                <li class="tete"><b>Commentaires :</b>
                    <ul>
                        <li>Edit</li>
                        <li>Remove</li>
                    </ul>
                </li>
            </ul>
        </div>
        <?php include 'includes/footer.php'?>
    </div>

</body>

</html>

<?php else :?>
<?php header('Location: ' . BASE_URL . 'index.php');?>
<?php endif;?>