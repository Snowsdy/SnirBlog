<?php 
session_start();
require_once '../../config/functions.php';

$articles = getArticles();

if($_SESSION['admin']):?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Articles</title>
</head>
<body>
    <!-- To be continued... -->
</body>
</html>

<?php endif;?>