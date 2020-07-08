<?php 
session_start();
require_once '../config/functions.php';

if ($_SESSION['admin']) :
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Tableau de bord - <?= $_SESSION['pseudo'] ?></title>
</head>
<body>
    <?php include 'includes/header.php'?>
    <?= ROOT_PATH ?>
    <?php include 'includes/footer.php'?>
</body>
</html>

<?php endif;?>