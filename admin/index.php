<?php
session_start();
require_once '../config/functions.php';

if ($_SESSION['admin']) :
?>

    <html lang="fr">

    <head>
        <?php require_once '../components/header.php'; ?>
        <link rel="stylesheet" href="css/left_menu.css">
        <link rel="stylesheet" href="css/admin.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/footer.css">
        <title>Tableau de bord - <?= $_SESSION['pseudo'] ?></title>
        <link rel="apple-touch-icon" sizes="180x180" href="../favicon_io/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../favicon_io/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../favicon_io/favicon-16x16.png">
        <link rel="manifest" href="../favicon_io/site.webmanifest">
    </head>

    <body>

        <div class="content">
            <?php include 'includes/header.php' ?>
            <?php include 'includes/left_menu.php' ?>
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
                            <li>Remove</li>
                            <li>Aperçu</li>
                        </ul>
                    </li>
                </ul>
            </div>
            <?php include 'includes/footer.php' ?>
        </div>

    </body>

    </html>

<?php else : ?>
    <?php header('Location: ' . BASE_URL . 'index.php'); ?>
<?php endif; ?>