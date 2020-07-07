<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SnirBlog</title>
    <link rel="stylesheet" href="admin/css/header.css">
    <link rel="stylesheet" href="../../css/accueil.css">
    <?php include 'links_framework.php'?>
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io//favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
</head>

<body>
    <div class="header">
        <h2 class="logo"><span>Snir</span>Blog</h2>
        <input type="checkbox" id="chk">
        <label for="chk" class="show-menu-btn">
            <i class="fas fa-ellipsis-h"></i>
        </label>

        <ul class="menu">
            <a href="index.php/">Accueil</a>
            <a href="#" class="button" id="button">
                <i class="fa fa-sign-in"></i> Se connecter
            </a>
            <a href="#">Créer un compte</a>
            <a href="#">A propos</a>
            <a href="#">Nous contacter</a>
            <?php if(isset($_SESSION['admin'])):?>
            <a href="#">Tableau de bord</a>
            <?php endif;?>
            <label for="chk" class="hide-menu-btn">
                <i class="fas fa-times"></i>
            </label>
        </ul>
    </div>