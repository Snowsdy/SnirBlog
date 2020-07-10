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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/mainArticle.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/left_menu.css">
</head>

<body>

    <div class="bck">
        <?php include '../includes/header.php'?>
        <?php include '../includes/left_menu.php'?>
        <div class="contenu">
            <!-- Affichage des articles sous cette forme :
        - ID    Titre   Actions:    Edit    Remove  Publish/Unpublish
        -->
            <table>
                <thead>
                    <th>Id</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th colspan="3">Actions</th>
                </thead>
                <?php foreach($articles as $article):?>
                <tbody>
                    <tr>
                        <td><?= $article->id ?></td>
                        <td>
                            <a href="#"><?= $article->title ?></a>
                        </td>
                        <td><?= $article->author ?></td>
                        <td>
                            <a href="#" class="edit">
                                Edit
                            </a>
                        </td>
                        <td>
                            <a href="#" class="delete">
                                Delete
                            </a>
                        </td>
                        <td>
                            <a href="#" class="publish">
                                <?php if($article->publie):?>
                                    Unpublish
                                <?php else:?>
                                    Publish
                                <?php endif;?>
                            </a>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach;?>
            </table>
        </div>
        <?php include '../includes/footer.php'?>
    </div>

</body>

</html>

<?php else :?>
<?php header('Location: ' . BASE_URL . 'index.php');?>
<?php endif;?>