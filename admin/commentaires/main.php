<?php 
session_start();
require_once '../../config/functions.php';

$comments = getAllComments();

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
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/left_menu.css">
</head>

<body>

    <div class="bck">
        <?php include '../includes/header.php'?>
        <?php include '../includes/left_menu.php'?>
        <div class="contenu">
            <table>

                <thead>
                    <th>Id</th>
                    <th>Article</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Contenu</th>
                    <th>Publié le</th>
                    <th colspan="2">Actions</th>
                </thead>

                <?php foreach($comments as $comment):?>
                
                    <tbody>
                        <tr>
                            <td><?= $comment->id ?></td>
                            <td>
                                <?php 
                                    $article = getArticle($comment->idArticle);
                                    echo tronque_chaine($article->title, 15, '');
                                ?>
                            </td>
                            <td><?= $comment->title ?></td>
                            <td>
                                <?php 
                                    $user = getUser('id', $comment->idUser);
                                    echo $user->pseudo;
                                ?>
                            </td>
                            <td><?= tronque_chaine($comment->content, 15) ?></td>
                            <td><?= $comment->publication_time ?></td>
                            <td>
                            <a href="apercu.php?idArticle=<?= $comment->idArticle ?>" class="apercu">
                                Aperçu
                            </a>
                            </td>
                            <td>
                                <a href="delete.php?id=<?= $article->id ?>" class="delete">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    
                <?php endforeach?>
            </table>
        </div>
        <?php include '../includes/footer.php'?>
    </div>

</body>

</html>

<?php else :?>
<?php header('Location: ' . BASE_URL . 'index.php');?>
<?php endif;?>