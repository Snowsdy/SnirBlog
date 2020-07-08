<?php 
session_start();

if ($_SESSION['admin']) :
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
</head>
<body>
    <h1>Bienvenue <?= $_SESSION['pseudo'] ?> !</h1>
</body>
</html>

<?php endif;?>