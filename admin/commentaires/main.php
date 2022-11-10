<?php
session_start();
require_once '../../config/functions.php';

$comments = getAllComments();

if (isset($_SESSION['admin']) && $_SESSION['admin']) : ?>

    <html lang="fr">

    <head>
        <title>Gestion des Articles</title>
        <?php require_once '../../components/header.php'; ?>
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/left_menu.css">
        <link rel="apple-touch-icon" sizes="180x180" href="../../favicon_io/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../../favicon_io/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../../favicon_io/favicon-16x16.png">
        <link rel="manifest" href="../../favicon_io/site.webmanifest">
    </head>

    <body>

        <div class="bck">
            <?php include '../includes/header.php' ?>
            <?php include '../includes/left_menu.php' ?>
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

                    <?php if (empty($comments)) : ?>
                        <h2 style="position: absolute;top:100%;right:50%; color: #B22222;">No comments</h2>
                    <?php else : ?>
                        <?php foreach ($comments as $comment) : ?>

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
                                        <a href="delete.php?id=<?= $comment->id ?>" class="delete">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            </tbody>

                        <?php endforeach ?>
                    <?php endif; ?>
                </table>
            </div>
            <?php include '../includes/footer.php' ?>
        </div>

    </body>

    </html>

<?php else : ?>
    <?php header('Location: ' . BASE_URL . 'index.php');
    exit(); ?>
<?php endif; ?>