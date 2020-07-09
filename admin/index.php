<?php 
session_start();
require_once '../config/functions.php';

if ($_SESSION['admin']) :
?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <a href="#">Gestion des Utilisateurs</a>
                <a href="#">Gestion des Articles</a>
                <a href="#">Gestion des Commentaires</a>
            </ul>
        </div>
        <?php include 'includes/footer.php'?>
    </div>

</body>

</html>

<?php endif;?>